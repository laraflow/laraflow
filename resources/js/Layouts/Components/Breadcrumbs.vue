<script setup>
import {usePage, Link} from "@inertiajs/vue3";

const page = usePage();
const current = page.props.breadcrumbs.current;
const entries = page.props.breadcrumbs.entries;
</script>

<template>
    <ul class="navbar-nav flex-row">
        <li>
            <div class="page-header">
                <nav class="breadcrumb-one" aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"
                            v-for="(breadcrumb, key) in entries" :key="key"
                            :class="{'active' : breadcrumb.url === current.url}"
                            aria-current="page">
                            <Link :href="breadcrumb.url">
                                {{ breadcrumb.title }}
                            </Link>
                        </li>
                    </ol>
                </nav>
            </div>
        </li>
    </ul>
</template>

<style scoped>

</style>
