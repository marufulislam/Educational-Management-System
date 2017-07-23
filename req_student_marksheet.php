<?php
require_once('include/connect.php');
require_once('include/functions.php');

$class_name = $_GET['class_name'];
$section_name = $_GET['section_name'];
$group_name = $_GET['group_name'];
$shift_name = $_GET['shift_name'];
$student_name = $_GET['student_name'];
$term_name = $_GET['term_name'];
$exam_year = $_GET['exam_year'];
$uniqueToken = generateUniqueToken(10);


/*school information start*/
$qry_school=mysql_query("SELECT * FROM req_company") or die(mysql_error());
$rw_school=mysql_fetch_array($qry_school);

/*student information start*/
$qry_student=mysql_query("SELECT * FROM tbl_student_info WHERE student_id='".$student_name."'") or die(mysql_error());
$rw_student=mysql_fetch_array($qry_student);

/*student information start*/
$qry_cls = mysql_query("SELECT * FROM tbl_class WHERE class_id='".$class_name."'") or die(mysql_error());
$rw_cls = mysql_fetch_array($qry_cls);
 $rw_cls['class_name'];
 
/*student section start*/ 
$qry_sec = mysql_query("SELECT `section_name` FROM tbl_section WHERE section_id='".$section_name."'") or die(mysql_error());
$rw_sec = mysql_fetch_array($qry_sec);
$rw_sec['section_name'];

/*student group start*/ 
$qry_grp = mysql_query("SELECT `group_name` FROM tbl_group WHERE group_id='".$group_name."'") or die(mysql_error());
$rw_grp = mysql_fetch_array($qry_grp);
$rw_grp['group_name'];

/*student Shift start*/ 		
$qry_sft = mysql_query("SELECT `shift_name` FROM tbl_shift WHERE shift_id='".$shift_name."'") or die(mysql_error());
$rw_sft = mysql_fetch_array($qry_sft);
$rw_sft['shift_name'];

/*session find start*/
$qry_session=mysql_query("SELECT session_id,session_name FROM tbl_session WHERE session_id='".$exam_year."'") or die(mysql_error());
$rw_session=mysql_fetch_array($qry_session);

/*Term find start*/
$qry_term=mysql_query("SELECT term_name,isActive FROM tbl_term WHERE term_id='".$term_name."'") or die(mysql_error());
$rw_term=mysql_fetch_array($qry_term);

?>

