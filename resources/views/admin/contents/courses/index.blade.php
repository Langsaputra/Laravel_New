@extends('admin.main')

@section('content')
    

<div class="pagetitle">
    <h1>Courses</h1>
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
            <a href="/admin/courses/create" class="btn btn-primary m-4">Tambah Courses</a>
            <div class="table-responsive">
                <table class="table">
                    <tr>
                        <th>Nomor</th>
                        <th>Nama</th>
                        <th>Category</th>
                        <th>Desc</th>
                        <th>Action</th>
                    </tr>

                    @foreach ($courses as $course)

                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $course->name }}</td>
                        <td>{{ $course->category }}</td>
                        <td>{{ $course->desc }}</td>
                        <td>
                          <a href="{{ route('courses.edit', $course->id) }}" class="btn btn-warning m-2">Edit</a>
                          <form action="/admin/courses/delete/{{ $course->id }}" method="POST">
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

