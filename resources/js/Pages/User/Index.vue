<script setup>
import {Head} from '@inertiajs/vue3';
import AppLayout from "@/Layouts/AppLayout.vue";
import {onMounted, ref} from "vue";
import ServerTable from "@/Components/ServerTable.vue";

const columns = ref(["id", "profile", "name", "email", "phone", "status", "actions"]);
const items = ref([]);

onMounted(() => {
    items.value = [
        {
            id: 1,
            thumb: "profile-9.jpeg",
            name: "Tiger Nixon",
            email: "tiger@gmail.com",
            phone: "555-555-5555",
            status: {key: "Approved", class: "primary"}
        },
        {
            id: 2,
            thumb: "profile-11.jpeg",
            name: "Garrett Winters",
            email: "garrett@gmail.com",
            phone: "222-222-2222",
            status: {key: "Closed", class: "danger"}
        },
        {
            id: 3,
            thumb: "profile-12.jpeg",
            name: "Ashton Cox",
            email: "ashton@gmail.com",
            phone: "333-333-3333",
            status: {key: "Suspended", class: "warning"}
        },
        {
            id: 4,
            thumb: "profile-13.jpeg",
            name: "Cedric Kelly",
            email: "cedric@gmail.com",
            phone: "444-444-4444",
            status: {key: "Suspended", class: "warning"}
        },
        {
            id: 5,
            thumb: "profile-14.jpeg",
            name: "Airi Satou",
            email: "airi@gmail.com",
            phone: "555-555-5555",
            status: {key: "Approved", class: "primary"}
        },
        {
            id: 6,
            thumb: "profile-15.jpeg",
            name: "Brielle Williamson",
            email: "brielle@gmail.com",
            phone: "666-666-6666",
            status: {key: "Closed", class: "danger"}
        },
        {
            id: 7,
            thumb: "profile-16.jpeg",
            name: "Herrod Chandler",
            email: "herrod@gmail.com",
            phone: "555-555-5555",
            status: {key: "Approved", class: "primary"}
        },
        {
            id: 1,
            thumb: "profile-9.jpeg",
            name: "Tiger Nixon",
            email: "tiger@gmail.com",
            phone: "555-555-5555",
            status: {key: "Approved", class: "primary"}
        },
        {
            id: 2,
            thumb: "profile-11.jpeg",
            name: "Garrett Winters",
            email: "garrett@gmail.com",
            phone: "222-222-2222",
            status: {key: "Closed", class: "danger"}
        },
        {
            id: 3,
            thumb: "profile-12.jpeg",
            name: "Ashton Cox",
            email: "ashton@gmail.com",
            phone: "333-333-3333",
            status: {key: "Suspended", class: "warning"}
        },
        {
            id: 4,
            thumb: "profile-13.jpeg",
            name: "Cedric Kelly",
            email: "cedric@gmail.com",
            phone: "444-444-4444",
            status: {key: "Suspended", class: "warning"}
        },
        {
            id: 5,
            thumb: "profile-14.jpeg",
            name: "Airi Satou",
            email: "airi@gmail.com",
            phone: "555-555-5555",
            status: {key: "Approved", class: "primary"}
        },
        {
            id: 6,
            thumb: "profile-15.jpeg",
            name: "Brielle Williamson",
            email: "brielle@gmail.com",
            phone: "666-666-6666",
            status: {key: "Closed", class: "danger"}
        },
        {
            id: 7,
            thumb: "profile-16.jpeg",
            name: "Herrod Chandler",
            email: "herrod@gmail.com",
            phone: "555-555-5555",
            status: {key: "Approved", class: "primary"}
        },
        {
            id: 1,
            thumb: "profile-9.jpeg",
            name: "Tiger Nixon",
            email: "tiger@gmail.com",
            phone: "555-555-5555",
            status: {key: "Approved", class: "primary"}
        },
        {
            id: 2,
            thumb: "profile-11.jpeg",
            name: "Garrett Winters",
            email: "garrett@gmail.com",
            phone: "222-222-2222",
            status: {key: "Closed", class: "danger"}
        },
        {
            id: 3,
            thumb: "profile-12.jpeg",
            name: "Ashton Cox",
            email: "ashton@gmail.com",
            phone: "333-333-3333",
            status: {key: "Suspended", class: "warning"}
        },
        {
            id: 4,
            thumb: "profile-13.jpeg",
            name: "Cedric Kelly",
            email: "cedric@gmail.com",
            phone: "444-444-4444",
            status: {key: "Suspended", class: "warning"}
        },
        {
            id: 5,
            thumb: "profile-14.jpeg",
            name: "Airi Satou",
            email: "airi@gmail.com",
            phone: "555-555-5555",
            status: {key: "Approved", class: "primary"}
        },
        {
            id: 6,
            thumb: "profile-15.jpeg",
            name: "Brielle Williamson",
            email: "brielle@gmail.com",
            phone: "666-666-6666",
            status: {key: "Closed", class: "danger"}
        },
        {
            id: 7,
            thumb: "profile-16.jpeg",
            name: "Herrod Chandler",
            email: "herrod@gmail.com",
            phone: "555-555-5555",
            status: {key: "Approved", class: "primary"}
        },
        {
            id: 1,
            thumb: "profile-9.jpeg",
            name: "Tiger Nixon",
            email: "tiger@gmail.com",
            phone: "555-555-5555",
            status: {key: "Approved", class: "primary"}
        },
        {
            id: 2,
            thumb: "profile-11.jpeg",
            name: "Garrett Winters",
            email: "garrett@gmail.com",
            phone: "222-222-2222",
            status: {key: "Closed", class: "danger"}
        },
        {
            id: 3,
            thumb: "profile-12.jpeg",
            name: "Ashton Cox",
            email: "ashton@gmail.com",
            phone: "333-333-3333",
            status: {key: "Suspended", class: "warning"}
        },
        {
            id: 4,
            thumb: "profile-13.jpeg",
            name: "Cedric Kelly",
            email: "cedric@gmail.com",
            phone: "444-444-4444",
            status: {key: "Suspended", class: "warning"}
        },
        {
            id: 5,
            thumb: "profile-14.jpeg",
            name: "Airi Satou",
            email: "airi@gmail.com",
            phone: "555-555-5555",
            status: {key: "Approved", class: "primary"}
        },
        {
            id: 6,
            thumb: "profile-15.jpeg",
            name: "Brielle Williamson",
            email: "brielle@gmail.com",
            phone: "666-666-6666",
            status: {key: "Closed", class: "danger"}
        },
        {
            id: 7,
            thumb: "profile-16.jpeg",
            name: "Herrod Chandler",
            email: "herrod@gmail.com",
            phone: "555-555-5555",
            status: {key: "Approved", class: "primary"}
        },
        {
            id: 1,
            thumb: "profile-9.jpeg",
            name: "Tiger Nixon",
            email: "tiger@gmail.com",
            phone: "555-555-5555",
            status: {key: "Approved", class: "primary"}
        },
        {
            id: 2,
            thumb: "profile-11.jpeg",
            name: "Garrett Winters",
            email: "garrett@gmail.com",
            phone: "222-222-2222",
            status: {key: "Closed", class: "danger"}
        },
        {
            id: 3,
            thumb: "profile-12.jpeg",
            name: "Ashton Cox",
            email: "ashton@gmail.com",
            phone: "333-333-3333",
            status: {key: "Suspended", class: "warning"}
        },
        {
            id: 4,
            thumb: "profile-13.jpeg",
            name: "Cedric Kelly",
            email: "cedric@gmail.com",
            phone: "444-444-4444",
            status: {key: "Suspended", class: "warning"}
        },
        {
            id: 5,
            thumb: "profile-14.jpeg",
            name: "Airi Satou",
            email: "airi@gmail.com",
            phone: "555-555-5555",
            status: {key: "Approved", class: "primary"}
        },
        {
            id: 6,
            thumb: "profile-15.jpeg",
            name: "Brielle Williamson",
            email: "brielle@gmail.com",
            phone: "666-666-6666",
            status: {key: "Closed", class: "danger"}
        },
        {
            id: 7,
            thumb: "profile-16.jpeg",
            name: "Herrod Chandler",
            email: "herrod@gmail.com",
            phone: "555-555-5555",
            status: {key: "Approved", class: "primary"}
        },
    ];
})

