@extends('layouts.admin')
@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Create Business Promoter</div>
                <div class="card-body">
                    <form method="POST" action="{{ route('bps.store') }}">
                        @csrf

                            <div class="form-group">
                                <label for="user_id">User:</label>
                                <select name="user_id" id="user_id" class="form-control" required>
                                    @foreach($users as $user)
                                        @if($user->user_role == 9)
                                            <option value="{{ $user->id }}">{{ $user->name }}</option>
                                        @endif
                                    @endforeach
                                </select>
                            </div>
                            
                            <div class="form-group">
                                <label for="bps_name">Business Promoter Name:</label>
                                <input type="text" name="bps_name" id="bps_name" class="form-control" required>
                            </div>

                            <div class="form-group">
                                <label for="add">Business Promoter Address:</label>
                                <input type="text" name="add" id="add" class="form-control" required>
                            </div>

                            <div class="form-group">
                                <label for="city">City:</label>
                                <input type="text" name="city" id="city" class="form-control" required>
                            </div>

                            <div class="form-group">
                                <label for="mobile_no">Mobile Number:</label>
                                <input type="text" name="mobile_no" id="mobile_no" class="form-control" required>
                            </div>

                            <div class="form-group">
                                <label for="email">Email Address:</label>
                                <input type="text" name="email" id="email" class="form-control" required>
                            </div>

                            <div class="form-group">
                                <button type="submit" class="btn btn-primary">Create Business Promoter</button>
                            </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection