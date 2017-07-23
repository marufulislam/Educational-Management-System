// JavaScript Document
function fun_selall(){
var x1= document.getElementById("sel_lect");
x1.disabled=false;
$('#sel_lect').addClass('required');
var x1= document.getElementById("hid_den");
var u=0;
while(u<x1.value){
	var xchk= document.getElementById("chbk"+u);
	var xsel= document.getElementById("sel"+u);
	xchk.checked=true;
	xsel.selectedIndex=0;
	xsel.disabled=true;
	u++;
}	
}
function fun_resect(){
var x_com= document.getElementById("sel_lect");
x_com.selectedIndex=0;
x_com.disabled=true;
$('#sel_lect').removeClass('required');

$('#sel_lect').removeClass("error");

$('#sel_lect').closest('.control-group').removeClass('error');

var x1= document.getElementById("hid_den");
var u=0;
while(u<x1.value){
	var xchk= document.getElementById("chbk"+u);
	var xsel= document.getElementById("sel"+u);
	xchk.checked=false;
	xsel.selectedIndex=0;
	xsel.disabled=true;
	u++;
}
}
function fun_selcng(ele_ment,ele_num){
var x1= document.getElementById("sel"+ele_num);
if(ele_ment.checked) x1.disabled=false;
else{
	x1.selectedIndex=0;
	x1.disabled=true;
}
}

function fun_yesall(){
var x_com= document.getElementById("sel_lect");
var x1= document.getElementById("hid_den");
var u=0;
while(u<x1.value){
	var xchk= document.getElementById("chbk"+u);
	xchk.checked=true;
	var xsel= document.getElementById("sel"+u);
	xsel.disabled=false;
	xsel.selectedIndex=x_com.selectedIndex;
	u++;
}
}