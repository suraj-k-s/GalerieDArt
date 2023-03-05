<?php 
ob_start();
include("Head.php");
include("../Assets/Connection/Connection.php");
session_start();

if(isset($_POST["btnsave"]))
{
	$date=$_POST["txtbdate"];
	$content=$_POST["txtcontent"];
	$type=$_POST["type"];
	$complainttypeid=$_POST["type"];
	
	$insQry=" insert into tbl_complaint(complaint_date,complaint_content,user_id,complainttype_id,artist_id)values(curdate(),'".$content."','".$_SESSION["uid"]."','".$complainttypeid."','".$_SESSION["aid"]."')";
			if($Conn->query($insQry))
			{
				?>
            	<script>
						alert('Inserted');
						location.href='	ArtComplaint.php';
					</script>
				<?php
			}
			else
			{
				?>
            	<script>
						alert('failed!');
						location.href='ArtComplaint.php';
				</script>
                <?php
            }

}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Art Complaints</title>
</head>

<body>

<div id="tab" align="center">
<h1>Complaint</h1>
<form id="form1" name="form1" method="post" action="">
  <table>
    <tr>
      <td >Type</td>
      <td ><label for="type"></label>
        <select name="type" id="type">
        <option value="">-----select-----</option>
        <?php
		$selqry="select * from tbl_complainttype";
		$result=$Conn->query($selqry);
		while($row=$result->fetch_assoc())
		{
			?>
            <option value="<?php echo $row["complainttype_id"]?>"><?php echo $row["complainttype_name"]?></option>
            <?php
		}
		?>
        </select>
        </td>
    </tr>
    <tr>
      <td>Content</td>
      <td><label for="txtcontent"></label>
        <label for="txtcontent"></label>
      <textarea name="txtcontent" id="txtcontent" cols="45" rows="5"></textarea></td>
    </tr>
    <tr>
      <td align="center" colspan="2"><input type="submit" name="btnsave" id="btnsave" value="Submit" /></td>
    </tr>
  </table>
  <p>&nbsp;</p>
   <p>
     <?php 
  $selqry="select * from tbl_complaint c inner join tbl_complainttype d on d.complainttype_id=c.complainttype_id inner join tbl_artist s on s.artist_id=c.artist_id where user_id='".$_SESSION["uid"]."'"; 
  
  $result=$Conn->query($selqry);
  if($result->num_rows>0)
  {
	  ?>
     
   </p>
  <table>
    <tr>
      <td width="78" ><b>SI.NO</b></td>
      <td width="92"><b>Type</b></td>
      <td width="89"><b>Date</b></td>
      <td width="116"><b>Content</b></td>
      <td width="93" ><b>Replay</b></td>
    </tr>
    <?php
	$i=0;
	while($row=$result->fetch_assoc())
	{
		$i++;
		?>
        <tr>
        <td><?php echo $i?></td>
        <td><?php echo $row["complainttype_name"]?></td>
        <td><?php echo $row["complaint_date"]?></td>
         <td><?php echo $row["complaint_content"]?></td>
          <td><?php echo $row["complaint_replay"]?></td>
       
        </tr>
        <?php
	}
  }
  else
  {
	  echo "<h1>No Data Found</h1>";
  }
  ?>
  </table>
</form>
</div>
</body>
</html>