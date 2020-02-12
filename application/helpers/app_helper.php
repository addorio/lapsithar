<?php
defined('BASEPATH') OR exit('No direct script access allowed');

define("APP_ASSETS", base_url('assets/'));
define('APP_NAME', "PENANGANAN KONFLIK");

date_default_timezone_set("Asia/Bangkok");


// function _instansi()
// {
// 	$ci =& get_instance();
// 	$db = $ci->db->get("tb_instansi");
// 	return $db->result();
// }

// function _sektor()
// {
// 	$ci =& get_instance();
// 	$db = $ci->db->get("tb_sektor");
// 	return $db->result();
// }

// function _dinas()
// {
// 	$ci =& get_instance();
// 	$id_dinas = $ci->session->userdata("id_dinas");
// 	$db = $ci->db->query("select * from tb_dinas where id_dinas ='$id_dinas'");
// 	return $db->result();
// }

// function _dinas_row()
// {
// 	$ci =& get_instance();
// 	$id_dinas = $ci->session->userdata("id_dinas");
// 	$db = $ci->db->query("select * from tb_dinas where id_dinas ='$id_dinas'");
// 	return $db->row();
// }

// function _dinas_all()
// {
// 	$ci =& get_instance();
// 	$db = $ci->db->get("tb_dinas");
// 	return $db->result();
// }

// function _bidang()
// {
// 	$ci =& get_instance();
// 	$id_dinas = $ci->session->userdata("id_dinas");

// 	$db = $ci->db->query("select * from tb_bidang where id_dinas ='$id_dinas' ");
// 	return $db->result();
// }

// function _akses()
// {
// 	$ci =& get_instance();
// 	$db = $ci->db->get("tb_akses");
// 	return $db->result();
// }

// function _kategori()
// {
// 	$ci =& get_instance();
// 	$db = $ci->db->get("tb_kategori");
// 	return $db->result();
// }

// function _userdata()
// {
// 	$ci =& get_instance();

// 	$data = array(
// 		"id_dinas"=>$ci->session->userdata("id_dinas"),
// 		"username"=>$ci->session->userdata("username"),
// 		"id_akses"=>$ci->session->userdata("id_akses"),
// 		"status"=>$ci->session->userdata("status")
// 	);
// 	return $data;
// }

// function _total_layanan($id_bidang)
// {
// 	$ci =& get_instance();
// 	$db = $ci->db->query("select count(id_layanan) as total from tb_layanan where id_bidang='$id_bidang' ");
// 	return $db->row();
// }

// function _total_responden($id_layanan)
// {
// 	$ci =& get_instance();
// 	$db = $ci->db->query("SELECT * FROM `tb_nilai` WHERE id_layanan='$id_layanan'  GROUP BY id_user  ");
// 	return $db->num_rows();
// }

// function _data_layanan($id_layanan)
// {
// 	$ci =& get_instance();
// 	$db = $ci->db->query("SELECT * FROM `tb_layanan` WHERE id_layanan='$id_layanan' ");
// 	return $db->row();
// }

// function _data_jawaban($id_user, $id_layanan, $id_soal)
// {
// 	$ci =& get_instance();
// 	$db = $ci->db->query("SELECT * FROM `tb_nilai` WHERE id_layanan='$id_layanan' and id_soal='$id_soal' and id_user='$id_user' ");
// 	return $db->result();
// }

// function _get_responden($id_layanan)
// {
// 	$ci =& get_instance();
// 	$db = $ci->db->query("SELECT * FROM `tb_nilai` WHERE id_layanan='$id_layanan' GROUP BY id_user ORDER BY id_user ASC ");
// 	return $db->result();
// }

// function _convert_val($id_soal,$jawaban)
// {
// 	$ci =& get_instance();
// 	$db = $ci->db->query("select * from tb_soal where id_soal='$id_soal' ");
// 	$row = $db->row();

// 	if($jawaban=="A")
// 	{
// 		$nilai = $row->bobot_a;
// 	}else if($jawaban=="B")
// 	{
// 		$nilai =$row->bobot_b;
// 	}else if($jawaban=="C")
// 	{
// 		$nilai =$row->bobot_c;
// 	}else if($jawaban=="D")
// 	{
// 		$nilai =$row->bobot_d;
// 	}

// 	return $nilai;
// }

// function _get_name_unsur($id)
// {
// 	$ci =& get_instance();
// 	$db = $ci->db->query("select * from tb_kategori where id_kategori='$id' ");
// 	$row = $db->row();
// 	return $row->nama_kategori;
// }


// function format_number($number)
// {
// 	$dateObj = DateTime::createFromFormat('!m', $number);
// 	$monthName = $dateObj->format('F'); 
// 	return $monthName;
// }

// function get_ikm_bidang($id_bidang) {
//     $ci = & get_instance();
//     $bidang = $id_bidang;

//     $temp_data_responden = array();

//     $soal = $ci->db-> query("select a.*,b.* from tb_soal a join tb_kategori b on a.id_kategori_pelayanan=b.id_kategori");

//     $sql_responden = "";

//     $sql_total = $ci->db-> query("select *, MONTH(tgl_survei) as bulan, count(id_user) as total from tb_nilai ");
//     $data_total_user = array();
//     $data_total_nilai_user = array();
//     $data_total = array();

//     foreach($sql_total-> result() as $row) {

//         foreach($soal-> result() as $value) {

//             $sql = $ci->db-> query("select *, tgl_survei as bulan from tb_nilai where id_bidang='$bidang' and id_soal='$value->id_soal' ");

