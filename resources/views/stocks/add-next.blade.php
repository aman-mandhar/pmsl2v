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
        <form action="{{ route('stocks.store') }}" method="POST" class="col-md-6">
            @csrf
            <table>
                <thead>
                  <tr>
                    <th><label for="merchant">Merchant:</label></th>
                    <th><label for="vendor">Vendor Product:</label>
                        <input type="radio" name="vendor" value="No" checked> No
                        <input type="radio" name="vendor" value="Yes"> Yes
                    </th>
                  </tr>
                </thead>
                <tbody>
                    <tr>
                        <td class="col-md-3">
                            <select name="merchant" id="merchant" class="form-control">
                                <option value="Open Market" selected>Open Market</option>
                                @foreach($merchants as $merchant)
                                    <option value="{{ old($merchant->name) }}">{{ $merchant->name }}</option>
                                @endforeach
                            </select>
                        </td>
                        <td class="col-md-3">
                            <select name="vendor" id="vendor" class="form-control">
                                <option value="" selected>Select Vendor</option>
                                @foreach($vendors as $vendor)
                                    <option value="{{ old($vendor->name) }}">{{ $vendor->name }}</option>
                                @endforeach
                            </select>
                        </td>
                    </tr>
                </tbody>
            </table>
            <table class="table col-md-12">
            <tr>
                <td class="col-md-6">
                    <div class="form-group">
                        @if ($item->type == 'Pack')
                                <input type="number" name="qty" id="qty" class="form-control" required placeholder="Quantity" step="0.01">
                            
                            @elseif ($item->type == 'Loose') 
                                <input type="number" name="weight" id="weight" class="form-control" required placeholder="Weight e.g. 999.999" step="0.001">
                            @endif
                    </div>
                    <div class="form-group">
                        <input type="number" name="pur_value" id="pur_value" class="form-control" required placeholder="Purchase Amount per item" step="0.01">
                    </div>
                    <div class="form-group">
                        <input type="number" name="exp" id="exp" class="form-control" required placeholder="Purchase Expenditure" step="0.01">
                    </div>
                    <div class="form-group">
                        <input type="number" name="mrp" id="mrp" class="form-control" required placeholder="Market Price" step="0.01">
                    </div>
                    <div class="form-group">
                        <input type="number" name="sale_price" id="sale_price" class="form-control" required placeholder="ZK Price per item" step="0.01">
                    </div>
                </td>
                <td class="col-md-6">
                    <div class="form-group">
                        <input type="number" name="gst" id="gst" class="form-control" placeholder="GST Paid" readonly>
                    </div>
                    <div class="form-group">
                        <input type="number" name="gross_cost" id="" class="form-control" placeholder="GST Paid" readonly>
                    </div>
                    <div class="form-group">
                        <input type="number" name="gross_profit" id="gross_profit" class="form-control" placeholder="Gross Profit" readonly>
                    </div>
                    <div class="form-group">
                        <input type="number" name="discount" id="discount" class="form-control" placeholder="Special Discount" readonly>
                    </div>
                    <div class="form-group">
                        <input type="number" name="gst_on_sale" id="gst_on_sale" class="form-control" placeholder="Approx. GST Paid on Sale" readonly>
                    </div>
                    <div class="form-group">
                        <input type="number" name="net_profit" id="net_profit" class="form-control" placeholder="Net Profit" readonly>
                    </div>
                </td>
            </tr>
            </table>
                    <table class="table col-md-6">
                            <tbody>
                                <tr class="row-md-6">
                                    <td>
                                        <input type="number" name="wh" id="wh" class="form-control" readonly placeholder="Warehouse Tokens" step="0.01">
                                    </td>
                                    <td>
                                        <input type="number" name="wh_ref" id="wh_ref" class="form-control" readonly placeholder="Rf. Warehouse Tokens" step="0.01">
                                    </td>
                                    <td>
                                        <input type="number" name="swh" id="swh" class="form-control" readonly placeholder="Sub-Warehouse Tokens" step="0.01">
                                    </td>
                                    <td>
                                        <input type="number" name="swh_ref" id="swh_ref" class="form-control" readonly placeholder="Rf. Sub-Warehouse Tokens" step="0.01">
                                    </td>
                                </tr>
                                <tr class="row-md-6">
                                    <td class="col-md-3">
                                        <input type="number" name="store" id="store" class="form-control" readonly placeholder="Store Tokens" step="0.01">
                                    </td>
                                    <td class="col-md-3">
                                        <input type="number" name="store_ref" id="store_ref" class="form-control" readonly placeholder="Rf. Sub-Warehouse Tokens" step="0.01">
                                    </td>
                                    <td class="col-md-3">
                                        <input type="number" name="ref" id="ref" class="form-control" readonly placeholder="Referral Tokens" step="0.01">
                                    </td>
                                    <td class="col-md-3">
                                        <input type="number" name="customer" id="customer" class="form-control" readonly placeholder="Customer Tokens" step="0.01">
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <table class="form-group col-md-12">
                            <thead>
                                <th>
                                    <label for="profit_before_discount_tokens">Profit before Discount and Tokens:</label>
                                </th>
                                <th>
                                    <label for="profit_after_discount_tokens">Profit after Discount and Tokens:</label>
                                </th>
                                <th>
                                    <label for="profit_after_tokens">Profit after Tokens only:</label>
                                </th>
                                <th>
                                    <label for="cost">Cost before GST:</label>
                                </th>
                                <th>
                                    <label for="cash_discount">Cash Discount:</label>
                                </th>
                            </thead>
                            <tbody>
                                <tr class="row-md-6">
                                    <td class="col-md-3">
                                        <input type="number" name="profit_before_discount_tokens" id="profit_before_discount_tokens" class="form-control" readonly placeholder="0" step="0.01">
                                    </td>
                                    <td class="col-md-3">
                                        <input type="number" name="profit_after_discount_tokens" id="profit_after_discount_tokens" class="form-control" readonly placeholder="0" step="0.01">
                                    </td>
                                    <td class="col-md-3">
                                        <input type="number" name="profit_after_tokens" id="profit_after_tokens" class="form-control" readonly placeholder="0" step="0.01">
                                    </td>
                                    <td class="col-md-3">
                                        <input type="number" name="without_gst" id="without_gst" class="form-control" readonly placeholder="0" step="0.01">
                                    </td>
                                    <td class="col-md-3">
                                        <input type="number" name="cash_discount" id="cash_discount" class="form-control" readonly placeholder="0" step="0.01">
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        
            </table>
            
               
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
        </form>
        
    </div>
    <script>
         var itemGst = {{ $item->gst }};
