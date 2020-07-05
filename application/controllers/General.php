<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class General extends CI_Controller {

  function __construct()
	{
		parent::__construct();
		$this->load->model('M_user');
	}

  public function index()
	{
		$data['judul'] = 'Signin | PGN Mudik Gratis';
    $this->load->view('login', $data);
	}

  public function login_process()
  {
    $where = array('email' => htmlspecialchars(addslashes($this->input->post('_email'))));
    $result = $this->M_user->get_num_detail($where, 'user');

    if ($result == 1) {
      $data = $this->M_user->get_mydata($where, 'user');

      $password = md5(htmlspecialchars(addslashes($this->input->post('_pass'))));

      if ($data['password'] == $password)
      {
        $param['oke']['alert'] = 'masuk pak eko';
      } else {
        $param['error']['not_found'] = 'Maaf password yang anda masukan tidak cocok';
      }
    } else {
      $param['error']['not_found'] = 'Maaf tidak ada Email '.$this->input->post('_email').' di database kami';
    }

    if (empty($param['error'])) {
      $sess_data['id_user'] 	 = $data['Id_user'];
      $sess_data['email'] 	   = $data['email'];
      $sess_data['level'] 	   = $data['level'];

      $this->session->set_userdata($sess_data);

      $param['level'] = $data['level'];
      $param['hasil'] = 'success';
    } else {
      $param['hasil'] = 'fail';
    }

    echo json_encode($param);
  }

  public function logout()
  {
    $this->session->sess_destroy();
		redirect(base_url());
  }

}
