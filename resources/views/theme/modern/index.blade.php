@extends('layout.main')

@section('page-css')
    <link rel="stylesheet" href="{{ asset('assets/plugins/owl.carousel/assets/owl.carousel.css') }}">
@endsection

@section('main')
    <div class="main-container">
        <div class="contents">
                <div class="main-top">
                    <div class="container">
                        <div class="row">
                            <div class="top-content">
                                <div class="top-items">
                                    <p>
                                        Хурдан хугацаанд хүссэн байраа<br />
                                        хайгаад төлбөрийн боломжит нөхцөлийг сонгоод
                                    </p>
                                    <h3>
                                        <b class="blue-color">мөрөөдлөө</b> биелүүлээрэй
                                    </h3>
                                    <div class="top-search blue-background">
                                        <form action='/listing' method='get'>
                                            <div class="row">
                                                <div class="col s12">
                                                    <div class="row">
                                                        <div class="input-field col s12">
                                                            <i class="material-icons prefix">zoom_in</i>
                                                            <input type="text" name="q" id="autocomplete-input" class="autocomplete">
                                                            <label for="autocomplete-input"> Дүүрэг, Хороо болон хотхоны нэрийг
                                                                оруулна уу
                                                            </label>
                                                        </div>
                                                        <button class="btn waves-effect waves-light blue lighten-5"
                                                            type="submit">
                                                                Хайх
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <div class="hidden-video">
                                <video autoplay muted>
                                    <source src="{{ asset('assets/video/1.mp4') }}" type="video/mp4">
                                    <source src="{{ asset('assets/video/1.mp4') }}" type="video/ogg">
                                    Your browser does not support HTML5 video.
                                </video>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="grid-two">
                    <div class="container">
                        <div class="row">
                            <div class="grid-container">
                                @if(count($urgent_ads) > 0)
                                    <a href="{{ route('single_ad', $urgent_ads[0]->slug) }}">
                                        <div class="grid-item" style="background-image: url('{{ media_url($urgent_ads[0]->feature_img) }}');">
                                            <span class="tag">Шинэ</span>
                                            <h3>{{ $urgent_ads[0]->title }}</h3>
                                            <p>{{ themeqx_price_ng($urgent_ads[0]) }}</p>
                                            <span>{{ $urgent_ads[0]->square_unit_space.' '.$urgent_ads[0]->unit_type }}</span>                                                  
                                        </div>
                                    </a>
                                @endif
                                @if(count($urgent_ads) > 1)
                                    <a href="{{ route('single_ad', $urgent_ads[1]->slug) }}">
                                        <div class="grid-item" style="background-image: url('{{ media_url($urgent_ads[1]->feature_img) }}');">
                                            <span class="tag">Шинэ</span>
                                            <h3>{{ $urgent_ads[1]->title }}</h3>
                                            <p>{{ themeqx_price_ng($urgent_ads[1]) }}</p>
                                            <span>{{ $urgent_ads[1]->square_unit_space.' '.$urgent_ads[1]->unit_type }}</span>                                                  
                                        </div>
                                    </a>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
                <div class="grid-five">
                    <div class="container">
                        <div class="row">
                            <div class="grid-container">
                                @foreach($premium_ads as $ad)
                                    <div class="grid-item">
                                        <a href="{{ route('single_ad', $ad->slug) }}">
                                            <div class="img-container">
                                                <img src="{{ media_url($ad->feature_img) }}" alt="{{ $ad->title }}" width="100%">
                                                <div class="heart">
                                                    <i class="material-icons">
                                                        favorite_border
                                                    </i>
                                                </div>
                                                <div class="beds">
                                                    <i class="material-icons">
                                                        hotel
                                                    </i>
                                                    {{ $ad->beds }}
                                                </div>
                                                <div class="plans">
                                                    <i class="material-icons">
                                                        domain
                                                    </i> {{ $ad->floor }}
                                                </div>
                                            </div>
                                            <h3>{{ $ad->title }}</h3>
                                            <p>{{ themeqx_price_ng($ad) }}</p>
                                            <span>{{ $ad->square_unit_space.' '.$ad->unit_type }}</span>
                                        </a>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
                <div class="grid-two">
                    <div class="container">
                        <div class="row">
                            <div class="grid-container">
                                @if(count($urgent_ads) > 2)
                                    <a href="{{ route('single_ad', $urgent_ads[2]->slug) }}">
                                        <div class="grid-item" style="background-image: url('{{ media_url($urgent_ads[2]->feature_img) }}');">
                                            <span class="tag">Шинэ</span>
                                            <h2>{{ $urgent_ads[2]->title }}</h2>
                                            <p>{{ themeqx_price_ng($urgent_ads[2]) }}</p>
                                            <span>{{ $urgent_ads[2]->square_unit_space.' '.$urgent_ads[2]->unit_type }}</span>                                                  
                                        </div>
                                    </a>
                                @endif
                                @if(count($urgent_ads) > 3)
                                    <a href="{{ route('single_ad', $urgent_ads[3]->slug) }}">
                                        <div class="grid-item" style="background-image: url('{{ media_url($urgent_ads[3]->feature_img) }}');">
                                            <span class="tag">Шинэ</span>
                                            <h3>{{ $urgent_ads[3]->title }}</h3>
                                            <p>{{ themeqx_price_ng($urgent_ads[3]) }}</p>
                                            <span>{{ $urgent_ads[3]->square_unit_space.' '.$urgent_ads[3]->unit_type }}</span>                                                  
                                        </div>
                                    </a>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
                <div class="grid-five">
                    <div class="container">
                        <div class="row">
                            <div class="grid-container">
                                @foreach($regular_ads as $ad)
                                    @if($loop->iteration % 3 == 0 && count($youtube_ads) >= (($loop->iteration / 3) - 1) && isset($youtube_ads[($loop->iteration / 3) - 1]))
                                        <iframe width="100%" height="160" src="{{ $youtube_ads[($loop->iteration / 3) - 1] }}" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                                    @endif
                                    <div class="grid-item">
                                        <a href="{{ route('single_ad', $ad->slug) }}">
                                            <div class="img-container">
                                                <img src="{{ media_url($ad->feature_img) }}" width="100%" alt="{{ $ad->title }}">
                                                <div class="heart">
                                                    <i class="material-icons">
                                                        favorite_border
                                                    </i>
                                                </div>
                                                <div class="beds">
                                                    <i class="material-icons">
                                                        hotel
                                                    </i>
                                                    {{ $ad->beds }}
                                                </div>
                                                <div class="plans">
                                                    <i class="material-icons">
                                                        domain
                                                    </i> {{ $ad->floor }}
                                                </div>
                                            </div>
                                            <h3>{{ $ad->title }}</h3>
                                            <p>{{ themeqx_price_ng($ad) }}</p>
                                            <span>{{ $ad->square_unit_space.' '.$ad->unit_type }}</span>
                                        </a>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
        </div>

        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <div class="modal-body">
                        <div class="modal-top">
                            <img src="{{ asset('assets/img/logo.png') }}" alt="">
                            <p>
                                Сайн байна уу!<br />
                                Эрхэм хэрэглэгч та дэлгэрэнгүй мэдээлэл<br />
                                авахыг хүсвэл нэвтэрч орно уу.
                            </p>
                        </div>
                        <div class="modal-middle">
                            <a class="gmail-button mdl-button" href="{{ route('google_redirect') }}">
                                <img src="{{ asset('assets/img/gmail.png') }}" height="20px"/> <span>gmail</span>
                            </a>
                            <a class="facebook-button mdl-button" href="{{ route('facebook_redirect') }}">
                                <img src="{{ asset('assets/img/facebook.png') }}" height="20px"/> <span>facebook</span>
                            </a>
                        </div>

                        <div class="divide-or">
                            <span>Эсвэл</span>
                        </div>

                        {{ Form::open(['class'=> 'modal-form', 'autocomplete'=> 'off', 'url' => '/login']) }}
                            <input type="text" placeholder="Мэйл хаяг" name="email" value="{{ old('email') }}" />
                            <input type="password" placeholder="Нууц үг" name="password" />
                            <div class="form-button">
                                <button type="submit">Нэвтрэх</button>
                                <button>Бүртгүүлэх</button>
                            </div>
                        {{ Form::close() }}

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('page-js')
    <script src="{{ asset('assets/plugins/owl.carousel/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('assets/lib/thumb/js/lightslider.js') }}"></script>
    <script src="{{ asset('assets/js/fitler.js') }}"></script>
    <script>
        $(document).ready(function(){
            $(".themeqx_new_premium_ads_wrap").owlCarousel({
                loop: true,
                autoplay:true,
                autoplayTimeout:3000,
                margin:10,
                autoplayHoverPause : true,
                responsiveClass:true,
                responsive:{
                    0:{
                        items:1,
                        nav:true,
                        loop:true
                    },
                    600:{
                        items:3,
                        nav:false,
                        loop:true
                    },
                    1000:{
                        items:4,
                        nav:true,
                        loop:true
                    }
                },
                navText : ['<i class="fa fa-arrow-circle-o-left"></i>','<i class="fa fa-arrow-circle-o-right"></i>']
            });
        });

        $(document).ready(function(){
            $(".themeqx_new_regular_ads_wrap").owlCarousel({
                loop: true,
                autoplay : true,
                autoplayTimeout : 2000,
                margin:10,
                autoplayHoverPause : true,
                responsiveClass:true,
                responsive:{
                    0:{
                        items:1,
                        nav:true,
                        loop:true
                    },
                    600:{
                        items:3,
                        nav:false,
                        loop:true
                    },
                    1000:{
                        items:4,
                        nav:true,
                        loop:true
                    }
                },
                navText : ['<i class="fa fa-arrow-circle-o-left"></i>','<i class="fa fa-arrow-circle-o-right"></i>']
            });
        });
        $(document).ready(function(){
            $(".home-latest-blog").owlCarousel({
                loop: true,
                autoplay : true,
                autoplayTimeout : 3000,
                margin:10,
                autoplayHoverPause : true,
                responsiveClass:true,
                responsive:{
                    0:{
                        items:1,
                        nav:true,
                        loop:true
                    },
                    600:{
                        items:3,
                        nav:false,
                        loop:true
                    },
                    1000:{
                        items:4,
                        nav:true,
                        loop:true
                    }
                },
                navText : ['<i class="fa fa-arrow-circle-o-left"></i>','<i class="fa fa-arrow-circle-o-right"></i>']
            });
        });

    </script>
    <script>
        function generate_option_from_json(jsonData, fromLoad){
            //Load Category Json Data To Brand Select
            if(fromLoad === 'country_to_state'){
                var option = '';
                if (jsonData.length > 0) {
                    option += '<option value="" selected> @lang('app.select_state') </option>';
                    for ( i in jsonData){
                        option += '<option value="'+jsonData[i].id+'"> '+jsonData[i].state_name +' </option>';
                    }
                    $('#state_select').html(option);
                    $('#state_select').select2();
                }else {
                    $('#state_select').html('<option value="" selected> @lang('app.select_state') </option>');
                    $('#state_select').select2();
                }
                $('#loaderListingIcon').hide('slow');
            }
        }

        $(window).scroll(function () {
            var topPos = $(this).scrollTop();
            if (topPos > 30) {
                $('header').addClass('scrolled')
            } else {
                $('header').removeClass('scrolled')
            }
        });

        $(document).ready(function(){
            $('[name="country"]').change(function(){
                var country_id = $(this).val();
                $('#loaderListingIcon').show();
                $.ajax({
                    type : 'POST',
                    url : '{{ route('get_state_by_country') }}',
                    data : { country_id : country_id,  _token : '{{ csrf_token() }}' },
                    success : function (data) {
                        generate_option_from_json(data, 'country_to_state');
                    }
                });
            });
        });
    </script>
@endsection