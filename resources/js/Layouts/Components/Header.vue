<script setup>
import {Link} from "@inertiajs/vue3";
import {useStore} from 'vuex';
import Logo from "@/Layouts/Components/Logo.vue";
import ModeSwitcher from "@/Layouts/Components/ModeSwitcher.vue";
import LangSwitcher from "@/Layouts/Components/LangSwitcher.vue";
import UserDropDown from "@/Layouts/Components/UserDropDown.vue";
import NotificationDropDown from "@/Layouts/Components/NotificationDropDown.vue";
import TopNavigation from "@/Layouts/Components/TopNavigation.vue";

const store = useStore();
</script>

<template>
    <div>
        <div class="header-container fixed-top">
            <header class="header navbar navbar-expand-sm">
                <Logo/>
                <div class="d-none horizontal-menu">
                    <a href="javascript:void(0);" class="sidebarCollapse" data-placement="bottom"
                       @click="$store.commit('toggleSideBar', !$store.state.is_show_sidebar)">
                        <svg
                            xmlns="http://www.w3.org/2000/svg"
                            width="24"
                            height="24"
                            viewBox="0 0 24 24"
                            fill="none"
                            stroke="currentColor"
                            stroke-width="2"
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            class="feather feather-menu"
                        >
                            <line x1="3" y1="12" x2="21" y2="12"></line>
                            <line x1="3" y1="6" x2="21" y2="6"></line>
                            <line x1="3" y1="18" x2="21" y2="18"></line>
                        </svg>
                    </a>
                </div>
                <ul class="navbar-item flex-row ms-md-0 ms-auto">
                    <li class="nav-item align-self-center search-animated"
                        :class="{ 'show-search': $store.state.is_show_search }">
                        <svg
                            @click="$store.commit('toggleSearch', !$store.state.is_show_search)"
                            xmlns="http://www.w3.org/2000/svg"
                            width="24"
                            height="24"
                            viewBox="0 0 24 24"
                            fill="none"
                            stroke="currentColor"
                            stroke-width="2"
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            class="feather feather-search toggle-search"
                        >
                            <circle cx="11" cy="11" r="8"></circle>
                            <line x1="21" y1="21" x2="16.65" y2="16.65"></line>
                        </svg>
                        <form class="form-inline search-full form-inline search"
                              :class="{ 'input-focused': $store.state.is_show_search }">
                            <div class="search-bar">
                                <input type="text" class="form-control search-form-control ms-lg-auto"
                                       placeholder="Search..."/>
                            </div>
                        </form>
                    </li>
                </ul>
                <div class="navbar-item flex-row ms-md-auto">
                    <!--                    <ModeSwitcher/>-->
                    <LangSwitcher/>
                    <NotificationDropDown/>
                    <UserDropDown/>
                </div>
            </header>
        </div>
        <div class="sub-header-container">
            <header class="header navbar navbar-expand-sm">
                <a href="javascript:void(0);" class="sidebarCollapse" data-placement="bottom"
                   @click="$store.commit('toggleSideBar', !$store.state.is_show_sidebar)">
                    <svg
                        xmlns="http://www.w3.org/2000/svg"
                        width="24"
                        height="24"
                        viewBox="0 0 24 24"
                        fill="none"
                        stroke="currentColor"
                        stroke-width="2"
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        class="feather feather-menu"
                    >
                        <line x1="3" y1="12" x2="21" y2="12"></line>
                        <line x1="3" y1="6" x2="21" y2="6"></line>
                        <line x1="3" y1="18" x2="21" y2="18"></line>
                    </svg>
                </a>
                <!-- Portal vue/Teleport for Breadcrumb -->
                <div id="breadcrumb" class="vue-portal-target"></div>
            </header>
        </div>
        <div class="topbar-nav header navbar" role="banner">
            <TopNavigation/>
        </div>
    </div>
</template>
