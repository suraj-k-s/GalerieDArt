<?php
ob_start();
include("Head.php");
session_start();
include("../Assets/Connection/Connection.php");

$selqry="select * from tbl_artbooking b inner join tbl_art a on a.art_id=b.art_id inner join tbl_artist c on c.artist_id= a.artist_id where user_id='".$_SESSION["uid"]."'";
$result=$Conn->query($selqry);
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Galerie DArt::View Art Booking</title>
</head>

<body>
<div id="tab"align="center">
<h1>Purchased Art </h1>
<p>&nbsp;</p>
<form id="form1" name="form1" method="post" action="">
  <table>
    <tr>
      <td><b>SL No</b></td>
      <td><b>Name</b></td>
      <td><b>Photo</b></td>
      <td><b>Price</b></td>
      <td><b>Artist Name</b></td>
      <td><b>Status</b></td>
    </tr>
     <?php
	 $i=0;
	while($row=$result->fetch_assoc())
	{
		 $i++;
  ?>
  <tr>
          <td height="96"><?php echo $i; ?></td>
          <td><?php echo $row["art_title"];?></td>
          <td><img src="../Assets/Files/ArtPhoto/<?php echo $row["art_photo"];?>" width="119" height="92" /></td>
          <td><?php echo $row["art_price"];?></td>
          <td><?php echo $row["artist_name"];?></td>
          <td>
          <?php
                
					if($row["payment_status"]==0 && $row["artbooking_status"]==1)
					{
						echo "Payment Pending....";
					}
					else if($row["artbooking_status"]==1)
					{
						?>
                        Payment Completed 
                        <?php
					}
					else if($row["artbooking_status"]==2)
					{
						?>
                        Product Packed 
                        <?php
					}
					else if($row["artbooking_status"]==3)
					{
						?>
                        Product Shipped 
                        <?php
					}
					else if($row["artbooking_status"]==4)
					{
						?>
                        Order Completed / <a href="ArtComplaint.php?">Complaint</a> / <a href="Bill.php?id=<?php echo $row["artbooking_id"] ?>">Print Bill</a>/<a href="ArtRating.php?pid=<?php echo $row["art_id"]?>">Review</a>
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