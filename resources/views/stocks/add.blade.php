@extends('layouts.admin')

@section('content')

    <div class="container col-md-12">
        <h4>Add Stock for</h4> : <b>{{ $item->name }}</b><br>
        <table class="table col-md-6">
            <tbody>
                <tr>
                    <td>
                        {{ $item->description }}<br>
                        {{ $item->category->name }} ->
                        {{ $item->subCategory->name }} ->
                        {{ $item->variation->color }}, 
                        {{ $item->variation->size }}, 
                        {{ $item->variation->weight }}, 
                        {{ $item->variation->length }}, 
                        {{ $item->variation->liqued_volume }}<br>
                        <strong>{{ $item->type }}</strong>
                    </td>
                    <td>
                        <img src="{{ asset($item->prod_pic) }}" alt="Product Image" style="width: 60px; height: 60px; object-fit: cover;"><br>
                        <a href="{{ route('products.items.edit', $item->id) }}" class="btn btn-primary">Edit</a>
                    </tr>
            </tbody>
        </table>
        
        <form action="{{ route('stocks.store') }}" method="post" class="col-md-6">
            @csrf
            <input type="hidden" name="item_id" value="{{ $item->id }}">
            <table class="table col-md-12">
            <tr>
                <td class="col-md-6">
                    <div class="form-group">
                        <label for="merchant">Merchant:</label>
                        <select name="merchant" id="merchant" class="form-control">
                            <option value="Open Market" selected>Open Market</option>
                            @foreach($merchants as $merchant)
                                <option value="{{ old($merchant->name) }}">{{ $merchant->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        @if ($item->type == 'Pack')
                            <label for="qty">Quantity</label>
                            <input type="number" name="qty" id="qty" class="form-control" value="{{ $stock->qty }}" required placeholder="Quantity" step="0.01">
    
                            @elseif ($item->type == 'Loose') 
                            <label for="weight">Weight</label>    
                            <input type="number" name="weight" id="weight" class="form-control" value="{{ $stock->weight }}" required placeholder="Weight e.g. 999.999" step="0.001">
                            @endif
                    </div>
                    <div class="form-group">
                        <label for="pur_value">Purchase Amount</label>
                        <input type="number" name="pur_value" id="pur_value" class="form-control" value="{{ $stock->pur_value }}" required placeholder="Purchase Amount per item" step="0.01">
                    </div>
                    <div class="form-group">
                        <label for="expences">Purchase Expenditure</label>
                        <input type="number" name="expences" id="expences" class="form-control" value="{{ $stock->expences }}" required placeholder="Purchase Expenditure" step="0.01">
                    </div>
                    <div class="form-group">
                        <label for="mrp">Market Price</label>
                        <input type="number" name="mrp" id="mrp" class="form-control" value="{{ $stock->mrp }}" required placeholder="Market Price" step="0.01">
                    </div>
                    <div class="form-group">
                        <label for="sale_price">ZK Sale Price</label>
                        <input type="number" name="sale_price" id="sale_price" class="form-control" value="{{ $stock->sale_price }}" required placeholder="ZK Price per item" step="0.01">
                    </div>
                </td>
                <td class="col-md-6">
                    <div class="form-group">
                        <label for="gst">GST Paid at Purchase</label>
                        <input type="number" name="gst" id="gst" class="form-control" value="{{$gst}}" placeholder="GST Paid" readonly>
                    </div>
                    <div class="form-group">
                        <label for="gross_cost">Gross Cost<i>(Pur + gst + exp)</i></label>
                        <input type="number" name="gross_cost" id="" class="form-control" value="{{$gross_cost}}" placeholder="Gross Cost" readonly>
                    </div>
                    <div class="form-group">
                        <label for="gross_profit">Gross Profit<i>(ZK Price - Gross Cost)</i></label>
                        <input type="number" name="gross_profit" id="gross_profit" class="form-control" value="{{$gross_profit}}" placeholder="Gross Profit" readonly>
                    </div>
                    <div class="form-group">
                        <label for="discount">Special Discount</label>
                        <input type="number" name="discount" id="discount" class="form-control" value="{{$spl_discount}}" placeholder="Special Discount" readonly>
                    </div>
                    <div class="form-group">
                        <label for="gst_on_sale">GST at Sale<i>(Calculating on ZK Sale Price)</i></label>
                        <input type="number" name="gst_on_sale" id="gst_on_sale" class="form-control" value="{{$gst_sale}}" placeholder="Approx. GST Paid on Sale" readonly>
                    </div>
                    <div class="form-group">
                        <label for="net_profit">Net Profit<i>(Gross Profit - Special Discount - GST at Sale)</i></label>
                        <input type="number" name="net_profit" id="net_profit" class="form-control" value="{{$net_profit}}" placeholder="Net Profit" readonly>
                    </div>
                </td>
            </tr>
            </table>
            
                <h6>Tokens Distribution</h6>
                      
            <table class="table col-md-6">
                            <tbody>
                                <tr class="row-md-6">
                                    <td>
                                        <label for="swh">Sub-Warehouse</label>
                                        <input type="number" name="swh" id="swh" class="form-control" value="{{$swh}}" readonly placeholder="Sub-Warehouse Tokens" step="0.01">
                                    </td>
                                    <td>
                                        <label for="swh_ref">Rf. Sub-Warehouse</label>
                                        <input type="number" name="swh_ref" id="swh_ref" class="form-control" value="{{$swh_ref}}" readonly placeholder="Rf. Sub-Warehouse Tokens" step="0.01">
                                    </td>
                                </tr>
                                <tr class="row-md-6">
                                    <td class="col-md-3">
                                        <label for="store">Store</label>
                                        <input type="number" name="store" id="store" class="form-control" value="{{$ret}}" readonly placeholder="Store Tokens" step="0.01">
                                    </td>
                                    <td class="col-md-3">
                                        <label for="store_ref">Rf. Store</label>
                                        <input type="number" name="store_ref" id="store_ref" class="form-control" value="{{$ret_ref}}" readonly placeholder="Rf. Sub-Warehouse Tokens" step="0.01">
                                    </td>
                                </tr>
                                <tr class="row-md-6">
                                    <td class="col-md-3">
                                        <label for="ref">Referral</label>
                                        <input type="number" name="ref" id="ref" class="form-control" value="{{$ref}}" readonly placeholder="Referral Tokens" step="0.01">
                                    </td>
                                    <td class="col-md-3">
                                        <label for="customer">Customer</label>
                                        <input type="number" name="customer" id="customer" class="form-control" value="{{$cust}}" readonly placeholder="Customer Tokens" step="0.01">
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <h6>Bill Details</h6>
                        <div class = "container col-md-9">    
                            <div class="form-group">
                                <label for="pur_bill_pic">Bill Picture:</label>
                                <input type="file" name="pur_bill_pic" id="pur_bill_pic" class="form-control">
                            </div> 
                            <div class="form-group">
                                <label for="pur_bill_no">Bill No.:</label>
                                <input type="text" name="pur_bill_no" id="pur_bill_no" class="form-control">
                                <input type="hidden" name="item_id" id="item_id" class="form-control" value="{{ $item->id }}">
                            </div>
                
                            <div class="form-group">
                                <label for="pur_date">Purchase Date:</label>
                                <input type="date" name="pur_date" id="pur_date" class="form-control"> 
                            </div>
                
                            <div class="form-group">
                                <label for="batch_no"></label>
                                <input type="text" name="batch_no" id="batch_no" class="form-control" placeholder="Batch No.">
                            </div>
                
                            <div class="form-group">
                                <label for="mfg_date"></label>
                                <input type="date" name="mfg_date" id="mfg_date" class="form-control" placeholder="Mfg. Date">
                            </div>
                            <div class="form-group">
                                <label for="exp_date"></label>
                                <input type="date" name="exp_date" id="exp_date" class="form-control" placeholder="Exp. Date">
                            </div>
                            <div class="form-group">
                                <label for="remarks"></label>
                                <input type="text" name="remarks" id="remarks" class="form-control" placeholder="Remarks">
                            </div>
                        </div>           
                
                           
                            <input type="hidden" name="sub_warehouse" value="{{ $token->sub_warehouse }}">
                            <input type="hidden" name="sub_warehouse_ref" value="{{ $token->sub_warehouse_ref }}">
                            <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                            <input type="hidden" name="user_name" value="{{ Auth::user()->name }}">
                            
                
                            <button type="submit" class="btn btn-primary">Add Stock</button>
                        
                        
                    </div>
                        
        </form>
    </div>
    
@endsection