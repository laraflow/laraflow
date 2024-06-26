<script setup>

const props = defineProps({
    id: {
        type: String,
        required: false,
    },
    label: {
        type: String,
        required: false,
    },
    required: {
        type: Boolean,
        default: false,
    }
})

</script>

<template>
    <label :for="id" class="col-form-label">
        {{ label }}
        <span v-show="required" class="text-danger fw-bold">*</span>
    </label>
</template>
