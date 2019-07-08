<template>
    <div>
        <div class="new-filter">
            <div class="container">
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
                                                <span>{{ ad.square_unit_space + ' ' + ad.unit_type }}</span>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
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
                filter: [],
                ads: {
                    fetching: false,
                    data: [],
                    pages: 1,
                    total: 0
                }
            }
        },
        mounted() {
            $("#lightSlider").lightSlider({
                pager: false
            });
            this.getFilter()
            this.getDatas()
        },
        methods: {
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
            setFilter(category, option) {
                let index = _.findIndex(this.filter, (cur) => {
                    return cur.id == category.id
                })

                this.filter[index].selected_option.data = option
                this.filter[index].selected_option.is_selected = true
                this.filter[index].selected_option.is_open = true

                this.getDatas()
            },
            getFilter() {
                axios
              .get('api/category/all')
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
              })
            },
            getDatas() {
                let query = {}
                let filterParams = []
                this.filter.forEach((cur) => {
                    if(cur.selected_option.is_selected) {
                        filterParams.push({
                            category_id: cur.id,
                            option_id: cur.selected_option.data.id
                        })
                    }
                })

                //console.log(filterParams)

                axios
                .get('api/ads', {
                    params: {
                        filter: filterParams
                    }
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
            currencyFormat(num) {
              return parseFloat(num).toFixed(2).replace(/(\d)(?=(\d{3})+(?!\d))/g, '$1,')
              //return num.toFixed(2)
            },
            featuredImage(ad) {
                if(ad.feature_img == null) return ''
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
