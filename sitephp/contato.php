<html>
   <head>
     <title>Site em PHP</title>
     <link rel="stylesheet" href="css/formato.css">
   </head>
   <body>
    <div id="geral">
      <div id="topo">
       <?php include 'topo.php'; ?>
      </div>
      <div id="menu">
       <?php include 'menu.php'; ?>
      </div>
     <div id="conteudo">
      <form action="cadContato.php" method="POST">
        <br></br>connect
        <label class="legenda">Nome</label><br>
        <input type="text" class="campos" name="nome" placeholder="Digite seu nome" required> <br>
        <label class="legenda">E-mail</label><br>
        <input type="email"  class="campos" name="email" placeholder="Digite seu Email" required> <br>
        <label class="legenda">Assunto</label><br>
        <input type="text" class="campos" name="assunto" placeholder="Sobre o que deseja falar" required> <br>
        <label class="legenda">Mensagem</label><br>
        <textarea name="conteudo"  class="campo2" placeholder="Digite sua mensagem"></textarea><br>
        <input type="submit" value="Enviar" class="bt-contato">
      </form>
     </div>
     <div id="rodape">
       <?php include 'rodape.php' ?>
     </div>
   </div>
   </body>
</html>
