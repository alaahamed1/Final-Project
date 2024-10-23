@extends('dashboard.layouts.master')

@section('title')
    {{ 'Contact: ' .  $contactData->first_name ?? __('Show') . " " . __('Contact Data') }}
@endsection

@section('main-content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header" style="display: flex; justify-content: space-between; align-items: center;">
                        <div class="float-left">
                            <span class="card-title">{{ __('Show') }} Contact Data</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary btn-sm" href="{{ route('contact-data.index') }}"> {{ __('Back') }}</a>
                        </div>
                    </div>

                    <div class="card-body bg-white">
                        <div class="row">
                            <div class="col-md-3 mb-2">
                                <strong>First Name:</strong>
                                {{ $contactData->first_name }}
                            </div>
                            <div class="col-md-3 mb-2">
                                <strong>Last Name:</strong>
                                {{ $contactData->last_name }}
                            </div>
                            <div class="col-md-3 mb-2">
                                <strong>Email:</strong>
                                {{ $contactData->email }}
                            </div>
                            <div class="col-md-3 mb-2">
                                <strong>Is Replied:</strong>
                                {{ 'Yes' == $contactData->is_replied ? 'Yes' : 'No' }}
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12 mb-2">
                                <strong>Subject:</strong>
                                {{ $contactData->subject }}
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12 mb-2">
                                <strong>Message:</strong>
                                <div class="form-group">
                                    <textarea class="form-control" name="message" id="message" rows="3" readonly>{{ $contactData->message }}</textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
