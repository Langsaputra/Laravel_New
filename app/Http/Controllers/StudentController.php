<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    // method untuk menampilkan halaman student
    public function index(){
        // mendapatkan data student dari database
        $Student = Student::all();

        // panggil view dan kirim data ke view
        return view('admin.contents.student.index', [
            'students' => $Student
        ]);
    }

    public function create(){
        return view('admin.contents.student.create');
    }

    // method untuk menangkap student
    public function store(Request $request){

        $request->validate([
            'name' => 'required',
            'nim' => 'required|numeric',
            'major' => 'required',
            'class' => 'required'

        ]);

        Student::create([
            'name' => $request->name,
            'nim' => $request->nim,
            'major' => $request->major,
            'class' => $request->class
        ]);

        return redirect('/admin/student')->with('pesan', 'data masuk');

    }

    // untuk menampilkan halaman edit
    public function edit($id){
        // cari student berdasarkan id
        $Student = Student::find($id);

        // kirim student ke view edit 
        return view('admin.contents.student.edit', [
        'student' => $Student]);

    }

    public function update($id, Request $request){
        // cari student berdasarkan id
        $Student = Student::find($id);

        $request->validate([
            'name' => 'required',
            'nim' => 'required|numeric',
            'major' => 'required',
            'class' => 'required'

        ]);

        $Student->update([
            'name' => $request->name,
            'nim' => $request->nim,
            'major' => $request->major,
            'class' => $request->class,

        ]);

        return redirect('/admin/student')->with('pesan', 'data sudah teredit');

    }

    public function destroy($id){
        $Student = Student::find($id);

        $Student->delete();

        return redirect('/admin/student')->with('pesan', 'data sudah teredit');
    }
}
