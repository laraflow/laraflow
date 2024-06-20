<script setup>
import {Head} from '@inertiajs/vue3';
import UserList from "@/Pages/User/Components/UserList.vue";
import AddLinkButton from "@/Components/AddLinkButton.vue";
import AppLayout from "@/Layouts/AppLayout.vue";
</script>

<template>
    <AppLayout>
        <Head :title="$t('users')"/>
        <UserList/>
    </AppLayout>
</template>
