<div class="portlet-body form">
<?php
require_once('include/connect.php');
require_once('include/functions.php');

$class_name = $_GET['class_name'];
$section_name = $_GET['section_name'];
$group_name = $_GET['group_name'];
$shift_name = $_GET['shift_name'];
$tbl_student_info = $_GET['tbl_student_info'];
$exam_year = $_GET['exam_year'];
$uniqueToken = generateUniqueToken(10);

	 	?>

                               
<div class="col-md-12 col-sm-12">
   <div class="portlet purple box">
	  <div class="portlet-title">
        <div class="caption">
            <i class="fa fa-cogs"></i>Student Fee Collection
        </div>
	  </div>
       <div class="term_term"> </div>
	  <div class="portlet-body">
		<div class="table-responsive">
        <div class="frm_fees_result"></div>
            <form action="" method="post" id="student_fees_frm" class="form_container left_label"enctype="multipart/form-data">
				<div class="row">
                                 <div class="col-md-12">
                                   <div class="col-md-4">
                                   <div class="form-group">
                                      <label class=""><h4>Select Category First</h4></label>
                                      
                                       
                                          <select MULTIPLE id="group" class="form-control required" name="group_id" onclick="show_div(this.id)">
                                           <option value="">Select an option</option>
                                              <?php
			      
	
													$query_ = "SELECT * FROM `tbl_fee_category` ORDER BY fee_category_id ASC";					
													$test_default_result_ = mysql_query($query_) or die(mysql_error());
													$k = 0;
													while($row_ = mysql_fetch_array($test_default_result_)){
														$k++;
														$group_id =  $row_['fee_category_id'];
														$group_name = $row_['fee_category_name'];		
									
														echo "<option value = '$group_id'";
													/*	if($k == 1) echo 'selected="selected"';*/
														echo "> $group_name </option>";            
													}
												?> 
                                        </select> 
                                      </div>
                                   </div>
                                   
									  
                                   <div class="col-md-4">
                                     <div id="checkboxes">
                                      
										<?php
                                        $sql_grp="SELECT * FROM `tbl_fee_category` ORDER BY fee_category_id ASC";
                                        $qry_grp=mysql_query($sql_grp) or die(mysql_error());
                                        $i=0;
                                        while($row_grp=mysql_fetch_array($qry_grp)){
                                            $group_id = $row_grp["fee_category_id"];
                                            $group_name = $row_grp["fee_category_name"];
                                            $i++;
                                            ?>
                                           
                                             <div class="form-group target" id="<?php echo $group_id;?>" style="display:none !important;">
                                                <label class=""><h4><?php echo $group_name;?></h4></label>

                                                 <table class="table table-bordered table-striped table-condensed flip-content" id="sample_1">
                                                <tr>
                                                    <?php 
                                                    $sql_tst="SELECT * FROM `tbl_fee_sub_category` WHERE fee_category_id = '".$group_id."' AND student_class = '".$class_name."'";
                                                    $qry_tst=mysql_query($sql_tst);
                                                    $j=0;
                                                    while($row_tst=mysql_fetch_array($qry_tst)){
                                                    $j++;
                                                    ?>
                                                   <td>
                                                    <span>
                                                    <input name="test_name" class="group" type="checkbox" id="<?php echo $row_tst["fee_sub_category_id"];?>" 
                                                    value="<?php echo $row_tst["fee_sub_category_price"];?>" title="<?php echo $row_tst["fee_sub_category_name"];?>"  >
                                                    <label class="choice"><?php echo $row_tst["fee_sub_category_name"];?></label>
                                                    </span>
                                                    </td>
                                                    <?php
                                                        if($j == 3){
                                                            echo "</tr><tr>";
                                                            $j = 0;	
                                                        }
                                                    }
                                                    ?>
                                                    </tr>
                                      </table>
                                                    <br/><br/><br/>
                                                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                    <button type="button" class="btn_small btn_blue" id="<?php echo $group_id;?>" style=" width: 90px; " onclick="javascript:select_all(this.id)"><div id="selectChb"><span>Select All</span></div></button>
                                                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                    <button type="button" class="btn_small btn_blue" style=" width: 90px;" 
                                                    onclick="javascript:get_add()"><span>Add</span></button>
                                                    
                                              
                                            </div>
                                        <?php
                                        }
                                        ?>
                                        
                                        <div>
            <table class="table table-bordered table-striped table-condensed flip-content" id="sum">
            <thead class="flip-content">
            <!--<tr>
                <th>Cancel</th>
            	<th>Name</th>
            	<th>Charge</th>
            </tr>-->
            </thead>
            <tbody>
            <tr>
            </tr>
            </tbody>
            </table>
            
            <div id="sum"></div>
         </div>
                                    
                                      </div>
                                      
                                      
                                      
                                    </div>
                                    
                                     
                                   <!--/span-->
                                    <div class="col-md-4">
                                      <div class="form-group">
                                       <label><h4>PAYMENT LIST </h4></label>
                                    <table class="table table-bordered table-striped table-condensed flip-content" id="sample_1">
                                <thead class="flip-content">
                                    <tr>
                                        <th>Total</th>
                                        <th><input class="g_total form-control" name="total" id="sumTotal" type="text" tabindex="1" readonly="readonly" value="<?php echo "0";?>"/></th>
                                    </tr>
                                    <tr>
                                        <th>Grand Total</th>
                                        <th><input name="grand_total" id="grand_total" type="text" tabindex="1" class="gg_total form-control" readonly="readonly" value="<?php echo "0";?>"/></th>
                                    </tr>
                                    <tr>
                                        <th>Less</th>
                                        <th><input name="less" id="less" type="text" tabindex="1" onkeyup="calculate()" class="form-control required" value="<?php echo "0";?>"/></th>
                                    </tr>
                                    <tr>
                                        <th>cash money</th>
                                        <th><input name="advance" class="adv  form-control" id="adv" onkeyup="calculate()" type="text" tabindex="1" value="<?php echo "0";?>"/></th>
                                    </tr>
                                     <tr>
                                        <th>Due</th>
                                        <th><input name="due" id="due" type="text" tabindex="1" class="form-control" value="<?php echo "0";?>"/></th>
                                    </tr>
                                </thead>
                                <tbody>
                                
                               <!-- <tr>

                                   <td><input type="checkbox" class="checkboxes" value="1" /></td>
                                    <td><input type="checkbox" class="checkboxes" value="1" /></td>
                                </tr>
                             -->
                                </tbody>
                            </table>
                                      </div>
                                   </div>
                                   
                                     
                                   <!--/span-->
                                     </div>
                                    </div>
                                    
                    <input type="hidden" id="student_id_double" class="form-control" name="student_id" value="<?php echo $tbl_student_info; ?>"/>
                      
                    <input type="hidden" name="class_name_double" id="class_name_double" value="<?php echo $class_name;?>">
                    <input type="hidden" name="section_name_double" id="section_name_double" value="<?php echo $section_name;?>">
                    <input type="hidden" name="group_name_double" id="group_name_double" value="<?php echo $group_name;?>">
                    <input type="hidden" name="shift_name_double" id="shift_name_double" value="<?php echo $shift_name;?>">
					 <input type="hidden" name="unique_token" id="unique_token" value="<?php echo $uniqueToken;?>">
                    <input type="hidden" name="exam_year_double" id="exam_year_double" value="<?php echo $exam_year;?>">
                    <input type="hidden" id="user_id_double" name="user_id_double" value="<?php echo $_SESSION['com_cbs_aaiam_lschool_maruf_loggedin_user_id'];?>"> 
               
               <div class="form-actions right"><!--Begin form-actions-->
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="col-md-offset-3 col-md-9">
											   <button type="button" class="btn green" id="student_fees_frm-comment"  onclick="submitForm_investigation();">&nbsp;Submit</button>                    
                                            </div>
                                        </div>
                                    </div>
                                </div>
            </form>
        </div>
       </div>
      </div>
     </div>
   <div class="clearfix space5"></div>       
