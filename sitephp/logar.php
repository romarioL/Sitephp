<?php
include "connect.php";


$email = $_POST['email'];
$senha = $_POST['senha'];

if(!empty($email) && !empty($senha)) {
//  echo "Usuário está logado";

$sql =  mysqli_query($link, "SELECT * FROM tb_user WHERE email = '$email'");
$registro = mysqli_num_rows($sql);

while($line =  mysqli_fetch_array($sql)){
  $senha_user = $line['senha'];
  $nivel = $line['nivel'];
}
if($registro) {
  if($senha_user == $senha) {
    session_start();
    $_SESSION['login'] = $email;
    $_SESSION['password'] = $senha;
    if($nivel == 1) {
      header('location: adm.php');
    }else {
      header('location: cliente.php');
    }
  }else{
    echo "Email ou senha incorretos. Não possui cadastro?";
    echo " <a href='cadastro.php'>Cadastre-se</a>";
  }
}else{
  echo "Você não possui cadastro. Deseja se cadastrar?";
  echo " <a href='cadastro.php'>Cadastre-se</a>";
}

}else {
  header('location: login.php?valor=1');
}
 ?>
