<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Wilayah extends CI_Model {

var $tabel_provinsi='wilayah_provinsi';
var $tabel_kabupaten='wilayah_kabupaten';
var $tabel_kecamatan='wilayah_kecamatan';
var $tabel_kelurahan='wilayah_desa';

	public function __construct(){
	parent::__construct();
	}
	
	
	
	public function ambil_provinsi() {
	$sql_prov=$this->db->get($this->tabel_provinsi);	
	if($sql_prov->num_rows()>0){
		foreach ($sql_prov->result_array() as $row)
			{
				$result['-']= '- Pilih Provinsi -';
				$result[$row['id']]= ucwords(strtolower($row['nama']));
			}
			return $result;
		}
	}
	
	public function ambil_kabupaten($kode_prop){
	$this->db->where('provinsi_id',$kode_prop);
	$this->db->order_by('nama','asc');
	$sql_kabupaten=$this->db->get($this->tabel_kabupaten);
	if($sql_kabupaten->num_rows()>0){

		foreach ($sql_kabupaten->result_array() as $row)
        {
            $result[$row['id']]= ucwords(strtolower($row['nama']));
        }
		} else {
		   $result['-']= '- Belum Ada Kabupaten -';
		}
        return $result;
	}
	
	public function ambil_kecamatan($kode_kab){
	$this->db->where('kabupaten_id',$kode_kab);
	$this->db->order_by('nama','asc');
	$sql_kecamatan=$this->db->get($this->tabel_kecamatan);
	if($sql_kecamatan->num_rows()>0){

		foreach ($sql_kecamatan->result_array() as $row)
        {
            $result[$row['id']]= ucwords(strtolower($row['nama']));
        }
		} else {
		   $result['-']= '- Belum Ada Kecamatan -';
		}
        return $result;
	}

	public function ambil_kelurahan($kode_kec){
	$this->db->where('kecamatan_id',$kode_kec);
	$this->db->order_by('nama','asc');
	$sql_kelurahan=$this->db->get($this->tabel_kelurahan);
	if($sql_kelurahan->num_rows()>0){

		foreach ($sql_kelurahan->result_array() as $row)
        {
            $result[$row['id']]= ucwords(strtolower($row['nama']));
        }
		} else {
		   $result['-']= '- Belum Ada Kelurahan -';
		}
        return $result;
	}
	public function get_alamat($id_provinsi,$id_kabupaten,$id_kecamatan,$id_kelurahan){
		$this->db->from('wilayah_provinsi');
		$this->db->where('id',$id_provinsi);
		$sql_provinsi = $this->db->get();

		$this->db->from('wilayah_kabupaten');
		$this->db->where('id',$id_kabupaten);
		$sql_kabupaten= $this->db->get();

		$this->db->from('wilayah_kecamatan');
		$this->db->where('id',$id_kecamatan);
		$sql_kecamatan = $this->db->get();

		$this->db->from('wilayah_desa');
		$this->db->where('id',$id_kelurahan);
		$sql_kelurahan = $this->db->get();	

		
		if($sql_provinsi->num_rows()>0&&$sql_kabupaten->num_rows()>0&&$sql_kecamatan->num_rows()>0&&$sql_kecamatan->num_rows()>0){
			$res_prov = $sql_provinsi->result_array();
			foreach ($res_prov as $key => $row) {
			# code...
			$data['provinsi'] = $row['nama'];
			}
			$res_kab = $sql_kabupaten->result_array();
			foreach ($res_kab as $key => $row) {
			# code...
			$data['kabupaten'] = $row['nama'];
			}
			$res_kec = $sql_kecamatan->result_array();
			foreach ($res_kec as $key => $row) {
			# code...
			 $data['kecamatan'] = $row['nama'];
			}
			$res_kel = $sql_kelurahan->result_array();
			foreach ($res_kel as $key => $ror) {
			# code...
				$data['kelurahan'] = $row['nama'];
			}
		return $data;
		}
		
	}
}
