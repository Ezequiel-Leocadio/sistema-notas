
    <!-- Modal Dialogo na tela -->
		<div class="modal fade" id="addLoja" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
		  <div class="modal-dialog" role="document">
		    <div class="modal-content">
		    	<form action="../controller/controller_loja.php" method="post">
			      <div class="modal-header">
			        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			        <h4 class="modal-title" id="myModalLabel">Adicionar Loja</h4>
			      </div>
			      <div class="modal-body">

						 <!-- Input login -->
		          <div class="form-group">
		            <label for="lojaCodigo" class="control-label">Código:</label>
		            <input type="text" name="lojaCodigo" class="form-control" id="lojaCodigo" required="">
		          </div>

		           <!-- Input Nome -->
		          <div class="form-group">
		            <label for="lojaNome" class="control-label">Nome:</label>
		            <input type="text" name="lojaNome" class="form-control" id="lojaNome" required="">
		          </div>          

        

				    <input type="hidden" name="actionLoja" value="cadastrar">
								 
			      </div>
			      <div class="modal-footer">
			        <button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
			        <button type="submit" class="btn btn-primary">Salvar mudanças</button>
			      </div>
		      </form>
		    </div>
		  </div>
		</div>
