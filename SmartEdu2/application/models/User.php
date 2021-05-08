<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class User extends CI_Model{

	public function select_user($username){
         $get=null;
		$this->db->from('user');
		$this->db->where('username', $username);

		 $query = $this->db->get();
		if ( $query->num_rows() > 0 )
    	{	
    		$data = $query->result_array();
    	    foreach ($data as $key => $value) {
    	    	# code...
    	    	$get['$username']=$value['username'];
    	    	$get['$password']=$value['password'];
    	    	$get['$status']=$value['status'];
    	    }
    	    $user = array(
    	    	 'username' => $get['$username'],
    	    	 'password' => $get['$password'],
    	    	 'status' => $get['$status']
    	    );
        	return $user;
    	}
    	else{
    		return null;
    	}
	}
    function is_email_available($email)  
      {  
           $this->db->where('email', $email);  
           $query = $this->db->get("user");  
           if($query->num_rows() > 0)  
           {  
                return true;  
           }  
           else  
           {  
                return false;  
           }  
      }  
      function is_username_available($username)  
      {  
           $this->db->where('username', $username);  
           $query = $this->db->get("user");  
           if($query->num_rows() > 0)  
           {  
                return true;  
           }  
           else  
           {  
                return false;  
           }  
      }  
    public function register($data){
        $sql1 = $this->db->insert('user',$data);
        if($sql1){
            return true;
        }
        else{
            return false;
        }
    }
    public function select_profile($username){
        $get=null;
        $this->db->from('detail_user');
        $this->db->where('username',$username);
        $query = $this->db->get();

        if($query->num_rows()>0){
            $data = $query->result_array();
            foreach ($data as $key => $value) {
                $get['nama_lengkap'] = $value['nama_lengkap'];
                $get['foto_profil'] = $value['foto_profil'];
                $get['jenis_kelamin'] = $value['jenis_kelamin'];
                $get['provinsi_id'] = $value['provinsi_id'];
                $get['kabupaten_id'] = $value['kabupaten_id'];
                $get['kecamatan_id'] = $value['kecamatan_id'];
                $get['kelurahan_id'] = $value['kelurahan_id'];
            }
            return $get;
        }
        else{
            return null;
        }
    }
    public function insert_detail_user($data){
        $this->db->where('username',$data['username']);
        $sql = $this->db->update('detail_user',$data);
        if($sql){
            return true;
        }
        else{
            return false;
        }
    }
    public function daftar_mentor($data){
        $query = $this->db->insert('pendaftaran_mentor',$data);
            if($query){
                return true;
            }
            else{
                return false;
            }
        }
}