</script>

<script>
    
    // Add event listener to the input field Purchase Value

    document.addEventListener('DOMContentLoaded', function () {
        var purValueInput = document.getElementById('pur_value');
        var gstInput = document.getElementById('gst');
        var qtyInput = document.getElementById('qty');
        var weightInput = document.getElementById('weight');
        var salePriceInput = document.getElementById('sale_price');
        var mrpInput = document.getElementById('mrp');
        var expInput = document.getElementById('expences');
        var discountInput = document.getElementById('discount');
        var subInput = document.getElementById('sub_warehouse_tokens');
        var subRefInput = document.getElementById('sub_warehouse_tokens_ref');
        var subehouseInput = document.getElementById('sub_warehouse');
        var subehouseRefInput = document.getElementById('sub_warehouse_ref');


    // Add event listeners to the input fields    
        purValueInput.addEventListener('input', updateCalculations);  
        function updateCalculations() {
            var purValue = parseFloat(purValueInput.value) || 0;
            var gst = purValue * (itemGst / 100);
            gstInput.value = gst.toFixed(2);
        }
        

        
        
        qtyInput.addEventListener('input', updateCalculations);
        weightInput.addEventListener('input', updateCalculations);
        salePriceInput.addEventListener('input', updateCalculations);
        mrpInput.addEventListener('input', updateCalculations);
        expInput.addEventListener('input', updateCalculations);
        discountInput.addEventListener('input', updateCalculations);
        subInput.addEventListener('input', updateCalculations);
        subRefInput.addEventListener('input', updateCalculations);

        function updateCalculations() {
            var purValue = parseFloat(purValueInput.value) || 0;
            var gst = parseFloat(gstInput.value) || 0;
            var qty = parseFloat(qtyInput.value) || 0;
            var weight = parseFloat(weightInput.value) || 0;
            var salePrice = parseFloat(salePriceInput.value) || 0;
            var mrp = parseFloat(mrpInput.value) || 0;
            var exp = parseFloat(expInput.value) || 0;
            var discount = parseFloat(discountInput.value) || 0;
            var sub = parseFloat(subInput.value) || 0;
            var subRef = parseFloat(subRefInput.value) || 0;

            var totpurqtyValue = purValue * qty;
            var totWeightValue = purValue * weight;
            var totqtygst = gst * qty;
            var totWeightgst = gst * weight;
            var totsalePrice = salePrice * qty;
            var totmrp = mrp * qty;
            var totexp = exp * qty;
            var totdiscount = discount * qty;
            var totsub = sub * qty;
            
            var costwithdiscount = purvalue+exp+discount;
            var costwithoutdiscount = purvalue+exp;
            var subtoken = costwithoutdiscount*(sub/100);
            var subreftoken = costwithoutdiscount*(subRef/100);
            var cashDiscount = mrp - salePrice;
            var profitBeforeDiscountTokens = purvalue+exp;
            var profitAfterDiscountTokens = salePrice-(purValue+exp+discount+subtoken+subreftoken);
            var profitAfterTokens = salePrice-(purValue+exp+subtoken+subreftoken);
            var cashDiscount = mrp - salePrice;

            // Update values in the readonly fields
            document.getElementById('totpurqtyValue').value = totpurqtyValue.toFixed(2);
            document.getElementById('totWeightValue').value = totWeightValue.toFixed(2);
            document.getElementById('totqtygst').value = totqtygst.toFixed(2);
            document.getElementById('totWeightgst').value = totWeightgst.toFixed(2);
            document.getElementById('totsalePrice').value = totsalePrice.toFixed(2);
            document.getElementById('totmrp').value = totmrp.toFixed(2);
            document.getElementById('totexp').value = totexp.toFixed(2);
            document.getElementById('totdiscount').value = totdiscount.toFixed(2);
            document.getElementById('totsub').value = totsub.toFixed(2);
            document.getElementById('costwithdiscount').value = costwithdiscount.toFixed(2);
            document.getElementById('costwithoutdiscount').value = costwithoutdiscount.toFixed(2);
            document.getElementById('subtoken').value = subtoken.toFixed(2);
            document.getElementById('subreftoken').value = subreftoken.toFixed(2);
            document.getElementById('cashDiscount').value = cashDiscount.toFixed(2);
            document.getElementById('profitBeforeDiscountTokens').value = profitBeforeDiscountTokens.toFixed(2);
            document.getElementById('profitAfterDiscountTokens').value = profitAfterDiscountTokens.toFixed(2);
            document.getElementById('profitAfterTokens').value = profitAfterTokens.toFixed(2);
        }
    });
    
    // Add event listener to the input field Vendor
    document.addEventListener("DOMContentLoaded", function() {
        var radioButtons = document.getElementsByName('vendor');
        var dropdown = document.getElementById('vendor');

        function toggleDropdown() {
            dropdown.hidden = (radioButtons[1].checked) ? false : true;
        }

        // Initial check on page load
        toggleDropdown();

        // Add event listener to each radio button
        for (var i = 0; i < radioButtons.length; i++) {
            radioButtons[i].addEventListener('change', toggleDropdown);
        }
    });

    

    </script>
    
    
@endsection