@extends('layout.main-layout')
@section('title') @if( ! empty($title)) {{ $title }} | @endif @parent @endsection

@section('main')
<div class="main-container">
    <div class="contents">
        <div class="new-filter">
                <div class="container">
                    <div class="customs">
                        <div class="custom-basic-select">
                            <div class="custom-select-title">
                                M2, Үнэ
                                <div class="selected-value"></div>
                            </div>
                            <div class="custom-select-options">
                                <div class="custom-select-item">
                                    <ul>
                                        <li data-id='0'>35 - 45 m2</li>
                                        <li data-id='1'>35 - 45 m2</li>
                                        <li data-id='2'>35 - 45 m2</li>
                                        <li data-id='3'>35 - 45 m2</li>
                                        <li data-id='4'>35 - 45 m2</li>
                                        <li data-id='5'>35 - 45 m2</li>
                                        <li data-id='6'>35 - 45 m2</li>
                                        <li data-id='7'>35 - 45 m2</li>
                                        <li data-id='8'>35 - 45 m2</li>
                                    </ul>
                                    <div class="options" data-id="0">
                                        <div class="option" data-value='1-2 сая'>
                                            1-2 сая
                                        </div>
                                        <div class="option" data-value='2-3 сая'>
                                            2-3 сая
                                        </div>
                                        <div class="option" data-value='3-4 сая'>
                                            3-4 сая
                                        </div>
                                        <div class="option" data-value='5-6 сая'>
                                            5-6 сая
                                        </div>
                                    </div>
                                    <div class="options" data-id="1">
                                        <div class="option" data-value='10-20 сая'>
                                            10-20 сая
                                        </div>
                                        <div class="option" data-value='20-30 сая'>
                                            20-30 сая
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="custom-basic-select">
                            <div class="custom-select-title">
                                Дүүрэг, хороо
                                <div class="selected-value"></div>
                            </div>
                            <div class="custom-select-options">
                                <div class="custom-select-item arrow">
                                    <ul>
                                        <li data-id='9'>Багануур</li>
                                        <li data-id='10'>Багахангай</li>
                                        <li data-id='11'>Баянгол</li>
                                        <li data-id='12'>Баянзүрх</li>
                                        <li data-id='13'>Налайх</li>
                                        <li data-id='14'>Сонгинохайрхан</li>
                                        <li data-id='15'>Сүхбаатар</li>
                                        <li data-id='16'>Хан-Уул</li>
                                        <li data-id='17'>Чингэлтэй</li>
                                    </ul>
                                    <div class="options" data-id="9">
                                        <div class="option" data-value='1-р хороо'>
                                            1-р хороо
                                        </div>
                                        <div class="option" data-value='2-р хороо'>
                                            2-р хороо
                                        </div>
                                        <div class="option" data-value='3-р хороо'>
                                            3-р хороо
                                        </div>
                                        <div class="option" data-value='4-р хороо'>
                                            4-р хороо
                                        </div>
                                    </div>
                                    <div class="options" data-id="10">
                                        <div class="option" data-value='1-р хороо'>
                                            1-р хороо
                                        </div>
                                        <div class="option" data-value='2-р хороо'>
                                            2-р хороо
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="custom-basic-select">
                            <div class="custom-select-title">
                                Байршил, Хотхон
                                <div class="selected-value"></div>
                            </div>
                            <div class="custom-select-options">
                                <div class="custom-select-item arrow full">
                                    <ul>
                                        <li data-id='9'>Хүнсний 4 дэлгүүр</li>
                                        <li data-id='10'>Мэргэжилтний 20</li>
                                        <li data-id='11'>Оффицеруудын ордон</li>
                                        <li data-id='12'>Баянзүрх</li>
                                        <li data-id='13'>Налайх</li>
                                        <li data-id='14'>Сонгинохайрхан</li>
                                        <li data-id='15'>Сүхбаатар</li>
                                        <li data-id='16'>Хан-Уул</li>
                                        <li data-id='17'>Чингэлтэй</li>
                                    </ul>
                                    <div class="options" data-id="9">
                                        <div class="option" data-value='Encanto town'>
                                            Encanto town
                                        </div>
                                        <div class="option" data-value='River garden'>
                                            River garden
                                        </div>
                                        <div class="option" data-value='Mandala town'>
                                            Mandala town
                                        </div>
                                        <div class="option" data-value='Time squire'>
                                            Time squire
                                        </div>
                                    </div>
                                    <div class="options" data-id="10">
                                        <div class="option" data-value='1-р хороо'>
                                            1-р хороо
                                        </div>
                                        <div class="option" data-value='2-р хороо'>
                                            2-р хороо
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="custom-basic-select">
                            <div class="custom-select-title">
                                Нүүж ороход бэлэн эсэх
                                <div class="selected-value"></div>
                            </div>
                            <div class="custom-select-options">
                                <!-- <div class="custom-select-item"> -->
                                <div class="option" data-value='Хоног 0 бэлэн'>
                                    Хоног 0 бэлэн
                                </div>
                                <div class="option" data-value='Хоног 14 арй боломжгүй'>
                                    Хоног 14 арй боломжгүй
                                </div>
                                <div class="option" data-value='55 - 65 m2'>
                                    Хоног 0 бэлэн
                                </div>
                                <div class="option" data-value='55 - 65 m2'>
                                    Хоног 0 бэлэн
                                </div>
                                <!-- </div> -->
                            </div>
                        </div>
                        <div class="group-button">
                            <button type="button" class="btn btn-primary">Хайх</button>
                        </div>
                    </div>

                    <div id="lightSlider" class="icon">
                        @foreach($filters as $filter)
                            <div class="">
                                <div class="custom-basic-select icon">
                                    <div class="custom-select-title">
                                        <div class="icon-container">
                                            <img src="{{ asset('assets/img/icons/' . $filter->icon_active . '.png') }}" alt="">
                                            <p>{{ $filter->category_name }}</p>
                                        </div>
                                        <div class="selected-value"></div>
                                    </div>

                                    <div class="custom-select-options">
                                        <div class="">
                                            @foreach($filter->options as $option)
                                            <div class="option" data-value="{{ $option->option }}">
                                                {{ $option->option }}
                                            </div>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>

                    <div class="clear"></div>
                    <div class="filter-footer-container">
                        <div class="filter-footer">
                            <div class="advanced-search" data-opens="0">
                                <i class="fa fa-chevron-down"></i>
                                <span>Нарийвчилсан хайлт</span>
                            </div>
                            <div>
                                <b>{{ $ads->total() }}</b> хайлтын үр дүн байна
                            </div>
                        </div>
                    </div>

                </div>
            </div>

        <div class="row">
            <div class="col-md-12">
                <div class="ad-box-wrap">

                    @if($ads->total() > 0)
                        <div class="ad-box-grid-view" style="display: {{ session('grid_list_view') ? (session('grid_list_view') == 'grid'? 'block':'none') : 'block' }};">
                            <div class="grid-five">
                                <div class="container">
                                    <div class="row">
                                        <div class="grid-container">
                                            @foreach($ads as $ad)
                                                <div class="grid-item">
                                                    <a href="{{ route('single_ad', $ad->slug) }}">
                                                        <div class="img-container">
                                                            <img itemprop="image" width="100%" src="{{ media_url($ad->feature_img) }}" alt="{{ $ad->title }}" />

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

                        <div class="ad-box-list-view" style="display: {{ session('grid_list_view') == 'list'? 'block':'none' }};">
                            <div class="row">
                                <div class="col-sm-12">
                                    <table class="table table-bordered table-responsive">
                                        @foreach($ads as $ad)
                                            <tr class="ad-{{ $ad->price_plan }}">
                                                <td width="100">
                                                    <img itemprop="image"  src="{{ media_url($ad->feature_img) }}" class="img-responsive" alt="{{ $ad->title }}">
                                                     <span class="modern-img-indicator">
                                                         @if(! empty($ad->video_url))
                                                             <i class="fa fa-file-video-o"></i>
                                                         @else
                                                             <i class="fa fa-file-image-o"> {{ $ad->media_img->count() }}</i>
                                                         @endif
                                                     </span>
                                                </td>
                                                <td>
                                                    <h5><a href="{{ route('single_ad', $ad->slug) }}" >{{ $ad->title }}</a> </h5>
                                                    <h5>{{ themeqx_price_ng($ad) }} </h5>

                                                    <p class="text-muted">
                                                        @if($ad->city)
                                                            <i class="fa fa-map-marker"></i> <a class="location text-muted" href="{{ route('listing', ['city'=>$ad->city->id]) }}"> {{ $ad->city->city_name }} </a>,
                                                        @endif
                                                        <i class="fa fa-clock-o"></i> {{ $ad->created_at->diffForHumans() }}
                                                    </p>

                                                    <p class="listViewItemFooter">
                                                        <span> <i class="fa fa-building"></i> {{ ucfirst($ad->type) }} </span>

                                                        <span> <i class="fa fa-arrows-alt "></i>  {{ $ad->square_unit_space.' '.$ad->unit_type }} </span>

                                                        @if($ad->beds)
                                                            <span>
                                                            <i class="fa fa-bed"></i> {{ $ad->beds.' '.trans('app.bedrooms') }} </span>
                                                            <span>{{ $ad->floor.' '.trans('app.floor') }}</span>
                                                        @endif
                                                    </p>


                                                    @if($ad->price_plan == 'premium')
                                                        <div class="ribbon-green-bar">{{ ucfirst($ad->price_plan) }}</div>
                                                    @endif
                                                    @if($ad->mark_ad_urgent == '1')
                                                        <div class="ribbon-red-bar">@lang('app.urgent')</div>
                                                    @endif

                                                </td>

                                            </tr>
                                        @endforeach
                                    </table>
                                </div>
                            </div>
                        </div>

                    @else
                        <div class="container" style="padding: 40px;">
                            <h2><i class="fa fa-info-circle"></i> @lang('app.search_not_found') </h2>
                        </div>
                    @endif
                </div>


                <div class="row">
                    <div class="col-xs-12">
                        {{ $ads->appends(request()->input())->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection


@section('page-js')
    <script>
        $(document).ready(function() {
            $('#shortBySelect').change(function () {
                var form_input = $('#listingFilterForm').serialize();
                location.href = '{{ route('listing') }}?' + form_input + '&shortBy=' + $(this).val();
            });
        });
        function generate_option_from_json(jsonData, fromLoad){
            //Load Category Json Data To Brand Select
            if (fromLoad === 'category_to_sub_category'){
                var option = '';
                if (jsonData.length > 0) {
                    option += '<option value="" selected> <?php echo trans('app.select_a_sub_category') ?> </option>';
                    for ( i in jsonData){
                        option += '<option value="'+jsonData[i].id+'"> '+jsonData[i].category_name +' </option>';
                    }
                    $('#sub_category_select').html(option);
                    $('#sub_category_select').select2();
                }else {
                    $('#sub_category_select').html('<option value="">@lang('app.select_a_sub_category')</option>');
                    $('#sub_category_select').select2();
                }
                $('#loaderListingIcon').hide('slow');
            }else if (fromLoad === 'category_to_brand'){
                var option = '';
                if (jsonData.length > 0) {
                    option += '<option value="" selected> <?php echo trans('app.select_a_brand') ?> </option>';
                    for ( i in jsonData){
                        option += '<option value="'+jsonData[i].id+'"> '+jsonData[i].brand_name +' </option>';
                    }
                    $('#brand_select').html(option);
                    $('#brand_select').select2();
                }else {
                    $('#brand_select').html('<option value="">@lang('app.select_a_brand')</option>');
                    $('#brand_select').select2();
                }
                $('#loaderListingIcon').hide('slow');
            }else if(fromLoad === 'country_to_state'){
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

            }else if(fromLoad === 'state_to_city'){
                var option = '';
                if (jsonData.length > 0) {
                    option += '<option value="" selected> @lang('app.select_city') </option>';
                    for ( i in jsonData){
                        option += '<option value="'+jsonData[i].id+'"> '+jsonData[i].city_name +' </option>';
                    }
                    $('#city_select').html(option);
                    $('#city_select').select2();
                }else {
                    $('#city_select').html('<option value="" selected> @lang('app.select_city') </option>');
                    $('#city_select').select2();
                }
                $('#loaderListingIcon').hide('slow');
            }
        }

        $(function(){

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
            $('[name="state"]').change(function(){
                var state_id = $(this).val();
                $('#loaderListingIcon').show();
                $.ajax({
                    type : 'POST',
                    url : '{{ route('get_city_by_state') }}',
                    data : { state_id : state_id,  _token : '{{ csrf_token() }}' },
                    success : function (data) {
                        generate_option_from_json(data, 'state_to_city');
                    }
                });
            });
        });
        $(function(){
            $('#showGridView').click(function(){
                $('.ad-box-grid-view').show();
                $('.ad-box-list-view').hide();
                $.ajax({
                    type : 'POST',
                    url : '{{ route('switch_grid_list_view') }}',
                    data : { grid_list_view : 'grid',  _token : '{{ csrf_token() }}' },
                });
            });
            $('#showListView').click(function(){
                $('.ad-box-grid-view').hide();
                $('.ad-box-list-view').show();
                $.ajax({
                    type : 'POST',
                    url : '{{ route('switch_grid_list_view') }}',
                    data : { grid_list_view : 'list',  _token : '{{ csrf_token() }}' },
                });
            });
        });
    </script>

    <script>
        @if(session('success'))
            toastr.success('{{ session('success') }}', '<?php echo trans('app.success') ?>', toastr_options);
        @endif
    </script>
@endsection