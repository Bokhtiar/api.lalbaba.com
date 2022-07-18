@extends('layouts.admin.app')
@section('title', @$edit ? 'Product Update' : 'Product Create')

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



                {{-- <div class="row">
                    <div class="col-lg-12">
                        <div id="inputFormRow">
                            <div class="input-group mb-3">
                                <input type="text" name="variant[id]" class="form-control m-input" hidden autocomplete="off">
                                <input type="text" name="variant[title]" class="form-control m-input" placeholder="Enter title" autocomplete="off">
                                <input type="text" name="variant[price]" class="form-control m-input" placeholder="Enter price" autocomplete="off">
                                <div class="input-group-append">
                                    <button id="removeRow" type="button" class="btn btn-danger">Remove</button>
                                </div>
                            </div>
                        </div>
            
                        <div id="newRow"></div>
                        <button id="addRow" type="button" class="btn btn-info">Add Row</button>
                    </div>
                </div>

                <script type="text/javascript">
                    // add row
                    $("#addRow").click(function () {
                        var html = '';
                        html += '<div id="inputFormRow">';
                        html += '<div class="input-group mb-3">';
                        html += '<input type="text" name="variant[id]" class="form-control m-input" hidden autocomplete="off">'
                        html += '<input type="text" name="variant[title]" class="form-control m-input" placeholder="Enter title" autocomplete="off">';
                        html += '<input type="text" name="variant[price]" class="form-control m-input" placeholder="Enter price" autocomplete="off">';
                        html += '<div class="input-group-append">';
                        html += '<button id="removeRow" type="button" class="btn btn-danger">Remove</button>';
                        html += '</div>';
                        html += '</div>';
                
                        $('#newRow').append(html);
                    });
                
                    // remove row
                    $(document).on('click', '#removeRow', function () {
                        $(this).closest('#inputFormRow').remove();
                    });
                </script> --}}



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

                <div class="col-sm-12 col-md-6 col-lg-6">
                    <label class="form-label" for="">Select SubCategory </label>
                    <select name="subcategory_id" class="form-control" id="">
                        <option value="">--select SubCategory--</option>
                        @foreach ($subcategories as $sub)
                            <option value="{{ $sub->sub_category_id }}"
                                {{ $sub->subcategory_id == @$edit->subcategory_id ? 'selected' : '' }}>{{ $sub->name }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="col-sm-12 col-md-6 col-lg-6 my-2">
                    <label for="" class="form-label">Product Regular Price <span class="text-danger">*</span></label>
                    <input required type="text" class="form-control" name="regular_price" value="{{ @$edit->regular_price }}"
                        placeholder="type here Product Regular Price">
                </div>


                <div class="col-sm-12 col-md-6 col-lg-6 my-2">
                    <label for="" class="form-label">Product Discount Price </label>
                    <input  type="text" class="form-control" name="discount_price" value="{{ @$edit->discount_price }}"
                        placeholder="type here Product Discount Price">
                </div>

                <div class="col-sm-12 col-md-4 col-lg-4 my-2">
                    <label for="" class="form-label">Product Discount Percent </label>
                    <input  type="text" class="form-control" name="discount_percent" value="{{ @$edit->discount_percent }}"
                        placeholder="type here Product Discount Percent">
                </div>
                
                <div class="col-sm-12 col-md- col-lg-6 my-2">
                    <label for="" class="form-label">Product Discount Tag </label>
                    <input  type="text" class="form-control" name="discount_tag" value="{{ @$edit->discount_tag }}"
                        placeholder="type here Product Discount Tag">
                </div>


                <div class="col-sm-12 col-md-12 col-lg-12">
                    <label class="form-label" for="">Select Unit</label>
                    <select name="product_unit" class="form-control" id="">
                        <option value="">--select Unit--</option>
                        <option value="kg" {{ @$edit->product_unit == 'kg' ? 'selected' : '' }}>KG</option>
                        <option value="gm" {{ @$edit->product_unit == 'gm' ? 'selected' : '' }}>GM</option>
                        <option value="pc" {{ @$edit->product_unit == 'pc' ? 'selected' : '' }}>PC</option>
                    </select>
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
