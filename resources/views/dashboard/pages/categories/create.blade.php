@extends('dashboard.layouts.master')
@section('title', 'create category')
@inject('category', '\App\Models\Category')
@section('main-content')
@startSection
<div class="container">
    <form method="POST" action="{{ Route('categories.store') }}">
        @csrf
        @include('dashboard.pages.categories.form')
        <button type="submit" class="btn btn-success">Submit</button>
        <button type="reset" class="btn btn-primary">Reset</button>
    </form>
    </form>
</div>
@endsection