</div>

<script type="text/javascript">
var show_div = function(id){
    var vl = jQuery('#'+id).val();
	//alert('Select value--->'+vl);	
	$(".target").each(function(){
		//alert('Div id--->'+$(this).attr("id"));	
		if($(this).attr("id") == vl){
			//alert('Matched id--->'+$(this).attr("id"));	
			$("div#"+$(this).attr("id")).show();
		}else{
			$("div#"+$(this).attr("id")).slideUp();	
		}
	});}

$('#selectChb').click(function(){ 
     $(':checkbox').filter(':visible').prop("checked", true);});

var get_add=function(){
	var vl = 0;
	var val = $("#sumTotal").val();
	if(val == ''){
		val = 0;
	}
	 $("#sumTotal").val(val);
	$('#checkboxes input:checked').each(function() {
		
		var title  = $(this).attr('title');
		var value = $(this).attr('value');
		var id = $(this).attr('id');
		//var tablestart="<table class='display'>";
			//tablestart+= "<tbody>";
			//tablestart+= "<tr class='gradeX  flip-content'>";
		var tablestart="<tr class='gradeX' style='border-bottom: 1px solid #fff;' id='tR"+id+"'>";
		    tablestart+= "<td class='center'  onclick='del_item("+id+")'> <img src='img/error.png'> </td>";	
			tablestart+= "<td align='center'>"+title+"</td>";
			tablestart+= "<td align='center'>"+value+"</td>";
			tablestart+= "</tr>";
			//tablestart+= "</tbody>";
			//tablestart+= "</table>";
			tablestart+="<input type='hidden' name='name[]' value='"+id+"'>";
            
		//$("#sum").append(tablestart);
		
		$('#sum > tbody:last').append(tablestart);
		
		var val = $("#sumTotal").val();
		vl  = parseFloat(val) +  parseFloat(value);
		//alert(vl);
		$("#sumTotal").val(vl);
		//console.log($(this).attr('title'));
		$(this).attr("checked",false);
		calculate();
	});	
	 $("#sumTotal").val(vl);
	  //alert(vat);
	   
	 }

