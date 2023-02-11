@extends('layouts.admin')

@section('title')
    Store Dashboard
@endsection

@section('content')
    <div class="section-content section-dashboard-home" data-aos="fade-up">
        <div class="container-fluid">
            <div class="dashboard-heading">
                <h2 class="dashboard-title">Admin Dashboard</h2>
                <p class="dashboard-subtitle">This is Store Admin Panel</p>
            </div>
            <div class="dashboard-content">
                <div class="row">
                    <div class="col-md-4">
                        <div class="card mb-2">
                            <div class="card-body">
                                <div class="dashboard-card-title">Customer</div>
                                <div class="dashboard-card-subtitle">{{ $customer }}</div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card mb-2">
                            <div class="card-body">
                                <div class="dashboard-card-title">Revenue</div>
                                <div class="dashboard-card-subtitle">Rp.{{ $revenue }}</div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card mb-2">
                            <div class="card-body">
                                <div class="dashboard-card-title">Transaction</div>
                                <div class="dashboard-card-subtitle">{{ $transaction }}</div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col-12 mt-2">
                        <h5 class="mb-3">Recent Transactions</h5>
                        <a href="/dashboard-transactions-details.html" class="card card-list d-block">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-1">
                                        <img src="/images/dashboard-icon-product-1.png" class="w-50" />
                                    </div>
                                    <div class="col-md-4">Apple Watch Series 5</div>
                                    <div class="col-md-3">Farhan</div>
                                    <div class="col-md-3">22 Agustus, 2020</div>
                                    <div class="col-md-1 d-none d-md-block">
                                        <img src="/images/dashboard-arrow-right.svg" />
                                    </div>
                                </div>
                            </div>
                        </a>
                        <a href="/dashboard-transactions-details.html" class="card card-list d-block">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-1">
                                        <img src="/images/dashboard-icon-product-2.png" class="w-50" />
                                    </div>
                                    <div class="col-md-4">Apple Watch Series 5</div>
                                    <div class="col-md-3">Farhan</div>
                                    <div class="col-md-3">22 Agustus, 2020</div>
                                    <div class="col-md-1 d-none d-md-block">
                                        <img src="/images/dashboard-arrow-right.svg" />
                                    </div>
                                </div>
                            </div>
                        </a>
                        <a href="/dashboard-transactions-details.html" class="card card-list d-block">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-1">
                                        <img src="/images/dashboard-icon-product-3.png" class="w-50" />
                                    </div>
                                    <div class="col-md-4">Apple Watch Series 5</div>
                                    <div class="col-md-3">Farhan</div>
                                    <div class="col-md-3">22 Agustus, 2020</div>
                                    <div class="col-md-1 d-none d-md-block">
                                        <img src="/images/dashboard-arrow-right.svg" />
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
