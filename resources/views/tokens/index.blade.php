@extends('layouts.admin')
@section('content')

<div class="container">

    <h3>Token System</h3>
    <form action="{{ route('tokens.search') }}" method="GET" role="search">
        {{ csrf_field() }}
        <div class="input-group">
            <input type="text" class="form-control" name="q"
                placeholder="Search users"> <span class="input-group-btn">
                <button type="submit" class="btn btn-default">
                    <span class="glyphicon glyphicon-search">Search</span>
                </button>
            </span>
        </div>
    </form>
    
    <table class="table">
        <thead>
            <tr>
                <th>Title</th>
                <th>Discount</th>
                <th>IN</th>
                <th>Retailer</th>
                <th>Ref Retailer</th>
                <th>Sub-Warehouse</th>
                <th>Ref Sub-Warehouse</th>
                <th>Merchant</th>
                <th>Ref Merchant</th>
                <th>Vendor</th>
                <th>Ref Vendor</th>
                <th>Referrer</th>
                <th>Customer</th>
                <th>Total</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
          @forelse ($tokens as $token)
        <tr>    
            <td>{{$token->title}}</td>
            <td>{{$token->discount}}</td>
            <td>{{$token->values_in}}</td>
            <td>{{$token->retailer}}</td>
            <td>{{$token->retailer_ref}}</td>
            <td>{{$token->sub_warehouse}}</td>
            <td>{{$token->sub_warehouse_ref}}</td>
            <td>{{$token->merchant}}</td>
            <td>{{$token->merchant_ref}}</td>
            <td>{{$token->vendor}}</td>
            <td>{{$token->vendor_ref}}</td>
            <td>{{$token->referrer}}</td>
            <td>{{$token->customer}}</td>
            <td>{{$token->discount+
                  $token->retailer+
                  $token->retailer_ref+
                  $token->sub_warehouse+
                  $token->sub_warehouse_ref+
                  $token->merchant+
                  $token->merchant_ref+
                  $token->vendor+
                  $token->vendor_ref+
                  $token->referrer+
                  $token->customer}}
            </td>
            <td>
                <a href="{{ route('tokens.edit', $token->id)}}" class="btn btn-primary">Edit</a>
            </td>
            <td>
                <form action="{{ route('tokens.destroy', $token->id)}}" method="post">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-danger" type="submit">Delete</button>
                </form>
            </td>
            <td>
                <a href="{{ route('tokens.show', $token->id)}}" class="btn btn-primary">Show</a>
            </td>
            @empty
            
            <p>No tokens</p>
        </tr>
            @endforelse
                
            
        </tbody>
    </table>
    <div>
        <a style="margin: 19px;" href="{{ route('tokens.create')}}" class="btn btn-primary">Create New Token System</a>
    </div>
</div>

@endsection
