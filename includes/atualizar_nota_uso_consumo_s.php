<div class="modal fade" id="aditNotaUsoS" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="exampleModalLabel">Editar Status</h4>
      </div>
      <div class="modal-body">
      
        <form action="../controller/controller_nota_uso_consumo.php" enctype="multipart/form-data" method="post">
          
           

           <!-- Text input usuario-->
            <div class="form-group">
                <label class=" control-label" for="txtUsoEditStatus">Status:</label>  
                <div class="">
                    <select id="txtUsoEditStatus" name="txtUsoEditStatus" class="form-control input-md">
                    <option value="1">Pendente</option>
                    <option value="3">Finalizado</option>
                                            
                    </select> 
                </div>
            </div>

             <!-- Text input Solicitação-->
            <div class="form-group">
                <label  >Observação:</label>              
                <textarea tabindex="3" id="txtUsoEditObservacao" name="txtUsoEditObservacao" rows="4" class="form-control" placeholder="Observação ...." ></textarea>
            </div>

            <input type="hidden" name="idNotaUsoConsumo" id="idNotaUsoConsumo">
            <input type="hidden" name="action" id="action" value="editar">
          
        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
        <button type="submit" class="btn btn-primary" >Salvar</button>
      </div>
      </form>
    </div>
  </div>
</div>




