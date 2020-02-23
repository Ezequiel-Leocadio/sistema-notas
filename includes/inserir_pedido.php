
    <!-- Modal Dialogo na tela -->
		<div class="modal fade" id="addPedido" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
		  <div class="modal-dialog" role="document">
		    <div class="modal-content">
		    	<form id="enviarPedido"  action="../admin/inserts/inserir_nota.php" enctype="multipart/form-data" oninput="calc_total();">
			      	<div class="modal-header">
			        	<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			        	<h4 class="modal-title" id="myModalLabel">Adicionar Pedido</h4>
			      	</div>



						<div id="elert_suc_ped"  class=" elert_sucesso alert alert-success alert-dismissible" role="alert">
						  <button  type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true"></span></button>
						  <strong> Pedido  '<strong id="pedido"></strong>' Inserido com Sucesso.</strong>
						</div>

			
						
						<div  id="elert_erro_ped" class=" elert_erro alert alert-danger alert-dismissible" role="alert">
						  <button id="myAlert" type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true"></span></button>
						  <strong>Erro ao Inserir Pedido: <strong id="pedido_e"></strong></strong><br>
						</div>



			      	<div class="modal-body">

				   

					<!-- Text input numero nota-->
					<!-- <div class="form-group">
					  <label class=" control-label" for="txtNumero">Solicitante:</label>  
					  <div class="">
					  	<input tabindex="2" id="txtNumero" name="txtNumero" type="text" class="form-control input-md" placeholder="Número" required="" maxlength="9" onkeyup="if(this.value.length >= 9) { txtCnpj.focus(); }">   
					  </div>
                    </div> -->
                    
                    <!-- Text input Loja-->
				 

					<div class="form-group ">
		               <!-- <div class="col-md-6"> -->
		               <label  for="txtLoja">Loja *:</label>                
		                
		                <select class="form-control" style="width: 100%;" id="txtLoja" name="txtLoja" required="">
		                  <option selected="selected" value="">Selecione</option>
		                  <?php 
		                    $loja = new acme\models\LojaModel;
		                    $lojas = $loja->read('SELECT * FROM lojas');
		                    foreach ($lojas as $loja) {
		                      echo "<option value='".$loja->nome."'>";
		                      echo $loja->codigo;
		                      echo " --  ";
		                      echo $loja->nome;
		                      echo "</option>";

		                    }
		                    ?>
		                </select>
		            </div>

				  
				    <!-- Text input Setor-->
				    <div class="form-group">
				        <label class=" control-label" for="txtSetor">Setor:</label>  
				        <div class="">
				            <select id="txtSetor" name="txtSetor" class="form-control input-md" placeholder="Setor" required="" maxlength="14">
				                <option value="">Selecione</option>
												<option>CADASTRO</option>
				                <option>COMPRAS</option>
												<option>COMERCIAL</option>
												<option>CONTABILIDADE</option>
												<option>CPD</option>
												<option>DEPOSITO</option>
												<option>DEP PESSOAL</option>
												<option>EXPEDIÇÃO</option>
												<option>FRENTE DE CAIXA</option>
												<option>FINANCEIRO</option>
												<option>HORT FRUTH</option>
												<option>MATA BURRO</option>
												<option>PADARIA</option>
												<option>REDE USE</option>
												<option>RH</option>  	
				                <option>TI</option>
											

				            </select> 
				        </div>
				    </div>
                     
           
				    
				    <!-- Text input Solicitação-->
				    <div class="form-group">
				       	<label  >Solicitação:</label>  			       
				        <textarea tabindex="3" id="txtSolicitacao" name="txtSolicitacao" rows="4" class="form-control" required placeholder="Solicitação ...." ></textarea>
				    </div>

				
      

				    <input type="hidden" name="cadastrar" id="cadastrar" value="cadastrar">
				    
								 
			      </div>
			      <div class="modal-footer">
			        <button type="reset" class="btn btn-default" data-dismiss="modal">Fechar</button>
			        <button type="submit" tabindex="5" id="enviarPedido" class="btn btn-primary">Salvar</button>
			        <!-- <button type="submit" class="btn btn-primary">Salvar</button> -->
			      </div>
		      </form>
		    </div>
		  </div>
		</div>



