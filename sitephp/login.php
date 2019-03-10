<html>
   <head>
     <title>Site em PHP</title>
     <link rel="stylesheet" href="css/formato.css">
   </head>
   <body>
    <div id="form-box">
      <h1 class="titulos" style="margin-left: 10%;">Login
      <?php
      @$valor = $_GET['valor'];
      if($valor){
        echo "--<span style='color: red;'> Todos os campos devem ser preenchidos</span>";
      }
      ?>
    </h1>
       <form action="logar.php" method="post" enctype="multipart/form-data">
         <input type ="email" name="email" class="campos-cad" placeholder="Email">
         <input type ="password" name="senha" class="campos-cad" placeholder="Senha">
       <div id="botoes">
           <input type ="submit" value="Logar" class="bt-cad">
           <input type ="reset" value="Limpar" class="bt-cad">
         </div>
       </form>
       <div class="botoes">
         <a href="index.php" class="form-link">&larr; Voltar para a página inicial</a>
         <p class="p-form">Ainda não  possui cadastro? Clique no link abaixo!</p>
         <a href="cadastro.php" class="form-link">Cadastro</a>
      </div>
   </div>
   </body>
</html>
