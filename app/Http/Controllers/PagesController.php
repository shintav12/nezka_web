<?php

namespace App\Http\Controllers;

use App\Categories;
use App\Clients;
use App\ClientTypes;
use App\GalleryWork;
use App\Models\Contact;
use App\Models\Work;
use App\News;
use App\Projects;
use App\Services;
use App\ServicesCustomer;
use App\Slider;
use App\SocialMedia;
use App\Works;
use App\Utils;
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
        $clients = Clients::where('status',1)->get(["name",DB::raw('concat("'.config("app.path_url").'",client.image) as image'),"slug"]);
        $social_media = SocialMedia::get(["name","url"]);
        $news = News::orderBy('created_at','desc')->limit(3)->get(["title","subtitle","url",DB::raw('concat("'.config("app.path_url").'",blog.image) as image')]);
        $categories = Categories::get(["name","slug"]);
        $works = Works::join('project_type','project_type.id','project_type_description.project_type_id')
            ->join('project','project.id','project_type_description.project_id')
            ->join('client','client.id','project.client_id')
            ->where('project.status',1)
            ->orderByRaw('RAND()')
            ->limit(8)
            ->get(["project_type_description.name",DB::raw('project_type_description.slug as work_slug'),DB::raw('project_type.slug as type_slug'),
                DB::raw('concat("'.config("app.path_url").'",project_type_description.image) as image'),
                DB::raw('client.name as client_name')]);

        $data["sliders"] = $sliders;
        $data["services"] = $services;
        $data["client_types"] = $client_types;
        $data["clients"] = $clients;
        $data["works"] = $works;
        $data["news"] = $news;
        $data["categories"] = $categories;
        $data["social_medias"] = $social_media;
        return view('pages.index',$data);
    }

    public function SaveContact(Request $request)
    {
        try {
            $name = Input::get('name');
            $mail = Input::get('email');
            $bussiness_name = Input::get('company');
            $phone = Input::get('phone');
            $message = Input::get('message');

            $contact_us = new Contact();

            $contact_us->name = $name;
            $contact_us->mail = $mail;
            $contact_us->bussiness_name = $bussiness_name;
            $contact_us->phone =$phone;
            $contact_us->message = $message;

            $contact_us->save();
            return response(json_encode(array("error" => 0, "id" => $contact_us->id)), 200);
        }catch (Exception $exception){
            return response(json_encode(array("error" => 1)), 200);
        }
    }

    public function portofolio(){
        $categories = Categories::get(["name","slug"]);
        $works = Works::join('project_type','project_type.id','project_type_description.project_type_id')
            ->join('project','project.id','project_type_description.project_id')
            ->join('client','client.id','project.client_id')
            ->where('project.status',1)
            ->orderByRaw('RAND()')
            ->get(["project_type_description.name",DB::raw('project_type_description.slug as work_slug'),DB::raw('project_type.slug as type_slug'),
                DB::raw('concat("'.config("app.path_url").'",project_type_description.image) as image'),
                DB::raw('client.name as client_name')]);

        $data["works"] = $works;
        $data["client_name"] = "";;
        $data["categories"] = $categories;
        return view('pages.portofolio',$data);
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
        $work = Works::where('slug',$slug)->first();
        $related_works = $works = Works::join('project_type','project_type.id','project_type_description.project_type_id')
        ->join('project','project.id','project_type_description.project_id')
        ->join('client','client.id','project.client_id')
        ->where('project_type_description.project_type_id',$work->project_type_id)
        ->where('project_type_description.status',1)
        ->orderByRaw('RAND()')
        ->get(["project_type_description.name",DB::raw('project_type_description.slug as work_slug'),DB::raw('project_type.slug as type_slug'),
            DB::raw('concat("'.config("app.path_url").'",project_type_description.image) as image'),
            DB::raw('client.name as client_name')]);
        $project = Projects::where('id',$work->project_id)->first();
        $client = Clients::where('id',$project->client_id)->first();
        $images = GalleryWork::where('project_description_id',$work->id)->get([DB::raw('concat("'.config("app.path_url").'",project_images.image) as image'),"type","video"]);
        $videos_parsed = [];
        $clean = "";
        foreach($images as $image){
            if($image->type == 'video')
            $image->video = Utils::parseHtml($clean, $image->video);
        }
        
        $type = Categories::where('id',$work->project_type_id)->first();
        $data["categories"] = $categories;
        $data["work"] = $work;
        $data["related_works"] = $related_works;
        $data["type"] = $type;
        $data["project"] = $project;
        $data["client"] = $client;
        $data["videos"] = $videos_parsed;
        $data["images"] = $images;
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

    public function clients($slug){
        $social_media = SocialMedia::get(["name","url"]);
        $customer_type = ClientTypes::where('slug',$slug)->get(["id","name","description"]);
        $categories = Categories::get(["name","slug"]);
        $client = Clients::where("slug",$slug)->first();
        $works = Works::join('project_type','project_type.id','project_type_description.project_type_id')
            ->join('project','project.id','project_type_description.project_id')
            ->join('client','client.id','project.client_id')
            ->where('project.client_id',$client->id)
            ->orderByRaw('RAND()')
            ->get(["project_type_description.name",DB::raw('project_type_description.slug as work_slug'),DB::raw('project_type.slug as type_slug'),
                DB::raw('concat("'.config("app.path_url").'",project_type_description.image) as image'),
                DB::raw('client.name as client_name')]);
        $data["works"] = $works;
        $data["client"] = $client;
        $data["client_name"] = "- ".$client->name;
        $data["categories"] = $categories;
        $data["social_medias"] = $social_media;
        $data["customer_type"] = $customer_type;

        return view('pages.portofolio',$data);
    }
}
