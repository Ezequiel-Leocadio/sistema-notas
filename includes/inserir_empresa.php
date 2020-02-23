
    <!-- Modal Dialogo na tela -->
		<div class="modal fade" id="addEmpresa" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
		  <div class="modal-dialog" role="document">
		    <div class="modal-content">
		    	<form action="../controller/controller_empresa.php" method="post">
			      <div class="modal-header">
			        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			        <h4 class="modal-title" id="myModalLabel">Adicionar Empresa</h4>
			      </div>
			      <div class="modal-body">

							 <!-- Input Nome -->
		          <div class="form-group">
		            <label for="empresaCodigo" class="control-label">Código:</label>
		            <input type="text" name="empresaCodigo" class="form-control" id="empresaCodigo" required="">
		          </div>

		           <!-- Input login -->
		          <div class="form-group">
		            <label for="empresaNome" class="control-label">Nome:</label>
		            <input type="text" name="empresaNome" class="form-control" id="empresaNome" required="">
		          </div>
		            

		      

				    <input type="hidden" name="actionEmpresa" value="cadastrar">
								 
			      </div>
			      <div class="modal-footer">
			        <button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
			        <button type="submit" class="btn btn-primary">Salvar mudanças</button>
			      </div>
		      </form>
		    </div>
		  </div>
		</div>
