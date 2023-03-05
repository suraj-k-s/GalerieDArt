<?php
ob_start();
include("Head.php");
session_start();
include("../Assets/Connection/Connection.php");

$selqry="select * from tbl_exhibition e inner join tbl_exhibitionbooking b on b.exhibition_id=e.exhibition_id inner join tbl_artist a on a.artist_id=e.artist_id where user_id='".$_SESSION["uid"]."'";
$result=$Conn->query($selqry);
?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>View Exhibition Booking</title>
</head>

<body>
<div id="tab"align="center">
<h1><u>View Exhibition Booking</u></h1>
<p>&nbsp; </p>
<form id="form1" name="form1" method="post" action="">
  <table>
    <tr>
      <td><b>Title</b></td>
      <td><b>Photo</b></td>
      <td><b>Details</b></td>
      <td><b>Venue</b></td>
      <td><b>For Date</b></td>
      <td><b>Count</b></td>
      <td><b>Fee</b></td>
      <td ><b>Artist Name</b></td>
    </tr>
      <?php
	 
	while($row=$result->fetch_assoc())
	{
		 
  ?>
  <tr>
          
          <td><?php echo $row["exhibition_title"];?></td>
          <td><img src="../Assets/Files/exhibitionPhotos/<?php echo $row["exhibition_photo"];?>" width="119" height="92" /></td>
          <td><?php echo $row["exhibition_details"];?></td>
          <td><?php echo $row["exhibition_venue"];?></td>
          <td><?php echo $row["booking_fordate"];?></td>
          <td><?php echo $row["booking_count"];?></td>
          <td><?php echo $row["exhibition_fee"];?></td>
          <td><?php echo $row["artist_name"];?></td>
          </tr>
          <?php
	}
	?>
  </table>
</form>
</div>
</body>
</html>