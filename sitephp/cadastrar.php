<?php
// incluindo  o arquivo connect

date_default_timezone_set('America/sao_paulo');

include "connect.php";

//

$nome = $_POST['nome'];
$email = $_POST['email'];
$senha = $_POST['senha'];
$resenha = $_POST['repetesenha'];
$lembrete = $_POST['lembrete'];
$foto =  $_FILES['foto']['name'];
$tipo = $_FILES['foto']['type'];



$registro = false;

 if(!empty($nome) && !empty($email) && !empty($senha) && !empty($lembrete)  && !empty($foto)) {
          if($senha != $resenha) {
            echo "<script>alert('Senhas  não correspondem'); window.history.go(-1);</script>";
          }else {
            $registro = true;
          }
}else {
           echo "<script>alert('Preencha todos os campos'); window.history.go(-1);</script>";

}


$sql = mysqli_query($link, "SELECT * from tb_user order by id_user desc limit 1 ");

while($line = mysqli_fetch_array($sql)) {
  $id = $line['id_user'];
  $email_user = $line['email'];
}

@$id = $id+1;

$pasta = "user". $id;

if(file_exists("user/".$pasta)) {
  // echo "<script>alert('Arquivo já existe!');</script>";
}else {
  mkdir("user/". $pasta, 0777);
  // echo "<script>alert('A pasta ".$pasta." foi criada com sucesso!');</script>";
}

$formatos = array(1=>'image/png', 2=>'image/jpg', 3=>'image/jpeg', 4=>'image/gif');


$foto = str_replace(" ", "-", $foto);
$foto = str_replace("â", "a", $foto);
$foto = str_replace("é", "e", $foto);
$foto = str_replace("ç", "c", $foto);

$foto = strtolower($foto);


$teste = array_search($tipo, $formatos);

if($teste == true) {
  move_uploaded_file($_FILES['foto']['tmp_name'], "user/".$pasta."/".$foto);
}else {
  echo "<script>alert('Formato não permitido');</script>";
}

$data = date('Y-m-d');
$hr = date('H:i:s');

if(@$registro == true  && $email != $email_user) {
  mysqli_query($link, "INSERT INTO tb_user(nome, email, senha, lembrete, foto, nivel, data, hr ) VALUES ('$nome', '$email', '$senha', '$lembrete', '$foto', 2, '$data', '$hr' )");
  echo "<p  style='text-align: center; color:#333; padding: 5px; '> Usuário cadastrado  com sucesso!<br>";
  echo "<a href='index.php' style='color: #59f;''>Volte para a página principal!</a> | <a href='login.php' style='color: #59f;'>Clique para logar!</a>";
  echo "</p>";
}else {
 echo " <script>window.history.go(-1);</script>";
}



   ?>
