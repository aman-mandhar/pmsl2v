@extends('layouts.admin')
@section('content')

<div class="container">
    <table class="table">
        <thead>
            <tr>
                <th>Image</th>
                <th>Product</th>
                <th>Quantity/Weight</th>
                <th>Sale Price</th>
                <th>Tokens on Sale</th>
                <th>Expiery Date</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                @forelse ($retailerstocks as $retailerstock)
                <td><img src="{{ asset('storage/'.$retailerstock->product->image) }}" alt="" width="100px" height="100px"></td>
                <td>{{ $retailerstock->product->name }}</td>
                <td>{{ $retailerstock->quantity }}</td>  
                <td>{{ $retailerstock->sale_price }}</td>
                <td>{{ $retailerstock->tokens_on_sale }}</td>
                <td>{{ $retailerstock->expiry_date }}</td>
            </tr>
            @empty
            <tr>
                <td colspan="6">No Stocks</td>
            </tr>
            @endforelse
        </tbody>
    </table>
</div>

@endsection
                
                