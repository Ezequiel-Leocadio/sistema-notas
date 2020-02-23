<div class="modal fade" id="aditForne" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="exampleModalLabel">Editar Fornecedor</h4>
      </div>
      <div class="modal-body">

        <form action="../controller/controller_fornecedor.php" method="post">

          <!-- Input Nome -->
          <div class="form-group">
            <label for="recipient-name" class="control-label">Nome:</label>
            <input type="text" name="nome" class="form-control" id="nome">
          </div>

          <!-- Input Nome -->
          <div class="form-group">
            <label for="recipient-name" class="control-label">CNPJ:</label>
            <input type="text" name="cnpj" class="form-control" id="cnpj" readonly="">
          </div> 

                    <input type="hidden" name="atualizar">
        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
        <button type="submit" class="btn btn-primary">Salvar</button>
      </div>
      </form>
    </div>
  </div>
</div>




