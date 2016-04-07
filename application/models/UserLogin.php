<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class UserLogin extends CI_Model {

	public function getAll()
	{
		$sql = "select * from report group by year order by no desc";
		
		$query = $this->db->query($sql);
		//return $query->result(); เอาไปเฉพาะรีซอล
		return $query; //ไปทั้งก้อน
	}
	public function getbyno($year)
	{
		$sql = "select * from report where year = '".$year."'
		order by no asc";
		$query = $this->db->query($sql);
		//return $query->result(); เอาไปเฉพาะรีซอล
		return $query; //ไปทั้งก้อน
	}
	
	public function getbyreportid($report_id)
	{
		$sql = "select * from agenda where report_id = '".$report_id."'";
		$query = $this->db->query($sql);
		//return $query->result(); เอาไปเฉพาะรีซอล
		return $query; //ไปทั้งก้อน
	}
	public function getreportedit($report_id)
	{
		$sql = "select * from report where report_id = '".$report_id."'";
		$query = $this->db->query($sql);
		//return $query->result(); เอาไปเฉพาะรีซอล
		return $query; //ไปทั้งก้อน
	}
	public function save_reportedit($report_id,$dt,$nore,$y)
	{
		$sql = "UPDATE report
				SET date='".$dt."',no='".$nore."',year='".$y."'
				WHERE report_id='".$report_id."'";
		$this->db->query($sql);
		//return $query->result(); เอาไปเฉพาะรีซอล
		//return $query; //ไปทั้งก้อน
	}
	public function getagenedit($agenda_id)
	{
		$sql = "select * from agenda where agenda_id = '".$agenda_id."'";
		$query = $this->db->query($sql);
		//return $query->result(); เอาไปเฉพาะรีซอล
		return $query; //ไปทั้งก้อน
	}
	public function save_agenedit($agenda_id,$no,$detail)
	{
		$sql = "UPDATE agenda
				SET no='".$no."',detail='".$detail."'
				WHERE agenda_id='".$agenda_id."'";
		$this->db->query($sql);
		//return $query->result(); เอาไปเฉพาะรีซอล
		//return $query; //ไปทั้งก้อน
	}
	public function editsubagen($no,$agenda_id,$section_id)
	{
		$sql = "SELECT * FROM subagenda su
				join term as t on su.subagenda_id=t.subagenda_id
				join responsible as r on t.term_id=r.term_id
				join section as s on r.section_id=s.section_id
				where su.no  = '".$no."' and su.agenda_id  = '".$agenda_id."' and s.section_id='".$section_id."'";
		$query = $this->db->query($sql);
		//return $query->result(); เอาไปเฉพาะรีซอล
		return $query; //ไปทั้งก้อน
	}
	public function searchAdmin($sql)
	{
		$sql = "SELECT * FROM subagenda su
				join term as t on su.subagenda_id=t.subagenda_id
				join responsible as r on t.term_id=r.term_id
				join section as s on r.section_id=s.section_id
				where 1" .$sql;
		$query = $this->db->query($sql);
		//return $query->result(); เอาไปเฉพาะรีซอล
		return $query; //ไปทั้งก้อน
	}
	public function save_editsubagen($subagenda_id,$no,$detail)
	{
		$sql = "UPDATE subagenda
				SET no='".$no."',detail='".$detail."'
				WHERE agenda_id='".$subagenda_id."'";
		$this->db->query($sql);
		//return $query->result(); เอาไปเฉพาะรีซอล
		//return $query; //ไปทั้งก้อน
	}
	public function save_editsubagen2($responsible_id,$section_id)
	{
		$sql = "UPDATE responsible
				SET section_id='".$section_id."'
				WHERE responsible_id='".$responsible_id."'";
		$this->db->query($sql);
		//return $query->result(); เอาไปเฉพาะรีซอล
		//return $query; //ไปทั้งก้อน
	}
	public function save_editsubagen3($term_id,$deatailOFterm)
	{
		$sql = "UPDATE term
				SET deatailOFterm='".$deatailOFterm."'
				WHERE term_id='".$term_id."'";
		$this->db->query($sql);
		//return $query->result(); เอาไปเฉพาะรีซอล
		//return $query; //ไปทั้งก้อน
	}
	public function deletereport($report_id)
	{
		$sql = "DELETE FROM report
				WHERE report_id= '".$report_id."'";
		$query = $this->db->query($sql);
		//return $query->result(); เอาไปเฉพาะรีซอล
		return $query; //ไปทั้งก้อน
	}
	public function deleteagen($agenda_id)
	{
		$sql = "DELETE FROM agenda
				WHERE agenda_id= '".$agenda_id."'";
		$query = $this->db->query($sql);
		//return $query->result(); เอาไปเฉพาะรีซอล
		return $query; //ไปทั้งก้อน
	}
	public function deletesubagen($subagenda_id)
	{
		$sql = "DELETE FROM subagenda
				WHERE subagenda_id= '".$subagenda_id."'";
		$query = $this->db->query($sql);
		//return $query->result(); เอาไปเฉพาะรีซอล
		return $query; //ไปทั้งก้อน
	}
	public function deletesubagen2($term_id)
	{
		$sql = "DELETE FROM term
				WHERE term_id= '".$term_id."'";
		$query = $this->db->query($sql);
		//return $query->result(); เอาไปเฉพาะรีซอล
		return $query; //ไปทั้งก้อน
	}
	public function deletesubagen3($responsible_id)
	{
		$sql = "DELETE FROM responsible
				WHERE responsible_id= '".$responsible_id."'";
		$query = $this->db->query($sql);
		//return $query->result(); เอาไปเฉพาะรีซอล
		return $query; //ไปทั้งก้อน
	}
	
	public function getbyagen($agenda_id)
	{
		$sql = "SELECT * FROM subagenda su
				join term as t on su.subagenda_id=t.subagenda_id
				join responsible as r on t.term_id=r.term_id
				join section as s on r.section_id=s.section_id
				where su.agenda_id  = '".$agenda_id."'";
		$query = $this->db->query($sql);
		//return $query->result(); เอาไปเฉพาะรีซอล
		return $query; //ไปทั้งก้อน
	}
	public function getbyreportUser($sql)
	{
		$sql = "SELECT *,a.no as no1,su.no as no2 FROM report re
				join agenda a on re.report_id=a.report_id
				join subagenda su on a.agenda_id=su.agenda_id
				join term t on su.subagenda_id=t.subagenda_id
				join responsible r on t.term_id=r.term_id
				join section se on r.section_id=se.section_id
				where se.section_id = ".$sql;
		$query = $this->db->query($sql);
		//return $query->result(); เอาไปเฉพาะรีซอล
		return $query; //ไปทั้งก้อน
	}
	public function getselect()
	{
		$sql = "select * from section ";
		$query = $this->db->query($sql);
		//return $query->result(); เอาไปเฉพาะรีซอล
		return $query; //ไปทั้งก้อน
	}
	public function getuserAll()
	{
		$sql = "SELECT *,se.name as namesec FROM staff s
join section as se on s.section_id=se.section_id
join type as t on se.type_id=t.type_id
order by s.staff_id asc";
		$query = $this->db->query($sql);
		//return $query->result(); เอาไปเฉพาะรีซอล
		return $query; //ไปทั้งก้อน
	}
	function getAlllogin($user){
		$sql = "SELECT *,t.type_id as intype FROM staff s
join section se on s.section_id=se.section_id
join type t on se.type_id=t.type_id where s.username = '".$user."'";
		$query = $this->db->query($sql); 
		return $query;
		}
		function getin($sql){
		$sql = "SELECT *,se.name as namesec FROM staff s
join section as se on s.section_id=se.section_id
join type as t on se.type_id=t.type_id ".$sql;
		$query = $this->db->query($sql); 
		return $query;
	}
	function getWhere($sql){
    $sql ="SELECT *,se.name as namesec FROM staff s
join section as se on s.section_id=se.section_id
join type as t on se.type_id=t.type_id where 1 ".$sql;
    $query = $this->db->query($sql);
    return    $query;
  }

	public function getYear()
	{
		$sql = "select * from report group by year order by year desc";
		$query = $this->db->query($sql);
		//return $query->result(); เอาไปเฉพาะรีซอล
		return $query; //ไปทั้งก้อน
	}

		public function getYearReport($year)
	{
		$sql = "select * from report where year = '".$year."'";
		$query = $this->db->query($sql);
		return $query; 
	}

	public function getAgenda($year)
	{
		$sql = "select max(r.no) as max1, min(r.no) as min1,a.report_id,r.no,r.year,a.no as agenda_no from agenda a join report r on a.report_id = r.report_id where year = '".$year."'";
		$query = $this->db->query($sql);
		return $query; 
	}

	public function getMaxNoReport($year)
	{
		$sql = "select max(r.no) as maxNo from agenda a join report r on a.report_id = r.report_id where year = '".$year."'";
		$query = $this->db->query($sql);
		return $query; 
	}

	public function getMinNoReport($year)
	{
		$sql = "select min(r.no) as minNo from agenda a join report r on a.report_id = r.report_id where year = '".$year."' order by r.no desc";
		$query = $this->db->query($sql);
		return $query; 
	}


	function getByUser($user){
		$sql="select * from staff where username ='".$user."'";
		$query=$this->db->query("$sql");
		return $query;
	}
	function getuser($staff_id){
		$sql="SELECT *,se.name as namesec FROM staff s
join section as se on s.section_id=se.section_id
join type as t on se.type_id=t.type_id
where staff_id ='".$staff_id."'";
		$query=$this->db->query("$sql");
		return $query;
	}
	public function getlog($user,$pass)
	{
		$sql="select * FROM staff where username = '".$user."' and password= '".$pass."'";
		$query=$this->db->query("$sql");
		return $query;

	}
	public function getreso()
	{
		$sql = "select * from term";
		$query = $this->db->query($sql);
		//return $query->result(); เอาไปเฉพาะรีซอล
		return $query; //ไปทั้งก้อน


	}
	public function getresoid($id)
	{
		$sql = "select * from staff where staff_id='".$id."'";
		$query = $this->db->query($sql);
		//return $query->result(); เอาไปเฉพาะรีซอล
		return $query; //ไปทั้งก้อน


	}

	public function getYear2($year){
		$sql = "select * from report where year = ".$year;
		$query = $this->db->query($sql);
		//return $query->result(); เอาไปเฉพาะรีซอล
		return $query; //ไปทั้งก้อน
	}
	public function getDetail($year){
		$sql = "SELECT a.no as number, b.no as vara FROM agenda a join report b on a.report_id = b.report_id where b.year = ".$year;
		$query = $this->db->query($sql);
		//return $query->result(); เอาไปเฉพาะรีซอล
		return $query; //ไปทั้งก้อน
		
	}
	function getInsert($fname,$lname,$tel,$username,$password,$section_id){
    
	$sql ="insert INTO `staff`(`staff_id`, `fname`, `lname`, `tel`, `username`, `password`, `section_id`) 
  	VALUES (null,'".$fname."','".$lname."','".$tel."','".$username."','".$password."','".$section_id."')" ;
    $query = $this->db->query($sql);
  }
  function deleteuser($staff_id){
    
	$sql ="DELETE FROM staff WHERE staff_id= '".$staff_id."';" ;
    $this->db->query($sql);
  }
  function getedit($staff_id,$fname,$lname,$tel,$username,$password,$section_id){
    
	$sql ="UPDATE staff
		SET fname='".$fname."',lname='".$lname."',username='".$username."',password='".$password."',
		tel='".$tel."',section_id='".$section_id."'
			WHERE staff_id= '".$staff_id."'" ;
    $this->db->query($sql);
  }
  public function getReportID()
	{
		$sql = "select max(report_id) as maxIDReport from report ";
		$query = $this->db->query($sql);
		return $query;
	}
	  function addagen($dt,$no,$year,$report_id){
  	$sql="INSERT INTO `report`(`date`, `no`, `year`, `report_id`) 
		VALUES ('".$dt."','".$no."','".$year."','".$report_id."')";
		$query = $this->db->query($sql);
    	return    $query;
  }
   function getagen($agenda_id,$noagen,$detailagen,$report_id){
    
	$sql ="insert INTO `agenda`(`agenda_id`,`no`, `detail`,`report_id`) 
  	VALUES ('".$agenda_id."','".$noagen."','".$detailagen."','".$report_id."')" ;
    $query = $this->db->query($sql);
  }

  function getsubagen1($subagenda_id,$nosubagen,$detailsubagen,$agenda_id){
    
	$sql ="insert INTO `subagenda`(`subagenda_id`,`no`, `detail`,`agenda_id`) 
  	VALUES ('".$subagenda_id."','".$nosubagen."','".$detailsubagen."','".$agenda_id."')" ;
    $query = $this->db->query($sql);
  }

   function getTerm($term_id,$detailOfTerm,$subagenda_id){
    
	$sql ="insert INTO `term`(`term_id`,`deatailOfTerm`,`subagenda_id`) 
  	VALUES ('".$term_id."','".$detailOfTerm."','".$subagenda_id."')" ;
    $query = $this->db->query($sql);
  }

		public function getAgenID()
		{
			$sql = "select max(agenda_id) as maxIDAgen from agenda ";
			$query = $this->db->query($sql);
			return $query;
		}
		public function getsubAgenID()
		{
			$sql = "select max(subagenda_id) as maxIDsubAgen from subagenda ";
			$query = $this->db->query($sql);
			return $query;
		}
		  public function getTermID()
	{
		$sql = "select max(term_id) as maxIDTerm from term ";
		$query = $this->db->query($sql);
		return $query;
	}
	public function getResponableID()
	{
		$sql = "select max(responsible_id) as maxIDResponsible from responsible ";
		$query = $this->db->query($sql);
		return $query;
	}
	function getResponable($responable_id,$section_id,$term_id){
    
	$sql ="insert INTO `responsible`(`responsible_id`,`section_id`,`term_id`) 
  	VALUES ('".$responable_id."','".$section_id."','".$term_id."')" ;
    $query = $this->db->query($sql);
    return $query;
  }
	public function getShow($datestart,$datestop)
	{
		$sql = "select * from report where date between '".$datestart."' and '".$datestop."'";
		$query = $this->db->query($sql);
		return $query;
	}
	public function getShowDetail($report_id)
	{
		$sql = "select r.no as no, r.year as year,r.date as date,a.no as noagenda, a.detail as agendadetail
		,s.no as nosubagen, s.detail as subagendadetail, t.deatailOFterm as detailterm 
		from report r join agenda a on r.report_id = a.report_id join subagenda s on a.agenda_id=s.agenda_id
		join term t on s.subagenda_id=t.subagenda_id where r.report_id = '".$report_id."' group by a.no";
		$query = $this->db->query($sql);
		return $query;
	}
}
