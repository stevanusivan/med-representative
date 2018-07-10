<?php
  class prescription extends CI_Controller{
    public function create(){
      $data['title'] = 'Register Prescription';
      $this->form_validation->set_rules('txtDoctorName','Doctor Name','required');
      $this->form_validation->set_rules('txtDoctorPracticeLocation','Doctor Practice Location','required');
      $this->form_validation->set_rules('txtPrice','Prescription Cost','required');
      if($this->form_validation->run() === FALSE){
        $data['customers'] = $this->prescription_model->get_combo_customers();
        $data['products'] = $this->prescription_model->get_combo_products();
        $data['prescriptions'] = $this->prescription_model->get_combo_prescription();
        $data['prescriptionDoctors'] = $this->prescription_model->get_prescription_doctor();
        //print_r($data['customers']);
        $this->load->view('templates/header');
        $this->load->view('pages/create_prescription',$data);
        $this->load->view('templates/footer');
      }else{
        //upload the files then pass data to your model
        /*$config['upload_path'] = './uploads/';
        $config['allowed_types'] = 'gif|jpg|png|jpeg';
        $config['max_size'] = '300';
        $this->load->library('upload', $config);
        //print_r($this->input->post('upload'));
        if(!$this->upload->do_upload('userfile')){
          // If the upload fails
          echo $this->upload->display_errors('<p>', '</p>');
        }else{
          $this->prescription_model->create_prescription($this->upload->data('file_name'));
          //redirect('pages/view');
        }*/
        $this->prescription_model->create_prescription();
      }
    }

	
	
	
    public function view_prescription_pict(){
      $data['title'] = 'View Prescription';
      $data['filepath'] = $this->input->post('hdnPrescriptionPath');
      //print_r($data['filepath']);
      $this->load->view('templates/header');
      $this->load->view('pages/prescription_view', $data);
      $this->load->view('templates/footer');
    }

    public function view_prescription_doctor($prescriptionDoctorId){
      $data['title'] = 'View Prescription';
      $data['prescription_doctor_id'] = $prescriptionDoctorId;
      //print_r($data['prescription_doctor_id']);
      $data['prescription_doctors'] = $this->prescription_model->get_prescription_doctor_by_id($data['prescription_doctor_id']);
      $data['products'] = $this->prescription_model->get_prescription_doctor_products_by_id($data['prescription_doctor_id']);
      //print_r($data['products']);
      //print_r($data['prescription_doctors']);
      $this->load->view('templates/header');
      $this->load->view('pages/view_prescription', $data);
      $this->load->view('templates/footer');
    }

    public function edit(){
      $data['title'] = 'View Prescription';
      $data['prescription_doctor_id'] = $this->input->post('hdnPrescriptionDoctorId');
      $this->form_validation->set_rules('txtDoctorName','Doctor Name','required');
      $this->form_validation->set_rules('txtPrice','Prescription Cost','required');
      if($this->form_validation->run() === FALSE){
        $data['prescription_doctors'] = $this->prescription_model->get_prescription_doctor_by_id($data['prescription_doctor_id']);
        $data['products'] = $this->prescription_model->get_prescription_doctor_products_by_id($data['prescription_doctor_id']);
        //print_r($data['products']);
        //print_r($data['prescription_doctors']);
        $this->load->view('templates/header');
        $this->load->view('pages/view_prescription', $data);
        $this->load->view('templates/footer');
      }else{
        $this->prescription_model->update_prescription();
      }
    }

    public function get_product_by_prescription(){
      $data['prescription_id'] = $_POST['prescription_id'];
      $data['products'] = $this->prescription_model->get_product_by_prescription($data['prescription_id']);
      echo json_encode($data['products']);
    }

    public function get_product_by_prescriptionid($param){
      $data['prescription_id'] = $param;
      $data['products'] = $this->prescription_model->get_product_by_prescription($param);
      echo json_encode($data['products'];
    }
  }
?>
