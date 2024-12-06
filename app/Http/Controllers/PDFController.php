<?php
  
namespace App\Http\Controllers;
   
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Trainer;
use PDF;
    
class PDFController extends Controller
{
    public function generatePDF($id)
    {
        $trainer = Trainer::findOrFail($id);
    
        // Ruta completa de la imagen
        $imagePath = public_path('images/' . $trainer->avatar);
    
        // Datos para la vista PDF
        $data = [
            'trainer' => $trainer,
            'imagePath' => $imagePath // Pasar la ruta de la imagen
        ];
    
        // Generar el PDF con la vista 'myPDF'
        $pdf = PDF::loadView('myPDF', $data);
    
        // Descargar el PDF
        return $pdf->download("trainer_{$trainer->id}.pdf");
    }
}    