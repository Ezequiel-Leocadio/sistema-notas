<div class="modal fade" id="aditBoleto" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="exampleModalLabel">Editar Usuario</h4>
      </div>
      <div class="modal-body">

        <form action="../admin/updates/editar_boleto.php" method="get">
          
            <!-- Input numero -->
            <div class="form-group">
              <label for="recipient-name" class="control-label">Número:</label>
              <input type="text" name="numero" class="form-control" id="numero" readonly="">
            </div>


               <!-- Input Cnpj -->
            <div class="form-group">
              <label for="txtBanco" class="control-label">Banco:</label>
              <input type="text" class="form-control" id="txtBanco" name="txtData" disabled="">
            </div>

            <!-- Input Nome Fornecedor -->
            <div class="form-group">
              <label for="txtData" class="control-label">Data:</label>
              <input type="text" class="form-control" id="txtData"  name="txtData" disabled="">
            </div>

            <!-- Input Data -->
            <div class="form-group">
              <label for="txtData_v" class="control-label">Data Vencimento:</label>
              <input type="text" class="form-control" id="txtData_v" name="txtData_v" disabled="">
            </div>


             <!-- Text input situacao-->
            <div class="form-group">
                <label class=" control-label" for="txtSituacao">Situação:</label>  
                <div class="">
                    <select id="txtSituacao" name="txtSituacao" class="form-control input-md" <?php  if($tipo != "Admin"){echo "disabled";}else{echo"";}?> required="">
                        
                    </select> 
                </div>
            </div>


             <!-- Text input usuario-->
            <div class="form-group">
                <label class=" control-label" for="txtUsuario">Usuario:</label>  
                <div class="">
                    <select id="txtUsuaro" name="txtUsuario" class="form-control input-md" <?php  if($tipo != "Admin"){echo "disabled";}else{echo"";}?>>
                    <option id="txtUsuario"></option>
                    <?php
                      $registro = mysql_query($consulta,$connect2);

                      while($row = mysql_fetch_array($registro)){   
                        echo "<option >";
                        echo $row['login'];  
                        echo "</option >";  
                      } 
                    ?>  
                        
                    </select> 
                </div>
            </div>


             <!-- Input Valor -->
            <div class="form-group">
              <label for="txtValor" class="control-label">Valor:</label>
              <input type="text" class="form-control" id="txtValor" name="txtValor">
            </div>

            
          
          </div>
          <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
          <button type="submit"  class="btn btn-primary">Salvar</button>
      </div>
      </form>
    </div>
  </div>
</div>
