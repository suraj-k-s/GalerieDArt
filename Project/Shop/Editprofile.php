<?php
ob_start();
include("Head.php");
include("../Assets/Connection/Connection.php");
session_start();
if(isset($_POST["btnupdate"]))
	{
		$name=$_POST["txtname"];
		$contact=$_POST["txtcontact"];
		$email=$_POST["txtemail"];
		$address=$_POST["txtaddress"];
		$upqry="update tbl_shop set shop_name='".$name."',shop_contact='".$contact."',shop_email='".$email."',shop_address='".$address."' where shop_id='".$_SESSION["sid"]."'"; 
		if($Conn->query($upqry))
		{
			?>
			<script>
			alert('Updated');
            location.href='Editprofile.php';
            </script>
            <?php
		}
	}





$selqry="select * from tbl_shop s inner join tbl_place p on s.place_id=p.place_id inner join tbl_district d on p.district_id=d.district_id where shop_id='".$_SESSION["sid"]."'";
$result=$Conn->query($selqry);
if($row=$result->fetch_assoc())

{
?>





<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>GalerieDArt::Edit Profile</title>
</head>

<body>
<div id="tab" align="center">
<h1><u>Edit Profile</u></h1>
<form id="form1" name="form1" method="post" action="">
  <table >
    <tr>
      <td><b>Name</b></td>
      <td><label for="txtname"></label>
      <input type="text" value="<?php echo $row["shop_name"];?>" name="txtname" id="txtname" /></td>
    </tr>
    <tr>
      <td><b>Contact</b></td>
      <td><label for="txtcontact"></label>
      <input type="text" value="<?php echo $row["shop_contact"];?>" name="txtcontact" id="txtcontact" /></td>
    </tr>
    <tr>
      <td><b>Email</b></td>
      <td><label for="txtemail"></label>
      <input type="text" value="<?php echo $row["shop_email"];?>" name="txtemail" id="txtemail" /></td>
    </tr>
    <tr>
      <td><b>Address</b></td>
      <td><label for="txtaddress"></label>
      <textarea name="txtaddress"  id="txtaddress" cols="45" rows="5"><?php echo $row["shop_address"];?></textarea></td>
    </tr>
    <tr>
      <td><b>District</b></td>
      <td><label for="txtdistrict"></label>
      <input type="text" value="<?php echo $row["district_name"];?>" name="txtdistrict" id="txtdistrict" /></td>
    </tr>
    <tr>
      <td><b>Place</b></td>
      <td><label for="txtplace"></label>
      <input type="text" value="<?php echo $row["place_name"];?>" name="txtplace" id="txtplace" /></td>
    </tr>
    <tr>
      <td align="center" colspan="2"><input type="submit" name="btnupdate" id="btnupdate" value="Update" />
            <input type="submit" name="btncancel" id="btncancel" value="Cancel" /></td>

    </tr>
  </table>
</form>
</div>
</body>
</html><?php

}
?>