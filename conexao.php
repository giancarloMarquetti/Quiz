<?php

// Define as constantes para as credenciais de acesso ao banco de dados
define('DB_HOST', 't');
define('DB_NAME', '');
define('DB_USER', '');
define('DB_PASS', '');

// Função para conectar ao banco de dados
function conectarBanco() {
  // Cria uma nova conexão com o banco de dados
  $conn = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);

  // Verifica se a conexão foi bem sucedida
  if ($conn->connect_error) {
    die("Falha na conexão com o banco de dados: " . $conn->connect_error);
  }

  // Retorna a conexão estabelecida
  return $conn;
}

?>