<html><head>
<title>Education Board Bangladesh</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<meta name="keywords" content="">
<link href="assets/css/lib/style.css" rel="stylesheet" type="text/css">
</head>
<body>
<table width="690" border="0" align="center" cellpadding="0" cellspacing="0">
  <tbody><tr>
    <td><table width="690" border="0" align="center" cellpadding="0" cellspacing="0" bgcolor="#FFFFFF">
      <tbody><tr>
        <td width="12" align="left" valign="top" background="images/back_cor_left_top.gif"><img src="img/trans.gif" width="12" height="12"></td>
        <td valign="top" background="images/back_top.gif"><img src="img/trans.gif" width="12" height="12"></td>
        <td width="12" align="right" valign="top" background="images/back_cor_right_top.gif"><img src="img/trans.gif" width="12" height="12"></td>
      </tr>
      <tr>
        <td align="left" valign="top" background="images/back_left.gif">&nbsp;</td>
        <td valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tbody><tr>
            <td width="142" height="121" align="center" valign="middle" bgcolor="#EEEEEE" class="left_round"><img src="../images/<?php echo $rw_school['sLogo'];?>" width="82" height="82"></td>
            <td width="2"><img src="img/trans.gif" width="2" height="1"></td>
            <td valign="top" bgcolor="#007814"><table width="100%" border="0" cellspacing="0" cellpadding="0">
              <tbody><tr>
                <td align="right"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                  <tbody><tr>
                    <td align="left" valign="bottom"><h1 id="site_title_des"><?php echo $rw_school['tComapanyName'];?></h1></td>
                    <td align="right" valign="top"><!--<img src="http://test.edu.bd/upload/institute_logo/Mainertek_High_School_logo.jpg" width="220" height="41" hspace="0" vspace="0" border="0">--></td>
                  </tr>
                </tbody></table></td>
              </tr>
              <tr>
                <td align="left" bgcolor="#479e55"><img src="img/trans.gif" width="1" height="1"></td>
              </tr>
              <tr>
                <td height="55" align="left"><h1 id="site_title"> <?php echo $rw_school['address'];?></h1></td>
              </tr>
              <tr>
                <td align="right"><table width="100%" border="0" cellpadding="0" cellspacing="0">
                </table></td>
              </tr>
              <tr>
                <td align="right" bgcolor="#FFFFFF"><img src="img/trans.gif" width="1" height="1"></td>
              </tr>
              <tr>
                <td height="23" align="right" bgcolor="#86C775" class="bar_bk"><a href="" class="links02"><?php echo $rw_school['slogan'];?></a>&nbsp;</td>
              </tr>
            </tbody></table></td>
          </tr>
        </tbody></table>
          <img src="img/trans.gif" width="1" height="1"></td>
        <td align="right" valign="top" background="images/back_right.gif">&nbsp;</td>
      </tr>
    </tbody></table></td>
  </tr>
  <tr>
    <td><table width="650" border="0" align="center" cellpadding="0" cellspacing="0" bgcolor="#FFFFFF">
      <tbody><tr>
        <td width="12" align="left" valign="top" background="images/back_left.gif">&nbsp;</td>
        <td valign="top">
          <table width="100%" border="0" cellspacing="0" cellpadding="0">
            <tbody><tr>
              <td height="50" align="center" valign="middle" class="black16bold"><?php echo $rw_term['term_name'];?> Exam. Result Sheet <?php echo $rw_session['session_name'] ;?></td>
            </tr>
            <tr>
              <td align="center" valign="middle"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                <tbody><tr>
                  <td align="center" valign="middle"><table width="100%" border="0" cellpadding="3" cellspacing="1" class="black12">
                    <tbody><tr>
                      <td width="12%" align="left" valign="middle" bgcolor="#EEEEEE">Roll No</td>
                      <td width="27%" align="left" valign="middle" bgcolor="#EEEEEE"><?php echo $rw_student['student_class_roll'];?></td>
                      <td width="22%" align="left" valign="middle" bgcolor="#EEEEEE">Name</td>
                      <td width="39%" align="left" valign="middle" bgcolor="#EEEEEE"><?php echo $rw_student['student_name'];?></td>
                    </tr>
                    <tr>
                      <td align="left" valign="middle" bgcolor="#EEEEEE">Class</td>
                      <td align="left" valign="middle" bgcolor="#EEEEEE"><?php echo $rw_cls['class_name'];?></td>
                      <td align="left" valign="middle" bgcolor="#EEEEEE">Section</td>
                      <td align="left" valign="middle" bgcolor="#EEEEEE"><?php echo $rw_sec['section_name'];?></td>
                    </tr>
                    <tr>
                      <td align="left" valign="middle" bgcolor="#EEEEEE">Group</td>
                      <td align="left" valign="middle" bgcolor="#EEEEEE"><?php echo $rw_grp['group_name'];?></td>
                      <td align="left" valign="middle" bgcolor="#EEEEEE">Shift</td>
                      <td align="left" valign="middle" bgcolor="#EEEEEE"><?php echo $rw_sft['shift_name'];?></td>
                    </tr>
                    
                   <!-- <tr>
                      <td align="left" valign="middle" bgcolor="#EEEEEE">Type</td>
                      <td align="left" valign="middle" bgcolor="#EEEEEE">REGULAR</td>
                      <td align="left" valign="middle" bgcolor="#EEEEEE">Date of Birth</td>
                      <td align="left" valign="middle" bgcolor="#EEEEEE">19-05-1991</td>
                    </tr>-->
                    
                   <?php
							 
					 $qry_sum_gpa = mysql_query("SELECT SUM(subject_gpa) AS value_sum FROM tbl_full_marks WHERE student_name='".$student_name."' AND class_name='".$class_name."' AND section_name='".$section_name."' AND shift_name='".$shift_name."' AND group_name='".$group_name."' AND term_name='".$term_name."' AND exam_year='".$exam_year."'");
						
					 $rw_sum_gpa = mysql_fetch_assoc($qry_sum_gpa);
					 $gpa_sum = $rw_sum_gpa['value_sum']; echo '&nbsp;&nbsp;&nbsp;&nbsp;';
					 
							 
							  /*$qry_cnt = mysql_query("SELECT * FROM student_sub_assign WHERE student_id='".$student_name."' AND class_id='".$class_name."' AND sec_id='".$section_name."' AND shift_id='".$shift_name."' AND group_id='".$group_name."'") or die(mysql_error());
					 $cnt = mysql_num_rows($qry_cnt); echo '&nbsp;&nbsp;&nbsp;&nbsp;';*/
					 
					
					
					
							 
                           if($rw_cls['class_short_form'] >= 6){?> 
                     <?php
					    $qry_grp=mysql_query("SELECT `optional_sub` FROM tbl_student_info WHERE student_id='".$student_name."'") or die(mysql_error());  $rw_grp=mysql_fetch_array($qry_grp);
						
						 $rw_grp['optional_sub'];
						
						$qry_optionsub=mysql_query("SELECT `subject_gpa` FROM `tbl_full_marks` WHERE student_name='".$student_name."' AND class_name='".$class_name."' AND section_name='".$section_name."' AND shift_name='".$shift_name."' AND group_name='".$group_name."' AND subject_name='".$rw_grp['optional_sub']."' AND term_name='".$term_name."' AND exam_year='".$exam_year."'") or die(mysql_error());
						$rw_optionsub=mysql_fetch_array($qry_optionsub);
						
						 $rw_optionsub['subject_gpa'];
						
						if($rw_optionsub['subject_gpa'] == 5.00){
							$cgpa = numFormat($gpa_sum - 2.00);
							 $cgpa;
						   }
					   else if($rw_optionsub['subject_gpa'] == 4.00){
						 $cgpa = numFormat($gpa_sum - 2.00);
							 $cgpa;
						   }
					   else if($rw_optionsub['subject_gpa'] == 3.50){
						 $cgpa = numFormat($gpa_sum - 2.00);
							 $cgpa;
						   }
					   else if($rw_optionsub['subject_gpa'] == 3.00){
						 $cgpa = numFormat($gpa_sum - 2.00);
							 $cgpa;
						   }
					 else {$cgpa =  numFormat(($gpa_sum - $rw_optionsub['subject_gpa']));
					         $cgpa;
						   }
					 
					 ?>
                    
                    <tr>
                      <td align="left" valign="middle" bgcolor="#EEEEEE">Result</td>
                      <td align="left" valign="middle" bgcolor="#EEEEEE" class="black12bold">
                       <?php
                           $qry_having_res = mysql_query("SELECT `subject_grade` FROM `tbl_full_marks` WHERE student_name='".$student_name."' AND class_name='".$class_name."' AND section_name='".$section_name."' AND shift_name='".$shift_name."' AND group_name='".$group_name."' AND term_name='".$term_name."' AND exam_year='".$exam_year."' AND subject_grade='F'") or die(mysql_error());
						   
					   if(mysql_num_rows($qry_having_res) > 0){
						   echo "F";
						   }else{
							  echo "GPA=&nbsp;&nbsp;";echo $total_gpa =  numFormat(($cgpa)/$rw_cls['num_of_subject']); 
							   }
						
						?>

                      </td>
                      <td align="left" valign="middle" bgcolor="#EEEEEE"><!--GRADE--></td>
                      <td align="left" valign="middle" bgcolor="#EEEEEE" class="black12bold" colspan="3"> </td>
                    </tr>
                     <?php }else {?> 

                    
                    <tr>
                      <td align="left" valign="middle" bgcolor="#EEEEEE">Result</td>
                      <td align="left" valign="middle" bgcolor="#EEEEEE" class="black12bold">
                        <?php
                           $qry_having_res = mysql_query("SELECT `subject_grade` FROM `tbl_full_marks` WHERE student_name='".$student_name."' AND class_name='".$class_name."' AND section_name='".$section_name."' AND shift_name='".$shift_name."' AND group_name='".$group_name."' AND term_name='".$term_name."' AND exam_year='".$exam_year."' AND subject_grade='F'") or die(mysql_error());
						   
						   if(mysql_num_rows($qry_having_res) > 0){
							   echo "F";
							   }else{
								  echo "GPA=&nbsp;&nbsp;";echo $total_gpa =  numFormat(($gpa_sum)/$rw_cls['num_of_subject']); 
								   }
						
						?>
                      
                        
                      </td>
                      <td align="left" valign="middle" bgcolor="#EEEEEE"><!--GRADE--></td>
                      <td align="left" valign="middle" bgcolor="#EEEEEE" class="black12bold" colspan="3"> </td>
                    </tr>
                    <?php }?>  

                   
                  </tbody></table></td>
                </tr>
                <tr>
                  <td height="40" align="center" valign="middle"><span class="black16bold"></span></td>
                </tr>
                <tr>
                  <td align="center" valign="middle"><table width="100%" border="0" cellpadding="3" cellspacing="1" class="black12">
                    <tbody><tr class="black12bold">
