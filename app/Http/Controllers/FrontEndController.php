<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Facts;
use App\Models\Features;
use App\Models\Privacy;
use App\Models\Projects;
use App\Models\Services;
use App\Models\Teammembers;
use App\Models\TermsAndConditions;
use App\Models\Testimonials;
use Illuminate\Http\Request;

class FrontEndController extends Controller
{
    

    public function welcome()
    {
        $features     = Features::take(3)->get();
        $facts        = Facts::all()->first();
        $services     = Services::take(6)->get();
        $projects     = Projects::take(6)->get();
        $testimonials = Testimonials::take(3)->get();
        $teamMembers  = Teammembers::take(3)->get();
        $categories   = Category::take(3)->get();
        $projectss    = Projects::inRandomOrder()->take(9)->get();
        $data         = compact('features', 'facts', 'services', 'projects', 'projectss', 'testimonials', 'teamMembers', 'categories');
        return view('welcome', $data);
    }
    public function about()
    {
        $projectss   = Projects::inRandomOrder()->take(9)->get();
        $features    = Features::all();
        $facts       = Facts::all()->first();
        $teamMembers = Teammembers::all();
        return view('Frontend.about', compact('features', 'projectss', 'facts', 'teamMembers'));
    }
    
    public function services()
    {
        $projectss    = Projects::inRandomOrder()->take(9)->get();
        $testimonials = Testimonials::take(3)->get();
        $services     = Services::all();
        return view('Frontend.services', compact('services', 'testimonials', 'projectss'));
    }
    
    public function projects()
    {
        $projectss    = Projects::inRandomOrder()->take(9)->get();
        $categories   = Category::all();
        $projects     = Projects::all();
        return view('Frontend.project', compact('projects', "categories", 'projectss'));
    }
    
    public function team()
    {
        $projectss    = Projects::inRandomOrder()->take(9)->get();
        $teamMembers  = Teammembers::all();
        return view('Frontend.team', compact('teamMembers', 'projectss'));
    }

    public function testimonial()
    {
        $projectss    = Projects::inRandomOrder()->take(9)->get();
        $testimonials = Testimonials::all();
        return view('Frontend.testimonial', compact('testimonials', 'projectss'));
    }

    public function contact()
    {
        $projectss    = Projects::inRandomOrder()->take(9)->get();
        return view('Frontend.contact', compact('projectss'));
    }
    
    public function privacy()
    {
        $privacyPolicies = Privacy::all();
        $projectss       = Projects::inRandomOrder()->take(9)->get();
        return view('Frontend.privacy-policy', compact('privacyPolicies', 'projectss'));
    }
    
    public function terms()
    {
        $terms     = TermsAndConditions::all();
        $projectss = Projects::inRandomOrder()->take(9)->get();
        return view('Frontend.terms', compact('terms', 'projectss'));
    }
    
    public function FAQs()
    {
        
        $projectss = Projects::inRandomOrder()->take(9)->get();
        return view('Frontend.faqs', compact('projectss'));
    }
}
