<template>
    <div id="root">
        <div class="navbar navbar-default">
            <div class="navbar-brand">
                <router-link to="/">NextMedia</router-link>
            </div>
            <ul class="nav navbar-nav navbar-left">
                <li><router-link to="/">Category</router-link></li>
                <li><router-link to="/product">Product</router-link></li>
            </ul>
        </div>
        <router-view></router-view>
    </div>
</template>