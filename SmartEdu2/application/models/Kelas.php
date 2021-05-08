<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Kelas extends CI_Model{
  public function insert_kelas($data){
    $res = $this->db->insert('kelas',$data);
    if($res){
      return true;
    }
    else{
      return false;
    }
  }
  public function getKelas($perpage,$start,$user)
    {
        # code...
        $this->db->where('avaible','true');
        $this->db->where('username_mentor !=',$user); 
        return $get = $this->db->get('kelas',$perpage,$start)->result_array();
    }
    public function getRowKelas($user){
        $this->db->where('avaible','true'); 
        $this->db->where('username_mentor!=',$user); 
        $this->db->from('kelas');
        $query = $this->db->get();
        $row = $query->num_rows();
        return $row;
    }
}