
    <!-- Modal Dialogo na tela -->
		<div class="modal fade" id="addForne" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
		  <div class="modal-dialog" role="document">
		    <div class="modal-content">
		    	<form action="../controller/controller_fornecedor.php" method="post">
			      <div class="modal-header">
			        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			        <h4 class="modal-title" id="myModalLabel">Adicionar Fornecedor</h4>
			      </div>
			      <div class="modal-body">

					 <!-- Input Nome -->
		          <div class="form-group">
		            <label for=txtNome" class="control-label">Nome:</label>
		            <input type="text" name="txtNome" class="form-control" id="txtNome" required="">
		          </div>

		          <!-- Input Nome -->
		          <div class="form-group">
		            <label for="txtCnpj" class="control-label">CNPJ:</label>
		            <input type="text" name="txtCnpj" class="form-control" id="txtCnpj" required="">
		          </div> 

		          <input type="hidden" name="cadastrar">
								 
			      </div>
			      <div class="modal-footer">
			        <button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
			        <button type="submit" class="btn btn-primary">Salvar mudanças</button>
			      </div>
		      </form>
		    </div>
		  </div>
		</div>
