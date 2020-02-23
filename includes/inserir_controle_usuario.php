
    <!-- Modal Dialogo na tela -->
		<div class="modal fade" id="addControleUsuario" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
		  <div class="modal-dialog" role="document">
		    <div class="modal-content">
		    	<form action="../controller/controller_controle_usuario.php" method="post">
			      <div class="modal-header">
			        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			        <h4 class="modal-title" id="myModalLabel">Adicionar Permissão</h4>
			      </div>
			      <div class="modal-body">

					

				    <!-- Text input Tipo-->
				    <div class="form-group">
				        <label class=" control-label" for="txtPermiRotina">Rotina:</label>  
				        <div class="">
				            <select id="txtPermiRotina" name="txtPermiRotina" class="form-control input-md" placeholder="Tipo" required="" >
				                <option value="">Selecione</option>
				                <option value="usuario">Usuário</option>
				                <option value="notas">Notas NF</option>
				                 <option value="notas_cpd">Notas CPD</option>
				                 <option value="notas_horth">Notas Horth Fruth</option>
				                 <option value="notas_uso">Notas De Uso Consumo</option>
				                <option value="pedidos">Pedidos OS</option>
				                <option value="permissao">Permissões</option>
				                <option value="fornecedor">Fornecedores</option>
				                <option value="lojas">Lojas Filiais</option>
				                <option value="empresa">Empresas</option>
				                <option value="contas">Contas A Pagar</option>

				            </select> 
				        </div>
				   	</div>

				   	 <!-- checkbox -->
              <div class="form-group">
                <label>
                  <input type="checkbox" class="flat-red"  id="checkSalvar" name="checkSalvar">
                  Salvar
                </label>&nbsp;&nbsp;&nbsp;
                <label>
                  <input type="checkbox" class="flat-red"  id="checkVisualizar" name="checkVisualizar">
                  Visualizar
                </label>&nbsp;&nbsp;&nbsp;
                <label>
                  <input type="checkbox" class="flat-red"  id="checkEditar" name="checkEditar">
                  Editar
                </label>&nbsp;&nbsp;&nbsp;
                <label>
                  <input type="checkbox" class="flat-red"  id="checkExcluir" name="checkExcluir">
                  Excluir
                </label>&nbsp;&nbsp;&nbsp;
              </div>



				    <!-- Text input Empresa-->
		            <div class="form-group ">
		               <label  for="txtPermiUsuario">Usuário *:</label>
		                <select class="form-control"  id="txtPermiUsuario" name="txtPermiUsuario" required="">
		                  <option selected="selected" value="">Selecione</option>
		                  <?php 
		                    $user = new acme\models\UserModel;
		                    $users = $user->read('SELECT * FROM usuario');
		                    foreach ($users as $user) {
		                      echo "<option value='".$user->id."'>";
		                      echo $user->nome;
		                      echo "</option>";

		                    }

		                   ?>
		                </select> 
		                
		            </div>
		            <!--##Fim Text input Empresa-->

				    

				    

				    <input type="hidden" name="action" value="cadastrar">
								 
			      </div>
			      <div class="modal-footer">
			        <button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
			        <button type="submit" class="btn btn-primary">Salvar mudanças</button>
			      </div>
		      </form>
		    </div>
		  </div>
		</div>
