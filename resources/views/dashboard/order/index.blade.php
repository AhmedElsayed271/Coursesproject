@extends('dashboard.layouts.master')

@section('title', 'orders')

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-dark">Orders</h1>
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
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Orders</h3>
                            </div>

                            <!-- /.card-header -->
                            <div class="card-body">
                                @if($orders->count() > 0)
                                <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>order id</th>
                                            <th>transactoin id</th>
                                            <th>price</th>
                                            <th>course</th>
                                            <th>user</th>
                                            <th>currency</th>
                                            <th>status</th>
                            
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($orders as $num => $order)
                                            <tr>
                                                <td>{{ $num + 1 }}</td>
                                                <td>{{ $order->order_id }}</td>
                                                <td>{{ $order->transaction_id }}</td>
                                                <td>{{ $order->price }}</td>
                                                <td>{{ $order->course->name }}</td>
                                                <td>{{ $order->user->full_name }}</td>
                                                <td>{{ $order->currency }}</td>
                                                <td>{{ $order->status }}</td>
                                            </tr>
                                        @empty
                                            There are no Categories to display
                                        @endforelse
                                    </tbody>

                                </table>
                                @else
                                There are no orders to display
                                @endif
        
                            </div>
                            <!-- /.card-body -->
                   
                        </div>
                        <!-- /.card -->
                        <div class="row">
                            <div class="col-sm-12">
                                {{ $orders->links() }}
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
