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

   <form method="post" action="{{ route('points.store') }}"> 
        @csrf
            <div class="form-group">
                <label for="title">Name of Point System:</label>
                <input type="text" class="form-control"  placeholder="Enter Name of Point System" name="title" required/>
        
            <div class="form-group">
                <label for="values_in">Values In:</label>
                <select class="form-control" name="values_in" required>
                    <option value="Rupees">Percentage</option>
                    <option value="Percentage">Rupees</option>
                </select>
            </div>
            <div class="form-group">
                <label for="discount">Discount:</label>
                <input type="number" class="form-control" name="discount" value="0"/>
            </div>
            <div class="form-group">
                <label for="points_employee">Points Employee:</label>
                <input type="number" class="form-control" name="points_employee" value="0"/>
            </div>
            <div class="form-group">
                <label for="points_ref_employee">Points Ref Employee:</label>
                <input type="number" class="form-control" name="points_ref_employee" value="0"/>
            </div>
            <div class="form-group">
                <label for="points_retailer">Points Retailer:</label>
                <input type="number" class="form-control" name="points_retailer" value="0"/>
            </div>
            <div class="form-group">
                <label for="points_ref_retailer">Points Ref Retailer:</label>
                <input type="number" class="form-control" name="points_ref_retailer" value="0"/>
            </div>
            <div class="form-group">
                <label for="points_warehouse">Points Warehouse:</label>
                <input type="number" class="form-control" name="points_warehouse" value="0"/>
            </div>
            <div class="form-group">
                <label for="points_ref_warehouse">Points Ref Warehouse:</label>
                <input type="number" class="form-control" name="points_ref_warehouse" value="0"/>
            </div>
            <div class="form-group">
                <label for="points_sub_warehouse">Points Subwarehouse:</label>
                <input type="number" class="form-control" name="points_sub_warehouse" value="0"/>
            </div>
            <div class="form-group">
                <label for="points_ref_sub_warehouse">Points Ref Subwarehouse:</label>
                <input type="number" class="form-control" name="points_ref_sub_warehouse" value="0"/>
            </div>
            <div class="form-group">
                <label for="points_merchant">Points Merchant:</label>
                <input type="number" class="form-control" name="points_merchant" value="0"/>
            </div>
            <div class="form-group">
                <label for="points_ref_merchant">Points Ref Merchant:</label>
                <input type="number" class="form-control" name="points_ref_merchant" value="0"/>
            </div>
            <div class="form-group">
                <label for="points_vendor">Points Vendor:</label>
                <input type="number" class="form-control" name="points_vendor" value="0"/>
            </div>
            <div class="form-group">
                <label for="points_ref_vendor">Points Ref Vendor:</label>
                <input type="number" class="form-control" name="points_ref_vendor" value="0"/>
            </div>
            <div class="form-group">
                <label for="points_transporter">Points Transporter:</label>
                <input type="number" class="form-control" name="points_transporter" value="0"/>
            </div>
            <div class="form-group">
                <label for="points_ref_transporter">Points Ref Transporter:</label>
                <input type="number" class="form-control" name="points_ref_transporter" value="0"/>
            </div>
            <div class="form-group">
                <label for="points_delivery_partner">Points Delivery Partner:</label>
                <input type="number" class="form-control" name="points_delivery_partner" value="0"/>
            </div>
            <div class="form-group">
                <label for="points_ref_delivery_partner">Points Delivery Partner Ref:</label>
                <input type="number" class="form-control" name="points_ref_delivery_partner" value="0"/>
            </div>
            <div class="form-group">
                <label for="points_business_promoter">Points Business Promoter:</label>
                <input type="number" class="form-control" name="points_business_promoter" value="0"/>
            </div>
            <div class="form-group">
                <label for="points_ref_business_promoter">Points Ref Business Promoter:</label>
                <input type="number" class="form-control" name="points_ref_business_promoter" value="0"/>
            </div>
            <div class="form-group">
                <label for="points_customer">Points Customer:</label>
                <input type="number" class="form-control" name="points_customer" value="0"/>
            </div>
            <div class="form-group">
                <label for="points_referrer">Points Referrer:</label>
                <input type="number" class="form-control" name="points_referrer" value="0"/>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
            <a href="{{ route('points.index') }}" class="btn btn-secondary"><button type="submit" class="btn btn-primary">Create Point Schema</button></a>
    </form>
        
    
</div>
    
@endsection


