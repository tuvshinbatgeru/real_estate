@extends('layout.login-layout')
@section('title') Log-In | @parent @endsection

@section('main')
    <div class="main-container login" style='background-image: url({{ asset('assets/img/login.jpg') }}'>
        <div class="login-cn">
            <a href="/">
                <img src="{{ asset('assets/img/logo.png') }}" />
            </a>
            <div class="modal-top">
                <p>
                    Сайн байна уу!<br />
                    Эрхэм хэрэглэгч та дэлгэрэнгүй мэдээлэл<br />
                    авахыг хүсвэл нэвтэрч орно уу.
                </p>
            </div>
            <div class="modal-middle">
                <a class="gmail-button mdl-button" href="{{ route('google_redirect') }}">
                    <img src="{{ asset('assets/img/gmail.png') }}" height="20px"/> <span>gmail</span>
                </a>
                <a class="facebook-button mdl-button" href="{{ route('facebook_redirect') }}">
                    <img src="{{ asset('assets/img/facebook.png') }}" height="20px"/> <span>facebook</span>
                </a>
            </div>

            <div class="divide-or">
                <span>Эсвэл</span>
            </div>

            {{ Form::open(['class'=> 'modal-form', 'autocomplete'=> 'off']) }}
                <input type="text" placeholder="Мэйл хаяг" name="email" value="{{ old('email') }}" />
                <input type="password" placeholder="Нууц үг" name="password" />
                <div class="form-button">
                    <button type="submit">Нэвтрэх</button>
                    <button>Бүртгүүлэх</button>
                </div>
            {{ Form::close() }}
            <a href="">Надад нэвтрэх эрх байгаа!</a>
        </div>
    </div>
@endsection

@section('page-js')
    <script>
        var options = {closeButton : true};
        @if(session('error'))
            toastr.error('{{ session('error') }}', 'Error!', options)
        @endif
    </script>
@endsection
