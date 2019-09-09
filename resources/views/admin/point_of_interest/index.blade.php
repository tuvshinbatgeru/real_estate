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
                            <h1 class="page-header"> {{ $title }}  
                                <a 
                                    href="/dashboard/poi/create" 
                                    class="btn btn-info pull-right"
                                ><i class="fa fa-user-plus"></i> {{ trans('app.add_poi') }}</a>
                            </h1>
                        </div> <!-- /.col-lg-12 -->
                    </div> <!-- /.row -->
                @endif

                <!-- <div class="col-lg-12 form-group {{ $errors->has('main_type')? 'has-error':'' }}">
                    <label for="main_type" class="col-sm-4 control-label">Төрөл</label>
                    <div class="col-sm-8">
                        <select class="form-control" name="main_type" id="main_type">
                            @foreach($districts as $district)
                                <option 
                                value="{{ $district->id }}">
                                {{ $district->city_name }}
                                </option>
                            @endforeach
                        </select>
                        {!! $errors->has('main_type')? '<p class="help-block">'.$errors->first('main_type').'</p>':'' !!}
                    </div>
                </div> -->

                @include('admin.flash_msg')

                <br />

                <div class="row">
                    <div class="col-xs-12">
                        <table class="table table-bordered">
                            <tr>
                                <th><small>@lang('app.menus')</small></th>
                                <th><small>Дүүрэг</small> </th>
                                <th><small>Хайлт хийх</small> </th>
                                <th></th>
                            </tr>
                            @foreach($point_of_interests as $poi)
                                <tr>
                                    <td>
                                        <div class="clearfix">
                                            <strong>{{ $poi->place_name }}</strong>
                                            <span class="pull-right">
                                        </div>
                                    </td>
                                    <td>
                                        @foreach($poi->districts as $district)
                                            <span class="label label-default">{{ $district->city_name }}</span>
                                        @endforeach
                                    </td>
                                    <td>{{ $poi->searchable }}</td>
                                    <td>
                                        <form action="{{ route('menus.destroy', $poi->id)}}" method="post">
                                              @csrf
                                              @method('DELETE')
                                              <button class="btn btn-danger btn-xs" type="submit"><i class="fa fa-trash"></i> </button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </table>
                    </div>
                </div>
            </div>   <!-- /#page-wrapper -->
        </div>   <!-- /#wrapper -->
    </div> <!-- /#container -->
@endsection

@section('page-js')
@endsection


