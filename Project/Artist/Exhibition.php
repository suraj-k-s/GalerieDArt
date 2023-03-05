<?php
ob_start();
include("Head.php");
session_start();
include("../Assets/Connection/Connection.php");
if(isset($_POST["btnsave"]))
{
	$title=$_POST["txttitle"];
	$details=$_POST["txtdetails"];
	$fee=$_POST["txtfee"];
	$sdate=$_POST["txtsdate"];
	$edate=$_POST["txtedate"];
	$venue=$_POST["txtvenue"];
	
	
	
	$photo=$_FILES["filephoto"]["name"];
	 $path=$_FILES["filephoto"]["tmp_name"];
	 move_uploaded_file($path,"../Assets/Files/ExhibitionPhotos/".$photo);
	 
	 
	 
	 
	
$insQry=" insert into tbl_exhibition(exhibition_date,exhibition_title,exhibition_details,exhibition_photo,exhibition_fee,exhibition_startdate,exhibition_enddate,exhibition_venue,artist_id)values(curdate(),'".$title."','".$details."','".$photo."','".$fee."','".$sdate."','".$edate."','".$venue."','".$_SESSION["aid"]."')";
			if($Conn->query($insQry))
			{
				?>
            	<script>
						alert('inserted!!');
						location.href='Exhibition.php';
					</script>
				<?php
			}
			else
			{
				?>
            	<script>
						alert('failed!');
						location.href='Exhibition.php';
				</script>
                <?php
            }

}
?>




<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>GalerieDArt::Exhibition</title>
</head>

<body>
<br /><br /><br /><br /><br /><br />
<div id="tab"align="center">
<h1><u>Exhibition</u></h1>
<form action="" method="post" enctype="multipart/form-data" name="form1" id="form1">
  <table>
    <tr>
      <td>Title</td>
      <td><label for="txttitle"></label>
      <input type="text" name="txttitle" id="txttitle"  required="required" autocomplete="off" /></td>
    </tr>
    <tr>
      <td>Details</td>
      <td><label for="txtdetails"></label>
      <input type="text" name="txtdetails" id="txtdetails"  required="required" autocomplete="off"/></td>
    </tr>
    <tr>
      <td>Photo</td>
      <td><label for="filephoto"></label>
      <input type="file" name="filephoto" id="filephoto"  required="required" autocomplete="off" /></td>
    </tr>
    <tr>
      <td>Fee</td>
      <td><label for="txtfee"></label>
      <input type="text" name="txtfee" id="txtfee"  required="required" autocomplete="off"/></td>
    </tr>
    <tr>
      <td>Start Date</td>
      <td><label for="txtsdate"></label>
      <input type="date" name="txtsdate" id="txtsdate"  required="required" autocomplete="off" /></td>
    </tr>
    <tr>
      <td>End Date</td>
      <td><label for="txtedate"></label>
      <input type="date" name="txtedate" id="txtedate" required autocomplete="off" /></td>
    </tr>
     <tr>
      <td>	Venue</td>
      <td><label for="txtvenue"></label>
      <input type="text" name="txtvenue" id="txtvenue"  required="required" autocomplete="off" /></td>
    </tr>
    <tr>
      <td align="center" colspan="2"><input type="submit" name="btnsave" id="btnsave" value="Submit" />
       <input type="submit" name="cancel" id="cancel" value="Cancel" /></td>
    </tr>
  </table>
  
  <p>&nbsp;</p>
  <p>
    <?php
 $selqry="select * from tbl_exhibition";
 $result=$Conn->query($selqry);
 if($result->num_rows>0)
 { 

	  ?>
    
  </p>
  <table>
        <tr>
              <td width="46"><b>Title</b></td>
              <td width="42"><b>Details</b></td>
              <td width="100"><b>Photo</b></td>
              <td width="71"><b>Fee</b></td>
              <td width="97"><b>Start Date</b></td>
              <td width="136"><b>End Date</b></td>
            </tr>
           <?php
		   while($row = $result->fetch_assoc())
		  {
			 
			  ?>
              	 <tr>
                  <td><?php echo $row["exhibition_title"]; ?></td>
                  <td><?php echo $row["exhibition_details"]; ?></td>
                  <td><img src="../Assets/Files/ExhibitionPhotos/<?php echo $row["exhibition_photo"];?>" width="100" height="100" /></td>
                  <td><?php echo $row["exhibition_fee"]; ?></td>
                  <td><?php echo $row["exhibition_startdate"]; ?></td>
                  <td><?php echo $row["exhibition_enddate"]; ?></td>
      </tr>
              <?php
		  }
		   ?>
    </table>
    <?php
 }
 ?>
</form>
</div>
</body>
</html>