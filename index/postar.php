<?php
require_once('inc/cabecalho.php');
// $id_cat = '1';
if (isset($_SESSION['id_user'])) {
if (isset($_GET['id_categoria'])) {

$id_ct = $_GET['id_categoria'];
// $_SESSION['id_ct'] = $id_ct;
 }


?>
    <!-- Page Content -->
    <div class="container">
        <br>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.php">Home</a></li>
          <li class="breadcrumb-item "><a href="posts.php">Posts</a></li>
          <li class="breadcrumb-item active">Postar</li>
        </ol>  

      <div class="row">

        <!-- Blog Entries Column -->
        <div class="col-md-8">
          <?php 
          if (isset($_SESSION['msg']) && $_SESSION['msg'] == 'Success') {
            $html = '
            <div class="alert alert-success alert-dismissible fade show">
              <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
              <strong>Obrigado pela colaboração!</strong> Post Enviado com sucesso!
            </div>';
            echo $html;
            unset($_SESSION['msg']);
          }
          if (isset($_SESSION['msg']) && $_SESSION['msg'] == 'Erro') {
            $html = '
            <div class="alert alert-danger alert-dismissible fade show">
              <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
              <strong>Erro ao enviar seu post!</strong> Tente novamente!
            </div>';
            echo $html;
            unset($_SESSION['msg']);
          }
          ?>
 
          <h1 class="my-4">Postagem
          </h1>
          
			<form id="form" method="POST" action="posta.php" >
				<div class="form-group">
     
			   		<input type="Hidden" class="form-control" name="id_cat" value="<?php echo $id_ct ?>">
			  	</div>
           	
			  	<div class="form-group">
			    	<label for="titulo">Título</label>
			    	<input type="text" class="form-control" id="titulo" name="titulo" placeholder="Digite o título do seu post..." autofocus="titulo" required="titulo" onfocus="this.style.backgroundColor='#e2edff'" 
            onblur="this.style.backgroundColor='#fff'">
			  	</div>
			  	<div class="form-group">
			  		<label for="descricao">Conteúdo</label>
        			<textarea class="form-control" name="descricao" rows="8" cols="101" id="descricao" placeholder="Digite seu Post" required="descricao" onfocus="this.style.backgroundColor='#e2edff'" 
            onblur="this.style.backgroundColor='#fff'"></textarea>
        		</div>

			  	<button type="submit" class="btn btn-primary btn-block">Postar</button>
			</form>
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
                  <button class="btn btn-secondary" type="button" value="Postar">Go!</button>
                </span>
              </div>
            </div>
          </div>

          <!-- Categories Widget -->
          <div class="card my-4">
            <h5 class="card-header">Opções do Usuário</h5>
            <div class="card-body">
              <div class="row">
              	<?php
                if (isset($_SESSION['id_user'])) {
                
                $html = '
 
                <div class="col-lg-6">
                  <ul class="list-unstyled mb-0">
                    <li>
                      <a href="painelposts_categorias.php">Painel do Usuário</a>
                    </li>
                  </ul>
                </div>';
                echo $html;
            	}
            	else{
            		echo "Não disponível ao usuário";
            	}
                ?>
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

<?php
}
else{
  echo "Acesso Restrito";
}
require_once('inc/rodape.php');
