<?php
session_start();
require '../conexao.php';
require '../Classes/Usuario.php';
require '../Classes/Midia.php';
require '../Classes/Post.php';

?>

<!doctype html>
<html lang="pt-br">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.2.0/css/all.css" integrity="sha384-hWVjflwFxL6sNzntih27bfxkr27PmbbK/iSvJ+a4+0owXq79v+lsFkW54bOGbiDQ" crossorigin="anonymous">
    <title>Yogurt - <?php echo $_SESSION['nome']?></title>
    <link rel="icon" href="../img/logo1.png">
  </head>

  <body class="bg-dark" style="background-image: url(../img/users/bg<?php echo $_SESSION['id']?>.jpg); background-size:cover; background-attachment: fixed;">
  			
<?php 	include '../modulos/nav.php';
				$postagens = new Post;
				$galeria = new Midia;
				$segue = new Usuario;
				$post = $postagens->getYourPosts($pdo, $_SESSION['id']);
				$fotos = $galeria->getGaleria($pdo, $_SESSION['id']);
				$seguindo = $segue->getSeguindo($pdo, $_SESSION['id']);
				$seguidores = $segue->getSeguidores($pdo, $_SESSION['id']);
				$solic = $segue->getSolicitacoes($pdo, $_SESSION['id']);
				 ?>

	<div class="col-2 bg-light mt-5 position-fixed ml-5" style="border-radius: 15px;">
			
		<div class="row mt-2">
			<div class="col text-center">
				<a class="p-0 m-0 pr-2" href="meuperfil.php"><img class="img rounded-circle" style="height: 150px; width: 150px; object-fit: cover;" src="../img/users/profile<?php if ($_SESSION['profile']){ echo $_SESSION['id']; } else { echo "0";}?>.jpg"></a>
			</div>	
		</div>

		<div class="row mt-2 text-center">
			<div class="col">
				<h4> <?php echo $_SESSION['nome'] ?> </h4>
			</div>
		</div>

		<div class="row text-center">
			<div class="col">
				<p class="text-muted"> <i class="fas fa-at"></i><?php echo $_SESSION['login'] ?> </p>
			</div>
		</div>

		<div class="row text-center">
			<div class="col">
				<p class="text-muted"><?php echo $_SESSION['bio'] ?> </p>
			</div>
		</div>

		<div class="mb-2">
		<ul class="list-group">
		  <a href='../meu_perfil/meuperfil.php' style="font-size: 13px;" class="list-group-item d-flex justify-content-between align-items-center list-group-item-action active">
		    Posts
		    <span class="badge badge-danger badge-pill"><?php echo count($post) ?></span>
		  </a>
		  <a href='../meu_perfil/seguindo.php' style="font-size: 13px;" class="list-group-item d-flex justify-content-between align-items-center list-group-item-action">
		    Seguindo
		    <span class="badge badge-danger badge-pill"><?php echo count($seguindo) ?></span>
		  </a>
		  <a href='../meu_perfil/seguidores.php' style="font-size: 13px;" class="list-group-item d-flex justify-content-between align-items-center list-group-item-action">
		    Seguidores
		    <span class="badge badge-danger badge-pill"><?php echo count($seguidores); if ($solic){echo "*";} ?></span>
		  </a>
		  <a href='../meu_perfil/minhasfotos.php' style="font-size: 13px;" class="list-group-item d-flex justify-content-between align-items-center list-group-item-action">
		    Fotos
		    <span class="badge badge-danger badge-pill"><?php echo count($fotos) ?></span>
		  </a>
		</ul>
		</div>

	</div>


<div class="container mt-5 justify-content-center bg-light col-xl-6 mb-5" style="border-radius: 10px;">
				<div class="row">
					<h3 class="m-3 col-6">Suas Postagens:</h3>
					<h3 class="text-primary ml-auto text-right m-3 col-3"><a href="../meu_perfil/meuperfil.php"><i class="fas fa-sync-alt fa-2x"></i></a></h3>
				</div>

				<?php
				if($post){
					$i = 0;
					while ($i < count($post)) {
				
				?>


				<!-- post -->
			<div class="row p-0 m-0 justify-content-center mb-3">
			<div class="col p-0 m-0 bg-light border-top border-bottom" style="border-radius: 25px;">
				<div class="row mt-2" style=" vertical-align: middle;">
					<div class="col-2 text-right">
						<img class="img-fluid rounded-circle" style="height: 60px; width: 60px; object-fit: cover;" src="../img/users/profile<?php if ($_SESSION['profile']){ echo $_SESSION['id']; } else { echo "0";}?>.jpg">
					</div>
					<div class="col-6 align-middle">
						<h5 class="m-0 pt-2"><?php echo $post[$i]['nome_user']; ?></h5>
						<p class="m-0 text-muted">@<?php echo $post[$i]['login_user']; ?></p>
					</div>
					<div class="col-2">
						<p class="text-muted m-0 text-right"><?php $date = date_create($post[$i]['data']); echo date_format($date, 'd/m/Y'); ?></p>
						<p class="text-muted m-0 text-right"><?php echo date_format($date, 'H:i'); ?></p>
					</div>
				</div>
				<div class="row justify-content-center mt-4">
					<div class="col-8 jumbotron">
						<spam><?php echo $post[$i]['post']; ?></spam>
					</div> 
				</div>
				<div class="row justify-content-center">
					<div class="col-10">
						<h5 class=""><a href="../home/curtida.php"><i class="far fa-heart text-muted"></i></a> <a href=""></a><a href="../home/removePost.php?id=<?php echo $post[$i]['id']; ?>" ><i class="fas fa-times text-muted float-right"></i></a></h5>
					</div>
				</div>
			</div>
			</div>
				<!-- fim post -->

		
			<?php $i++;
		}
		}
		else { ?>
			<div class="row m-2 justify-content-center">
			<div class="jumbotron w-100 text-center">
				<h3>Opa, não tem nada por aqui ainda. Diga alguma coisa:</h3>
				<div class="row justify-content-center">
					<div class="col-8 mt-5">
	                    <form action="../home/postar.php" method="post">
	                        <div class="input-group">
							  <textarea class="form-control" id="post" name="post" aria-describedby="post" placeholder="Escreva aqui!" style="border-radius: 25px" rows="3" maxlength="140" required></textarea>
							</div>
	                        <div class="row justify-content-center mt-3">
	                        <button type="submit" class="btn btn-primary" style="border-radius: 25px">Postar</button>
	                        </div>
	                    </form>
	                </div>
				</div>
			</div>
			</div>









		<?php } ?>

	</div>

			<div class="modal fade" id="modal3" tabindex="-1" role="dialog" aria-labelledby="modal3" aria-hidden="true">
			    <div class="modal-dialog" role="document">
			        <div class="modal-content">
			            <div class="modal-header">
			                <h5 class="modal-title" id="exampleModalLabel">Olá, diga alguma coisa para o mundo:</h5>
			                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
			                    <span aria-hidden="true">&times;</span>
			                </button>
			            </div>
			            <div class="modal-body">
			                <div class="col">
			                    <form action="../home/postar.php" method="post">
			                        <div class="input-group">
									  <textarea class="form-control" id="post" name="post" aria-describedby="post" placeholder="Escreva aqui!" style="border-radius: 25px" rows="3" maxlength="140" required></textarea>
									</div>
			                        <div class="row justify-content-center mt-2">
			                        <button type="submit" class="btn btn-primary" style="border-radius: 25px">Postar</button>
			                        </div>
			                    </form>
			                </div>
			            </div>
			        </div>
			    </div>
			  </div>








    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
  </body>
</html>