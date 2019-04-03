<head>
<script>  function formatar(mascara, documento){   var i = documento.value.length;   var saida = mascara.substring(0,1);   var texto = mascara.substring(i)     if (texto.substring(0,1) != saida){    documento.value += texto.substring(0,1);   }    }</script>

</head>

<div class="modal fade" id="cadastroCliente" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form  method="post">
                <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Cadastrar novo cliente</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <select id="options" onchange="verifica(this.value)" class="custom-select" style="width: 220px;">
                        <option value="1" selected>Pessoa Física</option>
                        <option value="2">Pessoa Jurídica</option>
                    </select><br/><br/>
                    
                    <div class="form-group">
                        <label for="inputEmail3" class="col-sm-2 col-form-label">*Nome:</label>
                        <div class="col-sm-10">
                            <input class="form-control" type="text" placeholder="Nome Completo">
                        </div>
                    </div>
                    <div id="fisica" class="form-group">
                        <label for="inputEmail3" class="col-sm-2 col-form-label">*CPF:</label>
                        <div class="col-sm-10">
                            <input class="form-control" type="text" placeholder="CPF - somente os números">

                        </div>
                    </div>
                    
                    <div id="fisica1" class="form-group">
                        <label for="inputEmail3" class="col-sm-2 col-form-label">*RG:</label>
                        <div class="col-sm-10">
                            <input class="form-control" type="text" placeholder="RG - somente os números">
                        </div>
                    </div>
                    <div id="fisica2" class="form-group" display="none">
                        <label for="inputEmail3" class="col-sm-8 col-form-label">Data de Nascimento:</label>
                        <div class="col-sm-10">
                            <input class="form-control" type="date" placeholder="Data de Nascimento -somente os números">
                        </div>
                    </div>
                    <div id="juridica" class="form-group">
                        <label for="inputEmail3" class="col-sm-2 col-form-label">*Nome Fantasia:</label>
                        <div class="col-sm-10">
                            <input class="form-control" type="text" placeholder="Nome Fantasia">
                        </div>
                    </div>
                    <div id="juridica1" class="form-group">
                        <label for="inputEmail3" class="col-sm-2 col-form-label">*CNPJ:</label>
                        <div class="col-sm-10">
                            <input class="form-control" type="text" placeholder="CNPJ - somente os números">
                        </div>
                    </div>
                    <div id="juridica2" class="form-group">
                        <label for="inputEmail3" class="col-sm-8 col-form-label">*Inscrição Estadual:</label>
                        <div class="col-sm-10">
                            <input class="form-control" type="text" placeholder="Insira a Inscrição Estadual">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputEmail3" class="col-sm-2 col-form-label">E-mail:</label>
                        <div class="col-sm-10">
                            <input type="email" name="usuario" class="form-control"  placeholder="Digite o e-mail">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputEmail3" class="col-sm-2 col-form-label">Rua/Logradouro:</label>
                        <div class="col-sm-10">
                            <input class="form-control" type="text" placeholder="Rua ou Logradouro">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputEmail3" class="col-sm-2 col-form-label">Número:</label>
                        <div class="col-sm-10">
                            <input class="form-control" type="text" placeholder="Número">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputEmail3" class="col-sm-2 col-form-label">Bairro:</label>
                        <div class="col-sm-10">
                            <input class="form-control" type="text" placeholder="Bairro">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputEmail3" class="col-sm-2 col-form-label">Cidade:</label>
                        <div class="col-sm-10">
                            <input class="form-control" type="text" placeholder="Cidade">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputEmail3" class="col-sm-2 col-form-label">Estado:</label>
                        <div class="col-sm-10">
                            <input class="form-control" type="text" placeholder="Estado">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputEmail3" class="col-sm-2 col-form-label">Cep:</label>
                        <div class="col-sm-10">
                            <input class="form-control" type="text" placeholder="Cep - somente os números">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputEmail3" class="col-sm-2 col-form-label">Telefone:</label>
                        <div class="col-sm-10">
                            <input class="form-control" type="text" placeholder="Telefone - somente os números">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputEmail3" class="col-sm-2 col-form-label">Celular:</label>
                        <div class="col-sm-10">
                            <input class="form-control" type="text" placeholder="Celular - somente os números">
                        </div>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                </div>
            </form>    
        </div>
    </div>
</div>

<script>
    document.getElementById("juridica").style.display = "none";
    document.getElementById("juridica1").style.display = "none";
    document.getElementById("juridica2").style.display = "none";
    function verifica(value){

      if(value == 1){
        document.getElementById("fisica").style.display = "block";
        document.getElementById("fisica1").style.display = "block";
        document.getElementById("fisica2").style.display = "block";
        document.getElementById("juridica").style.display = "none";
        document.getElementById("juridica1").style.display = "none";
        document.getElementById("juridica2").style.display = "none";
      }else if(value == 2){
        document.getElementById("fisica").style.display = "none";
        document.getElementById("fisica1").style.display = "none";
        document.getElementById("fisica2").style.display = "none";
        document.getElementById("juridica").style.display = "block";
        document.getElementById("juridica1").style.display = "block";
        document.getElementById("juridica2").style.display = "block";
      }
    };


</script>