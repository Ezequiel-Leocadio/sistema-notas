
    <!-- Modal Dialogo na tela -->
		<div class="modal fade" id="addBoleto" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
		  <div class="modal-dialog" role="document">
		    <div class="modal-content">
		    	<form action="../admin/inserts/inserir_boleto.php" enctype="multipart/form-data" method="post">
			      	<div class="modal-header">
			        	<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			        	<h4 class="modal-title" id="myModalLabel">Adicionar Boleto</h4>
			      	</div>
			      	<div class="modal-body">

				      <!-- Text input Numero-->
				    <div class="form-group">
				        <label class="control-label" for="txtNum">Número Boleto:</label>  
				        <div class="">
				            <input id="txtNum" name="txtNum" type="text" class="form-control input-md" placeholder="Número" required="" maxlength="44">   
				        </div>
				    </div>

				    <!-- Text input Situacao-->
				    <div class="form-group">
				        <label class=" control-label" for="txtSituacao">Situação:</label>  
				        <div class="">
				            <select id="txtSituacao" name="txtSituacao"  class="form-control input-md" placeholder="Situação" required="" maxlength="14">
				                <option value="">Situação</option>
				                <option>Em aberto</option>
				                <option>Pago</option>
				            </select> 
				        </div>
				    </div>


				    <!-- Text input banco-->
				    <div class="form-group">
				        <label class=" control-label" for="txtBanco">Banco:</label>  
				        <div class="">
				            <select id="txtBanco" name="txtBanco" class="form-control input-md" required="" maxlength="14">
				            <option value="">Banco</option>
				            <option>Brasil</option>
				            <option>Bradesco</option>
				            <option>Caixa</option>
				            <option>Santander</option>
				            <option>Sicredi</option>
				            </select>
				             </div>
				    </div>
				    
				    <!-- Text input Data-->
				    <!-- <div class="form-group">
				        <label class=" control-label" for="txtData1">Data:</label>  
				        <div class="">
				            <input id="txtData1" name="txtData1" type="text" class="form-control " placeholder="Data" required="" maxlength="14">   
				        </div>
				    </div> -->

				    <!-- Text input Data vecimento-->
				    <div class="form-group">
				        <label class=" control-label" for="txtDataVencimento">Data Vencimento:</label>  
				        <div class="">
				            <input id="txtDataVencimento" name="txtDataVencimento" type="text" class="form-control" placeholder="Data Vencimento" required="" maxlength="14">   
				        </div>
				    </div>
				    
				    <!-- Text input Valor-->
				    <div class="form-group">
				        <label class=" control-label" for="txtValor">Valor:</label>  
				        <div class="">
				            <input id="txtValor" name="txtValor" type="text" class="form-control input-md" placeholder="Valor" required="" maxlength="14">   
				        </div>
				    </div>
								 
			      </div>
			      <div class="modal-footer">
			        <button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
			         <button type="reset" tabindex="5" id="enviar-boleto" class="btn btn-primary">Salvar e Continuar</button>
			        <button type="submit" class="btn btn-primary">Salvar</button>
			      </div>
		      </form>
		    </div>
		  </div>
		</div>
