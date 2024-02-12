@extends('layouts.admin')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1>Edit City</h1>
                <form method="POST" action="{{ route('cities.update', $city->id) }}">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <input type="hidden" name="_method" value="PUT">
                    <div class="form-group">
                        <label for="name">City</label>
                        <input type="text" class="form-control" id="name" name="name" value="{{ $city->name }}">
                    </div>
                    <div class="form-group">
                        <lable for="user_given_name">Other City</lable>
                        <input type="text" class="form-control" id="user_given_name" name="user_given_name" value="{{ $city->user_given_name }}">
                    </div>
                    <input type="submit" class="btn btn-primary" value="Update City">
                </form>
            </div>
        </div>
    </div>
@endsection
