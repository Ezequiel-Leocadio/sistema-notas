<div class="modal fade" id="aditPedido" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="exampleModalLabel">DETALHES DA SOLICITAÇÃO</h4>
      </div>
      <div class="modal-body">
      
        <form >
          
          <input type="hidden" id="txtId_pedido">
            <!-- <div class="col-md-6"> -->
            <div class="panel with-nav-tabs panel-primary">
                <div id="panel_det_edit" class="panel-heading">
                        <ul class="nav nav-tabs">
                            <li class="active"><a href="#situacao01" data-toggle="tab">Situação 01</a></li>
                            <li><a href="#situacao02" data-toggle="tab">Situação 02</a></li>
                            <li><a href="#situacao03" data-toggle="tab">Situação 03</a></li>
                            <li><a href="#situacao04" data-toggle="tab">Situação 04</a></li>
                            <li><a href="#situacao05" data-toggle="tab">Obervação</a></li>    
                        </ul>
                </div>
                <div class="panel-body">
                    <div class="tab-content">
                        <div class="tab-pane fade in active" id="situacao01">

                             <!-- Input Situacao 01 -->
                            <div class="form-group">
                                <label for="recipient-name" class="control-label">Situação 01:</label>
                                <input type="text" name="txtSituacao01" class="form-control" id="txtSituacao01" >
                                <!-- ""readonly"" desativatica o input mas manda os dados dele pelo fomulario -->
                            </div>

                             <input type="hidden" name="txtId_det_01" class="form-control" id="txtId_det_01" >

                             <button  type="reset" tabindex="5" id="atualsit01" class="btn btn-primary" data-dismiss="modal">Salvar</button>

                        </div>
                        <div class="tab-pane fade" id="situacao02">
                        
                             <!-- Input Situacao 02 -->
                            <div class="form-group">
                                <label for="recipient-name" class="control-label">Situação 02:</label>
                                <input type="text" name="txtSituacao02" class="form-control" id="txtSituacao02" >
                                <!-- ""readonly"" desativatica o input mas manda os dados dele pelo fomulario -->
                            </div>
                            <input type="hidden" name="txtId_det_02" class="form-control" id="txtId_det_02" >
                             <button type="reset" tabindex="5" id="atualsit02" class="btn btn-primary" data-dismiss="modal">Salvar</button>

                        </div>
                        <div class="tab-pane fade" id="situacao03">
                        
                             <!-- Input Situacao 03 -->
                            <div class="form-group">
                                <label for="recipient-name" class="control-label">Situação 03:</label>
                                <input type="text" name="txtSituacao03" class="form-control" id="txtSituacao03" >
                                <!-- ""readonly"" desativatica o input mas manda os dados dele pelo fomulario -->
                            </div>
                            <input type="hidden" name="txtId_det_03" class="form-control" id="txtId_det_03" >
                             <button type="reset" tabindex="5" id="atualsit03" class="btn btn-primary" data-dismiss="modal">Salvar</button>

                        </div>
                        <div class="tab-pane fade" id="situacao04">
                        
                             <!-- Input Situacao 04 -->
                            <div class="form-group">
                                <label for="recipient-name" class="control-label">Situação 04:</label>
                                <input type="text" name="txtSituacao0" class="form-control" id="txtSituacao04" >
                                <!-- ""readonly"" desativatica o input mas manda os dados dele pelo fomulario -->
                            </div>
                            <input type="hidden" name="txtId_det_04" class="form-control" id="txtId_det_04" >
                             <button type="reset" tabindex="5" id="atualsit04" class="btn btn-primary" data-dismiss="modal">Salvar</button>
                        
                        </div>
                        <div class="tab-pane fade" id="situacao05">
                        
                             <!-- Input Obervacao -->
                            <div class="form-group">
                                <label for="recipient-name" class="control-label">Obervação:</label>
                                <input type="text" name="txtSituacao05" class="form-control" id="txtSituacao05" >
                                <!-- ""readonly"" desativatica o input mas manda os dados dele pelo fomulario -->
                            </div>
                            <input type="hidden" name="txtId_det_05" class="form-control" id="txtId_det_05" >
                             <button type="reset" tabindex="5" id="atualsit05" class="btn btn-primary" data-dismiss="modal">Salvar</button>

                        </div>
                    </div>
                </div>
            </div>
        <!-- </div> -->
          
        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
        <button type="reset" tabindex="5" id="atualPedido" class="btn btn-primary" data-dismiss="modal">Finalizar Pedido</button>
      </div>
      </form>
    </div>
  </div>
</div>




