<script setup>
import {Head} from '@inertiajs/vue3';
import UserList from "@/Pages/User/Components/UserList.vue";
import AppLayout from "@/Layouts/AppLayout.vue";

defineOptions({
    layout: AppLayout
})
</script>

<template>
    <Head :title="$t('users')"/>
    <teleport to="#actions">
        <li class="nav-item more-dropdown">
            <div class="dropdown custom-dropdown-icon"><a href="javascript:;"
                                                          class="nav-link dropdown-toggle"
                                                          id="ddlSettings" data-bs-toggle="dropdown"
                                                          aria-expanded="false"><span>Settings</span>
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                     fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                     stroke-linejoin="round" class="feather feather-chevron-down">
                    <polyline points="6 9 12 15 18 9"></polyline>
                </svg>
            </a>
                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="ddlSettings">
                    <li><a class="dropdown-item" data-value="Settings" href="javascript:void(0);">Settings</a>
                    </li>
                    <li><a class="dropdown-item" data-value="Mail" href="javascript:void(0);">Mail</a>
                    </li>
                    <li><a class="dropdown-item" data-value="Print" href="javascript:void(0);">Print</a>
                    </li>
                    <li><a class="dropdown-item" data-value="Download" href="javascript:void(0);">Download</a>
                    </li>
                    <li><a class="dropdown-item" data-value="Share" href="javascript:void(0);">Share</a>
                    </li>
                </ul>
            </div>
        </li>
    </teleport>

    <UserList/>
</template>
