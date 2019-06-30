<template>
    <div>
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
</template>

<script>
    import _ from 'lodash'
    export default {
        data() {
            return {
                category_options: ['']
            }
        },
        methods: {
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
