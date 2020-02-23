<div class="modal fade" id="editConta" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="exampleModalLabel">Editar Situação da Conta</h4>
      </div>
      <div class="modal-body">
      
        <form id="editarContas" method="POST"  action="../controller/controller_contas.php" enctype="multipart/form-data">
                 
           <!-- Text input usuario-->
            <!-- <div class="form-group">
                <label class=" control-label" for="txtContaEditStatus">Status:</label>  
                <div class="">
                    <select id="txtContaEditStatus" name="txtContaEditStatus" class="form-control input-md" required="">
                                 
                    </select> 
                </div>
            </div> -->

                  <!-- Text input Comprovante-->
           <div class="form-group ">
             <label  for="txtEditContasComprovante">Comprovante *:</label>  
             <input tabindex="4" id="txtEditContasComprovante" name="txtEditContasComprovante" type="text" class="form-control input-md " placeholder="Numero do Comprovante" required>   
           </div>

               <!-- Text input Forma de Pagamento-->
            <div class="form-group">
                <label for="txtEditContasFPag">Forma de Pagamanto:</label>  
              
                    <select id="txtEditContasFPag" name="txtEditContasFPag" class="form-control" required="">
                    <option value="">Selecione</option>
                    <option value="Boleto">Boleto</option>
                    <option value="Deposito">Deposito</option>
                    <option value="DepositoCaixa">Deposito No Caixa</option>
                    <option value="PagamantoMao">Pagamanto em Mão</option>
                    <option value="Transferência">Transferência</option>
                    <option value="InternetBanking">Internet Banking</option>
                    
                   
                                            
                    </select> 
                
            </div>

                 <!-- Text input Forma de Pagamento-->
            <div class="form-group">
                <label for="txtEditContasBanco">Banco *:</label>  
              
                    <select id="txtEditContasBanco" name="txtEditContasBanco" class="form-control" required="">
                    <option value="">Selecione</option>
                    <option value="BigMaster">Big Master</option>
                    <option value="BancoAmazônia">Banco da Amazônia</option>
                    <option value="Bradesco">Bradesco</option>
                    <option value="Brasil">Brasil</option>
                    <option value="Caixa">Caixa</option>
                    <option value="Santander">Santander</option>
                    <option value="Sicoob">Sicoob</option>
                    <option value="Sicred">Sicred</option>
                    <option value="Itaú">Itaú</option>
                    
                   
                                            
                    </select> 
                
            </div>

          <!-- Input Comprovante -->
          <div class="form-group">
            <label for="recipient-name" for="txtContaEditComp" class="control-label">Imagem do Comprovante:</label>
            <!-- <input type="text"  class="form-control" name="txtContaEditComp" id="txtContaEditComp" required=""> -->
          </div>

             <div class="form-group ">
                  <!-- <label class="control-label col-lg-4">Imagem do Comprovante</label> -->
                <div class="">
                    <div class="fileupload fileupload-new" data-provides="fileupload">
                      <div class="fileupload-new thumbnail" style="width: 75%; height: 50%;">
                        <img id="imgComprovante" src="../public/plugins/bootstrap-file/img/demoUpload.jpg" alt="" />
                      </div>
                      <div class="fileupload-preview fileupload-exists thumbnail" style="max-width: 100%; max-height: 75%; line-height: 20px;"></div>
                      <div>
                        <span class="btn btn-file btn-primary" id="btn-file" >
                          <span class="fileupload-new" >Selecionar Imagem</span>
                          <span class="fileupload-exists">Mudar Imagem</span>
                          <input type="file" name="txtContaEditComp" id="txtContaEditComp">
                        </span>
                        <a href="#" class="btn btn-danger fileupload-exists" data-dismiss="fileupload">Remover</a>
                      </div>
                    </div>
                </div>
              </div>

         

              <input type="hidden" id="txtContasAction" name="txtContasAction" value="editar">
              <input type="hidden" id="idConta" name="idConta" >
          
        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
        <button type="submit" class="btn btn-info" id="ContaEditSalvar">Salvar</button>
      </div>
      </form>
    </div>
  </div>
</div>




