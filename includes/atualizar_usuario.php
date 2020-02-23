<div class="modal fade" id="aditUser" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="exampleModalLabel">Editar Usúario</h4>
      </div>
      <div class="modal-body">

        <form action="../controller/controller_usuario.php" method="POST">
          
           <!-- Input id -->
          <div class="form-group">
            <!-- <label for="recipient-name" class="control-label">Código:</label> -->
            <input type="hidden" name="codigo" class="form-control" id="codigo">
          </div>

          <!-- Input Nome -->
          <div class="form-group">
            <label for="recipient-name" class="control-label">Nome:</label>
            <input type="text" name="nome" class="form-control" id="nome">
          </div>

           <!-- Input login -->
          <div class="form-group">
            <label for="recipient-name" class="control-label">Login:</label>
            <input type="text" name="login" class="form-control" id="login" readonly="">
          </div>

          <!-- Input Senha -->
          <div class="form-group">
            <label for="recipient-name" class="control-label">Senha:</label>
            <input type="password" name="senha" class="form-control" id="senha">
          </div> 

            

          <input type="hidden" name="action" value="atualizar">
        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
        <button type="submit" class="btn btn-primary">Salvar</button>
      </div>
      </form>
    </div>
  </div>
</div>