<!--                    <td width="19%" align="left" valign="middle" bgcolor="#AFB7BE">Code</td>
-->                     <td width="25%" align="left" valign="middle" bgcolor="#AFB7BE">Subject</td>

                        <td width="5%" align="left" valign="middle" bgcolor="#AFB7BE">CT Marks</td>
                        <td width="5%" align="left" valign="middle" bgcolor="#AFB7BE">Mid Term</td>
                        <td width="5%" align="left" valign="middle" bgcolor="#AFB7BE"><?php echo $rw_term['term_name'];?> Final</td>

                        
                        <!--<td width="5%" align="left" valign="middle" bgcolor="#AFB7BE">Highest Marks</td>-->
                         <?php if($rw_term['isActive'] != 0){?>
                        <td width="5%" align="left" valign="middle" bgcolor="#AFB7BE">Highest marks</td>
                        <td width="5%" align="left" valign="middle" bgcolor="#AFB7BE">Grade</td>
                        <td width="5%" align="left" valign="middle" bgcolor="#AFB7BE">GP</td>
                        <?php }?>
                    </tr>
                    <?php 

					$sql_user_admin = "SELECT * FROM `tbl_full_marks` WHERE student_name='".$student_name."' AND class_name='".$class_name."' AND section_name='".$section_name."' AND shift_name='".$shift_name."' AND group_name='".$group_name."' AND exam_year='".$exam_year."'";
						$qry_user_admin = mysql_query($sql_user_admin);
						
						while($row = mysql_fetch_array($qry_user_admin)){
							//$str = $row['student_id'];
							 //$pk = str_pad($str,5,"0",STR_PAD_LEFT);

					 
					 ?>
					<tr>
                      
                      <td align="left" valign="middle" bgcolor="#DEE1E4">
                         <?php
                          $qry_sub_name = mysql_query("SELECT `subject_name` FROM `tbl_subject` WHERE `subject_id` = '".$row['subject_name']."'") or die(mysql_error());
					  $row_sub_name = mysql_fetch_array($qry_sub_name);
					  echo $row_sub_name['subject_name'];
						?>
                      </td>

                      <td align="left" valign="middle" bgcolor="#DEE1E4"><?php echo $row['ct_marks1'];?> </td>
                      <td align="left" valign="middle" bgcolor="#DEE1E4"><?php echo $row['ct_marks2'];?> </td>

                      <td align="left" valign="middle" bgcolor="#DEE1E4"><?php echo $row['integration'];?> </td>
                      
                      <?php if($rw_term['isActive'] != 0){?>
                      <td align="left" valign="middle" bgcolor="#DEE1E4">
                         <?php 
					   $qry_highest = mysql_query("SELECT MAX( integration ) AS max FROM `tbl_full_marks` WHERE class_name='".$class_name."' AND `subject_name` = '".$row['subject_name']."'") or die(mysql_error());
					   $row_highest = mysql_fetch_array( $qry_highest );
                       echo $largestNumber = $row_highest['max'];

					 ?>
                      </td>
                      <td align="left" valign="middle" bgcolor="#DEE1E4"><?php echo $row['subject_grade'];?> </td>
                       <td align="left" valign="middle" bgcolor="#DEE1E4"><?php echo $row['subject_gpa'];?> </td>
                      <?php }?> 
                    </tr>
                    
                    <?php }?>
                             
                  </tbody></table></td>
                </tr>
              </tbody></table></td>
            </tr>
            <tr>
             <!-- <td align="center" valign="middle" height="40"><a href="" class="links">Search Again</a></td>-->
            </tr>
            
            <tr>
              <td><table width="750" border="0" cellspacing="0" cellpadding="0">
                <tbody><tr bgcolor="#86c775">
                  <td colspan="5"><img src="img/trans.gif" width="1" height="5"></td>
                </tr>
                <tr>
                  <td colspan="5"><img src="img/trans.gif" width="1" height="1"></td>
                </tr>
                
                
                
                
                <tr>
                <td width="5" align="left" valign="bottom" bgcolor="#F2F2F2" class="footer_text"><img src="img/footer_corner_left.gif" width="5" height="5"></td>
                      <td width="30%" align="left" valign="middle" bgcolor="#EEEEEE"></td>

                      <td width="30%" align="left" valign="middle" bgcolor="#EEEEEE"></td>
                      <td width="20%" align="left" valign="middle" bgcolor="#EEEEEE"></td>
                       <td width="5" align="left" valign="bottom" bgcolor="#F2F2F2" class="footer_text"><img src="img/footer_corner_right.gif" width="5" height="5"></td>
                    </tr>
                
                <tr> <td width="5" align="left" valign="bottom" bgcolor="#F2F2F2" class="footer_text"><img src="img/footer_corner_left.gif" width="5" height="5"></td>
                      <td width="30%" align="left" valign="middle" bgcolor="#EEEEEE">Guardian's Signature</td>
                      <td width="30%" align="left" valign="middle" bgcolor="#EEEEEE">Class Teacher's Signature</td>
                      <td width="20%" align="left" valign="middle" bgcolor="#EEEEEE">Head Teacher</td>
                       <td width="5" align="left" valign="bottom" bgcolor="#F2F2F2" class="footer_text"><img src="img/footer_corner_right.gif" width="5" height="5"><img src="img/footer_corner_right.gif" width="5" height="5"></td>
                    </tr>
                    
                
              </tbody></table></td>
            </tr>
            
            <tr>
              <td><table width="750" border="0" cellspacing="0" cellpadding="0">
                <tbody><tr bgcolor="#86c775">
                  <td colspan="5"><img src="img/trans.gif" width="1" height="5"></td>
                </tr>
                <tr>
                  <td colspan="5"><img src="img/trans.gif" width="1" height="1"></td>
                </tr>
                <tr>
                  <td width="5" align="left" valign="bottom" bgcolor="#F2F2F2" class="footer_text"><img src="img/footer_corner_left.gif" width="5" height="5"></td>
                  <td width="356" height="70" align="left" valign="middle" bgcolor="#F2F2F2" class="footer_text">©2016 All rights reserved.</td>
                  <td width="150" height="70" align="right" valign="middle" bgcolor="#F2F2F2" class="footer_text">Powered by<img src="img/footer_corner_right.gif" width="5" height="5"></td>
                  <td width="110" height="70" align="center" valign="middle" bgcolor="#F2F2F2"><img src="img/logo.png" width="83" height="44"></td>
				  <td width="5" align="left" valign="bottom" bgcolor="#F2F2F2" class="footer_text"><img src="img/footer_corner_right.gif" width="5" height="5"></td>
                </tr>
              </tbody></table></td>
            </tr>
            
            
            
          </tbody></table></td>
        <td width="12" align="right" valign="top" background="img/back_right.gif">&nbsp;</td>
      </tr>
      <tr>
        <td align="left" valign="top" background="img/back_cor_left_bot.gif"><img src="img/trans.gif" width="12" height="12"></td>
        <td valign="top" background="img/back_bot.gif"><img src="img/trans.gif" width="12" height="12"></td>
        <td align="right" valign="top" background="img/back_cor_right_bot.gif"><img src="img/trans.gif" width="12" height="12"></td>
      </tr>
      
    </tbody></table></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
  </tr>
</tbody></table>

 
</body></html>


