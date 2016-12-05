<?php include("header.php");
	  include("conecta.php");
	  include("banco-agenda.php");
	  $empresas = listaEmpresas($conexao);
?>

	<form action="adiciona-contato.php" method="post">
		<table class="table">
			<h1> Cadastro de Contato</h1>
			<tr>
				<td>Nome:</td> 
				<td><input class="form-control" type="text" name="nome" /></td>
			
			</tr>
			<tr>
				<td>Sobrenome:</td> 
				<td><input class="form-control" type="text" name="sobrenome" /></td>

			</tr>
			<tr>
				<td>Endereço:</td> 
				<td><input class="form-control" type="text" name="endereco" /></td>
			
			</tr>
			<tr>
				<td>Cep:</td> 
				<td><input class="form-control" type="text" name="cep" /></td>
			
			</tr>
			<tr>
				<td>Bairro:</td> 
				<td><input class="form-control" type="text" name="bairro" /></td>
			
			</tr>
			<tr>
				<td>Cidade:</td> 
				<td><input class="form-control" type="text" name="cidade" /></td>
			
			</tr>
			<tr>
				<td>Email:</td> 
				<td><input class="form-control" type="email" name="email" placeholder="exemplo@mail.com" /></td>
			
			</tr>
			<tr>
				<td>Telefone:</td> 
				<td>
					<input class="form-control" type="text" name="telefone" />
				</td>
			
			</tr>
			<tr>
				<td>Empresa: </td>
				<td>
				<select name="empresa">
				 	<?php
						foreach ($empresas as $empresa) :
					?>
				    
				    <option class="form-control" value="<?= $empresa['nome'];?>"><?= $empresa['nome']; ?></option>
					
					<?php
  						endforeach
					?>
				</select>
				</td>
			</tr>
			<tr>
				<td><input class="btn btn-primary" type="submit" name="enviar" value="Cadastrar" /></td>
			</tr>
		</table>
	</form>
<?php include("footer.php");?>