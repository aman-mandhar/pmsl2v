@extends('layouts.admin')
@section('content')

<div class="container">

    <form method="post" action="{{ route('tokens.update', $token->id) }}">
        @method('PUT')
        @csrf
        <div class="form-group">
            <label for="title">Title:</label>
            <input type="text" class="form-control" name="title" value={{ $token->title }} />
        </div>
        <div class="form-group">
            <label for="discount">Discount:</label>
            <input type="text" class="form-control" name="discount" value={{ $token->discount }} />
        </div>
        <div class="form-group">
            <label for="values_in">Selected value in : {{ $token->values_in }} of Gross Profit</label>
            <select name="values_in" id="values_in" class="form-control">
                <option value="">Select to change the value in :</option>
                <option value="Percentage">Percentage</option>
                <option value="Tokens">Tokens</option>
            </select>
        </div>
        <div class="form-group">
            <label for="retailer">Retailer:</label>
            <input type="text" class="form-control" name="retailer" value={{ $token->retailer }} />
        </div>
        <div class="form-group">
            <label for="retailer_ref">Ref Retailer:</label>
            <input type="text" class="form-control" name="retailer_ref" value={{ $token->retailer_ref }} />
        </div>
        <div class="form-group">
            <label for="sub_warehouse">Sub-Warehouse:</label>
            <input type="text" class="form-control" name="sub_warehouse" value={{ $token->sub_warehouse }} />
        </div>
        <div class="form-group">
            <label for="sub_warehouse_ref">Ref Sub-Warehouse:</label>
            <input type="text" class="form-control" name="sub_warehouse_ref" value={{ $token->sub_warehouse_ref }} />
        </div>
        <div class="form-group">
            <label for="merchant">Merchant:</label>
            <input type="text" class="form-control" name="merchant" value={{ $token->merchant }} />
        </div>
        <div class="form-group">
            <label for="merchant_ref">Ref Merchant:</label>
            <input type="text" class="form-control" name="merchant_ref" value={{ $token->merchant_ref }} />
        </div>
        <div class="form-group">
            <label for="vendor">Vendor:</label>
            <input type="text" class="form-control" name="vendor" value={{ $token->vendor }} />
        </div>
        <div class="form-group">
            <label for="vendor_ref">Ref Vendor:</label>
            <input type="text" class="form-control" name="vendor_ref" value={{ $token->vendor_ref }} />
        </div>
        <div class="form-group">
            <label for="referrer">Referrer:</label>
            <input type="text" class="form-control" name="referrer" value={{ $token->referrer }} />
        </div>
        <div class="form-group">
            <label for="customer">Customer:</label>
            <input type="text" class="form-control" name="customer" value={{ $token->customer }} />
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
    </form>
</div>
@endsection