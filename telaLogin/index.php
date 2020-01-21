<?php
    require_once 'classes/usuarios.php';
    $u =new Usuario;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <div id="corpo-form">
        <h1>Entrar</h1>
        <form method="POST">
            <input type="email" name="email" placeholder="Usuário">
            <input type="password" name="senha" placeholder="Senha">
            <input type="submit" value="Acessar">
            <a href="cadastrar.php">Ainda não é incrito?<strong>Cadastre-se!</strong></a>
        </form>
    </div>
    <?php
        if(isset($_POST['email']))
        {
            $email = addslashes($_POST['email']);
            $senha = addslashes($_POST['senha']);
            if(!empty($email) && !empty($senha)){
                $u->conectar("projetoLogin","localhost","root","localhost123?");
                    if($u->msgErro == "")
                        {
                            if($u->logar($email,$senha))
                        {
                            header("location: AreaPrivada.php");

                        } else {
                            ?>
                            <div class="msg-erro">
                                Email ou senha estão incorretos!
                            </div>
                            <?php
                        }
                    } else {
                        ?>
                        <div class="msg-erro">
                            <?php echo "Erro: ".$u->msgErro; ?>
                        </div>
                        <?php
                    }
            } else {
                ?>
                <div class="msg-erro">
                    Preencha todos os campos!
               </div>
               <?php
            }
        }
    ?>
</body>
</html>