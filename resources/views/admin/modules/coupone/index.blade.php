@extends('layouts.admin.app')
@section('title', 'List Of Coupone')
@section('css')
    <style>
        .zoom:hover {
            transform: scale(2.5);
        }
    </style>
@endsection

@section('admin_content')

    <div class="pagetitle">
        <h1>Coupone Tables</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="@route('admin.dashboard')">Home</a></li>
                <li class="breadcrumb-item">Tables</li>
                <li class="breadcrumb-item active">Coupone Table</li>
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
                        <h5 class="card-title">Coupone Table  <a class="btn btn-sm btn-success" href="@route('admin.coupone.create')"> <i class="ri-add-box-line"></i> </a>  </h5>

                        <!-- Table with stripped rows -->
                        <table class="table datatable">
                            <thead>
                                <tr>
                                    <th scope="col">SL</th>
                                    <th scope="col">Title</th>
                                    <th scope="col">Discount %</th>
                                    <th scope="col">Code</th>
                                    <th scope="col">Min Order</th>
                                    <th scope="col">Max Order</th>
                                    <th scope="col">Use Coupone</th>
                                    <th scope="col">Status</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($coupones as $item)
                                    <tr>
                                        <th scope="row">{{ $loop->index + 1 }}</th>
                                        <td>{{ $item->title }}</td>
                                        <td>
                                            @isset($item->discount_percentage)
                                                {{ $item->discount_percentage }} %
                                            @endisset
                                                
                                            @isset($item->discount_flat)
                                                {{ $item->discount_flat }}
                                            @endisset
                                            
                                        
                                        </td>
                                        <td>{{ $item->code }}</td>
                                        <td>{{ $item->min_price }} Tk</td>
                                        <td>{{ $item->max_price }} Tk</td>
                                        <td>{{
                                                App\Models\Order::where('coupone_code', $item->code)->count();
                                            }}</td>

                                        <td>
                                            @if ($item->status == 1)
                                                <a class="btn btn-sm btn-success" href="@route('admin.coupone.status', $item->coupon_id)"><i
                                                        class="bi bi-check-circle"></i></a>
                                            @else
                                                <a class="btn btn-warning btn-sm" href="@route('admin.coupone.status', $item->coupon_id)"><i
                                                        class="bi bi-exclamation-triangle"></i></a>
                                            @endif
                                        </td>
                                        <td class="form-inline">
                                            <a class="btn btn-sm btn-primary" href="@route('admin.coupone.edit', $item->coupon_id)"> <i
                                                    class="ri-edit-box-fill"></i></a>
                                            <form method="POST" action="@route('admin.coupone.destroy',$item->coupon_id)" class="mt-1">
                                                @csrf
                                                @method('Delete')
                                                <button class="btn btn-sm btn-danger" type="submit"> <i
                                                    class="ri-delete-bin-6-fill"></i></button>
                                            </form>
                                        </td>
                                    </tr>
                                @empty
                                    <h2 class="bg-danger text-light text-center">Coupone Is empty</h2>
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
