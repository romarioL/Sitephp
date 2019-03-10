<?php

include 'connect.php';
session_start();
$login = $_SESSION['login'];
$senha_log  = $_SESSION['password'];
$sql = mysqli_query($link, "SELECT * FROM tb_user WHERE email = '$login'");
while($line = mysqli_fetch_array($sql)) {
  $senha = $line['senha'];
  $nivel = $line['nivel'];
  $id_user = $line['id_user'];
}

if($senha_log == $senha && $nivel == 1){

  date_default_timezone_set('America/sao_paulo');


    $titulo = $_POST['titulo'];
    $foto = $_FILES['foto']['name'];
    $tipo = $_FILES['foto']['type'];
    $conteudo = $_POST['conteudo'];

    $foto = str_replace(" ", "-", $foto);
    $foto = str_replace("â", "a", $foto);
    $foto = str_replace("é", "e", $foto);
    $foto = str_replace("ç", "c", $foto);

    $registro = false;

    if(!empty($titulo) && !empty($foto) && !empty($conteudo)) {
       $registro = true;
    }else {
      echo "<script>window.history.go(-1);</script>";
    }

    $sql = mysqli_query($link, "SELECT * FROM tb_postagens ORDER BY id_post DESC LIMIT 1");

    while($line = mysqli_fetch_array($sql)) {
      @$id = $line['id_post'];
    }




  if($registro == true) {
    @$id = $id +1;

    //echo $id;

    $pasta = "postagens/post$id";



  //  echo $pasta;

  if(file_exists($pasta)) {
    //echo "Pasta já existe";
  }else {
    mkdir($pasta, 0777);
  }

  $data = date('Y-m-d');
  $hr = date('H:i:s');
  $page = 1;



    mysqli_query($link, "INSERT INTO tb_postagens(titulo, imagem, texto, data, hr, page, id_user) VALUES('$titulo', '$foto', '$conteudo', '$data', '$hr', '$page', '$id_user') ");


    move_uploaded_file($_FILES['foto']['tmp_name'], $pasta."/".$foto);

   header('location: form-postar.php');

}else {
  echo "Não foi possível fazer o cadastro";
  echo "<a href='form-postar.php'>Voltar</a>";
}


}else {
  header('location: index.php');
}


 ?>
