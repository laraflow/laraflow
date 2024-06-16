<script setup>
import GuestLayout from '@/Layouts/GuestLayout.vue';
import {Head, useForm} from '@inertiajs/vue3';
import EmailInput from "@/Pages/Auth/Components/EmailInput.vue";
import PrimaryButton from "@/Pages/Auth/Components/PrimaryButton.vue";

defineProps({
    status: {
        type: String,
    },
});

const form = useForm({
    email: '',
});

const submit = () => {
    form.post(route('password.email'));
};
</script>

<template>
    <GuestLayout>
        <Head :title="$t('forgot_password_form_title')"/>
        <h1>{{ $t('forgot_password_form_title') }}</h1>
        <p class="mb-1">
            {{ $t('forgot_password_form_subtitle') }}
        </p>
        <form class="text-start">
            <div class="form">
                <EmailInput
                    :label="$t('email')"
                    name="email"
                    :placeholder="$t('email_placeholder')"
                    v-model="form.email"
                    :message="form.errors.email"
                />

                <PrimaryButton :label="$t('forgot_password_btn')"/>
            </div>
        </form>
    </GuestLayout>
</template>
