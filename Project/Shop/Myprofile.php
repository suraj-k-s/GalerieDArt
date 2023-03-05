<?php
ob_start();
include("Head.php");
include("../Assets/Connection/Connection.php");
session_start();
$selqry="select * from tbl_shop s inner join tbl_place p on s.place_id=p.place_id inner join tbl_district d on p.district_id=d.district_id where shop_id='".$_SESSION["sid"]."'";
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
<div id="tab"align="center">
<h1> <u>My Profile</u></h1>
<p>&nbsp;</p>
<form id="form1" name="form1" method="post" action="">
  <table width="310" height="356" border="1">
  <tr>
      <td width="300" >
      <p align="center"><img src="../Assets/Files/Photos/<?php echo $row["shop_photo"];?>" width="129" height="96" /></p>
      <table>
      <tr>
   <td width="133" ><b>Name</b></td><td width="146"> <?php echo $row["shop_name"];?></td>
   </tr>
   <tr>
    <td><b>Contact</b></td><td><?php echo $row["shop_contact"];?></td>
    </tr>
    <tr> 
    <td ><b>Email</b></td><td><?php echo $row["shop_email"];?></td>
    </tr>
    <tr>
   <td><b>Address</b></td><td><?php echo $row["shop_address"];?></td>
   </tr>
   <tr> 
   <td><b>District</b></td><td><?php echo $row["district_name"];?></td>
   </tr>
   <tr>
    <td><b>Place</b></td><td><?php echo $row["place_name"];?></td>
    </tr>
    </table>
  </table>
</form>
</div>
</body>
</html><?php

}
?>