<script setup>
import {Head, Link, useForm} from '@inertiajs/vue3';
import PasswordInput from "@/Pages/Auth/Components/PasswordInput.vue";
import PrimaryButton from "@/Pages/Auth/Components/PrimaryButton.vue";
import GuestLayout from "@/Layouts/GuestLayout.vue";

const props = defineProps({
    email: {
        type: String,
        required: true,
    },
    token: {
        type: String,
        required: true,
    },
});

const form = useForm({
    token: props.token,
    email: props.email,
    password: '',
    password_confirmation: '',
});

const validate = () => {
    form.clearErrors();

    if (form.password === '')
        form.setError('password', "This new password field is required");

    if (form.password !== form.password_confirmation)
        form.setError('password', "This new password & new password confirmation field has to be same");

    return !form.hasErrors;
}

const submit = () => {
    form.post(route('password.store'), {
        preserveScroll: true,
        onBefore: () => {
            if (!validate()) {
                return false
            }
        },
        onSuccess: () => form.reset('password', 'password_confirmation'),
    });
};
</script>

<template>
    <GuestLayout>
        <Head :title="$t('reset_password_form_title')"/>
        <h1>{{ $t('reset_password_form_title') }}</h1>
        <p class="signup-link register mb-1">
            {{ $t('register_form_subtitle') }}
            <Link :href="route('login')">{{ $t('login_btn') }}</Link>
        </p>
        <form class="text-start" @submit.prevent="submit">
            <div class="form">
                <PasswordInput
                    tabindex="3"
                    :label="$t('new_password')"
                    v-model="form.password"
                    :message="form.errors.password"
                    :can-reset-password="false"
                />

                <PasswordInput
                    tabindex="4"
                    :label="$t('new_password_confirm')"
                    v-model="form.password_confirmation"
                    :message="form.errors.password"
                    :can-reset-password="false"
                />

                <PrimaryButton :label="$t('reset_password_btn')" :processing="form.processing"/>
            </div>
        </form>
    </GuestLayout>
</template>

