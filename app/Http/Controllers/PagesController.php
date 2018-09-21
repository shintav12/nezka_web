<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;

class PagesController extends Controller
{
    public function home()
    {
        return view('pages.landing');
    }

    public function SaveContact(Request $request)
    {
        try {
            $name = Input::get('name');
            $mail = Input::get('email');
            $bussiness_name = Input::get('company');
            $phone = Input::get('phone');
            $client_type = Input::get('company_type');
            $message = Input::get('message');

            $contact_us = new Contact();

            $contact_us->name = $name;
            $contact_us->mail = $mail;
            $contact_us->bussiness_name = $bussiness_name;
            $contact_us->phone =$phone;
            $contact_us->client_type = $client_type;
            $contact_us->message = $message;

            $contact_us->save();
            return response(json_encode(array("error" => 0, "id" => $contact_us->id)), 200);
        }catch (Exception $exception){
            return response(json_encode(array("error" => 1)), 200);
        }
    }

    public function blog()
    {
        return view('pages.blog');
    }

    public function portafolio()
    {
        return view('pages.portafolio');
    }
}
