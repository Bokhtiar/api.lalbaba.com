@extends('layouts.admin.app')
@section('title', 'Product Details')
@section('css')
@endsection

@section('admin_content')
    <div class="pagetitle">
        <h1>Product Variant Details</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="@route('admin.dashboard')">Home</a></li>
                <li class="breadcrumb-item">Product VariantShow</li>
                <li class="breadcrumb-item active">Product Variant Details</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->
    <div class="card">
        <div class="card-header">
            <span class="font-weight-bold">Product Variant Title :</span> {{ $show->title }}
        </div>
        <div class="card-body">
            <div class="row my-3">

                <div class="col-sm-12 col-md-12 col-lg-12">
                    <h3>Product Info: </h3>
                    <span> <b>Name : </b> {{ $show->product ? $show->product->name : "" }} </span><br>
                    <span> <b>Price : </b> {{ $show->product ? $show->product->price : "" }} </span><br>
                    <span> <b>Delivery : </b> {{ $show->product ? $show->product->type : "" }} </span><br>
                    <span> <b>Description : </b> {!! $show->product ? $show->product->body : "" !!} </span><br>
                </div>
            </div>
        </div>
    </div>
@section('js')
@endsection

@endsection
