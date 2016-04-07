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

}
