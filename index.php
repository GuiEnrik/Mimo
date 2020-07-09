<?php
include ("engine.php");
?>
<!DOCTYPE html>
<html>
<head>
<title>MiMo</title>
<link rel="shortcut icon" href="source/favicon.ico">
<!-- Add jQuery library -->
<script type="text/javascript" src="lib/jquery-1.10.1.min.js"></script>

<!-- Add fancyBox main JS and CSS files -->
<script type="text/javascript" src="source/jquery.fancybox.js?v=2.1.5"></script>
<link rel="stylesheet" type="text/css" href="source/jquery.fancybox.css?v=2.1.5" media="screen" />


<script type="text/javascript">
	$(document).ready(function() {
		$(".various").fancybox({
			maxWidth	: 800,
			maxHeight	: 600,
			fitToView	: false,
			width		: '100%',
			height		: '100%',
			autoSize	: false,
			closeClick	: false,
			openEffect	: 'none',
			closeEffect	: 'none'
		});
	});
</script>
<link rel="stylesheet" type="text/css" href="source/style.css">
</head>
<body>
<div id="site">
	<div id="topo">
	</div>
	<div id="breadcrumbs"><!--<?php echo $_SESSION['local'] ?>--></div>
	
	<div id="container">
	
	<?php
	//Define icone de arquivos
	if(strpos($_SESSION['local'],"jogos") > 0){
		$icon = 'game.png';
	}else if(strpos($_SESSION['local'],"livros") > 0){
		$icon = 'book.png';
	}else if(strpos($_SESSION['local'],"musicas") > 0){
		$icon = 'music.png';
	}else{
		$icon = 'file.png';
	}
	
	// lista as pastas se houverem
	if (isset($pastas)) { 
	foreach($pastas as $listar){
		if($listar != "source" && $listar != "lib")
	   print '<a class="itens" href="?local='.str_replace($raiz,"",$_SESSION['local'])."\\".$listar.'"><img class="icons" src="source/mimo_icons/folder.png"/><br>'.$listar.'</a>';}
	   }
	   
	// lista os arquivos se houverem
	if (isset($arquivos)) {
	foreach($arquivos as $listar){
		if($listar != "index.php" && $listar != "engine.php")
	   print '<a class="various itens"data-fancybox-type="iframe" rel="gallery1" href="'.str_replace($raiz."\\","",$_SESSION['local'])."/".$listar.'"><img class="icons" src="source/mimo_icons/'.$icon.'"/><br>'.substr($listar, 0, -4).'</a>';}
	   }
	?>
	</div>
	<div id="rodape">
	<p style="top:10px"><strong>Laboratório de Informática - Escola Classe 01 INCRA 08</strong></p>
	<p style="top:50px">Desenvolvedor: Prof. Guilherme Henrique ( <a href="mailto:ghsouza@ymail.com">ghsouza@ymail.com</a> )</p>
	</div>
</div>
</body>
</html>