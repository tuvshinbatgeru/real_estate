@extends('layout.admin-layout')
@section('title') @if( ! empty($title)) {{ $title }} | @endif @parent @endsection


@section('main')

    <div class="container" id="app">

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

                        <!-- <div class="form-group">
                            <label for="category_type" class="col-sm-4 control-label">@lang('app.categories_type')</label>
                            <div class="col-sm-8">
                                <select class="form-control select2icon" name="category_type">
                                    <option value="indoor">@lang('app.indoor')</option>
                                    <option value="outdoor">@lang('app.outdoor')</option>
                                </select>
                            </div>
                        </div> -->


                        <div class="form-group {{ $errors->has('category_name')? 'has-error':'' }}">
                            <label for="category_name" class="col-sm-4 control-label">@lang('app.category_name')</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="category_name" value="{{ old('category_name') }}" name="category_name" placeholder="@lang('app.category_name')">
                                {!! $errors->has('category_name')? '<p class="help-block">'.$errors->first('category_name').'</p>':'' !!}
                            </div>
                        </div>
                        
                        <div class="form-group {{ $errors->has('icon_active')? 'has-error':'' }}">
                            <label for="icon_active" class="col-sm-4 control-label">@lang('app.icon_active')</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="icon_active" value="{{ old('icon_active') }}" name="icon_active" placeholder="@lang('app.icon_active')">
                                {!! $errors->has('icon_active')? '<p class="help-block">'.$errors->first('icon_active').'</p>':'' !!}
                            </div>
                        </div>


                        <label>Сонголт нэмэх</label>
                        
                        <option-list>
                        </option-list>

                        <div class="form-group">
                            <div class="col-sm-offset-4 col-sm-8">
                                <button type="submit" class="btn btn-primary">@lang('app.save_new_category')</button>
                            </div>
                        </div>
                        {{ Form::close() }}

                    </div>

                </div>


                <div class="row">
                    <div class="col-xs-12">
                        <table class="table table-bordered">
                            <tr>
                                <th>@lang('app.category_name') (@lang('app.total_products')) </th>
                            </tr>
                            @foreach($categories as $category)
                                <tr>
                                    <td>
                                        <div class="clearfix">
                                            <strong><span style="color: {{ $category->color_class }}">{{ $category->category_name }}</span> </strong>

                                            <span class="pull-right">

                                            <a href="{{ route('edit_categories', $category->id) }}" class="btn btn-info btn-xs"><i class="fa fa-pencil"></i> </a>
                                            <a href="javascript:;" class="btn btn-danger btn-xs" data-id="{{ $category->id }}"><i class="fa fa-trash"></i> </a>
                                            </span>
                                        </div>

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
    <script>
        $(document).ready(function() {
            $('.btn-danger').on('click', function (e) {
                if (!confirm("Are you sure? its can't be undone")) {
                    e.preventDefault();
                    return false;
                }

                var selector = $(this);
                var data_id = $(this).data('id');

                $.ajax({
                    type: 'POST',
                    url: '{{ route('delete_categories') }}',
                    data: {data_id: data_id, _token: '{{ csrf_token() }}'},
                    success: function (data) {
                        if (data.success == 1) {
                            selector.closest('div').hide('slow');
                        }
                    }
                });
            });
        });
    </script>
@endsection