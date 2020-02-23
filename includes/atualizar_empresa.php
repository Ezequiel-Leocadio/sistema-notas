<div class="modal fade" id="aditEmpresa" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="exampleModalLabel">Editar Empresa</h4>
      </div>
      <div class="modal-body">

        <form action="../controller/controller_empresa.php" method="POST">
          
           <!-- Input id -->
          <div class="form-group">
            <!-- <label for="recipient-name" class="control-label">Código:</label> -->
            <input type="hidden" name="empresaId" class="form-control" id="empresaId">
          </div>

          <!-- Input Nome -->
          <div class="form-group">
            <label for="empresaEditCodigo" class="control-label">Código:</label>
            <input type="text" name="empresaEditCodigo" class="form-control" id="empresaEditCodigo">
          </div>

           <!-- Input login -->
          <div class="form-group">
            <label for="empresaEditNome" class="control-label">Nome:</label>
            <input type="text" name="empresaEditNome" class="form-control" id="empresaEditNome">
          </div>
            

          <input type="hidden" name="actionEmpresa" value="atualizar">
        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
        <button type="submit" class="btn btn-primary">Salvar</button>
      </div>
      </form>
    </div>
  </div>
</div>




