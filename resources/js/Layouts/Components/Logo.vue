<script setup>
import {Link} from "@inertiajs/vue3";
</script>
<template>
    <ul class="navbar-item theme-brand flex-row text-center">
        <li class="nav-item theme-logo">
            <Link :href="route('home')">
                <img src="/assets/images/logo.svg" class="navbar-logo" alt="logo"/>
            </Link>
        </li>
        <li class="nav-item theme-text">
            <Link :href="route('home')" class="nav-link">{{ 'Laravel' }}</Link>
        </li>
    </ul>
</template>
