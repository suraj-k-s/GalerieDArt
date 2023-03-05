<?php
ob_start();
include("Head.php");
session_start();
include("../Assets/Connection/Connection.php");

$selqry="select * from tbl_artbooking b inner join tbl_art a on a.art_id=b.art_id inner join tbl_user u on u.user_id=b.user_id where artist_id='".$_SESSION["aid"]."' and artbooking_status!=0";
$result=$Conn->query($selqry);

if(isset($_GET["bid"]))
{
	
	$upQry = "update tbl_artbooking set artbooking_status='".$_GET["sts"]."' where artbooking_id='".$_GET["bid"]."' ";
	
	if($Conn->query($upQry))
	{
		?>
        	<script>
            	window.location="ArtOrderDetails.php";
            </script>
        <?php
	}
}

	

?>



<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Galerie DArt::Art Order Details </title>
</head>

<body>
<br /><br /><br /><br /><br /><br />
<div id="tab" align="center">
<h1><u>Ordered Details</u></h1>
<p>&nbsp;</p>
<form id="form1" name="form1" method="post" action="">
  <table width="640">
    <tr>
      <td width="74">SL No</td>
      <td width="77">Name</td>
      <td width="119">Photo</td>
      <td width="91">Price</td>
       <td width="136">User Name</td>
      <td width="115">Action</td>
    </tr>
     <?php
	 $i=0;
	while($row=$result->fetch_assoc())
	{
		 $i++;
  ?>
  <tr>
          <td><?php echo $i; ?></td>
          <td><?php echo $row["art_title"];?></td>
          <td><img src="../Assets/Files/ArtPhoto/<?php echo $row["art_photo"];?>" width="119" height="92" /></td>
          <td><?php echo $row["art_price"];?></td>
          <td><?php echo $row["user_name"];?></td>
          <td>
          
          <?php
                
					if($row["artbooking_status"]==0)
					{
						echo "Payment Pending....";
					}
					else if($row["artbooking_status"]==1)
					{
						?>
                        Payment Completed / 
                        <a href="ArtOrderDetails.php?bid=<?php echo $row["artbooking_id"];?>&sts=2">Pack Product</a>
                        <?php
					}
					else if($row["artbooking_status"]==2)
					{
						?>
                        Product Packed / 
                        <a href="ArtOrderDetails.php?bid=<?php echo $row["artbooking_id"];?>&sts=3">Ship Product</a>
                        <?php
					}
					else if($row["artbooking_status"]==3)
					{
						?>
                        Product Shipped / 
                        <a href="ArtOrderDetails.php?bid=<?php echo $row["artbooking_id"];?>&sts=4">Product Deliverd</a>
                        <?php
					}
					else if($row["artbooking_status"]==4)
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