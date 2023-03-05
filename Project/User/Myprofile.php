<?php
ob_start();
include("Head.php");
include("../Assets/Connection/Connection.php");
session_start();
$selqry="select * from tbl_user u inner join tbl_place p on u.place_id=p.place_id inner join tbl_district d on p.district_id=d.district_id where user_id='".$_SESSION["uid"]."'";
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
<div align="center">
<h1> My Profile</h1>
<form id="form1" name="form1" method="post" action="">
<table width="264" height="359" border="1">
<tr>
<td width="254">
    <p align="center"><img src="../Assets/Files/Photos/<?php echo $row["user_photo"];?>" width="135" height="103" align="center" /></p>
   <table >
   <tr><td width="85"><b>Name</b></td><td width="26"><b>:</b></td><td width="105"><?php echo $row["user_name"];?></td></tr>
       <tr><td><b>Contact</b></td><td><b>:</b></td><td><?php echo $row["user_contact"];?></td></tr>
       <tr><td><b>Email</b></td><td><b>:</b></td><td><?php echo $row["user_email"];?></td></tr>
       <tr><td><b>Address</b></td><td><b>:</b></td><td><?php echo $row["user_address"];?></td></tr>
       <tr><td><b>District</b></td><td><b>:</b></td><td><?php echo $row["district_name"];?></td></tr>
       <tr><td><b>Place</b></td><td><b>:</b></td><td><?php echo $row["place_name"];?></td></tr>
       </table>
       </td>
      </tr>
      </table>
</form>
</div>
</body>
</html><?php

}
?>
