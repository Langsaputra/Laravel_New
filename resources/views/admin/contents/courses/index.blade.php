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
            <div class="table-responsive">
                <table class="table">
                    <tr>
                        <th>Nomor</th>
                        <th>Nama</th>
                        <th>Category</th>
                        <th>Desc</th>
                        <th>class</th>
                        <th>action</th>
                    </tr>

                    @foreach ($courses as $courses)

                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $courses->name }}</td>
                        <td>{{ $courses->category }}</td>
                        <td>{{ $courses->desc }}</td>
                        <td>{{ $courses->class }}</td>
                        <td>
                            <a href="" class="btn btn-warning">Edit</a>
                            <a href="" class="btn btn-danger">Delete</a>
                        </td>

                    </tr>
                        
                    @endforeach
                </table>
            </div>
        </div>

    </div>
  </section>
@endsection

