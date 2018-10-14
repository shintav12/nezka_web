<?php

namespace App\Http\Controllers;

use App\Categories;
use App\Clients;
use App\ClientTypes;
use App\Models\Contact;
use App\Services;
use App\ServicesCustomer;
use App\Slider;
use App\SocialMedia;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;


class PagesController extends Controller
{
    public function home()
    {
        $sliders = Slider::where("status",1)->get(["title",DB::raw('concat("'.config("app.path_url").'",slider_banner.image) as image'),"subtitle"]);
        $services = Services::where("status",1)->get(["name",DB::raw('concat("'.config("app.path_url").'",services.image) as image'),"description"]);
        $client_types = ClientTypes::get(["id","name",DB::raw('concat("'.config("app.path_url").'",customer_type.image) as image'),"description","type","slug"]);
        $clients = Clients::get(["name",DB::raw('concat("'.config("app.path_url").'",client.image) as image',"slug")]);
        $social_media = SocialMedia::get(["name","url"]);
        $categories = Categories::get(["name","slug"]);
        $data["sliders"] = $sliders;
        $data["services"] = $services;
        $data["client_types"] = $client_types;
        $data["clients"] = $clients;
        $data["categories"] = $categories;
        $data["social_medias"] = $social_media;
        return view('pages.landing',$data);
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

    public function save(Request $request)
    {
        try {
            $name = Input::get('name');
            $client_type = Input::get('customer_type');
            $services = Input::get('services_types');
            $mail = Input::get('email');
            $bussiness_name = Input::get('company');
            $phone = Input::get('phone');

            $contact_us = new Contact();

            $contact_us->name = $name;
            $contact_us->mail = $mail;
            $contact_us->bussiness_name = $bussiness_name;
            $contact_us->phone =$phone;
            $contact_us->client_type = $client_type;
            $contact_us->services = $services;

            $contact_us->save();
            return response(json_encode(array("error" => 0, "id" => $contact_us->id)), 200);
        }catch (Exception $exception){
            return response(json_encode(array("error" => 1)), 200);
        }
    }

    public function projects($slug){
        $social_media = SocialMedia::get(["name","url"]);
        $categories = Categories::get(["name","slug"]);
        $data["categories"] = $categories;
        $data["social_medias"] = $social_media;
        return view('pages.project',$data);
    }

    public function whoyouare($slug){
        $social_media = SocialMedia::get(["name","url"]);
        $customer_type = ClientTypes::where('slug',$slug)->first(["id","name","description"]);
        $services_customer = ServicesCustomer::where("status",1)->get(["name",DB::raw('concat("'.config("app.path_url").'",services_customer.image) as image'),"description"]);
        $data["social_medias"] = $social_media;
        $data["customer_type"] = $customer_type;

        $data["services_customer"] = $services_customer;

        return view('pages.who_you_are',$data);
    }

    public function blog()
    {
        return view('pages.blog');
    }

    public function portafolio()
    {
        return view('pages.portafolio');
    }

    public function clients($slug){
        $social_media = SocialMedia::get(["name","url"]);
        $customer_type = ClientTypes::where('slug',$slug)->get(["id","name","description"]);
        $data["social_medias"] = $social_media;
        $data["customer_type"] = $customer_type;

        return view('pages.who_you_are',$data);
    }
}
