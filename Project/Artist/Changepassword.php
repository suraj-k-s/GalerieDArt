<?php
ob_start();
include("Head.php");
include("../Assets/Connection/Connection.php");
session_start();
$selqry="select * from tbl_artist where artist_id='".$_SESSION["aid"]."'";
		$result=$Conn->query($selqry);
		$row=$result->fetch_assoc();
 		
		
		$dbpassword=$row["artist_password"];
	
if(isset($_POST["btnupdate"]))
	{
		$Currentpassword=$_POST["txtconpassword"];
		$Newpassword=$_POST["txtnewpassword"];
		$Re_password=$_POST["txtrepassword"];
		
		if($Currentpassword==$dbpassword)
		{
			if($Newpassword==$Re_password)
			{
				$upqry="update tbl_artist set artist_password='".$Newpassword."' where artist_id='".$_SESSION["aid"]."'"; 
		        if($Conn->query($upqry))
				{
					
					?>
					<script>
					alert('Updated');
            		location.href='Changepassword.php';
            		</script>
            		<?php
				}
				else
				{
				
					?>
					<script>
					alert('Failed');
            		location.href='Changepassword.php';
            		</script>
            		<?php
				
				}
			}
			else
		    {
			
			  ?>
			  <script>
			  alert('Incorrect new password');
              location.href='Changepassword.php';
              </script>
              <?php
		    }
		}
		else
		{
			
			?>
			<script>
			alert('Incorrect current password');
            location.href='Changepassword.php';
            </script>
            <?php
		}
		
	}
	?>
			

		



<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>GalerieDArt::Change Password</title>
</head>

<body>
<br /><br /><br /><br /><br /><br />
<div id="tab"align="center">
<h1><u>Change password</u></h1>
<form id="form1" name="form1" method="post" action="">
  <table>
    <tr>
      <td>Current Password</td>
      <td><label for="txtconpassword"></label>
      <input type="password" name="txtconpassword" id="txtconpassword" /></td>
    </tr>
    <tr>
      <td>New Password</td>
      <td><label for="txtnewpassword"></label>
      <input type="password" name="txtnewpassword" id="txtnewpassword" /></td>
    </tr>
    <tr>
      <td>RePassword</td>
      <td><label for="txtrepassword"></label>
      <input type="password" name="txtrepassword" id="txtrepassword" /></td>
    </tr>
    <tr>
      <td align="center" colspan="2"><input type="submit" name="btnupdate" id="btnupdate" value="Update" />
      <input type="submit" name="btncancel" id="btncancel" value="Cancel" /></td>
    </tr>
  </table>
</form>
</div>
</body>
</html>