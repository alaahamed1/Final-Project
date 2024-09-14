@extends('dashboard.layouts.master')
@section('title', 'index category')
@inject('category', '\App\Models\Category')
@section('main-content')
    <div class="pagetitle">
        <div class="d-flex justify-content-between">
            <h1>Data Tables</h1>
            <button class="border border-2 rounded-start  border-warning"><a href="{{ route('categories.create') }}">Create Category</a></button>
        </div>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                <li class="breadcrumb-item">Tables</li>
                <li class="breadcrumb-item active">Data</li>
            </ol>
        </nav>

    </div><!-- End Page Title -->

    <section class="section">
        <div class="row">
            <div class="col-lg-12">

                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Datatables</h5>
                        <!-- Table with stripped rows -->
                        <table class="table datatable">
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Title</th>
                                    <th>Description</th>
                                    <th>Created By</th>
                                    <th>Updated By</th>
                                    <th>Created at</th>
                                    <th>Updated at</th>
                                </tr>
                            </thead>
                            <tbody>

                                <tr>
                                    <td>Zelenia</td>
                                    <td>7516</td>
                                    <td>Redwater</td>
                                    <td>2012/03/03</td>
                                    <td>31%</td>
                                    <td>31%</td>
                                    <td>31%</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
