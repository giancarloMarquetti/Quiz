<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Inclui o arquivo de conexão
require_once('conexao.php');

// Respostas corretas do quiz
$correct_answers = array(
    'q1' => 'a',
    'q2' => 'd',
    'q3' => 'b',
);

// Inicializa o array para armazenar as respostas informadas
$submittedAnswers = [];

$name = htmlspecialchars($_POST['name'], ENT_QUOTES, 'UTF-8');
$email = htmlspecialchars($_POST['email'], ENT_QUOTES, 'UTF-8');
$whatsapp = htmlspecialchars($_POST['whatsapp'], ENT_QUOTES, 'UTF-8');

$score = 0;
$total_questions = count($correct_answers);

// Verificar respostas
foreach ($correct_answers as $question => $correct_answer) {
    $submittedAnswers[] = $_POST[$question];
    if (isset($_POST[$question]) && $_POST[$question] == $correct_answer) {
        $score++;
    }
}

// Obtém a conexão com o banco de dados
$conn = conectarBanco();

// Prepare a consulta SQL para inserir os dados
$sql = "INSERT INTO usuarios (name, email, whatsapp) VALUES (?, ?, ?)";

// Prepara a consulta para evitar SQL Injection
$stmt = $conn->prepare($sql);
if ($stmt) {
    // Vincula os parâmetros
    $stmt->bind_param("sss", $name, $email, $whatsapp);

    // Executa a instrução SQL
    if ($stmt->execute()) {
        // Registro criado com sucesso
    } else {
        //echo "Erro ao inserir registro: " . $stmt->error;
    }

    // Fecha a instrução
    $stmt->close();
} else {
    //echo "Erro na preparação da instrução: " . $conn->error;
}

// Fecha a conexão
$conn->close();

// Se a pontuação for maior ou igual a 2, exibir o certificado
if ($score >= 2) {
    header('Location: congratulation.php?name=' . urlencode($name) . '&respostas=' . http_build_query($submittedAnswers));
} else {
    // Se não vai para a tela de que não atingiu a média necessária
    header('Location: again.php?score=' . urlencode($score) . '&total=' . urlencode($total_questions) . 
    '&name=' . urlencode($name) . '&email=' . urlencode($email) . '&whatsapp=' . urlencode($whatsapp));
}
?>
