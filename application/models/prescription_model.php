<?php
  class prescription_model extends CI_Model{
    public function _construct(){
      $this->load->database();
    }

    public function get_prescription_doctor($searchByName = FALSE){
      if($searchByName === FALSE){
        //$this->db->order_by('id_prescription','DESC');
        $this->db->select('medical_representative.*, customers.name');
        //$this->db->select('*');
        $this->db->from('medical_representative');
        $this->db->join('prescription','prescription.id_prescription = medical_representative.id_prescription');
        $this->db->join('customers','customers.id_customers = prescription.id_customers');
        $query = $this->db->get();
        return $query->result_array();
      }


      $this->db->select('medical_representative.*, customers.name');
      //$this->db->select('*');
      $this->db->from('medical_representative');
      $this->db->join('prescription','prescription.id_prescription = medical_representative.id_prescription');
      $this->db->join('customers','customers.id_customers = prescription.id_customers');
      $this->db->like('medical_representative.doctor_name', $searchByName); $this->db->or_like('customers.name', $searchByName);
      $query = $this->db->get();
      return $query->result_array();
    }

    public function get_combo_customers(){
      $this->db->select('*');
      $this->db->from('customers');
      $query = $this->db->get();

      return $query->result_array();
    }

    public function get_combo_products(){
      $this->db->select('*');
      $this->db->from('products');
      $query = $this->db->get();

      return $query->result_array();
    }

    public function create_prescription(){
      //insert header prescription
      $data = array(
        'prescription_price' => $this->input->post('txtPrice'),
        'doctor_name' => $this->input->post('txtDoctorName'),
        'doctor_practice_location' => $this->input->post('txtDoctorPracticeLocation'),
        'id_prescription' => $this->input->post('cmbPrescription')
      );
      $this->db->insert('medical_representative',$data);

      //insert detail product for prescription
      /*$rowCount = $this->input->post('hdnRowCount');
      $maxPrescription = $this->get_prescription_by_id();
      $idPrescription = $maxPrescription['id_prescription'];
      for($i=0; $i<$rowCount; $i++) :
        if($this->input->post('tdProduct'.($i+1))!='deleted'){
          $dataDetail = array(
            'id_prescription' => $idPrescription,
            'product_code' => $this->input->post('tdProduct'.($i+1))
          );
          $this->db->insert('prescription_doctor_detail',$dataDetail);
        }
      endfor;*/

      redirect('pages/view');
    }

    public function update_prescription(){
      $data = array(
        'prescription_price' => $this->input->post('txtPrice'),
        'doctor_name' => $this->input->post('txtDoctorName')
      );
      $this->db->where('id_medical_representative',$this->input->post('hdnPrescriptionDoctorId'));
      $this->db->update('medical_representative',$data);

      redirect('pages/view');
    }

    public function get_prescription_by_id(){
      $this->db->select_max('id_prescription');
      $this->db->from('medical_representative');
      $query = $this->db->get();
      return $query->row_array();
    }

    public function get_combo_prescription(){
      $this->db->select('*');
      $this->db->from('prescription');
      $query = $this->db->get();
      return $query->result_array();
    }

    public function get_product_by_prescription($prescriptionId){
      $this->db->select('prescription.prescription_file,orders.id_orders,orders_detail.item_id,products.title,customers.name');
      //$this->db->select('*');
      $this->db->from('prescription');
      $this->db->join('orders','orders.id_orders = prescription.order_id');
      $this->db->join('customers','customers.id_customers = orders.customer_id');
      $this->db->join('orders_detail','orders_detail.orders_id = orders.id_orders');
      $this->db->join('products ','products.id_products = orders_detail.item_id');
      $this->db->where('prescription.id_prescription = ',$prescriptionId);
      $query = $this->db->get();
      //print_r(prescriptionId);
      return $query->result_array();
    }

    public function get_prescription_doctor_by_id($prescriptionDoctorId){
      $this->db->select('medical_representative.*, prescription.prescription_file, customers.name');
      $this->db->from('medical_representative');
      $this->db->join('prescription','prescription.id_prescription = medical_representative.id_prescription');
      $this->db->join('customers','customers.id_customers = prescription.id_customers');
      //$this->db->join('orders','orders.id_orders = prescription.id_orders');
      //$this->db->join('orders_detail','orders_detail.orders_id = orders.id_orders');
      //$this->db->join('products','products.id_products = orders_detail.item_id');
      $this->db->where('medical_representative.id_medical_representative = ', $prescriptionDoctorId);
      $query = $this->db->get();
      return $query->row_array();
    }

    public function get_prescription_doctor_products_by_id($prescriptionDoctorId){
      $this->db->select('products.id_products, products.title');
      $this->db->from('medical_representative');
      $this->db->join('prescription','prescription.id_prescription = medical_representative.id_prescription');
      $this->db->join('orders','orders.id_orders = prescription.order_id');
      $this->db->join('orders_detail','orders_detail.orders_id = orders.id_orders');
      $this->db->join('products','products.id_products = orders_detail.item_id');
      $this->db->where('medical_representative.id_medical_representative = ', $prescriptionDoctorId);
      $query = $this->db->get();
      return $query->result_array();
    }
  }
?>
