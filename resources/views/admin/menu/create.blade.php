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
                        {{ Form::open(array('url' => 'dashboard/menus', 'method' => 'post', 'class' => 'form-horizontal')) }}

                        <legend>@lang('app.add_menus')</legend>

                        <div class="form-group {{ $errors->has('name')? 'has-error':'' }}">
                            <label for="name" class="col-sm-4 control-label">@lang('app.add_name')</label>
                            <div class="col-sm-8">
                                <input type="text" required class="form-control" id="name" value="{{ old('name') }}" name="name" placeholder="@lang('app.add_name')">
                                {!! $errors->has('name')? '<p class="help-block">'.$errors->first('name').'</p>':'' !!}
                            </div>
                        </div>

                        <div class="form-group {{ $errors->has('main_type')? 'has-error':'' }}">
                            <label for="main_type" class="col-sm-4 control-label">Төрөл</label>
                            <div class="col-sm-8">
                                <select class="form-control" name="main_type" id="main_type">
                                    <option value="sale">@lang('app.sale')</option>
                                    <option value="rent">@lang('app.rent')</option>
                                </select>
                                {!! $errors->has('main_type')? '<p class="help-block">'.$errors->first('main_type').'</p>':'' !!}
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-sm-offset-4 col-sm-8">
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
    <script>
        $( document ).ready(function() {
            $("#main_type").val("{{ $type }}")
        });
    </script>
@endsection


