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
                            <h1 class="page-header"> {{ $title }} </h1>
                        </div> <!-- /.col-lg-12 -->
                    </div> <!-- /.row -->
                @endif

                @include('admin.flash_msg')

                {{ Form::open(array('url' => 'dashboard/menus/categories/'.$type, 'method' => 'post', 'class' => 'form-horizontal')) }}

                <div class="row">
                    <div class="col-xs-12">
                        <table class="table table-bordered">
                            <tr>
                                <th><small></small> </th>
                                <th><small>Филтер</small> </th>
                            </tr>
                            @foreach($categories as $category)
                                <tr>
                                	<td>
	                                    <input 
	                                        type="checkbox" 
	                                        name="categories[]"
	                                        value="{{ $category->id }}"
	                                        {{ $category->checked ? 'checked' : ''}} 
	                                    />
	                                </td>
                                    <td>
                                        <div class="clearfix">
                                            <strong>{{ $category->category_name }}</strong>
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
                        <a class="btn btn-secondary" href="/dashboard/menus/categories?type={{ $type }}">@lang('app.back')</a>

                        <button type="submit" class="btn btn-primary">@lang('app.save_new_ad')</button>
                    </div>
                </div>
            </div>   <!-- /#page-wrapper -->
        </div>   <!-- /#wrapper -->
    </div> <!-- /#container -->
@endsection

@section('page-js')
@endsection


