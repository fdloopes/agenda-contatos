<?php 
	include("header.php");
	include("conecta.php");
 	include("banco-agenda.php");

	// Recebe contato do formulario
	$dados = array();
	$dados = $_POST;

		// Chama função insere produto e verifica se foi adicionado com sucesso
		if(alteraContato($conexao,$dados)){
			if(alteraTelefoneMail($conexao,$dados)){
		?>		
			<p class="text-success">
				Contato <?= $dados['nome']; ?>, <?= $dados['sobrenome']; ?> adicionado com sucesso!
			</p>
		<?php 
			} } else {
		?>
			<p class="text-danger">
				O Contato <?= $dados['nome']; ?> não foi adicionado: <?= mysqli_error($conexao);?>
			</p>
		<?php
		}
		?>

<?php include("footer.php");?>