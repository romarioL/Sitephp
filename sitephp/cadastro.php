<html>
   <head>
     <title>Site em PHP</title>
     <link rel="stylesheet" href="css/formato.css">
   </head>
   <body>
    <div id=form-box>
      <h1 class="titulos" style="margin-left: 10%;">Cadastro</h1>
       <form action="cadastrar.php" method="post" enctype="multipart/form-data">
         <input type ="text" name="nome" class="campos-cad" placeholder="Nome">
         <input type ="email" name="email" class="campos-cad" placeholder="Email">
         <input type ="password" name="senha" class="campos-cad" placeholder="Senha">
         <input type ="password" name="repetesenha" class="campos-cad" placeholder="Confirmar senha">
         <input type ="text" name="lembrete" class="campos-cad" placeholder="Lembrete">
         <input type ="file" name="foto" class="campos-cad">
       <div id="botoes">
           <input type ="submit" value="Cadastrar" class="bt-cad">
           <input type ="reset" value="Limpar" class="bt-cad">
         </div>
       </form>
       <div class="botoes">
         <a href="index.php" class="form-link">&larr; Voltar para a página inicial</a>
         <p class="p-form">Já  possui cadastro? Clique em login!</p>
         <a href="login.php" class="form-link">Logar</a>
      </div>
   </div>
   </body>
</html>
