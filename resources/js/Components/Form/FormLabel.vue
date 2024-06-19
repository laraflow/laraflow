<script setup>

const props = defineProps({
    id: {
        type: String,
        required: false,
    },
    label: {
        type: String,
        required: false,
    }
})

</script>

<template>
    <label :for="id" class="col-form-label">{{ label }}</label>
</template>
