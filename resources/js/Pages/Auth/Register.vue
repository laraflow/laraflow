<script setup>
import GuestLayout from '@/Layouts/GuestLayout.vue';
import {Head, Link, useForm} from '@inertiajs/vue3';
import NameInput from "@/Pages/Auth/Components/NameInput.vue";
import UsernameInput from "@/Pages/Auth/Components/UsernameInput.vue";
import EmailInput from "@/Pages/Auth/Components/EmailInput.vue";
import PasswordInput from "@/Pages/Auth/Components/PasswordInput.vue";
import PrimaryButton from "@/Pages/Auth/Components/PrimaryButton.vue";

const form = useForm({
    name: '',
    email: '',
    password: '',
    password_confirmation: '',
});

const submit = () => {
    form.post(route('register'), {
        onFinish: () => form.reset('password', 'password_confirmation'),
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
        <form class="text-start">
            <div class="form">
                <NameInput
                    :label="$t('name')"
                    :placeholder="$t('name_placeholder')"/>

                <EmailInput
                    :label="$t('email')"
                    name="email"
                    :placeholder="$t('email_placeholder')"
                    v-model="form.email"
                    :message="form.errors.email"
                />

                <PasswordInput :label="$t('password')"
                               v-model="form.password"
                               :message="form.errors.password"
                               :can-reset-password="false"
                />

                <PasswordInput :label="$t('confirm_password')"
                               v-model="form.password_confirmation"
                               :message="form.errors.password"
                               :can-reset-password="false"
                />
                <div class="terms_condition mb-4">
                    <div class="checkbox-outline-primary custom-control custom-checkbox">
                        <input type="checkbox" class="custom-control-input" value="true" id="chkTerms"/>
                        <label class="custom-control-label" for="chkTerms"> I agree to the <a href="javascript:;"> terms
                            and conditions </a></label>
                    </div>
                </div>
                <PrimaryButton :label="$t('register_btn')"/>
                <!--                <div class="division">-->
                <!--                    <span>OR</span>-->
                <!--                </div>-->
                <!--                <div class="social">-->
                <!--                    <a href="javascript:void(0);" class="btn social-fb">-->
                <!--                        <svg-->
                <!--                            xmlns="http://www.w3.org/2000/svg"-->
                <!--                            width="24"-->
                <!--                            height="24"-->
                <!--                            viewBox="0 0 24 24"-->
                <!--                            fill="none"-->
                <!--                            stroke="currentColor"-->
                <!--                            stroke-width="2"-->
                <!--                            stroke-linecap="round"-->
                <!--                            stroke-linejoin="round"-->
                <!--                            class="feather feather-facebook"-->
                <!--                        >-->
                <!--                            <path d="M18 2h-3a5 5 0 0 0-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 0 1 1-1h3z"></path>-->
                <!--                        </svg>-->
                <!--                        <span class="brand-name">Facebook</span>-->
                <!--                    </a>-->
                <!--                    <a href="javascript:void(0);" class="btn social-github">-->
                <!--                        <svg-->
                <!--                            xmlns="http://www.w3.org/2000/svg"-->
                <!--                            width="24"-->
                <!--                            height="24"-->
                <!--                            viewBox="0 0 24 24"-->
                <!--                            fill="none"-->
                <!--                            stroke="currentColor"-->
                <!--                            stroke-width="2"-->
                <!--                            stroke-linecap="round"-->
                <!--                            stroke-linejoin="round"-->
                <!--                            class="feather feather-github"-->
                <!--                        >-->
                <!--                            <path-->
                <!--                                d="M9 19c-5 1.5-5-2.5-7-3m14 6v-3.87a3.37 3.37 0 0 0-.94-2.61c3.14-.35 6.44-1.54 6.44-7A5.44 5.44 0 0 0 20 4.77 5.07 5.07 0 0 0 19.91 1S18.73.65 16 2.48a13.38 13.38 0 0 0-7 0C6.27.65 5.09 1 5.09 1A5.07 5.07 0 0 0 5 4.77a5.44 5.44 0 0 0-1.5 3.78c0 5.42 3.3 6.61 6.44 7A3.37 3.37 0 0 0 9 18.13V22"-->
                <!--                            ></path>-->
                <!--                        </svg>-->
                <!--                        <span class="brand-name">Github</span>-->
                <!--                    </a>-->
                <!--                </div>-->
            </div>
        </form>
    </GuestLayout>
</template>
