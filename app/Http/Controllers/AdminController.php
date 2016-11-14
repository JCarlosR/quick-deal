<?php

namespace App\Http\Controllers;

use App\ServiceType;
use App\User;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Mail;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin');
    }

    public function index()
    {
        $providers = User::where('provider', true)->get();
        return view('providers.index')->with(compact('providers'));
    }

    public function create()
    {
        $service_types = ServiceType::all();
        return view('providers.create')->with(compact('service_types'));
    }

    public function store(Request $request)
    {
        $rules = [
            'name' => 'required|min:5|max:120',
            'address' => 'required|min:5|max:255',
            'region' => 'required|min:3|max:100',
            'district' => 'required|min:3|max:100',
            'service_type' => 'exists:service_types,id',

            'contract_email' => 'email',
            'contract_cellphone' => 'min:9',
            'contract_phone' => 'min:6',
            'payment_email' => 'email',
            'payment_cellphone' => 'min:9',
            'payment_phone' => 'min:6',

            'email' => 'required|email',
            'password' => 'required|min:6'
        ];
        $messages = [
            'name.required' => 'Olvidó ingresar el nombre del proveedor.',
            'name.min' => 'Por favor ingrese el nombre completo del proveedor.',
            'name.max' => 'El nombre del proveedor no debe exceder los 120 caracteres.',
            'address.required' => 'Olvidó ingresar la dirección del proveedor.',
            'address.min' => 'Ingrese al menos 5 caracteres para la dirección.',
            'address.max' => 'La dirección no debe exceder los 255 caracteres.',
            'region.required' => 'Olvidó ingresar la región o departamento del proveedor.',
            'region.min' => 'Ingrese al menos 3 caracteres para la región o departamento.',
            'region.max' => 'La región no debe exceder los 100 caracteres.',
            'district.required' => 'Olvidó ingresar el distrito del proveedor.',
            'district.min' => 'Ingrese al menos 3 caracteres para el distrito.',
            'district.max' => 'El distrito no debe exceder los 100 caracteres.',
            'service_type.exists' => 'El tipo de servicio indicado no está disponible.',

            'contract_email.email' => 'El correo de contacto para contratación no es válido.',
            'contract_cellphone.min' => 'El celular de contacto para contratación debe tener al menos 9 dígitos.',
            'contract_phone.min' => 'El teléfono de contacto para contratación debe tener al menos 6 dígitos.',

            'payment_email.email' => 'El correo de contacto para pagos no es válido.',
            'payment_cellphone.min' => 'El celular de contacto para pagos debe tener al menos 9 dígitos.',
            'payment_phone.min' => 'El teléfono de contacto para pagos debe tener al menos 6 dígitos.',

            'email.required' => 'Es necesario definir un e-mail principal para el inicio de sesión.',
            'email.email' => 'El e-mail indicado para la cuenta de usuario es inválido.',
            'password.required' => 'Es obligatorio ingresar una contraseña paral a cuenta de usuario.',
            'password.min' => 'La contraseña debe presentar al menos 6 caracteres.'
        ];
        $this->validate($request, $rules, $messages);

        $user = new User();
        $user->name = $request->get('name');
        $user->address = $request->get('address');
        $user->region = $request->get('region');
        $user->district = $request->get('district');
        $user->service_type_id = $request->get('service_type');

        $user->contract_name = $request->get('contract_name');
        $user->contract_email = $request->get('contract_email');
        $user->contract_cellphone = $request->get('contract_cellphone');
        $user->contract_phone = $request->get('contract_phone');

        $user->payment_name = $request->get('payment_name');
        $user->payment_email = $request->get('payment_email');
        $user->payment_cellphone = $request->get('payment_cellphone');
        $user->payment_phone = $request->get('payment_phone');

        $user->professional_profile = $request->get('professional_profile');
        $user->professional_experience = $request->get('professional_experience');
        $user->professional_education = $request->get('professional_education');
        $user->professional_specialty = $request->get('professional_specialty');

        $user->psychologist_comments = $request->get('psychologist_comments');

        $user->email = $request->get('email');
        $user->password = bcrypt( $request->get('password') );
        $user->provider = true;
        $user->save();

        // Send email with default password
        $target_email = $request->get('email');
        $data['name'] = $request->get('name');
        $data['default_password'] = $request->get('password');
        Mail::send('emails.welcome_provider', $data, function ($message) use ($target_email) {
            $message->from('admin@quickdeal.pe', 'Quick Deal');
            $message->to($target_email)->subject('Bienvenido a QuickDeal!');
        });

        return redirect('providers')->with('notification', 'Proveedor registrado con éxito !');
    }
}
