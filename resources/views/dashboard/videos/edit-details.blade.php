@extends('dashboard.layouts.master')

@section('title', 'Edit Details Video')

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-dark">Edit Details Video</h1>
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
                    <!-- left column -->
                    <div class="col-md-12">
                        <!-- general form elements -->
                        <div class="card card-primary">
                            <div class="card-header">
                                <h3 class="card-title">Create Details</h3>
                            </div>
                            <!-- /.card-header -->
                            <!-- form start -->
                            <form role="form" method="POST" action="{{ route('videos.update.details', $video->id) }}">
                                @csrf
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Name Of Video</label>
                                        <input type="text" class="form-control" name="name" id="exampleInputEmail1"
                                            placeholder="Enter Name Of Video"
                                            value="{{ old('name', $section->name ?? '') }}">
                                    </div>
                                    @error('name')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">video number</label>
                                        <input type="text" class="form-control" name="video_no" id="exampleInputEmail1"
                                            placeholder="Video number"
                                            value="{{ old('video_no', $video->video_no ?? '') }}">
                                    </div>
                                    @error('video_no')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                    <div class="form-group">
                                        <input type="hidden" class="form-control" name="course_id" id="exampleInputEmail1"
                                            placeholder="Enter Name Of Category" value="{{ $course_id ?? '' }}">
                                    </div>

                                </div>
                                <!-- /.card-body -->

                                <div class="card-footer">
                                    <button id="submit" type="submit"
                                        class="btn btn-primary">{{ $button_name ?? 'Update' }}</button>
                                </div>

                            </form>
                        </div>
                        <!-- /.card -->
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
