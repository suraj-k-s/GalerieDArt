<?php
ob_start();
include("Head.php");
session_start();
include("../Assets/Connection/Connection.php");

$selqry="select * from tbl_booking b inner join tbl_cart c on c.booking_id=b.booking_id inner join tbl_product p on p.product_id=c.product_id inner join tbl_user u on u.user_id=b.user_id where shop_id='".$_SESSION["sid"]."' and booking_status!=0 and cart_status!=0";
$result=$Conn->query($selqry);


if(isset($_GET["cid"]))
{
	
	$upQry = "update tbl_cart set cart_status='".$_GET["sts"]."' where cart_id='".$_GET["cid"]."' ";
	
	if($Conn->query($upQry))
	{
		?>
        	<script>
            	window.location="OrderDetails.php";
            </script>
        <?php
	}
}

	
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Galerie DArt::Order Details</title>
</head>

<body>
<div id="tab" align="center">
<h1><u>Order Details</u></h1>
<p>&nbsp;</p>
<form id="form1" name="form1" method="post" action="">
  <table width="1074">
    <tr>
      <td width="64">SlNO</td>
      <td width="90">Name</td>
      <td width="134">Photo</td>
      <td width="111">User Name</td>
      <td width="113">Quantity</td>
      <td width="102">Price</td>
      <td width="138">Total amount</td>
      <td width="286">Action</td>
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
          <td><?php echo $i; ?></td>
          <td><?php echo $row["product_name"];?></td>
          <td><img src="../Assets/Files/ProductPhotos/<?php echo $row["product_photo"];?>" width="100" height="100" /></td>
          <td><?php echo $row["user_name"];?></td>
          <td><?php echo $row["cart_qty"];?></td>
          <td><?php echo $row["product_price"];?></td>
          <td><?php echo $totalamt;?></td>
          <td>
          		<?php
                
					if( $row["cart_status"]==0)
					{
						echo "Payment Pending....";
					}
					else if($row["cart_status"]==1)
					{
						?>
                        Payment Completed / 
                        <a href="OrderDetails.php?cid=<?php echo $row["cart_id"];?>&sts=2">Pack Product</a>
                        <?php
					}
					else if($row["cart_status"]==2)
					{
						?>
                        Product Packed / 
                        <a href="OrderDetails.php?cid=<?php echo $row["cart_id"];?>&sts=3">Ship Product</a>
                        <?php
					}
					else if($row["cart_status"]==3)
					{
						?>
                        Product Shipped / 
                        <a href="OrderDetails.php?cid=<?php echo $row["cart_id"];?>&sts=4">Product Deliverd</a>
                        <?php
					}
					else if($row["cart_status"]==4)
					{
						?>
                        Order Completed 
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