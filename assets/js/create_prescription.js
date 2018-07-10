var rowCount=0;
var product = {
  addRow:function(){
      //get product code and title from selected value in combobox
      title = $("#cmbProduct option:selected").text();
      productCode = $("#cmbProduct option:selected").val();
      currRow = rowCount+1;
      var table = document.getElementById("tbProduct");
      var row = table.insertRow(currRow);
      var productCell1 = row.insertCell(0);
      var productCell2 = row.insertCell(1);
      var productIndex = 'tdProduct' + currRow;
      var delIndex = 'del' + currRow;

      // add Row Content
      var html = "<input type='hidden' id='" + productIndex + "' name='" + productIndex + "' value='" + productCode + "'> " +
                  "<span id='" + productIndex + "text'>" + title + "</span>";
      productCell1.innerHTML = html;
      html = "<button type='button' id='" + delIndex + "' class='btn btn-danger'>Delete</button>"
      productCell2.innerHTML = html;

      //delete row event
      $("#"+delIndex).off("click").on("click", function(){
        //alert("delete yang ke : " + productIndex);
        $("#"+productIndex).val("deleted");
        $("#"+productIndex+"text").html("<span style='color:red'>Product Has Been Deleted</span>");
        $("#"+delIndex).hide();
      });

      // count row total after add row
      rowCount = $('#tbProduct tr').length - 1;
      $("#hdnRowCount").val(rowCount);
      //alert(rowCount);
      //alert('product code : ' + productCode + ' & title : ' + title);
  },
  getProductByPrescription:function(baseUrl){
    //alert('prescription id : ' + $('#cmbPrescription').find('option:selected').val());
    var prescription_id = {'prescription_id' : $('#cmbPrescription').find('option:selected').val()};
    //alert('prescription_id : ' + JSON.stringify(prescription_id));
    //var BASE_URL = "<?php echo base_url();?>";
    $.ajax({
        'type':'POST',
        'url': baseUrl + 'prescription/get_product_by_prescription',
        //url:'<?php echo base_url("prescription/get_product_by_prescription"); ?>',
        'data':prescription_id,
        'dataType' : 'json',
        success:function(data){
            //console.log('sukses : ' + JSON.stringify(data));
            var table = document.getElementById("tbProduct");
            $('#tbProduct tr').remove();

            for(var a=0;a<data.length;a++){
              if(a==0) {
                $('#txtCustomer').val(data[a].name);
                //alert('file prescription : ' + data[a].prescription_file);
                $('#mdlImage').html(data[a].prescription_file);
                var urlImg = 'http://localhost/farmaku.com/uploads/prescriptions/' + data[a].prescription_file;
                $('#imgPrescription').attr('src',urlImg);
              }
              var row = table.insertRow(a);
              var productCell1 = row.insertCell(0);
              var html = data[a].title;
              productCell1.innerHTML = html;
            }



        }
    });
  }
}

$( document ).ready(function() {
  $('#cmbPrescription').change();
});
