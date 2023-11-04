<!DOCTYPE html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Appic Mobile Machine Test | Project </title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container-fluid">
        <div class="p-2 text-center">
            <h3>Category-Wise Products </h3>
        </div>
        <div class="table-responsive" id="pagination-demo">
            <table class="table table-bordered text-center">
                <thead>
                    <tr>
                        <td colspan="3">
                            <form action="{{ url('products/searching/') }}" method="get" class="d-flex"
                                role="search">
                                <input class="form-control me-2" name="q" type="search" placeholder="Search"
                                    aria-label="Search">
                                <button class="btn btn-outline-success" type="submit">Search</button>
                            </form>
                        </td>
                        <td colspan="4">
                            <a href="/" class="btn btn-outline-secondary">Show All</a>
                        </td>
                        <td>
                            <form action="{{ url('products/category') }}" method="get" class="d-flex" role="search">
                                <select class="form-select" name="category" aria-label="Default select example">
                                    <option selected>Select Category</option>
                                    @foreach ($categorylist as $key => $category)
                                        <option value="{{ $category }}"
                                            {{ $category == $selectcategory ? 'selected' : '' }}>
                                            {{ $category }}</option>
                                    @endforeach
                                </select>
                                <button class="btn btn-outline-success" type="submit">Find</button>
                            </form>
                    </tr>
                    <tr>
                        <th>#</th>
                        <th width="20">Images</th>
                        <th>Title</th>
                        <th>Price</th>
                        <th>Discount Percentage</th>
                        <th>Category</th>
                        <th>Stock</th>
                        <th>Duration</th>
                    </tr>
                </thead>
                <tbody>
                    @if (count($productslist) < 1)
                        <tr>
                            <td colspan="8">
                                <span class="text-danger fw-bold">No data found</span>
                            </td>
                        </tr>
                    @else
                        @foreach ($productslist as $key => $product)
                            <tr class="" id="{{ $product->id }}">
                                <td>{{ $key + 1 }}</td>
                                <td>
                                    @if (isset($product->images[2]))
                                        <img class="img-fluid" src="{{ $product->images[2] }}" alt="Product Image 3">
                                    @else
                                        <img class="img-fluid" src="{{ $product->thumbnail }}" alt="Product thumbnail">
                                    @endif
                                </td>
                                <td>{{ $product->title }}</td>
                                <td>{{ $product->price }}</td>
                                <td>{{ $product->discountPercentage }}</td>
                                <td>{{ $product->category }}</td>
                                <td>{{ $product->stock }}</td>
                                <td>{{ $product->description }}</td>
                            </tr>
                        @endforeach
                    @endif
                </tbody>
            </table>
        </div>
        <div class="d-flex justify-content-center">
            <div id="pagination-container">
                <ul class="pagination">
                    <li class="page-item" id="prev-page"><a class="page-link" href="#">Previous</a></li>
                    <!-- Pagination buttons will be dynamically generated here -->
                    <li class="page-item" id="next-page"><a class="page-link" href="#">Next</a></li>
                </ul>
            </div>
        </div>
    </div>
</body>

</html>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
<script src="http://code.jquery.com/jquery-1.10.1.min.js"></script>
<script src="{{ asset('assets/js/table-pagination.js') }}"></script>
