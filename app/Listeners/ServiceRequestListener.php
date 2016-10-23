<?php

namespace App\Listeners;

use App\ServiceRequest;
use Illuminate\Support\Facades\Mail;

class ServiceRequestListener
{
    public function created(ServiceRequest $serviceRequest)
    {
        // Data
        $data['serviceRequest'] = $serviceRequest;

        // Destination
        $target_email = $serviceRequest->user->email;

        Mail::send('emails.service_request_created', $data, function ($message) use ($target_email) {
            $message->from('admin@quickdeal.pe', 'Quick Deal');

            $message->to($target_email)->subject('Tu solicitud se ha registrado correctamente!');
        });
    }
}