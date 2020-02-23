
    <!-- Modal Dialogo na tela -->
		<div class="modal fade" id="addUsuario" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
		  <div class="modal-dialog" role="document">
		    <div class="modal-content">
		    	<form action="../controller/controller_usuario.php" method="post">
			      <div class="modal-header">
			        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			        <h4 class="modal-title" id="myModalLabel">Adicionar Usuario</h4>
			      </div>
			      <div class="modal-body">

					<!-- Text input Nome-->
				    <div class="form-group">
				        <label class=" control-label" for="txtNome">Nome:</label>  
				        <div class="">
				            <input id="txtNome" name="txtNome" type="text" class="form-control input-md" placeholder="Nome" required="" >   
				        </div>
				    </div>
				    
				    <!-- Text input Login-->
				    <div class="form-group">
				        <label class=" control-label" for="txtLogin">Login:</label>  
				        <div class="">
				            <input id="txtLogin" name="txtLogin" type="text" class="form-control input-md" placeholder="Login" required=""  >   
				        </div>
				    </div>
				    
				    <!-- Text input Senha-->
				    <div class="form-group">
				        <label class=" control-label" for="txtSenha">Senha:</label>  
				        <div class="">
				            <input id="txtSenha" name="txtSenha" type="password" class="form-control input-md" placeholder="Senha" required="" maxlength="14">   
				        </div>
				    </div>

				    <!-- Text input Tipo-->
				    <div class="form-group">
				        <label class=" control-label" for="txtTipo">Tipo:</label>  
				        <div class="">
				            <select id="txtTipo" name="txtTipo" class="form-control input-md" placeholder="Tipo" required="" maxlength="14">
				                <option value="">Selecione</option>
				                <option>User</option>
				                <option>Admin</option>
				            </select> 
				        </div>
				    </div>

				     <!-- Text input Filial-->
				    <div class="form-group">
				        <label class=" control-label" for="txtFilial">Filial:</label>  
				        <div class="">
				            <select id="txtFilial" name="txtFilial" class="form-control input-md" placeholder="Filial" required="" maxlength="14">
				                <option value="">Selecione</option>
				                <option>01</option>
				                <option>02</option>
				                <option>03</option>
				                <option>04</option>
				                <option>05</option>
				                <option>06</option>
				            </select> 
				        </div>
				    </div>

				     <!-- Text input Setor-->
				    <div class="form-group">
				        <label class=" control-label" for="txtSetor">Setor:</label>  
				        <div class="">
				            <select id="txtSetor" name="txtSetor" class="form-control input-md" placeholder="Setor" required="" maxlength="14">
				                <option value="">Selecione</option>
				                <option>COMPRAS</option>
				                <option>CPD</option>
				                <option>FINANCEIRO</option>
				                <option>Horth_Fruth</option>
				                <option>Precificação</option>
				                <option>TI</option>
								
				            </select> 
				        </div>
				    </div>

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
