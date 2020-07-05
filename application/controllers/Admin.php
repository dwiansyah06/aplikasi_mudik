<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

	var $API ="";

	function __construct()
	{
		parent::__construct();
		$this->load->model('M_user');
		$this->load->library('curl');
		$this->API="https://dev.farizdotid.com/api/daerahindonesia/provinsi";
		if (empty($this->session->userdata('id_user'))) {
				redirect(base_url().'general/');
		}
	}

	public function index()
	{
		$data['judul'] = "Dashboard | Mudik Gratis PGN";
		$data['rute'] = $this->M_user->get_data('perjalanan');
		$this->template->display('dashboard', $data);
	}

	public function keberangkatan()
	{
		$data['judul'] = "Data Perjalanan | Mudik Gratis PGN";
		$data['mudik'] = $this->M_user->get_data('perjalanan');
		$data['kota'] = json_decode($this->curl->simple_get($this->API));

		$this->template->display('admin/keberangkatan.php', $data);
	}

	public function addKeberangkatan()
	{
		$data = array(
			'moda_transportasi'	 	=> $this->input->post('_transport'),
			'asal' 		=> $this->input->post('_asal'),
			'tujuan' 	=> $this->input->post('_tujuan'),
			'jadwal' 	=> $this->input->post('_jadwal'),
			'slot' 		=> $this->input->post('_slot')
		);

		$this->M_user->input_data($data, 'perjalanan');
	}

	public function VerifikasiTiket()
	{
		$data['judul'] = "Verifikasi Tiket | Mudik Gratis PGN";
		$data['tiket'] = $this->M_user->joinTable2();

		$this->template->display('admin/verifikasi_tiket.php', $data);
	}

	public function verif_tiket()
	{
		$data = array('status' => $this->input->post('verifikasi'));
		$this->M_user->udp_data($data, array('Id_tiket' => $this->input->post('id_tiket')), 'tiket');

		if ($this->input->post('verifikasi') == 1) {
			$data_perjalanan = $this->M_user->get_mydata(array('Id_perjalanan' => $this->input->post('id_perjalanan')),'perjalanan');
			$add_slot = $data_perjalanan['jum_pendaftar'] + $this->input->post('jumlah_orang');

			$pendaftar_upd = array('jum_pendaftar' => $add_slot);
			$this->M_user->udp_data($pendaftar_upd, array('Id_perjalanan' => $this->input->post('id_perjalanan')), 'perjalanan');
		}

	}

}
