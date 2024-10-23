@extends('website.layouts.master')
@section('title', 'Contact')
@section('main-content')

    <div class="bg-light py-3">
        <div class="container">
            <div class="row">
                <div class="col-md-12 mb-0"><a href="{{ Route('home') }}">Home</a> <span class="mx-2 mb-0">/</span>
                    <strong class="text-black">Profile</strong></div>
            </div>
        </div>
    </div>

    <div class="site-section">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h2 class="h3 mb-3 text-black">{{ $user->name }}'s Profile</h2>
                </div>
                <div class="col-md-7">
                    <form action="{{ route('profile') }}" method="POST" class="p-5 bg-white">
                        @csrf
                        <div class="row form-group">
                            <div class="col-md-12">
                                <label class="text-black mt-4" for="name">Name</label>
                                <input type="text" id="name" name="name" class="form-control" value="{{ $user->name }}">
                                <div class="text-danger">{{ $errors->first('name') }}</div>

                                <label class="text-black mt-4" for="email">Email</label>
                                <input type="email" id="email" name="email" class="form-control"
                                       value="{{ $user->email }}">
                                <div class="text-danger">{{ $errors->first('email') }}</div>

                                <label class="text-black mt-4" for="password">Password</label>
                                <input type="password" id="password" name="password" class="form-control">
                                <div class="text-danger">{{ $errors->first('password') }}</div>

                                <label class="text-black mt-4" for="password_confirmation">Confirm Password</label>
                                <input type="password" id="password_confirmation" name="password_confirmation"
                                       class="form-control">
                                <div class="text-danger">{{ $errors->first('password_confirmation') }}</div>

                                <div class="row form-group mt-4">
                                    <div class="col-md-12">
                                        <input type="submit" value="Update Profile"
                                               class="btn btn-primary py-2 px-4 text-white">
                                    </div>
                                </div>

                            </div>
                        </div>
                    </form>

                </div>
            </div>
        </div>
@endsection
