@extends('layouts.admin.app')
@section('title', 'Order Details')
@section('css')
@endsection

@section('admin_content')
    <div class="pagetitle">
        <h1>Order Details</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="@route('admin.dashboard')">Home</a></li>
                <li class="breadcrumb-item">Order Details Show</li>
                <li class="breadcrumb-item active">Order Details</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <div class="row my-5">
        <div class="col-md-4 col-lg-4 col-sm-12">
            <h3>User Information</h3><hr>
            <span><strong>Name: </strong> {{ $show->f_name .' '. $show->l_name }}</span> <br>
            <span><strong>Email: </strong> {{ $show->email}}</span> <br>
            <span><strong>Phone: </strong> {{ $show->phone }}</span> <br>
        </div>
        <div class="col-md-4 col-lg-4 col-sm-12">
            <h3>Location: </h3><hr>
            <span><strong>Address 1: </strong> {{ $show->address_1 }}</span> <br>
            <span><strong>Address 2: </strong> {{ $show->address_1}}</span> <br>
            <span><strong>Message: </strong> {{ $show->message }}</span> <br>
        </div>

        <div class="col-md-4 col-lg-4 col-sm-12">
            <h3>Paymets: </h3><hr>
            <span><strong>Payments Types : </strong> {{ $show->payment_type }}</span> <br>
            <span><strong>Payment Number: </strong> {{ $show->payment_number}}</span> <br>
            <span><strong>Payment Balance: </strong> {{ $show->payment_balance}}</span> <br>
        </div>

        
    </div>

    

    <section class="container">
        <h3>Cart Item List</h3>
        <table class="table">
            <thead>
              <tr>
                <th scope="col">Index</th>
                <th scope="col">Product Name</th>
                <th scope="col">Property</th>
                <th scope="col">Quantity</th>
                <th scope="col">Action</th>
              </tr> 
            </thead>
            <tbody>
                @foreach ($carts as $item)
                <tr>
                    <th scope="row">{{ $loop->index +1 }}</th>
                    <td>{{ $item->product ? $item->product->name : "" }}</td>
                    <td>
                        @foreach ($item->product ? $item->product->properties : "" as $property)
                            @if($property['title'] != null && $property['id'] == $item->property_id)
                            Name: {{ $property['title'] }} <br>
                            Sell Price: <b>{{ $property['price'] }} Taka</b> <br>
                            Discount Price: {{ $property['discount_price'] }} Taka
                            @endif
                        @endforeach
                    </td>
                    <td class="form-inline">
                       <form action="@route('admin.order.update', $item->cart_id)">
                            @method('put')
                            <input type="text" class="" name="quantity" value="{{ $item->quantity }}" id="">
                            <input type="submit" class="btn btn-sm btn-success" value="Update" id="">
                        </form>
                    </td>
                    <td>
                        <a href="{{ url('admin/cart/destroy', $item->cart_id) }}" class="btn btn-sm btn-danger">Delete</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
          </table>
    </section>


    <div class="">
        <div class="card">
            <div class="card-header">
                <h3>Order History</h3>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-3 col-lg-3 col-sm-12 text-center">
                        <h5>Ordered</h5>
                        <a class="badge rounded-pill bg-success" href="">Complete</a>
                    </div>
                    <div class="col-md-3 col-lg-3 col-sm-12 text-center">
                        <h5>Packed</h5>
                        @if ($show->packed == 0)
                            <a class="badge rounded-pill bg-danger" href="@route('admin.order.packed', $show->order_id)">No-Complete</a>
                        @else 
                            <a class="badge rounded-pill bg-success" href="@route('admin.order.packed', $show->order_id)">Complete</a>
                        @endif
                    </div>
                    @if ($show->packed ==1)
                    <div class="col-md-3 col-lg-3 col-sm-12 text-center">
                        <h5>Out For Delivery</h5>
                        @if ($show->out_for_delivery == 0)
                            <a class="badge rounded-pill bg-danger" href="@route('admin.order.out_for_delivery', $show->order_id)">No-Complete</a>
                        @else 
                            <a class="badge rounded-pill bg-success" href="@route('admin.order.out_for_delivery', $show->order_id)">Complete</a>
                        @endif
                    </div>
                    @endif
                    @if ($show->out_for_delivery ==1 && $show->packed == 1)
                    <div class="col-md-3 col-lg-3 col-sm-12 text-center">
                        <h5> Delivered</h5>
                        @if ($show->delivered == 0)
                            <a class="badge rounded-pill bg-danger" href="@route('admin.order.delivered', $show->order_id)">No-Complete</a>
                        @else 
                            <a class="badge rounded-pill bg-success" href="@route('admin.order.delivered', $show->order_id)">Complete</a>
                        @endif
                    </div>
                    @endif
                    
                </div>
            </div>
        </div>
    </div>

@section('js')
@endsection

@endsection
