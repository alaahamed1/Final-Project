@extends('dashboard.layouts.master')

@section('template_title')
    {{ __('Create') }} Sub Category
@endsection

@section('main-content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">

                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title">{{ __('Create') }} Sub Category</span>
                    </div>
                    <div class="card-body bg-white">
                        <form method="POST" action="{{ route('sub-categories.store') }}"  role="form" enctype="multipart/form-data">
                            @csrf

                            @include('dashboard.pages.sub-category.form')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
