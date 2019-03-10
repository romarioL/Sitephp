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
  $nome = $line['nome'];
}

if($senha_log == $senha && $nivel > 1){

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
   <div id="log-box">
        <h1 class="titulos" style="margin-left: 2%;">Usuário logado como: <?php echo $login; ?></h1>
        <h1 class="titulos" style="margin-left: 2%;">Nome  do usuário: <?php echo $nome; ?></h1>
        <a href="index.php" style="margin-left: 2%;">Início</a>
         ||<a href="logout.php" style="margin-left: 2%;">Logout</a>
         <img src="<?php echo "user/user$id/$foto"; ?>" style="float: right; width: 60px; height: auto; margin: -20px 5px 0 0;" >
   </div>
   </body>
</html>
