


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>
 <?php  
	ob_start();
include('../Assets/Connection/Connection.php');
include('Head.php');
?>

<body>
<br /><br /><br />
<div align="center">
<form id="form1" name="form1" method="post" action="">
<h1><u>Feedback</u></h1>
  <section class="main_content dashboard_part">
            <div class="main_content_iner ">
                <div class="container-fluid p-0">
                    <div class="row justify-content-center">
                        <div class="col-12">
                                <div class="QA_table mb_30">
                                    <!-- table-responsive -->
                                    <table class="table lms_table_active">
                                        <thead>
                                            <tr style="background-color: #74CBF9">
                                                <td align="center" scope="col">Sl.No</td>
                                                <td align="center" scope="col">Content</td>
                                                <td align="center" scope="col">Date</td>
                                                <td align="center" scope="col">User Name</td>
                                            </tr>
                                        </thead>
                                        <tbody>

     <?php
   
  $selQry="select * from tbl_feedback f inner join tbl_user u on u.user_id=f.user_id";
  
  $row=$Conn->query($selQry);
  $i=0;
  while($data=$row->fetch_assoc())
  {
    $i++;
  ?>
    <tr>
      <td align="center"><?php echo $i?></td>
      <td align="center"><?php echo $data["feedback_content"]?></td>
      <td align="center"><?php echo $data["feedback_date"]?></td>
      <td align="center"><?php echo $data["user_name"]?></td>
    </tr>
    <?php
  }
  ?>
  </tbody>
  </table>
 
  </form>
</div>

                        </div>
                    </div>
                </div>
            </div>

        </section>
</body>
 <?php
		include('Foot.php');
		 ob_end_flush();
		?>
</html>