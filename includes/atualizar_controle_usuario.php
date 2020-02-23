<div class="modal fade" id="aditControleUser" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="exampleModalLabel">Editar Permissão</h4>
      </div>
      <div class="modal-body">

        <form action="../controller/controller_controle_usuario.php" method="POST">

          
          <input type="hidden" name="txtPermId" id="txtPermId">
             <!-- Text input Tipo-->
            <div class="form-group">
                <label class=" control-label" for="txtEditPermiRotina">Rotina:</label>  
                <div class="">
                    <select id="txtEditPermiRotina" name="txtEditPermiRotina" class="form-control input-md" placeholder="Tipo">
                        <option value="">Selecione</option>
                        <option value="usuario">Usuário</option>
                        <option value="notas">Notas NF</option>
                         <option value="notas_cpd">Notas CPD</option>
                         <option value="notas_uso">Notas De Uso Consumo</option>
                        <option value="pedidos">Pedidos OS</option>
                        <option value="permissao">Permissões</option>
                        <option value="fornecedor">Fornecedores</option>
                        <option value="home">Principal</option>
                        <option value="lojas">Lojas Filiais</option>
                        <option value="empresa">Empresas</option>
                        <option value="contas">Contas A Pagar</option>

                    </select> 
                </div>
            </div>

             <!-- checkbox -->
              <div class="form-group">
                <label>
                  <input type="checkbox" class="flat-red"  id="checkEditSalvar" name="checkEditSalvar">
                  Salvar
                </label>&nbsp;&nbsp;&nbsp;
                <label>
                  <input type="checkbox" class="flat-red"  id="checkEditVisualizar" name="checkEditVisualizar">
                  Visualizar
                </label>&nbsp;&nbsp;&nbsp;
                <label>
                  <input type="checkbox" class="flat-red"  id="checkEditEditar" name="checkEditEditar">
                  Editar
                </label>&nbsp;&nbsp;&nbsp;
                <label>
                  <input type="checkbox" class="flat-red"  id="checkEditExcluir" name="checkEditExcluir">
                  Excluir
                </label>&nbsp;&nbsp;&nbsp;
              </div>

             
            <!-- Text input Empresa-->
                <div class="form-group ">
                   <label  for="txtEditPermiUsuario">Usuário *:</label>
                    <select class="form-control"  id="txtEditPermiUsuario" name="txtEditPermiUsuario">
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
                <div  id="dataVisuConta" class="dataVisuConta"> 

                <div  class="form-group "> 
                 <label for="txtPermData">Data De Consulta *:</label>  
                 <input tabindex="4" id="txtPermData" name="txtPermData" type="date" class="form-control  ">   
                </div></div>
                 <!-- <div id="dataVisuConta" class="dataVisuConta"> -->
                
                
              <!-- </div> -->

            


          <input type="hidden" name="action" value="atualizar">

        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
        <button type="submit" class="btn btn-primary">Salvar</button>
      </div>
      </form>
    </div>
  </div>
</div>




