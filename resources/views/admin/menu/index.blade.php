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
                            <h1 class="page-header"> {{ $title }}  <a href="/dashboard/menus/create?type={{ $type }}" class="btn btn-info pull-right"><i class="fa fa-user-plus"></i> {{ trans('app.add_menus') }}</a> </h1>
                        </div> <!-- /.col-lg-12 -->

                        <div class="col-lg-12 form-group {{ $errors->has('main_type')? 'has-error':'' }}">
                            <label for="main_type" class="col-sm-4 control-label">Төрөл</label>
                            <div class="col-sm-8">
                                <select class="form-control select2NoSearch" name="main_type" id="main_type">
                                    <option value="sale" {{ $type == 'sale' ? 'selected':'' }}>@lang('app.sale')</option>
                                    <option value="rent" {{ $type == 'rent' ? 'selected':'' }}>@lang('app.rent')</option>
                                </select>
                                {!! $errors->has('main_type')? '<p class="help-block">'.$errors->first('main_type').'</p>':'' !!}
                            </div>
                        </div>
                    </div> <!-- /.row -->
                @endif

                @include('admin.flash_msg')

                <div class="row">
                    <div class="col-xs-12">
                        <table class="table table-bordered">
                            <tr>
                                <th>@lang('app.menus') </th>
                            </tr>
                            @foreach($menus as $menu)
                                <tr>
                                    <td>
                                        <div class="clearfix">
                                            <strong>{{ $menu->name }}</strong>
                                            <span class="pull-right">

                                            <form action="{{ route('menus.destroy', $menu->id)}}" method="post">
                                              @csrf
                                              @method('DELETE')
                                              <button class="btn btn-danger btn-xs" type="submit"><i class="fa fa-trash"></i> </button>
                                            </form>

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
        $('#main_type').on('change', function () {
              var id = $(this).val(); // get selected value
              if (id) { 
                  window.location = `/dashboard/menus?type=${id}`;
              }
              return false;
        });
    </script>
@endsection


