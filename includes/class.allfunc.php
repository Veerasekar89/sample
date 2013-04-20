<?php
include_once "includes/class.db.php";
class allfunc extends db{
  private $dbobj;
  	public function __construct(){
		$this->dbObj=parent::getInstance();
	}
	function getProjects($ProjectId=0){
		$Attribute="ProjectId,ProjectName";
		$tablename="project";
		$option="WHERE ProjectId>0";
		if($ProjectId>0){
			$option.=" AND ProjectId=".$ProjectId;
		}
		$Resource=$this->dbObj->select($tablename,$Attribute,$option);
		$ProjectList=array();
		if(count($Resource[1])>0){
			$Project=$this->dbObj->fetchArray($Resource[0]);
			foreach($Project as $pro){
				$ProjectList[$pro['ProjectId']]=$pro;
			}
		}
		return $ProjectList;
	}
	function getAppartment($ProjectId=0,$AppartmentId=0){
		$Attribute="AppartmentId,ProjectId,Appartment,State,City";
		$tablename="appatments";
		$option="WHERE AppartmentId>0";
		if($ProjectId>0){
			$option.=" AND ProjectId=".$ProjectId;
		}
		if($AppartmentId>0){
			$option.=" AND AppartmentId=".$AppartmentId;
		}
		$Resource=$this->dbObj->select($tablename,$Attribute,$option);
		$AppartmentList=array();
		if(count($Resource[1])>0){
			$Appartment=$this->dbObj->fetchArray($Resource[0]);
			foreach($Appartment as $app){
				$AppartmentList[$app['AppartmentId']]=$app;
			}
			
		}
		return $AppartmentList;
	}
	function getAppartmentBlocks($ProjectId=0,$AppartmentId=0,$BlockId=0){
		$Attribute="BlockId,AppartmentId,ProjectId,BlockNo";
		$tablename="aptblocks";
		$option=" WHERE BlockId>0";
		if($ProjectId>0){
			$option.=" AND ProjectId=".$ProjectId;
		}
		if($AppartmentId>0){
			$option.=" AND AppartmentId=".$AppartmentId;
		}
		if($BlockId>0){
			$option.=" AND BlockId=".$BlockId;
		}
		$Resource=$this->dbObj->select($tablename,$Attribute,$option);
		$BlockList=array();
		if(count($Resource[1])>0){
			$BlockList=$this->dbObj->fetchArray($Resource[0]);
		}
		return $BlockList;
	}
}
?>
