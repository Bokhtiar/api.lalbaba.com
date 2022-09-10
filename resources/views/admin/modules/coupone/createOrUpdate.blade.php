@extends('layouts.admin.app')
@section('title',  @edit ? 'Coupone Update' : 'Coupone Create' )

@section('css')
    <style>
        .zoom:hover {
            transform: scale(2.5);
        }
    </style>
@endsection

@section('admin_content')

    <div class="pagetitle">
        <h1>Coupone {{ @$edit ? 'Update' : 'Create' }} Form</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="@route('admin.dashboard')">Home</a></li>
                <li class="breadcrumb-item">Coupone</li>
                <li class="breadcrumb-item active">Coupone {{ @$edit ? 'Update' : 'Create' }} Form</li>
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
            <h5 class="card-title">Coupone {{ @$edit ? 'Update' : 'Create' }} Form <a href="@route('admin.coupone.index')" class="btn btn-sm btn-success"><i class="ri-list-unordered"></i></a></h5>
            @if (@$edit)
                <form action="@route('admin.coupone.update', @$edit->coupon_id)" method="POST" enctype="multipart/form-data">
                    @method('put')
                @else
                    <form action="@route('admin.coupone.store')" method="post" enctype="multipart/form-data">
            @endif
            @csrf
            <section class="form-group row">
                <div class="col-md-12 col-lg-12 my-2">
                    <label for="" class="form-label">Coupone Title <span class="text-danger">*</span></label>
                    <input required type="text" class="form-control" name="title" value="{{ @$edit->title }}"
                        placeholder="type here Coupone Title">
                </div>

                <div class="col-md-6 col-lg-6 my-2">
                    <label for="" class="form-label">Coupone Discount Percentage <span class="text-danger">*</span></label>
                    <input type="text" class="form-control" name="discount_percentage" value="{{ @$edit->discount_percentage }}"
                        placeholder="type here only amount of percentage ex 10">
                </div>

                <div class="col-md-6 col-lg-6 my-2">
                    <label for="" class="form-label">Coupone Discount Flat<span class="text-danger"></span></label>
                    <input type="text" class="form-control" name="discount_flat" value="{{ @$edit->discount_flat }}"
                        placeholder="type here online discount flat">
                </div>

                <div class="col-md-6 col-lg-6 my-2">
                    <label for="" class="form-label">Coupon Min Price<span class="text-danger">*</span></label>
                    <input required type="text" class="form-control" name="min_price" value="{{ @$edit->min_price }}"
                        placeholder="type here min price">
                </div>

                <div class="col-md-6 col-lg-6 my-2">
                    <label for="" class="form-label">Coupon Max Price<span class="text-danger"></span></label>
                    <input type="text" class="form-control" name="max_price" value="{{ @$edit->max_price }}"
                        placeholder="type here min price">
                </div>

              


                <div class="col-md-12 col-lg-12 my-2">
                    <label for="" class="form-label">Coupone Code <span class="text-danger"></span></label>
                    <input required type="text" class="form-control" name="code" value="{{ @$edit->code }}"
                        placeholder="type here Coupone Code">
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

