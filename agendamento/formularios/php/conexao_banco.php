
<?php
     $host="localhost";
     $usuario="root";
     $senha="";
     $database="agendamentoonline";
     $conexao = new mysqli($host, $usuario, $senha, $database);
     if ($conexao-> connect_error){
        die ("falha de conexão:".$conexao->connect_error);
     }
     ?>