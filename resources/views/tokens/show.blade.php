@extends('layouts.admin')
@section('content')

<div class="container">

                <td>{{ $token->title }}</td>
                <td>{{ $token->discount }}</td>
                <td>{{ $token->values_in }}</td>
                <td>{{ $token->retailer }}</td>
                <td>{{ $token->retailer_ref }}</td>
                <td>{{ $token->sub_warehouse }}</td>
                <td>{{ $token->sub_warehouse_ref }}</td>
                <td>{{ $token->merchant }}</td>
                <td>{{ $token->merchant_ref }}</td>
                <td>{{ $token->vendor }}</td>
                <td>{{ $token->vendor_ref }}</td>
                <td>{{ $token->referrer }}</td>
                <td>{{ $token->customer }}</td>

</div>


@endsection
