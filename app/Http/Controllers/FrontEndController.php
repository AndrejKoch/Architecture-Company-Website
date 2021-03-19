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
    private $settings;

    public function __construct()
    {
        $this->settings = Settings::find(1);
    }

    public function index()
    {
        $data = [
            'settings' => $this->settings,
            'categories' => Categories::all(),
            'services' => Services::all(),
            'sliders' => Slider::all(),
            'projects' => Projects::all(),
            'partners' => Partners::all(),
            'staticpages' => StaticPage::all()];
        return view('frontend.homepage')->with($data);
    }


    public function project($project_slug)
    {
        $project = Projects::with('gallery')->where('slug', $project_slug)->first();
        $settings = Settings::find(1);

        $data = ["settings" => $settings, "project" => $project];
        return view('frontend.projects')->with($data);
    }

    public function services($service_slug)
    {
        $services = Services::with('gallery')->where('slug', $service_slug)->first();
        $settings = Settings::find(1);

        $data = ["settings" => $settings, "services" => $services];
        return view('frontend.adssingle')->with($data);
    }

    public function projects(){
        $projects = Projects::orderBy('id', 'desc')->paginate(9);
        $settings = Settings::find(1);

        $data = ["settings" => $settings, "projects" => $projects];
        return view('frontend.projectss')->with($data);
    }

    public function categories(){
        $category = Categories::all();
        $projects = Projects::all();

        $data = ["settings" =>  $this->settings, "category" => $category, "projects" => $projects];
        return view('frontend.categories')->with($data);
    }

    public function category($category_slug){
        $category = Categories::where('slug','=',$category_slug)->first();
        $projects = Projects::where('category_id', '=',$category->id)->get();

        $data = ["settings" =>  $this->settings, "projects" => $projects, "category" => $category,];
        return view('frontend.category')->with($data);
    }

    public function about(){
        $staticPages = StaticPage::all();
        $team = Team::all();
        $counter = Counter::all();

        $data = ['counter'=> $counter,'team'=> $team, "staticPages" => $staticPages, "settings" => $this->settings];
        return view('frontend.aboutus')->with($data);
    }

    public function ads(){
        $services = Services::orderBy('id', 'desc')->paginate(9);

        $data = ["settings" =>  $this->settings, "services" => $services];
        return view('frontend.ads')->with($data);
    }
}
