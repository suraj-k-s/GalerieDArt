<?php
ob_start();
include("Head.php");
session_start();
include("../Assets/Connection/Connection.php");


if(isset($_POST["btn_reply"]))
{
	$id = $_POST["txt_cid"];
	$reply = $_POST["txt_reply"];
	
	$upQry = "update tbl_complaint set complaint_status=1,complaint_replay='".$reply."' where complaint_id='".$id."'";
	echo $upQry;
	if($Conn->query($upQry))
	{
		?>
        <script>
			window.location='ViewArtComplaints.php';
		</script>
        <?php
	}
	
}




$selqry="select * from tbl_complaint c inner join tbl_complainttype d on d.complainttype_id=c.complainttype_id inner join tbl_user u on u.user_id=c.user_id where complaint_status='0' and artist_id='".$_SESSION["aid"]."'"; 
$result=$Conn->query($selqry);
?>




<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
<br /><br /><br /><br /><br /><br />
<div id="tab"align="center">
<h2><u>View Complaint</u>s</h2>
<p>&nbsp;</p>
<form id="form1" name="form1" method="post" action="">
<?php
if(isset($_GET["cid"]))
{

?>

  <table>
    <tr>
      <td>Reply</td>
      <td><label for="txt_reply"></label>
        <textarea name="txt_reply" id="txt_reply" cols="45" rows="5"></textarea>
        <input type="hidden" value="<?php echo $_GET["cid"]?> " name="txt_cid" id="txt_cid" />
       </td>
    </tr>
    <tr>
      <td colspan="2"><input type="submit" name="btn_reply" id="btn_reply" value="Submit" /></td>
      </tr>
  </table>
  <p>
    <?php
}	
  ?>
  </p>
  <table width="511">
    <tr>
    <td width="58"><b>SI.NO</b></td>
      <td width="84"><b>Type</b></td>
      <td width="86"><b>Date</b></td>
      <td width="111"><b>Content</b></td>
      <td width="75"><b>User</b></td>
      <td width="69"><b>Action</b></td>
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
          <td><?php echo $row["user_name"]?></td>
          <td>
          <a href="ViewArtComplaints.php?cid=<?php echo $row["complaint_id"]?>">Replay</a>
          </td>
       
        </tr>
        <?php
	}
	?>
   
</table>
  
  <p>&nbsp;</p>
  <p>&nbsp;</p>
  <p>&nbsp;</p>
  <p>
    <?php
$selqry="select * from tbl_complaint c inner join tbl_complainttype d on d.complainttype_id=c.complainttype_id inner join tbl_user u on u.user_id=c.user_id where complaint_status='1' and artist_id='".$_SESSION["aid"]."'"; 
$res=$Conn->query($selqry);
?>
  </p>
  <h2><u>Replaied Complaints</u></h2>
  <p>&nbsp;</p>
  <table width="577">
    <tr>
    <td width="86"><b>SI.NO</b></td>
      <td width="97"><b>Type</b></td>
      <td width="77"><b>Date</b></td>
      <td width="121"><b>Content</b></td>
      <td width="76"><b>User</b></td>
      <td width="92"><b>Replay</b></td>
    </tr>
    <?php
	$i=0;
	while($row1=$res->fetch_assoc())
	{
		$i++;
		?>
        <tr>
        <td><?php echo $i?></td>
        <td><?php echo $row1["complainttype_name"]?></td>
        <td><?php echo $row1["complaint_date"]?></td>
         <td><?php echo $row1["complaint_content"]?></td>
          <td><?php echo $row1["user_name"]?></td>
          <td><?php echo $row1["complaint_replay"]?></td>
       
        </tr>
        <?php
	}
	?>
   
</table>
</form>
</div>
</body>
</html>