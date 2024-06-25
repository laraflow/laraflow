<script setup>
import {Head} from '@inertiajs/vue3';
import AppLayout from "@/Layouts/AppLayout.vue";
import UserList from "@/Pages/User/Components/UserList.vue";
import AddLinkButton from "@/Components/AddLinkButton.vue";
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
        <div class="row mt-4 mx-2">
            <div class="col-xl-12 col-lg-12 col-sm-12 layout-spacing">
                <div class="panel" style="min-height: 70vh !important;">
                    <div class="panel-heading">
                        <h3 class="panel-title">Users</h3>
                    </div>
                    <div class="panel-body p-0">
                        <div class="d-flex justify-content-between gap-3 mx-3">
                            <AddLinkButton :url="route('users.create')">
                                {{ $t("add_user_btn") }}
                            </AddLinkButton>
                        </div>
                        <UserList/>
                    </div>
                </div>
            </div>
        </div>
</template>
