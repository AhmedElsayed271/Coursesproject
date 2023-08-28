@extends('dashboard.layouts.master')

@section('title', 'Complaints')

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-dark">Complaints</h1>
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
                    <!-- left column -->
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Complaints</h3>
                            </div>

                            <!-- /.card-header -->
                            <div class="card-body">

                                <div class="row">
                                    <div class="col-md-12">
                                        <!-- The time line -->
                                        <div class="timeline">

                                            @if ($contactsUs->count() > 0)
                                                @foreach ($contactsUs as $contactUs)
                                                    <div>
                                                        <i class="fas fa-envelope bg-blue"></i>
                                                        <div class="timeline-item">
                                                            <h3 class="timeline-header"><a href="#">Email</a>
                                                                {{ $contactUs->email }}
                                                            </h3>

                                                            <div class="timeline-body">
                                                                {{ $contactUs->message }}
                                                            </div>
                                                            <div class="timeline-footer">
                                                                <form action="{{ route('contact.delete',$contactUs->id) }}" method="post">
                                                                    @csrf
                                                                    @method('delete')
                                                                    <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!-- END timeline item -->
                                                
                                                    <!-- timeline item -->
                                                    <div>   
                                                        <i class="fas fa-user bg-green"></i>
                                                        <div class="timeline-item">
                                                            <span class="time"><i class="fas fa-clock"></i> 
                                                                {{ Carbon\Carbon::parse($contactUs->created_at)->diffForHumans() }}</span>
                                                            <h3 class="timeline-header no-border"><a href="#">
                                                                    Name</a>
                                                                {{ $contactUs->name }}</h3>
                                                        </div>
                                                    </div>
                                                @endforeach
                                            @else
                                                There's No Complaints to Display
                                            @endif

                                        </div>
                                    </div>
                                    <!-- /.col -->
                                </div>

                            </div>
                            <!-- /.card-body -->

                        </div>
                        <!-- /.card -->
                        <div class="row">
                            <div class="col-sm-12">
                                {{ $contactsUs->links() }}
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
