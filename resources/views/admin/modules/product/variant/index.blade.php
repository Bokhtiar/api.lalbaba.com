@extends('layouts.admin.app')
@section('title', 'List Of Product Variant')
@section('css')
    <style>
        .zoom:hover {
            transform: scale(2.5);
        }
    </style>
@endsection

@section('admin_content')

    <div class="pagetitle">
        <h1>Product Variant Tables</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="@route('admin.dashboard')">Home</a></li>
                <li class="breadcrumb-item">Tables</li>
                <li class="breadcrumb-item active">Product Variant Table</li>
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
                        <h5 class="card-title">Product Variant Table  <a class="btn btn-sm btn-success" href="@route('admin.variant.create')"> <i class="ri-add-box-line"></i> </a>  </h5>

                        <!-- Table with stripped rows -->
                        <table class="table datatable">
                            <thead>
                                <tr>
                                    <th scope="col">SL</th>
                                    <th scope="col">Title</th>
                                    <th scope="col">Product Name</th>
                                    <th scope="col">Sell Price</th>
                                    <th scope="col">Discount Price</th>
                                    <th scope="col">Status</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($variants as $item)
                                    <tr>
                                        <th scope="row">{{ $loop->index + 1 }}</th>
                                        <td>{{ $item->title }}</td>
                                        <td>{{ $item->product ? $item->product->name : "data not found" }}</td>
                                        <td>{{ $item->sell_price }} Taka</td>
                                        <td>{{ $item->discount_price == null ? '0' : $item->discount_price }} Taka</td>
                                        <td>
                                            @if ($item->status == 1)
                                                <a class="btn btn-sm btn-success" href="@route('admin.variant.status', $item->product_variant_id)"><i
                                                        class="bi bi-check-circle"></i></a>
                                            @else
                                                <a class="btn btn-warning btn-sm" href="@route('admin.variant.status', $item->product_variant_id)"><i
                                                        class="bi bi-exclamation-triangle"></i></a>
                                            @endif
                                        </td>
                                        <td class="form-inline">
                                            <a class="btn btn-sm btn-info text-light" href="@route('admin.variant.show', $item->product_variant_id)"> <i
                                                class="ri-eye-fill"></i></a>

                                            <a class="btn btn-sm btn-primary" href="@route('admin.variant.edit', $item->product_variant_id)"> <i
                                                    class="ri-edit-box-fill"></i></a>
                                            <form method="POST" action="@route('admin.variant.destroy',$item->product_variant_id)" class="mt-1">
                                                @csrf
                                                @method('Delete')
                                                <button class="btn btn-sm btn-danger" type="submit"> <i
                                                    class="ri-delete-bin-6-fill"></i></button>
                                            </form>
                                        </td>
                                    </tr>
                                @empty
                                    <h2 class="bg-danger text-light text-center">Product Is Empty</h2>
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
