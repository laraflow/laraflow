<script setup>
import {onMounted, ref} from "vue";

const emit = defineEmits(['update:modelValue'])
const saveActions = ref({
    save_back: 'Save And Back',
    save_new: 'Save and New',
    save_preview: 'Save and Preview',
    save_edit: 'Save and Edit',
})
const currentAction = ref('save_back')
const model = defineModel({
    type: String,
    required: true,
});

const input = ref(null);
const update = (value) => {
    if (value) {
        currentAction.value = value;
    }

    emit('update:modelValue', currentAction.value);

    if (value) {
        input.value.click()
    }
}

onMounted(() => {
    currentAction.value = model.value;
})

</script>

<template>
    <div
        class="btn-group"
        role="group"
        aria-label="Button group with nested dropdown">
        <button
            ref="input"
            type="submit"
            @click="update(null)"
            class="btn btn-success">
            {{ saveActions[currentAction] ?? 'N/A' }}
        </button>
        <div class="btn-group custom-dropdown" role="group">
            <button
                id="saveActionGroup"
                type="button"
                class="btn btn-success dropdown-toggle"
                data-bs-toggle="dropdown"
                aria-expanded="false">
                <span class="sr-only">Toggle Dropdown</span>
            </button>
            <ul class="dropdown-menu" aria-labelledby="saveActionGroup">
                <li v-for="(label, action) in saveActions" v-show="action !== currentAction">
                    <a class="dropdown-item"
                       href="javascript:void(0);"
                       @click.prevent="update(action)">
                        {{ label }}
                    </a>
                </li>
            </ul>
        </div>
    </div>
</template>

<style scoped>

</style>
