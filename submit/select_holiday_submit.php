<?php
require_once('../include/connect.php');
require_once('../include/view.php');




						
	if (isset($_FILES['file'])) {
							
							require_once "../req/simplexlsx.class.php";
							
							$xlsx = new SimpleXLSX( $_FILES['file']['tmp_name'] );
							
							list($cols,) = $xlsx->dimension();
							
							foreach( $xlsx->rows() as $k => $r) {
								for( $i = 0; $i < $cols; $i++){

									if($i == 0) { $unique_code =  $r[$i]; }
									if($i == 1) { $entry_date =  $r[$i]; }
									if($i == 2) { $attendance =  $r[$i]; }

								}
											
										
								$sql_holiday_insertion = "INSERT INTO `tbl_attendance`(`unique_code`, `entry_date`, `attendance`) VALUES ('".$unique_code."', '".dateconvert($entry_date)."', '".$attendance."')";
								$rs_holiday_insertion = mysql_query($sql_holiday_insertion) or die("ERROR in Holiday Insertion :".mysql_error());

							}

						}
	


?>