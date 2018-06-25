<?php
require_once('inc/conexao.php');
if (isset($_SESSION['id_user'])){

	$id_post = $_GET['id_post'];
	$id_ct = $_GET['id_ct'];
	


		$sql = 'DELETE FROM posts WHERE id_post='.$id_post;
		echo $sql;
		$result = mysqli_query($conexao,$sql);
		if($result != false){
			if(mysqli_affected_rows($conexao) > 0){
				$_SESSION['msg'] = 'Success';
				header('Location: painelposts_listagem.php?id_ct='.$id_ct);
			}
		}
		else{
	       $_SESSION['msg'] = 'Erro';
	       header('Location: painelposts_listagem.php?id_ct='.$id_ct);
		}	

} else{
		require_once('inc/cabecalho.php');
		?>
		<a href="index.php" class="btn btn-danger btn-md">Voltar</a>
		</br>
		<?php
		die("<h1 class='text-center'>PRODUTO NÃO ENCONTRADO OU USUÁRIO NÃO CADASTRADO!!<h1>");
		require_once('inc/rodape.php');
	}
	
?>

