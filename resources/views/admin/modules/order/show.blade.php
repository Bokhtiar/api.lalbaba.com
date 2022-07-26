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

    <section class="container">
        <table class="table">
            <thead>
              <tr>
                <th scope="col">Index</th>
                <th scope="col">Product Name</th>
                <th scope="col">Property</th>
                <th scope="col">Qty</th>
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
                            <b>{{ $property['id'] }}</b>: {{ $property['title'] }} <b>{{ $property['price'] }}</b>: {{ $property['discount_price'] }}<br />
                            @endif
                        @endforeach
                    </td>
                    <td>
                        {{ $item->quantity }}
                    </td>
                </tr>
                @endforeach
            </tbody>
          </table>
    </section>


@section('js')
@endsection

@endsection
