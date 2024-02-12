@extends('layouts.admin')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1>Add City</h1>
                <form method="POST" action="{{ route('cities.store') }}">
                    @csrf
                    <div class="form-group">
                        <label for="name">City</label>
                        <input type="text" class="form-control" id="name" name="name">
                    </div>
                    
                    <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                        
                    <input type="submit" class="btn btn-primary" value="Add City">
                </form>
            </div>
        </div>
    </div>


@endsection