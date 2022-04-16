<?php

    //Trabalho feito por: Michael Monteiro de Lima e Miryam Estábila Nogueira de Souza;
    //Professor: Alexandre Domingues Goncalves;
    //Disciplina: Desenvolvimento Web II;
    //Turma: INFO 141 (2021.2).
    //Atividade de Recuperação
    //Tema escolhido: Clinica Médica 

    $formulario = $_GET['opc'];

    if( $formulario=='cliente') 
    {
        echo "
        <html>
        <head>
        <meta charset='utf-8'>
    </head>
    <body>
        <center><h1>CADASTRO DE PACIENTE</h1></center>
        <HR>
            <form action='principal_paciente.php' method='GET'>
                ESCOLHA A OPÇÃO: <BR>
                <input type='radio' name='op' value='1'>INCLUIR  <BR>
                <input type='radio' name='op' value='2'>LISTAR <BR>         
                <input type='radio' name='op' value='3'>PESQUISAR <BR>          
                <input type='radio' name='op' value='4'>ALTERAR <BR> 
                <input type='radio' name='op' value='5'>EXCLUIR <BR>  
                
                <input type='hidden' name='entrada' value='1'>    
                <input type='submit' name='enviar' value='ENVIAR'> 
                <input type='reset' name='limpar' value='LIMPAR'> 
            </form>
    </body>
</html>                                                                       
        ";
        echo "</table></center>";
        echo "<br><hr><a href='index.html'>VOLTAR</A>";                               
    }
    if( $formulario=='medico') 
    {
        echo "
        <html>
        <head>
        <meta charset='utf-8'>
    </head>
    <body>
        <center><h1>GERENCIAMENTO DOS MÉDICOS</h1></center>
        <HR>
            <form action='principal_medico.php' method='GET'>
                ESCOLHA A OPÇÃO: <BR>
                <input type='radio' name='op' value='1'>INCLUIR  <BR>
                <input type='radio' name='op' value='2'>LISTAR <BR>         
                <input type='radio' name='op' value='3'>PESQUISAR <BR>          
                <input type='radio' name='op' value='4'>ALTERAR <BR> 
                <input type='radio' name='op' value='5'>EXCLUIR <BR>  
                
                <input type='hidden' name='entrada' value='1'>    
                <input type='submit' name='enviar' value='ENVIAR'> 
                <input type='reset' name='limpar' value='LIMPAR'> 
            </form>
    </body>
</html>
        ";
        echo "</table></center>";
        echo "<br><hr><a href='index.html'>VOLTAR</A>";   
    } 
?>