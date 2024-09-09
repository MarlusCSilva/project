<?php

namespace App\Http\Controllers;
use App\Models\Evento;
use Illuminate\Http\Request;
use FPDF;
class PDFController extends Controller
{
    public function gerarPDF()
    {
        // Busca todos os eventos do banco de dados
        $eventos = Evento::all();

        // Cria uma instância do FPDF
        $pdf = new FPDF;
        $pdf->AddPage();
        $pdf->SetFont('Arial', 'B', 16);
        $pdf->Image('img\logo-eventflow.png', 15, 3, 30); // Caminho, X, Y, largura

        // Adicionar cabeçalho
        $pdf->Cell(0, 10, 'Relatorio dos Eventos', 0, 1, 'C');
        $pdf->Ln(10);
        $fill = false;

        $pdf->SetFillColor(256, 256, 256); // Cor de fundo para cabeçalhos
        $pdf->SetFont('Arial', 'B', 12);
        $pdf->Cell(10, 10, 'ID', 1, 0, 'C', true);
        $pdf->Cell(43, 10, 'Nome', 1, 0, 'C', true);
        $pdf->Cell(30, 10, 'Data', 1, 0, 'C', true);
        $pdf->Cell(30, 10, 'Descricao', 1, 0, 'C', true);
        $pdf->Cell(40, 10, 'Local', 1, 0, 'C', true);
        $pdf->Cell(40, 10, 'Hora', 1, 1, 'C', true);

        // Adicionar os dados dos eventos
        $pdf->SetFont('Arial', '', 12);

        // Define altura de linha e margem inferior
    $alturaLinha = 10;
    $margemInferior = 20;
    $alturaPagina = $pdf->GetPageHeight();
    
    // Adiciona os dados dos eventos
    foreach ($eventos as $evento) {
        if ($pdf->GetY() + $alturaLinha > $alturaPagina - $margemInferior) { // Verifica se há espaço suficiente para a linha na página atual
            $pdf->AddPage(); // Adiciona uma nova página se necessário

            // Re-adiciona cabeçalhos na nova página
            $pdf->SetFont('Arial', 'B', 12);
            $pdf->MultiCell(10, 10, 'ID', 1, 0, 'C', true);
            $pdf->MultiCell(43, 10, 'Nome', 1, 0, 'C', true);
            $pdf->MultiCell(30, 10, 'Data', 1, 0, 'C', true);
            $pdf->MultiCell(30, 10, 'Descrição', 1, 0, 'C', true);
            $pdf->MultiCell(40, 10, 'Local', 1, 0, 'C', true);
            $pdf->SetFont('Arial', '', 12);
        }

        // Adiciona uma linha da tabela
        $pdf->Cell(10, $alturaLinha, $evento->id, 1,0, 'C', true);
        $pdf->Cell(43, $alturaLinha, $evento->nome, 1,0, 'C', true);
        $pdf->Cell(30, $alturaLinha, $evento->data, 1,0, 'C', true);
        $pdf->Cell(30, $alturaLinha, $evento->descricao, 1,0, 'C', true);
        $pdf->Cell(40, $alturaLinha, $evento->localizacao, 1,0, 'C', true);
        $pdf->Cell(40, $alturaLinha, $evento->hora, 1,0, 'C', true);
        $pdf->Ln();
    }
         // Adicionar rodapé
        $pdf->SetY(265);
        $pdf->SetFont('Arial', 'I', 10);
        $pdf->Cell(0, 10, 'Gerado por EventFlow', 0, 0, 'C');

        // Gera o PDF na saída
        return response($pdf->Output(), 200)->header('Content-Type', 'application/pdf');
    }
}
