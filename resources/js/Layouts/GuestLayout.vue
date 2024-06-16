<script setup>
import {useStore} from "vuex";

const store = useStore();
</script>

<template>
    <div :class="[$store.state.layout_style, $store.state.menu_style]">
        <div class="form auth-boxed">
            <div class="form-container outer">
                <div class="form-form">
                    <div class="form-form-wrap">
                        <div class="form-container">
                            <div class="form-content">
                                <slot/>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<style lang="scss">
@import "../assets/sass/authentication/auth-boxed";
</style>
