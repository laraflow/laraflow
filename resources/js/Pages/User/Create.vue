<script setup>
import {Head} from '@inertiajs/vue3';
import AppLayout from "@/Layouts/AppLayout.vue";
</script>

<template>
    <AppLayout>
        <Head :title="$t('add_user_btn')"/>
        <div class="layout-px-spacing">
            <div class="row layout-top-spacing">
                <div class="col-xl-12 col-lg-12 col-md-12 col-12 layout-spacing">
                    <div class="panel br-4">
                        <div class="panel-body">
                            test
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </AppLayout>
</template>
