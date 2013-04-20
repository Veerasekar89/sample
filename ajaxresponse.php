<?php
include_once "includes/class.allfunc.php";
$Obj = new allfunc();
if($_REQUEST['type']==1 && $_REQUEST['project']>0){
  $ProjectId=mysql_escape_string($_REQUEST['project']);
	$AppartmentList=$Obj->getAppartment($ProjectId);
	echo json_encode($AppartmentList);
}else if($_REQUEST['type']==2 && $_REQUEST['appartment']>0){
	$AppartmentId=mysql_escape_string($_REQUEST['appartment']);
	$BlocktList=$Obj->getAppartmentBlocks(0,$AppartmentId);
	echo json_encode($BlocktList);
}else if($_REQUEST['type']==3){
	$AppartmentId=mysql_escape_string($_REQUEST['appartment']);
	$ProjectId=mysql_escape_string($_REQUEST['project']);
	$BlockId=mysql_escape_string($_REQUEST['block']);
	$ProjectList=$Obj->getProjects($ProjectId);
	$AppartmentList=$Obj->getAppartment($ProjectId,$AppartmentId);
	$BlocktList=$Obj->getAppartmentBlocks($ProjectId,$AppartmentId,$BlockId);
	$JsonArray=array();
	foreach($BlocktList as $Block){
		$JsonArray[$Block['BlockId']]['BlockNo']=$Block['BlockNo'];
		$JsonArray[$Block['BlockId']]['ProjectName']=$ProjectList[$Block['ProjectId']]['ProjectName'];
		$JsonArray[$Block['BlockId']]['State']=$AppartmentList[$Block['AppartmentId']]['State'];
		$JsonArray[$Block['BlockId']]['City']=$AppartmentList[$Block['AppartmentId']]['City'];
		$JsonArray[$Block['BlockId']]['Appartment']=$AppartmentList[$Block['AppartmentId']]['Appartment'];
	}
	echo json_encode($JsonArray);
}

?>
