<script setup>
import {computed, onMounted, ref} from "vue";
import {Link} from '@inertiajs/vue3';
import {v4 as uuid} from 'uuid';

const pwd_type = ref("password");

const props = defineProps({
    canResetPassword: {
        type: Boolean,
        default: false
    },
    label: {
        type: String,
        default: 'Password',
    },
    id: {
        type: String,
        default: `password-input-${uuid()}`,
    },
    name: {
        type: String,
        default: 'password',
    },
    message: {
        type: String,
    }
});

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

defineOptions({
    inheritAttrs: false
});

const togglePasswordType = () => {
    if (pwd_type.value === "password") {
        pwd_type.value = "text";
    } else {
        pwd_type.value = "password";
    }
};
</script>

<template>
    <div class="field-wrapper input">
        <div class="d-flex justify-content-between">
            <label :for="id">
                {{ label }}
            </label>
            <Link
                v-show="canResetPassword"
                :href="route('password.request')"
                class="forgot-pass-link">
                {{ $t('forgot_password_prompt') }}
            </Link>
        </div>
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
            class="feather feather-lock"
        >
            <rect x="3" y="11" width="18" height="11" rx="2" ry="2"></rect>
            <path d="M7 11V7a5 5 0 0 1 10 0v4"></path>
        </svg>
        <input :type="pwd_type"
               :class="{'form-control' : true, 'is-invalid' : hasError}"
               :id="id"
               size="6"
               min="6"
               :name="name"
               minlength="6"
               max="255"
               maxlength="255"
               v-model="model"
               ref="input"
               v-bind="{...$attrs, class:null}"
               :placeholder="$t('password_placeholder')"/>
        <svg
            @click="togglePasswordType"
            xmlns="http://www.w3.org/2000/svg"
            width="24"
            height="24"
            viewBox="0 0 24 24"
            fill="none"
            stroke="currentColor"
            stroke-width="3"
            stroke-linecap="round"
            stroke-linejoin="round"
            id="toggle-password"
            class="feather feather-eye"
        >
            <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path>
            <circle cx="12" cy="12" r="3"></circle>
        </svg>
        <div class="invalid-feedback d-block text-danger" v-show="hasError">
            {{ message }}
        </div>
    </div>
</template>
