<div class="modal fade" id="aditNotaCpdS" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="exampleModalLabel">Editar Status</h4>
      </div>
      <div class="modal-body">
      
        <form action="../controller/controller_nota_cpd.php" enctype="multipart/form-data" method="post">
          
           

           <!-- Text input usuario-->
            <div class="form-group">
                <label class=" control-label" for="txtEditStatus">Status:</label>  
                <div class="">
                    <select id="txtEditStatus" name="txtEditStatus" class="form-control input-md" required="">
                    <option value="1">Pendente</option>
                    <option value="3">Finalizado</option>
                    <option value="2" disabled="">Enviada</option>  
                    <option value="4" disabled="">Horth_Fruth</option>   
                    <option value="5" disabled="">Financeiro</option>               
                    </select> 
                </div>
            </div>

           


             <!-- Text input Solicitação-->
            <div class="form-group">
                <label  for="txtEditObservacao">Observação:</label>              
                <textarea tabindex="3" id="txtEditObservacao" name="txtEditObservacao" rows="4" class="form-control" placeholder="Observação ...." ></textarea>
            </div>

              <!-- Text input Solicitação-->
            <div class="form-group ">
                <label  for="txtEditDataPend">Data de Pendência:</label>              
                <input id="txtEditDataPend" name="txtEditDataPend" rows="4" class="form-control" placeholder="Vazio" disabled="">

            </div>

             <!-- Text input Solicitação-->
            <div class="form-group ">
                <label  for="txtEditDataFina">Data de Finalização:</label>              
                <input id="txtEditDataFina" name="txtEditDataFina" rows="4" class="form-control" placeholder="Vazio" disabled="">

            </div>

             <!-- Text input Solicitação-->
            <div class="form-group ">
                <label  for="txtEditDataEnv">Data de Envio:</label>              
                <input id="txtEditDataEnv" name="txtEditDataEnv" rows="4" class="form-control" placeholder="Vazio" disabled="">

            </div>

             <!-- Text input Solicitação-->
            <div class="form-group ">
                <label  for="txtEditDataHorth">Data de Horth Fruth:</label>              
                <input id="txtEditDataHorth" name="txtEditDataHorth" rows="4" class="form-control" placeholder="Vazio" disabled="">

            </div>

             <!-- Text input Solicitação-->
            <div class="form-group ">
                <label  for="txtEditDataFinan">Data de Fianceiro:</label>              
                <input id="txtEditDataFinan" name="txtEditDataFinan" rows="4" class="form-control" placeholder="Vazio" disabled="">

            </div>


            <input type="hidden" name="idNotaCpd" id="idNotaCpd">
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




