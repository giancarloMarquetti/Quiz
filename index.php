<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Certificado</title>
    <link rel="stylesheet" href="style.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.inputmask/5.0.6/jquery.inputmask.min.js"></script>
</head>
<body>
    <div class="container">
        <h1>Gerador de Certificado</h1>
        <form id="formulario" action="quiz.php" method="post">
            <label for="name">Nome:</label>
            <input type="text" id="name" name="name" required>
            
            <label for="email">E-mail:</label>
            <input type="email" id="email" name="email" required>
            
            <label for="whatsapp">WhatsApp:</label>
            <input type="text" id="whatsapp" name="whatsapp" required>
            <br />
            <br />

            <!-- início do recaptcha -->
            <?php
            $num1 = '';
            $num2 = '';
            $result = '';
            $num1 = random_int(1,10);
            $num2 = random_int(1,10);
            $result = $num1 + $num2;
            ?>

            <label for="recaptcha"><b>Quanto é <?php echo $num1; ?> + <?php echo $num2; ?>:</b></label>
            <input type="text" id="recaptcha" name="recaptcha" required>
            <span class="error" id="recaptchaError">Resposta incorreta. Tente novamente.</span><br><br>
            <!-- Fim do recaptcha -->

            <button type="submit">Iniciar Quiz</button>
        </form>
    </div>

    <script>
        $(document).ready(function(){
            $('#whatsapp').inputmask('(99) 99999-9999');
        });
    </script>

    <!-- Script do recaptcha -->
    <script>
        document.getElementById('formulario').addEventListener('submit', function(event) {
            const recaptchaInput = document.getElementById('recaptcha').value;
            const recaptchaError = document.getElementById('recaptchaError');
            
            if (recaptchaInput != '<?php echo $result; ?>') {
                recaptchaError.style.display = 'inline';
                event.preventDefault(); // Impede o envio do formulário
            } else {
                recaptchaError.style.display = 'none';
            }
        });
    </script>
    
</body>
</html>
