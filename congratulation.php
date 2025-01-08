<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Certificado</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <h1>Quiz</h1>
        <form action="generate_certificate.php" method="post">

            <!-- Campos armazenados ocultamente -->
            <?php
            $name = htmlspecialchars($_GET['name'], ENT_QUOTES, 'UTF-8');
            $um = htmlspecialchars($_GET['respostas'], ENT_QUOTES, 'UTF-8');
            $dois = htmlspecialchars($_GET['1'], ENT_QUOTES, 'UTF-8');
            $tres = htmlspecialchars($_GET['2'], ENT_QUOTES, 'UTF-8');
            ?>

            <input type="hidden" id="name" name="name" value="<?php echo $name; ?>" required>

            <!-- Mensagem de conclusão -->
            <div class="question">
                <p>Parabéns! Você atingiu o objetivo. Clique no botão abaixo para baixar o seu certificado</p>
                <p><b>Não esqueça de salvar o certificado em seu dispositivo.</b></p>
            </div>
            
            <!-- Gabarito das Respostas -->
            <div class="question">
                <p><b>1.</b> Quanto é 2 + 10?</p>
                <label for="q1a" <?php if($um[2] == 'a'){?> style="color:#37f85e" <?php } ?>>a) 12</label><br>
                <label for="q1b" <?php if($um[2] == 'b'){?> style="color:#ff5858" <?php } ?>>b) 210</label><br>
                <label for="q1c" <?php if($um[2] == 'c'){?> style="color:#ff5858" <?php } ?>>c) 14</label><br>
                <label for="q1d" <?php if($um[2] == 'd'){?> style="color:#ff5858" <?php } ?>>d) 8</label><br>
                <?php if($um[2] != 'a'){?> <p><b>Resposta correta: a)</b></p> <?php } ?>
            </div>

            <div class="question">
                <p><b>2.</b> Qual o maior número entre (2 | 3 | 4 | 4,1)?</p>
                <label for="q2a" <?php if($dois == 'a'){?> style="color:#ff5858" <?php } ?>>a) 2</label><br>
                <label for="q2b" <?php if($dois == 'b'){?> style="color:#ff5858" <?php } ?>>b) 3</label><br>
                <label for="q2c" <?php if($dois == 'c'){?> style="color:#ff5858" <?php } ?>>c) 4</label><br>
                <label for="q2d" <?php if($dois == 'd'){?> style="color:#37f85e" <?php } ?>>d) 4,1</label><br>
                <?php if($dois != 'd'){?> <p><b>Resposta correta: d)</b></p> <?php } ?>
            </div>

            <div class="question">
                <p><b>3.</b> O dia está ensolarado, o que nós vimos no céu?</p>
                <label for="q3a" <?php if($tres == 'a'){?> style="color:#ff5858" <?php } ?>>a) Chuva</label><br>
                <label for="q3b" <?php if($tres == 'b'){?> style="color:#37f85e" <?php } ?>>b) Sol</label><br>
                <label for="q3c" <?php if($tres == 'c'){?> style="color:#ff5858" <?php } ?>>c) Raios</label><br>
                <label for="q3d" <?php if($tres == 'd'){?> style="color:#ff5858" <?php } ?>>d) Neve</label><br>
                <?php if($tres != 'b'){?> <p>Resposta correta: b)</p> <?php } ?>
            </div>

            <br /><br />
            <button type="submit">Baixar certificado</button>
        </form>
    </div>
</body>
</html>
