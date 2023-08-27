@extends('dashboard.layouts.master')

@section('title', 'Courses')

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-dark">Create Courses</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('courses.index') }}">Courses</a></li>
                            <li class="breadcrumb-item active">Dashboard</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-sm-12">
                        @include('dashboard.alerts.success')
                        @include('dashboard.alerts.error')
                    </div>
                    <div class="col-sm-12">
                        <a href="{{ route('courses.create') }}" class="btn btn-primary" style="margin-bottom: 20px">Create</a>
                    </div>
                    <!-- left column -->
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Courses</h3>
                            </div>

                            <!-- /.card-header -->
                            <div class="card-body">
                                @if($courses)
                                    <table id="example1" class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>photo</th>
                                                <th>name</th>
                                                <th>description</th>
                                                <th>price</th>
                                                <th>Add Section</th>
                                                <th>Section</th>
                                                <th colspan="2">opeation</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @forelse ($courses as $num => $course)
                                                <tr>
                                                    <td>{{ $num + 1 }}</td>
                                                    <td><img width="100" src="{{ asset('assets/dashboard/upload') . '/' . $course->photo }}" alt=""></td>
                                                    <td>{{ $course->name }}</td>
                                                    <td>{{ $course->descriptoin }}</td>
                                                    <td>{{ $course->price }}</td>
                                                    <td><a href="{{ route('sections.create', $course->id) }}"
                                                            class="btn btn-info">Add Sections</a></td>
                                                    <td><a href="{{ route('sections.index', $course->id) }}"
                                                            class="btn btn-success">Sections</a></td>
                                                    <td><a href="{{ route('courses.edit', $course->id) }}"
                                                            class="btn btn-success">Edit</a></td>
                                                    <td>
                                                        <form action="{{ route('courses.destroy', $course->id) }}" method="post">
                                                            @csrf
                                                            @method('delete')
                                                            <button type="submit" class="btn btn-danger">Delete</button>
                                                        </form>
                                                    </td>
                                                </tr>
                                            @empty
                                                There are no Categories to display
                                            @endforelse
                                        </tbody>

                                    </table>
                                @else
                                    There are no Course to display
                                @endif
        
                            </div>
                            <!-- /.card-body -->
                   
                        </div>
                        <!-- /.card -->
                        <div class="row">
                            <div class="col-sm-12">
                                {{ $courses->links() }}
                            </div>
                        </div>
                    </div>
                    <!--/.col (left) -->
                </div>
                <!-- /.row -->
            </div><!--/. container-fluid -->
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
@endsection
@section('js')

@endsection
@section('css')

@endsection
