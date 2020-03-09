<?php defined('BASEPATH') or exit('No direct script access allowed');
class Kepala extends CI_Controller
{
    public function __construct() 
    { 
        parent::__construct();
        if(!$this->session->userdata('username')){
            $this->session->set_flashdata('error','<div class="alert alert-danger">Maaf, anda harus login terlebih dahulu</div>');
            redirect('Auth');
        }
        $this->load->model('m_opd');
        $this->load->model('m_bidang');
        $this->load->model('m_laporan', 'laporan');
        $this->load->model('m_user');
    }

    public function index()
    {
        $id_user = $this->session->userdata('id_user');
        $data['user'] = $this->m_user->getbyid($id_user);
        $data['title'] = "Si Waspada | Kepala";
        $data['opd'] = $this->m_opd->getAll();
        $data['bidang'] = $this->m_bidang->getAll();
        view('kepala.laporan', $data);
    }

    public function ajax_list()
    {
        $list = $this->laporan->get_datatables();
        $data = array();
        $no = $_POST['start'];
        foreach ($list as $laporan) {
            $no++;
            $row = array();
            $row[] = $no;
            $row[] = $laporan->nama_opd;
            $row[] = date('d - m - Y (h:i:s)', strtotime($laporan->tanggal));
            $row[] = $laporan->judul;
            $row[] = $laporan->nama_bidang;
            $row[] = $laporan->isi_laporan;
            $row[] = $laporan->tindakan;
            if ($laporan->keterangan == 'Selesai') {
                $row[] = '<span class="text-success">' . $laporan->keterangan . '</span>';
            } else {
                $row[] = '<span class="text-danger">' . $laporan->keterangan . '</span>';
            }
            $row[] = $laporan->nama;
            $row[] = '<div class="btn-group"><a class="btn btn-sm mb-1 btn-flat btn-outline-dark lihatlaporan" href="javascript:void(0)" title="Detail" onclick="lihat_laporan(' . "'" . $laporan->id_laporan . "'" . ')"><i class="glyphicon glyphicon-pencil"></i> Detail</a>';

            $data[] = $row;
        }

        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->laporan->count_all(),
            "recordsFiltered" => $this->laporan->count_filtered(),
            "data" => $data,
        );
        //output to json format
        echo json_encode($output);
    }

    function filter_data()
    {
        $data = $this->laporan->filterData();
        json_encode($data);
    }

    function ambil_satu_lap($id_laporan)
    {
        $output = array();
        $data = $this->laporan->ambilSatuLap($id_laporan);
        foreach ($data as $row) {
            $output['lihat_nama_opd'] = $row->nama_opd;
            $output['lihat_tanggal'] = date('d/m/Y (h:i:s)', strtotime($row->tanggal));
            $output['lihat_judul'] = $row->judul;
            $output['lihat_nama_bidang'] = $row->nama_bidang;
            $output['lihat_isi_laporan'] = $row->isi_laporan;
            $output['lihat_tindakan'] = $row->tindakan;
            $output['lihat_keterangan'] = $row->keterangan;
            $output['lihat_file'] = $row->file;
            $output['lihat_nama'] = $row->nama;
        }
        echo json_encode($output);
    }
}