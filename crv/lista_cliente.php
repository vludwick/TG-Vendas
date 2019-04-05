<?php require_once("../funcoes/conexao.php"); ?>
<?php require_once("../funcoes/sessao.php"); ?>
<!DOCTYPE html>
<html>
   <head>
      <script src="js/jquery-3.2.1.min.js" language="javascript"></script> 
      <?php require_once("../funcoes/cadastrarcliente.php"); ?>
      <?php include '../funcoes/menu.php'; ?>
   </head>
   <body>
      <!-- Page Content-->
      <div class="wrapper">
         <div class="container-fluid">
            <!-- Page-Title -->
            <div class="row">
               <div class="col-md-12">
                  <div class="card">
                     <div class="card-body">
                        <h5 class="mt-0">Clientes</h5>
                        <div class="table-responsive" style="overflow-x: hidden;">
                           <table class="table table-hover table-striped" id="cliente">
                              <thead>
                                 <tr>
                                    <th>ID</th>
                                    <th>Nome</th>
                                    <th>Email</th>
									<th>Ação</th> 
                                 </tr>
                              </thead>
                              <tbody>
                                 <?php
                                    $lista = mysqli_query($conecta, "SELECT ID_CLIENTE, NOME, EMAIL FROM CLIENTE")or die (mysqli_error($conecta));
                                    while($campanha =  mysqli_fetch_array($lista))
                                    {
                                    	$id 			= $campanha['ID'];
                                    	$nome			= $campanha['NOME'];
                                    	$email			= $campanha['EMAIL'];
                                    
                                     ?>
                                 <tr>
                                    <td><?php echo $id ?></td>
                                    <td><?php echo $nome ?></td>
                                    <td><?php echo $email ?></td>
									<td><a href="EditaUsuario/<?php echo $id ?>/" id="btnEdit" name="btnEdit" data-toggle="tooltip" data-placement="top" title="" data-original-title="Editar" class="tabledit-edit-button btn btn-sm btn-light" style="float: none; margin: 5px;"><span class="ti-pencil"></span></a></td>
                                    <?php   
                                    }
                                       
                                    ?>
                                 </tr>
                              </tbody>
                           </table>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <!-- end page-wrapper -->
      <!-- jQuery  -->
      <!-- end page-wrapper --><!-- jQuery  -->
      <script src="js/jquery.min.js"></script>
      <script src="js/bootstrap.bundle.min.js"></script>
      <script src="js/waves.min.js"></script>
      <script src="js/jquery.slimscroll.min.js"></script>
      <!-- Required datatable js -->
      <script src="plugins/datatables/jquery.dataTables.min.js"></script>
      <script src="plugins/datatables/dataTables.bootstrap4.min.js"></script>
      <!-- Buttons examples --><script src="plugins/datatables/dataTables.buttons.min.js"></script><script src="plugins/datatables/buttons.bootstrap4.min.js"></script><script src="plugins/datatables/jszip.min.js"></script>
      <script src="plugins/datatables/pdfmake.min.js"></script>
      <script src="plugins/datatables/vfs_fonts.js"></script>
      <script src="plugins/datatables/buttons.html5.min.js"></script>
      <script src="plugins/datatables/buttons.print.min.js"></script>
      <script src="plugins/datatables/buttons.colVis.min.js"></script>
      <!-- Responsive examples --><script src="plugins/datatables/dataTables.responsive.min.js"></script><script src="plugins/datatables/responsive.bootstrap4.min.js"></script>
      <!-- Datatable init js --><script src="pages/jquery.table-datatable.js"></script>
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.0.0/jquery.min.js"></script>
      <!-- App js --><script src="js/app.js"></script>
	  <script src="js/jquery.js"></script>
   </body>
   <script>
         $(document).ready( function () {
         $('#cliente').DataTable();
      
      } );
   </script>
</html>