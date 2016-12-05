
<?php 

	// Função de inserção de empresa
	function insereEmpresa($conexao,$dados){
		$query = "insert into empresas (nome, telefone) values('{$dados['nome']}','{$dados['telefone']}')";

		return mysqli_query($conexao, $query);
	}

	// Função de inserção de contatos
	function insereContato($conexao,$dados){
		$id_empresa = id_empresa($conexao,$dados['empresa']);

		$query_contato = "insert into contatos (nome, sobrenome,endereco,cep,bairro,cidade,id_empresa) values('{$dados['nome']}','{$dados['sobrenome']}','{$dados['endereco']}','{$dados['cep']}','{$dados['bairro']}','{$dados['cidade']}','{$id_empresa}')";

		return mysqli_query($conexao, $query_contato);
	}
	
	// Função de inserção de emails e telefones
	function insereTelefoneMail($conexao,$dados){
		$id = ultimo_id($conexao);
		$query_telefone = "insert into telefones (id_contato, label, telefone) values ('{$id}','{$dados['label']}','{$dados['telefone']}')";

		mysqli_query($conexao, $query_telefone);

		$query_email = "insert into emails (id_contato, email) values ('{$id}','{$dados['email']}')";

		 return mysqli_query($conexao, $query_email);
	}

	// Função para listar as empresas cadastradas
	function listaEmpresas($conexao){
 		$empresas = array();
 		$resultado = mysqli_query($conexao,"select * from empresas");
		while($empresa = mysqli_fetch_assoc($resultado)){
			array_push($empresas, $empresa);
		}
		return $empresas;
 	}

 	// Função para listar contatos cadastrados
	function listaContatos($conexao){
 		$contatos = array();
 		$resultado = mysqli_query($conexao,"select * from contatos");
		while($contato = mysqli_fetch_assoc($resultado)){
			array_push($contatos, $contato);
		}
		return $contatos;
 	}

 	// Função para buscar id da empresa pelo nome
 	function id_empresa($conexao,$nome){
		$query = mysqli_query($conexao, "SELECT id FROM empresas WHERE nome = '{$nome}'");
		$array = mysqli_fetch_assoc($query);
		return $array['id'];
	}

	// Função busca email
	function buscaEmail($conexao,$id){
		$query = mysqli_query($conexao, "SELECT email FROM emails WHERE id_contato = '{$id}'");
		$array = mysqli_fetch_assoc($query);
		return $array['email'];
	}

	// Função busca telefone
	function buscaTelefone($conexao,$id){
		$query = mysqli_query($conexao, "SELECT telefone FROM telefones WHERE id_contato = '{$id}'");
		$array = mysqli_fetch_assoc($query);
		return $array['telefone'];
	}

 	// Função para buscar nome da empresa na qual contato é associado
 	function nome_empresa($conexao,$id){
    	$query = mysqli_query($conexao, "SELECT nome FROM empresas WHERE id = '{$id}'");
		$array = mysqli_fetch_assoc($query);
		return $array['nome'];
	}

	// Função que recupera o ultimo id utilizado na tabela contatos
	function ultimo_id($conexao){
		$query = mysqli_query($conexao,"SELECT * FROM contatos ORDER BY id DESC LIMIT 1");
		$array = mysqli_fetch_assoc($query);
		return $array['id'];
	}