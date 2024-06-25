<script setup>
import {onMounted, ref} from "vue";
import {useTable} from "@/Composables/table.js"
import AddLinkButton from "@/Components/AddLinkButton.vue";

const columns = ref(['id', 'name', 'email', 'created_at', 'updated_at', 'actions'])

const options = ref({
    perPage: 10,
    perPageValues: [10, 20, 50, 100, 200, 500],
    skin: "table table-hover table-striped",
    saveState: true,
    storage: 'local',
    columnsClasses: {actions: "actions text-center"},
    sortIcon: {base: "sort-icon-none", up: "sort-icon-asc", down: "sort-icon-desc"},
    pagination: {nav: "scroll", chunk: 3, edge: true},
    texts: {
        count: "Showing {from} to {to} of {count} entries",
        filter: "",
        filterPlaceholder: "Search...",
        limit: "Results:",
        first: "«",
        last: "»",
        prev: "‹",
        next: "›",
    },
    orderBy: {column: 'id', ascending: false},
    resizableColumns: false,
    hiddenColumns: [],
    params: {
        paginate: true
    },
    requestAdapter: function (data) {
        data.dir = data.dir === 0 ? 'asc' : 'desc';
        return data;
    },
    requestKeys: {
        query: 'search',
        limit: 'per_page',
        orderBy: 'sort',
        ascending: 'dir',
        page: 'page',
        byColumn: 'byColumn'
    },
    responseAdapter: function (response) {
        response = response.data
        return {
            data: response.data,
            count: response.meta.total
        }
    }
});

const {exportTable, tableOptions} = useTable();

</script>

<template>
    <div class="custom-table">
        <v-server-table :url="route('users.search')" :columns="columns" :options="options">
            <template #beforeFilter>
                <div class="d-flex flex-wrap justify-content-center justify-content-sm-start gap-2 pb-0">
                    <div class="custom-dropdown dropdown btn-group">
                        <a class="btn dropdown-toggle btn-icon-only" href="#" role="button" id="pendingTask"
                           data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <button aria-haspopup="true" aria-expanded="false" type="button"
                                    class="btn dropdown-toggle btn-outline-success">
                                Exports
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
                                    class="feather feather-chevron-down"
                                >
                                    <polyline points="6 9 12 15 18 9"></polyline>
                                </svg>
                            </button>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end" @click="$event.stopPropagation()">
                            <li><a class="dropdown-item" href="javascript:void(0);"
                                   @click="exportTable('csv')">CSV</a></li>
                            <li><a class="dropdown-item" href="javascript:void(0);"
                                   @click="exportTable('print')">Print</a></li>
                            <li><a class="dropdown-item" href="javascript:void(0);"
                                   @click="exportTable('pdf')">PDF</a></li>
                        </ul>
                    </div>
                    <!--                                <div class="custom-dropdown dropdown btn-group">-->
                    <!--                                    <a class="btn dropdown-toggle btn-icon-only" href="#" role="button" id="pendingTask"-->
                    <!--                                       data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">-->
                    <!--                                        <button aria-haspopup="true" aria-expanded="false" type="button"-->
                    <!--                                                class="btn dropdown-toggle btn-outline-primary">-->
                    <!--                                            Columns-->
                    <!--                                            <svg-->
                    <!--                                                xmlns="http://www.w3.org/2000/svg"-->
                    <!--                                                width="24"-->
                    <!--                                                height="24"-->
                    <!--                                                viewBox="0 0 24 24"-->
                    <!--                                                fill="none"-->
                    <!--                                                stroke="currentColor"-->
                    <!--                                                stroke-width="2"-->
                    <!--                                                stroke-linecap="round"-->
                    <!--                                                stroke-linejoin="round"-->
                    <!--                                                class="feather feather-chevron-down"-->
                    <!--                                            >-->
                    <!--                                                <polyline points="6 9 12 15 18 9"></polyline>-->
                    <!--                                            </svg>-->
                    <!--                                        </button>-->
                    <!--                                    </a>-->
                    <!--                                    <div class="dropdown-menu dropdown-menu-end" @click="$event.stopPropagation()">-->
                    <!--                                        <div class="checkbox-outline-primary mx-3 my-2 custom-control custom-checkbox"-->
                    <!--                                             v-for="(column, index) in columns" :key="index">-->
                    <!--                                            <input-->
                    <!--                                                variant="primary"-->
                    <!--                                                type="checkbox"-->
                    <!--                                                class="custom-control-input"-->
                    <!--                                                :checked="!tableOptions.hiddenColumns.includes(column)"-->
                    <!--                                                :id="'chk' + index"-->
                    <!--                                                @change="columnVisibility(column, $event.target.checked)"-->
                    <!--                                            />-->
                    <!--                                            <label class="custom-control-label" :for="'chk' + index">-->
                    <!--                                                {{ capitalize(column) }}-->
                    <!--                                            </label>-->
                    <!--                                        </div>-->
                    <!--                                    </div>-->
                    <!--                                </div>-->
                </div>
            </template>
            <template #id="props">
                <div class="checkbox-outline-primary custom-control custom-checkbox">
                    <input variant="primary" type="checkbox" class="custom-control-input"
                           :id="props.row.id"/>
                    <label class="custom-control-label" :for="props.row.id"></label>
                </div>
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
                            <a href="javascript:void(0);" class="dropdown-item"> View </a>
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
        </v-server-table>
    </div>
</template>

<style scoped>

</style>
