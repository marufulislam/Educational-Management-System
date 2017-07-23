<?php
$sql_Name = "SELECT name,page_link,page_caption FROM `t_modules` where page_link='".$view."'";
$qry_Name = mysql_query($sql_Name);
$page_title = mysql_result($qry_Name, 0, "name");
$page_link = mysql_result($qry_Name, 0, "page_link");
$page_caption = mysql_result($qry_Name, 0, "page_caption");
$page_meta_key = "";
$page_meta_desc = "";
if(isset($_SESSION['com_cbs_aaiam_school_maruf_user_email']) == true){
?>
<div class="page-content"><!-- BEGIN PAGE CONTENT-->        

    <div class="row"> <!-- BEGIN PAGE HEADER-->
    
        <div class="col-md-12"><!-- BEGIN PAGE TITLE & BREADCRUMB-->
        
        	<h3 class="page-title"><?php echo $page_title;?> <small><?php echo $page_caption;?></small></h3>
        
            <ul class="page-breadcrumb breadcrumb">
                <li><i class="icon-home"></i><a href="<?php echo urlroute('home'); ?>">Dashboard</a><i class="icon-angle-right"></i></li>
                
                <li><?php echo $page_title;?></li>
            </ul>
        
        </div><!-- END PAGE TITLE & BREADCRUMB-->
    
    </div><!-- END PAGE HEADER-->
 
 
 
 

<div class="row"> <!-- BEGIN PAGE Option-->
    <div class="col-md-12">
    
        <div class="tabbable tabbable-custom boxless">
        
            <ul class="nav nav-tabs">
                <li class="active"><a href="#tab_0" data-toggle="tab">List</a></li>
                <li><a href="#tab_1" data-toggle="tab">Add New</a></li>
            </ul>
    
            <div class="tab-content">
            	<div class="tab-pane active" id="tab_0">
                
                    <div class="portlet box blue ">
                        <div class="portlet-title">
                            <div class="caption"><i class="icon-reorder"></i>List for <?php echo $page_title;?></div>
                        </div>
                        <div class="portlet-body  flip-scroll">
                            <!-- BEGIN FORM-->
                            <form action=""  class="form-horizontal form-bordered" id="formIDdel" method="post" enctype="multipart/form-data">
                    
                            <table class="table table-bordered table-striped table-condensed flip-content" id="sample_1">
                                <thead class="flip-content">
                                    <tr>
                                        <th><input type="checkbox" class="group-checkable" data-set="#sample_1 .checkboxes" /></th>
                                        <th>Full name</th>
                                        <th>Username</th>
                                        <th>Role</th>
                                        <th>Joined</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php
                                $role = $_SESSION['com_cbs_aaiam_school_maruf_loggedin_user_role'];
								if($role == 1){
									 $sql_user_admin = "SELECT usr.*,rl.role_name FROM user_admin as usr,role as rl WHERE usr.role=rl.role_id";
								}else if($role == 2){
									   $sql_user_admin = "SELECT usr.*,rl.role_name FROM user_admin as usr,role as rl WHERE usr.role=rl.role_id AND role != '1' ";
								}else if($role == 3){
									 $sql_user_admin = "SELECT usr.*,rl.role_name FROM user_admin as usr,role as rl WHERE usr.role=rl.role_id AND role != '1' AND role != '2'";
								}
                               
                                $qry_user_admin = mysql_query($sql_user_admin);
                                while($rowc = mysql_fetch_array($qry_user_admin)){
                                ?>
                                <tr>
                                    <td><input type="checkbox" class="checkboxes" value="1" /></td>
                                    <td><?php echo $rowc['username']?></td>
                                    <td><a href="mailto:<?php echo $rowc['usr_code']?>"><?php echo $rowc['usr_code']?></a></td>
                                    
                                    <td><?php echo $rowc['role_name']?></td>
                                     <td class="center"><?php echo date('jS F, Y',strtotime($rowc['userdate']))?></td>
                                    <td>
                                    <?php if(@$row_access_acs[3] == 'View') {?>
                                        <a 
                                        href="<?php echo urlroute($page_link); ?>&Editid=<?php echo $rowc['userid']; ?>&temp=View"
                                        class="btn btn-xs blue">
                                        <i class="icon-search"></i>
                                        </a>
                                    <?php }?>
                                    
                                    <?php if(@$row_access_acs[1] == 'Edit') {?>
                                        <a onclick="return confirm('Do you want to Edit?')" 
                                        href="<?php echo urlroute('user_management'); ?>&Editid=<?php echo $rowc['userid']; ?>&temp=Save"
                                        class="btn btn-xs green">
                                        <i class="icon-edit"></i>
                                        </a>
                                    <?php }?>
                                    
                                    <?php if(@$row_access_acs[2] == 'Delete' && $rowc['role'] !='1') {?>
                                        <a 	onclick="return confirm('Do you want to Delete?')" 
                                        href="<?php echo urlroute('user_management'); ?>&Deleteid=<?php echo $rowc['userid']; ?>&temp=Delete" 
                                        class="btn btn-xs red">
                                        <i class="icon-trash"></i>
                                        </a>
                                    <?php }?>
                                    </td>
                                </tr>
                                <?php } ?>   
                                </tbody>
                            </table>    
                            
                            </form>
                            <!-- END FORM-->  
                        </div>
                    </div>
                	
                
                </div>
                
                <div class="tab-pane" id="tab_1">
                	<?php
					if(isset($_REQUEST['temp'])){
						if($_REQUEST['temp']=="Save" || $_REQUEST['temp']=="View"){
	
							$Editid = $_REQUEST['Editid'];
							$sqll="SELECT * FROM user_admin WHERE userid='$Editid';";
							$result= mysql_query($sqll);
							$row_uedt=mysql_fetch_array($result);
						}
					}
					?>

                    <div class="portlet box blue ">
                        <div class="portlet-title">
                            <div class="caption"><i class="icon-reorder"></i>Form for <?php echo $page_title;?></div>
                        </div>
                        <div class="portlet-body form">
                            <!-- BEGIN FORM-->
                            <form action="submit/user_management_submit.php" method="POST" class="form-horizontal form-bordered form-label-stripped" id="form_sample_1">
                            <div class="form-body"><!--Begin form-body-->
                            
                            <div class="form_result">
									<?php
                                    if(isset($_REQUEST['temp'])){
                                        if($_REQUEST['temp']=="Delete"){
                                    
										$Deleteid = $_REQUEST['Deleteid'];
										
										$sql_delete="DELETE FROM user_admin WHERE userid='".$Deleteid."'";
										$rs_delete=mysql_query($sql_delete);
										if($rs_delete){
											?>
											<div class="alert alert-success form_success" style="display:block !important">
												<button class="close" data-dismiss="alert"></button> Information Deleted successfully.
											</div>
											<script>
												$(".form_success").hide();
												$(".form-group").slideUp();
												setTimeout(function(){ 
													$('.alert-success').slideUp('slow');
													window.location = '<?php echo urlroute($page_link);?>';
												}, 3000);	
											</script>
											<?php
										}
										
									}
                                    }
                                    ?>
                                </div>
                            
                                <div class="form_result"></div>
                                <div class="alert alert-danger display-hide form_danger">
                                    <button class="close" data-dismiss="alert"></button>You have some form errors. Please check below.
                                </div>
                                <div class="alert alert-success display-hide form_success">
                                    <button class="close" data-dismiss="alert"></button>Your form validation is successful!
                                </div>
                                
                                <!---------------------->
                                <div class="form-group">
                                    <label class="control-label col-md-3">Full Name</label>
                                    <div class="col-md-9">
                                        <input type="text" id="name" class="form-control required" name="name" <?php if(isset($row_uedt['username'])) echo' value="'.$row_uedt['username'].'"';?> placeholder="Full Name" />
                                    </div>
                                </div>
                                
                                <!---------------------->
                                <div class="form-group">
                                    <label class="control-label col-md-3">Username</label>
                                    <div class="col-md-9">
                                        <input type="text" id="email" class="form-control span6 required" name="email" <?php if(isset($row_uedt['usr_code'])) echo' value="'.$row_uedt['usr_code'].'"';?> <?php if(@$_REQUEST['temp']=="Save") echo "disabled";?> placeholder="Username" />
                                    </div>
                                </div>
                                
                                <!---------------------->
                                <div class="form-group">
                                    <label class="control-label col-md-3">Role</label>
                                    <div class="col-md-9">
                                        <select id="role" class="form-control span6 required" name="role" >
                                            <option value="">Select an option</option>
                                            <?php 
                                            $rs = mysql_query("SELECT * FROM role WHERE `role_id` > 1");
                                            while($obj = mysql_fetch_assoc($rs)) {
                                                echo "<option value = '".$obj['role_id']."'";
                                                if(@$row_uedt['role'] == $obj['role_id']) echo "selected='selected'" ; 
                                                echo ">".$obj['role_name']."</option>";          
                                            } 
                                            ?>
                                        </select> 
                                    </div>
                                </div>
                            
                                <!---------------------->
                                <div class="form-group" <?php if(@$_REQUEST['temp']=="Save") echo "style='display:none;'"?>>
                                    <label class="control-label col-md-3">Password</label>
                                    <div class="col-md-9">
                                        <input type="text" id="password" class="form-control span6 required" name="password" <?php if(isset($row_uedt['password'])) echo' value="'.$row_uedt['password'].'"';?> minlength="6" placeholder="Password" />
                                    </div>
                                </div>
                                
                                
                                <!---------------------->
                                <div class="form-group">
                                    <label class="control-label col-md-3">Module Selection</label>
                                    <div class="col-md-9">
                                        <div class="radio-list">
                                             <label class="radio-inline">
                                                <input type="radio" name="chk_all" id="chk_all" value="ck1" class="required toggle" onclick="javascript:fun_selall()"> Select All Modules
                                             </label>
                                             &nbsp;&nbsp;&nbsp;
                                             <label class="radio-inline">
                                                <input type="radio" name="chk_all" id="chk_all" value="ck2"  class="required toggle" onclick="fun_resect()" 
                                                <?php if(@$_REQUEST['temp']=="Save" || @$_REQUEST['temp']=="View") echo 'checked="checked"'?>> Define Module Access Individually
                                             </label> 
                                             
                                          </div>
                                          <span for="chk_all" class="help-inline" style=""></span>
                                    </div>
                                </div>
                                
                                
                                <!---------------------->
                                <div class="form-group">
                                    <label class="control-label col-md-3">All Privilage</label>
                                    <div class="col-md-9">
                                        <select name="sel_lect" id="sel_lect" disabled onchange="javascript:fun_yesall()"  class="form-control span6">
                                            <option value="">Select an option</option>
                                            <option value="Add, Edit, Delete, View">Add, Edit, Delete, View</option>
                                            <option value="Add, Edit, 0, View">Add, Edit, View</option>
                                            <option value="Add, Edit, 0, 0">Add, Edit</option>
                                            <option value="0, Edit, 0, View">Edit, View</option>
                                            <option value="Add, 0, 0, View">Add, View</option>
                                            <option value="Add, 0, 0, 0">Add</option>
                                            <option value="0, Edit, 0, 0">Edit</option>
                                            <option value="0, 0, View, 0">View</option>
                                        </select>
                                    </div>
                                </div>
                                
                                <!---------------------->
                                
                                <div class="row">
                                <?php
                                $uac= array();
                                $umod= array();
                                $sql_user="SELECT * FROM t_user_module WHERE userid='".@$Editid."'";
                                $result_user= mysql_query($sql_user);
                                $j=0;
                                while($row=mysql_fetch_row($result_user)){
                                    $umod[$j]=$row[2];
                                    $uac[$j++]=$row[3];
                                }
                                $i=0;
                                $m=0;
                                
                                $sql_="SELECT moduleid,name FROM t_modules";
                                
                                $result_= mysql_query($sql_);
                                
                                $k=0;
                                while($row=mysql_fetch_array($result_)){
                                $m=0;					 
                                while($m<$j){
                                if($row[0]==$umod[$m]) break;
                                $m++;
                                }
                                if(($k==0)&&($i!=0)) echo '</div><div class="row">';
                                ?>
                                   <div class="col-md-6">
                                        <div class="form-group" <?php //if ( $i % 2 == 0) { echo 'style="width: 106%;"'; } ?>>
                                            <label class="control-label col-md-5 radio-inline">
                                                <input class="checkbox" type="Checkbox" id="chbk<?php echo $i;?>" name="chbk<?php echo $i;?>" 
                                                value="<?php echo $row[0];?>" <?php if(($m<$j)&&(@$_REQUEST['temp']=="Save" || @$_REQUEST['temp']=="View")) echo 'checked';?> 
                                                onclick="javascript:fun_selcng(this,<?php echo $i;?>)" > <?php echo $row[1];?>
                                                
                                            </label>  
                                              
                                            <div class="col-md-7">
                                                <select class="form-control span4" name="sel<?php echo $i;?>" id="sel<?php echo $i;?>" <?php if(!(($m<$j)&&($_REQUEST['temp']=="Save"  || $_REQUEST['temp']=="View"))) echo 'disabled'?>>
                                                                        <option>Select an Option</option>
                                                                        <option value="Add, Edit, Delete, View"
                                                                         <?php if(($m<$j)&&($uac[$m]=="Add, Edit, Delete, View") && (@$_REQUEST['temp']=="Save" || @$_REQUEST['temp']=="View")) echo 'selected'?>>Add, Edit, Delete, View</option>
                                                                
                                                                    <option value="Add, Edit, 0, View" 
                                                                    <?php if(($m<$j)&&($uac[$m]=="Add, Edit, 0, View")&&(@$_REQUEST['temp']=="Save" || @$_REQUEST['temp']=="View")) echo 'selected'?>>Add, Edit, View</option>
                                                                                                                    <option value="Add, Edit, 0, 0"<?php if(($m<$j)&&($uac[$m]=="Add, Edit, 0, 0")&&(@$_REQUEST['temp']=="Save" || @$_REQUEST['temp']=="View")) echo 'selected="selected"'?>>Add, Edit</option>
                                                                
                                                                
                                                                    <option value="0, Edit, 0, View"<?php if(($m<$j)&&($uac[$m]=="0, Edit, 0, View")&&(@$_REQUEST['temp']=="Save" || @$_REQUEST['temp']=="View")) echo 'selected="selected"'?>>Edit, View</option>
                                                                
                                                                    <option value="Add, 0, 0, View"<?php if(($m<$j)&&($uac[$m]=="Add, 0, 0, View")&&(@$_REQUEST['temp']=="Save" || @$_REQUEST['temp']=="View")) echo 'selected'?>>Add, View</option>
                                                                
                                                                    
                                                                
                                                                    <option value="Add, 0, 0, 0"<?php if(($m<$j)&&($uac[$m]=="Add, 0, 0, 0")&&(@$_REQUEST['temp']=="Save" || @$_REQUEST['temp']=="View")) echo 'selected="selected"'?>>Add</option>
                                                                
                                                                
                                                                    <option value="0, Edit, 0, 0"<?php if(($m<$j)&&($uac[$m]=="0, Edit, 0, 0")&&(@$_REQUEST['temp']=="Save" || @$_REQUEST['temp']=="View")) echo 'selected="selected"'?>>Edit</option>
                                                                    
                                                                    <option value="0, 0, 0, View"<?php if(($m<$j)&&($uac[$m]=="0, 0, 0, View")&&(@$_REQUEST['temp']=="Save" || @$_REQUEST['temp']=="View")) echo 'selected="selected"'?>>View</option>
                                                                
                                                                
                    
                                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <!--/span-->
                                <?php
                                $i++;	
                                $k=$i%2;
                                }
                                $kl=2-$k;
                                
                                ?>    
                                <input type="hidden" id="hid_den" name="hid_den" value="<?php echo $i?>">
                                </div>
                                
                   				<input type="hidden" id="Editid" name="Editid" <?php if(isset($_REQUEST['Editid'])) echo' value="'.$_REQUEST['Editid'].'"';?>>
                                <!---------------------->
                                <div class="form-actions right"><!--Begin form-actions-->
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="col-md-offset-3 col-md-9">
                                                <?php
                                                if(@$_REQUEST['temp']=="" && @$row_access_acs[0]=='Add') {
                                                ?>
                                                    <button type="submit" class="btn green" name="temp" id="idsubmitData" value="Add"><i class="icon-plus"></i>&nbsp;Add</button>
                                                <?php
                                                } 
                                                if(@$_REQUEST['temp']=="Save" && @$row_access_acs[1]=='Edit') {
                                                ?>	
                                                    <button type="submit" class="btn blue" name="temp" id="idsubmitData" value="Update"><i class="icon-pencil"></i>&nbsp;Update</button> 
                                                <?php } ?>    
                                                <img src="assets/img/input-spinner.gif" class="gap-right15" id="loader" style="display:none">
                                                <button type="reset" class="btn red" onclick="javascript:location.replace('<?php echo urlroute($page_link); ?>')">
                                                <i class="icon-remove"></i>&nbsp;Cancel
                                                </button>                        
                                            </div>
                                        </div>
                                    </div>
                                </div><!--End form-actions-->
                            </div>  <!--End form-body--> 
                            </form>
                            <!-- END FORM-->  
                        </div>
                    </div>
        		
                </div><!--tab_0-->
                
                <!--tab_1-->
                
                
        	</div><!--tab-content-->
        </div><!--tabbable tabbable-custom boxless-->
        
    </div><!--col-md-12-->
</div> <!-- END PAGE option-->

</div><!-- END PAGE CONTENT-->


<script src="assets/scripts/form-validation.js"></script> 
<script src="assets/pages/user_management.js"></script> 

<script>
jQuery(document).ready(function() {   
 	// initiate layout and plugins
 	FormValidation.init();
	TableManaged.init();
});
</script>
<?php
}else{
?>    

<script type="text/javascript">
location.replace('index.php');
</script>
<?php
}
?>
     

      