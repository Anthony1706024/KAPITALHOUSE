<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ContactoController extends Controller
{
    public function index()
    {
        return view('contacto');
    }

    public function enviarWhatsApp(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'telefono' => 'nullable|string|max:50',
            'interes' => 'nullable|string',
            'mensaje' => 'nullable|string',
        ]);

        $numero = '51964285907'; // Número sin el +51
        
        // Construir mensaje para WhatsApp
        $mensajeWhatsApp = "📩 *NUEVO MENSAJE DE CONTACTO* 📩\n\n";
        $mensajeWhatsApp .= "*Nombre:* " . $request->nombre . "\n";
        $mensajeWhatsApp .= "*Email:* " . $request->email . "\n";
        $mensajeWhatsApp .= "*Teléfono:* " . ($request->telefono ?: 'No especificado') . "\n";
        
        $intereses = [
            'corretaje' => 'Corretaje / Colocación de inquilinos',
            'administracion' => 'Administración de inmuebles',
            'asesoria' => 'Asesoría inmobiliaria',
            'otro' => 'Otro / Consulta general'
        ];
        
        $interesTexto = $request->interes ? ($intereses[$request->interes] ?? $request->interes) : 'No especificado';
        $mensajeWhatsApp .= "*Servicio de interés:* " . $interesTexto . "\n";
        $mensajeWhatsApp .= "*Mensaje:* " . ($request->mensaje ?: 'Sin mensaje adicional') . "\n\n";
        $mensajeWhatsApp .= "📅 Enviado desde formulario web KapitalHaus";
        
        // Codificar mensaje para URL
        $mensajeCodificado = urlencode($mensajeWhatsApp);
        
        // URL de WhatsApp
        $urlWhatsApp = "https://wa.me/{$numero}?text={$mensajeCodificado}";
        
        return response()->json([
            'success' => true,
            'url' => $urlWhatsApp,
            'message' => 'Redirigiendo a WhatsApp...'
        ]);
    }
}