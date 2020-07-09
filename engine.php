<?php
session_start();

//armazena o diretorio raiz em que est� o index
$raiz = getcwd();

if(isset($_GET['local'])){
	chdir(getcwd().$_GET['local']);
}

// pega o endere�o do diret�rio
$diretorio = getcwd(); 

$_SESSION['local'] = $diretorio;
//armazena o local atual no momento

// abre o diret�rio
$ponteiro  = opendir($diretorio);
// monta os vetores com os itens encontrados na pasta
while ($nome_itens = readdir($ponteiro)) {
    $itens[] = $nome_itens;
}

// ordena o vetor de itens
sort($itens);
// percorre o vetor para fazer a separacao entre arquivos e pastas 
foreach ($itens as $listar) {
// retira "./" e "../" para que retorne apenas pastas e arquivos
   if ($listar!="." && $listar!=".."){ 

// checa se o tipo de arquivo encontrado � uma pasta
   		if (is_dir($listar)) { 
// caso VERDADEIRO adiciona o item � vari�vel de pastas
			$pastas[]=$listar; 
		} else{ 
// caso FALSO adiciona o item � vari�vel de arquivos
			$arquivos[]=$listar;
		}
   }
}

?>