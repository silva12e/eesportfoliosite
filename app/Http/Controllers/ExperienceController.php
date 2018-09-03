<?php

namespace App\Http\Controllers;

use App\models\Experience;
use http\Env\Response;
use Illuminate\Http\Request;

class ExperienceController extends Controller
{
    public function index() {
        $experienceItems = Experience::all();
        if ($experienceItems)
            return Response($experienceItems);
        return null;
    }

    public function store(Request $request) {
        if($request) {
            $experienceItems = new Experience();
            $experienceItems -> company_name = $request ->companyName;
            $experienceItems -> job_role = $request -> jobRole;
            $experienceItems -> description = $request -> description;
            $experienceItems -> job_img = $request -> jobImg;
            $experienceItems -> date_from = $request -> dateFrom;
            $experienceItems -> date_to = $request -> dateTo;
            $experienceItems->save();
        }
    }

    public function show($id) {
        $experience = Experience::find($id);
        return response($experience);
    }


    public function update(Request $request, $id) {
        $experienceItem = Experience::find($id);
        if ($experienceItem) {
            $experienceItem -> companyName = $request -> company_name;
            $experienceItem -> jobRole = $request -> job_role;
            $experienceItem -> description = $request -> description;
            $experienceItem -> jobImg = $request -> job_img;
            $experienceItem -> dateFrom = $request -> date_from;
            $experienceItem -> dateTo = $request -> date_to;
            $experienceItem-> save();
        }
    }

    public function create() {
        return null;
    }
    public function destroy($id) {
        dd('hi');
        $experience = Experience::find($id);
        if($experience)
            $experience->delete();
    }
}
