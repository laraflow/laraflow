<script setup>
import {Head, Link, useForm} from '@inertiajs/vue3';
import NameInput from "@/Pages/Auth/Components/NameInput.vue";
import EmailInput from "@/Pages/Auth/Components/EmailInput.vue";
import PasswordInput from "@/Pages/Auth/Components/PasswordInput.vue";
import PrimaryButton from "@/Pages/Auth/Components/PrimaryButton.vue";
import BooleanInput from "@/Pages/Auth/Components/BooleanInput.vue";
import GuestLayout from "@/Layouts/GuestLayout.vue";

const form = useForm({
    name: '',
    email: '',
    password: '',
    password_confirmation: '',
    accept_terms: false,
});

const validate = () => {
    form.clearErrors();

    if (form.name === '')
        form.setError('name', "This name field is required")

    if (form.email === '')
        form.setError('email', "This email field is required");

    if (form.password === '')
        form.setError('password', "This password field is required");

    if (!form.accept_terms)
        form.setError('accept_terms', "This accept terms field is required");

    if (form.password !== form.password_confirmation)
        form.setError('password', "This password & password confirmation field has to be same");

    return !form.hasErrors;
}

const submit = () => {
    form.post(route('register'), {
        preserveScroll: true,
        onBefore: () => {
            if (!validate()) {
                return false
            }
        },
        onSuccess: () => form.reset('password'),
    });
};
</script>

<template>
    <GuestLayout>
    <Head :title="$t('register_form_title')"/>
    <h1>{{ $t('register_form_title') }}</h1>
    <p class="signup-link register mb-1">
        {{ $t('register_form_subtitle') }}
        <Link :href="route('login')">{{ $t('login_btn') }}</Link>
    </p>
    <form class="text-start" @submit.prevent="submit">
        <div class="form">
            <NameInput
                autofocus
                tabindex="1"
                :label="$t('name')"
                name="name"
                :placeholder="$t('name_placeholder')"
                v-model="form.name"
                :message="form.errors.name"
            />

            <EmailInput
                tabindex="2"
                :label="$t('email')"
                name="email"
                :placeholder="$t('email_placeholder')"
                v-model="form.email"
                :message="form.errors.email"
            />

            <PasswordInput
                tabindex="3"
                :label="$t('password')"
                v-model="form.password"
                :message="form.errors.password"
                :can-reset-password="false"
            />

            <PasswordInput
                tabindex="4"
                :label="$t('confirm_password')"
                v-model="form.password_confirmation"
                :message="form.errors.password"
                :can-reset-password="false"
            />

            <div class="terms_condition">
                <BooleanInput
                    tabindex="5"
                    :label="''"
                    v-model="form.accept_terms"
                    :message="form.errors.accept_terms"
                >
                    I agree to the
                    <Link href="#"> terms
                        and conditions
                    </Link>
                    .
                </BooleanInput>
            </div>

            <PrimaryButton :label="$t('register_btn')" :processing="form.processing"/>
        </div>
    </form>
    </GuestLayout>
</template>
