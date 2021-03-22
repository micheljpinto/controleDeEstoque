<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <?php echo print_r($user_permission)?>
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
          <button class="btn btn-primary" data-toggle="modal" data-target="#addCustomersModal">Inserir Cliente</button>
          <br /> <br />
        <?php endif; ?>

        <div class="box">
          <div class="box-header">
            <h3 class="box-title">Lista de clientes</h3>
          </div>
          <!-- /.box-header -->
          <div class="box-body">
            <table id="manageTable1" class="table table-bordered table-striped">
              <thead>
              <tr>
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
<div class="modal fade" tabindex="-1" role="dialog" id="addCustomersModal">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Inserir Cliente</h4>
      </div>

      <form role="form" action="<?php echo base_url('customers/create') ?>" method="post" id="createCustomersForm">

        <div class="modal-body">

          <div class="form-group">
            <label for="customer_name">Nome / Razão social</label>
            <input type="text" class="form-control" id="customer_name" name="customer_name" placeholder="Digite aqui o nome" autocomplete="off" required="">
          </div>

          <div class="form-group">
            <label for="customer_email">Email</label>
            <input type="email" class="form-control" id="customer_email" name="customer_email" placeholder="Digite aqui o nome" autocomplete="off" required="" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" title= "Formato de email base é nome@dominio">
          </div>

          
          <div class="form-group">
            <label for="customer_street">Rua</label>
            <input type="text" class="form-control" id="customer_street" name="customer_street" placeholder="Digite aqui a rua ou travessa" autocomplete="off">
          </div>
          <div class="form-group">
            <label for="customer_complement">Complemento</label>
            <input type="text" class="form-control" id="customer_complement" name="customer_complement" placeholder="Digite aqui número, interfone" autocomplete="off" maxLenght="15">
          </div>
          <div class="form-group">
            <label for="customer_district">Bairro</label>
            <input type="text" class="form-control" id="customer_bairro" name="customer_district" placeholder="Bairro" autocomplete="off">
          </div>
          <div class="form-group">
            <label for="customer_city">Cidade</label>
            <input type="text" class="form-control" id="customers_city" name="customers_city" placeholder="Digite aqui a cidade" patern="[A-Za-z]{15}" title="Apenas letras com no máximo 15 caracteres" autocomplete="off" >
          </div>

          <div class="form-group">
            <label for="customer_state">Estado</label>
            <input type="text" class="form-control" id="customers_cidade" name="customers_state" placeholder="Digite aqui o estado" autocomplete="off">
          </div>

          <div class="form-group">
            <label for="active">Status</label>
            <select class="form-control" id="active" name="active">
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

<?php if(in_array('updateBrand', $user_permission)): ?>
<!-- edit customers modal -->
<div class="modal fade" tabindex="-1" role="dialog" id="editCustomersModal">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Editar Cliente</h4>
      </div>

      <form role="form" action="<?php echo base_url('customers/update') ?>" method="post" id="updateCustomersForm">

        <div class="modal-body">
          <div id="messages"></div>

          <div class="form-group">
            <label for="edit_customers_name">Brand Name</label>
            <input type="text" class="form-control" id="edit_customers_name" name="edit_customers_name" placeholder="Enter customers name" autocomplete="off">
          </div>
          <div class="form-group">
            <label for="edit_aendereco">Status</label>
            <select class="form-control" id="edit_active" name="edit_aendereco">
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
<div class="modal fade" tabindex="-1" role="dialog" id="removeCustomersModal">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Remoção de Cliente</h4>
      </div>

      <form role="form" action="<?php echo base_url('customers/remove') ?>" method="post" id="removeCustomersForm">
        <div class="modal-body">
          <p>Deseja realmente remover o cliente?</p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Salve Alterações</button>
        </div>
      </form>


    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<?php endif; ?>


<script type="text/javascript">
var manageTable1;

/*
var activeItem= document.getElementById("customersNav"); 
activeItem.addEventListenner('click',(e)=>{
        e.preventDefault();
        activeItem.classList.add('active');
    });
 */
$(document).ready(function() {

    $("#customerNav").addClass('active');

  // initialize the datatable 
  manageTable1 = $('#manageTable1').DataTable({
    'ajax': 'fetchCustomersData',
    'order': []
  }); 

  // submit the create from 
  $("#createCustomers").unbind('submit').on('submit', function() {
    var form = $(this);

    // remove the text-danger
    $(".text-danger").remove();

    $.ajax({
      url: form.attr('action'),
      type: form.attr('method'),
      data: form.serialize(), // /converting the form data into array and sending it to server
      dataType: 'json',
      success:function(response) {

        manageTable1.ajax.reload(null, false); 

        if(response.success === true) {
          $("#messages").html('<div class="alert alert-success alert-dismissible" role="alert">'+
            '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>'+
            '<strong> <span class="glyphicon glyphicon-ok-sign"></span> </strong>'+response.messages+
          '</div>');


          // hide the modal
          $("#addCustomersModal").modal('hide');

          // reset the form
          $("#createCustomersForm")[0].reset();
          $("#createCustomersForm .form-group").removeClass('has-error').removeClass('has-success');

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
            $("#messages").html(reponse);
            
          }
        }
      }
    }); 

    return false;
  });


});

function editCustomers(id)
{ 
  $.ajax({
    url: 'fetchCustomersDataById/'+id,
    type: 'post',
    dataType: 'json',
    success:function(response) {
      window.alert(response);
       $("#edit_customers_name").val(response.name);
      $("#edit_endereco").val(response.active);

      // submit the edit from 
      $("#updateCustomersForm").unbind('submit').bind('submit', function() {
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
              $("#editCustomersModal").modal('hide');
              // reset the form 
              $("#updateCustomersForm .form-group").removeClass('has-error').removeClass('has-success');

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

function removeCustomers(id)
{
  if(id) {
    $("#removeCustomersForm").on('submit', function() {

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
            $("#removeCustomersModal").modal('hide');

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


