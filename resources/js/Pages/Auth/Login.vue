<script setup>
import {Head, Link, useForm} from '@inertiajs/vue3';
import PasswordInput from "@/Pages/Auth/Components/PasswordInput.vue";
import EmailInput from "@/Pages/Auth/Components/EmailInput.vue";
import PrimaryButton from "@/Pages/Auth/Components/PrimaryButton.vue";
import BooleanInput from "@/Pages/Auth/Components/BooleanInput.vue";

defineProps({
    canResetPassword: {
        type: Boolean,
        default: false
    },
    canRegister: {
        type: Boolean,
        default: false
    },
    status: {
        type: String,
    },
});

const form = useForm({
    email: '',
    password: '',
    remember: false,
});

const validate = () => {
    form.clearErrors();

    if (form.email === '')
        form.setError('email', "This email field is required");

    if (form.password === '')
        form.setError('password', "This password field is required");

    return !form.hasErrors;
}
const submit = () => {
    form.post(route('login'), {
        preserveScroll: true,
        onBefore: () => {
            if (!validate()) {
                return false
            }
        },
        onSuccess: () => form.reset('password'),
    });
}
</script>

<template>
    <Head :title="$t('login_form_title')"/>
    <h1>{{ $t('login_form_title') }}</h1>
    <p class="mb-1">{{ $t('login_form_subtitle') }}</p>
    <form class="text-start" @submit.prevent="submit">
        <div class="form">
            <EmailInput
                autofocus
                tabindex="1"
                :label="$t('email')"
                name="email"
                :placeholder="$t('email_placeholder')"
                v-model="form.email"
                :message="form.errors.email"
            />

            <PasswordInput
                tabindex="2"
                :label="$t('password')"
                v-model="form.password"
                :message="form.errors.password"
                :can-reset-password="canResetPassword"
            />

            <BooleanInput
                tabindex="3"
                :label="$t('remember_me_placeholder')"
                v-model="form.remember"
                :message="form.errors.remember"
            />

            <PrimaryButton :label="$t('login_btn')" :processing="form.processing"/>

            <p class="signup-link" v-show="canRegister">
                {{ $t('register_prompt') }}
                <Link :href="route('register')">
                    {{ $t('register_prompt_link') }}
                </Link>
            </p>
        </div>
    </form>
</template>
