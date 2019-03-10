<div id="conteudo-principal">
<!--  <div class="postagens">
    <h1 class="titulos">Título da postagem</h1>
    <img src="images/01.jpg" class="imagens">
    <p class="paragrafos">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
    </p>
    <span class="datas">03/04/1996</span>
  </div>
  <div class="postagens">
    <h1 class="titulos">Título da postagem</h1>
    <img src="images/01.jpg" class="imagens">
    <p class="paragrafos">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
    </p>
    <span class="datas">03/04/1996</span>
  </div> -->

  <?php
  include 'connect.php';
  $quantidadeRegistros = 1;
  @$page = $_GET['pag'];
  if(!$page) {
    $pagina = 1;
  }else {
    $pagina = $page;
  }

  $inicio = $pagina - 1;

  $inicio = $inicio * $quantidadeRegistros;

  $selectParcial = mysqli_query($link, "SELECT * FROM tb_postagens LIMIT $inicio, $quantidadeRegistros");
  $selectTotal = mysqli_query($link, "SELECT * FROM tb_postagens ");

  $contar = mysqli_num_rows($selectTotal);

  $contarPages = $contar/$quantidadeRegistros;

  // echo $contarPages;


  while($line = mysqli_fetch_array($selectParcial)) {
    $id = $line['id_post'];
    $titulo = $line['titulo'];
    $imagem = $line['imagem'];
    $conteudo = $line['texto'];
    $data = $line['data'];
?>
<h1 class="titulos"><?php  echo $titulo; ?></h1>
<img src="postagens/<?php echo "post".$id."/".$imagem; ?>" class="imagens">
<p class="paragrafos"><?php  echo $conteudo; ?> </p>
<span class="datas"><?php echo date('d/m/Y', strtotime($data));?></span>
<?php
}


  $anterior = $pagina - 1;
  $proximo = $pagina + 1;

  echo "<br><br>";

  if($pagina > 1) {
    echo "<a href=?pag=$anterior>&larr; Anterior</a>";
  }

  for($i = 1; $i < $contarPages + 1; $i++ ) {
   echo "<a href=?pag=".$i.">".$i."</a>";
  }

  if($pagina < $contarPages) {
    echo "<a href=?pag=$proximo> Próximo &rarr;</a>";
  }
   ?>
</div>
<div id="recentes">
  <h1 class="titulos">Recentes</h1>
  <?php
  $contar = 0;
  $sql = mysqli_query($link, "SELECT * FROM tb_postagens ORDER BY id_post DESC;");
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
