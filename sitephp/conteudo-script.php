<div id="conteudo-principal">
  <h1 class="titulos"> Página  de Scripts CSS </h1>
  <?php
  include "connect.php";

  $sql = mysqli_query($link, "SELECT * FROM tb_postagens WHERE page = 2 ORDER BY id_post DESC;");

  while($line = mysqli_fetch_array($sql)) {
     $id = $line['id_post'];
     $titulo = $line['titulo'];
     $imagem = $line['imagem'];
     $conteudo = $line['texto'];
     $data = $line['data'];
     $hora = $line['hr'];

  ?>
  <div class="postagens">
    <h1 class="titulos"><?php  echo $titulo; ?></h1>
    <img src="postagens/<?php echo "post".$id."/".$imagem; ?>" class="imagens">
    <p class="paragrafos"><?php  echo $conteudo; ?> </p>
    <span class="datas"><?php echo date('d/m/Y', strtotime($data)); echo "<br>".date('H:i', strtotime($hora));?></span>
  </div>
<?php
}
 ?>
</div>
<div id="recentes">
  <h1 class="titulos">Recentes</h1>
  <div class="postagens-recentes">
    <?php
    $contar = 0;
    $sql = mysqli_query($link, "SELECT * FROM tb_postagens WHERE page = 2 ORDER BY id_post DESC;");
    while($line = mysqli_fetch_array($sql) and $contar < 5) {
       $titulo = $line['titulo'];
       $data = $line['data'];
       $contar ++;
     ?>
    <h1 class="titulos"><a href="#"><?php echo $titulo; ?></a></h1>
    <span class="datas"><?php echo date('d/m/Y', strtotime($data)); ?></span>
  <?php  } ?>
  </div>
</div>
