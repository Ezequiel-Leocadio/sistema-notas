<?php 
namespace acme\models;

use Asw\Database\aswModel;

class UserModel extends aswModel{
	protected $table = 'usuario';


	public function permissaoUser($rotina, $usuario, $tipo, $acao){
		// $tipo exp: disabilitar ou ocultar/D,O
		//$acao exp: visualizar, editar, etc./VISUALIZAR,EDITAR,EXCLUIR,EXCLUIR_REGISTRO,INATIVAR,SAIDA
		$tipo_retorno = '';
		$acao_final = '';
		$dataPerm ='';
		if ($tipo == "D") {
			$tipo_retorno = "disabled";
		}elseif($tipo == "O"){
			$tipo_retorno = "sem-permissao";
		}


		$permissoes = new ControlUserModel;
		$permissao_user = $permissoes->findBy("usuario",$usuario);

		if ($permissao_user == true) {
			
			$query = "SELECT * FROM controle_usuario WHERE rotina = '$rotina' AND usuario = $usuario";
			$permissao_rotina = $permissoes->read($query);

			if ($permissao_rotina == true) {

				foreach ($permissao_rotina as $permissao) {
					$acao_final = $permissao->$acao;
					$dataPerm = $permissao->data;
				}

				if ($acao_final =='0') {
					return $tipo_retorno;
				}elseif ($acao_final == '1') {
					if ($tipo == "DT") {
						return $dataPerm;
					}else{
						return 'certo';
					}
					
				}

			}else{
				return $tipo_retorno;
			}

		}else{
			return $tipo_retorno;
		}





	}

}