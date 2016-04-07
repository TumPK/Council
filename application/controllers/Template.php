<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Template extends CI_Controller {

	// public function index()
	// {
	// 	$this->load->view('template/default');
	// }
	// public function index()
	// {$this->load->view('template/index');}

	public function inwex()
	{
		$this->load->model('UserLogin');
		
		$data['query3']=$this->UserLogin->getYear();
		$this->load->view('template/head');
		$this->load->view('template/nav',$data);
		$this->load->view('home/content',$data);
		$this->load->view('template/sidebar');
		$this->load->view('template/footer');
		$this->load->view('template/foot');
	}
	public function index()
	{
		$this->load->model('UserLogin');
			
			
			$data['query3']=$this->UserLogin->getYear();
			$this->load->view('template/head');
			$this->load->view('template/nav',$data);
			$this->load->view('home/content',$data);
			if(isset($_SESSION['sys_login'])&&$_SESSION['sys_login']==true){
          $this->load->view('home/sidebar');
			
      }else{
            $this->load->view('template/sidebar');
      }
			
			$this->load->view('template/footer');
			$this->load->view('template/foot');
	}
	public function inweb2($year)
	{
		$this->load->model('UserLogin');
			
			$data['query'] = $this->UserLogin->getbyno($year);
			$data['query3']=$this->UserLogin->getYear();
			$this->load->view('template/head');
			$this->load->view('template/nav',$data);
			$this->load->view('home/content2',$data);
			if(isset($_SESSION['sys_login'])&&$_SESSION['sys_login']==true){
          
			$this->load->view('home/sidebar');
			
      }else{
            $this->load->view('template/sidebar');
      }
	  $this->load->view('template/footer');
			$this->load->view('template/foot');
	}
	public function inweb3($report_id)
	{
		$this->load->model('UserLogin');
			
			$data['query'] = $this->UserLogin->getbyreportid($report_id);
			$data['query3']=$this->UserLogin->getYear();
			$this->load->view('template/head');
			$this->load->view('template/nav',$data);
			$this->load->view('home/content3',$data);
			if(isset($_SESSION['sys_login'])&&$_SESSION['sys_login']==true){
          
			$this->load->view('home/sidebar');
			
      }else{
            $this->load->view('template/sidebar');
      }	
	  $this->load->view('template/footer');
			$this->load->view('template/foot');
	}
	public function inweb4($agenda_id)
	{
		$this->load->model('UserLogin');
			
			$data['query'] = $this->UserLogin->getbyagen($agenda_id);
			$data['query3']=$this->UserLogin->getYear();
			$this->load->view('template/head');
			$this->load->view('template/nav',$data);
			$this->load->view('home/content4',$data);
			if(isset($_SESSION['sys_login'])&&$_SESSION['sys_login']==true){
          
			$this->load->view('home/sidebar');
			
      }else{
            $this->load->view('template/sidebar');
      }	
			$this->load->view('template/footer');
			$this->load->view('template/foot');
	}
	public function user($id)
	{
		if(isset($_SESSION['sys_login'])&&$_SESSION['sys_login']==true){
          $this->load->model('UserLogin');
		  $sql = "";
		$query = $this->UserLogin->getin($sql);
		$data['query3']=$this->UserLogin->getYear();
		$Num_Rows = $query->num_rows();
		$data['number'] = $Num_Rows;

		$Per_Page = 15;   // Per Page

		$Page = $id;
		if(!$id)
		{
			$Page=1;
		}

		$Prev_Page = $Page-1;
		$Next_Page = $Page+1;

		$Page_Start = (($Per_Page*$Page)-$Per_Page);
		if($Num_Rows<=$Per_Page)
		{
			$Num_Pages =1;
		}
		else if(($Num_Rows % $Per_Page)==0)
		{
			$Num_Pages =($Num_Rows/$Per_Page) ;
		}
		else
		{
			$Num_Pages =($Num_Rows/$Per_Page)+1;
			$Num_Pages = (int)$Num_Pages;
		}
		$sql = " order  by s.staff_id ASC LIMIT ".$Page_Start." , ".$Per_Page;
		$data['query'] = $this->UserLogin->getin($sql);
		$data['Prev_Page'] = $Prev_Page;
		$data['id'] = $id;
		$data['Num_Pages'] = $Num_Pages;
		$data['Next_Page'] = $Next_Page;
		
		$this->load->view('template/head');
		$this->load->view('template/nav',$data);
		$this->load->view('home/content_user',$data);
		$this->load->view('home/sidebarUser');
		$this->load->view('template/footer');
		$this->load->view('template/foot');
      }else{
            redirect('/template');
      }
		
	}
	public function adduser()
	{
		if(isset($_SESSION['sys_login'])&&$_SESSION['sys_login']==true){
          $this->load->model('UserLogin');
		$data['query3']=$this->UserLogin->getYear();
		$data['query']=$this->UserLogin->getselect();
		$this->load->view('template/head');
		$this->load->view('template/nav',$data);
		$this->load->view('home/content_adduser',$data);
		$this->load->view('home/sidebaraddUser');
		$this->load->view('template/footer');
		$this->load->view('template/foot');
	
      }else{
            redirect('/template');
      }
		
	}
	public function saveuser()
	{
		if(isset($_SESSION['sys_login'])&&$_SESSION['sys_login']==true){
          $this->load->model('UserLogin');
		
		$fname=$this->input->post("fname");
		$lname=$this->input->post("lname");
		$tel=$this->input->post("tel");
		$username=$this->input->post("username");
		$password=$this->input->post("password");
		$section_id=$this->input->post("section_id");
		$this->UserLogin->getInsert($fname,$lname,$tel,$username,$password,$section_id);

		redirect('/template/user/1');
	
      }else{
            redirect('/template');
      }
		
	}
	public function success()
	{
		echo "บันทึกเรียบร้อย";
	}

	public function saveuser2($staff_id)
	{
		if(isset($_SESSION['sys_login'])&&$_SESSION['sys_login']==true){
          $this->load->model('UserLogin');
		
		$fname=$this->input->post("fname");
		$lname=$this->input->post("lname");
		$tel=$this->input->post("tel");
		$username=$this->input->post("username");
		$password=$this->input->post("password");
		$section_id=$this->input->post("section_id");
		$this->UserLogin->getedit($staff_id,$fname,$lname,$tel,$username,$password,$section_id);
		redirect('/template/user/1');
	
      }else{
            redirect('/template');
      }
		
	}
	public function edituser($staff_id)
	{
		if(isset($_SESSION['sys_login'])&&$_SESSION['sys_login']==true){
          $this->load->model('UserLogin');
		$data['query3']=$this->UserLogin->getYear();
		$data['query']=$this->UserLogin->getselect();
		$data['query2']=$this->UserLogin->getuser($staff_id);
		$this->load->view('template/head');
		$this->load->view('template/nav',$data);
		$this->load->view('home/content_edituser',$data);
		$this->load->view('home/sidebaraddUser');
		$this->load->view('template/footer');
		$this->load->view('template/foot');
	
      }else{
            redirect('/template');
      }
		
	}
	public function deleteuser($staff_id)
	{
		if(isset($_SESSION['sys_login'])&&$_SESSION['sys_login']==true){
          $this->load->model('UserLogin');
		$data['query3']=$this->UserLogin->getYear();
		$data['query']=$this->UserLogin->deleteuser($staff_id);
		redirect('/template/user/1');
	
      }else{
            redirect('/template');
      }
		
	}
	public function reportuser($id,$section_id)
	{
		if(isset($_SESSION['sys_login'])&&$_SESSION['sys_login']==true){
          $this->load->model('UserLogin');
		  $sql = "".$section_id;
		$query = $this->UserLogin->getbyreportUser($sql);
		$data['query3']=$this->UserLogin->getYear();
		$Num_Rows = $query->num_rows();
		$data['number'] = $Num_Rows;

		$Per_Page = 15;   // Per Page

		$Page = $id;
		if(!$id)
		{
			$Page=1;
		}

		$Prev_Page = $Page-1;
		$Next_Page = $Page+1;

		$Page_Start = (($Per_Page*$Page)-$Per_Page);
		if($Num_Rows<=$Per_Page)
		{
			$Num_Pages =1;
		}
		else if(($Num_Rows % $Per_Page)==0)
		{
			$Num_Pages =($Num_Rows/$Per_Page) ;
		}
		else
		{
			$Num_Pages =($Num_Rows/$Per_Page)+1;
			$Num_Pages = (int)$Num_Pages;
		}
		$sql = " ".$section_id." order by re.date desc LIMIT ".$Page_Start." , ".$Per_Page;
		$data['query'] = $this->UserLogin->getbyreportUser($sql);
		$data['Prev_Page'] = $Prev_Page;
		$data['id'] = $id;
		$data['Num_Pages'] = $Num_Pages;
		$data['Next_Page'] = $Next_Page;
		
		$this->load->view('template/head');
		$this->load->view('template/nav',$data);
		$this->load->view('home/contentreportuser',$data);
		//$this->load->view('home/sidebarUser');
		$this->load->view('template/footer');
		$this->load->view('template/foot');
      }else{
            redirect('/template');
      }
		
	}
	
	public function Show()
	{
		$date    	= $_POST['datestart'];
		list($d, $m, $y) = explode('/', $date);
		$datestart = $y."-".$m."-".$d;
		$date    	= $_POST['datestop'];
		list($d, $m, $y) = explode('/', $date);
		$datestop = $y."-".$m."-".$d;
        $this->load->model('UserLogin');
		$data['query3']=$this->UserLogin->getYear();
		$data['query']=$this->UserLogin->getShow($datestart,$datestop);
		$this->load->view('template/head');
		$this->load->view('template/nav',$data);
		$this->load->view('home/ShowSearch',$data);
		$this->load->view('template/sidebar');
		$this->load->view('template/footer');
		$this->load->view('template/foot');
	}

	public function ShowDetail($report_id)
	{
        $this->load->model('UserLogin');
		$data['query3']=$this->UserLogin->getYear();
		$data['query']=$this->UserLogin->getShowDetail($report_id);
		$data['query2']=$this->UserLogin->getShowDetail($report_id);
		$data['report_id']=$report_id;
		$this->load->view('template/head');
		$this->load->view('template/nav',$data);
		$this->load->view('home/ShowSearchDetail',$data);
		$this->load->view('template/sidebar');
		$this->load->view('template/footer');
		$this->load->view('template/foot');
	}
	public function addre()
	{
		if(isset($_SESSION['sys_login'])&&$_SESSION['sys_login']==true){
          $this->load->model('UserLogin');
		$data['query3']=$this->UserLogin->getYear();
		$data['query']=$this->UserLogin->getselect();
		$this->load->view('template/head');
		$this->load->view('template/nav',$data);
		$this->load->view('home/addreport');
		$this->load->view('home/sidebar3');
		$this->load->view('template/footer');
		$this->load->view('template/foot');
	
      }else{
            redirect('/template');
      }
		
	}
	public function reportOFyear($year)
	{
		if(isset($_SESSION['sys_login'])&&$_SESSION['sys_login']==true){
          $this->load->view('fn/welcome');
      }else{
            redirect('/template');
      }
		$this->load->model('UserLogin');
		$data['query']=$this->UserLogin->getYearReport($year);
		$data3['query3']=$this->UserLogin->getYear();
		$this->load->view('template/head');
		$this->load->view('template/nav',$data3);
		$this->load->view('home/contentReportYear',$data);
		$this->load->view('template/sidebar');
		$this->load->view('template/footer');
		$this->load->view('template/foot');
	}

		public function agendaOFyear($year)
	{
		if(isset($_SESSION['sys_login'])&&$_SESSION['sys_login']==true){
          $this->load->view('fn/welcome');
      }else{
            redirect('/template');
      }
		$this->load->model('UserLogin');
		$data['query']=$this->UserLogin->getYear2($year);
		$data['query2']=$this->UserLogin->getDetail($year);
		$data['year'] = $year;
		//$data['query1']=$this->UserLogin->getMaxNoReport($year);
		//$data['query2']=$this->UserLogin->getMinNoReport($year);
		$data3['query3']=$this->UserLogin->getYear();
		$this->load->view('template/head');
		$this->load->view('template/nav',$data3);
		$this->load->view('home/contentAgenda',$data);
		$this->load->view('template/sidebar');
		$this->load->view('template/footer');
		$this->load->view('template/foot');
	}
	function login_submit(){
         $fname = "";
		$lname = "";
		
		
		$this->load->model('UserLogin');
		$user = $this->input->post('username');
		$password = $this->input->post('password');
		$check = 0;
		$query = $this->UserLogin->getAlllogin($user);
		foreach ($query->result() as $row) {
			if(($row->username == $user)&&($row->password == $password )){
			$check = 1 ;
			$fname = $row->fname;
			$lname = $row->lname;
			$tel= $row->tel;
			$section_id= $row->section_id;
			$staff_id= $row->staff_id;
			$name = $row->name;
			$intype = $row->intype;
		}
		}
		if($check == 1){
		
		$this->session->set_userdata('sys_login', true);
		$this->session->set_userdata('fname', $fname);
		$this->session->set_userdata('lname', $lname);
		$this->session->set_userdata('username', $user);
		$this->session->set_userdata('password', $password);
		$this->session->set_userdata('section_id', $section_id);
		$this->session->set_userdata('tel', $tel);
		$this->session->set_userdata('staff_id', $staff_id);
		$this->session->set_userdata('name', $name);
		$this->session->set_userdata('intype', $intype);
		$message = "success";
		echo "<script type='text/javascript'>alert('$message');</script>";
		redirect('template/index');
		} else{
			$this->session->set_flashdata('msg', 'Username Or Password Incorect');
			$this->session->sess_destroy();
			redirect('template/');
		}
    }
	function logout(){
		if($_SESSION['sys_login']==true){
			$this->session->sess_destroy();
			redirect('template');
			}
		}
		public function ser()
	{
		$this->load->model('UserLogin');
			$data['query3']=$this->UserLogin->getYear();
			$data['query3']=$this->UserLogin->getYear();
			$this->load->view('template/head');
			$this->load->view('template/nav',$data);
			$this->load->view('home/serch');
			if(isset($_SESSION['sys_login'])&&$_SESSION['sys_login']==true){
          $this->load->view('home/sidebar3');
			
      }else{
            $this->load->view('template/sidebar3');
      }
			
			$this->load->view('template/footer');
			$this->load->view('template/foot');
	}
	
	public function ser2()
	{
		$this->load->model('UserLogin');
			
			$data['query3']=$this->UserLogin->getYear();

			$this->load->view('template/head');
			$this->load->view('template/nav',$data);
			$this->load->view('home/serch');
			if(isset($_SESSION['sys_login'])&&$_SESSION['sys_login']==true){
          $this->load->view('home/sidebar');
			
      }else{
            $this->load->view('template/sidebar');
      }
			
			$this->load->view('template/footer');
			$this->load->view('template/foot');
	}

	public function serchuser()
	{
		if(isset($_SESSION['sys_login'])&&$_SESSION['sys_login']==true){
		$this->load->model('UserLogin');
			$data['query2']=$this->UserLogin->getselect();
			$data['query3']=$this->UserLogin->getYear();
			$this->load->view('template/head');
			$this->load->view('template/nav',$data);
			$this->load->view('home/serchuser');
			
          $this->load->view('home/sidebaraddUser');
			$this->load->view('template/footer');
			$this->load->view('template/foot');
      }else{
            redirect('/template');
      }
			
			
	}
	public function serchuser2($id)
	{
		if(isset($_SESSION['sys_login'])&&$_SESSION['sys_login']==true){
		$staff_id  = isset($_POST['staff_id'])?$_POST['staff_id']:"";
		$fname    	= isset($_POST['fname'])?$_POST['fname']:"";
		$lname     = isset($_POST['lname'])?$_POST['lname']:"";
		$tel		= isset($_POST['tel'])?$_POST['tel']:"";
		$namesec		= isset($_POST['namesec'])?$_POST['namesec']:"";
		$name	= isset($_POST['name'])?$_POST['name']:"";
		
		$data['staff_id'] = $staff_id;
		$data['fname'] = $fname;
		$data['lname'] = $lname;
		$data['tel'] = $tel;
		$data['namesec'] = $namesec;
		$data['name'] = $name;
		
		$sql = "";
		if($staff_id!=""){
			$sql .=" and staff_id = '".$staff_id."'";
		}
		if($fname!=""){
			$sql .=" AND fname like '%".$fname."%'";
		}
		if($lname!=""){
			$sql .=" AND lname like '%".$lname."%'";
		}
		if($tel!=""){
			$sql .=" AND tel = '".$tel."'";
		}
		if($namesec!=""){
			$sql .=" and se.section_id like '%".$namesec."%'";
		}
		if($name!=""){
			$sql .=" AND t.name = '".$name."'";
		}
		$this->load->model('UserLogin');
		$query = $this->UserLogin->getin($sql);
		$data['query3']=$this->UserLogin->getYear();
		$Num_Rows = $query->num_rows();
		$data['number'] = $Num_Rows;

		$Per_Page = 15;   // Per Page

		$Page = $id;
		if(!$id)
		{
			$Page=1;
		}

		$Prev_Page = $Page-1;
		$Next_Page = $Page+1;

		$Page_Start = (($Per_Page*$Page)-$Per_Page);
		if($Num_Rows<=$Per_Page)
		{
			$Num_Pages =1;
		}
		else if(($Num_Rows % $Per_Page)==0)
		{
			$Num_Pages =($Num_Rows/$Per_Page) ;
		}
		else
		{
			$Num_Pages =($Num_Rows/$Per_Page)+1;
			$Num_Pages = (int)$Num_Pages;
		}
		$sql2 = " ".$sql." order  by s.staff_id ASC LIMIT ".$Page_Start." , ".$Per_Page;
		$data['query'] = $this->UserLogin->getin($sql2);
		
		$data['Prev_Page'] = $Prev_Page;
		$data['id'] = $id;
		$data['Num_Pages'] = $Num_Pages;
		$data['Next_Page'] = $Next_Page;
		
		$this->load->view('template/head');
		$this->load->view('template/nav',$data);
		$this->load->view('home/content_user',$data);
		$this->load->view('home/sidebarUser');
		$this->load->view('template/footer');
		$this->load->view('template/foot');
      }else{
            redirect('/template');
      }
	}

	public function editagen($agenda_id)
	{
		if(isset($_SESSION['sys_login'])&&$_SESSION['sys_login']==true){
          $this->load->model('UserLogin');
		$data['query3']=$this->UserLogin->getYear();
		$data['query']=$this->UserLogin->getselect();
		$data['query2']=$this->UserLogin->getagenedit($agenda_id);
		$this->load->view('template/head');
		$this->load->view('template/nav',$data);
		$this->load->view('home/editagen',$data);
		$this->load->view('home/sidebar3');
		$this->load->view('template/footer');
		$this->load->view('template/foot');
	
      }else{
            redirect('/template');
      }
		
	}
	public function save_editagen($agenda_id)
	{
		if(isset($_SESSION['sys_login'])&&$_SESSION['sys_login']==true){
			$no    	= $_POST['no'];
			$detail    	= $_POST['detail'];
          $this->load->model('UserLogin');
		
		$data['query2']=$this->UserLogin->save_agenedit($agenda_id,$no,$detail);
		redirect('/template');
	
      }else{
            redirect('/template');
      }
		
	}
	public function deleteagen($agenda_id)
	{
		if(isset($_SESSION['sys_login'])&&$_SESSION['sys_login']==true){
          $this->load->model('UserLogin');
		$data['query3']=$this->UserLogin->deleteagen($agenda_id);
		redirect('/template');
	
      }else{
            redirect('/template');
      }
		
	}
	public function editreport($report_id)
	{
		if(isset($_SESSION['sys_login'])&&$_SESSION['sys_login']==true){
          $this->load->model('UserLogin');
		$data['query3']=$this->UserLogin->getYear();
		$data['query']=$this->UserLogin->getselect();
		$data['query2']=$this->UserLogin->getreportedit($report_id);
		$this->load->view('template/head');
		$this->load->view('template/nav',$data);
		$this->load->view('home/editreport',$data);
		$this->load->view('home/sidebar3');
		$this->load->view('template/footer');
		$this->load->view('template/foot');
	
      }else{
            redirect('/template');
      }
		
	}
	public function save_editreport($report_id)
	{
		$date    	= $_POST['date0'];
		list($d, $m, $y) = explode('/', $date);
		$dt = $y."-".$m."-".$d;
		$nore    	= $_POST['nore'];
		if(isset($_SESSION['sys_login'])&&$_SESSION['sys_login']==true){
          $this->load->model('UserLogin');
		
		$data['query2']=$this->UserLogin->save_reportedit($report_id,$dt,$nore,$y);
		redirect('/template');
	
      }else{
            redirect('/template');
      }
		
	}
	public function deletereport($report_id)
	{
		if(isset($_SESSION['sys_login'])&&$_SESSION['sys_login']==true){
          $this->load->model('UserLogin');
          
		$this->UserLogin->deletereport($report_id);
		
		

		redirect('/template');
	
      }else{
            redirect('/template');
      }
		
	}
	public function editsubagen($no,$agenda_id,$section_id)
	{
		if(isset($_SESSION['sys_login'])&&$_SESSION['sys_login']==true){
          $this->load->model('UserLogin');
		$data['query3']=$this->UserLogin->getYear();
		$data['query']=$this->UserLogin->getselect();
		$data['query2']=$this->UserLogin->editsubagen($no,$agenda_id,$section_id);
		$this->load->view('template/head');
		$this->load->view('template/nav',$data);
		$this->load->view('home/editsubagen',$data);
		$this->load->view('home/sidebar3');
		$this->load->view('template/footer');
		$this->load->view('template/foot');
	
      }else{
            redirect('/template');
      }
		
	}
	public function save_editsubagen($subagenda_id,$term_id,$responsible_id)
	{
		if(isset($_SESSION['sys_login'])&&$_SESSION['sys_login']==true){
			$no   	= $_POST['no'];
			$detail    	= $_POST['detail'];
			$deatailOFterm    	= $_POST['deatailOFterm'];
			$section_id    	= $_POST['section_id'];
          $this->load->model('UserLogin');
		$data['query3']=$this->UserLogin->save_editsubagen($subagenda_id,$no,$detail);
		$data['query']=$this->UserLogin->save_editsubagen2($responsible_id,$section_id);
		$data['query2']=$this->UserLogin->save_editsubagen3($term_id,$deatailOFterm);
		redirect('/template');
	
      }else{
            redirect('/template');
      }
		
	}
	public function deletesubagen($subagenda_id,$term_id,$responsible_id)
	{
		if(isset($_SESSION['sys_login'])&&$_SESSION['sys_login']==true){
          $this->load->model('UserLogin');
		
		$data['query3']=$this->UserLogin->deletesubagen($subagenda_id);
		$data['query']=$this->UserLogin->deletesubagen2($responsible_id);
		$data['query2']=$this->UserLogin->deletesubagen3($term_id);
		redirect('/template');
	
      }else{
            redirect('/template');
      }
		
	}
	
public function addagen()
	{
		$date 	= $_POST['date0'];
		list($d, $m, $y) = explode('/', $date);
		$dt = $y."-".$m."-".$d;
		$no    	= $_POST['nore'];
		$year = $y;
		$this->load->model('UserLogin');
			$data['query1']=$this->UserLogin->getReportID();
			 foreach($data['query1']->result() as $row) { 
                                $report_id = $row->maxIDReport;
                 								} 
			$data['query'] = $this->UserLogin->addagen($dt,$no,$year,($report_id+1));
			$data['query3']=$this->UserLogin->getYear();
			$this->load->view('template/head');
			$this->load->view('template/nav',$data);
			$this->load->view('home/addagen');
			if(isset($_SESSION['sys_login'])&&$_SESSION['sys_login']==true){
          $this->load->view('home/sidebar');
			
      }else{
            $this->load->view('template/sidebar');
      }
			
			$this->load->view('template/footer');
			$this->load->view('template/foot');
	}
		public function addsubagen()
	{


		$this->load->model('UserLogin');
			$data['query1']=$this->UserLogin->getReportID();
			 foreach($data['query1']->result() as $row) { 
                                $report_id = $row->maxIDReport;
                 								} 

			$noagen0 = $this->input->post('noagen0');
			$detailagen0 = $this->input->post('detailagen0');
			if($noagen0!=""){
				$this->session->set_userdata('stop', ($noagen0));
			}

			$noagen1 = $this->input->post('noagen1');
			$detailagen1 = $this->input->post('detailagen1');
			if($noagen1!=""){
				$this->session->set_userdata('stop', ($noagen1));
			}

			$noagen2 = $this->input->post('noagen2');
			$detailagen2 = $this->input->post('detailagen2');
			if($noagen2!=""){
				$this->session->set_userdata('stop', ($noagen2));
			}

			$noagen3 = $this->input->post('noagen3');
			$detailagen3 = $this->input->post('detailagen3');
			if($noagen3!=""){
				$this->session->set_userdata('stop', ($noagen3));
			}

			$noagen4 = $this->input->post('noagen4');
			$detailagen4 = $this->input->post('detailagen4');
			if($noagen4!=""){
				$this->session->set_userdata('stop', ($noagen4));
			}

			$noagen5 = $this->input->post('noagen5');
			$detailagen5 = $this->input->post('detailagen5');
			if($noagen5!=""){
				$this->session->set_userdata('stop', ($noagen5));
			}



			if(($noagen0!="") && ($detailagen0!="")){
				$noagen0=$this->input->post("noagen0");
				$data['query1']=$this->UserLogin->getAgenID();
			 foreach($data['query1']->result() as $row) { 
                                $agenda_id = $row->maxIDAgen;
                 								} 
				$data['query'] = $this->UserLogin->getagen(($agenda_id+1),$noagen0,$detailagen0,($report_id+1));
				$this->session->set_userdata('agenda_id1', ($agenda_id+1));
				$this->session->set_userdata('noagen1', ($noagen0));
				$this->session->set_userdata('detailagen1', ($detailagen0));
				
			}
			if(($noagen1!="") && ($detailagen1!="")){
				$noagen1=$this->input->post("noagen1");
					$data['query1']=$this->UserLogin->getAgenID();
			 foreach($data['query1']->result() as $row) { 
                                $agenda_id = $row->maxIDAgen;
                 								} 
				$data['query'] = $this->UserLogin->getagen(($agenda_id+1),$noagen1,$detailagen1,($report_id+1));
				$this->session->set_userdata('agenda_id2', ($agenda_id+1));
				$this->session->set_userdata('noagen2', ($noagen1));
				$this->session->set_userdata('detailagen2', ($detailagen1));
			}
			if(($noagen2!="") && ($detailagen2!="")){
				$noagen2=$this->input->post("noagen2");
					$data['query1']=$this->UserLogin->getAgenID();
			 foreach($data['query1']->result() as $row) { 
                                $agenda_id = $row->maxIDAgen;
                 								} 
				$data['query'] = $this->UserLogin->getagen(($agenda_id+1),$noagen2,$detailagen2,($report_id+1));
				$this->session->set_userdata('agenda_id3', ($agenda_id+1));
				$this->session->set_userdata('noagen3', ($noagen2));
				$this->session->set_userdata('detailagen3', ($detailagen2));;

			}
			if(($noagen3!="") && ($detailagen3!="")){
				$noagen3=$this->input->post("noagen3");
					$data['query1']=$this->UserLogin->getAgenID();
			 foreach($data['query1']->result() as $row) { 
                                $agenda_id = $row->maxIDAgen;
                 								} 
				$data['query'] = $this->UserLogin->getagen(($agenda_id+1),$noagen3,$detailagen3,($report_id+1));
				$this->session->set_userdata('agenda_id4', ($agenda_id+1));
				$this->session->set_userdata('noagen4', ($noagen3));
				$this->session->set_userdata('detailagen4', ($detailagen3));
			}
			if(($noagen4!="") && ($detailagen4!="")){
				$noagen4=$this->input->post("noagen4");
					$data['query1']=$this->UserLogin->getAgenID();
			 foreach($data['query1']->result() as $row) { 
                                $agenda_id = $row->maxIDAgen;
                 								} 
				$data['query'] = $this->UserLogin->getagen(($agenda_id+1),$noagen4,$detailagen4,($report_id+1));
				$this->session->set_userdata('agenda_id5', ($agenda_id+1));
				$this->session->set_userdata('noagen5', ($noagen4));
				$this->session->set_userdata('detailagen5', ($detailagen4));

			}
			if(($noagen5!="") && ($detailagen5!="")){
				$noagen5=$this->input->post("noagen5");
					$data['query1']=$this->UserLogin->getAgenID();
			 foreach($data['query1']->result() as $row) { 
                                $agenda_id = $row->maxIDAgen;
                 								} 
				$data['query'] = $this->UserLogin->getagen(($agenda_id+1),$noagen5,$detailagen5,($report_id+1));
				$this->session->set_userdata('agenda_id6', ($agenda_id+1));
				$this->session->set_userdata('noagen6', ($noagen5));
				$this->session->set_userdata('detailagen6', ($detailagen5));

			}
				
		$data['query3']=$this->UserLogin->getYear();
		$data['query4']=$this->UserLogin->getselect();
		$this->load->view('template/head');
		$this->load->view('template/nav',$data);
		$this->load->view('home/addsubagen',$data);
		$this->load->view('template/sidebar');
		$this->load->view('template/footer');
		$this->load->view('template/foot');
			}
	public function addsubagen2()
	{
		$this->load->model('UserLogin');
			// $data['query1']=$this->UserLogin->getReportID();
			//  foreach($data['query1']->result() as $row) { 
   //                              $report_id = $row->maxIDReport;
   //               								} 

			$nosubagen0 = $this->input->post('nosubagen0');
			$detailsubagen0 = $this->input->post('detailsubagen0');
			$detailOFterm0 = $this->input->post('detailOFterm0');
			$section_id0 = $this->input->post('section_id0');

			$nosubagen1 = $this->input->post('nosubagen1');
			$detailsubagen1 = $this->input->post('detailsubagen1');
			$detailOFterm1 = $this->input->post('detailOFterm1');
			$section_id1 = $this->input->post('section_id1');

			$nosubagen2 = $this->input->post('nosubagen2');
			$detailsubagen2 = $this->input->post('detailsubagen2');
			$detailOFterm2 = $this->input->post('detailOFterm2');
			$section_id2 = $this->input->post('section_id2');

			$nosubagen3 = $this->input->post('nosubagen3');
			$detailsubagen3 = $this->input->post('detailsubagen3');
			$detailOFterm3 = $this->input->post('detailOFterm3');
			$section_id3 = $this->input->post('section_id3');

			$nosubagen4 = $this->input->post('nosubagen4');
			$detailsubagen4 = $this->input->post('detailsubagen4');
			$detailOFterm4 = $this->input->post('detailOFterm4');
			$section_id4 = $this->input->post('section_id4');

			

			      if($nosubagen0!=""){
			        	$subAgenID =$this->UserLogin->getsubAgenID();//ได้มาแถวเดียว
			        	$subagenda_id="";
				       foreach($subAgenID->result() as $row) { 
				                    $subagenda_id = $row->maxIDsubAgen; //เก็บอาเจนด้า
				        } 

				        $a  = $_SESSION['agenda_id1'];
				        $this->UserLogin->getsubagen1(($subagenda_id+1),$nosubagen0,$detailsubagen0,($a+1));

				        $TermID=$this->UserLogin->getTermID();
				        $term_id="";
				       foreach($TermID->result() as $row) { 
				                  $term_id = $row->maxIDTerm;
				        } 
						 $this->UserLogin->getTerm(($term_id+1),$detailOFterm0,($subagenda_id+1));


				        $ResponableID=$this->UserLogin->getResponableID();
				        $responable_id="";
				        foreach($ResponableID->result() as $row) { 
				                     $responable_id = $row->maxIDResponsible;
				        }

		                foreach($section_id0 as $row => $val) { 
								$responable_id+=1;
		                       $this->UserLogin->getResponable(($responable_id),$val,($term_id));

		                	echo $val ;
		                }
				  }
			      if($nosubagen1!=""){

			        $subAgenID =$this->UserLogin->getsubAgenID();//ได้มาแถวเดียว
			        	$subagenda_id="";
				       foreach($subAgenID->result() as $row) { 
				                    $subagenda_id = $row->maxIDsubAgen; //เก็บอาเจนด้า
				        } 

				        $a  = $_SESSION['agenda_id1'];
				        $this->UserLogin->getsubagen1(($subagenda_id+1),$nosubagen1,$detailsubagen1,($a+1));

				        $TermID=$this->UserLogin->getTermID();
				        $term_id="";
				       foreach($TermID->result() as $row) { 
				                  $term_id = $row->maxIDTerm;
				        } 
						 $this->UserLogin->getTerm(($term_id+1),$detailOFterm1,($subagenda_id+1));


				        $ResponableID=$this->UserLogin->getResponableID();
				        $responable_id="";
				        foreach($ResponableID->result() as $row) { 
				                     $responable_id = $row->maxIDResponsible;
				        }

		                foreach($section_id0 as $row => $val) { 
								$responable_id+=1;
		                       $this->UserLogin->getResponable(($responable_id),$val,($term_id));

		                	echo $val ;
		                }
			      
			      }
			      if($nosubagen2!=""){
			        $subAgenID =$this->UserLogin->getsubAgenID();//ได้มาแถวเดียว
			        	$subagenda_id="";
				       foreach($subAgenID->result() as $row) { 
				                    $subagenda_id = $row->maxIDsubAgen; //เก็บอาเจนด้า
				        } 

				        $a  = $_SESSION['agenda_id1'];
				        $this->UserLogin->getsubagen1(($subagenda_id+1),$nosubagen2,$detailsubagen2,($a+1));

				        $TermID=$this->UserLogin->getTermID();
				        $term_id="";
				       foreach($TermID->result() as $row) { 
				                  $term_id = $row->maxIDTerm;
				        } 
						 $this->UserLogin->getTerm(($term_id+1),$detailOFterm2,($subagenda_id+1));


				        $ResponableID=$this->UserLogin->getResponableID();
				        $responable_id="";
				        foreach($ResponableID->result() as $row) { 
				                     $responable_id = $row->maxIDResponsible;
				        }

		                foreach($section_id0 as $row => $val) { 
								$responable_id+=1;
		                       $this->UserLogin->getResponable(($responable_id),$val,($term_id));

		                	echo $val ;
		                }
			      
			      }
			      if($nosubagen3!=""){
			        $subAgenID =$this->UserLogin->getsubAgenID();//ได้มาแถวเดียว
			        	$subagenda_id="";
				       foreach($subAgenID->result() as $row) { 
				                    $subagenda_id = $row->maxIDsubAgen; //เก็บอาเจนด้า
				        } 

				        $a  = $_SESSION['agenda_id1'];
				        $this->UserLogin->getsubagen1(($subagenda_id+1),$nosubagen3,$detailsubagen3,($a+1));

				        $TermID=$this->UserLogin->getTermID();
				        $term_id="";
				       foreach($TermID->result() as $row) { 
				                  $term_id = $row->maxIDTerm;
				        } 
						 $this->UserLogin->getTerm(($term_id+1),$detailOFterm3,($subagenda_id+1));


				        $ResponableID=$this->UserLogin->getResponableID();
				        $responable_id="";
				        foreach($ResponableID->result() as $row) { 
				                     $responable_id = $row->maxIDResponsible;
				        }

		                foreach($section_id0 as $row => $val) { 
								$responable_id+=1;
		                       $this->UserLogin->getResponable(($responable_id),$val,($term_id));

		          
		                }
			      
			      }
			      if($nosubagen4!=""){
			        $subAgenID =$this->UserLogin->getsubAgenID();//ได้มาแถวเดียว
			        	$subagenda_id="";
				       foreach($subAgenID->result() as $row) { 
				                    $subagenda_id = $row->maxIDsubAgen; //เก็บอาเจนด้า
				        } 

				        $a  = $_SESSION['agenda_id1'];
				        $this->UserLogin->getsubagen1(($subagenda_id+1),$nosubagen4,$detailsubagen4,($a+1));

				        $TermID=$this->UserLogin->getTermID();
				        $term_id="";
				       foreach($TermID->result() as $row) { 
				                  $term_id = $row->maxIDTerm;
				        } 
						 $this->UserLogin->getTerm(($term_id+1),$detailOFterm4,($subagenda_id+1));


				        $ResponableID=$this->UserLogin->getResponableID();
				        $responable_id="";
				        foreach($ResponableID->result() as $row) { 
				                     $responable_id = $row->maxIDResponsible;
				        }

		                foreach($section_id0 as $row => $val) { 
								$responable_id+=1;
		                       $this->UserLogin->getResponable(($responable_id),$val,($term_id));

		                	echo $val ;
		                }
			      
			      }
      
      
      
        
     $data['query3']=$this->UserLogin->getYear();
    $data['query4']=$this->UserLogin->getselect();
    $this->load->view('template/head');
    $this->load->view('template/nav',$data);
   $this->load->view('home/addsubagen2',$data);
     $this->load->view('template/sidebar');
    $this->load->view('template/footer');
    $this->load->view('template/foot');
  }
	public function addsubagen3()
	{

		$this->load->model('UserLogin');
			// $data['query1']=$this->UserLogin->getReportID();
			//  foreach($data['query1']->result() as $row) { 
   //                              $report_id = $row->maxIDReport;
   //               								} 

			$nosubagen0 = $this->input->post('nosubagen0');
			$detailsubagen0 = $this->input->post('detailsubagen0');
			$detailOFterm0 = $this->input->post('detailOFterm0');
			$section_id0 = $this->input->post('section_id0');

			$nosubagen1 = $this->input->post('nosubagen1');
			$detailsubagen1 = $this->input->post('detailsubagen1');
			$detailOFterm1 = $this->input->post('detailOFterm1');
			$section_id1 = $this->input->post('section_id1');

			$nosubagen2 = $this->input->post('nosubagen2');
			$detailsubagen2 = $this->input->post('detailsubagen2');
			$detailOFterm2 = $this->input->post('detailOFterm2');
			$section_id2 = $this->input->post('section_id2');

			$nosubagen3 = $this->input->post('nosubagen3');
			$detailsubagen3 = $this->input->post('detailsubagen3');
			$detailOFterm3 = $this->input->post('detailOFterm3');
			$section_id3 = $this->input->post('section_id3');

			$nosubagen4 = $this->input->post('nosubagen4');
			$detailsubagen4 = $this->input->post('detailsubagen4');
			$detailOFterm4 = $this->input->post('detailOFterm4');
			$section_id4 = $this->input->post('section_id4');

			

			      if($nosubagen0!=""){
			        	$subAgenID =$this->UserLogin->getsubAgenID();//ได้มาแถวเดียว
			        	$subagenda_id="";
				       foreach($subAgenID->result() as $row) { 
				                    $subagenda_id = $row->maxIDsubAgen; //เก็บอาเจนด้า
				        } 

				        $a  = $_SESSION['agenda_id2'];
				        $this->UserLogin->getsubagen1(($subagenda_id+1),$nosubagen0,$detailsubagen0,($a+1));

				        $TermID=$this->UserLogin->getTermID();
				        $term_id="";
				       foreach($TermID->result() as $row) { 
				                  $term_id = $row->maxIDTerm;
				        } 
						 $this->UserLogin->getTerm(($term_id+1),$detailOFterm0,($subagenda_id+1));


				        $ResponableID=$this->UserLogin->getResponableID();
				        $responable_id="";
				        foreach($ResponableID->result() as $row) { 
				                     $responable_id = $row->maxIDResponsible;
				        }

		                foreach($section_id0 as $row => $val) { 
								$responable_id+=1;
		                       $this->UserLogin->getResponable(($responable_id),$val,($term_id));

		                	echo $val ;
		                }
				  }
			      if($nosubagen1!=""){

			        $subAgenID =$this->UserLogin->getsubAgenID();//ได้มาแถวเดียว
			        	$subagenda_id="";
				       foreach($subAgenID->result() as $row) { 
				                    $subagenda_id = $row->maxIDsubAgen; //เก็บอาเจนด้า
				        } 

				        $a  = $_SESSION['agenda_id2'];
				        $this->UserLogin->getsubagen1(($subagenda_id+1),$nosubagen1,$detailsubagen1,($a+1));

				        $TermID=$this->UserLogin->getTermID();
				        $term_id="";
				       foreach($TermID->result() as $row) { 
				                  $term_id = $row->maxIDTerm;
				        } 
						 $this->UserLogin->getTerm(($term_id+1),$detailOFterm1,($subagenda_id+1));


				        $ResponableID=$this->UserLogin->getResponableID();
				        $responable_id="";
				        foreach($ResponableID->result() as $row) { 
				                     $responable_id = $row->maxIDResponsible;
				        }

		                foreach($section_id0 as $row => $val) { 
								$responable_id+=1;
		                       $this->UserLogin->getResponable(($responable_id),$val,($term_id));

		                	echo $val ;
		                }
			      
			      }
			      if($nosubagen2!=""){
			        $subAgenID =$this->UserLogin->getsubAgenID();//ได้มาแถวเดียว
			        	$subagenda_id="";
				       foreach($subAgenID->result() as $row) { 
				                    $subagenda_id = $row->maxIDsubAgen; //เก็บอาเจนด้า
				        } 

				        $a  = $_SESSION['agenda_id2'];
				        $this->UserLogin->getsubagen1(($subagenda_id+1),$nosubagen2,$detailsubagen2,($a+1));

				        $TermID=$this->UserLogin->getTermID();
				        $term_id="";
				       foreach($TermID->result() as $row) { 
				                  $term_id = $row->maxIDTerm;
				        } 
						 $this->UserLogin->getTerm(($term_id+1),$detailOFterm2,($subagenda_id+1));


				        $ResponableID=$this->UserLogin->getResponableID();
				        $responable_id="";
				        foreach($ResponableID->result() as $row) { 
				                     $responable_id = $row->maxIDResponsible;
				        }

		                foreach($section_id0 as $row => $val) { 
								$responable_id+=1;
		                       $this->UserLogin->getResponable(($responable_id),$val,($term_id));

		                	echo $val ;
		                }
			      
			      }
			      if($nosubagen3!=""){
			        $subAgenID =$this->UserLogin->getsubAgenID();//ได้มาแถวเดียว
			        	$subagenda_id="";
				       foreach($subAgenID->result() as $row) { 
				                    $subagenda_id = $row->maxIDsubAgen; //เก็บอาเจนด้า
				        } 

				        $a  = $_SESSION['agenda_id2'];
				        $this->UserLogin->getsubagen1(($subagenda_id+1),$nosubagen3,$detailsubagen3,($a+1));

				        $TermID=$this->UserLogin->getTermID();
				        $term_id="";
				       foreach($TermID->result() as $row) { 
				                  $term_id = $row->maxIDTerm;
				        } 
						 $this->UserLogin->getTerm(($term_id+1),$detailOFterm3,($subagenda_id+1));


				        $ResponableID=$this->UserLogin->getResponableID();
				        $responable_id="";
				        foreach($ResponableID->result() as $row) { 
				                     $responable_id = $row->maxIDResponsible;
				        }

		                foreach($section_id0 as $row => $val) { 
								$responable_id+=1;
		                       $this->UserLogin->getResponable(($responable_id),$val,($term_id));

		          
		                }
			      
			      }
			      if($nosubagen4!=""){
			        $subAgenID =$this->UserLogin->getsubAgenID();//ได้มาแถวเดียว
			        	$subagenda_id="";
				       foreach($subAgenID->result() as $row) { 
				                    $subagenda_id = $row->maxIDsubAgen; //เก็บอาเจนด้า
				        } 

				        $a  = $_SESSION['agenda_id2'];
				        $this->UserLogin->getsubagen1(($subagenda_id+1),$nosubagen4,$detailsubagen4,($a+1));

				        $TermID=$this->UserLogin->getTermID();
				        $term_id="";
				       foreach($TermID->result() as $row) { 
				                  $term_id = $row->maxIDTerm;
				        } 
						 $this->UserLogin->getTerm(($term_id+1),$detailOFterm4,($subagenda_id+1));


				        $ResponableID=$this->UserLogin->getResponableID();
				        $responable_id="";
				        foreach($ResponableID->result() as $row) { 
				                     $responable_id = $row->maxIDResponsible;
				        }

		                foreach($section_id0 as $row => $val) { 
								$responable_id+=1;
		                       $this->UserLogin->getResponable(($responable_id),$val,($term_id));

		                	echo $val ;
		                }
			      
			      }
      
      
      
        
     $data['query3']=$this->UserLogin->getYear();
    $data['query4']=$this->UserLogin->getselect();
    $this->load->view('template/head');
    $this->load->view('template/nav',$data);
   $this->load->view('home/addsubagen3',$data);
     $this->load->view('template/sidebar');
    $this->load->view('template/footer');
    $this->load->view('template/foot');
  }	
  public function addsubagen4()
	{
		$this->load->model('UserLogin');
			// $data['query1']=$this->UserLogin->getReportID();
			//  foreach($data['query1']->result() as $row) { 
   //                              $report_id = $row->maxIDReport;
   //               								} 

			$nosubagen0 = $this->input->post('nosubagen0');
			$detailsubagen0 = $this->input->post('detailsubagen0');
			$detailOFterm0 = $this->input->post('detailOFterm0');
			$section_id0 = $this->input->post('section_id0');

			$nosubagen1 = $this->input->post('nosubagen1');
			$detailsubagen1 = $this->input->post('detailsubagen1');
			$detailOFterm1 = $this->input->post('detailOFterm1');
			$section_id1 = $this->input->post('section_id1');

			$nosubagen2 = $this->input->post('nosubagen2');
			$detailsubagen2 = $this->input->post('detailsubagen2');
			$detailOFterm2 = $this->input->post('detailOFterm2');
			$section_id2 = $this->input->post('section_id2');

			$nosubagen3 = $this->input->post('nosubagen3');
			$detailsubagen3 = $this->input->post('detailsubagen3');
			$detailOFterm3 = $this->input->post('detailOFterm3');
			$section_id3 = $this->input->post('section_id3');

			$nosubagen4 = $this->input->post('nosubagen4');
			$detailsubagen4 = $this->input->post('detailsubagen4');
			$detailOFterm4 = $this->input->post('detailOFterm4');
			$section_id4 = $this->input->post('section_id4');

			

			      if($nosubagen0!=""){
			        	$subAgenID =$this->UserLogin->getsubAgenID();//ได้มาแถวเดียว
			        	$subagenda_id="";
				       foreach($subAgenID->result() as $row) { 
				                    $subagenda_id = $row->maxIDsubAgen; //เก็บอาเจนด้า
				        } 

				        $a  = $_SESSION['agenda_id3'];
				        $this->UserLogin->getsubagen1(($subagenda_id+1),$nosubagen0,$detailsubagen0,($a+1));

				        $TermID=$this->UserLogin->getTermID();
				        $term_id="";
				       foreach($TermID->result() as $row) { 
				                  $term_id = $row->maxIDTerm;
				        } 
						 $this->UserLogin->getTerm(($term_id+1),$detailOFterm0,($subagenda_id+1));


				        $ResponableID=$this->UserLogin->getResponableID();
				        $responable_id="";
				        foreach($ResponableID->result() as $row) { 
				                     $responable_id = $row->maxIDResponsible;
				        }

		                foreach($section_id0 as $row => $val) { 
								$responable_id+=1;
		                       $this->UserLogin->getResponable(($responable_id),$val,($term_id));

		                	echo $val ;
		                }
				  }
			      if($nosubagen1!=""){

			        $subAgenID =$this->UserLogin->getsubAgenID();//ได้มาแถวเดียว
			        	$subagenda_id="";
				       foreach($subAgenID->result() as $row) { 
				                    $subagenda_id = $row->maxIDsubAgen; //เก็บอาเจนด้า
				        } 

				        $a  = $_SESSION['agenda_id3'];
				        $this->UserLogin->getsubagen1(($subagenda_id+1),$nosubagen1,$detailsubagen1,($a+1));

				        $TermID=$this->UserLogin->getTermID();
				        $term_id="";
				       foreach($TermID->result() as $row) { 
				                  $term_id = $row->maxIDTerm;
				        } 
						 $this->UserLogin->getTerm(($term_id+1),$detailOFterm1,($subagenda_id+1));


				        $ResponableID=$this->UserLogin->getResponableID();
				        $responable_id="";
				        foreach($ResponableID->result() as $row) { 
				                     $responable_id = $row->maxIDResponsible;
				        }

		                foreach($section_id0 as $row => $val) { 
								$responable_id+=1;
		                       $this->UserLogin->getResponable(($responable_id),$val,($term_id));

		                	echo $val ;
		                }
			      
			      }
			      if($nosubagen2!=""){
			        $subAgenID =$this->UserLogin->getsubAgenID();//ได้มาแถวเดียว
			        	$subagenda_id="";
				       foreach($subAgenID->result() as $row) { 
				                    $subagenda_id = $row->maxIDsubAgen; //เก็บอาเจนด้า
				        } 

				        $a  = $_SESSION['agenda_id3'];
				        $this->UserLogin->getsubagen1(($subagenda_id+1),$nosubagen2,$detailsubagen2,($a+1));

				        $TermID=$this->UserLogin->getTermID();
				        $term_id="";
				       foreach($TermID->result() as $row) { 
				                  $term_id = $row->maxIDTerm;
				        } 
						 $this->UserLogin->getTerm(($term_id+1),$detailOFterm2,($subagenda_id+1));


				        $ResponableID=$this->UserLogin->getResponableID();
				        $responable_id="";
				        foreach($ResponableID->result() as $row) { 
				                     $responable_id = $row->maxIDResponsible;
				        }

		                foreach($section_id0 as $row => $val) { 
								$responable_id+=1;
		                       $this->UserLogin->getResponable(($responable_id),$val,($term_id));

		                	echo $val ;
		                }
			      
			      }
			      if($nosubagen3!=""){
			        $subAgenID =$this->UserLogin->getsubAgenID();//ได้มาแถวเดียว
			        	$subagenda_id="";
				       foreach($subAgenID->result() as $row) { 
				                    $subagenda_id = $row->maxIDsubAgen; //เก็บอาเจนด้า
				        } 

				        $a  = $_SESSION['agenda_id3'];
				        $this->UserLogin->getsubagen1(($subagenda_id+1),$nosubagen3,$detailsubagen3,($a+1));

				        $TermID=$this->UserLogin->getTermID();
				        $term_id="";
				       foreach($TermID->result() as $row) { 
				                  $term_id = $row->maxIDTerm;
				        } 
						 $this->UserLogin->getTerm(($term_id+1),$detailOFterm3,($subagenda_id+1));


				        $ResponableID=$this->UserLogin->getResponableID();
				        $responable_id="";
				        foreach($ResponableID->result() as $row) { 
				                     $responable_id = $row->maxIDResponsible;
				        }

		                foreach($section_id0 as $row => $val) { 
								$responable_id+=1;
		                       $this->UserLogin->getResponable(($responable_id),$val,($term_id));

		          
		                }
			      
			      }
			      if($nosubagen4!=""){
			        $subAgenID =$this->UserLogin->getsubAgenID();//ได้มาแถวเดียว
			        	$subagenda_id="";
				       foreach($subAgenID->result() as $row) { 
				                    $subagenda_id = $row->maxIDsubAgen; //เก็บอาเจนด้า
				        } 

				        $a  = $_SESSION['agenda_id3'];
				        $this->UserLogin->getsubagen1(($subagenda_id+1),$nosubagen4,$detailsubagen4,($a+1));

				        $TermID=$this->UserLogin->getTermID();
				        $term_id="";
				       foreach($TermID->result() as $row) { 
				                  $term_id = $row->maxIDTerm;
				        } 
						 $this->UserLogin->getTerm(($term_id+1),$detailOFterm4,($subagenda_id+1));


				        $ResponableID=$this->UserLogin->getResponableID();
				        $responable_id="";
				        foreach($ResponableID->result() as $row) { 
				                     $responable_id = $row->maxIDResponsible;
				        }

		                foreach($section_id0 as $row => $val) { 
								$responable_id+=1;
		                       $this->UserLogin->getResponable(($responable_id),$val,($term_id));

		                	echo $val ;
		                }
			      
			      }
      
      
      
        
     $data['query3']=$this->UserLogin->getYear();
    $data['query4']=$this->UserLogin->getselect();
    $this->load->view('template/head');
    $this->load->view('template/nav',$data);
   $this->load->view('home/addsubagen4',$data);
     $this->load->view('template/sidebar');
    $this->load->view('template/footer');
    $this->load->view('template/foot');
  }	
  public function addsubagen5()
	{
		$this->load->model('UserLogin');
			// $data['query1']=$this->UserLogin->getReportID();
			//  foreach($data['query1']->result() as $row) { 
   //                              $report_id = $row->maxIDReport;
   //               								} 

			$nosubagen0 = $this->input->post('nosubagen0');
			$detailsubagen0 = $this->input->post('detailsubagen0');
			$detailOFterm0 = $this->input->post('detailOFterm0');
			$section_id0 = $this->input->post('section_id0');

			$nosubagen1 = $this->input->post('nosubagen1');
			$detailsubagen1 = $this->input->post('detailsubagen1');
			$detailOFterm1 = $this->input->post('detailOFterm1');
			$section_id1 = $this->input->post('section_id1');

			$nosubagen2 = $this->input->post('nosubagen2');
			$detailsubagen2 = $this->input->post('detailsubagen2');
			$detailOFterm2 = $this->input->post('detailOFterm2');
			$section_id2 = $this->input->post('section_id2');

			$nosubagen3 = $this->input->post('nosubagen3');
			$detailsubagen3 = $this->input->post('detailsubagen3');
			$detailOFterm3 = $this->input->post('detailOFterm3');
			$section_id3 = $this->input->post('section_id3');

			$nosubagen4 = $this->input->post('nosubagen4');
			$detailsubagen4 = $this->input->post('detailsubagen4');
			$detailOFterm4 = $this->input->post('detailOFterm4');
			$section_id4 = $this->input->post('section_id4');

			

			      if($nosubagen0!=""){
			        	$subAgenID =$this->UserLogin->getsubAgenID();//ได้มาแถวเดียว
			        	$subagenda_id="";
				       foreach($subAgenID->result() as $row) { 
				                    $subagenda_id = $row->maxIDsubAgen; //เก็บอาเจนด้า
				        } 

				        $a  = $_SESSION['agenda_id4'];
				        $this->UserLogin->getsubagen1(($subagenda_id+1),$nosubagen0,$detailsubagen0,($a+1));

				        $TermID=$this->UserLogin->getTermID();
				        $term_id="";
				       foreach($TermID->result() as $row) { 
				                  $term_id = $row->maxIDTerm;
				        } 
						 $this->UserLogin->getTerm(($term_id+1),$detailOFterm0,($subagenda_id+1));


				        $ResponableID=$this->UserLogin->getResponableID();
				        $responable_id="";
				        foreach($ResponableID->result() as $row) { 
				                     $responable_id = $row->maxIDResponsible;
				        }

		                foreach($section_id0 as $row => $val) { 
								$responable_id+=1;
		                       $this->UserLogin->getResponable(($responable_id),$val,($term_id));

		                	echo $val ;
		                }
				  }
			      if($nosubagen1!=""){

			        $subAgenID =$this->UserLogin->getsubAgenID();//ได้มาแถวเดียว
			        	$subagenda_id="";
				       foreach($subAgenID->result() as $row) { 
				                    $subagenda_id = $row->maxIDsubAgen; //เก็บอาเจนด้า
				        } 

				        $a  = $_SESSION['agenda_id4'];
				        $this->UserLogin->getsubagen1(($subagenda_id+1),$nosubagen1,$detailsubagen1,($a+1));

				        $TermID=$this->UserLogin->getTermID();
				        $term_id="";
				       foreach($TermID->result() as $row) { 
				                  $term_id = $row->maxIDTerm;
				        } 
						 $this->UserLogin->getTerm(($term_id+1),$detailOFterm1,($subagenda_id+1));


				        $ResponableID=$this->UserLogin->getResponableID();
				        $responable_id="";
				        foreach($ResponableID->result() as $row) { 
				                     $responable_id = $row->maxIDResponsible;
				        }

		                foreach($section_id0 as $row => $val) { 
								$responable_id+=1;
		                       $this->UserLogin->getResponable(($responable_id),$val,($term_id));

		                	echo $val ;
		                }
			      
			      }
			      if($nosubagen2!=""){
			        $subAgenID =$this->UserLogin->getsubAgenID();//ได้มาแถวเดียว
			        	$subagenda_id="";
				       foreach($subAgenID->result() as $row) { 
				                    $subagenda_id = $row->maxIDsubAgen; //เก็บอาเจนด้า
				        } 

				        $a  = $_SESSION['agenda_id4'];
				        $this->UserLogin->getsubagen1(($subagenda_id+1),$nosubagen2,$detailsubagen2,($a+1));

				        $TermID=$this->UserLogin->getTermID();
				        $term_id="";
				       foreach($TermID->result() as $row) { 
				                  $term_id = $row->maxIDTerm;
				        } 
						 $this->UserLogin->getTerm(($term_id+1),$detailOFterm2,($subagenda_id+1));


				        $ResponableID=$this->UserLogin->getResponableID();
				        $responable_id="";
				        foreach($ResponableID->result() as $row) { 
				                     $responable_id = $row->maxIDResponsible;
				        }

		                foreach($section_id0 as $row => $val) { 
								$responable_id+=1;
		                       $this->UserLogin->getResponable(($responable_id),$val,($term_id));

		                	echo $val ;
		                }
			      
			      }
			      if($nosubagen3!=""){
			        $subAgenID =$this->UserLogin->getsubAgenID();//ได้มาแถวเดียว
			        	$subagenda_id="";
				       foreach($subAgenID->result() as $row) { 
				                    $subagenda_id = $row->maxIDsubAgen; //เก็บอาเจนด้า
				        } 

				        $a  = $_SESSION['agenda_id4'];
				        $this->UserLogin->getsubagen1(($subagenda_id+1),$nosubagen3,$detailsubagen3,($a+1));

				        $TermID=$this->UserLogin->getTermID();
				        $term_id="";
				       foreach($TermID->result() as $row) { 
				                  $term_id = $row->maxIDTerm;
				        } 
						 $this->UserLogin->getTerm(($term_id+1),$detailOFterm3,($subagenda_id+1));


				        $ResponableID=$this->UserLogin->getResponableID();
				        $responable_id="";
				        foreach($ResponableID->result() as $row) { 
				                     $responable_id = $row->maxIDResponsible;
				        }

		                foreach($section_id0 as $row => $val) { 
								$responable_id+=1;
		                       $this->UserLogin->getResponable(($responable_id),$val,($term_id));

		          
		                }
			      
			      }
			      if($nosubagen4!=""){
			        $subAgenID =$this->UserLogin->getsubAgenID();//ได้มาแถวเดียว
			        	$subagenda_id="";
				       foreach($subAgenID->result() as $row) { 
				                    $subagenda_id = $row->maxIDsubAgen; //เก็บอาเจนด้า
				        } 

				        $a  = $_SESSION['agenda_id4'];
				        $this->UserLogin->getsubagen1(($subagenda_id+1),$nosubagen4,$detailsubagen4,($a+1));

				        $TermID=$this->UserLogin->getTermID();
				        $term_id="";
				       foreach($TermID->result() as $row) { 
				                  $term_id = $row->maxIDTerm;
				        } 
						 $this->UserLogin->getTerm(($term_id+1),$detailOFterm4,($subagenda_id+1));


				        $ResponableID=$this->UserLogin->getResponableID();
				        $responable_id="";
				        foreach($ResponableID->result() as $row) { 
				                     $responable_id = $row->maxIDResponsible;
				        }

		                foreach($section_id0 as $row => $val) { 
								$responable_id+=1;
		                       $this->UserLogin->getResponable(($responable_id),$val,($term_id));

		                	echo $val ;
		                }
			      
			      }
      
      
      
        
     $data['query3']=$this->UserLogin->getYear();
    $data['query4']=$this->UserLogin->getselect();
    $this->load->view('template/head');
    $this->load->view('template/nav',$data);
   $this->load->view('home/addsubagen5',$data);
     $this->load->view('template/sidebar');
    $this->load->view('template/footer');
    $this->load->view('template/foot');
  }	
  public function addsubagen6()
	{
		$this->load->model('UserLogin');
			// $data['query1']=$this->UserLogin->getReportID();
			//  foreach($data['query1']->result() as $row) { 
   //                              $report_id = $row->maxIDReport;
   //               								} 

			$nosubagen0 = $this->input->post('nosubagen0');
			$detailsubagen0 = $this->input->post('detailsubagen0');
			$detailOFterm0 = $this->input->post('detailOFterm0');
			$section_id0 = $this->input->post('section_id0');

			$nosubagen1 = $this->input->post('nosubagen1');
			$detailsubagen1 = $this->input->post('detailsubagen1');
			$detailOFterm1 = $this->input->post('detailOFterm1');
			$section_id1 = $this->input->post('section_id1');

			$nosubagen2 = $this->input->post('nosubagen2');
			$detailsubagen2 = $this->input->post('detailsubagen2');
			$detailOFterm2 = $this->input->post('detailOFterm2');
			$section_id2 = $this->input->post('section_id2');

			$nosubagen3 = $this->input->post('nosubagen3');
			$detailsubagen3 = $this->input->post('detailsubagen3');
			$detailOFterm3 = $this->input->post('detailOFterm3');
			$section_id3 = $this->input->post('section_id3');

			$nosubagen4 = $this->input->post('nosubagen4');
			$detailsubagen4 = $this->input->post('detailsubagen4');
			$detailOFterm4 = $this->input->post('detailOFterm4');
			$section_id4 = $this->input->post('section_id4');

			

			      if($nosubagen0!=""){
			        	$subAgenID =$this->UserLogin->getsubAgenID();//ได้มาแถวเดียว
			        	$subagenda_id="";
				       foreach($subAgenID->result() as $row) { 
				                    $subagenda_id = $row->maxIDsubAgen; //เก็บอาเจนด้า
				        } 

				        $a  = $_SESSION['agenda_id5'];
				        $this->UserLogin->getsubagen1(($subagenda_id+1),$nosubagen0,$detailsubagen0,($a+1));

				        $TermID=$this->UserLogin->getTermID();
				        $term_id="";
				       foreach($TermID->result() as $row) { 
				                  $term_id = $row->maxIDTerm;
				        } 
						 $this->UserLogin->getTerm(($term_id+1),$detailOFterm0,($subagenda_id+1));


				        $ResponableID=$this->UserLogin->getResponableID();
				        $responable_id="";
				        foreach($ResponableID->result() as $row) { 
				                     $responable_id = $row->maxIDResponsible;
				        }

		                foreach($section_id0 as $row => $val) { 
								$responable_id+=1;
		                       $this->UserLogin->getResponable(($responable_id),$val,($term_id));

		                	echo $val ;
		                }
				  }
			      if($nosubagen1!=""){

			        $subAgenID =$this->UserLogin->getsubAgenID();//ได้มาแถวเดียว
			        	$subagenda_id="";
				       foreach($subAgenID->result() as $row) { 
				                    $subagenda_id = $row->maxIDsubAgen; //เก็บอาเจนด้า
				        } 

				        $a  = $_SESSION['agenda_id5'];
				        $this->UserLogin->getsubagen1(($subagenda_id+1),$nosubagen1,$detailsubagen1,($a+1));

				        $TermID=$this->UserLogin->getTermID();
				        $term_id="";
				       foreach($TermID->result() as $row) { 
				                  $term_id = $row->maxIDTerm;
				        } 
						 $this->UserLogin->getTerm(($term_id+1),$detailOFterm1,($subagenda_id+1));


				        $ResponableID=$this->UserLogin->getResponableID();
				        $responable_id="";
				        foreach($ResponableID->result() as $row) { 
				                     $responable_id = $row->maxIDResponsible;
				        }

		                foreach($section_id0 as $row => $val) { 
								$responable_id+=1;
		                       $this->UserLogin->getResponable(($responable_id),$val,($term_id));

		                	echo $val ;
		                }
			      
			      }
			      if($nosubagen2!=""){
			        $subAgenID =$this->UserLogin->getsubAgenID();//ได้มาแถวเดียว
			        	$subagenda_id="";
				       foreach($subAgenID->result() as $row) { 
				                    $subagenda_id = $row->maxIDsubAgen; //เก็บอาเจนด้า
				        } 

				        $a  = $_SESSION['agenda_id5'];
				        $this->UserLogin->getsubagen1(($subagenda_id+1),$nosubagen2,$detailsubagen2,($a+1));

				        $TermID=$this->UserLogin->getTermID();
				        $term_id="";
				       foreach($TermID->result() as $row) { 
				                  $term_id = $row->maxIDTerm;
				        } 
						 $this->UserLogin->getTerm(($term_id+1),$detailOFterm2,($subagenda_id+1));


				        $ResponableID=$this->UserLogin->getResponableID();
				        $responable_id="";
				        foreach($ResponableID->result() as $row) { 
				                     $responable_id = $row->maxIDResponsible;
				        }

		                foreach($section_id0 as $row => $val) { 
								$responable_id+=1;
		                       $this->UserLogin->getResponable(($responable_id),$val,($term_id));

		                	echo $val ;
		                }
			      
			      }
			      if($nosubagen3!=""){
			        $subAgenID =$this->UserLogin->getsubAgenID();//ได้มาแถวเดียว
			        	$subagenda_id="";
				       foreach($subAgenID->result() as $row) { 
				                    $subagenda_id = $row->maxIDsubAgen; //เก็บอาเจนด้า
				        } 

				        $a  = $_SESSION['agenda_id5'];
				        $this->UserLogin->getsubagen1(($subagenda_id+1),$nosubagen3,$detailsubagen3,($a+1));

				        $TermID=$this->UserLogin->getTermID();
				        $term_id="";
				       foreach($TermID->result() as $row) { 
				                  $term_id = $row->maxIDTerm;
				        } 
						 $this->UserLogin->getTerm(($term_id+1),$detailOFterm3,($subagenda_id+1));


				        $ResponableID=$this->UserLogin->getResponableID();
				        $responable_id="";
				        foreach($ResponableID->result() as $row) { 
				                     $responable_id = $row->maxIDResponsible;
				        }

		                foreach($section_id0 as $row => $val) { 
								$responable_id+=1;
		                       $this->UserLogin->getResponable(($responable_id),$val,($term_id));

		          
		                }
			      
			      }
			      if($nosubagen4!=""){
			        $subAgenID =$this->UserLogin->getsubAgenID();//ได้มาแถวเดียว
			        	$subagenda_id="";
				       foreach($subAgenID->result() as $row) { 
				                    $subagenda_id = $row->maxIDsubAgen; //เก็บอาเจนด้า
				        } 

				        $a  = $_SESSION['agenda_id5'];
				        $this->UserLogin->getsubagen1(($subagenda_id+1),$nosubagen4,$detailsubagen4,($a+1));

				        $TermID=$this->UserLogin->getTermID();
				        $term_id="";
				       foreach($TermID->result() as $row) { 
				                  $term_id = $row->maxIDTerm;
				        } 
						 $this->UserLogin->getTerm(($term_id+1),$detailOFterm4,($subagenda_id+1));


				        $ResponableID=$this->UserLogin->getResponableID();
				        $responable_id="";
				        foreach($ResponableID->result() as $row) { 
				                     $responable_id = $row->maxIDResponsible;
				        }

		                foreach($section_id0 as $row => $val) { 
								$responable_id+=1;
		                       $this->UserLogin->getResponable(($responable_id),$val,($term_id));

		                	echo $val ;
		                }
			      
			      }
      
      
      
        
     $data['query3']=$this->UserLogin->getYear();
    $data['query4']=$this->UserLogin->getselect();
    $this->load->view('template/head');
    $this->load->view('template/nav',$data);
   $this->load->view('home/addsubagen6',$data);
     $this->load->view('template/sidebar');
    $this->load->view('template/footer');
    $this->load->view('template/foot');
  }	
  public function addsubagen7()
	{
		$this->load->model('UserLogin');
			// $data['query1']=$this->UserLogin->getReportID();
			//  foreach($data['query1']->result() as $row) { 
   //                              $report_id = $row->maxIDReport;
   //               								} 

			$nosubagen0 = $this->input->post('nosubagen0');
			$detailsubagen0 = $this->input->post('detailsubagen0');
			$detailOFterm0 = $this->input->post('detailOFterm0');
			$section_id0 = $this->input->post('section_id0');

			$nosubagen1 = $this->input->post('nosubagen1');
			$detailsubagen1 = $this->input->post('detailsubagen1');
			$detailOFterm1 = $this->input->post('detailOFterm1');
			$section_id1 = $this->input->post('section_id1');

			$nosubagen2 = $this->input->post('nosubagen2');
			$detailsubagen2 = $this->input->post('detailsubagen2');
			$detailOFterm2 = $this->input->post('detailOFterm2');
			$section_id2 = $this->input->post('section_id2');

			$nosubagen3 = $this->input->post('nosubagen3');
			$detailsubagen3 = $this->input->post('detailsubagen3');
			$detailOFterm3 = $this->input->post('detailOFterm3');
			$section_id3 = $this->input->post('section_id3');

			$nosubagen4 = $this->input->post('nosubagen4');
			$detailsubagen4 = $this->input->post('detailsubagen4');
			$detailOFterm4 = $this->input->post('detailOFterm4');
			$section_id4 = $this->input->post('section_id4');

			

			      if($nosubagen0!=""){
			        	$subAgenID =$this->UserLogin->getsubAgenID();//ได้มาแถวเดียว
			        	$subagenda_id="";
				       foreach($subAgenID->result() as $row) { 
				                    $subagenda_id = $row->maxIDsubAgen; //เก็บอาเจนด้า
				        } 

				        $a  = $_SESSION['agenda_id6'];
				        $this->UserLogin->getsubagen1(($subagenda_id+1),$nosubagen0,$detailsubagen0,($a+1));

				        $TermID=$this->UserLogin->getTermID();
				        $term_id="";
				       foreach($TermID->result() as $row) { 
				                  $term_id = $row->maxIDTerm;
				        } 
						 $this->UserLogin->getTerm(($term_id+1),$detailOFterm0,($subagenda_id+1));


				        $ResponableID=$this->UserLogin->getResponableID();
				        $responable_id="";
				        foreach($ResponableID->result() as $row) { 
				                     $responable_id = $row->maxIDResponsible;
				        }

		                foreach($section_id0 as $row => $val) { 
								$responable_id+=1;
		                       $this->UserLogin->getResponable(($responable_id),$val,($term_id));

		                	echo $val ;
		                }
				  }
			      if($nosubagen1!=""){

			        $subAgenID =$this->UserLogin->getsubAgenID();//ได้มาแถวเดียว
			        	$subagenda_id="";
				       foreach($subAgenID->result() as $row) { 
				                    $subagenda_id = $row->maxIDsubAgen; //เก็บอาเจนด้า
				        } 

				        $a  = $_SESSION['agenda_id6'];
				        $this->UserLogin->getsubagen1(($subagenda_id+1),$nosubagen1,$detailsubagen1,($a+1));

				        $TermID=$this->UserLogin->getTermID();
				        $term_id="";
				       foreach($TermID->result() as $row) { 
				                  $term_id = $row->maxIDTerm;
				        } 
						 $this->UserLogin->getTerm(($term_id+1),$detailOFterm1,($subagenda_id+1));


				        $ResponableID=$this->UserLogin->getResponableID();
				        $responable_id="";
				        foreach($ResponableID->result() as $row) { 
				                     $responable_id = $row->maxIDResponsible;
				        }

		                foreach($section_id0 as $row => $val) { 
								$responable_id+=1;
		                       $this->UserLogin->getResponable(($responable_id),$val,($term_id));

		                	echo $val ;
		                }
			      
			      }
			      if($nosubagen2!=""){
			        $subAgenID =$this->UserLogin->getsubAgenID();//ได้มาแถวเดียว
			        	$subagenda_id="";
				       foreach($subAgenID->result() as $row) { 
				                    $subagenda_id = $row->maxIDsubAgen; //เก็บอาเจนด้า
				        } 

				        $a  = $_SESSION['agenda_id6'];
				        $this->UserLogin->getsubagen1(($subagenda_id+1),$nosubagen2,$detailsubagen2,($a+1));

				        $TermID=$this->UserLogin->getTermID();
				        $term_id="";
				       foreach($TermID->result() as $row) { 
				                  $term_id = $row->maxIDTerm;
				        } 
						 $this->UserLogin->getTerm(($term_id+1),$detailOFterm2,($subagenda_id+1));


				        $ResponableID=$this->UserLogin->getResponableID();
				        $responable_id="";
				        foreach($ResponableID->result() as $row) { 
				                     $responable_id = $row->maxIDResponsible;
				        }

		                foreach($section_id0 as $row => $val) { 
								$responable_id+=1;
		                       $this->UserLogin->getResponable(($responable_id),$val,($term_id));

		                	echo $val ;
		                }
			      
			      }
			      if($nosubagen3!=""){
			        $subAgenID =$this->UserLogin->getsubAgenID();//ได้มาแถวเดียว
			        	$subagenda_id="";
				       foreach($subAgenID->result() as $row) { 
				                    $subagenda_id = $row->maxIDsubAgen; //เก็บอาเจนด้า
				        } 

				        $a  = $_SESSION['agenda_id6'];
				        $this->UserLogin->getsubagen1(($subagenda_id+1),$nosubagen3,$detailsubagen3,($a+1));

				        $TermID=$this->UserLogin->getTermID();
				        $term_id="";
				       foreach($TermID->result() as $row) { 
				                  $term_id = $row->maxIDTerm;
				        } 
						 $this->UserLogin->getTerm(($term_id+1),$detailOFterm3,($subagenda_id+1));


				        $ResponableID=$this->UserLogin->getResponableID();
				        $responable_id="";
				        foreach($ResponableID->result() as $row) { 
				                     $responable_id = $row->maxIDResponsible;
				        }

		                foreach($section_id0 as $row => $val) { 
								$responable_id+=1;
		                       $this->UserLogin->getResponable(($responable_id),$val,($term_id));

		          
		                }
			      
			      }
			      if($nosubagen4!=""){
			        $subAgenID =$this->UserLogin->getsubAgenID();//ได้มาแถวเดียว
			        	$subagenda_id="";
				       foreach($subAgenID->result() as $row) { 
				                    $subagenda_id = $row->maxIDsubAgen; //เก็บอาเจนด้า
				        } 

				        $a  = $_SESSION['agenda_id6'];
				        $this->UserLogin->getsubagen1(($subagenda_id+1),$nosubagen4,$detailsubagen4,($a+1));

				        $TermID=$this->UserLogin->getTermID();
				        $term_id="";
				       foreach($TermID->result() as $row) { 
				                  $term_id = $row->maxIDTerm;
				        } 
						 $this->UserLogin->getTerm(($term_id+1),$detailOFterm4,($subagenda_id+1));


				        $ResponableID=$this->UserLogin->getResponableID();
				        $responable_id="";
				        foreach($ResponableID->result() as $row) { 
				                     $responable_id = $row->maxIDResponsible;
				        }

		                foreach($section_id0 as $row => $val) { 
								$responable_id+=1;
		                       $this->UserLogin->getResponable(($responable_id),$val,($term_id));

		                	echo $val ;
		                }
			      
			      }
      
      
      
        
     $data['query3']=$this->UserLogin->getYear();
    $data['query4']=$this->UserLogin->getselect();
    $this->load->view('template/head');
    $this->load->view('template/nav',$data);
   $this->load->view('home/addsubagensuccess',$data);
     $this->load->view('template/sidebar');
    $this->load->view('template/footer');
    $this->load->view('template/foot');




}

}
