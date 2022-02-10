<?php
namespace App\Http\ViewComposers;

use App\Models\About;
use Illuminate\Contracts\View\View;
use App\Models\Home;
use App\Models\Education;
use App\Models\Experience;
use App\Models\Portafolio;

class MenuComposer
{
    public function compose(View $view)
    {
        $home = Home::find(1);
        $about = About::find(1);
        $educations = Education::get();
        $experiences = Experience::get();
        $portafolios = Portafolio::get();
        $view->with('home', $home)->with('about', $about)->with('educations', $educations)
        ->with('experiences', $experiences)->with('portafolios', $portafolios);
    }
}
