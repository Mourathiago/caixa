<?php 

  session_start();

  if (!isset($_SESSION['user_login']) || $_SESSION['user_login'] !== true) {
    header("Location: entrar.php");
  }

  if ($_SESSION['user_nvl'] != 1) {
    header("Location: entrar.php");
  }
  

  function __autoload($classe){

    require_once 'classes/'.$classe.'.class.php';
  }

    $sql = "SELECT u.nome_user, c.solicitante, c.requisicao, c.motivo, c.data FROM user u, cadastro c WHERE c.userid = u.userid ";
    $stmt = db::prepare($sql);
    $stmt -> execute();

?>

<!DOCTYPE html>
  <html>

    <head>

      <title>Index</title>
      <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/dataTables.material.min.css"/>
      <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/material-design-lite/1.1.0/material.min.css"/>
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">

    </head>

    <body onkeypress="myFunction(event);logoff(event)">

      <table class="striped highlight centered responsive-table" id="example">

        <thead>

          <tr>
            <th>Requisição</th>
            <th>Solicitante</th>
            <th>Usuário designado</th>
            <th>Motivo</th>
            <th>Data</th>
          </tr>

        </thead>

          <?php foreach ($stmt as $value){ ?>

          <tr>
            <td><?php echo $value['requisicao']; ?></td>
            <td><?php echo $value['solicitante']; ?></td>
            <td><?php echo $value['nome_user']; ?></td>
            <td><?php echo $value['motivo']; ?></td>
            <td><?php echo $value['data']; ?></td>
          </tr>

          <?php } ?>

        <tbody>
          
        </tbody>

      </table>

      <div id="id01" class="modal">
        
        <form class="modal-content" action="insert.php" method="post">
          <div class="imgcontainer">
            <span onclick="document.getElementById('id01').style.display='none'" class="close" title="Close Modal">&times;</span>
          </div>

          <div class="container requisicao">

            <label for="requisicao"><b>Requisição</b></label>
            <input type="text" name="requisicao" pattern="(?=.*\d){6}" maxlength="6" placeholder="000000" required>

            <label for="solicitante"><b>Solicitante</b></label>
            <input type="text" name="solicitante" placeholder="Insira o Solicitante" required>

            <label for="motivo"><b>Motivo</b></label>
            <textarea name="motivo" style="height:200px" placeholder="Insira o Motivo" required></textarea>
              
            <button type="submit">Cadastrar</button>

          </div>

        </form>
      </div>

      <script type="text/javascript" src="https://code.jquery.com/jquery-3.3.1.js"></script>
      <script type="text/javascript" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
      <script type="text/javascript" src="https://cdn.datatables.net/1.10.19/js/dataTables.semanticui.min.js"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
      <script>
      // Get the modal
      var modal = document.getElementById('id01');

      // When the user clicks anywhere outside of the modal, close it
      window.onclick = function(event) {
          if (event.target == modal) {
              modal.style.display = "none";
          }
      }

      $(document).ready(function() {
          $('#example').DataTable();
      } );

      function myFunction(event) {
        var x = event.which || event.keyCode;
          if(x === 114){
            document.getElementById('id01').style.display='block';
          }
      }

      $(document).ready(function(){
        $('.modal').modal();
      });

      $(document).ready(function(){
        $('select').formSelect();
      });

      function logoff(event) {
        var x = event.which || event.keyCode;
          if(x === 113){
            window.location.href="logged.php";q
          }
      }

      </script>
    </body>

  </html>