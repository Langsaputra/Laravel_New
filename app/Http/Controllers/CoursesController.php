<?php

namespace App\Http\Controllers;

use App\Models\Courses;
use Illuminate\Http\Request;

class CoursesController extends Controller
{
    public function index(){
        // mendapatkan data student dari database
        $Courses = Courses::all();

        // panggil view dan kirim data ke view
        return view('admin.contents.courses.index', [
            'courses' => $Courses
        ]);
    }
}
