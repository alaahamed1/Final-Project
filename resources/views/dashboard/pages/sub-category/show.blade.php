@extends('dashboard.layouts.master')
@section('title', 'Show Category')
@section('main-content')
    <div class="pagetitle">
        <h1>Show Sub-Category</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                <li class="breadcrumb-item"><a href="{{ route('sub-categories.index') }}">Categories</a></li>
                <li class="breadcrumb-item active">Show</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Category Details</h5>
                        <div class="row mb-3">
                            <div class="col-lg-3 col-md-4 label">ID</div>
                            <div class="col-lg-9 col-md-8">{{ $subCategory->id }}</div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-lg-3 col-md-4 label">Name</div>
                            <div class="col-lg-9 col-md-8">{{ $subCategory->title }}</div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-lg-3 col-md-4 label">Description</div>
                            <div class="col-lg-9 col-md-8">{{ $subCategory->description }}</div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-lg-3 col-md-4 label">Created At</div>
                            <div class="col-lg-9 col-md-8">{{ $subCategory->created_at->format('F d, Y H:i:s') }}</div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-lg-3 col-md-4 label">Updated At</div>
                            <div class="col-lg-9 col-md-8">{{ $subCategory->updated_at->format('F d, Y H:i:s') }}</div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-lg-3 col-md-4 label">Created By</div>
                            <div class="col-lg-9 col-md-8">{{ $subCategory->createUser->name ?? 'N/A' }}</div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-lg-3 col-md-4 label">Last Updated By</div>
                            <div class="col-lg-9 col-md-8">{{ $subCategory->updateUser->name ?? 'N/A' }}</div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-lg-12">
                                <a href="{{ route('sub-categories.edit', $subCategory->id) }}" class="btn btn-primary">Edit</a>
                                <a href="{{ route('sub-categories.index') }}" class="btn btn-secondary">Back to List</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection