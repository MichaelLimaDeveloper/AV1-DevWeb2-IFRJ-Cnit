<?php
   require_once("banco_medico.php");

  $operacao = $_GET['op'];

    switch($operacao){
        case 1:
            $entrada = $_GET['entrada'];
            if($entrada == 1) 
                formIncluir();
            if($entrada == 2) 
                execIncluir();    
            break;
        case 2:
            execListar();
            break;
        case 3:
            $entrada = $_GET['entrada'];
            if($entrada == 1) 
                formPesquisar();
            if($entrada == 2)
                execPesquisar();   
            break;
        case 4:
            $entrada = $_GET['entrada'];
            if($entrada == 1)
                formPesquisarAlterar();
            if($entrada == 2)
                formAlterar();   
            if($entrada == 3)
                execAlterar();   
            break;
        case 5:
            $entrada = $_GET['entrada'];            
            if($entrada == 1)
                formExcluir();
            if($entrada == 2)
                execExcluir();   
            break;
    }


    function  formIncluir() {
        echo "
        <html>
        <head>
            <meta charset='utf-8'>
        </head>
        <body>
        <center><h1>INCLUSÃO DE MEDICO</h1></center>
        <HR>
            <form action='principal_medico.php' method='GET'>
                PREENCHA OS DADOS: <BR>
                CODIGO DO PACIENTE:<input type='text' name='idMedico'> <BR>
                NOME:<input type='text' name='nome'>   <br>    
                NASCIMENTO:<input type='text' name='nascimento' value='formato 2020-10-20'>  <br>
                ESPECIALIDADE MÉDICA:<input type='text' name='especialidadeMedica'>  <br>
                NÚMERO DO CONSULTÓRIO:<input type='text' name='numeroConsultorio'>  <br>
                QUANTIDADE DE AUXILIARES:<input type='text' name='quantidadeAuxiliares'>  <br>       
                <input type='hidden' name='op' value='1'>
                <input type='hidden' name='entrada' value='2'>    
                <input type='submit' name='enviar' value='ENVIAR'> 
                <input type='reset' name='limpar' value='LIMPAR'> 
                <br><hr><a href='index.html'>VOLTAR</A>
            </form>
            </body>
        </html>   
        ";
    }
    function execIncluir() {

        $idMedico = $_GET['idMedico'];
        $nome = $_GET['nome'];
        $nascimento = $_GET['nascimento'];
        $especialidadeMedica = $_GET['especialidadeMedica'];
        $numeroConsultorio = $_GET ['numeroConsultorio'];
        $quantidadeAuxiliares = $_GET ['quantidadeAuxiliares'];
  
        $sql = "insert into paciente values('$idMedico','$nome','$nascimento','$especialidadeMedica','$numeroConsultorio','$quantidadeAuxiliares')";
        echo $sql;

        $conn = conectar();

        $status = mysqli_query($conn,$sql);

        if($status==true)
            echo "<br>Registro inserido";
        else
            echo "<br>Erro na inclusão";

        echo "<br><hr><a href='index.html'>VOLTAR</A>"; 

    }  


    function execListar() {
   
       $sql = "select * from medico";

       $conn = conectar();

       $dados = mysqli_query($conn,$sql);
       $total = mysqli_num_rows($dados);


       echo"<center><table border=1 width=80%>";
       echo"<tr><th>CODIGO DO MÉDICO</TH><TH>NOME</TH><TH>NASCIMENTO</TH><TH>ESPECIALIDADE MÉDICA</TH><TH>NÚMERO DO CONSULTÓRIO</TH><TH>QUANTIDADE DE AUXILIARES</TH></TR>";    

       $linha = mysqli_fetch_array($dados);
       
       for($i=0; $i<$total; $i++) {
        $idMedico = $linha['idMedico'];
        $nome = $linha['nome'];
        $nascimento = $linha['nascimento'];
        $especialidadeMedica = $linha['especialidadeMedica'];
        $numeroConsultorio = $linha ['numeroConsultorio'];
        $quantidadeAuxiliares = $linha ['quantidadeAuxiliares'];

            echo"<tr><td>$idMedico</Td><Td>$nome</Td><Td>$nascimento</Td><td>$especialidadeMedica</td><td>$numeroConsultorio</td><td>$quantidadeAuxiliares</td></TR>";  
            $linha = mysqli_fetch_assoc($dados);
       }
       echo "</table></center>";
       echo "<br><hr><a href='index.html'>VOLTAR</A>"; 

    }

    function  formPesquisar() {

        echo "
        <html>
        <head>
            <meta charset='utf-8'>
        </head>
        <body>
        <center><h1>PESQUISA DE MEDICOS</h1></center>
        <HR>
            <form action='principal_medico.php' method='GET'>
                DIGITE O CODIGO DO MEDICO:<input type='text' name='idMedico'> <BR>
                <input type='hidden' name='op' value='3'> 
                <input type='hidden' name='entrada' value='2'>    
                <input type='submit' name='enviar' value='ENVIAR'> 
                <input type='reset' name='limpar' value='LIMPAR'> 
                <br><hr><a href='index.html'>VOLTAR</A>
            </form>
            </body>
        </html>   
        ";
    }

    function execPesquisar() {

        $idMedico = $_GET['idMedico'];
 
        $sql = "select * from medico where idMedico='$idMedico'";
 
        $conn = conectar();
 
        $dados = mysqli_query($conn,$sql);
        $total = mysqli_num_rows($dados);
 
        if($total==0){
            echo '<br> Medico não encontrado';
            echo "<br><hr><a href='index.html'>VOLTAR</A>";
        exit();
        }

        echo"<center><table border=1 width=80%>";
        echo"<tr><th>CODIGO DO MÉDICO</TH><TH>NOME</TH><TH>NASCIMENTO</TH><TH>ESPECIALIDADE MÉDICA</TH><TH>NÚMERO DO CONSULTÓRIO</TH><TH>QUANTIDADE DE AUXILIARES</TH></TR>";
 
        $linha = mysqli_fetch_array($dados);
        
        for($i=0; $i<$total; $i++) {
            $idMedico = $linha['idMedico'];
            $nome = $linha['nome'];
            $nascimento = $linha['nascimento'];
            $especialidadeMedica = $linha['especialidadeMedica'];
            $numeroConsultorio = $linha ['numeroConsultorio'];
            $quantidadeAuxiliares = $linha ['quantidadeAuxiliares'];
    
            echo"<tr><td>$idMedico</Td><Td>$nome</Td><Td>$nascimento</Td><td>$especialidadeMedica<td><td>$numeroConsultorio</td><td>$quantidadeAuxiliares</td></TR>";  
            $linha = mysqli_fetch_assoc($dados);
        }
        echo "</table></center>";
        echo "<br><hr><a href='index.html'>VOLTAR</A>"; 
     }

    function formPesquisarAlterar() {

        echo "
        <html>
        <head>
            <meta charset='utf-8'>
        </head>
        <body>
        <center><h1>ALTERAÇÃO DE MÉDICO</h1></center>
        <HR>
            <form action='principal_medico.php' method='GET'>
                DIGITE O CODIGO DO MÉDICO:<input type='text' name='idMedico'> <BR>
                <input type='hidden' name='op' value='4'>
                <input type='hidden' name='entrada' value='2'>
                <input type='submit' name='enviar' value='ENVIAR'> 
                <input type='reset' name='limpar' value='LIMPAR'> 
                <br><hr><a href='index.html'>VOLTAR</A>
            </form>
            </body>
        </html>   
        ";
    }

    function  formAlterar() {
        
        $idMedico = $_GET['idMedico'];

        $sql = "select * from medico where idMedico=$idMedico";
 
        $conn = conectar();
 
        $dados = mysqli_query($conn,$sql);
        $total = mysqli_num_rows($dados);
 
        if($total==0){
            echo '<br> Médico não encontrado';
            echo "<br><hr><a href='index.html'>VOLTAR</A>";
            exit();
        }

        $linha = mysqli_fetch_array($dados);

        $idMedico = $linha['idMedico'];
        $nome = $linha['nome'];
        $nascimento = $linha['nascimento'];
        $especialidadeMedica = $linha['especialidadeMedica'];
        $numeroConsultorio = $linha ['numeroConsultorio'];
        $quantidadeAuxiliares = $linha ['quantidadeAuxiliares'];

        echo "
        <html>
        <head>
            <meta charset='utf-8'>
        </head>
        <body>
        <center><h1>ALTERAÇÃO DE DADOS DO MÉDICO</h1></center>
        <HR>
        <form action='principal_medico.php' method='GET'>
                PREENCHA OS DADOS: <BR>
                CODIGO DO PACIENTE:<input type='text' name='$idMedico'> <BR>
                NOME:<input type='text' name='$nome'> <br>    
                NASCIMENTO:<input type='text' name='nascimento' value='$nascimento'>  <br>
                ESPECIALIDADE MÉDICA:<input type='text' name='$especialidadeMedica'>  <br>
                NÚMERO DO CONSULTÓRIO:<input type='text' name='$numeroConsultorio'>  <br>
                QUANTIDADE DE AUXILIARES:<input type='text' name='$quantidadeAuxiliares'>  <br>
                <input type='hidden' name='op' value='4'> 
                <input type='hidden' name='entrada' value='3'>    
                <input type='submit' name='enviar' value='ENVIAR'> 
                <input type='reset' name='limpar' value='LIMPAR'> 
                <br><hr><a href='index.html'>VOLTAR</A>
            </form>
            </body>
        </html>   
        ";
    }

    function execAlterar() {

        $idMedico = $_GET['idMedico'];
        $nome = $_GET['nome'];
        $nascimento = $_GET['nascimento'];
        $especialidadeMedica = $_GET['especialidadeMedica'];
        $numeroConsultorio = $_GET ['numeroConsultorio'];
        $quantidadeAuxiliares = $_GET ['quantidadeAuxiliares'];
 
        $sql = "update paciente set nome='$nome', nascimento='$nascimento',especialidadeMedica='$especialidadeMedica', numeroConsultorio='$numeroConsultorio', quantidadeAuxiliares='$quantidadeAuxiliares' where idMedico='$idMedico'";
        echo $sql;

        $conn = conectar();

        $status = mysqli_query($conn,$sql);

        if($status==true)
            echo "<br>Dados Alterados";
        else
            echo "<br>Erro na Alteração";

        echo "<br><hr><a href='index.html'>VOLTAR</A>"; 

    } 

    function formExcluir() {

        echo "
        <html>
        <head>
            <meta charset='utf-8'>
        </head>
        <body>
        <center><h1>EXCLUSÃO DE MÉDICO</h1></center>
        <HR>
            <form action='principal_medico.php' method='GET'>
                CODIGO DO PACIENTE:<input type='text' name='idMedico'> <BR>
                <input type='hidden' name='op' value='5'> 
                <input type='hidden' name='entrada' value='2'>    
                <input type='submit' name='enviar' value='ENVIAR'> 
                <input type='reset' name='limpar' value='LIMPAR'> 
                <br><hr><a href='index.html'>VOLTAR</A>
            </form>
            </body>
        </html>   
        ";
    }
    function execExcluir() {

        $idMedico = $_GET['idMedico'];

        $sql = "delete from medico where idMedico='$idMedico'";
        echo $sql;

        $conn = conectar();

        $status = mysqli_query($conn,$sql);

        if($status==true)
            echo "<br>Registro Excluido";
        else
            echo "<br>Erro na Exclusão";

        echo "<br><hr><a href='index.html'>VOLTAR</A>";
    }
?>