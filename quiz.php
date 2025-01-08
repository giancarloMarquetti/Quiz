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
        <form action="result.php" method="post">

            <!-- Campos armazenados ocultamente -->
            <input type="hidden" name="name" value="<?php echo htmlspecialchars($_POST['name']); ?>">
            <input type="hidden" name="email" value="<?php echo htmlspecialchars($_POST['email']); ?>">
            <input type="hidden" name="whatsapp" value="<?php echo htmlspecialchars($_POST['whatsapp']); ?>">
            
            <!-- Verifico se realmente existe nome preenchido.
             Caso contrário, direciono ele para a página de index -->
            <?php 
            $nameteste = htmlspecialchars($_POST['name']);
            if($nameteste == NULL){
                    header('Location: index.php');
            }?>

            <!-- Primeira pergunta -->
            <div class="question">
                <p><b>1.</b> Quanto é 2 + 10?</p>
                <input type="radio" id="q1a" name="q1" value="a" required>
                <label for="q1a">a) 12</label><br>
                <input type="radio" id="q1b" name="q1" value="b">
                <label for="q1b">b) 210</label><br>
                <input type="radio" id="q1c" name="q1" value="c">
                <label for="q1c">c) 14</label><br>
                <input type="radio" id="q1d" name="d1" value="d">
                <label for="q1d">d) 8</label><br>
            </div>

            <!-- Segunda pergunta -->
            <div class="question">
                <p><b>2.</b> Qual o maior número entre (2 | 3 | 4 | 4,1)?</p>
                <input type="radio" id="q2a" name="q2" value="a" required>
                <label for="q2a">a) 2</label><br>
                <input type="radio" id="q2b" name="q2" value="b">
                <label for="q2b">b) 3</label><br>
                <input type="radio" id="q2c" name="q2" value="c">
                <label for="q2c">c) 4</label><br>
                <input type="radio" id="q2d" name="q2" value="d">
                <label for="q2d">d) 4,1</label><br>
            </div>
            
            <!-- Terceira pergunta -->
            <div class="question">
                <p><b>3.</b> O dia está ensolarado, o que nós vimos no céu?</p>
                <input type="radio" id="q3a" name="q3" value="a" required>
                <label for="q3a">a) Chuva</label><br>
                <input type="radio" id="q3b" name="q3" value="b">
                <label for="q3b">b) Sol</label><br>
                <input type="radio" id="q3c" name="q3" value="c">
                <label for="q3c">c) Raios</label><br>
                <input type="radio" id="q3d" name="q3" value="d">
                <label for="q3d">d) Neve</label><br>
            </div>

            <br />
            <br />
            <button type="submit">Enviar Respostas</button>
        </form>
    </div>
</body>
</html>
