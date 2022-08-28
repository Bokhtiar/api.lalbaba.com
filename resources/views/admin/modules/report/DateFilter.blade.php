@extends('layouts.admin.app')
@section('title', 'List Of Banner')
@section('css')
    <style>
        .zoom:hover {
            transform: scale(2.5);
        }
    </style>
@endsection

@section('admin_content')

    <div class="pagetitle">
        <h1>{{ $pageTitle }} Tables</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="@route('admin.dashboard')">Home</a></li>
                <li class="breadcrumb-item">Tables</li>
                <li class="breadcrumb-item active">{{ $pageTitle }} Table</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section">
        <div class="row">
            <div class="col-lg-12">

                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">{{ $pageTitle }} Table </h5>

                        <!-- Table with stripped rows -->
                        <table class="table datatable">
                            <thead>
                                <tr>
                                    <th scope="col">SL</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Pay. Name</th>
                                    <th scope="col">Ac. Number</th>
                                    <th scope="col">pay. Amount</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $total = 0;
                                @endphp
                                @forelse ($orders as $item)
                                    <tr>
                                        <th scope="row">{{ $loop->index + 1 }}</th>
                                        <td>{{ $item->f_name .' '. $item->l_name }}</td>

                                        <td> {{ $item->payment_type }} </td>
                                        <td>{{ $item->payment_number }}</td>
                                        <td>{{ $item->payment_balance }} Tk</td>
                                        @php
                                            $total += $item->payment_balance;
                                        @endphp
                                        <td class="form-inline">
                                            <a class="btn btn-sm btn-info text-light" href="@route('admin.banner.show', $item->order_id)"> <i
                                                    class="ri-eye-fill"></i></a>
                                        </td>
                                    </tr>
                                @empty
                                    <h2 class="bg-danger text-light text-center">{{ $pageTitle }} Order Is empty</h2>
                                @endforelse
                            </tbody>
                        </table>
                        <!-- End Table with stripped rows -->

                        <div class="d-flex">
                            <div class="p-2 h4">{{ $pageTitle }} Total Order </div>
                            <div class="ms-auto p-2">{{ $total_order }} Orders</div>
                        </div>
                        <div class="d-flex">
                            <div class="p-2 h4">{{ $pageTitle }} Total Amount</div>
                            <div class="ms-auto p-2">{{ $total }} Tk</div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>

    @section('js')
    @endsection

@endsection
