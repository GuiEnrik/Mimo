<?php
session_start();

//armazena o diretorio raiz em que está o index
$raiz = getcwd();

if(isset($_GET['local'])){
	chdir(getcwd().$_GET['local']);
}

// pega o endereço do diretório
$diretorio = getcwd(); 

$_SESSION['local'] = $diretorio;
//armazena o local atual no momento

// abre o diretório
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

// checa se o tipo de arquivo encontrado é uma pasta
   		if (is_dir($listar)) { 
// caso VERDADEIRO adiciona o item à variável de pastas
			$pastas[]=$listar; 
		} else{ 
// caso FALSO adiciona o item à variável de arquivos
			$arquivos[]=$listar;
		}
   }
}

?>