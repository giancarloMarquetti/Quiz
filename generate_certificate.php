<?php
require('fpdf/fpdf.php');

// Primeiro garantimos que existe um nome, isso quer dizer que ele passou por todas as etapas
if (isset($_POST['name'])) {
    $name = htmlspecialchars($_POST['name'], ENT_QUOTES, 'UTF-8');
    $name = iconv('UTF-8', 'ISO-8859-1//TRANSLIT', $name);

    // Configuramos o PDF para gerar o certificado
    class PDF extends FPDF {
        function Header() {
            // Adicionar imagem de fundo
            $this->Image('image/certificado.png', 0, 0, $this->GetPageWidth(), $this->GetPageHeight());
            
            // Configurar a fonte e adicionar título
            $this->SetFont('Arial', 'B', 24);
            $this->SetTextColor(0, 0, 0);
            $this->Ln(20);
        }

        function Footer() {
            $this->SetY(-15);
            $this->SetFont('Arial', 'I', 8);
            $this->SetTextColor(0, 0, 0);
        }

        // Configuramos como e onde o nome de passoa será exibido
        function Certificate($name) {
            $this->SetY(90);
            $this->SetFont('Arial', '', 16);
            $this->SetTextColor(0, 0, 0);
            $this->SetFont('Arial', 'B', 42);
            $this->MultiCell(0, 20, "$name\n\n", 0, 'C');
            $this->SetFont('Arial', '', 16);
            $this->Ln(20);
            $this->SetFont('Arial', '', 12);
        }
    }

    // Cria a instância do PDF com orientação paisagem (L)
    $pdf = new PDF('L', 'mm', 'A4');
    $pdf->AddPage();
    $pdf->Certificate($name);
    $pdf->Output();
} else {
    echo "Nome não fornecido.";
}
?>
