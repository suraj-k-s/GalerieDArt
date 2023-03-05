<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>GENERE</title>
</head>
<?php
ob_start();
include('../Assets/Connection/Connection.php');
include('Head.php');


$did = "";
$dname = "";

	if(isset($_POST['btn_save']))
	{
		
		$genere = $_POST['txt_genere'];
		
		
			$ins = "insert into tbl_genere(genere_name) values('".$genere."')";
		
			if($Conn->query($ins))
			{
				header("Location:Genere.php");
			}
		
		
		
		
	}
	
	if(isset($_GET['id']))
	{
		$del = "delete from tbl_genere where genere_id = '".$_GET['id']."'";
		if($Conn->query($del))
		{
			header("Location:Genere.php");
		}
	}
	
	

?>
<body>
        <section class="main_content dashboard_part">
            <div class="main_content_iner ">
                <div class="container-fluid p-0">
                    <div class="row justify-content-center">
                        <div class="col-12">
                            <div class="QA_section">
                                <!--Form-->
                                <div class="white_box_tittle list_header">
                                    <div class="col-lg-12">
                                        <div class="white_box mb_30">
                                            <div class="box_header ">
                                                <div class="main-title">
                                                    <h3 class="mb-0" >Table genere</h3>
                                                </div>
                                            </div>
                                            <form method="post">
                                                <div class="form-group">
                                                    <label for="txt_genere">Genere Name</label>
                                                    <input required="" type="text" class="form-control" id="txt_genere" name="txt_genere" autocomplete="off" required>
                                                </div>
                                                <div class="form-group" align="center">
<input type="submit" class="btn-dark" style="width:100px; border-radius: 10px 5px " name="btn_save" value="Save">
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>

                                <div class="QA_table mb_30">
                                    <!-- table-responsive -->
                                    <table class="table lms_table_active">
                                        <thead>
                                            <tr style="background-color: #74CBF9">
                                                <td align="center" scope="col">Sl.No</td>
                                                <td align="center" scope="col">genere</td>
                                                <td align="center" scope="col">Action</td>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                                $i = 0;
                                                $selQry = "select * from tbl_genere ORDER BY genere_name";
                                                $rs = $Conn->query($selQry);
                                                while ($data = $rs->fetch_assoc()) {

                                                    $i++;

                                            ?>
                                            <tr>
                                                <td align="center"><?php echo $i;?></td>
                                                <td align="center"><?php echo $data["genere_name"];?></td>
                                                <td align="center"><a href="Genere.php?id=<?php echo $data["genere_id"];?>" class="status_btn">Delete</a> &nbsp;&nbsp;&nbsp;&nbsp;
</td>                                            </tr>
                                            <?php                    
                                              }


                                            ?>

                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </section>
        <?php
		include('Foot.php');
		 ob_end_flush();
		?>
</body>
</html>