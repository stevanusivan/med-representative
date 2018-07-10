<?php
  class Pages extends CI_Controller{
    public function view($page = 'home'){
      if(!file_exists(APPPATH.'views/pages/'.$page.'.php')){
        show_404();
      }
      if($page == 'home'){
        $data['title'] = 'Prescription';
      }else{$data['title'] = ucfirst($page);}

      $data['prescriptions'] = $this->prescription_model->get_prescription_doctor();

      //print_r($data['prescription']);
      $this->load->view('templates/header');
      $this->load->view('pages/'.$page,$data);
      $this->load->view('templates/footer');
    }

    public function search(){
      $data['title'] = 'Prescription';
      $data['searchValue'] = $this->input->post('searchText');
      $data['prescriptions'] = $this->prescription_model->get_prescription_doctor($data['searchValue']);
      //print_r($data);
      $this->load->view('templates/header');
      $this->load->view('pages/home',$data);
      $this->load->view('templates/footer');
    }
  }
?>
