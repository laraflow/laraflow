<script setup>
import {Link, router, useForm} from '@inertiajs/vue3';

const form = useForm({});

const submit = () => {
    form.post(route('logout'), {
        onSuccess: () => router.replace(route('login')),
    });
};
</script>

<template>
    <div class="dropdown nav-item user-profile-dropdown btn-group">
        <a href="javascript:;" id="ddluser" data-bs-toggle="dropdown" aria-expanded="false"
           class="btn dropdown-toggle btn-icon-only user nav-link">
            <img src="/assets/images/profile-16.jpeg" alt="avatar"/>
        </a>
        <ul class="dropdown-menu dropdown-menu-right m-0" aria-labelledby="ddluser">
            <li role="presentation">
                <Link href="/users/profile" class="dropdown-item">
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
                <Link href="/apps/mailbox" class="dropdown-item">
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
                        class="feather feather-inbox"
                    >
                        <polyline points="22 12 16 12 14 15 10 15 8 12 2 12"></polyline>
                        <path
                            d="M5.45 5.11L2 12v6a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2v-6l-3.45-6.89A2 2 0 0 0 16.76 4H7.24a2 2 0 0 0-1.79 1.11z"></path>
                    </svg>
                    Inbox
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
                    Lock Screen
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
                    Sign Out
                </a>
            </li>
        </ul>
    </div>
</template>

<style scoped>

</style>
