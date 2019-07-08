<div class="footer-menus">
    <div class="container">
        <div class="row">
            <ul>
                <li>
                    <a href="">
                        Эхлэл
                    </a>
                </li>
                <li>
                    <a href="">
                        Бид
                    </a>
                </li>
                <li>
                    <a href="">
                        Хамтрах
                    </a>
                </li>
                <li>
                    <a href="">
                        Төлбөрийн боломж
                    </a>
                </li>
                <li>
                    <a href="">
                        Агент
                    </a>
                </li>
                <li>
                    <a href="">
                        Компани
                    </a>
                </li>
                <li>
                    <a href="">
                        Холбогдох
                    </a>
                </li>
            </ul>
        </div>
    </div>
</div>
<div class="copyright">
    <p>© 2019 <span class="blue-color">Research</span>. Made with love by Research. All Rights Reserve</p>
    <div class="social-icons">
        <i class="fab fa-facebook-f"></i>
        <i class="fab fa-twitter"></i>
        <i class="fab fa-behance"></i>
        <i class="fab fa-linkedin-in"></i>
        <i class="fab fa-google-plus-g"></i>
    </div>
</div>

<div id="loadingOverlay" style="display: none;">
    <div class="circleLoader"></div>
    <p>@lang('app.loading')...</p>
</div>

<script src="{{ asset('js/app.js') }}"></script>
<script src="{{ asset('assets/plugins/toastr/toastr.min.js') }}"></script>
<script src="{{ asset('assets/select2-3.5.3/select2.min.js') }}"></script>
<script src="{{ asset('assets/plugins/nprogress/nprogress.js') }}"></script>

<script type="text/javascript">
    NProgress.start();
    NProgress.done();
</script>
<!-- Conditional page load script -->
<script>
    var toastr_options = {closeButton : true};
</script>
@yield('page-js')


@if(get_option('additional_js') && get_option('additional_js') !== 'additional_js' )
    {!! get_option('additional_js') !!}}
@endif
<script>
    $(document).on('click', '.ghuranti', function(){
        $('.themeqx-demo-chooser-wrap').toggleClass('open');
    });
    // $(document).ready(function(){
    //     $('select').formSelect();
    // });
</script>

</body>
</html>