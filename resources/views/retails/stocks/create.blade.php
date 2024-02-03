@extends('layouts.admin')
@section('content')

<div class="row">
    
    <div class="col-md-12">
        <h1>Create Stock</h1>
    </div>

    <div class="container">
        <form action="{{ route('retails.stocks.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="product_id">Product</label>
                <select name="product_id" id="product_id" class="form-control">
                    @foreach ($products as $product)
                        <option value="{{ $product->id }}">{{ $product->name }} - {{ $product->code }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="quantity">Quantity</label>
                <input 
                    type="number" 
                    name="quantity" 
                    id="quantity" 
                    class="form-control" 
                    placeholder="Enter quantity"
                    value="{{ old('quantity') }}"
                >
            </div>
            <div class="form-group">
                <label for="price">Price</label>
                <input 
                    type="number" 
                    name="price" 
                    id="price" 
                    class="form-control" 
                    placeholder="Enter price"
                    value="{{ old('price') }}"
                >
            </div>
            <div class="form-group">
                <label for="retail_id">Retail</label>
                <select name="retail_id" id="retail_id" class="form-control">
                    @foreach ($retails as $retail)
                        <option value="{{ $retail->id }}">{{ $retail->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="supplier_id">Supplier</label>
                <select name="supplier_id" id="supplier_id" class="form-control">
                    @foreach ($suppliers as $supplier)
                        <option value="{{ $supplier->id }}">{{ $supplier->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="date">Date</label>
                <input 
                    type="date" 
                    name="date" 
                    id="date" 
                    class="form-control" 
                    placeholder="Enter date"
                    value="{{ old('date') }}"
                >
            </div>
            <div class="form-group">
                <label for="status">Status</label>
                <select name="status" id="status">
                    <option value="1">Active
