
<div class="subscribe">
    <div class="container">
        <div class="row blue-input">
            <div class="input-field col s12">
                <input id="icon_prefix" type="text" class="validate">
                <label for="icon_prefix">Утасны дугаараа оруулаад бүртгүүлээрэй</label>
            </div>
        </div>
    </div>
</div>
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


<script src="{{ asset('assets/js/vendor/jquery-1.11.2.min.js') }}"></script>
<script src="{{ asset('assets/js/vendor/bootstrap.min.js') }}"></script>
<script src="{{ asset('assets/plugins/toastr/toastr.min.js') }}"></script>
<script src="{{ asset('assets/select2-3.5.3/select2.min.js') }}"></script>
<script src="{{ asset('assets/plugins/nprogress/nprogress.js') }}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>

<script type="text/javascript">
    NProgress.start();
    NProgress.done();
</script>
<!-- Conditional page load script -->
@if(request()->segment(1) === 'dashboard')
    <script src="{{ asset('assets/plugins/metisMenu/dist/metisMenu.min.js') }}"></script>
    <script>
        $(function() {
            $('#side-menu').metisMenu();
        });
    </script>
@endif
<script src="{{ asset('assets/js/main.js') }}"></script>
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
</script>

</body>
</html>