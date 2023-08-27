@extends('dashboard.layouts.master')

@section('title', 'Create Section')

@section('content')


    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-dark">Create Section</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('videos.index',$section_id) }}">Videos</a></li>
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
                                <h3 class="card-title">Create Video</h3>
                            </div>
                            <!-- /.card-header -->
                            <!-- form start -->
                            <form role="form" method="POST" action="{{ route('videos.store') }}" id="UploadForm"
                                enctype="multipart/form-data">

                                @include('dashboard.videos.form', ['button_name' => 'Save'])

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

<script src="https://code.jquery.com/jquery-3.7.0.min.js"
integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.form/4.3.0/jquery.form.min.js"
        integrity="sha384-qlmct0AOBiA2VPZkMY3+2WqkHtIQ9lSdAsAn5RUJD/3vA5MKDgSGcdmIv4ycVxyn" crossorigin="anonymous">
    </script>


    <script>
        $(document).ready(function() {
            console.log('test');
            var progressbox = $("#progressbox");
            var progressbar = $("#progressbar");
            var statustxt = $("#statustxt");
            var submitButton = $("#UploadBtn");
            var myform = $("#UploadForm");
            var output = $("#output");
            var completed = '0%';
            progressbox.hide();



            $(myform).ajaxForm({
                beforeSend: function() {
                    submitButton.attr('disabled', '');
                    statustxt.empty();
                    progressbox.show();
                    progressbar.width(completed);
                    statustxt.html(completed);
                },
                uploadProgress: function(event, position, total, percentComplete) {
                    console.log(event, position, total, percentComplete);
                    progressbar.width((percentComplete - 1) + '%');
                    statustxt.html((percentComplete - 1) + '%');
                },
                complete: function(response) {
                    var progressBarWidth = progressbar;
                    var statustxtWidth   = statustxt;
                    progressbar.width((100) + "%")
                    statustxt.html(('100') + '%');
                    console.log(response);
                    output.html(response.responseText);
                    submitButton.removeAttr('disabled');
                    progressbox.hide();
                }
            });
        });
    </script>
@section('css')

@endsection
