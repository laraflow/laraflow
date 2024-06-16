<script setup>
import GuestLayout from '@/Layouts/GuestLayout.vue';
import InputError from '@/Components/InputError.vue';
import InputLabel from '@/Components/InputLabel.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import TextInput from '@/Components/TextInput.vue';
import {Head, useForm} from '@inertiajs/vue3';
import EmailInput from "@/Pages/Auth/Components/EmailInput.vue";
import PasswordInput from "@/Pages/Auth/Components/PasswordInput.vue";

const form = useForm({
    password: '',
});

const validate = () => {
    form.clearErrors();

    if (form.password === '')
        form.setError('password', "This password field is required");

    return !form.hasErrors;
}

const submit = () => {
    form.post(route('password.confirm'), {
        preserveScroll: true,
        onBefore: () => {
            if (!validate()) {
                return false
            }
        },
        onFinish: () => form.reset(),
    });
};
</script>

<template>
    <GuestLayout>
        <Head :title="$t('confirm_password_form_title')"/>
        <h1>{{ $t('confirm_password_form_title') }}</h1>
        <p class="mb-1">
            {{ $t('confirm_password_form_subtitle') }}
        </p>
        <form class="text-start" @submit.prevent="submit">
            <div class="form">
                <PasswordInput
                    tabindex="2"
                    :label="$t('password')"
                    v-model="form.password"
                    :message="form.errors.password"
                    :can-reset-password="canResetPassword"
                />

                <PrimaryButton :label="$t('confirm_password_btn')"  :processing="form.processing"/>
            </div>
        </form>
    </GuestLayout>
</template>
