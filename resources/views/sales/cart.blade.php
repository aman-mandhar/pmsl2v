@extends('layouts.app')
@section('content')
<div class="container">
    
        <tbody>    
            @forelse($cartItems as $cartItem)
            <tr>
                <td>{{ $cartItem->product->name }}</td>
                <td>{{ $cartItem->quantity }}</td>
                <td>{{ $cartItem->product->price }}</td>
                <td>{{ $cartItem->product->price * $cartItem->quantity }}</td>
                <td>
                    <form action="{{ route('sales.cart.remove', $cartItem->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Remove</button>
                    </form>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="5">No items in cart</td>
            </tr>
            @endforelse
        </tbody>
</div>
@endsection