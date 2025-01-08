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
        <form action="quiz.php" method="post">

            <!-- Campos armazenados ocultamente -->
            <?php
            $score = htmlspecialchars($_GET['score'], ENT_QUOTES, 'UTF-8');
            $total_questions = htmlspecialchars($_GET['total'], ENT_QUOTES, 'UTF-8');
            $name = htmlspecialchars($_GET['name'], ENT_QUOTES, 'UTF-8');
            $email = htmlspecialchars($_GET['email'], ENT_QUOTES, 'UTF-8');
            $whatsapp = htmlspecialchars($_GET['whatsapp'], ENT_QUOTES, 'UTF-8');
            ?>

            <input type="hidden" id="name" name="name" value="<?php echo $name; ?>" required>
            <input type="hidden" id="email" name="email" value="<?php echo $email; ?>" required>
            <input type="hidden" id="whatsapp" name="whatsapp" value="<?php echo $whatsapp; ?>" required>

            <!-- Resultado do Quiz, com a opção de refazer o mesmo sem ver as respostas -->
            <div class="question">
                <p>Você acertou <?php echo $score ?> de <?php echo $total_questions ?> perguntas. Infelizmente, você não passou.</p>
            </div>

            <br /><br />
            <button type="submit">Refazer o quiz</button>
        </form>
    </div>
</body>
</html>
