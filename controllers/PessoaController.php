<?php

	include_once '../global.php';

	class CursoController {

		public static function index() {
			echo "<script>window.location='../views/pessoaIndex.php'</script>";
		}

		public static function rotas() {

			// echo "<script>alert('cadastrar')</script>";
			$dados = explode("/", $_POST['acao']);

            if(strcmp($dados[0], "cadastrar") == 0) {
				self::create();
            }
			else if(strcmp($dados[0], "alterar") == 0) {
				self::edit($dados[1]);
			}
			else if(strcmp($dados[0], "remover") == 0) {
				self::destroy($dados[1]);
			}
		}

		public static function create() {
            echo "<script>window.location='../views/pessoaCreate.php'</script>";
        }

		public static function store() {

			$data = array(
				"nome" => $_POST["nome"],
				"endereco" => $_POST["endereco"],
				"telefone" => $_POST["telefone"]
			);

			Curso::create($data);
			echo "<script>window.location='../views/pessoaIndex.php'</script>";
		}

		public static function edit($id) {

			$pessoa = Pessoa::find($id);

			if(!empty($curso)) {

				$url = "../views/pessoaEdit.php?id=$pessoa->cpf";
                $url .= "&nome=$curso->nome";
                $url .= "&sigla=$endereco->endereco";
                $url .= "&tempo=$telefone->telefone";

				echo "<script>window.location='". $url ."'</script>";
			}
		}

		public static function update() {
			
			$data = array(
				"nome" => $_POST["nome"],
				"endereco" => $_POST["endereco"],
				"telefone" => $_POST["telefone"]
			);

			Curso::update($_POST["cpf"], $data);
			echo "<script>window.location='../views/pessoaIndex.php'</script>";
		}

		public static function destroy() {

			echo "<script>window.location='../views/pessoaIndex.php'</script>";
		}

		public static function loadTable() {

			// echo "<script>alert('PessoaController::loadTable()')</script>";
			$data = Pessoa::all("ORDER BY nome");

			while($row = $data->fetchObject()) {

				echo "<tr>";
					echo "<td class='d-none d-md-table-cell'>".$row->cpf."</td>";
					echo "<td>".$row->nome."</td>";
					echo "<td class='d-none d-md-table-cell'>".$row->endereco."</td>";
					echo "<td class='d-none d-md-table-cell'>".$row->telefone."</td>";
					echo "<td>";
						echo "<button type='submit' name='acao' value='alterar/".$cpf."' class='btn btn-success'>";
							echo "<svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-pencil-fill' viewBox='0 0 16 16'>";
								echo "<path d='M12.854.146a.5.5 0 0 0-.707 0L10.5 1.793 14.207 5.5l1.647-1.646a.5.5 0 0 0 0-.708l-3-3zm.646 6.061L9.793 2.5 3.293 9H3.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.207l6.5-6.5zm-7.468 7.468A.5.5 0 0 1 6 13.5V13h-.5a.5.5 0 0 1-.5-.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.5-.5V10h-.5a.499.499 0 0 1-.175-.032l-.179.178a.5.5 0 0 0-.11.168l-2 5a.5.5 0 0 0 .65.65l5-2a.5.5 0 0 0 .168-.11l.178-.178z'/>";
							echo "</svg>";
						echo "</button>";
						echo "</button>";
						echo "&nbsp";
						echo "<button type='submit' name='acao' value='remover/".$cpf."' class='btn btn-danger'>";
							echo "<svg xmlns='http://www.w3.org/2000/svg' width='18' height='18' fill='#FFF' class='bi bi-trash-fill' viewBox='0 0 16 16'>";
								echo "<path d='M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1H2.5zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5zM8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5zm3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0z'/>";
							echo "</svg>";
						echo "</button>";
					echo "</td>";
				echo "</tr>";
    		}
		}

	}
?>
