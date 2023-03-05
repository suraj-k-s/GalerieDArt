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
		$upqry="update tbl_user set user_name='".$name."',user_contact='".$contact."',user_email='".$email."',user_address='".$address."' where user_id='".$_SESSION["uid"]."'"; 
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





$selqry="select * from tbl_user u inner join tbl_place p on u.place_id=p.place_id inner join tbl_district d on p.district_id=d.district_id where user_id='".$_SESSION["uid"]."'";
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
<h1>Edit Profile</h1>
<form id="form1" name="form1" method="post" action="">
  <table>
    <tr>
      <td>Name</td>
      <td><label for="txtname"></label>
      <input type="text" value="<?php echo $row["user_name"];?>" name="txtname" id="txtname" /></td>
    </tr>
    <tr>
      <td>Contact</td>
      <td><label for="txtcontact"></label>
      <input type="text" value="<?php echo $row["user_contact"];?>" name="txtcontact" id="txtcontact" /></td>
    </tr>
    <tr>
      <td>Email</td>
      <td><label for="txtemail"></label>
      <input type="text" value="<?php echo $row["user_email"];?>" name="txtemail" id="txtemail" /></td>
    </tr>
    <tr>
      <td>Address</td>
      <td><label for="txtaddress"></label>
      <textarea name="txtaddress"  id="txtaddress" cols="45" rows="5" style="resize:none"><?php echo $row["user_address"];?></textarea></td>
    </tr>
    <tr>
      <td>District</td>
      <td><label for="txtdistrict"></label>
      <input type="text" value="<?php echo $row["district_name"];?>" name="txtdistrict" id="txtdistrict" /></td>
    </tr>
    <tr>
      <td>Place</td>
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