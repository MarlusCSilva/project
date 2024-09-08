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

        // Adiciona cabeçalhos das colunas
        $pdf->Cell(60, 10, 'Nome do Evento', 1);
        $pdf->Cell(60, 10, 'Data do Evento', 1);
        $pdf->Ln();
        // Adiciona os dados dos eventos
        foreach ($eventos as $evento) {
            $pdf->Cell(60, 10, $evento->nome, 1);
            $pdf->Cell(60, 10, $evento->data, 1);
            $pdf->Ln();
        }

        // Gera o PDF na saída
        return response($pdf->Output(), 200)->header('Content-Type', 'application/pdf');
    }
}
