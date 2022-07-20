@extends('layouts.admin.app')
@section('title', @$edit ? 'Product variant Update' : 'Product variant Create')

@section('css')
<script src="//ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <style>
        .zoom:hover {
            transform: scale(2.5);
        }
    </style>
@endsection

@section('admin_content')

    <div class="pagetitle">
        <h1>Product Variant {{ @$edit ? 'Update' : 'Create' }} Form</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="@route('admin.dashboard')">Home</a></li>
                <li class="breadcrumb-item">Product</li>
                <li class="breadcrumb-item active">Product Variant {{ @$edit ? 'Update' : 'Create' }} Form</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->


    <div class="card">
        <div class="card-header">
            {{-- form validation errors --}}
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            @if (session('error'))
                <div class="alert alert-danger">{{ session('error') }}</div>
            @endif
            {{-- form validation errors end --}}
        </div>
        <div class="card-body">
            <h5 class="card-title">Product Variant {{ @$edit ? 'Update' : 'Create' }} Form <a href="@route('admin.variant.index')"
                    class="btn btn-sm btn-success"><i class="ri-list-unordered"></i></a></h5>
            @if (@$edit)
                <form action="@route('admin.variant.update', @$edit->product_variant_id)" method="POST" enctype="multipart/form-data">
                    @method('put')
                @else
                    <form action="@route('admin.variant.store')" method="post" enctype="multipart/form-data">
            @endif
            @csrf
            <section class="form-group row">


                <div class="col-md-8 col-lg-8 my-2">
                    <label for="" class="form-label">Product Variant Title <span class="text-danger">*</span></label>
                    <input required type="text" class="form-control" name="title" value="{{ @$edit->title }}"
                        placeholder="type here Product Variant title">
                </div>


                <div class="col-sm-12 col-md-4 col-lg-4 my-2">
                    <label class="form-label" for="">Select Product</label>
                    <select name="product_id" class="form-control" id="">
                        <option value="">--select Product--</option>
                        @foreach ($products as $product)
                            <option value="{{ $product->product_id }}"
                                {{ $product->product_id == @$edit->product_id ? 'selected' : '' }}>{{ $product->name }}
                            </option>
                        @endforeach
                    </select>
                </div>

             

                <div class="col-sm-12 col-md-6 col-lg-6 my-2">
                    <label for="" class="form-label">Product Variant Sell Price <span class="text-danger">*</span></label>
                    <input required type="text" class="form-control" name="sell_price" value="{{ @$edit->sell_price }}"
                        placeholder="type here Product Regular Price">
                </div>


                <div class="col-sm-12 col-md-6 col-lg-6 my-2">
                    <label for="" class="form-label">Product Variant Discount Price </label>
                    <input  type="text" class="form-control" name="discount_price" value="{{ @$edit->discount_price }}"
                        placeholder="type here Product Discount Price">
                </div>

                <div class="col-sm-12 col-md-5 col-lg-5 my-2">
                    <label for="" class="form-label">Product Variant Quantity </label>
                    <input  type="number" class="form-control" name="total_quantity" value="{{ @$edit->total_quantity }}"
                        placeholder="type here Product Quantity">
                </div>


                <div class="col-sm-12 col-md-7 col-lg-7 my-2">
                    <label for="" class="form-label">Product Variant Alert Quantity </label>
                    <input  type="text" class="form-control" name="alert_quantity" value="{{ @$edit->alert_quantity }}"
                        placeholder="type here Product Alert Quantity">
                </div>

            </section>
            <br><br><br>
            <div class="text-center">
                <button type="submit" class="btn btn-primary">Submit</button>
                <button type="reset" class="btn btn-secondary">Reset</button>
            </div>
            </form><!-- End Multi Columns Form -->

        </div>
    </div>


@section('js')
@endsection
@endsection
