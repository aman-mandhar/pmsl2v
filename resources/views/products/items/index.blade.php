@extends('layouts.admin')

@section('content')
    <div class="container">
        {{-- Search Form --}}
        <form action="{{ route('products.search') }}" method="GET" class="mb-3">
            <div class="input-group">
                <input type="text" class="form-control" placeholder="Search by name" name="search" id="search" value="{{ request('search') }}">
                <button type="submit" class="btn btn-outline-secondary">Search</button>
            </div>
        </form>

        <h2>Item List</h2>

        {{-- Display Products --}}
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Item</th>
                    <th>Category</th>
                    <th>Sub-Category</th>
                    <th>Variations</th>
                    <th>Add Qty.</th>
                    <th>Item Price</th>
                    <th>Other Expences</th>
                    <th>MRP</th>
                    <th>ZK Sale Price</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse($items as $item)
                    <tr class="item-row">
                        <td>{{ $item->name }}</td>
                        <td>{{ $item->category->name }}</td>
                        <td>{{ $item->subCategory->name }}</td>
                        <td>
                                    <span class="badge bg-secondary">{{ $item->variation->color }}</span><br>
                                    <span class="badge bg-secondary">{{ $item->variation->size }}</span><br>
                                    <span class="badge bg-secondary">{{ $item->variation->weight }}</span><br>
                                    <span class="badge bg-secondary">{{ $item->variation->length }}</span><br>
                                    <span class="badge bg-secondary">{{ $item->variation->liqued_volume }}</span>
                                
                        </td>
                        <form action="{{ route('stocks.add', $item->id) }}" method="get">
                        <td>
                            <div class="form-group">
                                @if ($item->type == 'Pack')
                                    <input type="number" name="qty" id="qty" class="form-control" required placeholder="Quantity" step="0.01">
                                @elseif ($item->type == 'Loose') 
                                    <input type="number" name="weight" id="weight" class="form-control" required placeholder="Weight" step="0.001">
                                    @endif
                            </div>
                        </td>

                        <td>
                            <div class="form-group">
                                <input type="number" name="pur_value" id="pur_value" class="form-control" required placeholder="Amount" step="0.01">
                            </div>    
                        </td>

                        <td>
                            <div class="form-group">
                                <input type="number" name="expences" id="expences" class="form-control" required placeholder="Extra Exp." step="0.01">
                            </div>
                        </td>
                        <td>
                            <div class="form-group">
                                <input type="number" name="mrp" id="mrp" class="form-control" required placeholder="MRP" step="0.01">
                            </div>
                        </td>
                        <td>
                            <div class="form-group">
                                <input type="number" name="sale_price" id="sale_price" class="form-control" required placeholder="ZK Price" step="0.01">
                            </div>
                        </td>
                        <td>
                            <button type="submit" class="btn btn-success">Add Stock</button>
                        </td>
                        </form>
                        <td>
                            <a href="{{ route('products.items.edit', $item->id) }}" class="btn btn-warning">Edit</a>
                            <form action="{{ route('products.items.destroy', $item->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="8">No items found</td>
                    </tr>
                @endforelse
            </tbody>
        </table>

        {{-- Add Item Button --}}
        <a href="{{ route('products.items.create') }}" class="btn btn-success">Add Item</a>
    </div>



    <script>
        document.getElementById('search').addEventListener('input', function () {
            var searchValue = this.value.trim().toLowerCase();
    
            // Loop through each row in the table body
            document.querySelectorAll('.item-row').forEach(function (row) {
                var itemName = row.querySelector('td:first-child').textContent.trim().toLowerCase();
                row.style.display = itemName.includes(searchValue) ? 'table-row' : 'none';
            });
        });
    </script>
    
@endsection
