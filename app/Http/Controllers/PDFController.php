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
        $pdf = new FPDF();
        $pdf->AddPage();
        $pdf->SetFont('Arial', 'B', 16);

        // Adicionar cabeçalho
        $pdf->Cell(0, 10, 'Relatorio dos Eventos', 0, 1, 'C');
        $pdf->Ln(10);
        $fill = false;

        $pdf->SetFillColor(200, 220, 255); // Cor de fundo para cabeçalhos
        $pdf->SetFont('Arial', 'B', 12);
        $pdf->Cell(50, 10, 'Nome', 1, 0, 'C', true);
        $pdf->Cell(30, 10, 'Data', 1, 0, 'C', true);
        $pdf->Cell(30, 10, 'Descricao', 1, 0, 'C', true);
        $pdf->Cell(40, 10, 'Local', 1, 1, 'C', true);

        // Adicionar os dados dos eventos
        $pdf->SetFont('Arial', '', 12);
        foreach ($eventos as $evento) {
            $pdf->Cell(50, 10, $evento->nome, 1, 0, 'L', $fill);
            $pdf->Cell(30, 10, $evento->data, 1, 0, 'C', $fill);
            $pdf->Cell(30, 10, $evento->descricao, 1, 0, 'L', $fill);
            $pdf->Cell(40, 10, $evento->localizacao, 1, 1, 'L', $fill);
            $pdf->Ln();
        }
         // Adicionar rodapé
        $pdf->SetY(-15);
        $pdf->SetFont('Arial', 'I', 10);
        $pdf->Cell(0, 10, 'Gerado por EventFlow', 0, 0, 'C');

        // Gera o PDF na saída
        return response($pdf->Output(), 200)->header('Content-Type', 'application/pdf');
    }
}
