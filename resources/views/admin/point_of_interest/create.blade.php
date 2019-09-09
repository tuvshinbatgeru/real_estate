@extends('layout.admin-layout')
@section('title') @if( ! empty($title)) {{ $title }} | @endif @parent @endsection

@section('main')

    <div class="container">

        <div id="wrapper">

            @include('admin.sidebar_menu')

            <div id="page-wrapper">
                @if( ! empty($title))
                    <div class="row">
                        <div class="col-lg-12">
                            <h1 class="page-header"> {{ $title }}  </h1>
                        </div> <!-- /.col-lg-12 -->
                    </div> <!-- /.row -->
                @endif

                @include('admin.flash_msg')

                <div class="row">
                    <div class="col-xs-12">
                        {{ Form::open(array('url' => 'dashboard/poi', 'method' => 'post', 'class' => 'form-horizontal')) }}

                        <legend>Байршил нэмэх</legend>

                        <div class="form-group {{ $errors->has('name')? 'has-error':'' }}">
                            <label for="name" class="col-sm-4 control-label">Нэр</label>
                            <div class="col-sm-8">
                                <input type="text" required class="form-control" id="name" value="{{ old('name') }}" name="name" placeholder="@lang('app.add_name')">
                                {!! $errors->has('name')? '<p class="help-block">'.$errors->first('name').'</p>':'' !!}
                            </div>
                        </div>

                        <div class="form-group {{ $errors->has('name')? 'has-error':'' }}">
                            <label for="searchable" class="col-sm-4 control-label">Хайлтанд харагдах эсэх</label>
                            <div class="col-sm-8">
                                <input 
                                    id="searchable"
                                    type="checkbox" 
                                    name="searchable"
                                />
                                {!! $errors->has('searchable')? '<p class="help-block">'.$errors->first('searchable').'</p>':'' !!}
                            </div>
                        </div>

                        <div class="form-group {{ $errors->has('latitude')? 'has-error':'' }}">
                            <label for="ad_title" class="col-sm-4 control-label">@lang('app.latitude')</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="latitude" value="{{ old('latitude') }}" required name="latitude" placeholder="@lang('app.latitude')">
                                {!! $errors->has('latitude')? '<p class="help-block">'.$errors->first('latitude').'</p>':'' !!}
                            </div>
                        </div>

                        <div class="form-group {{ $errors->has('longitude')? 'has-error':'' }}">
                            <label for="ad_title" class="col-sm-4 control-label">@lang('app.longitude')</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="longitude" value="{{ old('longitude') }}" required name="longitude" placeholder="@lang('app.longitude')">
                                {!! $errors->has('longitude')? '<p class="help-block">'.$errors->first('longitude').'</p>':'' !!}
                            </div>
                        </div>

                        <input id="pac-input" class="controls" type="text" placeholder="Search Box">
                        <div id="dvMap" style="width: 100%; height: 400px; margin: 20px 0;"></div>

                        <div class="row">
                            <div class="col-xs-12">
                                <table class="table table-bordered">
                                    @foreach($districts as $district)
                                        <tr>
                                            <td>
                                                <input 
                                                    type="checkbox" 
                                                    name="districts[]"
                                                    value="{{ $district->id }}"
                                                />
                                            </td>
                                            <td>
                                                <div class="clearfix">
                                                    <strong>{{ $district->city_name }}</strong>
                                                    <span class="pull-right">
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                </table>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-sm-offset-4 col-sm-8">
                                <a class="btn btn-secondary" href="/dashboard/poi">@lang('app.back')</a>

                                <button type="submit" class="btn btn-primary">@lang('app.save_new_ad')</button>
                            </div>
                        </div>
                        {{ Form::close() }}
                    </div>
                </div>
            </div>   <!-- /#page-wrapper -->
        </div>   <!-- /#wrapper -->
    </div> <!-- /#container -->
@endsection

@section('page-js')
    <script src="https://maps.googleapis.com/maps/api/js?key={{get_option('google_map_api_key')}}&libraries=places&callback=initAutocomplete" async defer></script>

    <script>
        // This example adds a search box to a map, using the Google Place Autocomplete
        // feature. People can enter geographical searches. The search box will return a
        // pick list containing a mix of places and predicted search terms.

        function initAutocomplete() {
            var map = new google.maps.Map(document.getElementById('dvMap'), {
                center: {lat: {{ (get_option('default_latitude') != 'default_latitude' ) ? get_option('default_latitude') : 40.715 }}, lng: {{ (get_option('default_longitude') != 'default_longitude')? get_option('default_longitude') : -74.009 }} },
                zoom: 15,
                mapTypeId: google.maps.MapTypeId.ROADMAP
            });

            // Create the search box and link it to the UI element.
            var input = document.getElementById('pac-input');
            var searchBox = new google.maps.places.SearchBox(input);
            map.controls[google.maps.ControlPosition.TOP_LEFT].push(input);

            // Bias the SearchBox results towards current map's viewport.
            map.addListener('bounds_changed', function() {
                searchBox.setBounds(map.getBounds());
            });

            //Click event for getting lat lng
            google.maps.event.addListener(map, 'click', function (e) {
                $('input#latitude').val(e.latLng.lat());
                $('input#longitude').val(e.latLng.lng());
            });

            var markers = [];
            // [START region_getplaces]
            // Listen for the event fired when the user selects a prediction and retrieve
            // more details for that place.
            searchBox.addListener('places_changed', function() {
                var places = searchBox.getPlaces();

                if (places.length == 0) {
                    return;
                }

                // Clear out the old markers.
                markers.forEach(function(marker) {
                    marker.setMap(null);
                });
                markers = [];

                // For each place, get the icon, name and location.
                var bounds = new google.maps.LatLngBounds();
                places.forEach(function(place) {
                    var icon = {
                        url: place.icon,
                        size: new google.maps.Size(71, 71),
                        origin: new google.maps.Point(0, 0),
                        anchor: new google.maps.Point(17, 34),
                        scaledSize: new google.maps.Size(25, 25)
                    };

                    // Create a marker for each place.
                    markers.push(new google.maps.Marker({
                        map: map,
                        icon: icon,
                        title: place.name,
                        position: place.geometry.location
                    }));

                    if (place.geometry.viewport) {
                        // Only geocodes have viewport.
                        bounds.union(place.geometry.viewport);
                    } else {
                        bounds.extend(place.geometry.location);
                    }
                });
                map.fitBounds(bounds);
            });
            // [END region_getplaces]
        }

    </script>
@endsection


