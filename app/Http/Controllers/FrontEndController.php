<?php

namespace App\Http\Controllers;

use App\Categories;
use App\Partners;
use App\Projects;
use App\Services;
use App\Slider;
use App\StaticPage;
use App\Gallery;
use App\Settings;
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
        $list = Categories::getList();
        $settings = Settings::Find(1);



        $data = ['settings' => $settings, 'list' => $list, 'category' => $category, 'services' => $services, 'sliders' => $sliders, 'projects' => $projects, 'partners' => $partners, 'staticpage' => $staticPages];


        return view('frontend.homepage')->with($data);

    }


    public function project($project_slug)
    {
        $project = Projects::where('slug','=',$project_slug)->first();
        $list = Categories::getList();
        $gallery = Gallery::where('project_id', '=', $project->id)->get();
        $settings = Settings::Find(1);


        $data = ["settings" => $settings, "project" => $project, "list" => $list, "gallery" => $gallery];
        return view('frontend.projects')->with($data);
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
        $list = Categories::getList();


        $data = ["settings" => $settings, "category" => $category, "projects" => $projects, "list" => $list];
        return view('frontend.categories')->with($data);
    }

    public function category($category_slug){
        $category = Categories::where('slug','=',$category_slug)->first();
        $projects = Projects::where('category_id', '=',$category->id)->get();
        $list = Categories::getList();
        $settings = Settings::Find(1);



        $data = ["settings" => $settings, "projects" => $projects, "category" => $category, "list" => $list];
        return view('frontend.category')->with($data);

    }

    public function service(){
        $services = Services::all();
        $settings = Settings::Find(1);

        $data = ["services" => $services, "settings" => $settings];
        return view('frontend.service')->with($data);

    }

}
