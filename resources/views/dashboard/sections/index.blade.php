@extends('dashboard.layouts.master')

@section('title', 'Sections')

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-dark">Create Sections</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
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
                        <a href="{{ route('sections.create',$course_id) }}" class="btn btn-primary" style="margin-bottom: 20px">Create</a>
                    </div>
                    <!-- left column -->
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Categories</h3>
                            </div>

                            <!-- /.card-header -->
                            <div class="card-body">
                                @if($sections->count() > 0)
                                <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>name</th>
                                            <th>Section Number</th>
                                            <th>Add Video</th>
                                            <th colspan="2">opeation</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($sections as $num => $section)
                                            <tr>
                                                <td>{{ $num + 1 }}</td>
                                                <td>{{ $section->name }}</td>
                                                <td>{{ $section->Section_no }}</td>

                                                <td><a href="{{ route('videos.create', $section->id) }}"
                                                    class="btn btn-info">Add Video</a></td>
                                                    
                                                <td><a href="{{ route('sections.edit', $section->id) }}"
                                                        class="btn btn-success">Edit</a></td>
                                                <td>
                                                    <form action="{{ route('sections.destroy', $section->id) }}" method="post">
                                                        @csrf
                                                        @method('delete')
                                                        <button type="submit" class="btn btn-danger">Delete</button>
                                                    </form>
                                                </td>
                                            </tr>
                                        @empty
                                        @endforelse
                                    </tbody>

                                </table>
                                @else 
                                    There's no Sections To Display
                                @endif
        
                            </div>
                            <!-- /.card-body -->
                   
                        </div>
                        <!-- /.card -->
                        <div class="row">
                            <div class="col-sm-12">
                                {{ $sections->links() }}
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
