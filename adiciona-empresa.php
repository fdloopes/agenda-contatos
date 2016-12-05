<?php 
	include("header.php");
	include("conecta.php");
 	include("banco-agenda.php");

	// Recebe os dados da empresa do formulario passados
	$dados = array();
	$dados = $_POST;  

		// Chama função insereEmpresa e verifica se foi adicionado com sucesso
		if(insereEmpresa($conexao,$dados)){
		?>		
			<p class="text-success">
				Empresa <?= $dados['nome']; ?>, <?= $dados['telefone']; ?> adicionada com sucesso!
			</p>
		<?php 
			} else {
		?>
			<p class="text-danger">
				A Empresa <?= $dados['nome']; ?> não foi adicionada: <?= mysqli_error($conexao);?>
			</p>
		<?php
		}
		?>

<?php include("footer.php");?>