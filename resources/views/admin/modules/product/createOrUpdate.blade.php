@extends('layouts.admin.app')
@section('title', @$edit ? 'Product Update' : 'Product Create')

@section('css')
    <style>
        .zoom:hover {
            transform: scale(2.5);
        }
    </style>
@endsection

@section('admin_content')

    <div class="pagetitle">
        <h1>Product {{ @$edit ? 'Update' : 'Create' }} Form</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="@route('admin.dashboard')">Home</a></li>
                <li class="breadcrumb-item">Product</li>
                <li class="breadcrumb-item active">Product {{ @$edit ? 'Update' : 'Create' }} Form</li>
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
            <h5 class="card-title">Product {{ @$edit ? 'Update' : 'Create' }} Form <a href="@route('admin.product.index')"
                    class="btn btn-sm btn-success"><i class="ri-list-unordered"></i></a></h5>
            @if (@$edit)
                <form action="@route('admin.product.update', @$edit->product_id)" method="POST" enctype="multipart/form-data">
                    @method('put')
                @else
                    <form action="@route('admin.product.store')" method="post" enctype="multipart/form-data">
            @endif
            @csrf
            <section class="form-group row">
                <div class="col-md-12 col-lg-12 my-2">
                    <label for="" class="form-label">Product Name <span class="text-danger">*</span></label>
                    <input required type="text" class="form-control" name="name" value="{{ @$edit->name }}"
                        placeholder="type here Product Name">
                </div>


                <div class="col-sm-12 col-md-6 col-lg-6">
                    <label class="form-label" for="">Select Category</label>
                    <select name="category_id" class="form-control" id="">
                        <option value="">--select category--</option>
                        @foreach ($categories as $cat)
                            <option value="{{ $cat->category_id }}"
                                {{ $cat->category_id == @$edit->category_id ? 'selected' : '' }}>{{ $cat->name }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="col-sm-12 col-md-6 col-lg-6 my-2">
                    <label for="" class="form-label">Product Price <span class="text-danger">*</span></label>
                    <input required type="text" class="form-control" name="price" value="{{ @$edit->price }}"
                        placeholder="type here Product Price">
                </div>

                <div class="col-md-4 col-lg-4 my-2">
                    <label for="" class="form-label">Product Image <span class="text-danger">*</span></label>
                    <input {{ @$edit ? '' : 'required' }} type="file" name="image" multiple class="form-control">
                    @isset($edit)
                        <div class="my-2">
                            <label for="">Already Image1 Seleted</label>
                            <img src="{{ asset($edit->image) }}" height="40px" width="40px" alt="">
                        </div>
                    @endisset
                </div>

                <div class="col-sm-12 col-md-8 col-lg-8 my-2">
                    <label class="form-label" for="">Select Delevery Process</label>
                    <select name="type" class="form-control" id="">
                        <option value="express" {{ @$edit->type == 'express' ? 'selected' : '' }}>Express Delivery
                        </option>
                        <option value="24/7" {{ @$edit->type == '24/7' ? 'selected' : '' }}>24/7 Delivery</option>
                    </select>
                </div>

                <div class="col-sm-12 col-md-6 col-lg-6 my-2">
                    <label for="" class="form-label">Product Quantity <span class="text-danger">*</span></label>
                    <input required type="number" class="form-control" name="quantity" value="{{ @$edit->quantity }}"
                        placeholder="type here Product Quantity">
                </div>


                <div class="col-sm-12 col-md-6 col-lg-6 my-2">
                    <label for="" class="form-label">Product Alert Quantity <span class="text-danger">*</span></label>
                    <input required type="text" class="form-control" name="alert_quantity" value="{{ @$edit->alert_quantity }}"
                        placeholder="type here Product Alert Quantity">
                </div>



                <div class="col-md-12 col-lg-12">
                    <label for="">Product Body <span class="text-danger">*</span></label>
                    <textarea name="body" class="form-control" cols="5" rows="10">
                       {!! @$edit->body !!}
                      </textarea><!-- End TinyMCE Editor -->
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
