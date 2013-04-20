<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Proprty Search</title>
<script src="js/jquery-1.9.1.min.js" type="text/javascript"></script>
<style>
#Result table
{
border-collapse:collapse;
}
#Result table,th, td
{
border: 1px solid black;
}

</style>
<script>
function getAppartList(ProjectId){
  $.post("ajaxresponse.php?type=1",{project:ProjectId},function(data){
	  var OptionValues="";
	    if(data){
			 var json = jQuery.parseJSON(data);
			 $.each(json, function(key, val) {
				OptionValues=OptionValues+"<option value='"+val.AppartmentId+"'>"+val.Appartment+"</option>";
			 });
		 }
		 $("#Appartment").html('<option value="">Select</option>'+OptionValues);
		 $("#Block").html('<option value="">Select</option>');
		 
	});
}
function getBlockList(AppartmentId){
	$.post("ajaxresponse.php?type=2",{appartment:AppartmentId},function(data){
	    var OptionValues="";
		if(data){
      	 var json = jQuery.parseJSON(data);
			 $.each(json, function(key, val) {
				OptionValues=OptionValues+"<option value='"+val.BlockId+"'>"+val.BlockNo+"</option>";
			 });
		 }
		 $("#Block").html('<option value="">Select</option>'+OptionValues);
	
	});
}
function validateForm(cObj){
	if(cObj.project.value==""){
		alert("Please Select Project..");
		return false;
	}
	$.post("ajaxresponse.php?type=3",{project:cObj.project.value,appartment:cObj.Appartment.value,block:cObj.Block.value},function(data){
		var values ="";
		if(data){
			values="<table cellpadding='5' cellspacing='5'><tr><th>Project Name</th><th>Appartment</th><th>Block No</th><th>State</th><th>City</th></tr>"
      		var json = jQuery.parseJSON(data);
			 $.each(json, function(key, val) {
				values=values+"<tr><td>"+val.ProjectName+"</td><td>"+val.Appartment+"</td><td>"+val.BlockNo+"</td><td>"+val.State+"</td><td>"+val.City+"</td></tr>";
			 });
			 values=values+"</table>";
		 }else{
		 	values="No records Found..";
		 }
		 $("#Result").html(values);
	
	});
	return false;
}

</script>
</head>
<?php
include_once "includes/class.allfunc.php";
$Obj = new allfunc();
$ProjectList=$Obj->getProjects();
?>
<body>
<center>
<form name="search" onsubmit="return validateForm(this);">
<table cellpadding="5" cellspacing="5">
<tr>
<td> Project</td>
<td><select id="project" name="project" onChange="getAppartList(this.value);">
<option value="">Select</option>
<?php
foreach($ProjectList as $Project){
?>
<option value="<?php echo $Project['ProjectId']; ?>"><?php echo $Project['ProjectName']; ?></option>
<?php
}
?>
</select></td>
</tr>
<tr >
<td>AppartMent</td>
<td><div id="Appartment_Div"><select id="Appartment" name="Appartment" onChange="getBlockList(this.value);">
<option value="">Select</option>
<select></div></td>
</tr> 
<tr>
<td>Block</td>
<td><div id="Block_Div"><select id="Block" name="Block" >
<option value="">Select</option>
<select></div></td>
</tr>
<tr>
<td><input type="submit" name="submit" value="Submit"></td>
<td></td>
</tr>

</table>
</form>
<div id="Result">
</div>
</center>
</body>
</html>
