<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
 
  <section class="content-header">
    <h1>
      Manage
      <small>Clientes</small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li class="active">Clientes</li>
    </ol>
  </section>

  
  <!-- Main content -->
  <section class="content">
    <!-- Small boxes (Stat box) -->
    <div class="row">
      <div class="col-md-12 col-xs-12">

        <div id="messages"></div>
        
        <?php if($this->session->flashdata('success')): ?>
          <div class="alert alert-success alert-dismissible" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <?php echo $this->session->flashdata('success'); ?>
          </div>
        <?php elseif($this->session->flashdata('error')): ?>
          <div class="alert alert-error alert-dismissible" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <?php echo $this->session->flashdata('error'); ?>
          </div>
        <?php endif; ?>

        <?php if(in_array('createBrand', $user_permission)): ?>
          <button class="btn btn-primary" data-toggle="modal" data-target="#addCustomerModal">Inserir Cliente</button>
          <br /> <br />
        <?php endif; ?>

        <div class="box">
          <div class="box-header">
            <h3 class="box-title">Lista de clientes</h3>
          </div>
          <!-- /.box-header -->
          <div class="box-body">
            <table id="manageTable" class="table table-bordered table-striped">
              <thead>
              <tr>
              <th>ID</th>
                <th>Nome do Cliente</th>
                <th>Endereço</th>
                <?php if(in_array('updateBrand', $user_permission) || in_array('deleteBrand', $user_permission)): ?>
                  <th>Action</th>
                <?php endif; ?>
              </tr>
              </thead>

            </table>
          </div>
          <!-- /.box-body -->
        </div>
        <!-- /.box -->
      </div>
      <!-- col-md-12 -->
    </div>
    <!-- /.row -->
    

  </section>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->

<?php if(in_array('createBrand', $user_permission)): ?>
<!-- create customers modal -->
<div class="modal fade" tabindex="-1" role="dialog" id="addCustomerModal">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Inserir Cliente</h4>
      </div>

      <form role="form" action="<?php echo base_url('customers/create') ?>" method="post" id="createCustomerForm">
      
              <div class="modal-body">

          <div class="form-group">
            <label for="customer_name">Nome / Razão social</label>
            <input type="text" class="form-control" id="customer_name" name="customer_name" placeholder="Digite aqui o nome" autocomplete="off" >
          </div>

          <div class="form-group">
            <label for="customer_tel">Tel</label>
            <input type="tel" class="form-control" id="customer_tel" name="customer_tel" placeholder="Digite aqui o nome" autocomplete="off" >
          </div>

          <div class="form-group">
            <label for="customer_cel">Cel</label>
            <input type="tel" class="form-control" id="customer_cel" name="customer_cel" placeholder="Digite aqui o núm. do celular" autocomplete="off" >
          </div>

          <div class="form-group">
            <label for="customer_email">Email</label>
            <input type="text" class="form-control" id="customer_email" name="customer_email" placeholder="Digite aqui o email" autocomplete="off" >
          </div>

          <div class="form-group">
            <label for="customer_street">Rua</label>
            <input type="text" class="form-control" id="customer_street" name="customer_street" placeholder="Digite aqui a rua ou travessa" autocomplete="off">
          </div>

          <div class="form-group">
            <label for="customer_district">Bairro</label>
            <input type="text" class="form-control" id="customer_district" name="customer_district" placeholder="Bairro" autocomplete="off">
          </div>

          <div class="form-group">
            <label for="customer_cep">CEP</label>
            <input type="number" class="form-control" id="customer_cep" name="customer_cep" placeholder="Digite aqui o CEP">
          </div>

          <div class="form-group">
            <label for="customer_city">Cidade</label>
            <input type="text" class="form-control" id="customer_city" name="customer_city" placeholder="Digite aqui a cidade" patern="[A-Za-z]{15}" title="Apenas letras com no máximo 15 caracteres" autocomplete="off" >
          </div>

          <div class="form-group">
            <label for="customer_province">Estado</label>
            <input type="text" class="form-control" id="customer_province" name="customer_province" placeholder="Digite aqui o estado" autocomplete="off">
          </div>

          <div class="form-group">
            <label for="customer_cpf-cnpj">CPF ou CNPJ</label>
            <input type="number" class="form-control" id="customer_cpf-cnpj" name="customer_cpf-cnpj" placeholder="Digite aqui seu CPF" autocomplete="off">
          </div>

          <div class="form-group">
            <label for="customer_rg-ie">RG ou IE</label>
            <input type="number" class="form-control" id="customer_rg-ie" name="customer_rg-ie" placeholder="Digite aqui seu CPF" autocomplete="off">
          </div>

          <div class="form-group">
            <label for="customer_obs">Observação</label>
            <input type="text" class="form-control" id="customer_obs" name="customer_obs" placeholder="Digite aqui o estado" autocomplete="off">
          </div>
   
        </div>

        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Save changes</button>
        </div>

      </form>


    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<?php endif; ?>

<?php if(in_array('updateBrand', $user_permission)): ?>
<!-- edit customers modal -->
<div class="modal fade" tabindex="-1" role="dialog" id="editCustomerModal">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Editar Cliente</h4>
      </div>

      <form role="form" action="<?php echo base_url('customers/update') ?>" method="post" id="updateCustomerForm">

        <div class="modal-body">
          <div id="messages"></div>

          <div class="form-group">
            <label for="edit_customer_name">Brand Name</label>
            <input type="text" class="form-control" id="edit_customer_name" name="edit_customer_name" placeholder="Enter customers name" autocomplete="off">
          </div>
          <div class="form-group">
            <label for="edit_endereco">Status</label>
            <select class="form-control" id="edit_active" name="edit_endereco">
              <option value="1">Active</option>
              <option value="2">Inactive</option>
            </select>
          </div>
        </div>

        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Save changes</button>
        </div>

      </form>


    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<?php endif; ?>

