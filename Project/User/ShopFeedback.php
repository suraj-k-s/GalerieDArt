<?php
ob_start();
include("Head.php");
include("../Assets/Connection/Connection.php");
session_start();

if(isset($_POST["btnsubmit"]))
{
    $content=$_POST["txtcontent"];
    $insQry="insert into tbl_feedback(feedback_date,feedback_content,user_id,shop_id)values(curdate(),'".$content."','".$_SESSION["uid"]."','".$_SESSION["sid"]."')";
    echo $insQry;
      if($Conn->query($insQry))
      {  
	  ?>
              <script>
        alert('Inserted');
        location.href='Feedback.php';
        </script>
              <?php
        
      }
      else
      {   
      ?>
              <script>
        alert('Failed');
        location.href='Feedback.php';
        </script>
                <?Php
             }
}
?>




<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Feedback</title>
</head>

<body>
<form id="form1" name="form1" method="post" action="">
  <br><br>
  <div id="tab" align="center">
 <h1><u>FeedBack</u></h1>
 <p>&nbsp;</p>
 
    <table>
     
      <tr>
        <td><b>FeedBack</b></td>
        <td><label for="txtcontent"></label>
        <textarea name="txtcontent" id="txtcontent" cols="45" rows="5" autocomplete="off" required style="resize:none"></textarea></td>
      </tr>
      <tr>
        <td align="center"colspan="2"><input type="submit" name="btnsubmit" id="btnsubmit" value="Submit" /></td>
      </tr>
    </table>
<p>&nbsp;</p>
  <?php
  $selQry="select * from tbl_feedback f inner join tbl_user m on f.user_id=m.user_id";
  $rel=$Conn->query($selQry);
  if($rel->num_rows>0)
  {
?>
  <table>
    <tr>
      <td width="54"><b>Sl.No</b></td>
      <td width="75"><b>Date</b></td>
       <td width="107"><b>FeedBack</b></td>
     
    </tr>
    <?php
  $i=0;
  
  while($row=$rel->fetch_assoc())
  {
    $i++;
?>
<tr>
  <td><?php echo $i?></td>  
    <td><?php echo $row["feedback_date"]?></td> 
     <td><?php echo $row["feedback_content"]?></td> 
  


</tr>
<?php
  }
   }
   else
   {
     echo "<h1 align='center'>No Data Found<h1>";
   }

?>   
  </table>
  <p>&nbsp;</p>
</form>
</div>
</body>
</html>