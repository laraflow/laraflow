<script setup>
import {useStore} from "vuex";

const store = useStore();

import Footer from "@/Layouts/Components/Footer.vue";
import Header from "@/Layouts/Components/Header.vue";
import Setting from "@/Layouts/Components/Setting.vue";
import Sidebar from "@/Layouts/Components/Sidebar.vue";
</script>

<template>
    <div>
        <Header/>
        <div class="main-container" id="container"
             :class="[!$store.state.is_show_sidebar ? 'sidebar-closed sbar-open' : '', $store.state.menu_style === 'collapsible-vertical' ? 'collapsible-vertical-mobile' : '']">
            <div class="overlay" :class="{ show: !$store.state.is_show_sidebar }"
                 @click="$store.commit('toggleSideBar', !$store.state.is_show_sidebar)"></div>
            <div class="search-overlay" :class="{ show: $store.state.is_show_search }"
                 @click="$store.commit('toggleSearch', !$store.state.is_show_search)"></div>
            <Sidebar/>
            <div id="content" class="main-content">
                <slot/>
                <Footer/>
            </div>
            <Setting/>
        </div>
    </div>
</template>

<style lang="scss">
</style>
