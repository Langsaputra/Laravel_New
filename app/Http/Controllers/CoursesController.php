<?php

namespace App\Http\Controllers;

use App\Models\Courses;
use Illuminate\Http\Request;

class CoursesController extends Controller
{
    public function index(){
        // mendapatkan data student dari database
        $courses = Courses::all();

        // panggil view dan kirim data ke view
        return view('admin.contents.courses.index', [
            'courses' => $courses
        ]);
    }

    public function create(){
        return view('admin.contents.courses.create');
    }

    // method untuk menangkap student
    public function store(Request $request){

        $request->validate([
            'name' => 'required',
            'category' => 'required',
            'desc' => 'required',
        ]);

        Courses::create([
            'name' => $request->name,
            'category' => $request->category,
            'desc' => $request->desc,
        ]);

        return redirect('/admin/courses')->with('pesan', 'data masuk');

    }

    // untuk menampilkan halaman edit
    public function edit($id){
        // cari student berdasarkan id
        $courses = Courses::find($id);

        // kirim student ke view edit 
        return view('admin.contents.courses.edit', [
        'courses' => $courses]);

    }

    public function update($id, Request $request){
        // cari student berdasarkan id
        $courses = Courses::find($id);

        $request->validate([
            'name' => 'required',
            'category' => 'required',
            'desc' => 'required',
            'class' => 'required'

        ]);

        $courses->update([
            'name' => $request->name,
            'category' => $request->category,
            'desc' => $request->desc,

        ]);

        return redirect('/admin/courses')->with('pesan', 'data sudah teredit');

    }

    public function destroy($id){
        $courses = Courses::find($id);

        $courses->delete();

        return redirect('/admin/courses')->with('pesan', 'data sudah teredit');
    }
}
