<?php
ob_start();
include("Head.php");
include("../Assets/Connection/Connection.php");
if(isset($_POST["btnsubmit"]))
{
	$name=$_POST["txtname"];
    $contact=$_POST["txtcontact"];
	$email=$_POST["txtemail"];
	$address=$_POST["txtaddress"];
	$gender=$_POST["gender"];
	$dob=$_POST["txtdate"];
	$password=$_POST["txtpassword"];
	$district=$_POST["district"];
	$place=$_POST["place"];
	$photo=$_POST["filephoto"];
	$proof=$_POST["file_photo"];
	
	
	$photo=$_FILES["filephoto"]["name"];
	 $path=$_FILES["filephoto"]["tmp_name"];
	 move_uploaded_file($path,"../Assets/Files/Photos/".$photo);
	 
	$proof=$_FILES["file_photo"]["name"];
	 $path=$_FILES["file_photo"]["tmp_name"];
	 move_uploaded_file($path,"../Assets/Files/ProofPhotos/".$proof);
	 
	 
$insQry=" insert into tbl_user(user_name,user_contact,user_email,user_address,user_gender,user_dob,user_password,place_id,user_photo,user_proof)values('".$name."','".$contact."','".$email."','".$address."','".$gender."','".$dob."','".$password."','".$place."','".$photo."','".$proof."')";
			if($Conn->query($insQry))
			{
				?>
            	<script>
						alert('inserted!!');
						location.href='User.php';
					</script>
				<?php
			}
			else
			{
				?>
            	<script>
						alert('failed!');
						location.href='User.php';
				</script>
                <?php
            }
			
			
			
			
			
			
			

}

?>






<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>GalerieDArt::User Registration</title>
</head>

<body>
<div id="tab" align="center">
<h1> User Details </h1>
<form action="" method="post" enctype="multipart/form-data" name="form1" id="form1">
  <table>
    <tr>
      <td> Name</td>
      <td ><label for="txtname"></label>
      <input type="text" name="txtname" id="txtname" pattern="[A-Za-z ]{2,}" required autocomplete="off" /></td>
    </tr>
    <tr>
      <td> Contact</td>
      <td><label for="txtcontact"></label>
      <input type="text" name="txtcontact"  required="required" autocomplete="off" id="txtcontact" pattern="[0-9+ ]{10,14}" onkeyup="numberVal(this)"/></td>
    </tr>
    <tr>
      <td>Email</td>
      <td><label for="txtemail"></label>
      <input type="email" name="txtemail" required autocomplete="off" id="txtemail" /></td>
    </tr>
    <tr>
      <td>Address</td>
      <td><label for="txtaddress"></label>
        <textarea name="txtaddress" id="txtaddress" required autocomplete="off" cols="45" rows="5" style="resize:none"></textarea></td>
    </tr>
    <tr>
      <td>Gender</td>
      <td><input type="radio" name="gender" id="gender" value="Male" required autocomplete="off" checked="checked"/>Male
      <label for="gender">
        <input type="radio" name="gender" id="gender2" value="Female" required autocomplete="off"/>Female
        <input type="radio" name="gender" id="gender3" value="Others" required autocomplete="off"/>Others
      </label></td>
    </tr>
    <tr>
      <td> Dob</td>
      <td><label for="txtdate"></label>
      <input type="date" name="txtdate" max="<?php echo date('Y-m-d') ?>" id="txtdate" required autocomplete="off" /></td>
    </tr>
    <tr>
      <td>Password</td>
      <td><label for="txtpassword"></label>
      <input type="password" name="txtpassword" id="txtpassword" pattern="[a-zA-Z!@#$<:*0-9]{6-8}" required autocomplete="off" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters"/></td>
    </tr>
    <tr>
      <td>District </td>
      <td><label for="district"></label>
        <select name="district" id="district" onChange="getPlace(this.value)" required>
		<option value="">-----select-----</option>
        <?php
		$selqry="select * from tbl_district";
		$result=$Conn->query($selqry);
		while($row=$result->fetch_assoc())
		{
			?>
            <option value="<?php echo $row["district_id"]?>"><?php echo $row["district_name"]?></option>
            <?php
		}
		?>
        </select></td>
    </tr>
    <tr>
      <td>Place </td>
      <td><label for="place"></label>
      <select name="place" id="place" required>
      <option value="">------Select------</option>
      </select></td>
    </tr>
    <tr>
      <td> Photo</td>
      <td><label for="filephoto"></label>
      <input type="file" name="filephoto" id="filephoto" required autocomplete="off" /></td>
    </tr>
    <tr>
      <td>Proof</td>
      <td><label for="file_photo"></label>
      <input type="file" name="file_photo" id="file_photo" required autocomplete="off" /></td>
    </tr>
    <tr>
      <td align="center" colspan="2"><input type="submit" name="btnsubmit" id="btnsubmit" value="Submit" />
      <input type="submit" name="btncancel" id="btncancel" value="Cancel" /></td>
    </tr>
  </table>
</form>
</div>
</body>
<script src="../Assets/JQ/jQuery.js"></script>
	<script>
	var flag=0;
	function numberVal(dat)
	{
		
		if(flag==0)
		{
			dat.value = "+91 "+dat.value;
			flag=1;
		}
	}

		function getPlace(did)
		{
			$.ajax({url:"../Assets/AjaxPages/AjaxPlace.php?did="+did,
			success: function(result) {
				$("#place").html(result);
			}});
		}
		</script>
</html>