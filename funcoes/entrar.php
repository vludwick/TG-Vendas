<?php
    session_start();
    if( isset($_POST["usuario"])){
        $usuario = $_POST["usuario"];
        $senha = $_POST["senha"];
            
        $login = "SELECT * ";
        $login .= "FROM funcionario ";
        $login .= "WHERE email = '{$usuario}' and senha = '{$senha}' ";
        
        
        $acesso = mysqli_query($conecta, $login);
        if ( !$acesso ){
            die("Falha na consulta ao banco");
        }
        
        $informacao = mysqli_fetch_assoc($acesso);

        if ( empty($informacao)) {
            $mensagem = "Login sem sucesso.";
        } else{
            $_SESSION["user_portal"] = $informacao["id_funcionario"];
            header("location:home.php");
        }
    }
?>