@extends('layouts.admin.app')
@section('title', 'List Of Abondone')
@section('css')
@endsection

@section('admin_content')

    <div class="pagetitle">
        <h1>Abondone Tables</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="@route('admin.dashboard')">Home</a></li>
                <li class="breadcrumb-item">Tables</li>
                <li class="breadcrumb-item active">Abondone Table</li>
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
                        <h5 class="card-title">Abondone Table  <a class="btn btn-sm btn-success" href="@route('admin.category.create')"> <i class="ri-add-box-line"></i> </a>  </h5>

                        <!-- Table with stripped rows -->
                        <table class="table datatable">
                            <thead>
                                <tr>
                                    <th scope="col">SL</th>
                                    <th scope="col">U. name</th>
                                    <th scope="col">P. name</th>
                                    <th scope="col">P. Property</th>
                                    <th scope="col">Price</th>
                                    <th scope="col">Type</th>
                                    <th scope="col">Discount</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($carts as $item)
                                    <tr>
                                        <th scope="row">{{ $loop->index + 1 }}</th>
                                        <td>{{ $item->user ? $item->user->name: "" }}</td>
                                        <td>{{ $item->product_name }}</td>
                                        {{-- {{ dd($item->property_id) }} --}}
                                        <td>
                                            @php
                                            $productProperties = $item->product->properties;
                                            @endphp
                                            @foreach ($productProperties as $property) 
                                                @if($property['id'] == 0 && $property['title'] == null)
                                                    <span> Regular Price: {{ $item->product_price }} </span>
                                                @else
                                                   @php
                                                        $p = App\Models\Cart::query()->PropertiesName($item->property_id, $item->product_id);
                                                   @endphp
                                                      <span>
                                                        Variant: 
                                                        {{ $p['title']  }} |
                                                        {{ $p['price']  }} Tk
                                                      </span>
                                                @endif

                                                @break 
                                            @endforeach



                                            {{-- @php
                                                $p = App\Models\Cart::query()->PropertiesName($item->property_id, $item->product_id) 
                                            @endphp
                                            {{ $p['title'] }} |
                                            {{ $p['price'] }}Tk --}}
                                        </td>
                                        <td>{{ $item->product_price }}</td>
                                        <td>{{ $item->type }}</td>
                                        <td class="form-inline">
                                            <form action="@route('admin.abondoned.update', $item->cart_id)" method="POST">
                                                @csrf
                                                @method('put')
                                                <input type="text" placeholder="discount" value="{{ $item->discount }}" name="discount" id="">
                                                <input type="submit" class="btn btn-sm btn-success" name="" id="">
                                            </form>
                                        </td>
                                    </tr>
                                @empty
                                    <h2 class="bg-danger text-light text-center">Category Is empty</h2>
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
