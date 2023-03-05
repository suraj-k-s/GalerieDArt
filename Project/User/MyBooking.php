<?php
ob_start();
include("Head.php");
session_start();
include("../Assets/Connection/Connection.php");

$selqry="select * from tbl_booking b inner join tbl_cart c on c.booking_id=b.booking_id inner join tbl_product p on p.product_id=c.product_id inner join tbl_shop s on s.shop_id=p.shop_id where booking_status>0 and cart_status>0 and  user_id='".$_SESSION["uid"]."'";
$result=$Conn->query($selqry);	
	
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Galerie DArt::My Booking</title>
</head>

<body>
<div id="tab"align="center">
<h1>Purchased Product</h1>
<p>&nbsp;</p>
<form id="form1" name="form1" method="post" action="">
  <table>
    <tr>
      <td width="45"><b>SlNO</b></td>
      <td width="46"><b>Name</b></td>
      <td width="137"><b>Photo</b></td>
      <td width="89"><b>Quantity</b></td>
      <td width="67"><b>Price</b></td>
      <td width="83"><b>Total amount</b></td>
      <td width="112"><b>Shop Name</b></td>
      <td width="115"><b>Status</b></td>
    </tr>
     <?php
	 $i=0;
	while($row=$result->fetch_assoc())
	{
		
		$qty=$row["cart_qty"];
	$price=$row["product_price"];
	$totalamt=$qty*$price;
		 $i++;
  ?>
  <tr>
          <td height="104"><?php echo $i; ?></td>
          <td><?php echo $row["product_name"];?></td>
          <td><img src="../Assets/Files/ProductPhotos/<?php echo $row["product_photo"];?>" width="100" height="100" /></td>
          <td><?php echo $row["cart_qty"];?></td>
          <td><?php echo $row["product_price"];?></td>
          <td><?php echo $totalamt;?></td>
          <td><?php echo $row["shop_name"];?></td>
          <td>
          <?php
                
					if($row["booking_status"]==1 && $row["cart_status"]==1)
					{
						echo "Payment Pending....";
					}
					else if($row["cart_status"]==1)
					{
						?>
                        Payment Completed 
                        <?php
					}
					else if($row["cart_status"]==2)
					{
						?>
                        Product Packed 
                        <?php
					}
					else if($row["cart_status"]==3)
					{
						?>
                        Product Shipped 
                        <?php
					}
					else if($row["cart_status"]==4)
					{
						?>
                        Order Completed / <a href="ShopComplaints.php?sid=<?php echo $row["shop_id"] ?>">Complaint</a> /<a href="ProductRating.php?pid=<?php echo $row["product_id"]?>">Review</a> / <a href="ProductBill.php?id=<?php echo $row["booking_id"] ?>">Print Bill</a>
                        <?php
					}
				
				
				?>
          </td>

  </tr>
  <?php
	}
	?>
  </table>
</form>
</div>
</body>
</html>