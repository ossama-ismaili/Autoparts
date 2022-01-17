@php
    use App\Models\Category;
    $categories=Category::all();
@endphp

<header class="header-container">
    <nav class="navbar navbar-expand-lg navbar-dark fixed-top">
        <a class="navbar-brand" href="/"><img src="{{asset('images/icon.png')}}" width="25px" alt="iconimg"> <strong><em>AUTOPARTS</em></strong></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item ml-2">
                    <div class="link-effect">
                        <a class="nav-link" href="/about">{{ __('header.about_us') }}</a>
                    </div>
                </li>
                <li class="nav-item ml-2">
                    <div class="link-effect">
                        <a class="nav-link" href="/contact">{{ __('header.contact_us') }}</a>
                    </div>
                </li>
                @guest
                    <li class="nav-item ml-2">
                        <a class="nav-link" href="{{ route('login') }}"><span class="fa fa-lock text-danger mr-2"></span>{{ __('header.login') }}</a>
                    </li>
                @else
                <li class="nav-item ml-4">
                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                        <img class="rounded" src="{{env('APP_URL')}}/storage/{{Auth::user()->avatar}}" width="25px" />
                        {{ Auth::user()->name }}
                    </a>

                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                        <div class="dropdown-item">
                            <a class="btn btn-info btn-block" href="/profile">
                                <span class="fa fa-user"></span>
                                {{__('header.profile')}}
                            </a>
                        </div>
                        <div class="dropdown-item">
                            <a class="btn btn-danger btn-block" href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                                <span class="fa fa-sign-out"></span>
                                {{__('header.logout')}}
                            </a>
                        </div>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </div>
                </li>
                @endguest
            </ul>
        </div>
    </nav>
    <div class="jumbotron mt-5">
        <div class="row">
            <div class="col-lg-4 col-md-6 col-sm-12">
                <ul class="list-unstyled">
                    <h4 class="border-bottom border-danger text-white text-center">{{__('header.categories')}}</h4>
                    @foreach ($categories as $item)
                        <li class="row">
                            <div class="btn-group col-12 dropright mt-2">
                                <button type="button" class="btn btn-outline-danger dropdown-toggle text-white" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    {{$item->name}}
                                </button>
                                <div class="dropdown-menu">
                                    @foreach ($item->subcategories as $sub)
                                        <a class="dropdown-item" href="/products/category/{{$sub->id}}">{{$sub->name}}</a>
                                    @endforeach
                                </div>
                            </div>
                        </li>
                    @endforeach
                </ul>
            </div>
            <div class="col-lg-8 col-md-6 col-sm-12 mt-2">
                <div class="input-group col-10 mx-auto">
                    <input type="text" class="form-control" placeholder="Search" aria-label="search" aria-describedby="search input" id="searchInput" onkeypress="if(event.key === 'Enter')document.getElementById('searchBtn').click();" required>
                    <div class="input-group-append">
                      <button class="btn btn-outline-danger" type="button" onclick="if(document.getElementById('searchInput').value.length>0) window.location.replace('/products/search/'+document.getElementById('searchInput').value);" id="searchBtn" ><i class="fa fa-search"></i></button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>
