<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Buku extends CI_Model{
	var $isbn;
	var $juduliklan;
    var $judulbuku;
    var $penerbit;
    var $penulis;
    var $pemilikbuku;
    var $foto;

    public function getBuku($perpage,$start,$user)
    {
        # code...
        $this->db->where('avaible','true');
        $this->db->where('pemilik_buku !=',$user); 
        return $get = $this->db->get('buku',$perpage,$start)->result_array();
    }
    public function getRowBuku($user){
        $this->db->where('avaible','true'); 
        $this->db->where('pemilik_buku !=',$user); 
        $this->db->from('buku');
        $query = $this->db->get();
        $row = $query->num_rows();
        return $row;
    }
    public function uploadbuku($data,$detail){
         $sql1 = $this->db->insert('buku',$data);
         $sql2 = $this->db->insert('detail_buku',$detail);
         if($sql1&&$sql2){
            return true;
         }
         else{
            return false;
         }
    }
    public function get_live_books($search_data){
        $sql = 'select * from buku where judul_iklan LIKE "%'.$search_data.'%" OR judul_buku LIKE "%'.$search_data.'%" OR penulis LIKE "%'.$search_data.'%" OR penerbit LIKE "%'.$search_data.'%" OR pemilik_buku LIKE "%'.$search_data.'%" LIMIT 5;';
        $query = $this->db->query($sql);

        return $query->result();
    }
    public function insert_peminjaman($data){
        $sql = $this->db->insert('peminjaman_buku',$data);
        if($sql){
            return true;
        }
        else{
            return false;
        }
    }
    public function update_buku($isbn){
        $this->db->set('avaible','false');
        $this->db->where('isbn',$isbn);
        $sql = $this->db->update('buku');
        if($sql){
           return true;
        }
        else{
            return false;
        }
    }
}