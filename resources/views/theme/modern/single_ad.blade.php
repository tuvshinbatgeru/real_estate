@extends('layout.main-layout')
@section('title') @if( ! empty($title)) {{ $title }} | @endif @parent @endsection

@section('social-meta')
    <meta property="og:title" content="{{ $ad->title }}">
    <meta property="og:description" content="{{ substr(trim(preg_replace('/\s\s+/', ' ',strip_tags($ad->description) )),0,160) }}">
    @if($ad->media_img->first())
        <meta property="og:image" content="{{ media_url($ad->media_img->first(), true) }}">
    @else
        <meta property="og:image" content="{{ asset('uploads/placeholder.png') }}">
    @endif
    <meta property="og:url" content="{{ route('single_ad', $ad->slug) }}">
    <meta name="twitter:card" content="summary_large_image">
    <!--  Non-Essential, But Recommended -->
    <meta name="og:site_name" content="{{ get_option('site_name') }}">
@endsection

@section('page-css')
    <link rel="stylesheet" href="{{ asset('assets/plugins/fotorama-4.6.4/fotorama.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/plugins/owl.carousel/assets/owl.carousel.css') }}">
@endsection

@section('main')
    <div>
        <div class="main-container">
            <div class="detail">
                <div class="container">
                    <div class="detail-container">
                        <div class="detail-images">
                            @if( ! empty($ad->video_url))
                                <div style="border-radius: 10px; margin-bottom: 20px; overflow: hidden;">
                                <?php
                                $video_url = $ad->video_url;
                                if (strpos($video_url, 'youtube') > 0) {
                                    preg_match("/^(?:http(?:s)?:\/\/)?(?:www\.)?(?:m\.)?(?:youtu\.be\/|youtube\.com\/(?:(?:watch)?\?(?:.*&)?v(?:i)?=|(?:embed|v|vi|user)\/))([^\?&\"'>]+)/", $video_url, $matches);
                                    if ( ! empty($matches[1])){
                                        echo '<div class="embed-responsive embed-responsive-16by9"><iframe class="embed-responsive-item" src="https://www.youtube.com/embed/'.$matches[1].'" frameborder="0" allowfullscreen></iframe></div>';
                                    }
                                } elseif (strpos($video_url, 'vimeo') > 0) {
                                    if (preg_match('%^https?:\/\/(?:www\.|player\.)?vimeo.com\/(?:channels\/(?:\w+\/)?|groups\/([^\/]*)\/videos\/|album\/(\d+)\/video\/|video\/|)(\d+)(?:$|\/|\?)(?:[?]?.*)$%im', $video_url, $regs)) {
                                        if (!empty($regs[3])){
                                            echo '<div class="embed-responsive embed-responsive-16by9"><iframe class="embed-responsive-item" src="https://player.vimeo.com/video/'.$regs[3].'" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe></div>';
                                        }
                                    }
                                }
                                ?>
                                </div>
                            @endif

                            @foreach($ad->media_img as $img)
                                <img src="{{ media_url($img, true) }}" alt="{{ $ad->title }}" width="100%">
                            @endforeach      

                            <div class="map-info">
                                <div class="border">
                                    <h3>Байршил</h3>
                                    <div id="dvMap" style="width: 100%; height: 400px; margin: 20px 0;"></div>
                                </div>
                            </div>                      
                        </div>
                        <div class="detail-info">
                            <div class="border">
                                <button class="loan-trigger" data-toggle="modal" data-target="#loanmodal" style="margin-top: 0px; margin-bottom: 25px;">Зээлийн хүсэлт</button>
                                <div class="name-price">
                                    <div class="name">
                                        <span>{{ $ad->title }}</span>
                                        <p>{{ themeqx_price_ng($ad) }}</p>
                                        <b>
                                            <span>{{ $ad->square_unit_space . ($ad->unit_type == 'sqmeter' ? 'м2' : $ad->unit_type) }} / {{ $ad->beds }} өрөө байр</span>
                                        </b><br />
                                        
                                        <b>{!! $ad->full_address() !!}</b>
                                    </div>
                                    <div class="icons">
                                        <i class="material-icons">favorite_border</i>
                                        <i class="material-icons">share</i>
                                    </div>
                                </div>
                                <div class="tags">
                                    <div class="tag bgrey" data-toggle="modal" data-target="#tagmodal">
                                        2018 онд бариглсан
                                    </div>
                                    <div class="tag bgrey">
                                        Захиалагч
                                    </div>
                                    <div class="tag bgrey">
                                        Гүйцэтгэгч
                                    </div>
                                    <div class="tag bgrey">
                                        Хийцлэл
                                    </div>
                                    <div class="tag bgrey">
                                        12 давхар барилга
                                    </div>
                                    <div class="tag bgrey">
                                        Гадна фасад
                                    </div>
                                    <div class="tag bgrey">
                                        Тэсвэртэй баллын хэмжээ
                                    </div>
                                    <div class="tag bgrey">
                                        Цахилгаан шатны тоо
                                    </div>
                                    <div class="tag bblue" data-toggle="modal" data-target="#tagmodal1">
                                        Таазны өндөр
                                    </div>
                                    <div class="tag bblue">
                                        Цонхны хэмжээ
                                    </div>
                                    <div class="tag bblue">
                                        Таазны өндөр
                                    </div>
                                    <div class="tag bblue">
                                        Цонхны хэмжээ
                                    </div>
                                    <div class="tag bblue">
                                        Таазны өндөр
                                    </div>
                                    <div class="tag bblue">
                                        Цонхны хэмжээ
                                    </div>
                                    <div class="tag bblue">
                                        Таазны өндөр
                                    </div>
                                    <div class="tag bblue">
                                        Цонхны хэмжээ
                                    </div>

                                    <div class="tag bgreen">
                                        Цонхны хэмжээ
                                    </div>
                                    <div class="tag bgreen">
                                        Таазны өндөр
                                    </div>
                                    <div class="tag bgreen">
                                        Цонхны хэмжээ
                                    </div>
                                    <div class="tag bgreen">
                                        Таазны өндөр
                                    </div>
                                    <div class="tag bgreen">
                                        Цонхны хэмжээ
                                    </div>

                                    <div class="tag bblack">
                                        Цонхны хэмжээ
                                    </div>
                                    <div class="tag bblack">
                                        Таазны өндөр
                                    </div>
                                    <div class="tag bblack">
                                        Цонхны хэмжээ
                                    </div>
                                    <div class="tag bblack">
                                        Таазны өндөр
                                    </div>
                                    <div class="tag bblack">
                                        Цонхны хэмжээ
                                    </div>
                                </div>
                            </div>
                            <div class="border">
                                <h3>Бүрдүүлэх бичиг баримтууд</h3>
                                <ul>
                                    <li>
                                        <span>#</span> Зээлийн хүсэлт
                                    </li>
                                    <li>
                                        <span>#</span> Иргэний үнэмлэх
                                    </li>
                                    <li>
                                        <span>#</span> 1 хувь цээж зураг
                                    </li>
                                    <li>
                                        <span>#</span> Оршин суугаа хорооны тодорхойлолт
                                    </li>
                                    <li>
                                        <span>#</span> Нийгмийн даатгалын дэвтэр
                                    </li>
                                    <li>
                                        <span>#</span> Ажлын газрын тодорхойлолт
                                    </li>
                                    <li>
                                        <span>#</span> Хөдөлмөрийн гэрээ
                                    </li>
                                    <li>
                                        <span>#</span> Хувиараа бизнес эрхэлдэг бол бизнесийн үйл ажиллагаатай
                                        холбоотой бичиг баримтууд
                                    </li>
                                    <li>
                                        <span>#</span> Өрхийн орлогыг баталгаажуулах бичиг баримт
                                    </li>
                                </ul>
                                <a href="" data-toggle="modal" data-target="#docsmodal" style="text-decoration: underline !important;">
                                    Дэлгэрэнгүй
                                </a>
                                <button data-toggle="modal" class="loan-trigger" data-target="#loanmodal">Зээлийн хүсэлт</button>
                            </div>
                            <div class="border">
                                <div class="agent-header">
                                    <div class="agent-pro">
                                        <img src="{{ $ad->user->get_gravatar() }}" style="width: 50px; height: 50px; background: #333; border-radius: 50%;" />
                                        <div class="agent-name">
                                            <p>{{ $ad->user->name }}</p>
                                            <span>агент</span>
                                        </div>
                                    </div>
                                    <div class="agent-phone">
                                        <i class="material-icons">local_phone</i> {{ $ad->user->phone }}
                                    </div>
                                </div>
                                <div class="agent-image">
                                    @foreach($related_ads as $rad)
                                        <a href="{{ route('single_ad', $rad->slug) }}">
                                            <img height="100" width="100" style="object-fit: cover;" src="{{ media_url($rad->feature_img) }}">
                                        </a>
                                    @endforeach
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="loanmodal" tabindex="-1" role="dialog" aria-labelledby="loanmodalLabel"
        aria-hidden="true">
        <div class="modal-dialog big" role="document">
            <div class="modal-content">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <div class="modal-body">
                    <div class="col-md-12" id="loan">

                        <div class="profile-container step1">
                            <div class="form-step">
                                <div class="steps">
                                    <div class="step active">
                                        1
                                    </div>
                                    <div class="step">
                                        2
                                    </div>
                                </div>
                            </div>
                            <div class="profile-top">
                                <img src="{{ asset('assets/img/loan.png') }}">
                                <p>
                                    <b style="color: #000; font-size: 17px;">Баяр хүргэе</b><br />
                                    Та зээл авах боломжтой бөгөөд нэмэлт мэдээллүүдийг бөглөсөнөөр манай
                                    зээлийн<br />
                                    үйлчилгээнд хамрагдахад илүү хялбар болох болно.
                                </p>
                            </div>
                            <div class="profile-form " data-step='1'>
                                <div class="row">
                                    <form class="custom-form col s12 loan">
                                        <div class="row">
                                            <div class="input-field col s4">
                                                <i class="material-icons prefix">₮</i>
                                                <input id="icon_prefix" type="text" class="validate"
                                                    value="159,000,000">
                                                <label for="icon_prefix">Зээлийн хэмжээ</label>
                                            </div>
                                            <div class="input-field col s4">
                                                <i class="material-icons prefix">%</i>
                                                <input id="icon_telephone" type="tel" class="validate"
                                                    value="₮ 39,000,000">
                                                <label for="icon_telephone"> Урьдчилгаа</label>
                                            </div>
                                            <div class="input-field col s4">
                                                <select>
                                                    <option value="1">Тийм</option>
                                                    <option value="2">Үгүй</option>
                                                </select>
                                                <label>Нийгмийн даатгал</label>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="input-field col s4">
                                                <i class="material-icons prefix">₮</i>
                                                <input id="icon_prefix" type="text" class="validate" value="1,500,000">
                                                <label for="icon_prefix">Өрхийн орлого</label>
                                            </div>
                                            <div class="input-field col s4">
                                                <i class="material-icons prefix">₮</i>
                                                <input id="icon_telephone" type="tel" class="validate"
                                                    value="₮ 700,000">
                                                <label for="icon_telephone">Өрхийн зарлага</label>
                                            </div>
                                            <div class="input-field col s4">
                                                <select>
                                                    <option value="1">Тийм</option>
                                                    <option value="2">Үгүй</option>
                                                </select>
                                                <label>Зээлтэй эсэх</label>
                                            </div>
                                        </div>
                                        <a class="active loan-step">Үргэлжлүүлэх</a>
                                        <!-- <button>Цуцлах</button> -->
                                    </form>
                                </div>
                            </div>
                        </div>

                        <div class="profile-container step2">
                            <div class="form-step">
                                <div class="steps">
                                    <div class="step">
                                        1
                                    </div>
                                    <div class="step active">
                                        2
                                    </div>
                                </div>
                            </div>
                            <div class="profile-top">
                                <img src="{{ asset('assets/img/loan2.png') }}">
                                <p>
                                    Та хувийн мэдээллээ үнэн зөв бөглөнө үү
                                </p>
                            </div>
                            <div class="profile-form " data-step='1'>
                                <div class="row">
                                    <form class="custom-form col s12 loan">
                                        <div class="row">
                                            <div class="input-field col s4">
                                                <input id="icon_prefix" type="text" class="validate" value="Баярцогт">
                                                <label for="icon_prefix">Овог</label>
                                            </div>
                                            <div class="input-field col s4">
                                                <input id="icon_telephone" type="tel" class="validate" value="Мандах">
                                                <label for="icon_telephone">Нэр</label>
                                            </div>
                                            <div class="input-field col s4">
                                                <input id="icon_telephone" type="tel" class="validate"
                                                    value="НХ99880099">
                                                <label for="icon_telephone">Регистерийн дугаар</label>
                                            </div>
                                        </div>
                                        <a class="active loan-step1">Үргэлжлүүлэх</a>
                                    </form>
                                </div>
                            </div>
                        </div>

                        <div class="profile-container step3">
                            <div class="form-step">
                                <div class="steps">
                                    <div class="step">
                                        1
                                    </div>
                                    <div class="step">
                                        2
                                    </div>
                                </div>
                            </div>
                            <div class="profile-top">
                                <img src="{{ asset('assets/img/loan3.png') }}">
                                <p>
                                    Таны зээлийн хүсэлт амжилттай илгээгдсэн. <br />
                                    Хүсэлтийн хариу 7-14 хоногийн дараа ирэх ба <br />
                                    танд мэйлээр мэдэгдэх болно.

                                </p>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="docsmodal" tabindex="-1" role="dialog" aria-labelledby="docsmodalLabel"
        aria-hidden="true">
        <div class="modal-dialog big" role="document">
            <div class="modal-content">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <div class="modal-body">
                    <div class="profile-container">
                        <div class="profile-document">
                            <h3>
                                Та мөрөөдлийн байраа авахад юу бүрдүүлэх талаармэдэхгүй байвал анхаарлаа
                                хандуулаарай
                            </h3>
                            <div class="doc-items">
                                <div class="four">
                                    <div class="doc-item">
                                        <img src="{{ asset('assets/img/doc1.png') }}" >
                                        <b>Иргэний үнэмлэх </b>
                                        <p>
                                            Эх хувийг нотариатаар гэрчлүүлсэн хувилбарын хамт.
                                        </p>
                                    </div>
                                    <div class="doc-item">
                                        <img src="{{ asset('assets/img/doc2.png') }}">
                                        <b>1 хувь цээж зураг</b>
                                        <p>
                                            Хамтран зээл гаргуулах бол мөн адил хамтрагчийн цээж зураг.
                                        </p>
                                    </div>
                                    <div class="doc-item">
                                        <img src="{{ asset('assets/img/doc3.png') }}">
                                        <b>Оршин суугаа хорооны тодорхойлолт</b>
                                        <p>
                                            Төрийн үйлчилгээний цахим машин буюу ТҮЦ машинаас авах боломжтой.
                                        </p>
                                    </div>
                                    <div class="doc-item">
                                        <img src="{{ asset('assets/img/doc4.png') }}">
                                        <b>Нийгмийн даатгал төлсөн эсэх тодорхойлолт </b>
                                        <p>
                                            Төрийн үйлчилгээний цахим машин буюу ТҮЦ машинаас авах боломжтой.
                                        </p>
                                    </div>
                                </div>
                                <div class="three">
                                    <div class="doc-item">
                                        <img src="{{ asset('assets/img/doc5.png') }}">
                                        <b>Ажлын газрын тодорхойлолт</b>
                                        <p>
                                            Албан тушаал, ажилласан жил, цалингийн хэмжээ, нэмэгдэл урамшууллыг
                                            тусгах.
                                        </p>
                                    </div>
                                    <div class="doc-item">
                                        <img src="{{ asset('assets/img/doc6.png') }}">
                                        <b>Хөдөлмөрийн гэрээ</b>
                                        <p>

                                            Ажил олгогч танд гаргаж өгөх ёстой.
                                        </p>
                                    </div>
                                    <div class="doc-item">
                                        <img src="{{ asset('assets/img/doc7.png') }}">
                                        <b>Хувиараа бизнес эрхэлдэг бол бизнесийн үйл ажиллагаатай холбоотой
                                            бичиг
                                            баримтууд</b>
                                        <p>
                                            Бизнесийн үйл ажиллагааг тайлбарласан товч материал, сүүлийн 1-2
                                            жилийн
                                            санхүүгийн мэдээлэл бүхий бичиг баримт.
                                        </p>
                                    </div>
                                </div>
                                <div class="two">
                                    <div class="doc-item">
                                        <img src="{{ asset('assets/img/doc8.png') }}">
                                        <b>Өрхийн орлогыг баталгаажуулах бичиг баримт Банкны гүйлгээний хуулга
                                            гэх
                                            мэт нотлох баримтууд</b>
                                        <p>
                                            Өрхийн гишүүний цалингийн тодорхойлолт. Өрхийн гишүүн нь хувиараа
                                            бизнес
                                            эрхлэгч бол No.6 тай адил бичиг баримт.
                                        </p>
                                    </div>
                                    <div class="doc-item">
                                        <img src="{{ asset('assets/img/doc9.png') }}">
                                        <b>Өрхийн гишүүдийн нэр дээр УБЕГазраас орон сууц үл хөдлөх хөрөнгө
                                            эзэмшдэг
                                            эсэх лавлагаа</b>
                                        <p>
                                            Төрийн үйлчилгээний цахим машин буюу ТҮЦ машинаас авах боломжтой.
                                        </p>
                                    </div>
                                    <div class="doc-item">
                                        <img src="{{ asset('assets/img/doc10.png') }}">
                                        <b>Гэрлэлтийн гэрчилгээний хуулбар эсвэл гэрлэсэн эсэх лавлагаа</b>
                                        <p>
                                            Төрийн үйлчилгээний цахим машин буюу ТҮЦ машинаас авах боломжтой.
                                        </p>
                                    </div>
                                    <div class="doc-item">
                                        <img src="{{ asset('assets/img/doc11.png') }}">
                                        <b>Бусад банк, ББСБ-д төлөх зээлийн үлдэгдэлтэй бол тухайн зээлийн
                                            гэрээ,
                                            зээлийн дансны хуулга</b>
                                        <p>
                                            Төрийн үйлчилгээний цахим машин буюу ТҮЦ машинаас авах боломжтой.
                                        </p>
                                    </div>
                                    <div class="doc-item">
                                        <img src="{{ asset('assets/img/doc12.png') }}">
                                        <b>Зээлийн барьцаанд тавигдсан эсэх талаарх үл хөдлөх хөрөнгийн
                                            лавлагаа</b>
                                        <p>

                                            Төрийн үйлчилгээний цахим машин буюу ТҮЦ машинаас авах боломжтой.
                                        </p>
                                    </div>
                                    <div class="doc-item">
                                        <img src="{{ asset('assets/img/doc13.png') }}" />
                                        <b>ШШГЕГ-аас өр, төлбөртэй эсэх талаарх тодорхойлолт</b>
                                        <p>
                                            Төрийн үйлчилгээний цахим машин буюу ТҮЦ машинаас авах боломжтой.
                                        </p>
                                    </div>
                                    <div class="doc-item">
                                        <img src="{{ asset('assets/img/doc14.png') }}" />
                                        <b>Барьцаанд тавих үл хөдлөх хөрөнгө байгаа бол түүний гэрчилгээ</b>
                                        <p>
                                            Зээлийн хүсэлт гаргахад барьцаанд тавих үл хөдлөх байгаа бол, тухайн
                                            үл
                                            хөдлөхийн гэрчилгээний эх хувь.
                                        </p>
                                    </div>
                                    <div class="doc-item">
                                        <img src="{{ asset('assets/img/doc15.png') }}" />
                                        <b>Урьдчилгаа төлбөрийн баримт Банкны гүйлгээний хуулга гэх мэт нотлох
                                            баримтууд</b>
                                        <p>
                                            Урьдчилгаа төлсөн мөнгөн дүнгийн баримт
                                        </p>
                                    </div>
                                    <div class="doc-item">
                                        <img src="{{ asset('assets/img/doc16.png') }}" />
                                        <b>Шинээр ашиглалтад орсон барилгаас худалдан авах бол орон сууцны
                                            захиалгын
                                            гэрээ</b>
                                    </div>
                                    <div class="doc-item">
                                        <img src="{{ asset('assets/img/doc17.png') }}" />
                                        <b>Хуучин орон сууц худалдан авах бол орон сууц худалдах худалдан авах
                                            гэрээ, орон сууцны өмчлөх эрхийн гэрчилгээний хуулбар, барьцаанд буй
                                            эсэх УБЕГазрын лавлагаа</b>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="reportAdModal" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">@lang('app.report_ad_title')</h4>
                </div>
                <div class="modal-body">

                    <p>@lang('app.report_ad_description')</p>

                    <form>

                        <div class="form-group">
                            <label class="control-label">@lang('app.reason'):</label>
                            <select class="form-control" name="reason">
                                <option value="">@lang('app.select_a_reason')</option>
                                <option value="unavailable">@lang('app.item_sold_unavailable')</option>
                                <option value="fraud">@lang('app.fraud')</option>
                                <option value="duplicate">@lang('app.duplicate')</option>
                                <option value="spam">@lang('app.spam')</option>
                                <option value="wrong_category">@lang('app.wrong_category')</option>
                                <option value="offensive">@lang('app.offensive')</option>
                                <option value="other">@lang('app.other')</option>
                            </select>

                            <div id="reason_info"></div>
                        </div>

                        <div class="form-group">
                            <label class="control-label">@lang('app.email'):</label>
                            <input type="text" class="form-control" id="email" name="email">
                            <div id="email_info"></div>

                        </div>
                        <div class="form-group">
                            <label for="message-text" class="control-label">@lang('app.message'):</label>
                            <textarea class="form-control" id="message" name="message"></textarea>
                            <div id="message_info"></div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">@lang('app.close')</button>
                    <button type="button" class="btn btn-primary" id="report_ad">@lang('app.report_ad')</button>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('page-js')

    <script src="https://maps.googleapis.com/maps/api/js?key={{get_option('google_map_api_key')}}&libraries=places&callback=initMap" async defer></script>
    <script type="text/javascript">
        function initMap() {
            var myLatLng = {lat: {{$ad->latitude}}, lng: {{$ad->longitude}} };

            var map = new google.maps.Map(document.getElementById('dvMap'), {
                center: myLatLng,
                zoom: 15
            });
            var marker = new google.maps.Marker({
                position: myLatLng,
                map: map,
                title: '{{$ad->title}}'
            });
            marker.setMap(map);
        }

    </script>

    <script src="{{ asset('assets/plugins/fotorama-4.6.4/fotorama.js') }}"></script>
    <script src="{{ asset('assets/plugins/SocialShare/SocialShare.js') }}"></script>
    <script src="{{ asset('assets/plugins/owl.carousel/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/form-validator/form-validator.min.js') }}"></script>

    <script>
        $('.share').ShareLink({
            title: '{{ $ad->title }}', // title for share message
            text: '{{ substr(trim(preg_replace('/\s\s+/', ' ',strip_tags($ad->description) )),0,160) }}', // text for share message

            @if($ad->media_img->first())
            image: '{{ media_url($ad->media_img->first(), true) }}', // optional image for share message (not for all networks)
            @else
            image: '{{ asset('uploads/placeholder.png') }}', // optional image for share message (not for all networks)
            @endif
            url: '{{ route('single_ad', $ad->slug) }}', // link on shared page
            class_prefix: 's_', // optional class prefix for share elements (buttons or links or everything), default: 's_'
            width: 640, // optional popup initial width
            height: 480 // optional popup initial height
        })
    </script>
    <script>
        $.validate();
    </script>
    <script>
        $(document).ready(function(){
            document.addEventListener('DOMContentLoaded', function() {
                var elems = document.querySelectorAll('select');
                var instances = M.FormSelect.init(elems, options);
            })

            $('.loan-trigger').on('click', function(e) {
                $('.step1').show();
                $('.step2').hide();
                $('.step3').hide();
            })

            $('.loan-step').on('click', function (e) {
                e.preventDefault();
                $('.step1').hide();
                $('.step2').show();
            });

            $('.loan-step1').on('click', function (e) {
                e.preventDefault();
                $('.step2').hide();
                $('.step3').show();
                $('.steps').hide();
            });

            $(".themeqx_new_regular_ads_wrap").owlCarousel({
                loop:true,
                margin:10,
                responsiveClass:true,
                responsive:{
                    0:{
                        items:1,
                        nav:true
                    },
                    600:{
                        items:3,
                        nav:false
                    },
                    1000:{
                        items:4,
                        nav:true,
                        loop:false
                    }
                },
                navText : ['<i class="fa fa-arrow-circle-o-left"></i>','<i class="fa fa-arrow-circle-o-right"></i>']
            });
        });
    </script>
    <script>
        $(function(){
            $('#onClickShowPhone').click(function(){
                $('#ShowPhoneWrap').html('<i class="fa fa-phone"></i> {{ $ad->seller_phone }}');
            });

            $('#save_as_favorite').click(function(){
                var selector = $(this);
                var slug = selector.data('slug');

                $.ajax({
                    type : 'POST',
                    url : '{{ route('save_ad_as_favorite') }}',
                    data : { slug : slug, action: 'add',  _token : '{{ csrf_token() }}' },
                    success : function (data) {
                        if (data.status == 1){
                            selector.html(data.msg);
                        }else {
                            if (data.redirect_url){
                                location.href= data.redirect_url;
                            }
                        }
                    }
                });
            });

            $('button#report_ad').click(function(){
                var reason = $('[name="reason"]').val();
                var email = $('[name="email"]').val();
                var message = $('[name="message"]').val();
                var regex = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;

                var error = 0;
                if(reason.length < 1){
                    $('#reason_info').html('<p class="text-danger">Reason required</p>');
                    error++;
                }else {
                    $('#reason_info').html('');
                }
                if(email.length < 1){
                    $('#email_info').html('<p class="text-danger">Email required</p>');
                    error++;
                }else {
                    if ( ! regex.test(email)){
                        $('#email_info').html('<p class="text-danger">Valid email required</p>');
                        error++;
                    }else {
                        $('#email_info').html('');
                    }
                }
                if(message.length < 1){
                    $('#message_info').html('<p class="text-danger">Message required</p>');
                    error++;
                }else {
                    $('#message_info').html('');
                }

                if (error < 1){
                    $('#loadingOverlay').show();
                    $.ajax({
                        type : 'POST',
                        url : '{{ route('report_ads_pos') }}',
                        data : { reason : reason, email: email,message:message, slug:'{{ $ad->slug }}',  _token : '{{ csrf_token() }}' },
                        success : function (data) {
                            if (data.status == 1){
                                toastr.success(data.msg, '@lang('app.success')', toastr_options);
                            }else {
                                toastr.error(data.msg, '@lang('app.error')', toastr_options);
                            }
                            $('#reportAdModal').modal('hide');
                            $('#loadingOverlay').hide();
                        }
                    });
                }
            });

            $('#replyByEmailForm').submit(function(e){
                e.preventDefault();
                var reply_email_form_data = $(this).serialize();

                $('#loadingOverlay').show();
                $.ajax({
                    type : 'POST',
                    url : '{{ route('reply_by_email_post') }}',
                    data : reply_email_form_data,
                    success : function (data) {
                        if (data.status == 1){
                            toastr.success(data.msg, '@lang('app.success')', toastr_options);
                        }else {
                            toastr.error(data.msg, '@lang('app.error')', toastr_options);
                        }
                        $('#replyByEmail').modal('hide');
                        $('#loadingOverlay').hide();
                    }
                });
            });

            $(document).on('change past keyup', '#embedded_width', function(){
                var width = $(this).val();
                var height = $('#embedded_height').val();
                $('iframe').css('width', width+'px');

                var iframe_code = '<iframe src="http://localhost/real-estate/source/embedded/2-beds-nice-apertment-in-ny-united-states" style="border:0;width:'+width+'px;height:'+height+'px;"></iframe> ';

                $('#embedded_code').val(iframe_code);
            });
            $(document).on('change past keyup', '#embedded_height', function(){
                var height = $(this).val();
                var width = $('#embedded_width').val();
                $('iframe').css('height', height+'px');

                var iframe_code = '<iframe src="http://localhost/real-estate/source/embedded/2-beds-nice-apertment-in-ny-united-states" style="border:0;width:'+width+'px;height:'+height+'px;"></iframe> ';

                $('#embedded_code').val(iframe_code);
            });

        });
    </script>

@endsection