</script>

<template>
    <Head :title="$t('users')"/>
    <AppLayout>
        <ServerTable :columns="columns" :items="items">
            <template #id="props">
                <div class="checkbox-outline-primary custom-control custom-checkbox">
                    <input variant="primary" type="checkbox" class="custom-control-input"
                           :id="props.row.id"/>
                    <label class="custom-control-label" :for="props.row.id"></label>
                </div>
            </template>
            <template #profile="props">
                <img :src="'/assets/images/' + props.row.thumb" class="rounded-circle profile-img"
                     alt="avatar"/>
            </template>
            <template #status="props">
                                <span class="badge inv-status"
                                      :class="'badge-' + props.row.status.class">{{ props.row.status.key }}</span>
            </template>
            <template #actions>
                <div class="me-2 custom-dropdown dropdown btn-group">
                    <a class="btn dropdown-toggle btn-icon-only" href="#" role="button" id="pendingTask"
                       data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <svg
                            xmlns="http://www.w3.org/2000/svg"
                            style="width: 24px; height: 24px"
                            width="24"
                            height="24"
                            viewBox="0 0 24 24"
                            fill="none"
                            stroke="currentColor"
                            stroke-width="2"
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            class="feather feather-more-horizontal"
                        >
                            <circle cx="12" cy="12" r="1"></circle>
                            <circle cx="19" cy="12" r="1"></circle>
                            <circle cx="5" cy="12" r="1"></circle>
                        </svg>
                    </a>

                    <ul class="dropdown-menu dropdown-menu-end">
                        <li>
                            <a href="javascript:void(0);" class="dropdown-item"> view </a>
                        </li>
                        <li>
                            <a href="javascript:void(0);" class="dropdown-item"> Edit </a>
                        </li>
                        <li>
                            <a href="javascript:void(0);" class="dropdown-item"> View Response </a>
                        </li>
                        <li>
                            <a href="javascript:void(0);" class="dropdown-item"> Delete </a>
                        </li>
                    </ul>
                </div>
            </template>
            <template #salary="props"> ${{ props.row.salary }}</template>
        </ServerTable>
    </AppLayout>
</template>
