@extends('admin.layout.default')

@section("content")
    <div class="page-breadcrumb bg-white">
        <div class="row align-items-center">
            <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                <h4 class="page-title">Dashboard</h4>
            </div>
            <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                <div class="d-md-flex">
                    <ol class="breadcrumb ms-auto">
                        <li><a href="{{ url('admin/dashboard') }}" class="fw-normal">Dashboard</a></li>
                    </ol>
                    <a href="https://www.wrappixel.com/templates/ampleadmin/" target="_blank"
                       class="btn btn-danger  d-none d-md-block pull-right ms-3 hidden-xs hidden-sm waves-effect waves-light text-white">Dashboard</a>
                </div>
            </div>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <div class="container-fluid">
        <!-- ============================================================== -->
        <!-- Three charts -->
        <!-- ============================================================== -->
        <div class="row justify-content-center">
            <div class="col-lg-4 col-md-12">
                <div class="white-box analytics-info">
                    <h3 class="box-title">Total Users</h3>
                    <ul class="list-inline two-part d-flex align-items-center mb-0">

                        <li class="ms-auto"><span class="counter text-success">{{ $users }}</span></li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-4 col-md-12">
                <div class="white-box analytics-info">
                    <h3 class="box-title">Total Buyers</h3>
                    <ul class="list-inline two-part d-flex align-items-center mb-0">

                        <li class="ms-auto"><span class="counter text-purple">{{ $buyers }}</span></li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-4 col-md-12">
                <div class="white-box analytics-info">
                    <h3 class="box-title">Total Dealers</h3>
                    <ul class="list-inline two-part d-flex align-items-center mb-0">

                        <li class="ms-auto"><span class="counter text-info">{{ $dealers }}</span>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-4 col-md-12">
                <div class="white-box analytics-info">
                    <h3 class="box-title">Total Products</h3>
                    <ul class="list-inline two-part d-flex align-items-center mb-0">

                        <li class="ms-auto"><span class="counter text-danger">{{ $products }}</span>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-4 col-md-12">
                <div class="white-box analytics-info">
                    <h3 class="box-title">Total Promotions</h3>
                    <ul class="list-inline two-part d-flex align-items-center mb-0">

                        <li class="ms-auto"><span class="counter text-warning">{{ $promotions }}</span>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-4 col-md-12">
                <div class="white-box analytics-info">
                    <h3 class="box-title">Total Category</h3>
                    <ul class="list-inline two-part d-flex align-items-center mb-0">

                        <li class="ms-auto"><span class="counter text-yellow">{{ $categories }}</span>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-4 col-md-12">
                <div class="white-box analytics-info">
                    <h3 class="box-title">Total Product Import</h3>
                    <ul class="list-inline two-part d-flex align-items-center mb-0">

                        <li class="ms-auto"><span class="counter text-secondary">${{ $productImport }}</span>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-4 col-md-12">
                <div class="white-box analytics-info">
                    <h3 class="box-title">Total Product Sell</h3>
                    <ul class="list-inline two-part d-flex align-items-center mb-0">

                        <li class="ms-auto"><span class="counter text-primary">${{ $productSale }}</span>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-4 col-md-12">
                <div class="white-box analytics-info">
                    <h3 class="box-title">Profit</h3>
                    <ul class="list-inline two-part d-flex align-items-center mb-0">

                        <li class="ms-auto"><span class="counter text-muted">${{ $total }}</span>
                        </li>
                    </ul>
                </div>
            </div>
        </div>

    </div>
@endsection

