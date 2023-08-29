@extends('dashboard.layouts.master')

@section('title', 'Request Withdrawal')

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
         
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
                        <a href="{{ route('request.withdrawal.index') }}" class="btn btn-primary" style="margin-bottom: 20px">back</a>
                    </div>
                    <!-- left column -->
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Request Withdrawal From Wallet</h3>
                            </div>

                            <!-- /.card-header -->
                            <div class="card-body">
                                @if($requestWithdrawalWallet->count() > 0)
                                <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>name</th>
                                            <th>email</th>
                                            <th>phone</th>
                                            <th>amount</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($requestWithdrawalWallet as $num => $request)
                                            <tr>
                                                <td>{{ $num + 1 }}</td>
                                                <td>{{ $request->user->full_name }}</td>
                                                <td>{{ $request->user->email }}</td>
                                                <td>{{ $request->phone }}</td>
                                                <td>{{ $request->amount }}</td>
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
                                {{ $requestWithdrawalWallet->links() }}
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
