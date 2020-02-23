<div class="modal fade" id="aditNota" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="exampleModalLabel">Editar Usuario</h4>
      </div>
      <div class="modal-body">
      
        <form >
          
           <!-- Input Chave -->
          <div class="form-group">
            <label for="recipient-name" class="control-label">Chave de Acesso:</label>
            <input type="text" name="chave" class="form-control" id="chave" >
            <!-- ""readonly"" desativatica o input mas manda os dados dele pelo fomulario -->
          </div>


          <!-- Text input numero nota-->
          <div class="form-group">
            <label class=" control-label" for="txtNumero2">Número Nota:</label>  
            <div class="">
              <input id="txtNumero2" name="txtNumero2" type="text" class="form-control input-md" >   
            </div>
          </div>
            
            <!-- Text input Cnpj-->
            <div class="form-group">
               <label class=" control-label" for="txtCnpj2">Cnpj Fornecedor:</label>  
               <div class="">
                <input id="txtCnpj2" name="txtCnpj2" type="text" class="form-control input-md" >   
                </div>
            </div>
            
            <!-- Text input Fornecedor-->
            <div class="form-group">
                <label class=" control-label" for="txtNomeF2">Nome Fornecedor:</label>  
                <div class="">
                    <input id="txtNomeF2" name="txtNomeF2" type="text" class="form-control input-md" >   
                </div>
            </div>
            
             <!-- Text input Data-->
            <div class="form-group">
                <label class=" control-label" for="txtData2">Data:</label>  
                <div class="">
                    <input id="txtData2" name="txtData2" type="text" class="form-control ">   
                </div>
            </div>
            
             <!-- Text input Cnpj-->
            <!-- <div class="form-group">
                <label class=" control-label" for="txtValor">Valor:</label>  
                <div class="">
                    <input id="txtValor" name="txtValor" type="text" class="form-control input-md" maxlength="14">   
                </div>
            </div> -->

           <!-- Text input usuario-->
            <div class="form-group">
                <label class=" control-label" for="txtUsuario">Usuario:</label>  
                <div class="">
                    <select id="txtUsuario" name="txtUsuario" class="form-control input-md">
                    <option id="usuario"></option>
                                            
                    </select> 
                </div>
            </div>

             <!-- Text input usuario-->
            <div class="form-group">
                <label class=" control-label" for="txtUsuario_ant">Usuario Antigo:</label>  
                 <div class="">
                    <input id="usuario_ant" name="txtUsuario_ant" placeholder="Vazio" type="text" class="form-control ">   
                </div>
            </div>
          
        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
      </div>
      </form>
    </div>
  </div>
</div>




