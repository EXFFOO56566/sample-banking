
@extends('layout')

@section('title')
    @lang('Contact')
@endsection

@section('content')

    @include('frontend.breadcrumb')

    <section class="contact-area section-padding">
        <div class="container">
            <div class="row mb-60">
                @foreach($contacts as $contact)
                <div class="col-lg-4 col-md-6 col-sm-12 col-xs-12">
                    <div class="single-contact-block">
                        <span><i class="{{$contact->icon}}"></i></span>
                        <h4 class="margin-bottom-10">{{__($contact->title)}}</h4>
                        <p>{{__($contact->name)}}</p>
                    </div>
                </div>
@endforeach

            </div>

            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="contact-form">
                        <form action="{{route('ContactSubmit')}}" method="post" id="contact_form_submit">
                            @csrf
                            <div class="row">
                                <div class="col-lg-6 col-md-12 col-sm-12 col-xs-12">
                                    <input type="text" name="name" placeholder="@lang('Name')">
                                </div>
                                <div class="col-lg-6 col-md-12 col-sm-12 col-xs-12">
                                    <input type="text" name="subject" placeholder="@lang('Subject')">
                                </div>
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <input type="email" name="email" placeholder="@lang('Email')">
                                </div>
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <textarea name="message" rows="4" placeholder="@lang('Write Messages')"></textarea>
                                </div>
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <button type="submit" class="bttn btn-fill">@lang('Submit Message')</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
