@extends('layouts.admin')
@section('content')

<div class="container">
    <h2>Create Tokens</h2>

    @if($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
     @endif

    <form method="post" action="{{ route('tokens.store') }}"> 
        @csrf
            <div class="form-group">
                <label for="title">Name of Token System:</label>
                <input type="text" class="form-control"  placeholder="Enter Name of Token System" name="title" required/>
            </div>
            <div class="form-group">
                <label for="values_in">Values In:</label>
                <select class="form-control" name="values_in" required>
                    <option value="Percentage">Percentage</option>
                    <option value="Tokens">Tokens</option>
                </select>
            </div>
            <div class="form-group">
                <label for="discount">Discount:</label>
                <input type="number" class="form-control" name="discount" value="0"/>
            </div>
           
            <div class="form-group">
                <label for="retailer">Tokens Retailer:</label>
                <input type="number" class="form-control" name="retailer" value="0"/>
            </div>
            <div class="form-group">
                <label for="retailer_ref">Tokens Ref Retailer:</label>
                <input type="number" class="form-control" name="retailer_ref" value="0"/>
            </div>
            <div class="form-group">
                <label for="sub_warehouse">Tokens Sub-Warehouse:</label>
                <input type="number" class="form-control" name="sub_warehouse" value="0"/>
            </div>
            <div class="form-group">
                <label for="sub_warehouse_ref">Tokens Ref Sub-Warehouse:</label>
                <input type="number" class="form-control" name="sub_warehouse_ref" value="0"/>
            </div>
            <div class="form-group">
                <label for="'merchant">Tokens Merchant:</label>
                <input type="number" class="form-control" name="'merchant" value="0"/>
            </div>
            <div class="form-group">
                <label for="merchant_ref">Tokens Ref Merchant:</label>
                <input type="number" class="form-control" name="merchant_ref" value="0"/>
            </div>
            <div class="form-group">
                <label for="vendor">Tokens Vendor:</label>
                <input type="number" class="form-control" name="vendor" value="0"/>
            </div>
            <div class="form-group">
                <label for="vendor_ref">Tokens Ref Vendor:</label>
                <input type="number" class="form-control" name="vendor_ref" value="0"/>
            </div>
            <div class="form-group">
                <label for="customer">Tokens customer:</label>
                <input type="number" class="form-control" name="customer" value="0"/>
            </div>
            <div class="form-group">
                <label for="referrer">Tokens Ref:</label>
                <input type="number" class="form-control" name="referrer" value="0"/>
            </div>
            <button type="submit" class="btn btn-primary">Create</button>
    </form>

@endsection