<script setup>
defineProps({
    label: {
        type: String,
        'default': 'Button'
    }
})
</script>

<template>
    <div class="mt-2 d-sm-flex justify-content-between">
        <div class="field-wrapper">
            <button type="submit" class="btn btn-primary" v-bind="{...$attrs, class:null}">
                {{ label }}
            </button>
        </div>
    </div>
</template>

<style scoped>

</style>
