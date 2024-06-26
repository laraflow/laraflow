<script setup>
import ErrorLayout from "@/Layouts/ErrorLayout.vue";
import {Head} from "@inertiajs/vue3";

defineProps({
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
</script>

<template>
    <Head :title="`Error ${code}`"/>
    <ErrorLayout :code="code" :trace="trace" :message="message">
        <template #title>{{ $t('Request Timeout') }}</template>
    </ErrorLayout>
</template>
