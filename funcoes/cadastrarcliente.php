<div class="modal" id="cadastroCliente" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
        <form action="cadastrarcliente.php" method="post">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Cadastrar novo cliente</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <select id="Cli" class="custom-select" style="width: 220px;">
                <option value="1" selected>Pessoa Física</option>
                <option value="2">Pessoa Jurídica</option>
            </select>
              
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="button" class="btn btn-primary">Save changes</button>
          </div>
        </form>    
    </div>
  </div>
</div>