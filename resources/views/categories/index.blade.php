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
                    <span><strong>Category List</strong></span>
                    <div class="text-center py-4 ">
                        <a class="btn btn-primary" data-bs-target="#modalInput" data-bs-toggle="modal" href="javascript:void(0)">+ Add Product Category</a>
                    </div><!-- pd-y-30 -->
                </div>

                <div class="card-body">
                    <div class="table-responsive">
                        <table id="editable-file-datatable" class="table table-bordered table-striped text-nowrap w-100">
                            <thead>
                                <tr>
                                    <th>SL</th>
                                    <th>Name</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                            @foreach ($categories as $item)
                                    <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $item->name }}</td>
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
<!-- INPUT MODAL -->
<div class="modal fade" id="modalInput">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header justify-content-center">
                <h6 class="modal-title text-center w-100">Add New Category</h6>
            </div>
            <form action="{{ route('category.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
            <!-- Modal Body -->
            <div class="modal-body">
                <div class="form-group">
                    <label class="form-label text-muted small">Category Name</label>
                    <div class="input-group">
                        <input type="text" class="form-control form-control-sm" name="name" placeholder="Enter Category">
                    </div>
                </div>
            </div>

            <!-- Modal Footer -->
            <div class="modal-footer">
                <button class="btn btn-primary btn-sm">Create</button>
                <button class="btn btn-light btn-sm" data-bs-dismiss="modal">Close</button>
            </div>
            </form>

        </div>
    </div>
</div>

@endsection
