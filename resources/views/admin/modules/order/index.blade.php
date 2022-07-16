@extends('layouts.admin.app')
@section('title', 'List Of Order')
@section('css')
    <style>
        .zoom:hover {
            transform: scale(2.5);
        }
    </style>
@endsection

@section('admin_content')

    <div class="pagetitle">
        <h1>Order Tables</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="@route('admin.dashboard')">Home</a></li>
                <li class="breadcrumb-item">Tables</li>
                <li class="breadcrumb-item active">Order Table</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section">
        <div class="row">
            <div class="col-lg-12">

                <div class="card">
                    <div class="card-header">
                        <x-notification></x-notification>
                        @if (session('error'))
                            <div class="alert alert-danger">{{ session('error') }}</div>
                        @endif
                    </div>
                    <div class="card-body">
                        <h5 class="card-title">Order Table  <a class="btn btn-sm btn-success" href=""> <i class="ri-add-box-line"></i> </a>  </h5>

                        <!-- Table with stripped rows -->
                        <table class="table datatable">
                            <thead>
                                <tr>
                                    <th scope="col">SL</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">E-mail</th>
                                    <th scope="col">Phone</th>
                                    <th scope="col">Type</th>
                                    <th scope="col">Status</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($orders as $item)
                                    <tr>
                                        <th scope="row">{{ $loop->index + 1 }}</th>
                                        <td>{{ $item->f_name .''. $item->l_name}}</td>
                                        <td>{{ $item->email }}</td>
                                        <td>{{ $item->phone }}</td>
                                        <td>{{ $item->type }}</td>
                                        <td>
                                            {{-- @if ($item->status == 1)
                                                <a class="btn btn-sm btn-success" href="@route('admin.order.status', $item->order_id)"><i
                                                        class="bi bi-check-circle"></i></a>
                                            @else
                                                <a class="btn btn-warning btn-sm" href="@route('admin.order.status', $item->order_id)"><i
                                                        class="bi bi-exclamation-triangle"></i></a>
                                            @endif --}}
                                            @if ($item->status <= 1)
                                                    {{  }}
                                            @endif
                                        </td>
                                        <td class="form-inline">
                                            <a class="btn btn-sm btn-info text-light" href="@route('admin.order.show', $item->order_id)"> <i
                                                class="ri-eye-fill"></i></a>
                                            <form method="POST" action="@route('admin.order.destroy',$item->order_id)" class="mt-1">
                                                @csrf
                                                @method('Delete')
                                                <button class="btn btn-sm btn-danger" type="submit"> <i
                                                    class="ri-delete-bin-6-fill"></i></button>
                                            </form>


                                        </td>
                                    </tr>
                                @empty
                                    <h2 class="bg-danger text-light text-center">order Is empty</h2>
                                @endforelse
                            </tbody>
                        </table>
                        <!-- End Table with stripped rows -->

                    </div>
                </div>

            </div>
        </div>
    </section>

    @section('js')
    @endsection

@endsection

