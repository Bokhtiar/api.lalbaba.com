@extends('layouts.admin.app')
@section('title', 'Zip Details')
@section('css')
@endsection

@section('admin_content')

    <div class="pagetitle">
        <h1>Zip Bundle Tables</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="@route('admin.dashboard')">Home</a></li>
                <li class="breadcrumb-item">Zip Bundle Show</li>
                <li class="breadcrumb-item active">Zip Bundle Details</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <div class="card">
        <div class="card-header">
            <span class="font-weight-bold">Zip Bundle Name :</span> {{ $show->title }}
        </div>
        <div class="card-body">
            <div class="row my-3">
                <div class="col-sm-12 col-md-5 col-lg-5 text-center">
                    <h2>Zip Code List</h2>
                    @php
                        $codes = json_decode($show->zip_codes);
                    @endphp
                    @foreach ($codes as $item)
                        {{ $item }} <br>
                    @endforeach
                </div>
                <div class="col-sm-12 col-md-7 col-lg-7">
                    <span><strong>Title :</strong> {!! $show->title !!} </span> <br>
                    <span><strong>Price :</strong> {!! $show->price !!} </span> <br>
                    @isset($show->body)
                        <span> <strong>Description:</strong> {!! $show->body !!} </span> <br>
                    @endisset
                   
                    
                </div>
            </div>
        </div>
    </div>

@section('js')
@endsection

@endsection
