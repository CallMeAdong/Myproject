<?php
class M1 extends CI_Model{
	public function __construct(){
		parent::__construct();
		$this->load->database();
	}
	function getAllRecords($u,$p){
	$where = "username= '".$u."' and password= '".$p."'";
		$this->db->where($where);
		$query = $this->db->get("logintbl");
		$result=$query->result_array();
		return $result; // return rows
	}
	function adduser($name,$dob,$add,$gender,$cell,$password,$cpassword){
		$this->load->helper("url");
		$where = "name= '".$name."'";
		$this->db->where($where);
		$query = $this->db->get("usertbl");
		$result=$query->result_array();
		print_r($result);
		if($gender=="男"){
			$gender=1;
		}else if($gender=="女"){
			$gender=0;
		}
		if($password!=$cpassword){
			echo "111";
			//redirect("test/add","refresh");
			//$this->form_validation->set_message('username_exists', '用户名已被占用');
			return false;
		}
		else if(count($result)>0){
			echo "222";
			//redirect("test/add","refresh");
			return false;
		}else{
			$data=array('name'=>$name,'dob'=>$dob,'add'=>$add,'gender'=>$gender,'cellphone'=>$cell,'isAdmin'=>0,'isDeleted'=>0);
			$bool=$this->db->insert('usertbl',$data);
			echo $bool;
			return $bool;
		}
	}
	function registcheck($name,$cell,$password){
		$where = "name= '".$name."' and cellphone= '".$cell."'";
		$this->db->where($where);
		$query = $this->db->get("usertbl");
		$result=$query->result_array();
		$id=$result[0]['Uid'];
		$data1=array('Uid'=>$id,'username'=>$name,'password'=>$password);
		$bool=$this->db->insert('logintbl',$data1);
		return $bool;		
	}
	function AllRecords($id){
		$sql="select * from usertbl where Uid=".$id;
		$query=$this->db->query($sql);
		$result=$query->result_array();
		return $result;
	}
	function AllRecordsofFriend($id){
		$sql="select * from friendstbl where Uid=".$id;
		$query=$this->db->query($sql);
		$result=$query->result_array();
		return $result;
	}
	function gettime(){
		$this->load->helper('date');
		$datestring='%y-%m-%d %h:%i:%s';
		$time=time()+8*3600;
		return mdate($datestring,$time);
	}
	function addnews($id,$name,$text,$date){
		if($text==""){
			return false;
		}
		$where = "uid= '".$id."' and name= '".$name."'";
		$this->db->where($where);
		$query = $this->db->get("usertbl");
		$result=$query->result_array();
		//print_r($result);
		$id=$result[0]['Uid'];
		$name=$result[0]['name'];
		$data=array('uid'=>$id,'uname'=>$name,'text'=>$text,'date'=>$date,'isDelete'=>0);
		$bool=$this->db->insert('newtbl',$data);
		return $bool;
	}
	function AllRecordsofnews(){
		$sql="select * from newtbl";
		$query=$this->db->query($sql);
		$result=$query->result_array();
		return $result;
	}
	function Allfriendsnews($id){
		$where = "uid= '".$id."'";
		$this->db->where($where);
		$query = $this->db->get("friendstbl");
		$result=$query->result_array();
		if($result<=0){
			return 0;
		}
		else{
			for($i=0;$i<count($result);$i++){
				$fname[$i]=$result[$i]['fname'];	
					for($i=0;$i<count($fname);$i++){
						$where = "uname= '".$fname[$i]."'";
						$this->db->where($where);
						$query = $this->db->get("newtbl");
						$result1=$query->result_array();
					}
				return $result1;
			}
		}
	}
		
	function SeeNewsById($id){
		$where = "uid= '".$id."'";
		$this->db->where($where);
		$query = $this->db->get("newtbl");
		$result=$query->result_array();
		return $result;
	}
	function SeeFriendInfoByName($name){
		if($name==""){
			echo "好友名不能为空";
			return 0;
		}else{
			$where = "name= '".$name."'";
			$this->db->where($where);
			$query = $this->db->get("usertbl");
			$result=$query->result_array();
			if($result<=0){
				echo "该用户不存在";
				return 0;
			}
			else{
				return $result;
			}
		}	
	}
	function SeeFriendNewsByName($name){
		if($name==""){
			echo "好友名不能为空";
			return 0;
		}else{
			$where = "uname= '".$name."'";
			$this->db->where($where);
			$query = $this->db->get("newtbl");
			$result=$query->result_array();
			if($result<=0){
				echo "该用户不存在";
				return 0;
			}
			else{
				return $result;
			}
		}	
	}
	function AddFriendByName($uid,$fname,$username){
		$where = "name='".$fname."'";
		$this->db->where($where);
		$query = $this->db->get("usertbl");
		$result=$query->result_array();
		if($result<=0){
			echo "用户不存在";
			return false;
		}else{
			$where = "uid= '".$uid."' and fname= '".$fname."'";
			$this->db->where($where);
			$query = $this->db->get("friendstbl");
			$result1=$query->result_array();
			if($result>0){
				echo "该用户已经是你的好友";
				return false;
			}else{
				$id=$result[0]['Uid'];
				$data1=array('Uid'=>$uid,'fname'=>$fname,'uname'=>$username,'isDelete'=>0);
				$bool=$this->db->insert('friendstbl',$data1);
				return $bool;		
			}
			
		}
		
	}
	function insertpic($uid,$uname,$path,$date){
		$data1=array('uid'=>$uid,'uname'=>$uname,'pic'=>$path,'date'=>$date,'iDelete'=>0);
		$bool=$this->db->insert('pictbl',$data1);
		return $bool;		
	}
	function listphotobyname($uname){
			$where = "uname= '".$uname."'";
			$this->db->where($where);
			$query = $this->db->get("pictbl");
			 return $result=$query->result_array();
	}
	function countPhoto(){
		$query = $this->db->get("pictbl");
		$result=$query->result_array();
		return count($result);
	}
}


?>