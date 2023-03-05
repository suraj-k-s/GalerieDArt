<?php
ob_start();
include("Head.php");
session_start();
include("../Assets/Connection/Connection.php");
?>

  

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>GalerieDArt::View Exhibition Details</title>
</head>

<body>
<div id="tab" align="center">
<h1><u>Exhibition Details</u></h1>
<p>&nbsp;</p>
<form>
<table >
  <tr>
  <?php
  $sela="select * from tbl_exhibition";
  $rowa=$Conn->query($sela);
  $i=0;
  while($dataa=$rowa->fetch_assoc())
  {
	  $i++;
	  ?>
      <td style="padding:20px"><p><img src="../Assets/Files/ExhibitionPhotos/<?php echo $dataa["exhibition_photo"]?>" width="150" height="150" /><br /></p>
      <table>
      <tr><td><b>Date</b></td><td><b>:</b></td><td><?php echo $dataa["exhibition_date"]?></td><td>
      <tr><td><b>Title</b></td><td><b>:</b></td><td><?php echo $dataa["exhibition_title"]?></td></tr>
      <tr><td><b>Details</b></td><td><b>:</b></td><td><?php echo $dataa["exhibition_details"]?></td></tr>
      <tr><td><b>Fee</b></td><td><b>:</b></td><td><?php echo $dataa["exhibition_fee"]?></td></tr>
      <tr><td><b>Start Date</b></td><td><b>:</b></td><td><?php echo $dataa["exhibition_startdate"]?></td></tr>
      <tr><td><b>End Date</b></td><td><b>:</b></td><td><?php echo $dataa["exhibition_enddate"]?></td></tr>
      <tr><td><b>Venue</b></td><td><b>:</b></td><td><?php echo $dataa["exhibition_venue"]?></td></tr>
      <tr><td colspan="3"><a href="ExhibitionBooking.php?id=<?php echo $dataa["exhibition_id"];?>">Booking</a></td></tr></table>
      </td>
      
      <?php
	  if($i==4)
	  {
		  echo "</tr>";
		  $i=0;
		  echo "<tr>";
	  }
  }
  ?>
  
  </table>
  </form>
  </div>
</body>
</html>