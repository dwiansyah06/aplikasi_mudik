<?php

class Template {

    function __construct(){
        $this->CI = & get_instance();
    }

    function display($template, $data=null){
    	$this->CI->load->model('M_user');
      $id_user = $this->CI->session->userdata('id_user');
    	$response['user'] = $this->CI->M_user->get_mydata(array('Id_user' => $id_user),'user');
      // $response['perbaikan'] = $this->CI->M_user->customNumQuery("SELECT * FROM permintaan_perbaikan WHERE status = 0 OR status = 1");
      // $response['perbaikan_teknisi'] = $this->CI->M_user->customNumQuery("SELECT * FROM permintaan_perbaikan WHERE status = 2 OR status = 3 OR status = 4");

    	$data['_content'] = $this->CI->load->view($template, $data, true);
      $data['_header'] = $this->CI->load->view('components/header', $data, true);
      $data['_sidebar'] = $this->CI->load->view('components/sidebar', $response, true);
      $data['_footer'] = $this->CI->load->view('components/footer', $data, true);
    	$this->CI->load->view('/template.php', $data);
    }
}

?>
