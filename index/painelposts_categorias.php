<?php
require_once('inc/cabecalho.php');
//$id_cat = '1';
// $nm_cat = 'Games';

if (isset($_SESSION['id_user'])) {

$sql = 'SELECT DISTINCT user,categorias.id_cat,categoria FROM posts,usuarios, categorias WHERE posts.id_user=usuarios.id_user AND usuarios.id_user='.$_SESSION['id_user'];
$result = mysqli_query($conexao, $sql);
$result_array = mysqli_fetch_all($result,MYSQLI_ASSOC);


?>

    <!-- Page Content -->
    <div class="container">
          <br>
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="index.php">Home</a></li>
            <li class="breadcrumb-item "><a href="posts.php">Posts</a></li>
            <li class="breadcrumb-item active">Painel Usuário - Categorias</li>
          </ol>

      <div class="row">

        <!-- Blog Entries Column -->
        <div class="col-md-8">
 
          <h1 class="my-4">Painel do Usuário  
            <small>Categorias</small>
          </h1>
          <?php
          foreach($result as $categorias){
            $html = '
              <a type="button" class="btn btn-primary btn-block" href="painelposts_listagem.php?id_ct='.$categorias['id_cat'].'">'.$categorias['categoria'].'</a>
            ';
            echo $html;
          }
          ?>
          <!-- Pagination -->

        </div>


        <!-- Sidebar Widgets Column -->
        <div class="col-md-4">

          <!-- Search Widget -->
          <div class="card my-4">
            <h5 class="card-header">Search</h5>
            <div class="card-body">
              <div class="input-group">
                <input type="text" class="form-control" placeholder="Search for...">
                <span class="input-group-btn">
                  <button class="btn btn-secondary" type="button">Go!</button>
                </span>
              </div>
            </div>
          </div>

          <!-- Categories Widget -->
          <div class="card my-4">
            <h5 class="card-header">Opções do Usuário</h5>
            <div class="card-body">
              <div class="row">
                <div class="col-lg-12">
                  <ul class="list-unstyled mb-0">
                    <li>
                      <p>Escolha uma das categorias</p>
                    </li>
                  </ul>
                </div>
              </div>
            </div>
          </div>

          <!-- Side Widget -->
          <div class="card my-4">
            <h5 class="card-header">Side Widget</h5>
            <div class="card-body">
              You can put anything you want inside of these side widgets. They are easy to use, and feature the new Bootstrap 4 card containers!
            </div>
          </div>

        </div>

      </div>
      <!-- /.row -->

    </div>
    <!-- /.container -->

    <!-- Footer -->
<?php
}
else{
  echo "Acesso Restrito";
}
require_once('inc/rodape.php');
