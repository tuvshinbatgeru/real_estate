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
                    <div class="col-sm-8 col-sm-offset-1 col-xs-12">

                        {{ Form::open(['class' => 'form-horizontal']) }}

                        <div class="form-group {{ $errors->has('category_name')? 'has-error':'' }}">
                            <label for="category_name" class="col-sm-4 control-label">@lang('app.category_name')</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="category_name" value="{{ old('category_name') ? old('category_name') : $edit_category->category_name }}" name="category_name" placeholder="@lang('app.category_name')<">
                                {!! $errors->has('category_name')? '<p class="help-block">'.$errors->first('category_name').'</p>':'' !!}

                            </div>
                        </div>

                        <div class="form-group {{ $errors->has('icon_idle')? 'has-error':'' }}">
                            <label for="icon_idle" class="col-sm-4 control-label">@lang('app.icon_idle')</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="icon_idle" value="{{ old('icon_idle') ? old('icon_idle') : $edit_category->icon_idle }}" name="icon_idle" placeholder="@lang('app.icon_idle')<">
                                {!! $errors->has('icon_idle')? '<p class="help-block">'.$errors->first('icon_idle').'</p>':'' !!}

                            </div>
                        </div>

                        <div class="form-group {{ $errors->has('icon_active')? 'has-error':'' }}">
                            <label for="icon_active" class="col-sm-4 control-label">@lang('app.icon_active')</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="icon_active" value="{{ old('icon_active') ? old('icon_active') : $edit_category->icon_active }}" name="icon_active" placeholder="@lang('app.icon_active')<">
                                {!! $errors->has('icon_active')? '<p class="help-block">'.$errors->first('icon_active').'</p>':'' !!}

                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-sm-offset-4 col-sm-8">
                                <button type="submit" class="btn btn-primary">@lang('app.edit_category')</button>
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

@endsection