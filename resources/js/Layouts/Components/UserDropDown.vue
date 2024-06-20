<script setup>
import {Link, router, useForm} from '@inertiajs/vue3';
import {useAuth} from "@/Composables/auth.js";

const {fullName, profileImage} = useAuth();
const form = useForm({});

const submit = () => {
    form.post(route('logout'), {
        onSuccess: () => window.location.reload(),
    });
};
</script>

<template>
    <div class="dropdown nav-item user-profile-dropdown btn-group">
        <a href="javascript:;" id="ddluser" data-bs-toggle="dropdown" aria-expanded="false"
           class="btn dropdown-toggle btn-icon-only user nav-link d-flex justify-content-center gap-1">
            <img :src="profileImage()" alt="avatar" :title="fullName()"/>
            <span class="fw-bold d-none d-md-inline-flex">{{ fullName() }}</span>
        </a>
        <ul class="dropdown-menu dropdown-menu-right m-0" aria-labelledby="ddluser">
            <li role="presentation">
                <Link :href="route('profile.edit')" class="dropdown-item">
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
                    Profile
                </Link>
            </li>
            <li role="presentation">
                <Link href="/auth/lockscreen" class="dropdown-item">
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
                    Settings
                </Link>
            </li>
            <li role="presentation" @click.prevent="submit">
                <a href="javascript:void(0);" class="dropdown-item">
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
                        class="feather feather-log-out"
                    >
                        <path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"></path>
                        <polyline points="16 17 21 12 16 7"></polyline>
                        <line x1="21" y1="12" x2="9" y2="12"></line>
                    </svg>
                    {{ $t('logout_btn')}}
                </a>
            </li>
        </ul>
    </div>
</template>

<style scoped>

</style>
