<?php
require_once('inc/cabecalho.php');

if (isset($_SESSION['id_user'])) {

  $id_ct = $_POST['id_cat'];
  $id_user = $_SESSION['id_user'];
  $title = $_POST['titulo'];
  $conteudo = $_POST['descricao'];


    $sql = "INSERT INTO posts (id_cat,id_user,titulo,conteudo,data) VALUES ( '$id_ct', '$id_user', '$title', '$conteudo', NOW())";
    $result = mysqli_query($conexao , $sql);
    if(mysqli_affected_rows($conexao) > 0){
       $_SESSION['msg'] = 'Success';
       header("Location: postar.php?id_categoria=$id_ct");
    } 
    else{
       $_SESSION['msg'] = 'Erro';
       header("Location: postar.php?id_categoria=$id_ct");
    }
    


// $sql = 'SELECT titulo,conteudo,user,data,usuarios.id_user,posts.id_cat FROM posts,usuarios WHERE posts.id_user=usuarios.id_user AND posts.id_cat='.$id_cat.' ORDER BY data DESC';

// $result = mysqli_query($conexao, $sql);
// $result_array = mysqli_fetch_all($result,MYSQLI_ASSOC);
}
else{
  echo "Acesso Restrito!";
}
?>

<?php
require_once('inc/rodape.php');
