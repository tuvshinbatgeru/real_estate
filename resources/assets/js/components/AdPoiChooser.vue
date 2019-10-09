<template>
    <div class="row">
        <div class="form-group">
            <div class="col-sm-4"></div>
            <div class="col-sm-8">
                <select class="form-control" name="district" @change="onDistrictChange($event)">
                    <option value="-1">Бүгд</option>
                    <option :value="district.id" v-for="district in districts">{{ district.city_name }}</option>
                </select>
            </div>
        </div>

        <div class="col-xs-12">
            <table class="table table-bordered">
                <tbody>
                    <tr v-for="poi in filteredPois">
                        <td>
                            <div class="clearfix">
                                <strong>{{ poi.place_name }}</strong>
                            </div>
                        </td>
                        <td>
                            <input
                                type="checkbox" 
                                name="point_of_interests[]"
                                :value="poi.id"
                                :checked="selectedPois.findIndex((cur) => cur.id == poi.id) != -1"
                                @change="onPoiChange($event)"
                            />
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</template>

<script>
    import _ from 'lodash'

    export default {
        props: ['districts', 'pois', 'selected_pois'],
        data: function() {
            return {
                filteredPois: [],
                selectedPois: [],
            }
        },
        mounted() {
            this.filteredPois = this.pois
            this.selectedPois = this.selected_pois
        },
        methods: {
            onPoiChange(event) {
                const poi_id = event.target.value
                let index = this.selectedPois.findIndex((poi) => poi.id == poi_id)
                if(index == -1) {
                    let poi = this.filteredPois.find((poi) => poi.id == poi_id)
                    this.selectedPois.push(poi)
                } else {
                    _.pullAt(this.selectedPois, [index]);
                }
            },
            onDistrictChange(event) {
                const district_id = event.target.value
                if(district_id == -1) {
                    this.filteredPois = this.pois
                    return
                }

                this.filteredPois = this.pois.filter((poi) => {
                    let index = poi.districts.findIndex((dist) => String(dist.id) == String(district_id))
                    return index != -1
                })
            }
        }
    }
</script>
