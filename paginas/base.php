<!doctype html>
<html lang="en">
  <head>
  	<title>
		<?=$title?? "SGD"?>
	</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900" rel="stylesheet">
		
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
		<link rel="stylesheet" href="../sidebar/css/style.css">
  </head>
  <body>
		
		<div class="wrapper d-flex align-items-stretch">
			<nav id="sidebar">
				<div class="custom-menu">
					<button type="button" id="sidebarCollapse" class="btn btn-primary">
	          <i class="fa fa-bars"></i>
	          <span class="sr-only">Toggle Menu</span>
	        </button>
        </div>
				<div class="p-4">
		  		<h1><a href="index.html" class="logo">Sistema de Gestão de docentes <span>Silva Madalena e Filhos</span></a></h1>
	        <ul class="list-unstyled components mb-5">
	          <li class="active">
	            <a href="index.php"><span class="fa fa-home mr-3"></span> Início</a>
	          </li>
	          <li>
	              <a href="disciplinas_ver.php"><span class="fa fa-user mr-3"></span> Disciplinas</a>
	          </li>
	          <li>
	              <a href="turmas_ver.php"><span class="fa fa-user mr-3"></span> Turmas</a>
	          </li>
	          <li>
              <a href="#"><span class="fa fa-briefcase mr-3"></span> Outros</a>
	          </li>
	          <li>
              <a href="#"><span class="fa fa-cogs mr-3"></span> Definições</a>
	          </li>
	        </ul>

	        <div class="mb-5">
						
			</div>

	        <div class="footer">
	        	<p class="text-center">
					&copy; Jorge Calueio
				</p>
	        </div>

	      </div>
    	</nav>

        <!-- Page Content  -->
      <div id="content" class="p-4 p-md-5 pt-5">
        <?= $conteudo?? ""?>
      </div>
		</div>

    <script src="../sidebar/js/jquery.min.js"></script>
    <script src="../sidebar/js/popper.js"></script>
    <script src="../sidebar/js/bootstrap.min.js"></script>
    <script src="../sidebar/js/main.js"></script>
  </body>
</html>