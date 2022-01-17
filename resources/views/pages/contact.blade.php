@extends('layouts.app')

@section('content')
<section class="contact-info-area">
    <div class="container-fluid">
        <div class="row">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                <div class="contact-form">
                    <div class="row">
                        <div class="col-xl-12">
                            <div class="sec-title-style1 float-left">
                                <div class="text"><div class="decor-left"><span></span></div><p>{{__('contact.title')}}</p></div>
                                <div class="text-box float-right">
                                    <p>{{__('contact.subtitle')}}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="inner-box">
                        <form id="contact-form" name="contact_form" class="default-form" action="/contact/send" method="post">
                            {{ csrf_field() }}
                            <div class="row">
                                <div class="col-xl-7 col-lg-12">
                                    <div class="row">
                                        <div class="col-xl-6">
                                            <div class="input-box">
                                                <input type="text" name="form_name" placeholder="{{__('contact.name_field')}}" required>
                                            </div>
                                        </div>
                                        <div class="col-xl-6">
                                            <div class="input-box">
                                                <input type="email" name="form_email" placeholder="{{__('contact.email_field')}}" required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-xl-12">
                                            <div class="input-box">
                                                <input type="text" name="form_subject" placeholder="{{__('contact.subject_field')}}">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-7 col-lg-12">
                                    <div class="input-box">
                                        <textarea name="form_message" placeholder="{{__('contact.message_field')}}" required></textarea>
                                    </div>
                                    <div class="button-box">
                                        <button type="submit"><span class="fa fa-paper-plane"></span></button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
