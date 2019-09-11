<template>
    <div>
        <div class="new-filter">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <button type="button" class="btn" :class="category == 'sale' ? 'btn-primary' : 'btn-light'" @click="setCategory('sale')">ХУДАЛДАНА</button>
                        <button type="button" class="btn" :class="category == 'rent' ? 'btn-primary' : 'btn-light'" @click="setCategory('rent')">ТҮРЭЭСЛҮҮЛНЭ</button>
                    </div>
                </div>

                <div class="customs">
                    <div class="custom-basic-select">
                        <div class="custom-select-title" @click="toggleMenuFilter()">
                            Ангилал
                            <div class="selected-value">{{ selected_menu.name }}</div>
                        </div>
                        <div class="custom-select-options" v-show="isOpenMenu">
                            <div class="option" v-for="menu in menus" @click="setMenu(menu)">
                                {{ menu.name }}
                            </div>
                        </div>
                    </div>
                    <div class="custom-basic-select">
                        <div class="custom-select-title" @click="toggleDistrict()">
                            Дүүрэг
                            <div class="selected-value">{{ selected_district.city_name }}</div>
                        </div>
                        <div class="custom-select-options" v-show="isOpenDistrics">
                            <div class="option" v-for="district in districts" @click="setDistricts(district)">
                                {{ district.city_name }}
                            </div>
                        </div>
                    </div>
                    <div class="custom-basic-select">
                        <div class="custom-select-title" @click="togglePoi()">
                            Байршил, Хотхон
                            <div class="selected-value">{{ selected_poi.place_name }}</div>
                        </div>
                        <div class="custom-select-options" v-show="isOpenPoi">
                            <div class="option" v-for="poi in pois" @click="setPoi(poi)">
                                {{ poi.place_name }}
                            </div>
                        </div>
                    </div>
                    <!-- <div class="custom-basic-select">
                        <div class="custom-select-title" @click="togglePriceFilter()">
                            M2, Үнэ
                            <div class="selected-value">
                            {{ size_filters.selected_option.data ? (size_filters.selected_option.data + ' м2 / ') : '' }}
                            {{ price_filters.selected_option.data }} {{ price_filters.selected_option.data ? ' сая': '' }}
                            </div>
                        </div>
                        <div class="custom-select-options" v-show="price_filters.selected_option.is_open">
                            <div class="custom-select-item">
                                <ul>
                                    <li data-id='0' v-for='size in size_filters.data' @click="setSizeFilter(size)">{{ size }} м2</li>
                                </ul>
                                <div class="options" data-id="0">
                                    <div class="option" @click="setPriceFilter(price)" :data-value="price + ' сая'" v-for='price in price_filters.data'>
                                        {{ price }} сая
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div> -->
                </div>
                <div id="lightSlider" class="icon">
                    <div v-for="cur in filter" @click="toggleFilter(cur)">
                        <div class="custom-basic-select icon">
                            <div class="custom-select-title">
                                <div class="icon-container">
                                    <img v-if="cur.type == 'icon'" :src="'/assets/img/icons/' + cur.icon_active + '.png'" alt="">
                                    <p v-html="filterName(cur.category_name)"></p>
                                </div>
                                <div class="selected-value" v-if="cur.selected_option.is_selected">
                                    {{ cur.selected_option.data.option }}
                                </div>
                            </div>

                            <div 
                                class="custom-select-options" 
                                :class="{ single: cur.is_vertical == 'Y'}"
                                v-show="cur.selected_option.is_open"
                            >
                                <div class="">
                                    <div @click="setFilter(cur, option)" v-for="option in cur.options" class="option" :data-value="option.option">
                                        {{ option.option }}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="clear"></div>
                <div class="filter-footer-container">
                    <div class="filter-footer">
                        <div class="advanced-search" data-opens="0">
                            <i class="fa fa-chevron-down"></i>
                            <span>Нарийвчилсан хайлт</span>
                        </div>
                        <div>
                            <b>{{ ads.total }}</b> хайлтын үр дүн байна
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="ad-box-wrap">
                    <div class="ad-box-grid-view">
                        <div class="grid-five">
                            <div class="container">
                                <div class="row">
                                    <div class="grid-container">
                                        <div class="grid-item" v-for="ad in ads.data">
                                            <a :href="'ad/' + ad.slug">
                                                <div class="img-container">
                                                    <img 
                                                        itemprop="image" 
                                                        width="100%" 
                                                        :src="featuredImage(ad)"
                                                        :alt="ad.title"
                                                    />

                                                    <div class="heart">
                                                        <i class="material-icons">
                                                            favorite_border
                                                        </i>
                                                    </div>
                                                    <div class="beds">
                                                        <i class="material-icons">
                                                            hotel
                                                        </i>
                                                        {{ ad.beds }}
                                                    </div>
                                                    <div class="plans">
                                                        <i class="material-icons">
                                                            domain
                                                        </i> {{ ad.floor }}
                                                    </div>
                                                </div>
                                                <h3>{{ ad.title }}</h3>
                                                <p>{{ themeqx_price_ng(ad) }}</p>
                                                <span>{{ ad.square_unit_space + ' ' + (ad.unit_type == 'sqmeter' ? 'м2' : ad.unit_type) }}</span>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-12"v-if="ads.total == 0" style="height: 800px;">
                <div class="container">
                    <p>Хайлтын нөхцөлд таарах үл хөдлөх олдсонгүй</p>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    import axios from 'axios'
    import _ from 'lodash'
    require('./lightslider.min')

    export default {
        data() {
            return {
                category: 'sale',
                filter: [],
                isOpenMenu: false,
                isOpenDistrics: false,
                isOpenPoi: false,
                pois: [],
                menus: [],
                selected_poi: {},
                selected_menu: {},
                selected_district: {},
                districts: [],
                size_filters: {
                    data: ['50-60', '60-70', '70-80', '80-90', '90-100', '100-110', '110-120', '120-130', '130-140', '140-150'],
                    selected_option: {
                        is_open: false,
                        data: '',
                    }
                },
                price_filters: {
                    data: ['1-2', '2-3', '3-4', '4-5', '5-6'],
                    selected_option: {
                        is_open: false,
                        data: '',
                    }
                },
                ads: {
                    fetching: false,
                    data: [],
                    pages: 1,
                    total: 0
                }
            }
        },
        mounted() {
            this.callSlider()
            this.getMenus()
            this.getFilter()
            this.getDatas()
            this.getDistricts()
        },
        methods: {
            togglePriceFilter() {
                this.price_filters.selected_option.is_open = !this.price_filters.selected_option.is_open
            },
            toggleMenuFilter() {
                this.isOpenMenu = !this.isOpenMenu
            },
            toggleDistrict() {
                this.isOpenDistrics = !this.isOpenDistrics
            },
            togglePoi() {
                this.isOpenPoi = !this.isOpenPoi
            },
            toggleFilter(category) {
                let index = _.findIndex(this.filter, (cur) => {
                    return cur.id == category.id
                })

                this.filter.forEach((cur) => {
                    if(cur.id == category.id) {
                        cur.selected_option.is_open = !cur.selected_option.is_open
                    } else 
                        cur.selected_option.is_open = false
                })
            },
            setSizeFilter(data) {
                this.size_filters.selected_option.data = data
                this.size_filters.selected_option.is_open = false

                this.getDatas()
            },
            setPriceFilter(data) {
                this.price_filters.selected_option.data = data
                this.price_filters.selected_option.is_open = false

                this.getDatas()
            },
            setMenu(menu) {
                this.selected_menu = menu
                this.isOpenMenu = false
                this.getFilter()
                this.getDatas()
            },
            setCategory(category) {
                this.category = category
                this.selected_menu = {}
                this.getMenus()
                this.getFilter()
                this.getDatas()
            },
            setDistricts(district) {
                this.selected_district = district
                this.isOpenDistrics = false
                this.getPois()
            },
            setPoi(poi) {
                this.selected_poi = poi
                this.isOpenPoi = false
                this.getDatas()
            },
            setFilter(category, option) {
                let index = _.findIndex(this.filter, (cur) => {
                    return cur.id == category.id
                })

                this.filter[index].selected_option.data = option
                this.filter[index].selected_option.is_selected = true
                this.filter[index].selected_option.is_open = true

                this.getDatas()
            },
            getPois() {
              axios
              .get(`poi/by_district?district=${this.selected_district.id}`)
              .then(res => {
                this.pois = res.data.pois
                this.selected_poi = {}
              })
            },
            getDistricts() {
              axios
              .get('poi/districts')
              .then(res => {
                this.districts = res.data.districts
                this.selected_district = {}
              })
            },
            getMenus() {
              axios
              .get(`menu/search?type=${this.category}`)
              .then(res => {
                this.menus = res.data.menus
                this.selected_menu = {}
                //this.select
              })
            },
            getFilter() {
              let query = {}

              if(!_.isEmpty(this.selected_menu)) {
                 Object.assign(query, {
                    menu_id: this.selected_menu.id
                 })
              }

              axios
              .get('api/category/all', {
                params: query
              })
              .then(res => {
                let filter = []
                res.data.data.forEach((cur) => {
                    filter.push(Object.assign(cur, {
                        selected_option: {
                            is_selected: false,
                            is_open: false,
                            data: {},
                        }
                    }))
                })
                this.filter = filter
                this.callSlider()
              })
            },
            getDatas() {
                let filterParams = []
                this.filter.forEach((cur) => {
                    if(cur.selected_option.is_selected) {
                        filterParams.push({
                            category_id: cur.id,
                            option_id: cur.selected_option.data.id
                        })
                    }
                })

                let query = {
                    filter: filterParams
                }

                if(this.category) {
                    Object.assign(query, {
                        'purpose': this.category
                    })
                }

                if(this.price_filters.selected_option.data) {
                    Object.assign(query, {
                        'price_interval': this.price_filters.selected_option.data
                    })
                }

                if(this.size_filters.selected_option.data) {
                    Object.assign(query, {
                        'size_interval': this.size_filters.selected_option.data
                    })
                }

                if(!_.isEmpty(this.selected_poi)) {
                    Object.assign(query, {
                        'poi_id': this.selected_poi.id
                    })
                }

                if(!_.isEmpty(this.selected_menu)) {
                    Object.assign(query, {
                        'menu_id': this.selected_menu.id
                    })
                }

                axios
                .get('api/ads', {
                    params: query
                })
                .then(res => {                    
                    let { data, total } = res.data.result
                    let ads = []

                    data.forEach((cur) => {
                        if(cur.ad) {
                            ads.push(cur.ad)
                        } else {
                            ads.push(cur)
                        }
                    })

                    this.ads = {
                        fetching: false,
                        data: ads,
                        pages: 1,
                        total,
                    }
                })
            },
            callSlider() {
                $("#lightSlider").lightSlider({
                    pager: false,
                    autoWidth: false,
                    item: 8,
                });
            },
            currencyFormat(num) {
              return parseFloat(num).toFixed(2).replace(/(\d)(?=(\d{3})+(?!\d))/g, '$1,')
              //return num.toFixed(2)
            },
            featuredImage(ad) {
                if(ad.feature_img == null) {
                    if(ad.media_name != null) {
                        return 'uploads/images/thumbs/' + ad.media_name
                    }
                    return ''
                }
                return 'uploads/images/thumbs/' + ad.feature_img.media_name
            },
            filterName(name) {
                let cur = name.trim().split(' ')
                let fixed_name = ''
                cur.forEach((str, index) => {
                    if(index != 0 && index == cur.length - 1) {
                        fixed_name += '<br />' + (str)
                    } else {
                        fixed_name += (' ' + str)
                    }
                    
                })
                return fixed_name
            },
            themeqx_price_ng(ad) {
                let price = ad.price;
                let negotiable = ad.is_negotiable;
                let purpose = (ad.purpose == 'rent') ? ' /month' : '';

                let show_price = '';
                
                if (price > 0) {
                    show_price = 'MNT ' + this.currencyFormat(price);
                }

                return show_price + purpose;
            }
        }
    }
</script>
