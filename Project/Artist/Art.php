<?php
ob_start();
include("Head.php");
session_start();
include("../Assets/Connection/Connection.php");
if(isset($_POST["btnsubmit"]))
{

	$title=$_POST["txttitle"];
	$genere=$_POST["txtgenere"];
	$price=$_POST["txtprice"];
	$details=$_POST["txtdetails"];
	
	
	$photo=$_FILES["filephoto"]["name"];
	 $path=$_FILES["filephoto"]["tmp_name"];
	 move_uploaded_file($path,"../Assets/Files/ArtPhoto/".$photo);
	 
	 
	 
	 
	
$insQry=" insert into tbl_art(art_title,genere_id,art_photo,art_price,art_details,artist_id)values('".$title."','".$genere."','".$photo."','".$price."','".$details."','".$_SESSION["aid"]."')";
			if($Conn->query($insQry))
			{
				?>
            	<script>
						alert('inserted!!');
						location.href='Art.php';
					</script>
				<?php
			}
			else
			{
				?>
            	<script>
						alert('failed!');
						location.href='Art.php';
				</script>
                <?php
            }

}
if(isset($_GET["did"]))
{
	$id = $_GET["did"];
	
	$delQry = "delete from tbl_art where art_id='".$id."'";
	if($Conn->query($delQry))
	{
				?>
					<script>
						alert('Deleted');
						location.href='Art.php';
					</script>
				<?php
	}
	else
	{
				?>
					<script>
						alert('Failed');
						location.href='Art.php';
					</script>
				<?php
	}
}

?>




<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>GalerieDArt::Art</title>
</head>

<body>
<br /><br /><br /><br /><br /><br />
<div id="tab" align="center">
<h1><u>Art</u></h1>
<form action="" method="post" enctype="multipart/form-data" name="form1" id="form1">
  <table>
    <tr>
      <td>Title</td>
      <td><label for="txttitle"></label>
      <input type="text" name="txttitle" id="txttitle"  required="required" autocomplete="off" /></td>
    </tr>
    <tr>
      <td>Genere</td>
      <td><label for="txtgenere"></label>
        <select name="txtgenere" id="txtgenere">
		<option value="">-----select-----</option>
        <?php
		$selqry="select * from tbl_genere";
		$result=$Conn->query($selqry);
		while($row=$result->fetch_assoc())
		{
			?>
            <option value="<?php echo $row["genere_id"]?>"><?php echo $row["genere_name"]?></option>
            <?php
		}
		?>
        </select></td>
      </select></td>
    </tr>
    <tr>
      <td>Photo</td>
      <td><label for="filephoto"></label>
      <input type="file" name="filephoto" id="filephoto"  required="required" autocomplete="off" /></td>
    </tr>
    <tr>
      <td>Price</td>
      <td><label for="txtprice"></label>
      <input type="text" name="txtprice" id="txtprice"  required="required" autocomplete="off" /></td>
    </tr>
    <tr>
      <td>Details</td>
      <td><label for="txtdetails"></label>
      <textarea name="txtdetails" id="txtdetails" cols="45" rows="5"  required="required" autocomplete="off" style="resize:none"></textarea></td>
    </tr>
    <tr>
      <td align="center" colspan="2"><input type="submit" name="btnsubmit" id="btnsubmit" value="Submit" />
      <input type="submit" name="btncancel" id="btncancel" value="Cancel" /></td>
    </tr>
  </table>
  <p>&nbsp;</p>
  <p>&nbsp;</p>
  
   <?php
 $i=0;
 $selqry="select * from tbl_art a inner join tbl_genere g on a.genere_id=g.genere_id where artist_id='".$_SESSION["aid"]."'"; 
 $result=$Conn->query($selqry);
 if($result->num_rows>0)
 { 

	  ?>
  <table>
    <tr>
      <td width="59" height="26" ><b>SL.NO</b></td>
      <td width="53" ><b>Title</b></td>
      <td width="75" ><b>Genere</b></td>
      <td width="100" ><b>Photo</b></td>
      <td width="76" ><b>Price</b></td>
      <td width="167" ><b>Details</b></td>
      <td width="53" colspan="center" ><b>Action</b></td>
    </tr>
     <?php
		   while($row = $result->fetch_assoc())
		  {
			  $i++;
			  ?>
              	 <tr>
                  <td><?php echo $i; ?></td>
                  <td><?php echo $row["art_title"]; ?></td>
                  <td><?php echo $row["genere_name"]; ?></td>
                  <td><img src="../Assets/Files/ArtPhoto/<?php echo $row["art_photo"];?>" width="100" height="100" /></td>
                  <td><?php echo $row["art_price"]; ?></td>
                  <td><?php echo $row["art_details"]; ?></td>
                  <td><a href="Art.php?did=<?php echo $row["art_id"]; ?>">Delete</a></td>
                </tr>
              <?php
		  }
		   ?>
           <?php
 }
 ?>
  </table>
  <p>&nbsp;</p>
</form>
</div>
</body>

</html>

