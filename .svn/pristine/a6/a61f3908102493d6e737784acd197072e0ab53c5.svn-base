@extends('layout.main')
@section('title') @if( ! empty($title)) {{ $title }} | @endif @parent @endsection

<style>
    table {
    border-collapse: collapse;
    width: 300px;
    overflow-x: scroll;
    display: block;
    }

    thead {
    background-color: #EFEFEF;
    }

    thead,
    tbody {
    }

    tbody {
        overflow-y: scroll;
        height: 140px;
    }

    td,
    th {
    min-width: 100px;
    height: 25px;
    border: dashed 1px lightblue;
    overflow: hidden;
    text-overflow: ellipsis;
    max-width: 100px;
    vertical-align: top;

    }
</style>
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

                <div class="row">
                    <table id="headertable" class='table'>
                        <thead>
                            <tr>
                                <th>@lang('app.last_name')</th>
                                <th>@lang('app.first_name')</th>
                                <th>@lang('app.phone_number')</th>
                                <th>@lang('app.email')</th>
                                <th>@lang('app.facebook_user_name')</th>
                                <th>@lang('app.cash_percent')</th>
                                <th>@lang('app.cash_pay_time')</th>
                                <th>@lang('app.barter_percent')</th>
                                <th>@lang('app.barter_pay_time')</th>
                                <th>@lang('app.loan_percent')</th>
                                <th>@lang('app.loan_pay_time')</th>
                                <th>@lang('app.working_company')</th>
                                <th>@lang('app.working_year')</th>
                                <th>@lang('app.family_income')</th>
                                <th>@lang('app.family_members')</th>
                                <th>@lang('app.family_kindergarden')</th>
                                <th>@lang('app.family_elementary_school')</th>
                                <th>@lang('app.family_secondary_school')</th>
                                <th>@lang('app.family_high_school')</th>
                                <th>@lang('app.living_place_type')</th>
                                <th>@lang('app.additional_info')</th>
                                <th>@lang('app.created_at')</th>
                            </tr>
                        </thead>
                        <tbody>
                             @foreach($adQueries as $adQuery)
                                <tr>
                                    <td> {{ $adQuery->firstName }} </td>
                                    <td> {{ $adQuery->lastName }}  </td>
                                    <td> {{ $adQuery->phoneNumber }} </td>
                                    <td> {{ $adQuery->email }} </td>
                                    <td> {{ $adQuery->facebookUserName }} </td>
                                    <td> {{ $adQuery->cashPercent }} </td>
                                    <td> {{ $adQuery->cashPayTime}} </td>
                                    <td> {{ $adQuery->barterPercent }} </td>
                                    <td> {{ $adQuery->barterPayTime }} </td>
                                    <td> {{ $adQuery->loanPercent }} </td>
                                    <td> {{ $adQuery->loanPayTime }} </td>
                                    <td> {{ $adQuery->workingCompany }} </td>
                                    <td> {{ $adQuery->workingYear }} </td>
                                    <td> {{ $adQuery->familyIncome }} </td>
                                    <td> {{ $adQuery->familyMembers }} </td>
                                    <td> {{ $adQuery->familyKindergarden }} </td>
                                    <td> {{ $adQuery->familyElementarySchool }} </td>
                                    <td> {{ $adQuery->familySecondarySchool }} </td>
                                    <td> {{ $adQuery->familyHighSchool }} </td>
                                    <td> {{ $adQuery->livingPlaceType }} </td>
                                    <td> {{ $adQuery->additionalInfo }} </td>
                                    <td> {{ $adQuery->created_at }} </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                
                <input type="button" class="btn btn-primary" onclick="tableToExcel('headertable', 'ad_queries','ad_queries')" value= "@lang('app.export_to_excel')">
               
        </div>   <!-- /#page-wrapper -->
      </div>   <!-- /#wrapper -->
    </div> <!-- /#container -->
@endsection
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script>
    $('table').on('scroll', function() {
         $("table > *").width($("table").width() + $("table").scrollLeft());
    });
    
    function tableToExcel(table, name, filename) {
        let uri = 'data:application/vnd.ms-excel;base64,', 
        template = '<html xmlns:o="urn:schemas-microsoft-com:office:office" xmlns:x="urn:schemas-microsoft-com:office:excel" xmlns="http://www.w3.org/TR/REC-html40"><title></title><head><!--[if gte mso 9]><xml><x:ExcelWorkbook><x:ExcelWorksheets><x:ExcelWorksheet><x:Name>{worksheet}</x:Name><x:WorksheetOptions><x:DisplayGridlines/></x:WorksheetOptions></x:ExcelWorksheet></x:ExcelWorksheets></x:ExcelWorkbook></xml><![endif]--><meta http-equiv="content-type" content="text/plain; charset=UTF-8"/></head><body><table>{table}</table></body></html>', 
        base64 = function(s) 
            { 
                return window.btoa(unescape(encodeURIComponent(s))) },         
                    format = function(s, c) { return s.replace(/{(\w+)}/g, function(m, p) { return c[p]; })}
        
        if (!table.nodeType) table = document.getElementById(table)
        var ctx = {worksheet: name || 'Worksheet', table: table.innerHTML}

        var link = document.createElement('a');
        link.download = filename;
        link.href = uri + base64(format(template, ctx));
        link.click();
    }
</script>