//             $sql_totals = $sql;
//             $dts = array();
//             foreach($sql_totals-> result() as $key) {
//                 $data_total_nilai_user[$key->id_user][$value-> id_soal] = $key-> nilai;

//             }

//         }

//         $sqls = $ci->db-> query("select *, MONTH(tgl_survei) as bulan,COUNT(DISTINCT id_user) as total from tb_nilai where id_bidang='$bidang' ");

//         $query_total = $sqls;

//         foreach($query_total-> result() as $values) {
//             $data_total_user[] = $values->total;
//         }
//     }

//     // $month = array();
//     $temp_data = array();
//     $no = 1;
//     foreach($data_total_nilai_user as $key => $value) {
//         foreach($value as $ke => $val) {
//             $temp_data[$ke][$key] = $val;
//         }
//         $no++;
//     }

//     $hasil_tranpose = array();
//     foreach($temp_data as $key => $value) {
//         $sum = 0;
//         foreach($value as $ke => $val) {
//             $sum += $val;
//         }
//         $hasil_tranpose[$key][] = $sum;
//     }

//     $result = array();

//     foreach($hasil_tranpose as $key => $value) {
//         foreach($value as $ke => $val) {
//             $result[] = $val;
//         }
//     }

//     $rata = array();
//     for ($j = 0; $j < count($result); $j++) {
//         $rata[$j] = ($result[$j] / ($no - 1));
//     }

//     $total = 0;

//     for ($j = 0; $j < count($result); $j++) {
//         $total += ($result[$j] / ($no - 1)) * 0.11;
//     }

//     $hasil = number_format(($total * 25), 2, '.', ' ');
//     if($hasil>=88.31 && $hasil<=100)
//     {
//     	$status = "A (Sangat Baik)";
//     }else if($hasil>=76.61 && $hasil<=88.30)
//     {
//     	$status = "B (Baik)";
//     }else if($hasil>=65 && $hasil<=76.60)
//     {
//     	$status = "C (Kurang Baik)";
//     }else if($hasil>=25 && $hasil<=64.99)
//     {
//     	$status = "D (Tidak Baik)";
//     }else if($hasil==0)
//     {
//     	$status = "Belum ada penilaian";
//     }
//     $hasil = array(
//     	"nilai"=>$hasil,
//     	"status"=>$status
//     );

//     return $hasil;
// }

// function get_ikm_dinas($id_dinas) {
//     $ci = & get_instance();
//     $dinas = $id_dinas;

//     $temp_data_responden = array();

//     $soal = $ci->db-> query("select a.*,b.* from tb_soal a join tb_kategori b on a.id_kategori_pelayanan=b.id_kategori");

//     $sql_responden = "";

//     $sql_total = $ci->db-> query("select *, MONTH(tgl_survei) as bulan, count(id_user) as total from tb_nilai ");
//     $data_total_user = array();
//     $data_total_nilai_user = array();
//     $data_total = array();

//     foreach($sql_total-> result() as $row) {

//         foreach($soal-> result() as $value) {

//             $sql = $ci->db-> query("select *, tgl_survei as bulan from tb_nilai where id_dinas='$dinas' and id_soal='$value->id_soal'");

//             $sql_totals = $sql;
//             $dts = array();
//             foreach($sql_totals-> result() as $key) {
//                 $data_total_nilai_user[$key->id_user][$value-> id_soal] = $key-> nilai;

//             }

//         }

//         $sqls = $ci->db-> query("select *, MONTH(tgl_survei) as bulan,COUNT(DISTINCT id_user) as total from tb_nilai where id_dinas='$dinas' ");

//         $query_total = $sqls;

//         foreach($query_total-> result() as $values) {
//             $data_total_user[] = $values->total;
//         }
//     }

//     // $month = array();
//     $temp_data = array();
//     $no = 1;
//     foreach($data_total_nilai_user as $key => $value) {
//         foreach($value as $ke => $val) {
//             $temp_data[$ke][$key] = $val;
//         }
//         $no++;
//     }

//     $hasil_tranpose = array();
//     foreach($temp_data as $key => $value) {
//         $sum = 0;
//         foreach($value as $ke => $val) {
//             $sum += $val;
//         }
//         $hasil_tranpose[$key][] = $sum;
//     }

//     $result = array();

//     foreach($hasil_tranpose as $key => $value) {
//         foreach($value as $ke => $val) {
//             $result[] = $val;
//         }
//     }

//     $rata = array();
//     for ($j = 0; $j < count($result); $j++) {
//         $rata[$j] = ($result[$j] / ($no - 1));
//     }

//     $total = 0;

//     for ($j = 0; $j < count($result); $j++) {
//         $total += ($result[$j] / ($no - 1)) * 0.11;
//     }

//     $hasil = number_format(($total * 25), 2, '.', ' ');
//     if($hasil>=88.31 && $hasil<=100)
//     {
//     	$status = "A (Sangat Baik)";
//     }else if($hasil>=76.61 && $hasil<=88.30)
//     {
//     	$status = "B (Baik)";
//     }else if($hasil>=65 && $hasil<=76.60)
//     {
//     	$status = "C (Kurang Baik)";
//     }else if($hasil>=25 && $hasil<=64.99)
//     {
//     	$status = "D (Tidak Baik)";
//     }else if($hasil==0)
//     {
//     	$status = "Belum ada penilaian";
//     }
//     $hasil = array(
//     	"nilai"=>$hasil,
//     	"status"=>$status
//     );

//     return $hasil;
// }