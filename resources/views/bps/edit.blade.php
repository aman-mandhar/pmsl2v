@extends('layouts.admin')

@section('content')
    <div class="container">
        <h2>Edit Business Promoter</h2>
        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <form method="POST" action="{{ route('bps.update') }}">
            @csrf
            @Method('PUT')
            <div class="form-group">
                <label for="user_id">User:</label>
                <select name="user_id" class="form-control">
                    @foreach($users as $user)
                        @if ($user->user_role == 9)
                            <option value="{{ $user->id }}" {{ $user->id == $bp->user_id ? 'selected' : '' }}>
                                {{ $user->name }}
                            </option>
                        @endif
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="bps_name">Business Promoter Name:</label>
                <input type="text" name="bps_name" class="form-control" value="{{ $bp->bps_name }}" required>
            </div>

            <div class="form-group">
                <label for="add">Business Promoter Address:</label>
                <input type="text" name="add" class="form-control" value="{{ $bp->add }}" required> 
            </div>

            <div class="form-group">
                <label for="city">City:</label>
                <input type="text" name="city" class="form-control" value="{{ $bp->city }}" required>
            </div>

            <div class="form-group">
                <label for="mobile_no">Mobile Number:</label>
                <input type="text" name="mobile_no" class="form-control" value="{{ $bp->mobile_no }}" required>
            </div>

            <div class="form-group">
                <label for="email">Email Address:</label>
                <input type="text" name="email" class="form-control" value="{{ $bp->email }}" required>
            </div>

            <button type="submit" class="btn btn-primary">Update Business Promoter</button>
        </form>
    </div>
@endsection