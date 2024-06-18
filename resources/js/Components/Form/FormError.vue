<script setup>

defineProps({
    message: {
        type: String,
    },
});

</script>

<template>
    <div class="invalid-feedback d-block text-danger" v-show="message && message.length > 0">
        {{ message }}
    </div>
</template>
