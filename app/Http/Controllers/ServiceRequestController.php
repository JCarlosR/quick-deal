<?php

namespace App\Http\Controllers;

use App\ServiceRequest;
use DateTime;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Auth;

class ServiceRequestController extends Controller
{
    public function store(Request $request)
    {
        $rules = [
            'type' => 'required|exists:service_types,id',
            'request_date' => 'required|date_format:d/m/Y|after:yesterday',
            'request_time' => 'required|date_format:H:i'
        ];
        $messages = [
            'type.required' => 'Seleccione el tipo de servicio que desea solicitar.',
            'type.exists' => 'Ha solicitado un servicio que no está disponible.',
            'request_date.required' => 'Indique la fecha para la que necesita el servicio.',
            'request_date.date' => 'Ingrese una fecha adecuada.',
            'request_date.after' => 'No es posible solicitar un servicio en fechas pasadas.',
            'request_time.required' => 'Ingrese la hora para la que necesita el servicio.',
            'request_time.date_format' => 'Ingrese una hora válida.'
        ];
        $this->validate($request, $rules, $messages);

        // Validation successful
        $service = new ServiceRequest();
        $service->user_id = Auth::user()->id;
        $service->service_type_id = $request->get('type');
        $request_date = $request->get('request_date');
        $service->request_date = DateTime::createFromFormat('d/m/Y', $request_date);
        $service->request_time = $request->get('request_time');
        $service->save();

        return back()->with('notification', 'Su solicitud se ha registrado correctamente !');
    }
}
