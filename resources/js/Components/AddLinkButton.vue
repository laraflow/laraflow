<script setup>
import {Link} from "@inertiajs/vue3";

defineProps({
    url: {
        type: String,
        required: true
    }
})
</script>

<template>
    <Link :href="url" class="btn btn-primary">
        <slot/>
    </Link>
</template>
