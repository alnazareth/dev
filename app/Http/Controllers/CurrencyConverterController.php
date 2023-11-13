<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Http;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class CurrencyConverterController extends Controller
{
   
    public function index()
{
    // Hacer la llamada a la API y obtener la respuesta
    $apiUrl = "http://openexchangerates.org/api/latest.json?app_id=1895d6bf08514e3fb89c3b9ff5778bf9";
    $response = Http::get($apiUrl);

    // Decodificar la respuesta JSON
    $rates = $response->json();


    // Pasar los datos a la vista
    return view('currency_converter', ['rates' => $rates]);
}

    
    public function convertCurrency(Request $request)
    {
        $amount = $request->input('amount');
        $from = $request->input('from');
        $to = $request->input('to');
    

   // Obtener el ID del usuario o alguna identificación única
  // $userId = auth()->user()->id;

   // Verificar si existe la clave 'conversion_count' en la sesión
   if (!Session::has('conversion_count')) {
       // Si no existe, inicializarla a 0
       Session::put('conversion_count', 0);
   }

   // Obtener el conteo actual de conversiones
   $conversionCount = Session::get('conversion_count');

   // Verificar el límite (en este caso, 5 conversiones)
   $conversionLimit = 5;
   if ($conversionCount >= $conversionLimit) {
       // Si el usuario ha superado el límite, redirigir a una pantalla informativa
       return view('conversion_limit_exceeded');
   }

   // Incrementar el conteo de conversiones
   $conversionCount++;
   Session::put('conversion_count', $conversionCount);


        // Realizar la solicitud a la API de Open Exchange Rates
        $response = Http::get("http://openexchangerates.org/api/latest.json?app_id=1895d6bf08514e3fb89c3b9ff5778bf9");
        $data = $response->json();
    
        // Obtener la tasa de cambio
        $rate = $data['rates'][$to];
    
        // Calcular el monto convertido
        $convertedAmount = $amount * $rate;
    
        // Mostrar la vista de resultados
        return view('currency_result', [
            'amount' => $amount,
            'from' => $from,
            'to' => $to,
            'convertedAmount' => $convertedAmount,
           
           
        ]);
    }
    
}
