<script setup>
import {Head, useForm} from '@inertiajs/vue3';
import AppLayout from "@/Layouts/AppLayout.vue";
import FormInput from "@/Components/Form/FormInput.vue";
import FormSubmit from "@/Components/Form/FormSubmit.vue";

const form = useForm({
    name: '',
    email: '',
    password: '',
    password_confirmation: '',
    save_action: 'save_back'
});
const validate = () => {
    form.clearErrors();

    if (form.name === '')
        form.setError('name', "This name field is required")

    if (form.email === '')
        form.setError('email', "This email field is required");

    if (form.password === '')
        form.setError('password', "This password field is required");

    if (form.password !== form.password_confirmation)
        form.setError('password', "This password & password confirmation field has to be same");

    return !form.hasErrors;
}
const submit = () => {
    form.post(route('users.store'), {
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
    <AppLayout>
        <Head :title="$t('add_user_btn')"/>
        <section class="panel">
            <div class="panel-heading">
                <h3 class="panel-title">{{ $t('add_user_btn') }}</h3>
            </div>
            <div class="panel-body pt-0">
                <form @submit.prevent="submit" autocomplete="off">
                    <div class="row">
                        <div class="col-md-6">
                            <FormInput type="text"
                                       required
                                       v-model="form.name"
                                       :message="form.errors.name"
                                       :label="$t('name')"
                                       id="name"
                                       :placeholder="$t('name_placeholder')"
                                       name="name"/>
                        </div>
                        <div class="col-md-6">
                            <FormInput type="email"
                                       required
                                       v-model="form.email"
                                       :message="form.errors.email"
                                       :label="$t('email')"
                                       id="email"
                                       autocomplete="off"
                                       spellcheck="false"
                                       :placeholder="$t('email_placeholder')"
                                       name="email"/>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <FormInput type="password"
                                       required
                                       v-model="form.password"
                                       :message="form.errors.password"
                                       :label="$t('password')"
                                       id="password"
                                       autocomplete="off"
                                       spellcheck="false"
                                       :placeholder="$t('password_placeholder')"
                                       name="password"/>
                        </div>
                        <div class="col-md-6">
                            <FormInput type="password"
                                       required
                                       v-model="form.password_confirmation"
                                       :message="form.errors.password"
                                       :label="$t('confirm_password')"
                                       id="password_confirmation"
                                       spellcheck="false"
                                       autocomplete="off"
                                       :placeholder="$t('confirm_password_placeholder')"
                                       name="password"/>
                        </div>
                    </div>
                    <div class="d-flex justify-content-between gap-3">
                        <FormSubmit v-model="form.save_action"/>
                    </div>
                </form>
            </div>
        </section>
    </AppLayout>
</template>
