<template>
    <div class="panel panel-default">
        <div class="panel-heading">
            {{title}}
        </div>
        <div class="panel-body">
            <form class="form" @submit.prevent="save">
                <div class="row">
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label>Category</label>
                            <select class="form-control" v-model="form.category_id">
                                <option>Select</option>
                                <option v-for="category in option.categories" :value="category.id">
                                    {{category.name}} / {{category.name}}
                                </option>
                            </select>
                            <small class="text-danger" v-if="errors.category_id">{{errors.category_id[0]}}</small>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label>name</label>
                            <input type="text" class="form-control" v-model="form.name">
                            <small class="text-danger" v-if="errors.name">{{errors.name[0]}}</small>
                        </div>
                        <div class="form-group">
                            <label>description</label>
                            <input type="text" class="form-control" v-model="form.description">
                            <small class="text-danger" v-if="errors.description">{{errors.description[0]}}</small>
                        </div>
                        <div class="form-group">
                            <label>price</label>
                            <input type="text" class="form-control" v-model="form.price">
                            <small class="text-danger" v-if="errors.price">{{errors.price[0]}}</small>
                        </div>
                        <div class="form-group">
                            <label>image</label>
                            <input type="file" class="form-control" >
                            <small class="text-danger" v-if="errors.image">{{errors.image[0]}}</small>
                        </div>
                    </div>
                   
                </div>

                <button class="btn btn-success">Save</button>
            </form>
        </div>
    </div>
</template>
<script>
    import Vue from 'vue'
    import axios from 'axios'
    export default {
        name: 'ProductForm',
        data() {
            return {
                form: {
                    items: []
                },
                errors: {},
                option: {
                    categories: []
                },
                title: 'Create',
                initialize: '/api/product/create',
                redirect: '/product',
                store: '/api/product',
                method: 'post'
            }
        },
        beforeMount() {
            if(this.$route.meta.mode === 'edit') {
                this.title = 'Edit'
                this.initialize = '/api/product/' + this.$route.params.id + '/edit'
                this.store = '/api/product/' + this.$route.params.id
                this.method = 'put'
            }
            this.fetchData()
        },
        watch: {
            '$route': 'fetchData'
        },
        computed: {
            subTotal() {
                return this.form.items.reduce(function(carry, item) {
                    return carry + parseFloat(item.qty) * parseFloat(item.unit_price)
                }, 0)
            },
            total() {
                return this.subTotal - parseFloat(this.form.discount)
            }
        },
        methods: {
            
            fetchData() {
                var vm = this
                axios.get(this.initialize)
                    .then(function(response) {
                        Vue.set(vm.$data, 'form', response.data.form)
                        Vue.set(vm.$data, 'option', response.data.option)
                    })
                    .catch(function(error) {
                        console.log(error)
                    })
            },
            save() {
                var vm = this
                axios[this.method](this.store, this.form)
                    .then(function(response) {
                        if(response.data.saved) {
                            vm.$router.push(vm.redirect)
                        }
                    })
                    .catch(function(error) {
                        Vue.set(vm.$data, 'errors', error.response.data)
                    })
            }
        }
    }
</script>