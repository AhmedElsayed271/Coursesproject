@extends('dashboard.layouts.master')

@section('title', 'Categories')

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-dark">Create Category</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('categories.index') }}">Categories</a></li>
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
                        <a href="{{ route('categories.create') }}" class="btn btn-primary" style="margin-bottom: 20px">Create</a>
                    </div>
                    <!-- left column -->
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Categories</h3>
                            </div>

                            <!-- /.card-header -->
                            <div class="card-body">
                                @if($categories->count() > 0)
                                <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>name</th>
                                            <th>status</th>
                                            <th colspan="2">opeation</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($categories as $num => $category)
                                            <tr>
                                                <td>{{ $num + 1 }}</td>
                                                <td>{{ $category->name }}</td>
                                                <td>{{ $category->status }}</td>
                                                <td><a href="{{ route('categories.edit', $category->id) }}"
                                                        class="btn btn-success">Edit</a></td>
                                                <td>
                                                    <form action="{{ route('categories.destroy', $category->id) }}" method="post">
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
                                    There are no Categories to display
                                @endif
                             
                            </div>
                            <!-- /.card-body -->
                   
                        </div>
                        <!-- /.card -->
                        <div class="row">
                            <div class="col-sm-12">
                                {{ $categories->links() }}
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
