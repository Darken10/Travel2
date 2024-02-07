<?php

namespace App\Http\Controllers;

use App\Http\Requests\Voyage\SearchFormRequest;
use App\Models\Compagnie;
use App\Models\Root\Ville;
use App\Models\Voyage\Course;
use App\Models\Voyage\Ligne;
use App\Models\Voyage\Voyage;
use Illuminate\Http\Request;

class VoyageController extends Controller
{
    function index(){
        $voyages = Voyage::latest()->paginate(12);
        return view('voyage.index',[
            'voyages' => $voyages
        ]);
    }

    function search(SearchFormRequest $request){
        $data = $request->validated();
        $voyages = Voyage::query();
        if($a = $data['compagnie']){
            $compagnies = Compagnie::orWhere('name','like',"%$a%")->orWhere('sigle','like',"%$a%")->get();
            $compagnies_id = [];
            foreach ($compagnies as $compagnie){
                $compagnies_id[]=$compagnie->id;
            }
            //dd($compagnies_id);

            $voyages = $voyages->whereIn('compagnie_id',$compagnies_id)->get();
            //dd($voyages);
        }

        if($a = $data['depart']){
            $villes = Ville::orWhere('name','like',"%$a%")->get();
            $villes_id = [];
            foreach ($villes as $ville){
                $villes_id[] = $ville->id;
            }
            
            $lignes = Ligne::query()->whereIn('depart_id',$villes_id)->get();
            
            $lignes_id = [];
            foreach($lignes as $ligne){
                $lignes_id[] = $ligne->id;
            }
            $courses = Course::whereIn('ligne_id',$lignes_id)->get();

            $courses_id = [];
            foreach($courses as $course){
                $courses_id[] = $course->id;
            }
            $voyages = $voyages->whereIn('course_id',$courses_id);
        }

        if($a = $data['destination']){
            $villes = Ville::orWhere('name','like',"%$a%")->get();
            $villes_id = [];
            foreach ($villes as $ville){
                $villes_id[] = $ville->id;
            }
            
            $lignes = Ligne::query()->whereIn('destination_id',$villes_id)->get();
            
            $lignes_id = [];
            foreach($lignes as $ligne){
                $lignes_id[] = $ligne->id;
            }
            $courses = Course::whereIn('ligne_id',$lignes_id)->get();

            $courses_id = [];
            foreach($courses as $course){
                $courses_id[] = $course->id;
            }
            $voyages = $voyages->whereIn('course_id',$courses_id);
            
        }

        if($a = $data['heure']){
            $courses = Course::orWhere('course$courses_depart','>=',"$a")->get();
            $courses_id = [];
            foreach($courses as $course){
                $courses_id[] = $course->id;
            }
            $voyages = $voyages->whereIn('course_id',$courses_id);
        }

        $voyages = $voyages;
        return view('voyage.index',[
            'voyages' => $voyages
        ]);
    }
}
