<script setup>
import {Link} from "@inertiajs/vue3";
</script>

<template>
    <nav class="topbar">
        <ul class="list-unstyled menu-categories" id="topAccordion">
            <li class="menu single-menu">
                <a href="javascript:;" class="dropdown-toggle autodroprown">
                    <div class="">
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
                            class="feather feather-home"
                        >
                            <path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path>
                            <polyline points="9 22 9 12 15 12 15 22"></polyline>
                        </svg>
                        <span>{{ $t('dashboard') }}</span>
                    </div>
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
                </a>
                <ul class="collapse submenu list-unstyled">
                    <li>
                        <Link href="/"> {{ $t('sales') }}</Link>
                    </li>
                    <li>
                        <Link href="/index2">{{ $t('analytics') }}</Link>
                    </li>
                </ul>
            </li>

            <li class="menu single-menu">
                <a href="javascript:void(0);" class="dropdown-toggle">
                    <div class="">
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
                            class="feather feather-cpu"
                        >
                            <rect x="4" y="4" width="16" height="16" rx="2" ry="2"></rect>
                            <rect x="9" y="9" width="6" height="6"></rect>
                            <line x1="9" y1="1" x2="9" y2="4"></line>
                            <line x1="15" y1="1" x2="15" y2="4"></line>
                            <line x1="9" y1="20" x2="9" y2="23"></line>
                            <line x1="15" y1="20" x2="15" y2="23"></line>
                            <line x1="20" y1="9" x2="23" y2="9"></line>
                            <line x1="20" y1="14" x2="23" y2="14"></line>
                            <line x1="1" y1="9" x2="4" y2="9"></line>
                            <line x1="1" y1="14" x2="4" y2="14"></line>
                        </svg>
                        <span>{{ $t('apps') }}</span>
                    </div>
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
                </a>
                <ul class="collapse submenu list-unstyled">
                    <li>
                        <Link href="/apps/chat">Chat</Link>
                    </li>
                    <li>
                        <Link href="/apps/mailbox">Mailbox</Link>
                    </li>
                    <li>
                        <Link href="/apps/todo-list">Todo List</Link>
                    </li>
                    <li>
                        <Link href="/apps/notes">Notes</Link>
                    </li>
                    <li>
                        <Link href="/apps/scrumboard">Scrumboard</Link>
                    </li>
                    <li>
                        <Link href="/apps/contacts">Contacts</Link>
                    </li>

                    <li class="sub-sub-submenu-list">
                        <a href="javascript:;">
                            Invoice
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
                                class="feather feather-chevron-right"
                            >
                                <polyline points="9 18 15 12 9 6"></polyline>
                            </svg>
                        </a>
                        <ul class="collapse list-unstyled sub-submenu">
                            <li>
                                <Link href="/apps/invoice/list">List</Link>
                            </li>
                            <li>
                                <Link href="/apps/invoice/preview">Preview</Link>
                            </li>
                            <li>
                                <Link href="/apps/invoice/add">Add</Link>
                            </li>
                            <li>
                                <Link href="/apps/invoice/edit">Edit</Link>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <Link href="/apps/calendar">Calendar</Link>
                    </li>
                </ul>
            </li>

            <li class="menu single-menu">
                <a href="javascript:;" class="dropdown-toggle">
                    <div class="">
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
                            class="feather feather-box"
                        >
                            <path
                                d="M21 16V8a2 2 0 0 0-1-1.73l-7-4a2 2 0 0 0-2 0l-7 4A2 2 0 0 0 3 8v8a2 2 0 0 0 1 1.73l7 4a2 2 0 0 0 2 0l7-4A2 2 0 0 0 21 16z"></path>
                            <polyline points="3.27 6.96 12 12.01 20.73 6.96"></polyline>
                            <line x1="12" y1="22.08" x2="12" y2="12"></line>
                        </svg>
                        <span>{{ $t('components') }}</span>
                    </div>
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
                </a>
                <ul class="collapse submenu list-unstyled">
                    <li>
                        <Link href="/components/tabs">Tabs</Link>
                    </li>
                    <li>
                        <Link href="/components/accordions">Accordions</Link>
                    </li>
                    <li>
                        <Link href="/components/modals">Modals</Link>
                    </li>
                    <li>
                        <Link href="/components/cards">Cards</Link>
                    </li>
                    <li>
                        <Link href="/components/carousel">Carousel</Link>
                    </li>
                    <li>
                        <Link href="/components/countdown">Countdown</Link>
                    </li>
                    <li>
                        <Link href="/components/counter">Counter</Link>
                    </li>
                    <li>
                        <Link href="/components/sweetalert">Sweet Alerts</Link>
                    </li>
                    <li>
                        <Link href="/components/timeline">Timeline</Link>
                    </li>
                    <li>
                        <Link href="/components/notifications">Notifications</Link>
                    </li>
                    <li>
                        <Link href="/components/media-object">Media Object</Link>
                    </li>
                    <li>
                        <Link href="/components/list-group">List Group</Link>
                    </li>
                    <li>
                        <Link href="/components/pricing-table">Pricing Tables</Link>
                    </li>
                    <li>
                        <Link href="/components/lightbox"> Lightbox</Link>
                    </li>
                </ul>
            </li>

            <li class="menu single-menu">
                <a href="javascript:;" class="dropdown-toggle">
                    <div class="">
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
                            class="feather feather-zap"
                        >
                            <polygon points="13 2 3 14 12 14 11 22 21 10 12 10 13 2"></polygon>
                        </svg>
                        <span>{{ $t('ui_kit') }}</span>
                    </div>
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
                </a>
                <ul class="collapse submenu list-unstyled">
                    <li>
                        <Link href="/elements/alerts">Alerts</Link>
                    </li>
                    <li>
                        <Link href="/elements/avatar">Avatar</Link>
                    </li>
                    <li>
                        <Link href="/elements/badges">Badges</Link>
                    </li>
                    <li>
                        <Link href="/elements/breadcrumbs">Breadcrumbs</Link>
                    </li>
                    <li>
                        <Link href="/elements/buttons">Buttons</Link>
                    </li>
                    <li>
                        <Link href="/elements/buttons-group">Button Groups</Link>
                    </li>
                    <li>
                        <Link href="/elements/color-library">Color Library</Link>
                    </li>
                    <li>
                        <Link href="/elements/dropdown">Dropdown</Link>
                    </li>
                    <li>
                        <Link href="/elements/infobox">Infobox</Link>
                    </li>
                    <li>
                        <Link href="/elements/jumbotron">Jumbotron</Link>
                    </li>
                    <li>
                        <Link href="/elements/loader">Loader</Link>
                    </li>
                    <li>
                        <Link href="/elements/pagination">Pagination</Link>
                    </li>
                    <li>
                        <Link href="/elements/popovers">Popovers</Link>
                    </li>
                    <li>
                        <Link href="/elements/progress-bar">Progress Bar</Link>
                    </li>
                    <li>
                        <Link href="/elements/search">Search</Link>
                    </li>
                    <li>
                        <Link href="/elements/tooltips">Tooltips</Link>
                    </li>
                    <li>
                        <Link href="/elements/treeview">Treeview</Link>
                    </li>
                    <li>
                        <Link href="/elements/typography">Typography</Link>
                    </li>
                </ul>
            </li>

            <li class="menu single-menu">
                <a href="javascript:;" class="dropdown-toggle">
                    <div class="">
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
                            class="feather feather-layout"
                        >
                            <rect x="3" y="3" width="18" height="18" rx="2" ry="2"></rect>
                            <line x1="3" y1="9" x2="21" y2="9"></line>
                            <line x1="9" y1="21" x2="9" y2="9"></line>
                        </svg>
                        <span>{{ $t('tables') }}</span>
                    </div>
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
                </a>
                <ul class="collapse submenu list-unstyled">
                    <li>
                        <Link href="/tables/basic">Basic</Link>
                    </li>
                    <li class="sub-sub-submenu-list">
                        <a href="javascript:;" class="dropdown-toggle">
                            DataTables
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
                                class="feather feather-chevron-right"
                            >
                                <polyline points="9 18 15 12 9 6"></polyline>
                            </svg>
                        </a>
                        <ul class="collapse list-unstyled sub-submenu">
                            <li class="sub-sub-sub-submenu-list">
                                <a href="javascript:;" class="dropdown-toggle">
                                    vue3-datatable
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
                                        class="feather feather-chevron-right"
                                    >
                                        <polyline points="9 18 15 12 9 6"></polyline>
                                    </svg>
                                </a>
                                <ul class="collapse list-unstyled sub-sub-submenu">
                                    <li>
                                        <Link href="/tables/vue3-datatable/basic">Basic</Link>
                                    </li>
                                    <li>
                                        <Link href="/tables/vue3-datatable/advance">Advanced</Link>
                                    </li>
                                    <li>
                                        <Link href="/tables/vue3-datatable/order-sorting">Order Sorting</Link>
                                    </li>
                                    <li>
                                        <Link href="/tables/vue3-datatable/alt-pagination">Alt. Pagination
                                        </Link>
                                    </li>
                                    <li>
                                        <Link href="/tables/vue3-datatable/search">Search</Link>
                                    </li>
                                    <li>
                                        <Link href="/tables/vue3-datatable/checkbox">Checkbox</Link>
                                    </li>
                                    <li>
                                        <Link href="/tables/vue3-datatable/slot">Slot</Link>
                                    </li>
                                    <li>
                                        <Link href="/tables/vue3-datatable/column-filter">Column Filter</Link>
                                    </li>
                                    <li>
                                        <Link href="/tables/vue3-datatable/actions">Actions</Link>
                                    </li>
                                    <li>
                                        <Link href="/tables/vue3-datatable/sticky-header">Sticky Header</Link>
                                    </li>
                                    <li>
                                        <Link href="/tables/vue3-datatable/column-chooser">Column Chooser</Link>
                                    </li>
                                </ul>
                            </li>
                            <li class="sub-sub-sub-submenu-list">
                                <a href="javascript:;" class="dropdown-toggle">
                                    v3-table
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
                                        class="feather feather-chevron-right"
                                    >
                                        <polyline points="9 18 15 12 9 6"></polyline>
                                    </svg>
                                </a>
                                <ul class="collapse list-unstyled sub-sub-submenu">
                                    <li>
                                        <Link href="/tables/v3-table/basic">Basic</Link>
                                    </li>
                                    <li>
                                        <Link href="/tables/v3-table/striped">Striped Table</Link>
                                    </li>
                                    <li>
                                        <Link href="/tables/v3-table/order-sorting">Order Sorting</Link>
                                    </li>
                                    <li>
                                        <Link href="/tables/v3-table/multi-column">Multi Column</Link>
                                    </li>
                                    <li>
                                        <Link href="/tables/v3-table/multiple-tables">Multiple Tables</Link>
                                    </li>
                                    <li>
                                        <Link href="/tables/v3-table/alt-pagination">Alt. Pagination</Link>
                                    </li>
                                    <li>
                                        <Link href="/tables/v3-table/custom">Custom</Link>
                                    </li>
                                    <li>
                                        <Link href="/tables/v3-table/range-search">Range Search</Link>
                                    </li>
                                    <li>
                                        <Link href="/tables/v3-table/export">Export</Link>
                                    </li>
                                    <li>
                                        <Link href="/tables/v3-table/live-dom-ordering">Live DOM ordering</Link>
                                    </li>
                                    <li>
                                        <Link href="/tables/v3-table/miscellaneous">Miscellaneous</Link>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </li>
                </ul>
            </li>

            <li class="menu single-menu">
                <a href="javascript:;" class="dropdown-toggle">
                    <div class="">
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
                            class="feather feather-clipboard"
                        >
                            <path
                                d="M16 4h2a2 2 0 0 1 2 2v14a2 2 0 0 1-2 2H6a2 2 0 0 1-2-2V6a2 2 0 0 1 2-2h2"></path>
                            <rect x="8" y="2" width="8" height="4" rx="1" ry="1"></rect>
                        </svg>
                        <span>{{ $t('forms') }}</span>
                    </div>
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
                </a>
                <ul class="collapse submenu list-unstyled">
                    <li>
                        <Link href="/forms/basic">Basic</Link>
                    </li>
                    <li>
                        <Link href="/forms/input-group">Input Group</Link>
                    </li>
                    <li>
                        <Link href="/forms/layouts">Layouts</Link>
                    </li>
                    <li>
                        <Link href="/forms/validation">Validation</Link>
                    </li>
                    <li>
                        <Link href="/forms/input-mask">Input Mask</Link>
                    </li>
                    <li>
                        <Link href="/forms/select2">Select2</Link>
                    </li>
                    <li>
                        <Link href="/forms/touchspin">TouchSpin</Link>
                    </li>
                    <li>
                        <Link href="/forms/checkbox-radio">Checkbox &amp; Radio</Link>
                    </li>
                    <li>
                        <Link href="/forms/switches">Switches</Link>
                    </li>
                    <li>
                        <Link href="/forms/wizards">Wizards</Link>
                    </li>
                    <li>
                        <Link href="/forms/file-upload">File Upload</Link>
                    </li>
                    <li>
                        <Link href="/forms/quill-editor">Quill Editor</Link>
                    </li>
                    <li>
                        <Link href="/forms/markdown-editor">Markdown Editor</Link>
                    </li>
                    <li>
                        <Link href="/forms/date-picker">Date &amp; Range Picker</Link>
                    </li>
                    <li>
                        <Link href="/forms/clipboard">Clipboard</Link>
                    </li>
                </ul>
            </li>

            <li class="menu single-menu">
                <a href="javascript:;" class="dropdown-toggle">
                    <div class="">
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
                            class="feather feather-file"
                        >
                            <path d="M13 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V9z"></path>
                            <polyline points="13 2 13 9 20 9"></polyline>
                        </svg>
                        <span>{{ $t('pages') }}</span>
                    </div>
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
                </a>
                <ul class="collapse submenu list-unstyled">
                    <li>
                        <Link href="/pages/helpdesk">Helpdesk</Link>
                    </li>
                    <li>
                        <Link href="/pages/contact-us">Contact Form</Link>
                    </li>
                    <li>
                        <Link href="/pages/faq">FAQ</Link>
                    </li>
                    <li>
                        <Link href="/pages/faq2">FAQ 2</Link>
                    </li>
                    <li>
                        <Link href="/pages/privacy-policy">Privacy Policy</Link>
                    </li>
                    <li><a target="_blank" href="/pages/coming-soon">Coming Soon</a></li>
                    <li>
                        <Link href="/pages/blank-page">Blank Page</Link>
                    </li>
                    <li>
                        <Link href="/pages/sample">Sample Page</Link>
                    </li>

                    <li>
                        <Link href="/users/profile">Profile</Link>
                    </li>
                    <li>
                        <Link href="/users/account-setting">Account Settings</Link>
                    </li>
                    <li class="sub-sub-submenu-list">
                        <a href="javascript:;" class="dropdown-toggle">
                            Error
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
                                class="feather feather-chevron-right"
                            >
                                <polyline points="9 18 15 12 9 6"></polyline>
                            </svg>
                        </a>
                        <ul class="collapse list-unstyled sub-submenu">
                            <li><a target="_blank" href="/pages/error404">404</a></li>
                            <li><a target="_blank" href="/pages/error500">500</a></li>
                            <li><a target="_blank" href="/pages/error503">503</a></li>
                            <li><a target="_blank" href="/pages/maintenence">Maintanence</a></li>
                        </ul>
                    </li>
                    <li class="sub-sub-submenu-list">
                        <a href="javascript:;" class="dropdown-toggle">
                            Login
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
                                class="feather feather-chevron-right"
                            >
                                <polyline points="9 18 15 12 9 6"></polyline>
                            </svg>
                        </a>
                        <ul class="collapse list-unstyled sub-submenu">
                            <li><a target="_blank" href="/auth/login">Login Cover</a></li>
                            <li><a target="_blank" href="/auth/login-boxed">Login Boxed</a></li>
                        </ul>
                    </li>
                    <li class="sub-sub-submenu-list">
                        <a href="javascript:;" class="dropdown-toggle">
                            Register
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
                                class="feather feather-chevron-right"
                            >
                                <polyline points="9 18 15 12 9 6"></polyline>
                            </svg>
                        </a>
                        <ul class="collapse list-unstyled sub-submenu">
                            <li><a target="_blank" href="/auth/register">Register Cover</a></li>
                            <li><a target="_blank" href="/auth/register-boxed">Register Boxed</a></li>
                        </ul>
                    </li>

                    <li class="sub-sub-submenu-list">
                        <a href="javascript:;" class="dropdown-toggle">
                            Password Recovery
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
                                class="feather feather-chevron-right"
                            >
                                <polyline points="9 18 15 12 9 6"></polyline>
                            </svg>
                        </a>
                        <ul class="collapse list-unstyled sub-submenu">
                            <li><a target="_blank" href="/auth/pass-recovery">Recover ID Cover</a></li>
                            <li><a target="_blank" href="/auth/pass-recovery-boxed">Recover ID Boxed</a></li>
                        </ul>
                    </li>

                    <li class="sub-sub-submenu-list">
                        <a href="javascript:;" class="dropdown-toggle">
                            Lockscreen
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
                                class="feather feather-chevron-right"
                            >
                                <polyline points="9 18 15 12 9 6"></polyline>
                            </svg>
                        </a>
                        <ul class="collapse list-unstyled sub-submenu">
                            <li><a target="_blank" href="/auth/lockscreen">Unlock Cover</a></li>
                            <li><a target="_blank" href="/auth/lockscreen-boxed">Unlock Boxed</a></li>
                        </ul>
                    </li>
                </ul>
            </li>

            <li class="menu single-menu">
                <a href="javascript:;" class="dropdown-toggle">
                    <div class="">
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
                            class="feather feather-plus-circle"
                        >
                            <circle cx="12" cy="12" r="10"></circle>
                            <line x1="12" y1="8" x2="12" y2="16"></line>
                            <line x1="8" y1="12" x2="16" y2="12"></line>
                        </svg>
                        <span>{{ $t('more') }}</span>
                    </div>
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
                </a>
                <ul class="collapse submenu list-unstyled">
                    <li>
                        <Link href="/dragndrop">Drag and Drop</Link>
                    </li>
                    <li>
                        <Link href="/widgets">Widgets</Link>
                    </li>
                    <li>
                        <Link href="/charts/apex-chart">Charts</Link>
                    </li>
                    <li>
                        <Link href="/font-icons">Font Icons</Link>
                    </li>
                    <li>
                        <a target="_blank" href="https://cork-vue.sbthemes.com"> Documentation </a>
                    </li>
                </ul>
            </li>
        </ul>
    </nav>
</template>

<style scoped>

</style>
