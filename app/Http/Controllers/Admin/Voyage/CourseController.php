<?php

namespace App\Http\Controllers\Admin\Voyage;

use App\Models\Voyage\Course;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\Admin\Voyage\CourseFormRequest;
use App\Models\Voyage\Ligne;

class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     */

     public function index()
     {
        $courses = Course::latest()->paginate(12);
         return view('admin.voyage.course.index',[
             'courses'=> $courses,
         ]);
     }
 
     /**
      * Show the form for creating a new resource.
      */
     public function create()
     {
         $course = new Course();
         return view('admin.voyage.course.formulaire',[
             'course'=> $course,
         ]);
     }
 
     /**
      * Store a newly created resource in storage.
      */
     public function store(CourseFormRequest $request)
     {
         $data = $request->validated();
         $data['user_id']=Auth::user()->id;
         $ligne = Ligne::query()->where('depart_id',$data['depart_id'])->Where('destination_id',$data['destination_id'])->first();
         $data['ligne_id'] = $ligne->id;
         //dd($data);
         Course::create($data);
         return to_route('admin.voyage.course.index')->with('success','Votre article bien été creer');
     }
 
 
     /**
      * Show the form for editing the specified resource.
      */
     public function edit(Course $course)
     {
         //$course = new Course();
         return view('admin.voyage.course.formulaire',[
             'course'=> $course,
         ]);
     }
 
     /**
      * Update the specified resource in storage.
      */
     public function update(CourseFormRequest $request, Course $course)
     {
        $data = $request->validated();
        $data['user_id']=Auth::user()->id;
        $ligne = Ligne::query()->where('depart_id',$data['depart_id'])->Where('destination_id',$data['destination_id'])->first();
        $data['ligne_id'] = $ligne->id;
        
         $course->update($data);
         return to_route('admin.voyage.course.index')->with('success','Votre article bien été mis a jours');
     }
 
     /**
      * Remove the specified resource from storage.
      */
     public function destroy(Course $course)
     {
         $course->delete();
         return to_route('admin.voyage.course.index')->with('success','Votre article bien été supprimer');
 
     }
 
 
     function likeListCourse(Course $course)
     {
         
         return view('admin.voyage.course.like.list', [
             'likes' => $course->likes()->latest()->paginate(50),
         ]);
     }
}
