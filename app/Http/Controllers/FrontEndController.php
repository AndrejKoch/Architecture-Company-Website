<?php

namespace App\Http\Controllers;

use App\Categories;
use App\Counter;
use App\Partners;
use App\Projects;
use App\Services;
use App\Slider;
use App\StaticPage;
use App\Gallery;
use App\Settings;
use App\Team;
use Illuminate\Http\Request;

class FrontEndController extends Controller
{
    public function index()
    {
        $services = Services::all();
        $sliders = Slider::all();
        $projects = Projects::all();
        $partners = Partners::all();
        $staticPages = StaticPage::all();
        $category = Categories::all();
        $settings = Settings::Find(1);


        $data = ['settings' => $settings, 'category' => $category, 'services' => $services, 'sliders' => $sliders, 'projects' => $projects, 'partners' => $partners, 'staticpage' => $staticPages];


        return view('frontend.homepage')->with($data);

    }


    public function project($project_slug)
    {
        $project = Projects::where('slug','=',$project_slug)->first();
        $gallery = Gallery::where('project_id', '=', $project->id)->get();
        $settings = Settings::Find(1);


        $data = ["settings" => $settings, "project" => $project, "gallery" => $gallery];
        return view('frontend.projects')->with($data);
    }

    public function services($service_slug)
    {
        $services = Services::where('slug','=',$service_slug)->first();
        $gallery = Gallery::where('service_id', '=', $services->id)->get();
        $settings = Settings::Find(1);


        $data = ["settings" => $settings, "services" => $services, 'gallery' => $gallery];
        return view('frontend.adssingle')->with($data);
    }

    public function projects(){
        $projects = Projects::all();
        $settings = Settings::Find(1);


        $data = ["settings" => $settings, "projects" => $projects];
        return view('frontend.projectss')->with($data);
    }

    public function categories(){
        $category = Categories::all();
        $settings = Settings::Find(1);
        $projects = Projects::all();


        $data = ["settings" => $settings, "category" => $category, "projects" => $projects];
        return view('frontend.categories')->with($data);
    }

    public function category($category_slug){
        $category = Categories::where('slug','=',$category_slug)->first();
        $projects = Projects::where('category_id', '=',$category->id)->get();
        $settings = Settings::Find(1);



        $data = ["settings" => $settings, "projects" => $projects, "category" => $category,];
        return view('frontend.category')->with($data);

    }

    public function about(){
        $staticPages = StaticPage::all();
        $settings = Settings::Find(1);
        $team = Team::all();
        $counter = Counter::all();

        $data = ['counter'=> $counter,'team'=> $team, "staticPages" => $staticPages, "settings" => $settings];
        return view('frontend.aboutus')->with($data);

    }

}
