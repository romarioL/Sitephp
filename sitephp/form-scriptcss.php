<?php
include 'connect.php';
session_start();
$login = $_SESSION['login'];
$senha_log  = $_SESSION['password'];
$sql = mysqli_query($link, "SELECT * FROM tb_user WHERE email = '$login'");
while($line = mysqli_fetch_array($sql)) {
  $senha = $line['senha'];
  $nivel = $line['nivel'];
  $foto = $line['foto'];
  $id = $line['id_user'];
}

if($senha_log == $senha && $nivel == 1){

}else {
  header('location: index.php');
}
?>

<html>
   <head>
     <title>Site em PHP</title>
     <link rel="stylesheet" href="css/formato.css">
   </head>
   <body>
    <div id="form-box">
      <h1 class="titulos" style="margin-left: 10%;">Postagens
    </h1>
       <form action="postar-scriptcss.php" method="post" enctype="multipart/form-data">
         <input type ="text" name="titulo" class="campos-cad" placeholder="Digite  um título!">
         <input type ="file" name="foto" class="campos-cad">
         <textarea name="conteudo" class="campos-cad" placeholder="Digite o texto da sua postagem!"style="height: 200px;" maxlength="300"></textarea>
       <div id="botoes">
           <input type ="submit" value="Postar" class="bt-cad">
           <input type ="reset" value="Limpar" class="bt-cad">
         </div>
       </form>
       <div class="botoes">
         <a href="index.php" class="form-link">&larr; Voltar para a página inicial  </a>  <a href="form-postar.php" class="form-link" style="margin-left: 20px;">   Postagens &rarr;</a>
      </div>
   </div>
   </body>
</html>
