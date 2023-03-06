<?php
session_start();
ob_start();
include_once 'conexao.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require './lib/vendor/autoload.php';
$mail = new PHPMailer(true);

?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <link rel="shortcut icon" href="images/favicon.ico" type="image/x-ico">
    <title>Femarh - Recuperar Senha</title>
</head>

<body>
    <h1>Recuperar Senha</h1>

    <?php
    $dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);

    if (!empty($dados['SendRecupSenha'])) {
        //var_dump($dados);
        $query_usuario = "SELECT usuario_id, Nome, Email 
                    FROM usuario 
                    WHERE Email =:Email  
                    LIMIT 1";
        $result_usuario = $conn->prepare($query_usuario);
        $result_usuario->bindParam(':Email', $dados['Email'], PDO::PARAM_STR);
        $result_usuario->execute();

        if (($result_usuario) and ($result_usuario->rowCount() != 0)) {
            $row_usuario = $result_usuario->fetch(PDO::FETCH_ASSOC);
            $chave_recuperar_senha = password_hash($row_usuario['usuario_id'], PASSWORD_DEFAULT);
            //echo "Chave $chave_recuperar_senha <br>";

            $query_up_usuario = "UPDATE usuario 
                        SET recuperar_senha =:recuperar_senha 
                        WHERE usuario_id =:usuario_id 
                        LIMIT 1";
            $result_up_usuario = $conn->prepare($query_up_usuario);
            $result_up_usuario->bindParam(':recuperar_senha', $chave_recuperar_senha, PDO::PARAM_STR);
            $result_up_usuario->bindParam(':usuario_id', $row_usuario['usuario_id'], PDO::PARAM_INT);

            if ($result_up_usuario->execute()) {
                $link = "https://femarh.com/sistemaunico/Recuperar_Senha1/atualizar_senha.php?chave=$chave_recuperar_senha";

                try {
                    /*$mail->SMTPDebug = SMTP::DEBUG_SERVER;*/
                    $phpmailer = new PHPMailer();
                    $phpmailer->isSMTP();
                    $phpmailer->Host = 'sandbox.smtp.mailtrap.io';
                    $phpmailer->SMTPAuth = true;
                    $phpmailer->Port = 2525;
                    $phpmailer->Username = 'f5e994605bb300';
                    $phpmailer->Password = 'e3cf15522e9e21';

                    $mail->setFrom('nao-responda@femarh.com', 'Atendimento');
                    $mail->addAddress($row_usuario['Email'], $row_usuario['Nome']);


                    $mail->isHTML(true);                                  //Set Email format to HTML
                    $mail->Subject = 'Recuperar senha';
                    $mail->Body    = 'Prezado(a) ' . $row_usuario['Nome'] .".<br><br>Você solicitou alteração de senha.<br><br>Para continuar o processo de recuperação de sua senha, clique no link abaixo ou cole o endereço no seu navegador: <br><br><a href='" . $link . "'>" . $link . "</a><br><br>Se você não solicitou essa alteração, nenhuma ação é necessária. Sua senha permanecerá a mesma até que você ative este código.<br><br>";
                    $mail->AltBody = 'Prezado(a) ' . $row_usuario['Nome'] ."\n\nVocê solicitou alteração de senha.\n\nPara continuar o processo de recuperação de sua senha, clique no link abaixo ou cole o endereço no seu navegador: \n\n" . $link . "\n\nSe você não solicitou essa alteração, nenhuma ação é necessária. Sua senha permanecerá a mesma até que você ative este código.\n\n";

                    $mail->send();

                    $_SESSION['msg'] = "<p style='color: green'>Enviado e-mail com instruções para recuperar a senha. Acesse a sua caixa de e-mail para recuperar a senha!</p>";
                    header("Location: ../index.php");
                } catch (Exception $e) {
                    echo "Erro: E-mail não enviado sucesso. Mailer Error: {$mail->ErrorInfo}";
                }
            } else {
                echo  "<p style='color: #ff0000'>Erro: Tente novamente!</p>";
            }
        } else {
            echo "<p style='color: #ff0000'>Erro: Usuário não encontrado!</p>";
        }
    }

    if (isset($_SESSION['msg_rec'])) {
        echo $_SESSION['msg_rec'];
        unset($_SESSION['msg_rec']);
    }

    ?>

    <form method="POST" action="">
        <?php
        $usuario = "";
        if (isset($dados['Email'])) {
            $usuario = $dados['Email'];
        } ?>

        <label>E-mail</label>
        <input type="text" name="Email" placeholder="Digite o email" value="<?php echo $usuario; ?>"><br><br>

        <input type="submit" value="Recuperar" name="SendRecupSenha">
    </form>


</body>

</html>