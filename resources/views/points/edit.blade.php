@extends('layouts.admin')
@section('content')

<div class="container">
    <h2>Create Points</h2>

    @if($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form method="post" action="{{ route('points.update')}}">
        @csrf
        <div class="form-group">
            <label for="title">Title:</label>
            <input type="text" class="form-control" name="title" value="{{ $point->title }}"/>
        </div>
        <div class="form-group">
            <label for="values_in">Values In:</label>
            <select class="form-control" name="values_in" required>
                <option value="Rupees">Percentage</option>
                <option value="Percentage">Rupees</option>
            </select>
        </div>
        <div class="form-group">
            <label for="discount">Discount:</label>
            <input type="number" class="form-control" name="discount" value="{{ $point->discount }}"/>
        </div>
        <div class="form-group">
            <label for="points_employee">Points Employee:</label>
            <input type="number" class="form-control" name="points_employee" value="{{ $point->points_employee }}"/>
        </div>
        <div class="form-group">
            <label for="points_ref_employee">Points Ref Employee:</label>
            <input type="number" class="form-control" name="points_ref_employee" value="{{ $point->points_ref_employee }}"/>
        </div>
        <div class="form-group">
            <label for="points_retailer">Points Retailer:</label>
            <input type="number" class="form-control" name="points_retailer" value="{{ $point->points_retailer }}"/>
        </div>
        <div class="form-group">
            <label for="points_ref_retailer">Points Ref Retailer:</label>
            <input type="number" class="form-control" name="points_ref_retailer" value="{{ $point->points_ref_retailer }}"/>
        </div>
        <div class="form-group">
            <label for="points_warehouse">Points Warehouse:</label>
            <input type="number" class="form-control" name="points_warehouse" value="{{ $point->points_warehouse }}"/> 
        </div>
        <div class="form-group">
            <label for="points_ref_warehouse">Points Ref Warehouse:</label>
            <input type="number" class="form-control" name="points_ref_warehouse" value="{{ $point->points_ref_warehouse }}"/>
        </div>
        <div class="form-group">
            <label for="points_sub_warehouse">Sub-Warehouse:</label>
            <input type="number" class="form-control" name="points_sub_warehouse" value="{{ $point->points_sub_warehouse }}"/>
        </div>
        <div class="form-group">
            <label for="points_ref_sub_warehouse">Points Ref Sub-Warehouse:</label>
            <input type="number" class="form-control" name="points_ref_sub_warehouse" value="{{ $point->points_ref_sub_warehouse }}"/>
        </div>
        <div class="form-group">
            <label for="points_merchant">Points Merchant:</label>
            <input type="number" class="form-control" name="points_merchant" value="{{ $point->points_merchant }}"/>
        </div>
        <div class="form-group">
            <label for="points_ref_merchant">Points Ref Merchant:</label>
            <input type="number" class="form-control" name="points_ref_merchant" value="{{ $point->points_ref_merchant }}"/>
        </div>
        <div class="form-group">
            <label for="points_vendor">Points Vendor:</label>
            <input type="number" class="form-control" name="points_vendor" value="{{ $point->points_vendor }}"/>
        </div>
        <div class="form-group">
            <label for="points_ref_vendor">Points Ref Vendor:</label>
            <input type="number" class="form-control" name="points_ref_vendor" value="{{ $point->points_ref_vendor }}"/>
        </div>
        <div class="form-group">
            <label for="points_transporter">Points Transporter:</label>
            <input type="number" class="form-control" name="points_transporter" value="{{ $point->points_transporter }}"/>
        </div>
        <div class="form-group">
            <label for="points_ref_transporter">Points Ref Transporter:</label>
            <input type="number" class="form-control" name="points_ref_transporter" value="{{ $point->points_ref_transporter }}"/>
        </div>
        <div class="form-group">
            <label for="points_delivery_partner">Points Delivery Partner:</label>
            <input type="number" class="form-control" name="points_delivery_partner" value="{{ $point->points_delivery_partner }}"/>
        </div>
        <div class="form-group">
            <label for="points_ref_delivery_partner">Points Ref Delivery Partner:</label>
            <input type="number" class="form-control" name="points_ref_delivery_partner" value="{{ $point->points_ref_delivery_partner }}"/>
        </div>
        <div class="form-group">
            <label for="points_business_promoter">Points Business Promoter:</label>
            <input type="number" class="form-control" name="points_business_promoter" value="{{ $point->points_business_promoter }}"/>
        </div>
        <div class="form-group">
            <label for="points_ref_business_promoter">Points Ref Business Promoter:</label>
            <input type="number" class="form-control" name="points_ref_business_promoter" value="{{ $point->points_ref_business_promoter }}"/>
        </div>

        <div class="form-group">
            <label for="points_customer">Points Customer:</label>
            <input type="number" class="form-control" name="points_customer" value="{{ $point->points_customer }}"/>
        </div>
        <div class="form-group">
            <label for="points_referrer">Points Referrer:</label>
            <input type="number" class="form-control" name="points_referrer" value="{{ $point->points_referrer }}"/>
        </div>
        <button type="submint" class="btn btn-primary">Update</button>
    </form>
</div>
@endsection

            