<template>
    <div>
        <div class="form-group">
            <label for="value_type" class="col-sm-4 control-label">Утгын төрөл сонгох</label>
            <div class="col-sm-8">
                <select @change="onValueTypeChange()" class="form-control" name="value_type" id="value_type" v-model="selected_value_type">
                    <option value="chooser">Сонгодог</option>
                    <option value="plain">Оруулдаг</option>
                </select>
            </div>
        </div>

        <div v-show="selected_value_type == 'chooser'">
            <label>Сонголт нэмэх</label>

            <div class="form-group" v-for="(option, index) in category_options">
                <div class="col-sm-8">
                    <input 
                        type="text" 
                        class="form-control" 
                        id="category_option" 
                        value="" 
                        name="category_option[]"
                        placeholder=""
                    />
                </div>
                <div class="col-sm-4">
                    <a class="btn btn-danger btn-xs" @click="deleteOption(index)"><i class="fa fa-trash"></i> </a>
                </div>
            </div>
            <button type="button" class="btn btn-primary" @click="addNewOption">Сонголт нэмэх</button>
        </div>
    </div>
</template>

<script>
    import _ from 'lodash'
    export default {
        data() {
            return {
                category_options: [''],
                selected_value_type: 'chooser'
            }
        },
        methods: {
            onValueTypeChange: function(event) {
                console.log(this.selected_value_type)
            },
            addNewOption: function() {
                this.category_options.push('')
            },
            deleteOption: function(index) {
                console.log(index)
                this.$delete(this.category_options, index)
                //this.category_options.splice(index, 1);
            }
        },
        mounted() {
            console.log('Component ready.')
        }
    }
</script>
