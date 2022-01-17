@php
use App\Models\Category;
$categories=Category::all();
@endphp
<!-- Footer Container -->
<footer class="footer-container">
<div class="row-dark">
    <div class="row container container-top">
        <div class="col-lg-6">
            <ul class="list-unstyled socials">
                <li class="facebook"><span class="social-element"><a href="https://www.facebook.com/" target="_blank"><i class="fa fa-facebook"></i></a></span></li>
                <li class="twitter"><span class="social-element"><a href="https://twitter.com/s" target="_blank"><i class="fa fa-twitter"></i></a></span></li>
                <li class="google_plus"><span class="social-element"><a href="https://plus.google.com/" target="_blank"><i class="fa fa-google-plus"></i></a></span></li>
                <li class="pinterest"><span class="social-element"><a href="https://www.pinterest.com/" target="_blank"><i class="fa fa-pinterest-p"></i></a></span></li>
                <li class="instagram"><span class="social-element"><a href="#" target="_blank"><i class="fa fa-instagram"></i></a></span></li>
                <li class="Youtube"><span class="social-element"><a href="#" target="_blank"><i class="fa fa-youtube-play"></i></a></span></li>
            </ul>
        </div>
        <div class="col-lg-6">
            <div class="module newsletter-footer1">
                <div class="newsletter">
                    <h3 class="modtitle">{{__('footer.save_email')}}</h3>
                    <div class="block_content">
                        <form method="post" id="signup" name="signup" class="form-group signup send-mail">
                            <div class="form-group">
                                <div class="input-group mb-3">
                                    <input type="email" placeholder="{{__('footer.email_field')}}" value="" class="form-control" id="txtemail" name="txtemail" size="55">
                                    <div class="input-group-append">
                                        <button class="btn btn-dark btn-default font-title" type="submit" onclick="return subscribe_newsletter();" name="submit">
                                            <span>{{__('footer.subscribe')}}</span>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="container">
    <div class="row footer-middle">
        <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12 col-style">
            <div class="box-footer box-infos">
                <div class="module">
                    <h3 class="modtitle">{{__('footer.contact_us')}}</h3>
                    <div class="modcontent">
                        <ul class="list-icon list-unstyled">
                            <li><span class="icon pe-7s-map-marker"></span>Adresse Autoparts</li>
                            <li><span class="icon pe-7s-call"></span> <a href="#">06xxxxxxxx</a></li>
                            <li><span class="icon pe-7s-mail"></span><a href="mailto:contact@autoparts.com">contact@autoparts.com</a></li>
                            <li><span class="icon pe-7s-alarm"></span>{{__('footer.contact_us_text')}}</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12 col-style">
            <div class="row">
                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 col-style">
                    <div class="box-information box-footer">
                        <div class="module clearfix">
                            <h3 class="modtitle">{{__('footer.information')}}</h3>
                            <div class="modcontent">
                                <ul class="menu list-unstyled ">
                                    <li><a href="/about">{{__('footer.about_us')}}</a></li>
                                    <li><a href="/contact">{{__('footer.contact_us')}}</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 col-style">
                    <div class="box-account box-footer">
                        <div class="module clearfix">
                            <h3 class="modtitle">{{__('footer.account')}}</h3>
                            <div class="modcontent">
                                <ul class="menu list-unstyled ">
                                    @guest
                                        <li><a href="/login">{{__('footer.login')}}</a></li>
                                        <li><a href="/register">{{__('footer.register')}}</a></li>
                                    @else
                                        <li><a href="/profile">{{__('footer.profile')}}</a></li>
                                    @endguest
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 col-clear">
                    <div class="box-service box-footer">
                      <div class="module clearfix">
                        <h3 class="modtitle">{{__('footer.categories')}}</h3>
                        <div class="modcontent">
                          <ul class="menu list-unstyled">
                            @foreach ($categories as $item)
                                <li>
                                    <h6 class="mt-2">{{$item->name}}</h6>
                                    <ul class="list-unstyled ml-3 border-left border-danger pl-2">
                                        @foreach ($item->subcategories as $sub)
                                            <li>
                                                <a href="/products/category/{{$sub->id}}">{{$sub->name}}</a>
                                            </li>
                                        @endforeach
                                    </ul>
                                </li>
                            @endforeach
                          </ul>
                        </div>
                      </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="footer-bottom">
    <div class="container">
        <div class="row">
            <div class="payment-w col-md-4 col-sm-12">
                <img src="{{ asset('images/payment_logo.png') }}" width="100px" alt="imgpayment">
            </div>
            <div class="copyright col-md-6 col-sm-12">
                <p>{{__('footer.copyright')}}</p>
            </div>
            <div class="languages col-md-2 col-sm-12">
                <div class="dropdown">
                    <a class="btn btn-danger dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        {{__('footer.languages')}}
                    </a>
                    <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                      <a class="dropdown-item" href="/lang/en">{{__('footer.languages_en')}}</a>
                      <a class="dropdown-item" href="/lang/fr">{{__('footer.languages_fr')}}</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</footer>
