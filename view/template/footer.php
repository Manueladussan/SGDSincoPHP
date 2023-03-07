<script src="bower_components/jquery/dist/jquery.min.js" type="text/javascript"></script>
<script type="text/javascript" src="bower_components/bootstrapvalidator/dist/js/bootstrapValidator.min.js"></script>
<script type="text/javascript" src="bower_components/bootstrapvalidator/src/js/language/es_ES.js"></script>
<script type="text/javascript" src="bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<script type="text/javascript" src="bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
<script type="text/javascript" src="bower_components/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
<script type="text/javascript" src="bower_components/datatables.net-buttons/js/buttons.colVis.min.js"></script>
<script type="text/javascript" src="bower_components/datatables.net-select/js/dataTables.select.min.js"></script>
<script type="text/javascript">
      var table = $('#documentos').DataTable({
      dom:'Bfrtip',       
      "scrollX": false,           
      "pageLength": 50,        
      buttons: [
        {
            text: '<i class= "fa fa-plus" ></i> Agregar documento',
            titleAttr: 'Agregar documento',
            action: function ( e, dt, node, config ) {
              $('#modal-add-document').modal('show');
            },
            enabled: true,
        },      
      ]       
      });

    $(document).ready(function() {
    $('#addDocument').bootstrapValidator({
    feedbackIcons: {
        valid: 'glyphicon glyphicon-ok',
        invalid: 'glyphicon glyphicon-remove',
        validating: 'glyphicon glyphicon-refresh'
        }
    });

    $('#editDocument').bootstrapValidator({
        feedbackIcons: {
            valid: 'glyphicon glyphicon-ok',
            invalid: 'glyphicon glyphicon-remove',
            validating: 'glyphicon glyphicon-refresh'
        }
    });
    $('#archivo').change(function(){
        var filename = $("#archivo").val();
        var extension_file = filename.split(".").pop();
        var name_file = document.getElementById('archivo').files[0].name;
        var mime = document.getElementById('archivo').files[0].type;
        console.log(filename);
        console.log(name_file);
        if(filename != ''){
            document.getElementById("extension").value = extension_file;
            document.getElementById("nombre_real").value = name_file;
            document.getElementById("mime_type").value = mime;
        }
    });

      $(".edit").each(function () {
        $(this).on("click", function(evt){
          $this = $(this);
          $('#modal-edit-document').modal('show');
          var dtRow = $this.parents("tr");
          var name_document = $("#name_document").val(dtRow[0].cells[5].innerHTML);
          $("#nombre_personalizado_edit").val(dtRow[0].cells[1].innerHTML);
          $("#nombre_real_edit").val(dtRow[0].cells[2].innerHTML);
          $("#extension_edit").val(dtRow[0].cells[3].innerHTML);
          $("#mime_type_edit").val(dtRow[0].cells[4].innerHTML);
          $("#nombre_actual_edit").val(dtRow[0].cells[5].innerHTML);
          $("#id_document").val(dtRow[0].cells[0].innerHTML);               
        });
        $('#archivo_edit').change(function(){
        var filename = $("#archivo_edit").val();
        var extension_file = filename.split(".").pop();
        var name_file = document.getElementById('archivo_edit').files[0].name;
        var mime = document.getElementById('archivo_edit').files[0].type;
        if(filename != ''){
            document.getElementById("extension_edit").value = extension_file;
            document.getElementById("nombre_real_edit").value = name_file;
            document.getElementById("mime_type_edit").value = mime;
            document.getElementById("nombre_actual_edit").value = name_file;
        }
    });
      });
    });

    //$("#edit").on("click",function() {
      //$('#modal-edit-products').modal('show');
    //});



</script>
</div>
</body>
</html>