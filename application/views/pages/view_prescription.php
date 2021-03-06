<br/>
<a style="font-size:18px;" href="<?php echo base_url();?>"> << Back</a>
&nbsp;&nbsp;
<h2>
  <?= $title  ?>
  <script type="text/javascript" src="<?php echo base_url('assets/js/view_prescription.js')?>"></script>
</h2>
<?php echo form_open_multipart('prescription/edit'); ?>
    <input type="hidden" id="hdnPrescriptionDoctorId" name="hdnPrescriptionDoctorId" value="<?=$prescription_doctors['id_medical_representative']?>">
    <div class="form-group">
      <label>Doctor Name :</label><?php echo form_error('txtDoctorName', '<div style="color:red" class="error">', '</div>'); ?>
      <input type="text" class="form-control" name="txtDoctorName" placeholder="Doctor Name" value="<?=$prescription_doctors['doctor_name']?>">
    </div>
    <div class="form-group">
      <label>Prescription Cost :</label><?php echo form_error('txtPrice', '<div style="color:red" class="error">', '</div>'); ?>
      <input type="text" class="form-control" name="txtPrice" placeholder="Prescription Cost" value="<?=$prescription_doctors['prescription_price']?>">
    </div>
    <div class="form-group">
      <label>Prescription :</label>
      <input type="hidden" id="txtPrescription" name="txtPrescription" value="<?=$prescription_doctors['id_prescription']?>">
      <input type="text" class="form-control" name="txtPrescriptionFile" placeholder="Prescription Cost" value="<?=$prescription_doctors['prescription_file']?>" disabled>
    </div>
    <!-- View Prescription Image -->
    <button type="button" class="btn btn-info" data-toggle="modal" data-target="#myModal">View Prescription Image</button>
    <div class="modal fade" id="myModal" role="dialog">
      <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title"><?=$prescription_doctors['prescription_file']?></h4>
          </div>
          <div class="modal-body">
            <img src="http://localhost/farmaku.com/uploads/prescriptions/<?=$prescription_doctors['prescription_file']?>" style="width:100%; height:100%;"/>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          </div>
        </div>
      </div>
    </div>
    <br/><br/>
    <div class="form-group">
      <label>Customer Name :</label>
      <input class="form-control" type="text" id="txtCustomer" value="<?=$prescription_doctors['name']?>" disabled>
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
      <tr>
        <?php
          foreach ($products as $product) {
        ?>
            <tr>
              <td>
                <?= $product['title'] ?>
              </td>
            </tr>
        <?php
          }
        ?>
      </tr>
    </table>
    <div style="float:right">
      <button type="submit" class="btn btn-warning" style="font-size:17px">Simpan Prescription</button>
      <br/><br/>
    </div>
</form>


<!--<button type="button" class="btn btn-primary" onclick="location.href='<?php //echo base_url();?>'">Back</button>-->
