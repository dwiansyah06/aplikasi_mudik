<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Penumpang extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->model('M_user');
		if (empty($this->session->userdata('id_user'))) {
				redirect(base_url().'general/');
		}
	}

	public function index()
	{
		$data['judul'] = "Dashboard | Mudik Gratis PGN";
		$this->template->display('dashboard', $data);
	}

	public function DataKeberangkatan()
	{
		$data['judul'] = "Data Perjalanan | Mudik Gratis PGN";
		$data['mudik'] = $this->M_user->get_data('perjalanan');
		$this->template->display('penumpang/keberangkatan', $data);
	}

	public function claim_perjalanan()
	{
		$data_perjalanan = $this->M_user->get_mydata(array('Id_perjalanan' => $this->input->post('id_perjalanan')),'perjalanan');
		$akumulasi_pendaftar = $data_perjalanan['jum_pendaftar'] + $this->input->post('jumOrang');
		if ($data_perjalanan['slot'] >= $akumulasi_pendaftar) {
			$data_tiket = $this->M_user->get_num_data('tiket')+1;
			$data = array(
				'tiket'	 	=> 'Tiket-'.$data_tiket,
				'id_user' 		=> $this->session->userdata('id_user'),
				'id_perjalanan' 	=> $this->input->post('id_perjalanan'),
	      'jum_orang' 	=> $this->input->post('jumOrang'),
				'status' 	=> 0
			);

			$this->M_user->input_data($data, 'tiket');

			$param['oke']['alert'] = 'Berhasil';
		} else {
			$param['error']['failed'] = 'Maaf tidak bisa claim perjalanan ini karena jumlah orang yang kamu ajak melebihi limit';
		}

		if (empty($param['error'])) {
			$param['hasil'] = 'success';
		} else {
			$param['hasil'] = 'fail';
		}

		echo json_encode($param);
	}

	public function PerjalananDipilih()
	{
		$data['judul'] = "Data Perjalanan | Mudik Gratis PGN";
		$data['perjalanan_dipilih'] = $this->M_user->joinTable();
		$this->template->display('penumpang/perjalanan_dipilih', $data);
	}

}
