&nbsp;&nbsp;
<h2>
  <?= $title  ?>
</h2>
<div align="right">
  <a href="<?php echo base_url();?>prescription/create" style="font-size:17px;">(+) Add New Prescription</a>
  </br></br>
</div>
<table class="table table-bordered">
  <thead>
      <tr>
        <th>Prescription ID</th>
        <th>Doctor Name</th>
        <th>Customer</th>
        <th>Price</th>
        <th>Image</th>
      </tr>
  </thead>
  <tbody>
    <?php
      foreach ($prescriptions as $prescription) {
    ?>
      <tr>
        <td>
          <?php echo $prescription['id_prescription']; ?>
        </td>
        <td>
          <?php echo $prescription['doctor_name']; ?>
        </td>
        <td>
          <?php echo $prescription['name']; ?>
        </td>
        <td>
          <?php echo $prescription['prescription_price']; ?>
        </td>
        <td>
            <?php echo form_open_multipart('prescription/view_prescription_doctor/'.$prescription['id_medical_representative']); ?>
              <input type="hidden" name="hdnPrescriptionPath" value="#">
              <button type="submit" class="btn btn-primary">View</button>
            </form>
        </td>
      </tr>
    <?php
      }
    ?>
  </tbody>
</table>
