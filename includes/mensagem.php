<div class="modal fade" id="sucesso" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
      </div>
      <div class="modal-body">
        
        <h1>Salvo Com Sucesso</h1>

      </div>
      <div class="modal-footer">
        <a href="#" class="btn btn-primary" data-dismiss="modal">OK</a>
      </div>
    </div>
  </div>
</div>


<div class="modal fade" id="enviarCpd" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
      </div>
      <div class="modal-body">
        
        <h1>Notas enviadas com sucesso</h1>

      </div>
      <div class="modal-footer">
        <a href="#" class="btn btn-warning btnImprimirCpd" ><i class="fa fa-print"></i>  &nbsp;Imprimir</a>
        <a href="#" class="btn btn-primary" data-dismiss="modal">OK</a>
      </div>
    </div>
  </div>
</div>


<div class="modal fade" id="deleteSucesso" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
      </div>
      <div class="modal-body">
        
        <h1>Excluido Com Sucesso</h1>

      </div>
      <div class="modal-footer">
        <a href="#" class="btn btn-primary" data-dismiss="modal">OK</a>
      </div>
    </div>
  </div>
</div>


<div class="modal fade" id="erro" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
      </div>
      <div class="modal-body">
        
        <h1>Erro ao Salvar</h1>

      </div>
      <div class="modal-footer">
        <a href="#" class="btn btn-danger" data-dismiss="modal">OK</a>
      </div>
    </div>
  </div>
</div>


<div class="modal fade" id="deleteErro" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
      </div>
      <div class="modal-body">
        
        <h1>Erro ao Excluir</h1>

      </div>
      <div class="modal-footer">
        <a href="#" class="btn btn-danger" data-dismiss="modal">OK</a>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="enviarErro" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
      </div>
      <div class="modal-body">
        
        <h1>Erro ao Enviar</h1>

      </div>
      <div class="modal-footer">
        <a href="#" class="btn btn-danger" data-dismiss="modal">OK</a>
      </div>
    </div>
  </div>
</div>



<div class="modal modal-danger fade in" id="negado" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
      </div>
      <div class="modal-body">
        
        <h3>Usuário Sem Permissão De Acesso a Esta Página !.</h3>

      </div>
      <div class="modal-footer">
        <a href="#" class="btn btn-danger" data-dismiss="modal">OK</a>
      </div>
    </div>
  </div>
</div>


<div class="modal modal-danger fade in" id="negado2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
      </div>
      <div class="modal-body">
        
        <h3>Usuário Sem Permissão!.</h3>

      </div>
      <div class="modal-footer">
        <a href="#" class="btn btn-danger" data-dismiss="modal">OK</a>
      </div>
    </div>
  </div>
</div>


<div class="modal fade" id="confirmacao" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="exampleModalLabel">Confirmação de Exclusão</h4>
      </div>
      <div class="modal-body">
        
        <h1>Deseja Excluir</h1>
        <form action="../controller/controller_pedido.php" method="post">
          <input type="hidden" id="txtID" name="txtID">
          <input type="hidden" name="action_pedido" value="deletar">
       

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" data-dismiss="modal">Não</button>
       
        <button type="submit" tabindex="5" class="btn-ok btn btn-danger" >Sim</button>
         </form>
        
      </div>
    </div>
  </div>
</div>



