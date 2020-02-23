<div class="modal fade" id="aditPedido" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="exampleModalLabel">DETALHES DA SOLICITAÇÃO</h4>
      </div>
      <div class="modal-body">
      
          <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
              <li class="active"><a href="#tab_1" data-toggle="tab">Pedido</a></li>
              <li><a href="#tab_2" data-toggle="tab">Situação</a></li>
              <li><a href="#tab_3" data-toggle="tab">Finalização</a></li>
            
              <li class="pull-right"><a href="#" class="text-muted"><i class="fa fa-gear"></i></a></li>
            </ul>
            <div class="tab-content">
              <div class="tab-pane active" id="tab_1">
                <div class="row">
                  
                  <!-- input Protocolo -->
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="txtVisuProtocolo" class="control-label">Protocolo:</label>
                      <input type="text" name="txtVisuProtocolo" class="form-control" id="txtVisuProtocolo" >
                    </div>
                  </div>

                  <!-- input Data -->
                  <div class="col-md-6">
                    <div class="form-group ">
                        <label for="txtVisuData" class="control-label">Data:</label>
                        <input type="text" name="txtVisuData" class="form-control" id="txtVisuData" >
                    </div>
                  </div>
                  
                  <!-- input Solicitante -->
                  <div class="col-md-4">
                    <div class="form-group">
                        <label for="txtVisuSolicitante" class="control-label">Solicitante:</label>
                        <input type="text" name="txtVisuSolicitante" class="form-control" id="txtVisuSolicitante" >
                    </div>
                  </div>
                  
                  <!-- input Loja -->
                  <div class="col-md-4">
                    <div class="form-group">
                        <label for="txtVisuLoja" class="control-label">Loja:</label>
                        <input type="text" name="txtVisuLoja" class="form-control" id="txtVisuLoja" >
                    </div>
                  </div>
                  
                  <!-- input Setor -->
                  <div class="col-md-4">
                    <div class="form-group">
                        <label for="txtVisuSetor" class="control-label">Setor:</label>
                        <input type="text" name="txtVisuSetor" class="form-control" id="txtVisuSetor" >
                    </div>
                  </div>
                  
                  <!-- textarea Solicitaçao -->
                  <div class="col-md-12">
                    <div class="form-group">
                        <label>Solicitação:</label>
                        <textarea class="form-control" rows="3" id="txtVisuSolicitacao" name="txtVisuSolicitacao" ></textarea>
                       
                    </div>
                  </div>

                 </div>
                 <!-- Fim div row  -->

              </div>
              <!-- /.tab-pane -->
              <div class="tab-pane" id="tab_2">
                
                <!-- Span Status do pedido -->
                <div class="form-group">
                  <label class="control-label">
                    <h4 class="h4VisuStatus">
                      <span class="label label-warning">Em Andamento</span>
                    </h4>
                  </label>          
                </div>
                 
                <table class="table table-striped">
                  
                  <tr>
                    <th style="width: 10px">#</th>
                    <th>Situação</th>
                    <th>Data</th>
                    <th>Usuário</th>
                    
                  </tr>
                <tbody id="tabela_listagem_detalhes">
      
                 </tbody>
                  
                </table>
                <form action="../controller/controller_pedido.php" enctype="multipart/form-data" method="post" class="<?php echo @$permocultar; ?>">

                  <!-- Input  Inserir nova Situação -->
                  <div class="form-group">
                      <label for="txtNovaSituacao" class="control-label">Inserir Nova Situação:</label>
                      <input type="text" name="txtNovaSituacao" class="form-control" id="txtNovaSituacao" placeholder="Situação" required="">
                  </div>
                    <input type="hidden" class="txtPedidoID" name="txtPedidoID">
                    <input type="hidden"  name="action_pedido" value="atualizar">
                   <button type="submit" tabindex="5" class="btn btn-primary" >Inserir</button>
                </form>
              </div>
              <!-- /.tab-pane -->

              <div class="tab-pane" id="tab_3">
                
                <!-- Span Status do pedido -->
                <div class="form-group">
                  <label class="control-label">
                    <h4 class="h4VisuStatus">
                      <span class="label label-warning">Em Andamento</span>
                    </h4><br>
                    <div id="Finalizacao"></div>
                  </label>          
                </div>

                <form action="../controller/controller_pedido.php" enctype="multipart/form-data" method="post" class="<?php echo @$permocultar; ?>">
                  
                  <!-- Input Motivo  -->
                  <div class="form-group">
                    <label for="txtMotivo" class="control-label">Motivo:</label>
                    <input type="text" name="txtMotivo" class="form-control" id="txtMotivo" placeholder="Motivo" required>
                  </div>
                  <input type="hidden" class="txtPedidoID" name="txtPedidoID">
                  <input type="hidden"  name="action_pedido" value="atualizar">
                  <!-- btn Finalizar pedido -->
                  <button type="submit" tabindex="5"  class="btn btn-primary" >Finalizar Pedido</button>
                </form>
              </div>
              <!-- /.tab-pane -->
            </div>
            <!-- /.tab-content -->
          </div>
          <!-- nav-tabs-custom -->
    
          
        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
       
      </div>
      </form>
    </div>
  </div>
</div>




