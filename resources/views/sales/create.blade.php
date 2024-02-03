@extends('layouts.admin')
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
@section('content')
<table class="table">
    <thead>
        <tr>
            <th>Image</th>
            <th>Item Detail (Name, Description)</th>
            <th>Sale Price</th>
            <th>Customer's Points</th>
            <th>Discount</th>
            <th>Quantity / Weight / Length</th>
            <th>GST</th>
            <th>Net Amount</th>
            <th>Action</th>            
        </tr>
    </thead>
    <tbody>
        <form action="{{ route('cart.add') }}" method="POST">
            @csrf
        @forelse($stocks as $stock)
            <tr class="item-row">
                <td>
                    @php
                        $img = $stock->item->prod_pic; // Assuming there is a relationship between Stock and Item
                    @endphp
                    <img src="{{ asset($img) }}" alt="Product Image" style="width: 60px; height: 60px; object-fit: cover;">
                </td>
                <td>
                    @php
                        $name = $stock->item->name; // Assuming there is a relationship between Stock and Item
                        $description = $stock->item->description; // Assuming there is a relationship between Stock and Item
                    @endphp
                    {{ $name }}
                    <br>
                    <small>{{ $description }}</small>
                    <br>
                </td>
                <td>
                    @php
                        $sale_price = $stock->sale_price; // Assuming there is a relationship between Stock and Item
                    @endphp
                    {{ $sale_price }}   
                </td>
                <td>
                    @php
                        $points = $stock->points; // Assuming there is a relationship between Stock and Item
                    @endphp
                    {{ 0.10 * $stock->tot_points }}
                </td>
                <td>
                    @php
                        $mrp = $stock->mrp; // Assuming there is a relationship between Stock and Item
                        $sale_price = $stock->sale_price; // Assuming there is a relationship between Stock and Item
                    @endphp
                    {{ $mrp - $sale_price }}
                </td>
                <td>
                    @php
                        $type = $stock->item->type; // Assuming there is a relationship between Stock and Item
                    @endphp
                    @if ($type === "Packet")
                        <input type="number" name="quantity" id="quantity" min="1" class="form-control" placeholder="Quantity">
                    @else
                        <input type="number" name="measure" id="measure" class="form-control" placeholder="Weight in kg only">
                    @endif
                </td>
                <td>
                    @php
                        $sale_price = $stock->sale_price; // Assuming there is a relationship between Stock and Item
                        $gst = $stock->item->gst; // Assuming there is a relationship between Stock and Item
                    @endphp
                    {{ $sale_price * ($gst/100) }}
                </td>
                <td>
                    @php
                        $sale_price = $stock->sale_price; // Assuming there is a relationship between Stock and Item
                        $gst = $stock->item->gst; // Assuming there is a relationship between Stock and Item
                    @endphp
                    {{ $sale_price + ($sale_price * ($gst/100)) }}  
                </td>
                <td>
                    <a href="{{route('cart.add')}}" class="btn btn-warning">Add to Cart</a>
                </td>
            </tr>
        @empty
            <!-- Handle the case where there are no stocks -->
            <tr>
                <td colspan="9">No stocks found</td>
            </tr>
        @endforelse
        </form> 
    </tbody>
</table>
@endsection