var select_all = function(id){
	//alert(id);
	
	    if ( $(this).is(':visible') && $(this).prop('checked') ){
 
			$('div#'+id).find(':checkbox').each(function() {
				    $("input[class^='group']:visible").attr('checked', 'checked');
        		//$('.group').attr("checked",true);
    		});
        }
        else{
            
			$('div#'+id).find(':checkbox').each(function() {
				    $("input[class^='group']:visible").attr('checked', '');
        		//$('.group').attr("checked",false);
    		});
			
        }
	}
	
////////total calculation of right side////////
 var calculate = function(){
		  var total = parseFloat($("#sumTotal").val());
		  var vat = parseFloat($("#vat").val());
		  $("#grand_total").val(total);
		  var grand_total = parseFloat($("#grand_total").val());
		  var adv = parseFloat($("#adv").val());
		  var less = parseFloat($("#less").val());
		  var due = parseFloat($("#due").val());
		  
		  var due_total = grand_total - (adv + less);
          $("#due").val(parseFloat(due_total).toFixed(2));
		  }	
		  
/////////delete item////////////
 var del_item = function(id){
		//alert(id);
		$("#tR"+id).remove();
		var value = $("#"+id).attr('value');
	
		//alert(value);
		var total = parseFloat($(".g_total").val());
		var less = total-(value);
		//alert(less);
		$(".g_total").val(parseFloat(less).toFixed(2));
		calculate();
		}		  	
</script>






    
