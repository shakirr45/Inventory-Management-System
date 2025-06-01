@extends('admin.layouts.app')

@section('content')
<div class="container-fluid mt-3">
    <!-- Page Header -->
    <div class="page-header d-flex justify-content-between align-items-center">
        <div>
            <h1 class="page-title">{{ $pageTitle ?? 'Create New Product' }}</h1>
        </div>
        <div class="ms-auto pageheader-btn">
            <ol class="breadcrumb mb-0">
                <li class="breadcrumb-item">
                    <a href="{{ route('products.index') }}">Products</a>
                </li>
                <li class="breadcrumb-item active" aria-current="page">
                    Create
                </li>
            </ol>
        </div>
    </div>

    <!-- Main Content -->
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <a href="{{ route('products.index') }}" class="btn btn-sm btn-success">
                        &lt;&lt; Back to List
                    </a>
                </div>
                <div class="card-body">
                    <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <!-- Row: Image on left, Product Name and Category side by side on the same line -->
                        <div class="row mb-4">
                            <!-- Left column: Product Image -->
                            <div class="col-md-4">
                                <label class="form-label">Product Image</label>
                                <input
                                    type="file"
                                    name="image"
                                    class="dropify"
                                    data-height="200" />
                            </div>
                            <!-- Right column: fields -->
                            <div class="col-md-8">
                                <div class="row mb-3">
                                    <div class="col-md-12">
                                        <label class="form-label">Product Name</label>
                                        <input
                                            type="text"
                                            name="name"
                                            class="form-control"
                                            placeholder="Enter product name"
                                            required>
                                    </div>

                                </div>
                                <div class="row mb-3">
                                    <div class="col-md-12">
                                    <label for="category_id">Category</label>
                                    <select class="form-select form-select" name="category_id" id="category_id" required>
                                        <option value="">Select Category</option>
                                        @foreach($categories as $item)
                                        <option value="{{ $item->id }}">{{ $item->name }}</option>
                                        @endforeach
                                    </select>
                                    </div>
                                </div>

                              <div class="row mb-3">
                                    <div class="col-md-6">
                                    <label for="sub_category_id">Subcategory</label>
                                    <select class="form-select form-select" name="sub_category_id" id="sub_category_id" required>
                                        <option value="">Select Subcategory</option>
                                        @foreach($subcategories as $item)
                                        <option value="{{ $item->id }}">{{ $item->name }}</option>
                                        @endforeach
                                    </select>
                                    </div>
                                    <div class="col-md-6">
                                    <label for="brand_id">Brand</label>
                                    <select class="form-select form-select" name="brand_id" id="brand_id" required>
                                        <option value="">Select Brand</option>
                                        @foreach($brands as $item)
                                        <option value="{{ $item->id }}">{{ $item->name }}</option>
                                        @endforeach
                                    </select>
                                    </div>
                                </div>

                                <!-- Price, Unit, Barcode -->
                                <div class="row mb-3">
                                    <div class="col-md-6">
                                        <div class="row">
                                            <div class="col-md-6">
                                            <label for="unit_id">Unit</label>
                                            <select class="form-select form-select" name="unit_id" id="unit_id" required>
                                                <option value="">Select Unit</option>
                                                @foreach($units as $item)
                                                <option value="{{ $item->id }}">{{ $item->name }}</option>
                                                @endforeach
                                            </select>
                                            </div>
                                            <div class="col-md-6">
                                                <label class="form-label">Barcode</label>
                                                <input
                                                    type="text"
                                                    name="barcode"
                                                    class="form-control"
                                                    placeholder="Enter barcode">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <label class="form-label">Price</label>
                                        <input
                                            type="number"
                                            step="0.01"
                                            name="price"
                                            class="form-control"
                                            placeholder="Enter price">
                                    </div>
                                </div>

                                <!-- Description textarea moved here -->
                                <div class="mb-3">
                                    <label class="form-label">Description</label>
                                    <textarea
                                        class="form-control"
                                        name="description"
                                        rows="4"
                                        placeholder="Write product details..."></textarea>
                                </div>
                                <!-- Submit button -->
                                <div class="text-end">
                                    <button type="submit"
                                        class="btn btn-primary waves-effect waves-light">
                                        {{ isset($product) ? 'Update Product' : 'Add New Product' }}
                                    </button>
                                </div>
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection