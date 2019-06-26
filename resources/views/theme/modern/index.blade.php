@extends('layout.main')

@section('page-css')
    <link rel="stylesheet" href="{{ asset('assets/plugins/owl.carousel/assets/owl.carousel.css') }}">
@endsection

@section('main')
    <div class="main-container">
        <div class="contents">
                <div class="main-top">
                    <div class="container">
                        <div class="row">
                            <div class="top-content">
                                <div class="top-items">
                                    <p>
                                        Хурдан хугацаанд хүссэн байраа<br />
                                        хайгаад төлбөрийн боломжит нөхцөлийг сонгоод
                                    </p>
                                    <h3>
                                        <b class="blue-color">мөрөөдлөө</b> биелүүлээрэй
                                    </h3>
                                    <div class="top-search blue-background">
                                        <div class="row">
                                            <div class="col s12">
                                                <div class="row">
                                                    <div class="input-field col s12">
                                                        <i class="material-icons prefix">zoom_in</i>
                                                        <input type="text" id="autocomplete-input" class="autocomplete">
                                                        <label for="autocomplete-input"> Дүүрэг, Хороо болон хотхоны нэрийг
                                                            оруулна уу
                                                        </label>
                                                    </div>
                                                    <button class="btn waves-effect waves-light blue lighten-5"
                                                        type="submit" name="action">
                                                        <a href="newFilter.html">
                                                            Хайх
                                                        </a>
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="hidden-video">
                                <video autoplay muted>
                                    <source src="{{ asset('assets/video/1.mp4') }}" type="video/mp4">
                                    <source src="{{ asset('assets/video/1.mp4') }}" type="video/ogg">
                                    Your browser does not support HTML5 video.
                                </video>
                            </div>
                            <div class="new-filter home">
                                <div class="customs">
                                    <div class="custom-basic-select">
                                        <div class="custom-select-title">
                                            M2, Үнэ
                                            <div class="selected-value"></div>
                                        </div>
                                        <div class="custom-select-options">
                                            <div class="custom-select-item">
                                                <ul>
                                                    <li data-id='0'>35 - 45 m2</li>
                                                    <li data-id='1'>35 - 45 m2</li>
                                                    <li data-id='2'>35 - 45 m2</li>
                                                    <li data-id='3'>35 - 45 m2</li>
                                                    <li data-id='4'>35 - 45 m2</li>
                                                    <li data-id='5'>35 - 45 m2</li>
                                                    <li data-id='6'>35 - 45 m2</li>
                                                    <li data-id='7'>35 - 45 m2</li>
                                                    <li data-id='8'>35 - 45 m2</li>
                                                </ul>
                                                <div class="options" data-id="0">
                                                    <div class="option" data-value='1-2 сая'>
                                                        1-2 сая
                                                    </div>
                                                    <div class="option" data-value='2-3 сая'>
                                                        2-3 сая
                                                    </div>
                                                    <div class="option" data-value='3-4 сая'>
                                                        3-4 сая
                                                    </div>
                                                    <div class="option" data-value='5-6 сая'>
                                                        5-6 сая
                                                    </div>
                                                </div>
                                                <div class="options" data-id="1">
                                                    <div class="option" data-value='10-20 сая'>
                                                        10-20 сая
                                                    </div>
                                                    <div class="option" data-value='20-30 сая'>
                                                        20-30 сая
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="custom-basic-select">
                                        <div class="custom-select-title">
                                            Дүүрэг, хороо
                                            <div class="selected-value"></div>
                                        </div>
                                        <div class="custom-select-options">
                                            <div class="custom-select-item arrow">
                                                <ul>
                                                    <li data-id='9'>Багануур</li>
                                                    <li data-id='10'>Багахангай</li>
                                                    <li data-id='11'>Баянгол</li>
                                                    <li data-id='12'>Баянзүрх</li>
                                                    <li data-id='13'>Налайх</li>
                                                    <li data-id='14'>Сонгинохайрхан</li>
                                                    <li data-id='15'>Сүхбаатар</li>
                                                    <li data-id='16'>Хан-Уул</li>
                                                    <li data-id='17'>Чингэлтэй</li>
                                                </ul>
                                                <div class="options" data-id="9">
                                                    <div class="option" data-value='1-р хороо'>
                                                        1-р хороо
                                                    </div>
                                                    <div class="option" data-value='2-р хороо'>
                                                        2-р хороо
                                                    </div>
                                                    <div class="option" data-value='3-р хороо'>
                                                        3-р хороо
                                                    </div>
                                                    <div class="option" data-value='4-р хороо'>
                                                        4-р хороо
                                                    </div>
                                                </div>
                                                <div class="options" data-id="10">
                                                    <div class="option" data-value='1-р хороо'>
                                                        1-р хороо
                                                    </div>
                                                    <div class="option" data-value='2-р хороо'>
                                                        2-р хороо
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="custom-basic-select">
                                        <div class="custom-select-title">
                                            Байршил, Хотхон
                                            <div class="selected-value"></div>
                                        </div>
                                        <div class="custom-select-options">
                                            <div class="custom-select-item arrow">
                                                <ul>
                                                    <li data-id='9'>Хүнсний 4 дэлгүүр</li>
                                                    <li data-id='10'>Мэргэжилтний 20</li>
                                                    <li data-id='11'>Оффицеруудын ордон</li>
                                                    <li data-id='12'>Баянзүрх</li>
                                                    <li data-id='13'>Налайх</li>
                                                    <li data-id='14'>Сонгинохайрхан</li>
                                                    <li data-id='15'>Сүхбаатар</li>
                                                    <li data-id='16'>Хан-Уул</li>
                                                    <li data-id='17'>Чингэлтэй</li>
                                                </ul>
                                                <div class="options" data-id="9">
                                                    <div class="option" data-value='1-р хороо'>
                                                        1-р хороо
                                                    </div>
                                                    <div class="option" data-value='2-р хороо'>
                                                        2-р хороо
                                                    </div>
                                                    <div class="option" data-value='3-р хороо'>
                                                        3-р хороо
                                                    </div>
                                                    <div class="option" data-value='4-р хороо'>
                                                        4-р хороо
                                                    </div>
                                                </div>
                                                <div class="options" data-id="10">
                                                    <div class="option" data-value='1-р хороо'>
                                                        1-р хороо
                                                    </div>
                                                    <div class="option" data-value='2-р хороо'>
                                                        2-р хороо
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="custom-basic-select">
                                        <div class="custom-select-title">
                                            <div>
                                                Координат
                                                <!-- <span>Өгөгдөлийг энд оруулна уу!</span> -->
                                            </div>
                                            <div class="selected-value"></div>
                                        </div>
                                        <div class="custom-select-options">
                                            <!-- <div class="custom-select-item"> -->
                                            <div class="option" data-value='35 - 45 m2'>
                                                35 - 45 m2
                                            </div>
                                            <div class="option" data-value='45 - 55 m2'>
                                                35 - 45 m2
                                            </div>
                                            <div class="option" data-value='55 - 65 m2'>
                                                35 - 45 m2
                                            </div>
                                            <div class="option" data-value='55 - 65 m2'>
                                                35 - 45 m2
                                            </div>
                                            <!-- </div> -->
                                        </div>
                                    </div>

                                    <div class="custom-basic-select">
                                        <div class="custom-select-title">
                                            Нүүж ороход бэлэн эсэх
                                            <div class="selected-value"></div>
                                        </div>
                                        <div class="custom-select-options">
                                            <!-- <div class="custom-select-item"> -->
                                            <div class="option" data-value='35 - 45 m2'>
                                                35 - 45 m2
                                            </div>
                                            <div class="option" data-value='45 - 55 m2'>
                                                35 - 45 m2
                                            </div>
                                            <div class="option" data-value='55 - 65 m2'>
                                                35 - 45 m2
                                            </div>
                                            <div class="option" data-value='55 - 65 m2'>
                                                35 - 45 m2
                                            </div>
                                            <!-- </div> -->
                                        </div>
                                    </div>
                                </div>
                                <!-- <div class="filter-item">
                                    <div class="input-field col s12">
                                        <select>
                                            <option value="" disabled selected>Байрны хэмжээ</option>
                                            <option value="1">Option 1</option>
                                            <option value="2">Option 2</option>
                                            <option value="3">Option 3</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="filter-item">
                                    <div class="input-field col s12">
                                        <select>
                                            <option value="" disabled selected>Дүүрэг</option>
                                            <option value="1">Option 1</option>
                                            <option value="2">Option 2</option>
                                            <option value="3">Option 3</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="filter-item">
                                    <div class="input-field col s12">
                                        <select>
                                            <option value="" disabled selected>Үнэлгээ</option>
                                            <option value="1">Option 1</option>
                                            <option value="2">Option 2</option>
                                            <option value="3">Option 3</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="filter-item">
                                    <div class="input-field col s12">
                                        <select>
                                            <option value="" disabled selected>Хотхон</option>
                                            <option value="1">Option 1</option>
                                            <option value="2">Option 2</option>
                                            <option value="3">Option 3</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="filter-item">
                                    <div class="input-field col s12">
                                        <select>
                                            <option value="" disabled selected>Газрын зураг</option>
                                            <option value="1">Option 1</option>
                                            <option value="2">Option 2</option>
                                            <option value="3">Option 3</option>
                                        </select>
                                    </div>
                                </div> -->
                            </div>
                        </div>
                    </div>
                </div>
                <div class="grid-two">
                    <div class="container">
                        <div class="row">
                            <div class="grid-container">
                                <div class="grid-item">
                                    <span class="tag">Шинэ</span>
                                    <h3>City Apartment</h3>
                                    <p>1,500,000₮</p>
                                    <span>34mk<sup>2</sup> - 75mk <sup>2</sup></span>
                                </div>
                                <div class="grid-item">
                                    <span class="tag">Шинэ</span>
                                    <h3>City Apartment</h3>
                                    <p>1,500,000₮</p>
                                    <span>34mk<sup>2</sup> - 75mk <sup>2</sup></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="grid-five">
                    <div class="container">
                        <div class="row">
                            <div class="grid-container">
                                <div class="grid-item">
                                    <a href="detail.html">
                                        <div class="img-container">
                                            <img src="assets/img/k1.png" width="100%">
                                            <div class="heart">
                                                <i class="material-icons">
                                                    favorite_border
                                                </i>
                                            </div>
                                            <div class="beds">
                                                <i class="material-icons">
                                                    hotel
                                                </i>
                                                2
                                            </div>
                                            <div class="plans">
                                                <i class="material-icons">
                                                    domain
                                                </i> 7
                                            </div>
                                        </div>
                                        <h3>City Apartment</h3>
                                        <p>1,500,000₮</p>
                                        <span>34mk<sup>2</sup> - 75mk <sup>2</sup></span>
                                    </a>
                                </div>
                                <div class="grid-item">
                                    <a href="">
                                        <div class="img-container">
                                            <img src="assets/img/k2.png" width="100%">
                                            <div class="heart">
                                                <i class="material-icons">
                                                    favorite_border
                                                </i>
                                            </div>
                                            <div class="beds">
                                                <i class="material-icons">
                                                    hotel
                                                </i>
                                                2
                                            </div>
                                            <div class="plans">
                                                <i class="material-icons">
                                                    domain
                                                </i> 7
                                            </div>
                                        </div>
                                        <h3>City Apartment</h3>
                                        <p>1,500,000₮</p>
                                        <span>34mk<sup>2</sup> - 75mk <sup>2</sup></span>
                                    </a>
                                </div>
                                <div class="grid-item">
                                    <a href="">
                                        <div class="img-container">
                                            <img src="assets/img/k3.png" width="100%">
                                            <div class="heart">
                                                <i class="material-icons">
                                                    favorite_border
                                                </i>
                                            </div>
                                            <div class="beds">
                                                <i class="material-icons">
                                                    hotel
                                                </i>
                                                2
                                            </div>
                                            <div class="plans">
                                                <i class="material-icons">
                                                    domain
                                                </i> 7
                                            </div>
                                        </div>
                                        <h3>City Apartment</h3>
                                        <p>1,500,000₮</p>
                                        <span>34mk<sup>2</sup> - 75mk <sup>2</sup></span>
                                    </a>
                                </div>
                                <div class="grid-item">
                                    <a href="">
                                        <div class="img-container">
                                            <img src="assets/img/k4.png" width="100%">
                                            <div class="heart">
                                                <i class="material-icons">
                                                    favorite_border
                                                </i>
                                            </div>
                                            <div class="beds">
                                                <i class="material-icons">
                                                    hotel
                                                </i>
                                                2
                                            </div>
                                            <div class="plans">
                                                <i class="material-icons">
                                                    domain
                                                </i> 7
                                            </div>
                                        </div>
                                        <h3>City Apartment</h3>
                                        <p>1,500,000₮</p>
                                        <span>34mk<sup>2</sup> - 75mk <sup>2</sup></span>
                                    </a>
                                </div>
                                <div class="grid-item">
                                    <a href="">
                                        <div class="img-container">
                                            <img src="assets/img/k5.png" width="100%">
                                            <div class="heart">
                                                <i class="material-icons">
                                                    favorite_border
                                                </i>
                                            </div>
                                            <div class="beds">
                                                <i class="material-icons">
                                                    hotel
                                                </i>
                                                2
                                            </div>
                                            <div class="plans">
                                                <i class="material-icons">
                                                    domain
                                                </i> 7
                                            </div>
                                        </div>
                                        <h3>City Apartment</h3>
                                        <p>1,500,000₮</p>
                                        <span>34mk<sup>2</sup> - 75mk <sup>2</sup></span>
                                    </a>
                                </div>
                                <div class="grid-item">
                                    <a href="">
                                        <div class="img-container">
                                            <img src="assets/img/k1.png" width="100%">
                                            <div class="heart">
                                                <i class="material-icons">
                                                    favorite_border
                                                </i>
                                            </div>
                                            <div class="beds">
                                                <i class="material-icons">
                                                    hotel
                                                </i>
                                                2
                                            </div>
                                            <div class="plans">
                                                <i class="material-icons">
                                                    domain
                                                </i> 7
                                            </div>
                                        </div>
                                        <h3>City Apartment</h3>
                                        <p>1,500,000₮</p>
                                        <span>34mk<sup>2</sup> - 75mk <sup>2</sup></span>
                                    </a>
                                </div>
                                <div class="grid-item">
                                    <a href="">
                                        <div class="img-container">
                                            <img src="assets/img/k2.png" width="100%">
                                            <div class="heart">
                                                <i class="material-icons">
                                                    favorite_border
                                                </i>
                                            </div>
                                            <div class="beds">
                                                <i class="material-icons">
                                                    hotel
                                                </i>
                                                2
                                            </div>
                                            <div class="plans">
                                                <i class="material-icons">
                                                    domain
                                                </i> 7
                                            </div>
                                        </div>
                                        <h3>City Apartment</h3>
                                        <p>1,500,000₮</p>
                                        <span>34mk<sup>2</sup> - 75mk <sup>2</sup></span>
                                    </a>
                                </div>
                                <div class="grid-item">
                                    <a href="">
                                        <div class="img-container">
                                            <img src="assets/img/k3.png" width="100%">
                                            <div class="heart">
                                                <i class="material-icons">
                                                    favorite_border
                                                </i>
                                            </div>
                                            <div class="beds">
                                                <i class="material-icons">
                                                    hotel
                                                </i>
                                                2
                                            </div>
                                            <div class="plans">
                                                <i class="material-icons">
                                                    domain
                                                </i> 7
                                            </div>
                                        </div>
                                        <h3>City Apartment</h3>
                                        <p>1,500,000₮</p>
                                        <span>34mk<sup>2</sup> - 75mk <sup>2</sup></span>
                                    </a>
                                </div>
                                <div class="grid-item">
                                    <a href="">
                                        <div class="img-container">
                                            <img src="assets/img/k4.png" width="100%">
                                            <div class="heart">
                                                <i class="material-icons">
                                                    favorite_border
                                                </i>
                                            </div>
                                            <div class="beds">
                                                <i class="material-icons">
                                                    hotel
                                                </i>
                                                2
                                            </div>
                                            <div class="plans">
                                                <i class="material-icons">
                                                    domain
                                                </i> 7
                                            </div>
                                        </div>
                                        <h3>City Apartment</h3>
                                        <p>1,500,000₮</p>
                                        <span>34mk<sup>2</sup> - 75mk <sup>2</sup></span>
                                    </a>
                                </div>
                                <div class="grid-item">
                                    <a href="">
                                        <div class="img-container">
                                            <img src="assets/img/k5.png" width="100%">
                                            <div class="heart">
                                                <i class="material-icons">
                                                    favorite_border
                                                </i>
                                            </div>
                                            <div class="beds">
                                                <i class="material-icons">
                                                    hotel
                                                </i>
                                                2
                                            </div>
                                            <div class="plans">
                                                <i class="material-icons">
                                                    domain
                                                </i> 7
                                            </div>
                                        </div>
                                        <h3>City Apartment</h3>
                                        <p>1,500,000₮</p>
                                        <span>34mk<sup>2</sup> - 75mk <sup>2</sup></span>
                                    </a>
                                </div>
                                <div class="grid-item">
                                    <a href="">
                                        <div class="img-container">
                                            <img src="assets/img/k1.png" width="100%">
                                            <div class="heart">
                                                <i class="material-icons">
                                                    favorite_border
                                                </i>
                                            </div>
                                            <div class="beds">
                                                <i class="material-icons">
                                                    hotel
                                                </i>
                                                2
                                            </div>
                                            <div class="plans">
                                                <i class="material-icons">
                                                    domain
                                                </i> 7
                                            </div>
                                        </div>
                                        <h3>City Apartment</h3>
                                        <p>1,500,000₮</p>
                                        <span>34mk<sup>2</sup> - 75mk <sup>2</sup></span>
                                    </a>
                                </div>
                                <div class="grid-item">
                                    <a href="">
                                        <div class="img-container">
                                            <img src="assets/img/k2.png" width="100%">
                                            <div class="heart">
                                                <i class="material-icons">
                                                    favorite_border
                                                </i>
                                            </div>
                                            <div class="beds">
                                                <i class="material-icons">
                                                    hotel
                                                </i>
                                                2
                                            </div>
                                            <div class="plans">
                                                <i class="material-icons">
                                                    domain
                                                </i> 7
                                            </div>
                                        </div>
                                        <h3>City Apartment</h3>
                                        <p>1,500,000₮</p>
                                        <span>34mk<sup>2</sup> - 75mk <sup>2</sup></span>
                                    </a>
                                </div>
                                <div class="grid-item">
                                    <a href="">
                                        <div class="img-container">
                                            <img src="assets/img/k3.png" width="100%">
                                            <div class="heart">
                                                <i class="material-icons">
                                                    favorite_border
                                                </i>
                                            </div>
                                            <div class="beds">
                                                <i class="material-icons">
                                                    hotel
                                                </i>
                                                2
                                            </div>
                                            <div class="plans">
                                                <i class="material-icons">
                                                    domain
                                                </i> 7
                                            </div>
                                        </div>
                                        <h3>City Apartment</h3>
                                        <p>1,500,000₮</p>
                                        <span>34mk<sup>2</sup> - 75mk <sup>2</sup></span>
                                    </a>
                                </div>
                                <div class="grid-item">
                                    <a href="">
                                        <div class="img-container">
                                            <img src="assets/img/k4.png" width="100%">
                                            <div class="heart">
                                                <i class="material-icons">
                                                    favorite_border
                                                </i>
                                            </div>
                                            <div class="beds">
                                                <i class="material-icons">
                                                    hotel
                                                </i>
                                                2
                                            </div>
                                            <div class="plans">
                                                <i class="material-icons">
                                                    domain
                                                </i> 7
                                            </div>
                                        </div>
                                        <h3>City Apartment</h3>
                                        <p>1,500,000₮</p>
                                        <span>34mk<sup>2</sup> - 75mk <sup>2</sup></span>
                                    </a>
                                </div>
                                <div class="grid-item">
                                    <a href="">
                                        <div class="img-container">
                                            <img src="assets/img/k5.png" width="100%">
                                            <div class="heart">
                                                <i class="material-icons">
                                                    favorite_border
                                                </i>
                                            </div>
                                            <div class="beds">
                                                <i class="material-icons">
                                                    hotel
                                                </i>
                                                2
                                            </div>
                                            <div class="plans">
                                                <i class="material-icons">
                                                    domain
                                                </i> 7
                                            </div>
                                        </div>
                                        <h3>City Apartment</h3>
                                        <p>1,500,000₮</p>
                                        <span>34mk<sup>2</sup> - 75mk <sup>2</sup></span>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="grid-two">
                    <div class="container">
                        <div class="row">
                            <div class="grid-container">
                                <div class="grid-item">
                                    <span class="tag">Шинэ</span>
                                    <h3>City Apartment</h3>
                                    <p>1,500,000₮</p>
                                    <span>34mk<sup>2</sup> - 75mk <sup>2</sup></span>
                                </div>
                                <div class="grid-item">
                                    <span class="tag">Шинэ</span>
                                    <h3>City Apartment</h3>
                                    <p>1,500,000₮</p>
                                    <span>34mk<sup>2</sup> - 75mk <sup>2</sup></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="grid-five">
                    <div class="container">
                        <div class="row">
                            <div class="grid-container">
                                <div class="grid-item">
                                    <a href="">
                                        <div class="img-container">
                                            <img src="assets/img/k1.png" width="100%">
                                            <div class="heart">
                                                <i class="material-icons">
                                                    favorite_border
                                                </i>
                                            </div>
                                            <div class="beds">
                                                <i class="material-icons">
                                                    hotel
                                                </i>
                                                2
                                            </div>
                                            <div class="plans">
                                                <i class="material-icons">
                                                    domain
                                                </i> 7
                                            </div>
                                        </div>
                                        <h3>City Apartment</h3>
                                        <p>1,500,000₮</p>
                                        <span>34mk<sup>2</sup> - 75mk <sup>2</sup></span>
                                    </a>
                                </div>
                                <div class="grid-item">
                                    <a href="">
                                        <div class="img-container">
                                            <img src="assets/img/k2.png" width="100%">
                                            <div class="heart">
                                                <i class="material-icons">
                                                    favorite_border
                                                </i>
                                            </div>
                                            <div class="beds">
                                                <i class="material-icons">
                                                    hotel
                                                </i>
                                                2
                                            </div>
                                            <div class="plans">
                                                <i class="material-icons">
                                                    domain
                                                </i> 7
                                            </div>
                                        </div>
                                        <h3>City Apartment</h3>
                                        <p>1,500,000₮</p>
                                        <span>34mk<sup>2</sup> - 75mk <sup>2</sup></span>
                                    </a>
                                </div>
                                <div class="grid-item">
                                    <a href="">
                                        <div class="img-container">
                                            <img src="assets/img/k3.png" width="100%">
                                            <div class="heart">
                                                <i class="material-icons">
                                                    favorite_border
                                                </i>
                                            </div>
                                            <div class="beds">
                                                <i class="material-icons">
                                                    hotel
                                                </i>
                                                2
                                            </div>
                                            <div class="plans">
                                                <i class="material-icons">
                                                    domain
                                                </i> 7
                                            </div>
                                        </div>
                                        <h3>City Apartment</h3>
                                        <p>1,500,000₮</p>
                                        <span>34mk<sup>2</sup> - 75mk <sup>2</sup></span>
                                    </a>
                                </div>
                                <div class="grid-item">
                                    <a href="">
                                        <div class="img-container">
                                            <img src="assets/img/k4.png" width="100%">
                                            <div class="heart">
                                                <i class="material-icons">
                                                    favorite_border
                                                </i>
                                            </div>
                                            <div class="beds">
                                                <i class="material-icons">
                                                    hotel
                                                </i>
                                                2
                                            </div>
                                            <div class="plans">
                                                <i class="material-icons">
                                                    domain
                                                </i> 7
                                            </div>
                                        </div>
                                        <h3>City Apartment</h3>
                                        <p>1,500,000₮</p>
                                        <span>34mk<sup>2</sup> - 75mk <sup>2</sup></span>
                                    </a>
                                </div>
                                <div class="grid-item">
                                    <a href="">
                                        <div class="img-container">
                                            <img src="assets/img/k5.png" width="100%">
                                            <div class="heart">
                                                <i class="material-icons">
                                                    favorite_border
                                                </i>
                                            </div>
                                            <div class="beds">
                                                <i class="material-icons">
                                                    hotel
                                                </i>
                                                2
                                            </div>
                                            <div class="plans">
                                                <i class="material-icons">
                                                    domain
                                                </i> 7
                                            </div>
                                        </div>
                                        <h3>City Apartment</h3>
                                        <p>1,500,000₮</p>
                                        <span>34mk<sup>2</sup> - 75mk <sup>2</sup></span>
                                    </a>
                                </div>
                                <div class="grid-item">
                                    <a href="">
                                        <div class="img-container">
                                            <img src="assets/img/k1.png" width="100%">
                                            <div class="heart">
                                                <i class="material-icons">
                                                    favorite_border
                                                </i>
                                            </div>
                                            <div class="beds">
                                                <i class="material-icons">
                                                    hotel
                                                </i>
                                                2
                                            </div>
                                            <div class="plans">
                                                <i class="material-icons">
                                                    domain
                                                </i> 7
                                            </div>
                                        </div>
                                        <h3>City Apartment</h3>
                                        <p>1,500,000₮</p>
                                        <span>34mk<sup>2</sup> - 75mk <sup>2</sup></span>
                                    </a>
                                </div>
                                <div class="grid-item">
                                    <a href="">
                                        <div class="img-container">
                                            <img src="assets/img/k2.png" width="100%">
                                            <div class="heart">
                                                <i class="material-icons">
                                                    favorite_border
                                                </i>
                                            </div>
                                            <div class="beds">
                                                <i class="material-icons">
                                                    hotel
                                                </i>
                                                2
                                            </div>
                                            <div class="plans">
                                                <i class="material-icons">
                                                    domain
                                                </i> 7
                                            </div>
                                        </div>
                                        <h3>City Apartment</h3>
                                        <p>1,500,000₮</p>
                                        <span>34mk<sup>2</sup> - 75mk <sup>2</sup></span>
                                    </a>
                                </div>
                                <div class="grid-item">
                                    <a href="">
                                        <div class="img-container">
                                            <img src="assets/img/k3.png" width="100%">
                                            <div class="heart">
                                                <i class="material-icons">
                                                    favorite_border
                                                </i>
                                            </div>
                                            <div class="beds">
                                                <i class="material-icons">
                                                    hotel
                                                </i>
                                                2
                                            </div>
                                            <div class="plans">
                                                <i class="material-icons">
                                                    domain
                                                </i> 7
                                            </div>
                                        </div>
                                        <h3>City Apartment</h3>
                                        <p>1,500,000₮</p>
                                        <span>34mk<sup>2</sup> - 75mk <sup>2</sup></span>
                                    </a>
                                </div>
                                <div class="grid-item">
                                    <a href="">
                                        <div class="img-container">
                                            <img src="assets/img/k4.png" width="100%">
                                            <div class="heart">
                                                <i class="material-icons">
                                                    favorite_border
                                                </i>
                                            </div>
                                            <div class="beds">
                                                <i class="material-icons">
                                                    hotel
                                                </i>
                                                2
                                            </div>
                                            <div class="plans">
                                                <i class="material-icons">
                                                    domain
                                                </i> 7
                                            </div>
                                        </div>
                                        <h3>City Apartment</h3>
                                        <p>1,500,000₮</p>
                                        <span>34mk<sup>2</sup> - 75mk <sup>2</sup></span>
                                    </a>
                                </div>
                                <div class="grid-item">
                                    <a href="">
                                        <div class="img-container">
                                            <img src="assets/img/k5.png" width="100%">
                                            <div class="heart">
                                                <i class="material-icons">
                                                    favorite_border
                                                </i>
                                            </div>
                                            <div class="beds">
                                                <i class="material-icons">
                                                    hotel
                                                </i>
                                                2
                                            </div>
                                            <div class="plans">
                                                <i class="material-icons">
                                                    domain
                                                </i> 7
                                            </div>
                                        </div>
                                        <h3>City Apartment</h3>
                                        <p>1,500,000₮</p>
                                        <span>34mk<sup>2</sup> - 75mk <sup>2</sup></span>
                                    </a>
                                </div>
                                <div class="grid-item">
                                    <a href="">
                                        <div class="img-container">
                                            <img src="assets/img/k1.png" width="100%">
                                            <div class="heart">
                                                <i class="material-icons">
                                                    favorite_border
                                                </i>
                                            </div>
                                            <div class="beds">
                                                <i class="material-icons">
                                                    hotel
                                                </i>
                                                2
                                            </div>
                                            <div class="plans">
                                                <i class="material-icons">
                                                    domain
                                                </i> 7
                                            </div>
                                        </div>
                                        <h3>City Apartment</h3>
                                        <p>1,500,000₮</p>
                                        <span>34mk<sup>2</sup> - 75mk <sup>2</sup></span>
                                    </a>
                                </div>
                                <div class="grid-item">
                                    <a href="">
                                        <div class="img-container">
                                            <img src="assets/img/k2.png" width="100%">
                                            <div class="heart">
                                                <i class="material-icons">
                                                    favorite_border
                                                </i>
                                            </div>
                                            <div class="beds">
                                                <i class="material-icons">
                                                    hotel
                                                </i>
                                                2
                                            </div>
                                            <div class="plans">
                                                <i class="material-icons">
                                                    domain
                                                </i> 7
                                            </div>
                                        </div>
                                        <h3>City Apartment</h3>
                                        <p>1,500,000₮</p>
                                        <span>34mk<sup>2</sup> - 75mk <sup>2</sup></span>
                                    </a>
                                </div>
                                <div class="grid-item">
                                    <a href="">
                                        <div class="img-container">
                                            <img src="assets/img/k3.png" width="100%">
                                            <div class="heart">
                                                <i class="material-icons">
                                                    favorite_border
                                                </i>
                                            </div>
                                            <div class="beds">
                                                <i class="material-icons">
                                                    hotel
                                                </i>
                                                2
                                            </div>
                                            <div class="plans">
                                                <i class="material-icons">
                                                    domain
                                                </i> 7
                                            </div>
                                        </div>
                                        <h3>City Apartment</h3>
                                        <p>1,500,000₮</p>
                                        <span>34mk<sup>2</sup> - 75mk <sup>2</sup></span>
                                    </a>
                                </div>
                                <div class="grid-item">
                                    <a href="">
                                        <div class="img-container">
                                            <img src="assets/img/k4.png" width="100%">
                                            <div class="heart">
                                                <i class="material-icons">
                                                    favorite_border
                                                </i>
                                            </div>
                                            <div class="beds">
                                                <i class="material-icons">
                                                    hotel
                                                </i>
                                                2
                                            </div>
                                            <div class="plans">
                                                <i class="material-icons">
                                                    domain
                                                </i> 7
                                            </div>
                                        </div>
                                        <h3>City Apartment</h3>
                                        <p>1,500,000₮</p>
                                        <span>34mk<sup>2</sup> - 75mk <sup>2</sup></span>
                                    </a>
                                </div>
                                <div class="grid-item">
                                    <a href="">
                                        <div class="img-container">
                                            <img src="assets/img/k5.png" width="100%">
                                            <div class="heart">
                                                <i class="material-icons">
                                                    favorite_border
                                                </i>
                                            </div>
                                            <div class="beds">
                                                <i class="material-icons">
                                                    hotel
                                                </i>
                                                2
                                            </div>
                                            <div class="plans">
                                                <i class="material-icons">
                                                    domain
                                                </i> 7
                                            </div>
                                        </div>
                                        <h3>City Apartment</h3>
                                        <p>1,500,000₮</p>
                                        <span>34mk<sup>2</sup> - 75mk <sup>2</sup></span>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
        </div>
    </div>

    @if($enable_monetize)
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    {!! get_option('monetize_code_below_categories') !!}
                </div>
            </div>
        </div>
    @endif

    @if($urgent_ads->count() > 0)
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <div class="carousel-header">
                        <h4><a href="{{ route('listing') }}">
                                @lang('app.new_urgent_ads')
                            </a>
                        </h4>
                    </div>
                    <hr />
                    <div class="themeqx_new_regular_ads_wrap themeqx-carousel-ads">
                        @foreach($urgent_ads as $ad)
                            <div>
                                <div itemscope itemtype="http://schema.org/Product" class="ads-item-thumbnail ad-box-{{$ad->price_plan}}">
                                    <div class="ads-thumbnail">
                                        <a href="{{ route('single_ad', $ad->slug) }}">
                                            <img itemprop="image"  src="{{ media_url($ad->feature_img) }}" class="img-responsive" alt="{{ $ad->title }}">

                                            @if($ad->purpose)
                                                <span class="modern-sale-rent-indicator">
                                                    {{ ucfirst($ad->purpose) }}
                                                </span>
                                            @endif

                                            <span class="modern-img-indicator">
                                                @if(! empty($ad->video_url))
                                                    <i class="fa fa-file-video-o"></i>
                                                @else
                                                    <i class="fa fa-file-image-o"> {{ $ad->media_img->count() }}</i>
                                                @endif
                                            </span>
                                        </a>
                                    </div>
                                    <div class="caption">
                                        <h4><a href="{{ route('single_ad', $ad->slug) }}" title="{{ $ad->title }}"><span itemprop="name">{{ str_limit($ad->title, 40) }} </span></a></h4>

                                        <p class="price"> <span itemprop="price" content="{{$ad->price}}"> {{ themeqx_price_ng($ad) }} </span></p>

                                        <table class="table table-responsive property-box-info">

                                            @if($ad->city)
                                                <tr>
                                                    <td> <a class="location text-muted" href="{{ route('listing', ['city' => $ad->city->id]) }}"> <i class="fa fa-map-marker"></i> {{ $ad->city->city_name }} </a>
                                                    </td>
                                                    <td> <p class="date-posted text-muted"> <i class="fa fa-clock-o"></i> {{ $ad->created_at->diffForHumans() }}</p> </td>
                                                </tr>
                                            @endif

                                            <tr>
                                                <td> <i class="fa fa-building"></i> {{ ucfirst($ad->type) }} </td>
                                                <td><i class="fa fa-arrows-alt "></i>  {{ $ad->square_unit_space.' '.$ad->unit_type }}</td>
                                            </tr>

                                            @if($ad->beds)
                                                <tr>
                                                    <td><i class="fa fa-bed"></i> {{ $ad->beds.' '.trans('app.bedrooms') }}</td>
                                                    <td> {{ $ad->floor.' '.trans('app.floor') }} </td>
                                                </tr>
                                            @endif

                                        </table>

                                    </div>

                                    @if($ad->price_plan == 'premium')
                                        <div class="ribbon-wrapper-green"><div class="ribbon-green">{{ ucfirst($ad->price_plan) }}</div></div>
                                    @endif
                                    @if($ad->mark_ad_urgent == '1')
                                        <div class="ribbon-wrapper-red"><div class="ribbon-red">@lang('app.urgent')</div></div>
                                    @endif
                                </div>
                            </div>
                        @endforeach
                    </div> <!-- themeqx_new_premium_ads_wrap -->
                </div>
            </div>
        </div>
    @endif

    @if($premium_ads->count() > 0)
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <div class="carousel-header">
                        <h4><a href="{{ route('listing') }}">
                                @lang('app.new_premium_ads')
                            </a>
                        </h4>
                    </div>
                    <hr />
                    <div class="themeqx_new_regular_ads_wrap themeqx-carousel-ads">
                        @foreach($premium_ads as $ad)
                            <div>
                                <div itemscope itemtype="http://schema.org/Product" class="ads-item-thumbnail ad-box-{{$ad->price_plan}}">
                                    <div class="ads-thumbnail">
                                        <a href="{{ route('single_ad', $ad->slug) }}">
                                            <img itemprop="image"  src="{{ media_url($ad->feature_img) }}" class="img-responsive" alt="{{ $ad->title }}">

                                            @if($ad->purpose)
                                                <span class="modern-sale-rent-indicator">
                                                    {{ ucfirst($ad->purpose) }}
                                                </span>
                                            @endif

                                            <span class="modern-img-indicator">
                                                @if(! empty($ad->video_url))
                                                    <i class="fa fa-file-video-o"></i>
                                                @else
                                                    <i class="fa fa-file-image-o"> {{ $ad->media_img->count() }}</i>
                                                @endif
                                            </span>
                                        </a>
                                    </div>
                                    <div class="caption">
                                        <h4><a href="{{ route('single_ad', $ad->slug) }}" title="{{ $ad->title }}"><span itemprop="name">{{ str_limit($ad->title, 40) }} </span></a></h4>

                                        <p class="price"> <span itemprop="price" content="{{$ad->price}}"> {{ themeqx_price_ng($ad) }} </span></p>

                                        <table class="table table-responsive property-box-info">

                                            @if($ad->city)
                                                <tr>
                                                    <td> <a class="location text-muted" href="{{ route('listing', ['city' => $ad->city->id]) }}"> <i class="fa fa-map-marker"></i> {{ $ad->city->city_name }} </a>
                                                    </td>
                                                    <td> <p class="date-posted text-muted"> <i class="fa fa-clock-o"></i> {{ $ad->created_at->diffForHumans() }}</p> </td>
                                                </tr>
                                            @endif

                                            <tr>
                                                <td> <i class="fa fa-building"></i> {{ ucfirst($ad->type) }} </td>
                                                <td><i class="fa fa-arrows-alt "></i>  {{ $ad->square_unit_space.' '.$ad->unit_type }}</td>
                                            </tr>

                                            @if($ad->beds)
                                                <tr>
                                                    <td><i class="fa fa-bed"></i> {{ $ad->beds.' '.trans('app.bedrooms') }}</td>
                                                    <td> {{ $ad->floor.' '.trans('app.floor') }} </td>
                                                </tr>
                                            @endif

                                        </table>

                                    </div>

                                    @if($ad->price_plan == 'premium')
                                        <div class="ribbon-wrapper-green"><div class="ribbon-green">{{ ucfirst($ad->price_plan) }}</div></div>
                                    @endif
                                    @if($ad->mark_ad_urgent == '1')
                                        <div class="ribbon-wrapper-red"><div class="ribbon-red">@lang('app.urgent')</div></div>
                                    @endif
                                </div>
                            </div>
                        @endforeach
                    </div> <!-- themeqx_new_premium_ads_wrap -->
                </div>

            </div>
        </div>
        @if($enable_monetize)
            <div class="container">
                <div class="row">
                    <div class="col-sm-12">
                        {!! get_option('monetize_code_below_premium_ads') !!}
                    </div>
                </div>
            </div>
        @endif
    @endif

    @if($regular_ads->count() > 0)

        <div class="container">
            <div class="row">

                <div class="col-sm-12">

                    <div class="carousel-header">
                        <h4><a href="{{ route('listing') }}">
                                @lang('app.new_regular_ads')
                            </a>
                        </h4>
                    </div>
                    <hr />

                    <div class="themeqx_new_premium_ads_wrap themeqx-carousel-ads">
                        @foreach($regular_ads as $ad)
                            <div>
                                <div itemscope itemtype="http://schema.org/Product" class="ads-item-thumbnail ad-box-{{$ad->price_plan}}">
                                    <div class="ads-thumbnail">
                                        <a href="{{ route('single_ad', $ad->slug) }}">
                                            <img itemprop="image"  src="{{ media_url($ad->feature_img) }}" class="img-responsive" alt="{{ $ad->title }}">

                                            @if($ad->purpose)
                                                <span class="modern-sale-rent-indicator">
                                                    {{ ucfirst($ad->purpose) }}
                                                </span>
                                            @endif

                                            <span class="modern-img-indicator">
                                                @if(! empty($ad->video_url))
                                                    <i class="fa fa-file-video-o"></i>
                                                @else
                                                    <i class="fa fa-file-image-o"> {{ $ad->media_img->count() }}</i>
                                                @endif
                                            </span>
                                        </a>
                                    </div>
                                    <div class="caption">
                                        <h4><a href="{{ route('single_ad', $ad->slug) }}" title="{{ $ad->title }}"><span itemprop="name">{{ str_limit($ad->title, 40) }} </span></a></h4>

                                        <p class="price"> <span itemprop="price" content="{{$ad->price}}"> {{ themeqx_price_ng($ad) }} </span></p>

                                        <table class="table table-responsive property-box-info">

                                            @if($ad->city)
                                                <tr>
                                                    <td> <a class="location text-muted" href="{{ route('listing', ['city' => $ad->city->id]) }}"> <i class="fa fa-map-marker"></i> {{ $ad->city->city_name }} </a>
                                                    </td>
                                                    <td> <p class="date-posted text-muted"> <i class="fa fa-clock-o"></i> {{ $ad->created_at->diffForHumans() }}</p> </td>
                                                </tr>
                                            @endif

                                            <tr>
                                                <td> <i class="fa fa-building"></i> {{ ucfirst($ad->type) }} </td>
                                                <td><i class="fa fa-arrows-alt "></i>  {{ $ad->square_unit_space.' '.$ad->unit_type }}</td>
                                            </tr>

                                            @if($ad->beds)
                                                <tr>
                                                    <td><i class="fa fa-bed"></i> {{ $ad->beds.' '.trans('app.bedrooms') }}</td>
                                                    <td> {{ $ad->floor.' '.trans('app.floor') }} </td>
                                                </tr>
                                            @endif

                                        </table>

                                    </div>

                                    @if($ad->price_plan == 'premium')
                                        <div class="ribbon-wrapper-green"><div class="ribbon-green">{{ ucfirst($ad->price_plan) }}</div></div>
                                    @endif
                                    @if($ad->mark_ad_urgent == '1')
                                        <div class="ribbon-wrapper-red"><div class="ribbon-red">@lang('app.urgent')</div></div>
                                    @endif
                                </div>
                            </div>
                        @endforeach
                    </div> <!-- themeqx_new_premium_ads_wrap -->
                </div>

            </div>
        </div>

    @endif

    @if($enable_monetize)
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    {!! get_option('monetize_code_below_regular_ads') !!}
                </div>
            </div>
        </div>
    @endif
@endsection

@section('page-js')
    <script src="{{ asset('assets/plugins/owl.carousel/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('assets/lib/thumb/js/lightslider.js') }}"></script>
    <script src="{{ asset('assets/js/fitler.js') }}"></script>
    <script>
        $(document).ready(function(){
            $(".themeqx_new_premium_ads_wrap").owlCarousel({
                loop: true,
                autoplay:true,
                autoplayTimeout:3000,
                margin:10,
                autoplayHoverPause : true,
                responsiveClass:true,
                responsive:{
                    0:{
                        items:1,
                        nav:true,
                        loop:true
                    },
                    600:{
                        items:3,
                        nav:false,
                        loop:true
                    },
                    1000:{
                        items:4,
                        nav:true,
                        loop:true
                    }
                },
                navText : ['<i class="fa fa-arrow-circle-o-left"></i>','<i class="fa fa-arrow-circle-o-right"></i>']
            });
        });

        $(document).ready(function(){
            $(".themeqx_new_regular_ads_wrap").owlCarousel({
                loop: true,
                autoplay : true,
                autoplayTimeout : 2000,
                margin:10,
                autoplayHoverPause : true,
                responsiveClass:true,
                responsive:{
                    0:{
                        items:1,
                        nav:true,
                        loop:true
                    },
                    600:{
                        items:3,
                        nav:false,
                        loop:true
                    },
                    1000:{
                        items:4,
                        nav:true,
                        loop:true
                    }
                },
                navText : ['<i class="fa fa-arrow-circle-o-left"></i>','<i class="fa fa-arrow-circle-o-right"></i>']
            });
        });
        $(document).ready(function(){
            $(".home-latest-blog").owlCarousel({
                loop: true,
                autoplay : true,
                autoplayTimeout : 3000,
                margin:10,
                autoplayHoverPause : true,
                responsiveClass:true,
                responsive:{
                    0:{
                        items:1,
                        nav:true,
                        loop:true
                    },
                    600:{
                        items:3,
                        nav:false,
                        loop:true
                    },
                    1000:{
                        items:4,
                        nav:true,
                        loop:true
                    }
                },
                navText : ['<i class="fa fa-arrow-circle-o-left"></i>','<i class="fa fa-arrow-circle-o-right"></i>']
            });
        });

    </script>
    <script>
        function generate_option_from_json(jsonData, fromLoad){
            //Load Category Json Data To Brand Select
            if(fromLoad === 'country_to_state'){
                var option = '';
                if (jsonData.length > 0) {
                    option += '<option value="" selected> @lang('app.select_state') </option>';
                    for ( i in jsonData){
                        option += '<option value="'+jsonData[i].id+'"> '+jsonData[i].state_name +' </option>';
                    }
                    $('#state_select').html(option);
                    $('#state_select').select2();
                }else {
                    $('#state_select').html('<option value="" selected> @lang('app.select_state') </option>');
                    $('#state_select').select2();
                }
                $('#loaderListingIcon').hide('slow');
            }
        }

        $(window).scroll(function () {
            var topPos = $(this).scrollTop();
            if (topPos > 30) {
                $('header').addClass('scrolled')
            } else {
                $('header').removeClass('scrolled')
            }
        });

        $(document).ready(function(){
            $('[name="country"]').change(function(){
                var country_id = $(this).val();
                $('#loaderListingIcon').show();
                $.ajax({
                    type : 'POST',
                    url : '{{ route('get_state_by_country') }}',
                    data : { country_id : country_id,  _token : '{{ csrf_token() }}' },
                    success : function (data) {
                        generate_option_from_json(data, 'country_to_state');
                    }
                });
            });
        });
    </script>
@endsection