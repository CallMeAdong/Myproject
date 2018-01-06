<?php
	class Test extends CI_Controller{
		public function __construct(){
		parent::__construct(); 
		$this->load->helper("form","url"); 
	}
		public $id;
		public function index(){
			$this->load->helper("url");
			$this->load->view('login.php');
		}

		function check(){
			$name=$_POST['username'];
			$password=$_POST['userpwd'];
			$this->load->database(); // connect to databaase
			$this->load->model("m1"); // load the model
			$res= $this->m1->getAllRecords($name,$password); // give the result of rows
			$this->id=$res[0]['Uid'];
			if(!isset($_SESSION)){
				session_start();
			}
			$_SESSION['id']=$res[0]['Uid'];
			$_SESSION['username']=$name;
			$this->load->helper("url");
			if(count($res)>0){

				$res['list']= $this->m1->AllRecords($this->id); 
				$res['listfriend']= $this->m1->AllRecordsofFriend($this->id); 
				$res['listnews']=$this->m1->AllRecordsofnews();
				$res['listfriendnews']=$this->m1->Allfriendsnews($this->id);
				$this->load->view('mypage.php',$res);
			} else { 
				redirect("Test/index","refresh");
			}
			$this->load->model("m1"); // load the model
			$res['time']= $this->m1->gettime();
		}
		function add(){
			$this->load->view('adduser.php');
		}
		function adduser(){
			$name=$_POST['name'];
			
			echo $name;
			$dob=$_POST['dob'];
			$add=$_POST['add'];
			$gender=$_POST['gender'];
			$cell=$_POST['cellphone'];
			$password=$_POST['password'];
			$cpassword=$_POST['cpassword'];
			$this->load->database(); // connect to databaase
			$this->load->model("m1"); // load the model
			$bool= $this->m1->adduser($name,$dob,$add,$gender,$cell,$password,$cpassword); // give the result of rows
			//$this->load->helper("url");
			if($bool){
				$this->load->model("m1"); 
				$result=$this->m1->registcheck($name,$cell,$password);
				if($result){
					echo "111111";
				}
			}else{
				echo "register error";
			}
		}
		function writenews(){
			$this->load->database(); // connect to databaase
			$this->load->model("m1");
			if(!isset($_SESSION)){
				session_start();
			}
			$id=$_SESSION['id'];
			$res['list']=$this->m1->AllRecords($id);
			$res['listnewsbyid']=$this->m1->SeeNewsById($id);
			$this->load->view("writenews.php",$res);
		}
		function write(){
			$this->load->model("m1");
			$res['time']= $this->m1->gettime();
			$this->load->view('write.php',$res);
		}
		function addnews(){
			if(!isset($_SESSION)){
				session_start();
			}
			$id=$_SESSION['id'];
			$this->load->model("m1");
			$res=$this->m1->AllRecords($id);
			$date=$this->m1->gettime();
			print_r($res);
			$id=$res[0]['Uid'];
			$name=$res[0]['name'];
			$text=$_POST['text'];
			$bool=$this->m1->addnews($id,$name,$text,$date);
			if($bool){
				echo "onload success";
			}else{
				echo "onload error";
			}
		}
		function addfriendpage(){
			$this->load->helper("url");
			$this->load->view('searchfriend.php');
		}
		function seefriendinfo(){
			$this->load->helper("url");
				$this->load->model("m1"); 
				$name=$_POST['friendname'];
				if(!isset($_SESSION)){
				session_start();
			}
				$_SESSION['fname']=$name;
				$res= $this->m1->SeeFriendInfoByName($name);
				//print_r($res);
				if(count($res)>0){
					if($res>0){
						$res['list']= $this->m1->SeeFriendInfoByName($name); 
					//print_r($res);
						$res['listnews']= $this->m1->SeeFriendNewsByName($name); 
					//print_r($res);
						$this->load->view("friendhomepage.php",$res);
						}					
				}else{
					echo "用户名为空或者不存在";
				}
			}
			function addfriend(){
				if(!isset($_SESSION)){
					session_start();
				}
				$fname=$_SESSION['fname'];
				$id=$_SESSION['id'];
				$username=$_SESSION['username'];
				$this->load->model("m1"); 
				$res=$this->m1->AddFriendByName($id,$fname,$username);
			}
			function gofriendpage($name){            //朋友页面没做完
				$this->load->model("m1"); 
				$this->load->helper("url");
				$res['listnews']=$this->m1->SeeFriendNewsByName($name);
				$res['list']=$this->m1->SeeFriendInfoByName($name);
				$this->load->view("friendhomepage",$res);
			}
			function listphotopage(){
				$this->load->helper("url");
				$this->load->model("m1");
				if(!isset($_SESSION)){
					session_start();
				}				
				$uid=$_SESSION['id'];
				$uname=$_SESSION['username'];
				$data['listPic'] = $this->m1->listphotobyname("$uname");
				$this->load->view("listphotopage.php",$data);
			}
			function onloadphotopage(){
				$this->load->view("onloadpic.php");
			}
			function listpic(){

				$this->load->view("listpic.php");
			}
			 public function do_upload(){
			 	 $this->load->model("m1");
			 	 $fileName = $this->m1->countPhoto();
			 	 //$this->m1->countPhoto();
			 	 $this->load->helper("url");
			 	 $config['upload_path']='./img/'; 
				 $config['allowed_types']='gif|jpg|png'; 
				 $config['max_size']=100; 
				 $config['max_width']=1024; 
				 $config['max_height']=768; 
				 $config['file_name']=$fileName;
				 $this->load->library('upload',$config); 
				 if(!isset($_SESSION)){
					session_start();
				}				
				 $uid=$_SESSION['id'];
				 $uname=$_SESSION['username'];
				 
				 $date=$this->m1->gettime();
				 if($this->upload->do_upload()){ 
				 	 $arr = $this->upload->data();  
				 	 $error=array('error'=>$this->upload->display_errors());
				 	 $data="img/".$fileName.$arr['file_ext'];//插入到数据库中
				 	 $bool=$this->m1->insertpic($uid,$uname,$data,$date);
				 	 echo $bool;
				 		if($bool){
				 			 $data=array('upload_data'=>$this->upload->data()); 
				 	 		$this->load->view('upload_success.php',$data); 
				 		}
				 }
				 else
				 {
				 	echo "fail";
				 }
			}
			function seefriendnews($name){
				$this->load->model("m1"); 
				$res['listnews']=$this->m1->listphotobyname($name);
				echo "1111";
				print_r($res);
				$this->load->view("listfriendpnewspage.php",$res);
			}
			function seefriendphoto($name){
				$this->load->helper("url");
				$this->load->model("m1"); 
				$res['listphoto']=$this->m1->listphotobyname($name);
				$this->load->view("listfriendphotopage.php",$res);
			} 
				 
		
	}
?>