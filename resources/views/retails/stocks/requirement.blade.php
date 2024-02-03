@extends('layouts.admin')

@section('content')
    <div class="container">
        {{-- Search Form --}}
        <form action="{{ route('retails.stocks.requirement') }}" method="GET" class="mb-3">
            <div class="input-group">
                <input type="text" class="form-control" placeholder="Search by name" name="search" id="search" value="{{ request('search') }}">
                <button type="submit" class="btn btn-outline-secondary">Search</button>
            </div>
        </form>

        <h2>Items</h2>

        {{-- Display Products --}}
        <table class="table">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Description</th>
                    <th>Type</th>
                    <th>Category</th>
                    <th>Subcategory</th>
                    <th>Variation</th>
                    <th>Image</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse($items as $item)
                    <tr class="item-row">
                        <td>{{ $item->name }}</td>
                        <td>{{ $item->description }}</td>
                        <td>{{ $item->type }}</td>
                        <td>{{ $item->category_id->name }}</td>
                        <td>{{ $item->subcategory_id->name }}</td>
                        <td>{{ $item->variation_id->color }} {{ $item->variation_id->size }} {{ $item->variation_id->weight }} {{ $item->variation_id->length }} {{ $item->variation_id->liquid_volume }}</td>
                        <td>
                            <img src="{{ asset($item->prod_pic) }}" alt="Product Image" style="width: 60px; height: 60px; object-fit: cover;">
                        </td>

                        <td>
                            <a href="{{ route('retails.stocks.create', $item->id) }}" class="btn btn-warning">Get Item</a>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="8">No items found</td>
                    </tr>
                @endforelse
            </tbody>
        </table>

        
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

        