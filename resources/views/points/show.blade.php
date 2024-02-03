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
    <form class="form-horizontal">
        <div class="form-group">
            <label for="title">Title:</label>
            {{ $point->title }}
        </div>
        <div class="form-group">
            <label for="values_in">Values In:</label>
            {{ $point->values_in }}
        </div>
        <div class="form-group">
            <label for="discount">Discount:</label>
            {{ $point->discount }}
        </div>
        <div class="form-group">
            <label for="points_employee">Points Employee:</label>
            {{ $point->points_employee }}
        </div>
        <div class="form-group">
            <label for="points_ref_employee">Points Ref Employee:</label>
            {{ $point->points_ref_employee }}
        </div>
        <div class="form-group">
            <label for="points_retailer">Points Retailer:</label>
            {{ $point->points_retailer }}
        </div>
        <div class="form-group">
            <label for="points_ref_retailer">Points Ref Retailer:</label>
            {{ $point->points_ref_retailer }}
        </div>
        <div class="form-group">
            <label for="points_warehouse">Points Warehouse:</label>
            {{ $point->points_warehouse }} 
        </div>
        <div class="form-group">
            <label for="points_ref_warehouse">Points Ref Warehouse:</label>
            {{ $point->points_ref_warehouse }}
        </div>
        <div class="form-group">
            <label for="points_sub_warehouse">Sub-Warehouse:</label>
            {{ $point->points_sub_warehouse }}
        </div>
        <div class="form-group">
            <label for="points_ref_sub_warehouse">Points Ref Sub-Warehouse:</label>
            {{ $point->points_ref_sub_warehouse }}
        </div>
        <div class="form-group">
            <label for="points_merchant">Points Merchant:</label>
            {{ $point->points_merchant }}
        </div>
        <div class="form-group">
            <label for="points_ref_merchant">Points Ref Merchant:</label>
            {{ $point->points_ref_merchant }}
        </div>
        <div class="form-group">
            <label for="points_vendor">Points Vendor:</label>
            {{ $point->points_vendor }}
        </div>
        <div class="form-group">
            <label for="points_ref_vendor">Points Ref Vendor:</label>
            {{ $point->points_ref_vendor }}
        </div>
        <div class="form-group">
            <label for="points_transporter">Points Transporter:</label>
            {{ $point->points_transporter }}
        </div>
        <div class="form-group">
            <label for="points_ref_transporter">Points Ref Transporter:</label>
            {{ $point->points_ref_transporter }}
        </div>
        <div class="form-group">
            <label for="points_delivery_partner">Points Delivery Partner:</label>
            {{ $point->points_delivery_partner }}
        </div>
        <div class="form-group">
            <label for="points_ref_delivery_partner">Points Ref Delivery Partner:</label>
            {{ $point->points_ref_delivery_partner }}
        </div>
        <div class="form-group">
            <label for="points_business_promoter">Points Business Promoter:</label>
            {{ $point->points_business_promoter }}
        </div>
        <div class="form-group">
            <label for="points_ref_business_promoter">Points Ref Business Promoter:</label>
            {{ $point->points_ref_business_promoter }}
        </div>

        <div class="form-group">
            <label for="points_customer">Points Customer:</label>
            {{ $point->points_customer }}
        </div>
        <div class="form-group">
            <label for="points_referrer">Points Referrer:</label>
           {{ $point->points_referrer }}
        </div>
        <div class="form-group">
            <label for="points_admin">Points Admin:</label>
            {{ $point->points_admin }}
        </div>
        
    </form>
</div>
@endsection

            