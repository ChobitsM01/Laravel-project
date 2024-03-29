@extends('backend.layouts.master-index')
@section('title', 'Bakery || DASHBOARD')
@section('main-content')
    <div class="container-fluid">
        @include('backend.layouts.notification')
        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
        </div>

        <!-- Content Row -->
        <div class="row">

            <!-- Category -->
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-primary shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Category</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">
                                    {{ $CountCategory }}
                                </div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-sitemap fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!--SUb Category -->
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-warning shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Sub Category</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">
                                    {{ $CountSubCategory }}
                                </div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-table fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Products -->
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-success shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Products</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">
                                    {{ $CountProducts }}
                                </div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-cubes fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Order -->
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-info shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Order</div>
                                <div class="row no-gutters align-items-center">
                                    <div class="col-auto">
                                        <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">
                                            {{ $CountOrder }}
                                        </div>
                                    </div>

                                </div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <!-- Area Chart -->
            <div class="col-xl-12 col-lg-7">
                <div class="card shadow mb-4">
                    <!-- Card Header - Dropdown -->
                    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                        <h6 class="m-0 font-weight-bold text-primary">Earnings Overview: {{ number_format($total) }}đ</h6>
                    </div>
                    <!-- Card Body -->
                    <div class="card-body">
                        <div class="chart-area">
                            {{-- <canvas id="curve_chart"></canvas> --}}
                            <div id="chart_div" style="width: 100%; height: 300px;"></div>
                            {{-- @include('revenue-chart') --}}
                        </div>
                    </div>
                </div>
            </div>

            <!-- Pie Chart -->
            {{-- <div class="col-xl-3 col-lg-5">
                <div class="card shadow mb-4">
                    <!-- Card Header - Dropdown -->
                    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                        <h6 class="m-0 font-weight-bold text-primary">Users</h6>
                    </div>
                    <!-- Card Body -->
                    <div class="card-body" style="overflow:hidden">
                        <div id="pie_chart" style="width:350px; height:320px;">
                            <p>Number of employee accounts {{ $CountAccountAdmin }}<br>
                                <span style="font-size: 10px">
                                    &nbsp;&nbsp;&nbsp;&nbsp;{{ $AdminInactive }} Active <br>
                                    &nbsp;&nbsp;&nbsp;&nbsp;{{ $AdminActive }} Inactive <br>
                                </span>
                                Number of customer accounts: {{ $CountAccountCustom }}<br>
                                <span style="font-size: 10px">
                                    &nbsp;&nbsp;&nbsp;&nbsp;{{ $CustomInactive }} Active <br>
                                    &nbsp;&nbsp;&nbsp;&nbsp;{{ $CustomActive }} Inactive <br>
                                </span>
                            </p>
                        </div>
                    </div>
                </div>
            </div> --}}
            <!-- Content Row -->
        </div>
        <div class="row">
            <!-- Area Chart -->
            <div class="col-xl-12 col-lg-7">
                <div class="card shadow mb-4">
                    <!-- Card Header - Dropdown -->
                    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                        <h6 class="m-0 font-weight-bold text-primary">List Of Posts With The Most interaction</h6>
                    </div>
                    <!-- Card Body -->
                    <div class="card-body">
                        <div class="chart-area" style="height:100%">
                            <table class="table table-bordered" id="order-dataTable" width="100%" cellspacing="0">
                                <thead>
                                    <tr style="text-align: center">
                                        <th>S.N.</th>
                                        <th>Name</th>
                                        <th>Count</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($blogs as $blog)
                                        <tr>
                                            <td>{{ $blog->id }}</td>
                                            <td>{{ $blog->name }}</td>
                                            <td>{{ $commentCounts[$blog->id] ?? 0 }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Pie Chart -->
            {{-- <div class="col-xl-5 col-lg-5">
                <div class="card shadow mb-4">
                    <!-- Card Header - Dropdown -->
                    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                        <h6 class="m-0 font-weight-bold text-primary">List Of Products With The Highest Rating</h6>
                    </div>
                    <!-- Card Body -->
                    <div class="card-body" style="overflow:hidden">
                        <div id="pie_chart" style="width:500px; height:100%">
                            <table class="table table-bordered" id="order-dataTable" width="100%" cellspacing="0">
                                <thead>
                                    <tr style="text-align: center">
                                        <th>S.N.</th>
                                        <th>Name</th>
                                        <th>Rate</th>
                                        <th>Count</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($reviews as $review)
                                        @if ($loop->first || $reviews[$loop->index - 1]->products_id != $review->products_id)
                                            <tr style="text-align: center">
                                                <td>{{ $review->id }}</td>
                                                <td rowspan="{{ $reviewCounts[$review->products_id] }}">
                                                    {{ $review->products->name }}</td>
                                                <td>
                                                    <ul style="list-style:none">
                                                        @for ($i = 1; $i <= 5; $i++)
                                                            @if ($review->rate >= $i)
                                                                <li style="float:left;color:#F7941D;"><i
                                                                        class="fa fa-star"></i></li>
                                                            @else
                                                                <li style="float:left;color:#F7941D;"><i
                                                                        class="far fa-star"></i></li>
                                                            @endif
                                                        @endfor
                                                    </ul>
                                                </td>
                                                <td rowspan="{{ $reviewCounts[$review->products_id] }}">
                                                    {{ $reviewCounts[$review->products_id] }}
                                                </td>
                                            </tr>
                                        @else
                                            <tr style="text-align: center">
                                                <td>{{ $review->id }}</td>
                                                <td>
                                                    <ul style="list-style:none">
                                                        @for ($i = 1; $i <= 5; $i++)
                                                            @if ($review->rate >= $i)
                                                                <li style="float:left;color:#F7941D;"><i
                                                                        class="fa fa-star"></i></li>
                                                            @else
                                                                <li style="float:left;color:#F7941D;"><i
                                                                        class="far fa-star"></i></li>
                                                            @endif
                                                        @endfor
                                                    </ul>
                                                </td>
                                            </tr>
                                        @endif
                                    @endforeach

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div> --}}
            <!-- Content Row -->
        </div>
    @endsection
