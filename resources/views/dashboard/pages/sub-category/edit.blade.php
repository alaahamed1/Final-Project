@extends('dashboard.layouts.master')

@section('title')
    {{ __('Edit') }} Sub Category
@endsection

@section('main-content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">

                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title">{{ __('Edit') }} Sub Category</span>
                    </div>
                    <div class="card-body bg-white">
                        <form method="POST" action="{{ route('sub-categories.update', $subCategory->id) }}"  role="form" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')

                            @include('dashboard.pages.sub-category.form')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
