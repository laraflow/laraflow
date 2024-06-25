<script setup>
import {Head} from '@inertiajs/vue3';
import UserList from "@/Pages/User/Components/UserList.vue";
import AppLayout from "@/Layouts/AppLayout.vue";
import AddLinkButton from "@/Components/AddLinkButton.vue";

const excelColumns = () => {
    return {
        Id: "id",
        Profile: "profile",
        Name: "name",
        Email: "email",
        Phone: "phone",
        Status: "status"
    };
}

</script>

<template>
    <AppLayout>
        <Head :title="$t('users')"/>
        <div class="row layo">
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
    </AppLayout>
</template>
