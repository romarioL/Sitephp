<img src="images/starfleet.svg" class="logo">
<?php
include "connect.php";
session_start();
@$email = $_SESSION['login'];
@$sql = mysqli_query($link, "SELECT * FROM tb_user WHERE email = '$email'");

while($line = mysqli_fetch_array($sql)) {
  $nivel = $line['nivel'];
}

if(@$nivel == 1) {
  echo  " <a href='logout.php' class='links-top'>Logout</a> ";
  echo   "<a href='adm.php' class='links-top'>Administrador</a>";

}else if(@$nivel == "" ){
  echo   "<a href='login.php' class='links-top'>Login</a> ";
  echo   "<a href='cadastro.php' class='links-top'>Cadastre-se</a>";

}else {
  echo  " <a href='logout.php' class='links-top'>Logout</a> ";
  echo   "<a href='cliente.php' class='links-top'>Área do cliente</a>";
}
 ?>
