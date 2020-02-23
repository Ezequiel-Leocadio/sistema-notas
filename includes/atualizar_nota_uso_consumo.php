<div class="modal fade" id="aditNotaUso" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
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
            <label class=" control-label" for="txtUsoNumero2">Número Nota:</label>  
            <div class="">
              <input id="txtUsoNumero2" name="txtUsoNumero2" type="text" class="form-control input-md" >   
            </div>
          </div>
            
            <!-- Text input Cnpj-->
            <div class="form-group">
               <label class=" control-label" for="txtUsoCnpj2">Cnpj Fornecedor:</label>  
               <div class="">
                <input id="txtUsoCnpj2" name="txtUsoCnpj2" type="text" class="form-control input-md" >   
                </div>
            </div>
            
            <!-- Text input Fornecedor-->
            <div class="form-group">
                <label class=" control-label" for="txtUsoNomeF2">Nome Fornecedor:</label>  
                <div class="">
                    <input id="txtUsoNomeF2" name="txtUsoNomeF2" type="text" class="form-control input-md" >   
                </div>
            </div>
            
             <!-- Text input Data-->
            <div class="form-group">
                <label class=" control-label" for="txtUsoData2">Data:</label>  
                <div class="">
                    <input id="txtUsoData2" name="txtUsoData2" type="text" class="form-control ">   
                </div>
            </div>
            
             <!-- Text input Cnpj-->
            <!-- <div class="form-group">
                <label class=" control-label" for="txtUsoValor">Valor:</label>  
                <div class="">
                    <input id="txtUsoValor" name="txtUsoValor" type="text" class="form-control input-md" maxlength="14">   
                </div>
            </div> -->

           <!-- Text input usuario-->
            <div class="form-group">
                <label class=" control-label" for="txtUsoUsuario">Usuario:</label>  
                <div class="">
                    <select id="txtUsoUsuario" name="txtUsoUsuario" class="form-control input-md">
                    <option id="usuario"></option>
                                            
                    </select> 
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




