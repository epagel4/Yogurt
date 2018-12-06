<?php
error_reporting(1);
include('../conexao.php');
if ($_GET["acao"] == "like") {
  session_start();
  $userId=$_SESSION['id'];
	$id_post = $_GET["postagem"];
	$sql_seleciona_se_ja_teve_curtida = "SELECT * 
			FROM curtida
			WHERE id_usuario = '$userId'
			AND id_post = '$id_post'";

	$sql_query_count = "SELECT COUNT(id) AS qtd_likes FROM curtida WHERE id_post = '$id_post'";


	$retorno = $con->query($sql_seleciona_se_ja_teve_curtida);
	if ($retorno == false) {
		$data = array("status"=>false, "msg"=>$con->error);
		//echo json_encode($data);
		//exit;
		header("Location: home.php");
	}

	if ( $registro = $retorno->fetch_array() ) {
		$curtida_id = $registro['id'];

		$sql_query_delete = "DELETE FROM curtida WHERE id = '$curtida_id'";
		$con->query($sql_query_delete);
		$retorno = $con->query($sql_query_count);
		$registro = $retorno->fetch_array();

		$qtd_likes = $registro["qtd_likes"];
		$data = array("status"=>true, "curtido"=>false, "curtidas_contador"=>$qtd_likes);
		//echo json_encode($data);
		//exit;
		header("Location: home.php");
	}

	$sql_insert_curtida = "INSERT INTO curtida (id_usuario, id_post ) VALUES ('$userId', '$id_post')";
	$retorno = $con->query($sql_insert_curtida);
	if ($retorno == true) {
		$retorno = $con->query($sql_query_count);
		$registro = $retorno->fetch_array();
		$qtd_likes = $registro["qtd_likes"];

		$data = array("status"=>true, "curtido"=>true, "curtidas_contador"=>$qtd_likes);
	} else {
		$data = array("status"=>false, "msg"=>"Erro ao curtir! " . $sql_insert_curtida);
	}



}
if ($_GET["acao"] == "listLikes") {
	$id_post = $_GET["postagem"];
	$sql_seleciona_todas_curtidas = "SELECT * 
	FROM curtida
	inner join usuario on  usuario.id =curtida.id_usuario
	where id_post = $id_post";
	$retorno = $con->query($sql_seleciona_todas_curtidas);
	if ($retorno) {
		$curtidas = array();
		while ($registro = $retorno->fetch_array()) {
			$array_registro = array(
				"avatar"=>$registro['avatar'],
				"nome"=>$registro['nome'],
				"id"=>$registro['id_usuario'],
			);
			array_push($curtidas, $array_registro);
		}
		$data = $curtidas;
	}
}
//echo json_encode($data);
header("Location: home.php");
?>
