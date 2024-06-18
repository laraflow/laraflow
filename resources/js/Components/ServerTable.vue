<script setup>
import {onMounted, ref, useSlots} from "vue";

//pdf export
import jsPDF from "jspdf";
import "jspdf-autotable";

const props = defineProps({
    columns: {
        type: Array,
        required: true,
    },
    options: {
        type: Object,
        required: false,
        default: {}
    },
    items: {
        type: Array,
    }
})

const tableOptions = ref({
    perPage: 5,
    perPageValues: [5, 10, 20, 50, 100, 200, 500],
    skin: "table table-hover table-striped",
    saveState: true,
    storage: 'local',
    columnsClasses: {actions: "actions text-right"},
    sortIcon: {base: "sort-icon-none", up: "sort-icon-asc", down: "sort-icon-desc"},
    pagination: {nav: "fixed", chunk: 10, edge: true},
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
    // filterByColumn: true,
    hiddenColumns: []
});

const slots = useSlots();

onMounted(() => {
    setTimeout(() => {
        initTooltip();
    }, 500);

})
const initTooltip = () => {
    var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'));
    tooltipTriggerList.map((tooltipTriggerEl) => {
        return new window.bootstrap.Tooltip(tooltipTriggerEl);
    });
}
const capitalize = (text) => {
    return text
        .replace("_", " ")
        .replace("-", " ")
        .toLowerCase()
        .split(" ")
        .map((s) => s.charAt(0).toUpperCase() + s.substring(1))
        .join(" ");
}
const columnVisibility = (column, value) => {
    if (!tableOptions.value.hiddenColumns.includes(column) && !value) {
        tableOptions.value.hiddenColumns.push(column);
    } else {
        tableOptions.value.hiddenColumns = tableOptions.value.hiddenColumns.filter((d) => d !== column);
    }
}

const exportTable = (type) => {
    let cols = props.columns.filter((d) => d != "profile" && d != "action");
    let records = props.items;
    let filename = "table";

    if (type == "csv") {
        let coldelimiter = ",";
        let linedelimiter = "\n";
        let result = cols
            .map((d) => {
                return capitalize(d);
            })
            .join(coldelimiter);
        result += linedelimiter;
        records.map((item) => {
            cols.map((d, index) => {
                if (index > 0) {
                    result += coldelimiter;
                }
                let val = item[d] ? item[d] : "";
                result += val;
            });
            result += linedelimiter;
        });

        if (result == null) return;
        if (!result.match(/^data:text\/csv/i) && !window.navigator.msSaveOrOpenBlob) {
            var data = "data:application/csv;charset=utf-8," + encodeURIComponent(result);
            var link = document.createElement("a");
            link.setAttribute("href", data);
            link.setAttribute("download", filename + ".csv");
            link.click();
        } else {
            var blob = new Blob([result]);
            if (window.navigator.msSaveOrOpenBlob) {
                window.navigator.msSaveBlob(blob, filename + ".csv");
            }
        }
    } else if (type == "print") {
        var rowhtml = "<p>" + filename + "</p>";
        rowhtml += '<table style="width: 100%; " cellpadding="0" cellcpacing="0"><thead><tr style="color: #515365; background: #eff5ff; -webkit-print-color-adjust: exact; print-color-adjust: exact; "> ';
        cols.map((d) => {
            rowhtml += "<th>" + capitalize(d) + "</th>";
        });
        rowhtml += "</tr></thead>";
        rowhtml += "<tbody>";

        records.map((item) => {
            rowhtml += "<tr>";
            cols.map((d) => {
                let val = item[d] ? item[d] : "";
                rowhtml += "<td>" + val + "</td>";
            });
            rowhtml += "</tr>";
        });
        rowhtml +=
            "<style>body {font-family:Arial; color:#495057;}p{text-align:center;font-size:18px;font-weight:bold;margin:15px;}table{ border-collapse: collapse; border-spacing: 0; }th,td{font-size:12px;text-align:left;padding: 4px;}th{padding:8px 4px;}tr:nth-child(2n-1){background:#f7f7f7; }</style>";
        rowhtml += "</tbody></table>";
        var winPrint = window.open("", "", "left=0,top=0,width=1000,height=600,toolbar=0,scrollbars=0,status=0");
        winPrint.document.write("<title>Print</title>" + rowhtml);
        winPrint.document.close();
        winPrint.focus();
        winPrint.print();
        // winPrint.close();
    } else if (type == "pdf") {
        cols = cols.map((d) => {
            return {header: capitalize(d), dataKey: d};
        });
        const doc = new jsPDF("l", "pt", cols.length > 10 ? "a3" : "a4");
        doc.autoTable({
            headStyles: {fillColor: "#eff5ff", textColor: "#515365"},
            columns: cols,
            body: records,
            styles: {overflow: "linebreak"},
            pageBreak: "auto",
            margin: {top: 45},
            didDrawPage: () => {
                doc.text("Export Table", cols.length > 10 ? 535 : 365, 30);
            },
        });
        doc.save(filename + ".pdf");
    }
}

const excelColumns = () => {
    return {
        Id: "id",
        Profile: "profile",
        Name: "name",
        Email: "email",
        Phone: "phone",
        Status: "status"
    };
}

defineOptions({
    inheritAttrs: false
})

</script>

<template>
    <div class="row mt-4 mx-2">
        <div class="col-xl-12 col-lg-12 col-sm-12 layout-spacing">
            <div class="panel p-0" style="min-height: 70vh !important;">
                <div class="custom-table">
                    <v-client-table :data="items" :columns="columns" :options="tableOptions" v-bind="slots">
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
                                <div class="custom-dropdown dropdown btn-group">
                                    <a class="btn dropdown-toggle btn-icon-only" href="#" role="button" id="pendingTask"
                                       data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <button aria-haspopup="true" aria-expanded="false" type="button"
                                                class="btn dropdown-toggle btn-outline-primary">
                                            Columns
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
                                    <div class="dropdown-menu dropdown-menu-end" @click="$event.stopPropagation()">
                                        <div class="checkbox-outline-primary mx-3 my-2 custom-control custom-checkbox"
                                             v-for="(column, index) in columns" :key="index">
                                            <input
                                                variant="primary"
                                                type="checkbox"
                                                class="custom-control-input"
                                                :checked="!tableOptions.hiddenColumns.includes(column)"
                                                :id="'chk' + index"
                                                @change="columnVisibility(column, $event.target.checked)"
                                            />
                                            <label class="custom-control-label" :for="'chk' + index">
                                                {{ capitalize(column) }}
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </template>
                    </v-client-table>
                </div>
            </div>
        </div>
    </div>
</template>

<style scoped>

</style>
