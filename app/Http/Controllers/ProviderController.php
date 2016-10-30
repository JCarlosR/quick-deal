<?php

namespace App\Http\Controllers;

use App\Application;
use App\ServiceRequest;
use Illuminate\Http\Request;

use App\Http\Requests;

class ProviderController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function getApply()
    {
        $requirements = ServiceRequest::where('service_type_id', auth()->user()->service_type_id)
            ->where('status', 'En espera')
            ->get();
        return view('dashboard.apply')->with(compact('requirements'));
    }

    public function postApply(Request $request)
    {
        $rules = [
            'service_request_id' => 'required|exists:service_requests,id'
        ];
        $messages = [
            'service_request_id.required' => 'Debe seleccionar la solicitud a la que desea aplicar.',
            'service_request_id.exists' => 'La solicitud indicada no está disponible.'
        ];
        $validator = validator()->make($request->all(), $rules, $messages);

        $service_request_id = $request->get('service_request_id');
        if ($service_request_id) {
            $service_request = ServiceRequest::find($service_request_id);
        } else $service_request = null;

        $validator->after(function($validator) use($service_request) {
            if ($service_request && $service_request->status != 'En espera') { // it happens when the request was taken
                $validator->errors()->add('service_request_id', 'La solicitud indicada no está disponible.');
            }
        });

        if ($validator->fails()) {
            return back()
                ->withErrors($validator)
                ->withInput();
        }

        // Validation successful
        $application = new Application();
        $application->provider_id = auth()->user()->id;
        $application->service_request_id = $service_request_id;
        $application->save();

        $service_request->status = 'Asignado';
        $service_request->save();

        return redirect('/applications')->with('notification', 'Has aplicado correctamente a la solicitud seleccionada.');
    }

    public function applications()
    {
        $applications = Application::where('provider_id', auth()->user()->id)->get();
        return view('dashboard.applications')->with(compact('applications'));
    }
}
