<div class="modal fade" id="aditLoja" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="exampleModalLabel">Editar Lojas</h4>
      </div>
      <div class="modal-body">

        <form action="../controller/controller_loja.php" method="POST">
          
           <!-- Input id -->
          <div class="form-group">
            <!-- <label for="recipient-name" class="control-label">Código:</label> -->
            <input type="hidden" name="lojaId" class="form-control" id="lojaId">
          </div>


           <!-- Input login -->
          <div class="form-group">
            <label for="lojaEditCodigo" class="control-label">Código:</label>
            <input type="text" name="lojaEditCodigo" class="form-control" id="lojaEditCodigo">
          </div>

           <!-- Input Nome -->
          <div class="form-group">
            <label for="lojaEditNome" class="control-label">Nome:</label>
            <input type="text" name="lojaEditNome" class="form-control" id="lojaEditNome">
          </div>          

          <input type="hidden" name="actionLoja" value="atualizar">
        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
        <button type="submit" class="btn btn-primary">Salvar</button>
      </div>
      </form>
    </div>
  </div>
</div>




