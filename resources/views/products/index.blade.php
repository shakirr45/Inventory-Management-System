@extends('admin.layouts.app')

@section('content')
<div class="container-fluid mt-3">
    <div class="row">
        <div class="col-12">
            <!-- Page Title & Breadcrumb -->
            <div class="d-flex justify-content-between align-items-center mb-3">
                <h1 class="page-title mb-0">{{ $pageTitle }}</h1>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0">
                        <li class="breadcrumb-item"><a href="javascript:void(0);">Dashboard</a></li>
                        <li class="breadcrumb-item active" aria-current="page">All Products</li>
                    </ol>
                </nav>
            </div>

            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <span><strong>Product List</strong></span>
                    @can('product-create')
                    <a href="{{ route('product.create') }}" class="btn btn-primary">+ Create New Product</a>
                    @endcan
                </div>

                <div class="card-body">
                    <div class="table-responsive">
                        <table id="editable-file-datatable" class="table table-bordered table-striped text-nowrap w-100">
                            <thead>
                                <tr>
                                    <th>SL</th>
                                    <th>Name</th>
                                    <th>Brand</th>
                                    <th>Category</th>
                                    <th>Subcategory</th>
                                    <th>Barcode</th>
                                    <th>Price</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($products as $key => $item)
                                <tr>
                                    <td>{{ $key + 1 }}</td>
                                    <td>{{ $item->name }}</td>
                                    <td>{{ $item->brand->name }}</td>
                                    <td>{{ $item->category->name }}</td>
                                    <td>{{ $item->subcategory->name }}</td>
                                    <td class="text-center">
                                        @if ($item->barcode)
                                            <img src="{{ url('product/barcode/' . $item->barcode) }}" alt="Barcode"
                                                width="170">
                                        @else
                                        ----
                                        @endif
                                    </td>
                                    <td>{{ $item->price }}</td>
                                    <td>
                                        <span class=" badge bg-{{ $item->status ? 'success' : 'danger' }}">
                                            {{ $item->status == 1 ? 'Active' : 'Inactive' }}
                                        </span>
                                    </td>

                                    <td>
                                        <a class="btn btn-primary btn-sm text-white" title="Edit">
                                            <i class="fe fe-edit"></i>
                                        </a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection