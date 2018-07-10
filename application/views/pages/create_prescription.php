<br/>
<a style="font-size:18px;" href="<?php echo base_url();?>"> << Back</a><br/>
<h2>
  <?= $title  ?>
  <script type="text/javascript" src="<?php echo base_url('assets/js/create_prescription.js')?>"></script>
</h2>

<?php echo form_open_multipart('prescription/create'); ?>
    <div class="form-group">
      <label>Doctor Name :</label><?php echo form_error('txtDoctorName', '<div style="color:red" class="error">', '</div>'); ?>
      <input type="text" class="form-control" name="txtDoctorName" placeholder="Doctor Name">
    </div>
    <div class="form-group">
      <label>Doctor Practice Location :</label><?php echo form_error('txtDoctorName', '<div style="color:red" class="error">', '</div>'); ?>
      <input type="text" class="form-control" name="txtDoctorPracticeLocation" placeholder="Doctor Practice Location">
    </div>
    <div class="form-group">
      <label>Prescription Cost :</label><?php echo form_error('txtPrice', '<div style="color:red" class="error">', '</div>'); ?>
      <input type="text" class="form-control" name="txtPrice" placeholder="Prescription Cost">
    </div>
    <div class="form-group">
      <label>Prescription : </label>
      <select class="form-control" name="cmbPrescription" id="cmbPrescription" onchange="product.getProductByPrescription('<?= base_url(); ?>');">
      <?php
        foreach ($prescriptions as $prescription) {
          $flag = 0;
          if(count($prescriptionDoctors) == 0){
      ?>
            <option value="<?php echo $prescription['id_prescription'];?>">
              <?php echo $prescription['prescription_file']; ?>
            </option>
      <?php
          }else{
            foreach($prescriptionDoctors as $prescriptionDoctor) {
              if($prescriptionDoctor['id_prescription'] == $prescription['id_prescription']){ $flag = 1;}
            }
            if($flag == 0){
      ?>
              <option value="<?php echo $prescription['id_prescription'];?>">
                <?php echo $prescription['prescription_file']; ?>
              </option>
      <?php
            }
          }
        }
      ?>
      </select>
    </div>
    <button type="button" class="btn btn-info" data-toggle="modal" data-target="#myModal">View Prescription Image</button>

    <div class="modal fade" id="myModal" role="dialog">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title" id="mdlImage"></h4>
          </div>
          <div class="modal-body">
            <img id="imgPrescription" style="width:100%; height:100%;"/>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          </div>
        </div>
      </div>
    </div>
    <br/><br/>
    <!--<div class="form-group">
      <label>Upload Prescription</label>
      <input type="file" class="form-control-file" id="userfile" name="userfile">
    </div>-->
    <div class="form-group">
      <label>Customer Name :</label>
      <input type="text" class="form-control" id="txtCustomer" disabled>
    </div>
    <table class="table table-bordered">
      <thead>
          <tr>
            <th class="align-middle">Product List : </th>
            <!--<th>
              <select class="form-control" name="cmbProduct" id="cmbProduct">
                <?php
                  //foreach ($products as $product) {
                ?>
                    <option value="<?php // $product['product_code'];?>">
                      <?php //echo $product['title']; ?>
                    </option>
                <?php
                  //}
                ?>
              </select>
            </th>
            <th class="align-middle">
              <button type="button" class="btn btn-primary" onclick="product.addRow();">(+) Add Product</button>
            </th>-->
          </tr>
      </thead>
    </table>
    <input type="hidden" id="hdnRowCount" name="hdnRowCount" value="0">
    <table id="tbProduct" name="tbProduct" class="table table-bordered">
      <tr>
        <th colspan="2">
          <center>LIST PRODUCT</center>
        </th>
      </tr>
    </table>
    <div style="float:right">
      <button type="submit" class="btn btn-warning" style="font-size:17px">Simpan Prescription</button>
      <br/><br/>
    </div>
</form>


<!--<button type="button" class="btn btn-primary" onclick="location.href='<?php //echo base_url();?>'">Back</button>-->
