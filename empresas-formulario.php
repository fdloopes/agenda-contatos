<?php include("header.php");?>

	<form action="adiciona-empresa.php" method="post">
		<table class="table">
			<h1> Cadastro de Empresa</h1>
			<tr>
				<td>Nome:</td> 
				<td><input class="form-control" type="text" name="nome" /></td>
			
			</tr>
			<tr>
				<td>Telefone:</td> 
				<td><input class="form-control" type="text" name="telefone" /></td>

			</tr>
			<tr>
				<td><input class="btn btn-primary" type="submit" name="enviar" value="Cadastrar" /></td>
			</tr>
		</table>
	</form>
<?php include("footer.php");?>