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
		$upqry="update tbl_artist set artist_name='".$name."',artist_contact='".$contact."',artist_email='".$email."',artist_address='".$address."' where artist_id='".$_SESSION["aid"]."'"; 
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





$selqry="select * from tbl_artist where artist_id='".$_SESSION["aid"]."'";
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
<br /><br /><br /><br /><br /><br />
<div id="tab"align="center">
<h1><u>Edit Profile</u></h1>
<form id="form1" name="form1" method="post" action="">
  <table>
    <tr>
      <td>Name</td>
      <td><label for="txtname"></label>
      <input type="text" value="<?php echo $row["artist_name"];?>" name="txtname" id="txtname" /></td>
    </tr>
    <tr>
      <td>Contact</td>
      <td><label for="txtcontact"></label>
      <input type="text" value="<?php echo $row["artist_contact"];?>" name="txtcontact" id="txtcontact" /></td>
    </tr>
    <tr>
      <td>Email</td>
      <td><label for="txtemail"></label>
      <input type="text" value="<?php echo $row["artist_email"];?>" name="txtemail" id="txtemail" /></td>
    </tr>
    <tr>
      <td>Address</td>
      <td><label for="txtaddress"></label>
      <textarea name="txtaddress"  id="txtaddress" cols="45" rows="5"><?php echo $row["artist_address"];?></textarea></td>
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