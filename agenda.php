<?php 
	include("header.php");
    include("conecta.php");
    include("banco-agenda.php");

    $empresas = listaEmpresas($conexao);
    $contatos = listaContatos($conexao);	
?>

<!-- Tabela de Contatos -->
<table class="table table-striped table-bordered">
	<h1>Contatos</h1>
	<tr>
		<td>Nome</td>
		<td>Sobrenome</td>
		<td>Endereço</td>
		<td>CEP</td>
		<td>Bairro</td>
		<td>Cidade</td>
		<td>Email</td>
		<td>Telefone</td>
		<td>Empresa</td>
		<td>Alterar</td>
		<td>Remover</td>
	</tr>
	<?php
		foreach ($contatos as $contato) :
	?>
	<tr>
		<td><?= $contato['nome'];?></td>
		<td><?= $contato['sobrenome']?></td>
		<td><?= $contato['endereco']?></td>
		<td><?= $contato['cep']?></td>
		<td><?= $contato['bairro']?></td>
		<td><?= $contato['cidade']?></td>
		<td><?= buscaEmail($conexao,$contato['id']);?></td>
		<td><?= buscaTelefone($conexao,$contato['id']);?></td>
		<td><?= nome_empresa($conexao,$contato['id_empresa']);?></td>
		<td><a class="btn btn-warning" href="altera-contato.php?id=<?=$contato['id'];?>">Alterar</a></td>
		<td><a class="btn btn-danger" href="remover-contato.php?id=<?=$contato['id'];?>">Remover</a></td>
	</tr>

	<?php
  		endforeach
	?>
</table>

<!-- Tabela de empresas
<table class="table table-striped table-bordered">
	<h1>Empresas</h1>
	<tr>
		<td>Nome</td>
		<td>Telefone</td>
	</tr>
	<?php
		foreach ($empresas as $empresa) :
	?>
	<tr>
		<td><?= $empresa['nome'];?></td>
		<td><?= $empresa['telefone']?></td>
	</tr>

	<?php
  		endforeach
	?>
</table>-->

<?php include("footer.php");?>