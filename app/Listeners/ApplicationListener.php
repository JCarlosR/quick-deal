<?php

namespace App\Listeners;

use App\Application;
use Illuminate\Support\Facades\Mail;

class ApplicationListener
{
    public function created(Application $application)
    {
        // Notify application to the client
        $client = $application->service_request->user;
        // Data
        $data['name'] = $client->name;
        // Destination
        $target_email = $client->email;
        // Send mail
        Mail::send('emails.notify_application_created', $data, function ($message) use ($target_email) {
            $message->from('admin@quickdeal.pe', 'Quick Deal');

            $message->to($target_email)->subject('Un proveedor ha aplicado a tu requerimiento!');
        });

        // Notify application to the provider
        $provider = $application->provider;
        // Data
        $data['name'] = $provider->name;
        $data['client'] = $client->name;
        // Destination
        $target_email = $provider->email;
        // Send mail
        Mail::send('emails.confirm_application_created', $data, function ($message) use ($target_email) {
            $message->from('admin@quickdeal.pe', 'Quick Deal');

            $message->to($target_email)->subject('Has aplicado correctamente a un nuevo requerimiento!');
        });
    }

    public function confirmed(Application $application)
    {
        // If the application was rejected, don't fire the mails
        if ($application->status == 'Rechazado')
            return;

        // Notify confirmation to the client
        $client = $application->service_request->user;
        // Data
        $data['name'] = $client->name;
        // Destination
        $target_email = $client->email;
        // Send mail
        Mail::send('emails.notify_confirmation_client', $data, function ($message) use ($target_email) {
            $message->from('admin@quickdeal.pe', 'Quick Deal');

            $message->to($target_email)->subject('Has confirmado un servicio correctamente!');
        });

        // Notify application to the provider
        $provider = $application->provider;
        // Data
        $data['name'] = $provider->name;
        $data['client'] = $client->name;
        // Destination
        $target_email = $provider->email;
        // Send mail
        Mail::send('emails.notify_confirmation_provider', $data, function ($message) use ($target_email) {
            $message->from('admin@quickdeal.pe', 'Quick Deal');

            $message->to($target_email)->subject('El cliente ha confirmado tu servicio!');
        });
    }
}