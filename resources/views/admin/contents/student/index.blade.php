@extends('admin.main')

@section('content')
    

<div class="pagetitle">
    <h1>Student</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="index.html">Home</a></li>
        <li class="breadcrumb-item">Pages</li>
        <li class="breadcrumb-item active">Blank</li>
      </ol>
    </nav>
  </div><!-- End Page Title -->

  <section class="section">
    <div class="card">
        <div class="card-body">
            <a href="/admin/student/create" class="btn btn-primary m-3">Tambah Student</a>
            <div class="table-responsive">
                <table class="table">
                    <tr>
                        <th>Nomor</th>
                        <th>Nama</th>
                        <th>Nim</th>
                        <th>Major</th>
                        <th>Class</th>
                        <th>Course</th>
                        <th>Action</th>
                    </tr>

                    @foreach ($students as $student)

                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $student->name }}</td>
                        <td>{{ $student->nim }}</td>
                        <td>{{ $student->major }}</td>
                        <td>{{ $student->class }}</td>
                        <td>{!! $student->course_id ?? '<span class="badge bg-danger"> Belum mengikuti Course</span>' !!}  </td>
                        <td class="d-flex">
                            <a href="{{ route('student.edit', $student->id) }}" class="btn btn-warning me-2">Edit</a>
                            <form action="/admin/student/delete/{{ $student->id }}" method="POST">
                              @method('DELETE')
                              @csrf
                              <button class="btn btn-danger" type="submit" onclick="retrun confrim('Apakah anda yakin?')">Hapus</button>
                            </form>

                        </td>

                    </tr>
                        
                    @endforeach
                </table>
            </div>
        </div>

    </div>
  </section>
@endsection