@extends('dashboard.layouts.master')
@section('title', 'Show Product')
@section('main-content')
    <div class="pagetitle">
        <h1>Show Product</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                <li class="breadcrumb-item"><a href="{{ route('products.index') }}">Products</a></li>
                <li class="breadcrumb-item active">Show</li>
            </ol>
        </nav>
    </div>

    <section class="section">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Product Details</h5>
                        <div class="row">
                            <div class="col-md-6">
                                <p><strong>Name:</strong> {{ $product->name }}</p>
                                <p><strong>Description:</strong> {{ $product->description }}</p>
                                <p><strong>Price:</strong> ${{ number_format($product->price, 2) }}</p>
                                <p><strong>Category:</strong> {{ $product->category->title }}</p>
                                <p><strong>Created By:</strong> {{ $product->createUser->name }}</p>
                                <p><strong>Updated By:</strong> {{ $product->updateUser->name ?? 'N/A' }}</p>
                                <p><strong>Created At:</strong> {{ $product->created_at->format('F d, Y H:i:s') }}</p>
                                <p><strong>Updated At:</strong> {{ $product->updated_at->format('F d, Y H:i:s') }}</p>
                            </div>
                            <div class="col-md-6">
                                @if($product->image)
                                    <img src="{{ asset('storage/'.$product->image) }}" alt="{{ $product->name }}" class="img-fluid">
                                @else
                                    <p>No image available</p>
                                @endif
                            </div>
                        </div>
                        <div class="text-center mt-3">
                            <a href="{{ route('products.edit', $product->id) }}" class="btn btn-primary">Edit</a>
                            <a href="{{ route('products.index') }}" class="btn btn-secondary">Back to List</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection