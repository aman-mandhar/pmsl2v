@extends('layouts.admin')
@section('content')
    <form action="{{ route('sales.new') }}" method="GET" class="mb-3">
        @csrf
        <div class="input-group">
            <input type="text" class="form-control" placeholder="Customer mobile number" name="search" id="search" value="{{ request('search') }}">
            <button type="submit" class="btn btn-outline-secondary">Search</button>
            <button type="reset" class="btn btn-outline-secondary">Reset</button>
        </div>
    </form>
@endsection
