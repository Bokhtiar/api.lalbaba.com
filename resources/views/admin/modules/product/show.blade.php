@extends('layouts.admin.app')
@section('title', 'Product Details')
@section('css')
@endsection

@section('admin_content')
    <div class="pagetitle">
        <h1>Product Tables</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="@route('admin.dashboard')">Home</a></li>
                <li class="breadcrumb-item">Product Show</li>
                <li class="breadcrumb-item active">Product Details</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->
    <div class="card">
        <div class="card-header">
            <span class="font-weight-bold">Product Name :</span> {{ $show->title }}
        </div>
        <div class="card-body">
            <div class="row my-3">
                <div class="col-sm-12 col-md-5 col-lg-5 text-center">
                    <h3>Product Image: </h3>
                    <img src="{{ asset($show->image) }}" height="auto" width="100%" alt="">
                </div>
                <div class="col-sm-12 col-md-7 col-lg-7">
                    <h3>Product Info: </h3>
                    <span> <b>Name : </b> {{ $show->name }} </span><br>
                    <span> <b>Category Name : </b> {{ $show->category_name }} </span><br>
                    <span> <b>Price : </b> {{ $show->price }} </span><br>
                    <span> <b>Delivery : </b> {{ $show->type }} </span><br>
                    <span> <b>Description : </b> {!! $show->body !!} </span><br>
                    <span> <b>Properties : </b> <br>
                        @foreach ($show->properties as $property)
                            @if($property['title'] != null)
                            <b>{{ $property['id'] }}</b>: {{ $property['title'] }} <b>{{ $property['price'] }}</b>: {{ $property['discount_price'] }}<br />
                            @endif
                            @endforeach
                    </span><br>

                </div>
            </div>
        </div>
    </div>
@section('js')
@endsection

@endsection