<?php if(in_array('deleteBrand', $user_permission)): ?>
<!-- remove customer modal -->
<div class="modal fade" tabindex="-1" role="dialog" id="removeCustomerModal">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Remoção de Cliente</h4>
      </div>

      <form role="form" action="<?php echo base_url('customers/remove') ?>" method="post" id="removeCustomerForm">
        <div class="modal-body">
          <p>Deseja realmente remover o cliente?</p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Salvar</button>
        </div>
      </form>


    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<?php endif; ?>


<script type="text/javascript">
var manageTable;

$(document).ready(function() {

    $("#customerNav").addClass('active');

  // initialize the datatable 
  manageTable = $('#manageTable').DataTable({
    'ajax': 'fetchCustomersData',
    'order': []
  }); 

  // submit the create from 
  $("#createCustomer").unbind('submit').on('submit', function() {
    var form = $(this);

    // remove the text-danger
    $(".text-danger").remove();

    $.ajax({
      url: form.attr('action'),
      type: form.attr('method'),
      data: form.serialize(), // /converting the form data into array and sending it to server
      dataType: 'json',
      success:function(response) {

        manageTable.ajax.reload(null, false); 

        if(response.success === true) {
          $("#messages").html('<div class="alert alert-success alert-dismissible" role="alert">'+
            '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>'+
            '<strong> <span class="glyphicon glyphicon-ok-sign"></span> </strong>'+response.messages+
          '</div>');

          // hide the modal
          $("#addCustomerModal").modal('hide');

          // reset the form
          $("#createCustomerForm")[0].reset();
          $("#createCustomerForm .form-group").removeClass('has-error').removeClass('has-success');

        } else {

          if(response.messages instanceof Object) {
            $.each(response.messages, function(index, value) {
              var id = $("#"+index);
              
              id.closest('.form-group')
              .removeClass('has-error')
              .removeClass('has-success')
              .addClass(value.length > 0 ? 'has-error' : 'has-success');
              
              id.after(value);

            });
          } else {
            $("#messages").html('<div class="alert alert-warning alert-dismissible" role="alert">'+
              '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>'+
              '<strong> <span class="glyphicon glyphicon-exclamation-sign"></span> </strong>'+response.messages+
            '</div>');
            
          }
        }
      }
    }); 

    return false;
  });


});

function editCustomer(id){ 
  $.ajax({
    url: 'fetchCustomersDataById/'+id,
    type: 'post',
    dataType: 'json',
    success:function(response) {
      window.alert(response);
       $("#edit_customer_name").val(response.name);
      $("#edit_endereco").val(response.active);

      // submit the edit from 
      $("#updateCustomerForm").unbind('submit').bind('submit', function() {
        var form = $(this);

        // remove the text-danger
        $(".text-danger").remove();

        $.ajax({
          url: form.attr('action') + '/' + id,
          type: form.attr('method'),
          data: form.serialize(), // /converting the form data into array and sending it to server
          dataType: 'json',
          success:function(response) {

            manageTable.ajax.reload(null, false); 

            if(response.success === true) {
              $("#messages").html('<div class="alert alert-success alert-dismissible" role="alert">'+
                '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>'+
                '<strong> <span class="glyphicon glyphicon-ok-sign"></span> </strong>'+response.messages+
              '</div>');


              // hide the modal
              $("#editCustomerModal").modal('hide');
              // reset the form 
              $("#updateCustomerForm .form-group").removeClass('has-error').removeClass('has-success');

            } else {

              if(response.messages instanceof Object) {
                $.each(response.messages, function(index, value) {
                  var id = $("#"+index);

                  id.closest('.form-group')
                  .removeClass('has-error')
                  .removeClass('has-success')
                  .addClass(value.length > 0 ? 'has-error' : 'has-success');
                  
                  id.after(value);

                });
              } else {
                $("#messages").html('<div class="alert alert-warning alert-dismissible" role="alert">'+
                  '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>'+
                  '<strong> <span class="glyphicon glyphicon-exclamation-sign"></span> </strong>'+response.messages+
                '</div>');
              }
            }
          }
        }); 

        return false;
      }); 

    }
  });
}

function removeCustomer(id)
{
  
  if(id) {
    $("#removeCustomerForm").on('submit', function() {

      var form = $(this);
      
      // remove the text-danger
      $(".text-danger").remove();

      $.ajax({
        url: form.attr('action'),
        type: form.attr('method'),
        data: { customer_id:id }, 
        dataType: 'json',
        success:function(response) {

          manageTable.ajax.reload(null, false); 

          if(response.success === true) {
            $("#messages").html('<div class="alert alert-success alert-dismissible" role="alert">'+
              '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>'+
              '<strong> <span class="glyphicon glyphicon-ok-sign"></span> </strong>'+response.messages+
            '</div>');

            // hide the modal
            $("#removeCustomerModal").modal('hide');

          } else {

            $("#messages").html('<div class="alert alert-warning alert-dismissible" role="alert">'+
              '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>'+
              '<strong> <span class="glyphicon glyphicon-exclamation-sign"></span> </strong>'+response.messages+
            '</div>'); 
          }
        }
      }); 

      return false;
    });
  }
}


</script>


