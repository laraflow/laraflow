<script setup>
import {v4 as uuid} from "uuid";
import {computed, onMounted, ref} from "vue";

const props = defineProps({
    label: {
        type: String,
        default: 'Name',
    },
    id: {
        type: String,
        default: uuid(),
    },
    name: {
        type: String,
        default: 'name',
    },
    message: {
        type: String,
    },
})

const hasError = computed(() => {
    return props.message && props.message.length > 0;
});

const model = defineModel({
    type: String,
    required: true,
});

const input = ref(null);

onMounted(() => {
    if (input.value.hasAttribute('autofocus')) {
        input.value.focus();
    }
});

defineExpose({focus: () => input.value.focus()});
</script>

<template>
    <div id="username-field" class="field-wrapper input">
        <label :for="id">{{ label }}</label>
        <svg
            xmlns="http://www.w3.org/2000/svg"
            width="24"
            height="24"
            viewBox="0 0 24 24"
            fill="none"
            stroke="currentColor"
            stroke-width="2"
            stroke-linecap="round"
            stroke-linejoin="round"
            class="feather feather-user"
        >
            <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
            <circle cx="12" cy="7" r="4"></circle>
        </svg>
        <input
            :id="id"
            type="text"
            max="255"
            maxlength="255"
            class="form-control"
            :class="{'form-control' : true, 'is-invalid' : hasError}"
            :name="name"
            v-model="model"
            ref="input"
            v-bind="{...$attrs, class:null}"/>
        <div class="invalid-feedback d-block text-danger" v-show="hasError">
            {{ message }}
        </div>
    </div>
</template>
