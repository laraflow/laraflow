<script setup>
import {useStore} from "vuex";
import {Link} from "@inertiajs/vue3";
import {onMounted} from "vue";

const store = useStore();

const props = defineProps({
    code: {
        type: Number,
        required: true
    },
    message: {
        type: String,
        default: ''
    },
    trace: {
        type: Array,
        required: false,
        default: []
    }
})

onMounted(() => {
    console.error(props.message)
    console.trace(props.trace)
})

</script>

<template>
    <div :class="[$store.state.layout_style, $store.state.menu_style]">
        <div class="layout-px-spacing">
            <div class="error404 text-center">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-4 me-auto mt-5 text-md-start text-center">
                            <Link :href="route('home')" class="ms-md-5">
                                <img alt="image-404" src="/assets/images/logo2.svg" class="theme-logo"/>
                            </Link>
                        </div>
                    </div>
                </div>
                <div class="container-fluid error-content">
                    <div>
                        <h1 class="error-number">
                            {{ code }}
                        </h1>
                        <p class="mini-text">
                            <slot name="title"/>
                        </p>
                        <p class="error-text mb-4 mt-1">
                            {{ message }}
                        </p>
                        <Link :href="route('home')" class="btn btn-primary mt-5">
                            Go Back
                        </Link>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<style lang="scss">
@import "../assets/sass/pages/error/style-400";
</style>
