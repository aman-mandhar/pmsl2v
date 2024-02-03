@extends('layouts.admin')
@section('content')

<div class="container">
    <h2>Points List</h2>
    <a href="{{ route('points.create') }}" class="btn btn-primary">Create Points</a>

    @if(session('success'))
        <div class="alert alert-success mt-2">
            {{ session('success') }}
        </div>
    @endif

    <table class="table mt-3">
        <thead>
            <tr>
                <th>Title</th>
                <th>Discount</th>
                <th>Customer</th>
                <th>Referrer</th>
                <th>Sub-Warehouse</th>
                <th>Ref. Sub-Warehouse</th>
                <th>Retailer</th>
                <th>Ref. Retailer</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($points as $point)
            <tr>
                <td>{{ $point->title }}</td>
                <td>{{ $point->discount }}</td>
                <td>{{ $point->points_customer }}</td>
                <td>{{ $point->points_referrer }}</td>
                <td>{{ $point->points_sub_warehouse }}</td>
                <td>{{ $point->points_ref_sub_warehouse }}</td>
                <td>{{ $point->points_retailer }}</td>
                <td>{{ $point->points_ref_retailer }}</td>
                <td>
                    <form action="{{ route('points.edit', $point->id) }}" method="get" class="d-inline">
                        @csrf
                        <input type="submit" value="Edit" class="btn btn-danger">
                    </form>
                    <form action="{{ route('points.show', $point->id) }}" method="get" class="d-inline">
                        @csrf
                        <input type="submit" value="Show" class="btn btn-info">
                    </form>
                    <form action="{{ route('points.destroy', $point->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection