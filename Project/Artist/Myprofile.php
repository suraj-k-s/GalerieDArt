<?php
ob_start();
include("Head.php");
include("../Assets/Connection/Connection.php");
session_start();
$selqry="select * from tbl_artist a inner join tbl_place p on a.place_id=p.place_id inner join tbl_district d on p.district_id=d.district_id where artist_id='".$_SESSION["aid"]."'";
$result=$Conn->query($selqry);
if($row=$result->fetch_assoc())

{
?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>GalerieDArt::Myprofile</title>
</head>

<body>
<br /><br /><br /><br /><br /><br />
<div id="tab"align="center">
<h1><u> My Profile</u></h1>
<p>&nbsp;</p>
<form id="form1" name="form1" method="post" action="">
  <table width="285" height="334" border="3">
  <tr>
      <td height="324">&nbsp;
      <p align="center"><img src="../Assets/Files/Photos/<?php echo $row["artist_photo"];?>" width="189" height="100" /></p>
      <table width="264">
      <tr>
    <td width="109">Name</td><td width="120"><b> <?php echo $row["artist_name"];?> </b></td>
    </tr>
    <tr>
    <td>Contact</td><td><b> <?php echo $row["artist_contact"];?></b></td>
    </tr>
    <tr>
    <td>Email</td><td><b> <?php echo $row["artist_email"];?> </b></td>
    </tr>
    <tr>
    <td>Address</td><td><b> <?php echo $row["artist_address"];?> </b></td>
    </tr>
    <tr>
    <td>District</td><td><b> <?php echo $row["district_name"];?> </b></td>
    </tr>
    <tr>
    <td height="24">Place</td><td><b> <?php echo $row["place_name"];?> </b> </p></td>
    </tr>
   </table>
   </table>
  </form>
</div>
</body>
</html><?php

}
?>