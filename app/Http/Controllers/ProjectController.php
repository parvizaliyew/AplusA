<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Project;
use App\Models\ProjectType;


class ProjectController extends Controller
{
    public function index()
    {
        $projects_cari=Project::withTranslations()->where('project_id','1')->get();
        $projects_bitmis=Project::withTranslations()->where('project_id','2')->get();
       return view('front.pages.project',compact('projects_cari','projects_bitmis')); 
    }

    public function project_single($slug)
    {
        $project=ProjectType::where('slug_az',$slug)->orWhere('slug_en',$slug)->orWhere('slug_ru',$slug)->first();
        $projects=Project::withTranslations()->where('project_id',$project->id)->get();
        $projects1=Project::withTranslations()->where('project_id','!=',$project->id)->get();
        return view('front.pages.project-single',compact('projects','projects1','project'));
    }
}
