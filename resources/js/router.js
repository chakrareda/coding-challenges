import Vue from 'vue'
import VueRouter from 'vue-router'

import CategoryIndex from "./views/category/index.vue";
import CategoryForm from "./views/category/form.vue";
import CategoryShow from "./views/category/show.vue";

import ProductIndex from "./views/product/index.vue";
import ProductForm from "./views/product/form.vue";
import ProductShow from "./views/product/show.vue";



Vue.use(VueRouter)

const router = new VueRouter({
    routes: [
        {path: '/', component: CategoryIndex},
        {path: '/category/create', component: CategoryForm},
        {path: '/category/:id/edit', component: CategoryForm, meta: {mode: 'edit'}},
        {path: '/category/:id', component:CategoryShow },

        {path: '/product', component: ProductIndex},
        {path: '/product/create', component: ProductForm},
        {path: '/product/:id/edit', component: ProductForm, meta: {mode: 'edit'}},
        {path: '/product/:id', component: ProductShow},

      
    ]
})

export default router