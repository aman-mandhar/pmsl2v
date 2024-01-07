@extends('layouts.admin')

@section('content')
    <div class="container">
        <h2>List of Business Promoters</h2>
        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <a href="{{ route('bps.create') }}" class="btn btn-success">Create Business Promoter</a>
        <table class="table mt-3">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>User Name</th>
                    <th>Address</th>
                    <th>City</th>
                    <th>Mobile No</th>
                    <th>Email</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($bps as $bp)
                    <tr>
                        <td>{{ $bp->id }}</td>
                        <td>{{ $bp->user->name }}</td>
                        <td>{{ $bp->add }}</td>
                        <td>{{ $bp->city }}</td>
                        <td>{{ $bp->mobile_no }}</td>
                        <td>{{ $bp->email }}</td>
                        <td>
                            <a href="{{ route('bps.edit', $bp->id) }}" class="btn btn-primary">Edit</a>
                            <a href="{{ route('bps.show', $bp->id) }}" class="btn btn-primary">View</a>
                            <a href="{{ route('bps.destroy', $bp->id) }}" class="btn btn-primary">Delete</a>
                        </td>
                    </tr>
                @endforeach