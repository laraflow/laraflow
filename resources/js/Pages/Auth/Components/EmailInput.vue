<script setup>
import {computed, onMounted, ref} from "vue";
import {v4 as uuid} from "uuid";

const props = defineProps({
    label: {
        type: String,
        default: 'Email Address',
    },
    id: {
        type: String,
        default: `email-input-${uuid()}`,
    },
    name: {
        type: String,
        default: 'email',
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
        <label
            :for="id"
            :class="{'text-danger' : hasError}">
            {{ label }}
        </label>
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
            class="feather feather-at-sign register"
        >
            <circle cx="12" cy="12" r="4"></circle>
            <path d="M16 8v5a3 3 0 0 0 6 0v-1a10 10 0 1 0-3.92 7.94"></path>
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
