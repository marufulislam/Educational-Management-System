<?php
$sql_Name = "SELECT name,page_link,page_caption FROM `t_modules` where page_link='".$view."'";
$qry_Name = mysql_query($sql_Name);
$page_title = mysql_result($qry_Name, 0, "name");
$page_link = mysql_result($qry_Name, 0, "page_link");
$page_caption = mysql_result($qry_Name, 0, "page_caption");
$page_meta_key = "";
$page_meta_desc = "";
if(isset($_SESSION['com_cbs_aaiam_school_maruf_user_email']) == true)
{
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
                <li class="active"><a href="#tab_0" data-toggle="tab">Form Actions</a></li>
                <li><a href="#tab_1" data-toggle="tab">List</a></li>
                <li><a href="#tab_2" data-toggle="tab">Backup Restore</a></li>
            </ul>
    
            <div class="tab-content">
            	
                <div class="tab-pane active" id="tab_0">
                	<?php
					if(isset($_REQUEST['temp'])){
						if($_REQUEST['temp']=="Save" || $_REQUEST['temp']=="View"){
	
							$Editid = $_REQUEST['Editid'];
							$sql_view = "SELECT * FROM t_modules WHERE moduleid='$Editid';";
							$qry_view = mysql_query($sql_view) or die("Error in view ->".mysql_error());
							$rs_view = mysql_fetch_array($qry_view);
						}
					}
					?>

                    <div class="portlet box blue ">
                        <div class="portlet-title">
                            <div class="caption"><i class="icon-reorder"></i>Form for <?php echo $page_title;?></div>
                        </div>
                        <div class="portlet-body form">
                            <!-- BEGIN FORM-->
                            <form action="submit/module_entry_submit.php" method="POST" class="form-horizontal form-bordered form-label-stripped" id="form_sample_1">
                            <div class="form-body"><!--Begin form-body-->
                                <div class="form_result"></div>
                                <div class="alert alert-danger display-hide form_danger">
                                    <button class="close" data-dismiss="alert"></button>You have some form errors. Please check below.
                                </div>
                                <div class="alert alert-success display-hide form_success">
                                    <button class="close" data-dismiss="alert"></button>Your form validation is successful!
                                </div>
                                
                                <!---------------------->
                                <div class="form-group">
                                    <label class="control-label col-md-3">Module Name</label>
                                    <div class="col-md-9">
                                        <input type="text" id="name" class="form-control required" name="name" 
                                        value="<?php if (isset($rs_view["name"])) echo $rs_view["name"]; ?>"/>
                                    </div>
                                </div>
                                
                                <!---------------------->
                                <div class="form-group">
                                    <label class="control-label col-md-3">Page Link</label>
                                    <div class="col-md-9">
                                        <input type="text" id="page_link" class="form-control required" name="page_link" 
                                        value="<?php if (isset($rs_view["page_link"])) echo $rs_view["page_link"]; ?>"/>
                                    </div>
                                </div>
                                
                                <!---------------------->
                                <div class="form-group">
                                    <label class="control-label col-md-3">Report</label>
                                    <div class="col-md-9">
                                        <label class="radio-inline">
                                            <input type="radio" name="is_report" id="is_report_form" value="1" class="required toggle" checked="checked"> Form
                                        </label>
                                        <label class="radio-inline">
                                            <input type="radio" name="is_report" id="is_report_rpt" value="2" class="required toggle" > Report
                                        </label>
                                        <label class="radio-inline">
                                            <input type="radio" name="is_report" id="is_report_rpt" value="0" class="required toggle" > None
                                        </label>
                                    </div>
                                </div>
                                
                                <!---------------------->
                                <div class="form-group">
                                    <label class="control-label col-md-3">Category</label>
                                    <div class="col-md-9">
                                        <label class="radio-inline">
                                            <input type="radio" name="is_main" id="category_main" value="1" class="required toggle" checked="checked" onclick="show_option(this.id)"> Main
                                        </label>
                                        <label class="radio-inline">
                                            <input type="radio" name="is_main" id="category_sub" value="0" class="required toggle" onclick="show_option(this.id)"> Sub
                                        </label>
                                    </div>
                                </div>
                                
                                <!---------------------->
                                <div class="form-group display-hide menu_hierarchy">
                                    <label class="control-label col-md-3">Main Menu</label>
                                    <div class="col-md-9">
                                        <select id="menu" class="form-control span6 required" name="menu" disabled="disabled" >
                                            <option value="">Select an option</option>
                                            <?php 
                                            $rs = mysql_query("SELECT * FROM t_modules");
                                            while($obj = mysql_fetch_assoc($rs)) {
                                                echo "<option value = '".$obj['moduleid']."'";
                                                if(@$$rs_view['main_menu'] == $obj['moduleid']) echo "selected='selected'" ; 
                                                echo ">".$obj['name']."</option>";          
                                            } 
                                            ?>
                                        </select> 
                                    </div>
                                </div>
                                
                                <!---------------------->
                                <div class="form-group">
                                    <label class="control-label col-md-3">Icon</label>
                                    <div class="col-md-9">
                                       
                                        <select name="icon" id="select2_sample_modal_4" class="form-control select2">
                                             <option value="">Select an option</option>
                                             <option value="icon-compass">icon-compass</option>
                                             <option value="icon-collapse">icon-collapse</option>
                                             <option value="icon-collapse-top">icon-collapse-top</option>
                                             <option value="icon-expand">icon-expand</option>
                                             <option value="icon-eur">icon-eur</option>
                                             <option value="icon-euro (alias)">icon-euro (alias)</option>
                                             <option value="icon-gbp">icon-gbp</option>
                                             <option value="icon-usd">icon-usd</option>
                                             <option value="icon-dollar (alias)">icon-dollar (alias)</option>
                                             <option value="icon-inr">icon-inr</option>
                                             <option value="icon-rupee (alias)">icon-rupee (alias)</option>
                                             <option value="icon-jpy">icon-jpy</option>
                                             <option value="icon-cny">icon-cny</option>
                                             <option value="icon-krw">icon-krw</option>
                                             <option value="icon-btc"> icon-btc</option>
                                             <option value="icon-file">icon-file</option>
                                             <option value="icon-file-text">icon-file-text</option>
                                             <option value="icon-thumbs-down">icon-thumbs-down</option>
                                             <option value="icon-youtube-sign">icon-youtube-sign</option>
                                             <option value="icon-youtube">icon-youtube</option>
                                             <option value="icon-youtube-play">icon-youtube-play</option>
                                             <option value="icon-dropbox">icon-dropbox</option>
                                             <option value="icon-stackexchange">icon-stackexchange</option>
                                             <option value="icon-instagram">icon-instagram</option>
                                             <option value="icon-flickr">icon-flickr</option>
                                             <option value="icon-adn">icon-adn</option>
                                             <option value="icon-bitbucket">icon-bitbucket</option>
                                             <option value="icon-instagram">icon-instagram</option>
                                             <option value="icon-bitbucket-sign">icon-bitbucket-sign</option>
                                             <option value="icon-tumblr">icon-tumblr</option>
                                             <option value="icon-tumblr-sign">icon-tumblr-sign</option>
                                             <option value="icon-long-arrow-right">icon-long-arrow-right</option>
                                             <option value="icon-apple">icon-apple</option>
                                             <option value="icon-windows">icon-windows</option>
                                             <option value="icon-android">icon-android</option>
                                             <option value="icon-linux">icon-linux</option>
                                             <option value="icon-dribbble">icon-dribbble</option>
                                             <option value="icon-skype">icon-skype</option>
                                             <option value="icon-foursquare">icon-foursquare</option>
                                             <option value="icon-trello">icon-trello</option>
                                             <option value="icon-female">icon-female</option>
                                             <option value="icon-male">icon-male</option>
                                             <option value="icon-gittip">icon-gittip</option>
                                             <option value="icon-sun">icon-sun</option>
                                             <option value="icon-moon">icon-moon</option>
                                             <option value="icon-archive">icon-archive</option>
                                             <option value="icon-bug">icon-bug</option>
                                             <option value="icon-weibo">icon-weibo</option>
                                             <option value="icon-renren">icon-renren</option>
                                             <option value="icon-money">icon-money</option>
                                             <option value="icon-exclamation-sign">icon-exclamation-sign</option>
                                             <option value="icon-signal">icon-signal</option>
                                             <option value="icon-asterisk">icon-asterisk</option>
                                             <option value="icon-move">icon-move</option>
                                             <option value="icon-signin">icon-signin</option>
                                             <option value="icon-music">icon-music</option>
                                             <option value="icon-signout">icon-signout</option>
                                             <option value="icon-bar-chart">icon-bar-chart</option>
                                             <option value="icon-eye-open">icon-eye-open</option>
                                             <option value="icon-off">icon-off</option>
                                             <option value="icon-sitemap">icon-sitemap</option>
                                             <option value="icon-barcode">icon-barcode</option>
                                             <option value="icon-facetime-video">icon-facetime-video</option>
                                             <option value="icon-ok">icon-ok</option>
                                             <option value="icon-sort">icon-sort</option>
                                             <option value="icon-beaker">icon-beaker</option>
                                             <option value="icon-film">icon-film</option>
                                             <option value="icon-ok-circle">icon-ok-circle</option>
                                             <option value="icon-bell">icon-bell</option>
                                             <option value="icon-ok-sign">icon-ok-sign</option>
                                             <option value="icon-bolt">icon-bolt</option>
                                             <option value="icon-fire">icon-fire</option>
                                             <option value="icon-pencil">icon-pencil</option>
                                             <option value="icon-star">icon-star</option>
                                             <option value="icon-book">icon-book</option>
                                             <option value="icon-flag">icon-flag</option>
                                             <option value="icon-picture">icon-picture</option>
                                             <option value="icon-star-empty">icon-star-empty</option>
                                             <option value="icon-folder-close">icon-folder-close</option>
                                             <option value="icon-folder-open">icon-folder-open</option>
                                             <option value="icon-briefcase">icon-briefcase</option>
                                             <option value="icon-gift">icon-gift</option>
                                             <option value="icon-plus-sign">icon-plus-sign</option>
                                             <option value="icon-tags">icon-tags</option>
                                             <option value="icon_book">icon-bullhorn</option>
                                             <option value="icon-bullhorn">icon-bullhorn</option>
                                             <option value="icon-glass">icon-glass</option>
                                             <option value="icon-print">icon-print</option>
                                             <option value="icon-tasks">icon-tasks</option>
                                             <option value="icon-pushpin">icon-pushpin</option>
                                             <option value="icon-globe">icon-globe</option>
                                             <option value="icon-calendar">icon-calendar</option>
                                             <option value="icon-camera">icon-camera</option>
                                             <option value="icon-group">icon-group</option>
                                             <option value="icon-qrcode">icon-qrcode</option>
                                             <option value="icon-thumbs-up">icon-thumbs-up</option>
                                             <option value="icon-camera-retro">icon-camera-retro</option>
                                             <option value="icon-hdd">icon-hdd</option>
                                             <option value="icon-time">icon-time</option>
                                             <option value="icon-certificate">icon-certificate</option>
                                             <option value="icon-headphones">icon-headphones</option>
                                             <option value="icon-random">icon-random</option>
                                             <option value="icon-tint">icon-tint</option>
                                             <option value="icon-check">icon-check</option>
                                             <option value="icon-heart">icon-heart</option>
                                             <option value="icon-refresh">icon-refresh</option>
                                             <option value="icon-trash">icon-trash</option>
                                             <option value="icon-heart-empty">icon-heart-empty</option>
                                             <option value="icon-remove">icon-remove</option>
                                             <option value="icon-trophy">icon-trophy</option>
                                             <option value="icon-cloud">icon-cloud</option>
                                             <option value="icon-home">icon-home</option>
                                             <option value="icon-remove-circle">icon-remove-circle</option>
                                             <option value="icon-truck">icon-truck</option>
                                             <option value="icon-cog">icon-cog</option>
                                             <option value="icon-inbox">icon-inbox</option>
                                             <option value="icon-remove-sign">icon-remove-sign</option>
                                             <option value="icon-umbrella">icon-umbrella</option>
                                             <option value="icon-cogs">icon-cogs</option>
                                             <option value="icon-info-sign">icon-info-sign</option>
                                             <option value="icon-reorder">icon-reorder</option>
                                             <option value="icon-upload">icon-upload</option>
                                             <option value="icon-upload-alt">icon-upload-alt</option>
                                             <option value="icon-key">icon-key</option>
                                             <option value="icon-comment">icon-comment</option>
                                             <option value="icon-github">icon-github</option>
                                             <option value="icon-google-plus-sign">icon-google-plus-sign</option>
                                             <option value="icon-medkit">icon-medkit</option>
                                             <option value="icon-weibo">icon-weibo</option>
                                             <option value="icon-youtube-play">icon-youtube-play</option>
                                             <option value="icon-leaf">icon-leaf</option>
                                             <option value="icon-key">icon-key</option>
                                             <option value="icon-comment">icon-comment</option>
                                             <option value="icon-remove-sign">icon-remove-sign</option>
                                             <option value="icon-rss">icon-rss</option>
                                             <option value="icon-road">icon-road</option>
                                             <option value="icon-user-md">icon-user-md</option>
                                             <option value="icon-legal">icon-legal</option>
                                             <option value="icon-lemon">icon-lemon</option>
                                             <option value="icon-comments-alt">icon-comments-alt</option>
                                             <option value="icon-unlock">icon-unlock</option>
                                             <option value="icon-share">icon-share</option>
                                             
                                          </select>
                                    </div>
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
                
                <div class="tab-pane" id="tab_1">
                
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
                                        <th>Sl</th>
                                        <th>Module Name</th>
                                        <th>Page Link</th>
                                        <th>Icon</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
									$qry = "SELECT * FROM t_modules";
									$result = mysql_query($qry);
									$i = 1;
									while($row = mysql_fetch_array($result))
									{
									?>
										<tr class="odd gradeX">
											<td><input type="checkbox" class="checkboxes"  name="dl_check[]" value="<?php echo $row['moduleid']?>" /></td>
                                            <td><?php echo $i;?></td>
											<td><?php echo $row['name']; ?></td>
                                            <td><?php echo $row['page_link']; ?></td>
                                            <td><?php echo $row['icon']; ?></td>
                                            <td>
                                            	<?php if(@$row_access_acs[3] == 'View') {?>
                                                <a
                                                	href="<?php echo urlroute('module_entry'); ?>&Editid=<?php echo $row['moduleid']; ?>&temp=View"
                                                	class="btn btn-xs  blue">
                                                	<i class="icon-search"></i>
                                                </a>
                                                <?php }?>

                                            	<?php if(@$row_access_acs[1] == 'Edit') {?>
                                                <a  onclick="return confirm('Do you want to Edit?')" 
                                                	href="<?php echo urlroute('module_entry'); ?>&Editid=<?php echo $row['moduleid']; ?>&temp=Save"
                                                	class="btn btn-xs  green">
                                                	<i class="icon-edit"></i>
                                                </a>
                                                <?php }?>
                                                
                                            	<?php if(@$row_access_acs[2] == 'Delete') {?>
                                                <a 	onclick="return confirm('Do you want to Delete?')" 
                                                	href="<?php echo urlroute('module_entry'); ?>&Deleteid=<?php echo $row['moduleid']; ?>&temp=Delete" 
                                                	class="btn btn-xs  red">
                                                	<i class="icon-trash"></i>
                                                </a>
                                                <?php }?>
                                            </td>
										</tr>
                                    <?php
										  $i++;
									}
									?>   
									</tbody>
                            </table>    
                            
                            </form>
                            <!-- END FORM-->  
                        </div>
                    </div>
                	
                
                </div><!--tab_1-->
                
                
                <div class="tab-pane" id="tab_2">
                
                    <div class="portlet box blue ">
                        <div class="portlet-title">
                            <div class="caption"><i class="icon-reorder"></i>List for <?php echo $page_title;?></div>
                        </div>
                        <div class="portlet-body  flip-scroll">
                            <!-- BEGIN FORM-->
                            <form action=""  class="form-horizontal form-bordered" id="formIDdel" method="post" enctype="multipart/form-data">
                    
                            <table class="table table-bordered table-striped table-condensed flip-content" id="sample_2">
                                <thead class="flip-content">
                                    <tr>
                                    
                                        <th>Sl</th>
                                        <th>Icon</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>

										<tr class="odd gradeX">
                                            <td>1</td>
											<td>All</td>
                                            <td>
                                            <a
                                                href="export_import_asoft.php" target="_blank"
                                                class="btn btn-xs  blue">
                                                <i class="icon-download"></i>
                                            </a>
											</td>
										</tr>
                                     
									</tbody>
                            </table>    
                            
                            </form>
                            <!-- END FORM-->  
                        </div>
                    </div>
                	
                
                </div><!--tab_2-->
                
                
        	</div><!--tab-content-->
        </div><!--tabbable tabbable-custom boxless-->
        
    </div><!--col-md-12-->
</div> <!-- END PAGE option-->

</div><!-- END PAGE CONTENT-->


<script src="assets/scripts/form-validation.js"></script> 


<script>
jQuery(document).ready(function() {   
 	// initiate layout and plugins
 	FormValidation.init();
	TableManaged.init();
});

var show_option = function(id){
	var vl = jQuery("#"+id).val();
	if(vl == 1){
		jQuery(".menu_hierarchy").find(':input').prop('disabled',true);
		jQuery(".menu_hierarchy").slideUp();
	}else if(vl == 0){
		jQuery(".menu_hierarchy").find(':input').prop('disabled',false);
		jQuery(".menu_hierarchy").slideDown();
	}
}
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
     

      