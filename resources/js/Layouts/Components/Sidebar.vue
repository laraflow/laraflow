<script setup>
import {onMounted, ref} from 'vue';
import {useStore} from 'vuex';
import {Link} from "@inertiajs/vue3";
import {PerfectScrollbar} from "vue3-perfect-scrollbar";

const store = useStore();

const menu_collapse = ref('dashboard');

onMounted(() => {
    const selector = document.querySelector('#sidebar a[href="' + window.location.pathname + '"]');
    if (selector) {
        const ul = selector.closest('ul.collapse');
        if (ul) {
            let ele = ul.closest('li.menu').querySelectorAll('.dropdown-toggle');
            if (ele) {
                ele = ele[0];
                setTimeout(() => {
                    ele.click();
                });
            }
        } else {
            selector.click();
        }
    }
});

const toggleMobileMenu = () => {
    if (window.innerWidth < 991) {
        store.commit('toggleSideBar', !store.state.is_show_sidebar);
    }
};
</script>
<template>
    <div class="sidebar-wrapper sidebar-theme">
        <nav ref="menu" id="sidebar">
            <div class="shadow-bottom"></div>
            <PerfectScrollbar class="list-unstyled menu-categories" tag="ul"
                              :options="{ wheelSpeed: 0.5, swipeEasing: !0, minScrollbarLength: 40, maxScrollbarLength: 300, suppressScrollX: true }">

                <li class="menu" @click="toggleMobileMenu">
                    <Link :href="route('dashboard')"
                          aria-expanded="false"
                          :class="{ 'dropdown-toggle' : true, 'router-link-active active': route().current('dashboard')}">
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
                    </Link>
                </li>
                <li class="menu">
                    <a class="dropdown-toggle" data-bs-toggle="collapse" data-bs-target="#authentication"
                       aria-controls="authentication" aria-expanded="false">
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
                                class="feather feather-lock"
                            >
                                <rect x="3" y="11" width="18" height="11" rx="2" ry="2"></rect>
                                <path d="M7 11V7a5 5 0 0 1 10 0v4"></path>
                            </svg>
                            <span>{{ $t('authentication') }}</span>
                        </div>
                        <div>
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
                        </div>
                    </a>

                    <ul id="authentication" class="collapse submenu list-unstyled" data-bs-parent="#sidebar">
                        <li @click="toggleMobileMenu">
                            <Link
                                :href="route('users.index')"
                                :class="{ 'router-link-active active': route().current('users.index') }">
                                {{ $t('users') }}
                            </Link>
                        </li>
                        <li @click="toggleMobileMenu">
                            <Link :href="route('teams.index')">{{ $t('teams') }}</Link>
                        </li>
                        <li @click="toggleMobileMenu">
                            <Link :href="route('roles.index')">{{ $t('roles') }}</Link>
                        </li>
                        <li @click="toggleMobileMenu">
                            <Link :href="route('permissions.index')">{{ $t('permissions') }}</Link>
                        </li>
                    </ul>
                </li>

                <!--                <li class="menu">-->
                <!--                    <a class="dropdown-toggle" data-bs-toggle="collapse" data-bs-target="#dashboard"-->
                <!--                       aria-controls="dashboard" aria-expanded="false">-->
                <!--                        <div class="">-->
                <!--                            <svg-->
                <!--                                xmlns="http://www.w3.org/2000/svg"-->
                <!--                                width="24"-->
                <!--                                height="24"-->
                <!--                                viewBox="0 0 24 24"-->
                <!--                                fill="none"-->
                <!--                                stroke="currentColor"-->
                <!--                                stroke-width="2"-->
                <!--                                stroke-linecap="round"-->
                <!--                                stroke-linejoin="round"-->
                <!--                                class="feather feather-home"-->
                <!--                            >-->
                <!--                                <path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path>-->
                <!--                                <polyline points="9 22 9 12 15 12 15 22"></polyline>-->
                <!--                            </svg>-->
                <!--                            <span>{{ $t('dashboard') }}</span>-->
                <!--                        </div>-->
                <!--                        <div>-->
                <!--                            <svg-->
                <!--                                xmlns="http://www.w3.org/2000/svg"-->
                <!--                                width="24"-->
                <!--                                height="24"-->
                <!--                                viewBox="0 0 24 24"-->
                <!--                                fill="none"-->
                <!--                                stroke="currentColor"-->
                <!--                                stroke-width="2"-->
                <!--                                stroke-linecap="round"-->
                <!--                                stroke-linejoin="round"-->
                <!--                                class="feather feather-chevron-right"-->
                <!--                            >-->
                <!--                                <polyline points="9 18 15 12 9 6"></polyline>-->
                <!--                            </svg>-->
                <!--                        </div>-->
                <!--                    </a>-->

                <!--                    <ul id="dashboard" class="collapse submenu list-unstyled" data-bs-parent="#sidebar">-->
                <!--                        <li>-->
                <!--                            <Link href="/" @click="toggleMobileMenu">-->
                <!--                                {{ $t('sales') }}-->
                <!--                            </Link>-->
                <!--                        </li>-->
                <!--                        <li>-->
                <!--                            <Link href="/index2" @click="toggleMobileMenu">-->
                <!--                                {{ $t('analytics') }}-->
                <!--                            </Link>-->
                <!--                        </li>-->
                <!--                    </ul>-->
                <!--                </li>-->

                <!--                <li class="menu">-->
                <!--                    <a class="dropdown-toggle" data-bs-toggle="collapse" data-bs-target="#apps" aria-controls="apps"-->
                <!--                       aria-expanded="false">-->
                <!--                        <div class="">-->
                <!--                            <svg-->
                <!--                                xmlns="http://www.w3.org/2000/svg"-->
                <!--                                width="24"-->
                <!--                                height="24"-->
                <!--                                viewBox="0 0 24 24"-->
                <!--                                fill="none"-->
                <!--                                stroke="currentColor"-->
                <!--                                stroke-width="2"-->
                <!--                                stroke-linecap="round"-->
                <!--                                stroke-linejoin="round"-->
                <!--                                class="feather feather-cpu"-->
                <!--                            >-->
                <!--                                <rect x="4" y="4" width="16" height="16" rx="2" ry="2"></rect>-->
                <!--                                <rect x="9" y="9" width="6" height="6"></rect>-->
                <!--                                <line x1="9" y1="1" x2="9" y2="4"></line>-->
                <!--                                <line x1="15" y1="1" x2="15" y2="4"></line>-->
                <!--                                <line x1="9" y1="20" x2="9" y2="23"></line>-->
                <!--                                <line x1="15" y1="20" x2="15" y2="23"></line>-->
                <!--                                <line x1="20" y1="9" x2="23" y2="9"></line>-->
                <!--                                <line x1="20" y1="14" x2="23" y2="14"></line>-->
                <!--                                <line x1="1" y1="9" x2="4" y2="9"></line>-->
                <!--                                <line x1="1" y1="14" x2="4" y2="14"></line>-->
                <!--                            </svg>-->
                <!--                            <span>{{ $t('apps') }}</span>-->
                <!--                        </div>-->
                <!--                        <div>-->
                <!--                            <svg-->
                <!--                                xmlns="http://www.w3.org/2000/svg"-->
                <!--                                width="24"-->
                <!--                                height="24"-->
                <!--                                viewBox="0 0 24 24"-->
                <!--                                fill="none"-->
                <!--                                stroke="currentColor"-->
                <!--                                stroke-width="2"-->
                <!--                                stroke-linecap="round"-->
                <!--                                stroke-linejoin="round"-->
                <!--                                class="feather feather-chevron-right"-->
                <!--                            >-->
                <!--                                <polyline points="9 18 15 12 9 6"></polyline>-->
                <!--                            </svg>-->
                <!--                        </div>-->
                <!--                    </a>-->
                <!--                    <ul id="apps" class="collapse submenu list-unstyled" data-bs-parent="#sidebar">-->
                <!--                        <li>-->
                <!--                            <Link href="/apps/chat" @click="toggleMobileMenu">Chat</Link>-->
                <!--                        </li>-->
                <!--                        <li>-->
                <!--                            <Link href="/apps/mailbox" @click="toggleMobileMenu">Mailbox</Link>-->
                <!--                        </li>-->
                <!--                        <li>-->
                <!--                            <Link href="/apps/todo-list" @click="toggleMobileMenu">Todo List</Link>-->
                <!--                        </li>-->
                <!--                        <li>-->
                <!--                            <Link href="/apps/notes" @click="toggleMobileMenu">Notes</Link>-->
                <!--                        </li>-->
                <!--                        <li>-->
                <!--                            <Link href="/apps/scrumboard" @click="toggleMobileMenu">Scrumboard</Link>-->
                <!--                        </li>-->
                <!--                        <li>-->
                <!--                            <Link href="/apps/contacts" @click="toggleMobileMenu">Contacts</Link>-->
                <!--                        </li>-->
                <!--                        <li>-->
                <!--                            <a class="dropdown-toggle" href="#appInvoice" data-bs-parent="#apps"-->
                <!--                               data-bs-toggle="collapse" role="button" aria-expanded="false">-->
                <!--                                Invoice-->
                <!--                                <svg-->
                <!--                                    xmlns="http://www.w3.org/2000/svg"-->
                <!--                                    width="24"-->
                <!--                                    height="24"-->
                <!--                                    viewBox="0 0 24 24"-->
                <!--                                    fill="none"-->
                <!--                                    stroke="currentColor"-->
                <!--                                    stroke-width="2"-->
                <!--                                    stroke-linecap="round"-->
                <!--                                    stroke-linejoin="round"-->
                <!--                                    class="feather feather-chevron-right"-->
                <!--                                >-->
                <!--                                    <polyline points="9 18 15 12 9 6"></polyline>-->
                <!--                                </svg>-->
                <!--                            </a>-->

                <!--                            <ul id="appInvoice" class="collapse list-unstyled sub-submenu">-->
                <!--                                <li>-->
                <!--                                    <Link href="/apps/invoice/list" @click="toggleMobileMenu">List</Link>-->
                <!--                                </li>-->
                <!--                                <li>-->
                <!--                                    <Link href="/apps/invoice/preview" @click="toggleMobileMenu">Preview-->
                <!--                                    </Link>-->
                <!--                                </li>-->
                <!--                                <li>-->
                <!--                                    <Link href="/apps/invoice/add" @click="toggleMobileMenu">Add</Link>-->
                <!--                                </li>-->
                <!--                                <li>-->
                <!--                                    <Link href="/apps/invoice/edit" @click="toggleMobileMenu">Edit</Link>-->
                <!--                                </li>-->
                <!--                            </ul>-->
                <!--                        </li>-->
                <!--                        <li>-->
                <!--                            <Link href="/apps/calendar" @click="toggleMobileMenu">Calendar</Link>-->
                <!--                        </li>-->
                <!--                    </ul>-->
                <!--                </li>-->

                <!--                <li class="menu">-->
                <!--                    <a class="dropdown-toggle" data-bs-toggle="collapse" data-bs-target="#components"-->
                <!--                       aria-controls="components" aria-expanded="false">-->
                <!--                        <div class="">-->
                <!--                            <svg-->
                <!--                                xmlns="http://www.w3.org/2000/svg"-->
                <!--                                width="24"-->
                <!--                                height="24"-->
                <!--                                viewBox="0 0 24 24"-->
                <!--                                fill="none"-->
                <!--                                stroke="currentColor"-->
                <!--                                stroke-width="2"-->
                <!--                                stroke-linecap="round"-->
                <!--                                stroke-linejoin="round"-->
                <!--                                class="feather feather-box"-->
                <!--                            >-->
                <!--                                <path-->
                <!--                                    d="M21 16V8a2 2 0 0 0-1-1.73l-7-4a2 2 0 0 0-2 0l-7 4A2 2 0 0 0 3 8v8a2 2 0 0 0 1 1.73l7 4a2 2 0 0 0 2 0l7-4A2 2 0 0 0 21 16z"></path>-->
                <!--                                <polyline points="3.27 6.96 12 12.01 20.73 6.96"></polyline>-->
                <!--                                <line x1="12" y1="22.08" x2="12" y2="12"></line>-->
                <!--                            </svg>-->
                <!--                            <span>{{ $t('components') }}</span>-->
                <!--                        </div>-->
                <!--                        <div>-->
                <!--                            <svg-->
                <!--                                xmlns="http://www.w3.org/2000/svg"-->
                <!--                                width="24"-->
                <!--                                height="24"-->
                <!--                                viewBox="0 0 24 24"-->
                <!--                                fill="none"-->
                <!--                                stroke="currentColor"-->
                <!--                                stroke-width="2"-->
                <!--                                stroke-linecap="round"-->
                <!--                                stroke-linejoin="round"-->
                <!--                                class="feather feather-chevron-right"-->
                <!--                            >-->
                <!--                                <polyline points="9 18 15 12 9 6"></polyline>-->
                <!--                            </svg>-->
                <!--                        </div>-->
                <!--                    </a>-->

                <!--                    <ul id="components" class="collapse submenu list-unstyled" data-bs-parent="#sidebar">-->
                <!--                        <li>-->
                <!--                            <Link href="/components/tabs" @click="toggleMobileMenu">Tabs</Link>-->
                <!--                        </li>-->
                <!--                        <li>-->
                <!--                            <Link href="/components/accordions" @click="toggleMobileMenu">Accordions</Link>-->
                <!--                        </li>-->
                <!--                        <li>-->
                <!--                            <Link href="/components/modals" @click="toggleMobileMenu">Modals</Link>-->
                <!--                        </li>-->
                <!--                        <li>-->
                <!--                            <Link href="/components/cards" @click="toggleMobileMenu">Cards</Link>-->
                <!--                        </li>-->
                <!--                        <li>-->
                <!--                            <Link href="/components/carousel" @click="toggleMobileMenu">Carousel</Link>-->
                <!--                        </li>-->
                <!--                        <li>-->
                <!--                            <Link href="/components/countdown" @click="toggleMobileMenu">Countdown</Link>-->
                <!--                        </li>-->
                <!--                        <li>-->
                <!--                            <Link href="/components/counter" @click="toggleMobileMenu">Counter</Link>-->
                <!--                        </li>-->
                <!--                        <li>-->
                <!--                            <Link href="/components/sweetalert" @click="toggleMobileMenu">Sweet Alerts-->
                <!--                            </Link>-->
                <!--                        </li>-->
                <!--                        <li>-->
                <!--                            <Link href="/components/timeline" @click="toggleMobileMenu">Timeline</Link>-->
                <!--                        </li>-->
                <!--                        <li>-->
                <!--                            <Link href="/components/notifications" @click="toggleMobileMenu">Notifications-->
                <!--                            </Link>-->
                <!--                        </li>-->
                <!--                        <li>-->
                <!--                            <Link href="/components/media-object" @click="toggleMobileMenu">Media Object-->
                <!--                            </Link>-->
                <!--                        </li>-->
                <!--                        <li>-->
                <!--                            <Link href="/components/list-group" @click="toggleMobileMenu">List Group</Link>-->
                <!--                        </li>-->
                <!--                        <li>-->
                <!--                            <Link href="/components/pricing-table" @click="toggleMobileMenu">Pricing Tables-->
                <!--                            </Link>-->
                <!--                        </li>-->
                <!--                        <li>-->
                <!--                            <Link href="/components/lightbox" @click="toggleMobileMenu">Lightbox</Link>-->
                <!--                        </li>-->
                <!--                    </ul>-->
                <!--                </li>-->

                <!--                <li class="menu">-->
                <!--                    <a class="dropdown-toggle" data-bs-toggle="collapse" data-bs-target="#elements"-->
                <!--                       aria-controls="elements" aria-expanded="false">-->
                <!--                        <div class="">-->
                <!--                            <svg-->
                <!--                                xmlns="http://www.w3.org/2000/svg"-->
                <!--                                width="24"-->
                <!--                                height="24"-->
                <!--                                viewBox="0 0 24 24"-->
                <!--                                fill="none"-->
                <!--                                stroke="currentColor"-->
                <!--                                stroke-width="2"-->
                <!--                                stroke-linecap="round"-->
                <!--                                stroke-linejoin="round"-->
                <!--                                class="feather feather-zap"-->
                <!--                            >-->
                <!--                                <polygon points="13 2 3 14 12 14 11 22 21 10 12 10 13 2"></polygon>-->
                <!--                            </svg>-->
                <!--                            <span>{{ $t('elements') }}</span>-->
                <!--                        </div>-->
                <!--                        <div>-->
                <!--                            <svg-->
                <!--                                xmlns="http://www.w3.org/2000/svg"-->
                <!--                                width="24"-->
                <!--                                height="24"-->
                <!--                                viewBox="0 0 24 24"-->
                <!--                                fill="none"-->
                <!--                                stroke="currentColor"-->
                <!--                                stroke-width="2"-->
                <!--                                stroke-linecap="round"-->
                <!--                                stroke-linejoin="round"-->
                <!--                                class="feather feather-chevron-right"-->
                <!--                            >-->
                <!--                                <polyline points="9 18 15 12 9 6"></polyline>-->
                <!--                            </svg>-->
                <!--                        </div>-->
                <!--                    </a>-->

                <!--                    <ul id="elements" class="collapse submenu list-unstyled" data-bs-parent="#sidebar">-->
                <!--                        <li>-->
                <!--                            <Link href="/elements/alerts" @click="toggleMobileMenu">Alerts</Link>-->
                <!--                        </li>-->
                <!--                        <li>-->
                <!--                            <Link href="/elements/avatar" @click="toggleMobileMenu">Avatar</Link>-->
                <!--                        </li>-->
                <!--                        <li>-->
                <!--                            <Link href="/elements/badges" @click="toggleMobileMenu">Badges</Link>-->
                <!--                        </li>-->
                <!--                        <li>-->
                <!--                            <Link href="/elements/breadcrumbs" @click="toggleMobileMenu">Breadcrumbs</Link>-->
                <!--                        </li>-->
                <!--                        <li>-->
                <!--                            <Link href="/elements/buttons" @click="toggleMobileMenu">Buttons</Link>-->
                <!--                        </li>-->
                <!--                        <li>-->
                <!--                            <Link href="/elements/buttons-group" @click="toggleMobileMenu">Button Groups-->
                <!--                            </Link>-->
                <!--                        </li>-->
                <!--                        <li>-->
                <!--                            <Link href="/elements/color-library" @click="toggleMobileMenu">Color Library-->
                <!--                            </Link>-->
                <!--                        </li>-->
                <!--                        <li>-->
                <!--                            <Link href="/elements/dropdown" @click="toggleMobileMenu">Dropdown</Link>-->
                <!--                        </li>-->
                <!--                        <li>-->
                <!--                            <Link href="/elements/infobox" @click="toggleMobileMenu">Infobox</Link>-->
                <!--                        </li>-->
                <!--                        <li>-->
                <!--                            <Link href="/elements/jumbotron" @click="toggleMobileMenu">Jumbotron</Link>-->
                <!--                        </li>-->
                <!--                        <li>-->
                <!--                            <Link href="/elements/loader" @click="toggleMobileMenu">Loader</Link>-->
                <!--                        </li>-->
                <!--                        <li>-->
                <!--                            <Link href="/elements/pagination" @click="toggleMobileMenu">Pagination</Link>-->
                <!--                        </li>-->
                <!--                        <li>-->
                <!--                            <Link href="/elements/popovers" @click="toggleMobileMenu">Popovers</Link>-->
                <!--                        </li>-->
                <!--                        <li>-->
                <!--                            <Link href="/elements/progress-bar" @click="toggleMobileMenu">Progress Bar-->
                <!--                            </Link>-->
                <!--                        </li>-->
                <!--                        <li>-->
                <!--                            <Link href="/elements/search" @click="toggleMobileMenu">Search</Link>-->
                <!--                        </li>-->
                <!--                        <li>-->
                <!--                            <Link href="/elements/tooltips" @click="toggleMobileMenu">Tooltips</Link>-->
                <!--                        </li>-->
                <!--                        <li>-->
                <!--                            <Link href="/elements/treeview" @click="toggleMobileMenu">Treeview</Link>-->
                <!--                        </li>-->
                <!--                        <li>-->
                <!--                            <Link href="/elements/typography" @click="toggleMobileMenu">Typography</Link>-->
                <!--                        </li>-->
                <!--                    </ul>-->
                <!--                </li>-->

                <!--                <li class="menu">-->
                <!--                    <Link href="/font-icons" class="dropdown-toggle" @click="toggleMobileMenu">-->
                <!--                        <div class="">-->
                <!--                            <svg-->
                <!--                                xmlns="http://www.w3.org/2000/svg"-->
                <!--                                width="24"-->
                <!--                                height="24"-->
                <!--                                viewBox="0 0 24 24"-->
                <!--                                fill="none"-->
                <!--                                stroke="currentColor"-->
                <!--                                stroke-width="2"-->
                <!--                                stroke-linecap="round"-->
                <!--                                stroke-linejoin="round"-->
                <!--                                class="feather feather-target"-->
                <!--                            >-->
                <!--                                <circle cx="12" cy="12" r="10"></circle>-->
                <!--                                <circle cx="12" cy="12" r="6"></circle>-->
                <!--                                <circle cx="12" cy="12" r="2"></circle>-->
                <!--                            </svg>-->
                <!--                            <span>{{ $t('font_icons') }}</span>-->
                <!--                        </div>-->
                <!--                    </Link>-->
                <!--                </li>-->

                <!--                <li class="menu">-->
                <!--                    <Link href="/widgets" class="dropdown-toggle" @click="toggleMobileMenu">-->
                <!--                        <div class="">-->
                <!--                            <svg-->
                <!--                                xmlns="http://www.w3.org/2000/svg"-->
                <!--                                width="24"-->
                <!--                                height="24"-->
                <!--                                viewBox="0 0 24 24"-->
                <!--                                fill="none"-->
                <!--                                stroke="currentColor"-->
                <!--                                stroke-width="2"-->
                <!--                                stroke-linecap="round"-->
                <!--                                stroke-linejoin="round"-->
                <!--                                class="feather feather-airplay"-->
                <!--                            >-->
                <!--                                <path-->
                <!--                                    d="M5 17H4a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h16a2 2 0 0 1 2 2v10a2 2 0 0 1-2 2h-1"></path>-->
                <!--                                <polygon points="12 15 17 21 7 21 12 15"></polygon>-->
                <!--                            </svg>-->
                <!--                            <span>{{ $t('widgets') }}</span>-->
                <!--                        </div>-->
                <!--                    </Link>-->
                <!--                </li>-->

                <!--                <li class="menu">-->
                <!--                    <Link href="/tables" class="dropdown-toggle" @click="toggleMobileMenu">-->
                <!--                        <div class="">-->
                <!--                            <svg-->
                <!--                                xmlns="http://www.w3.org/2000/svg"-->
                <!--                                width="24"-->
                <!--                                height="24"-->
                <!--                                viewBox="0 0 24 24"-->
                <!--                                fill="none"-->
                <!--                                stroke="currentColor"-->
                <!--                                stroke-width="2"-->
                <!--                                stroke-linecap="round"-->
                <!--                                stroke-linejoin="round"-->
                <!--                                class="feather feather-layout"-->
                <!--                            >-->
                <!--                                <rect x="3" y="3" width="18" height="18" rx="2" ry="2"></rect>-->
                <!--                                <line x1="3" y1="9" x2="21" y2="9"></line>-->
                <!--                                <line x1="9" y1="21" x2="9" y2="9"></line>-->
                <!--                            </svg>-->
                <!--                            <span>{{ $t('tables') }}</span>-->
                <!--                        </div>-->
                <!--                    </Link>-->
                <!--                </li>-->

                <!--                <li class="menu">-->
                <!--                    <a class="dropdown-toggle" data-bs-toggle="collapse" data-bs-target="#datatables"-->
                <!--                       aria-controls="datatables" aria-expanded="false">-->
                <!--                        <div class="">-->
                <!--                            <svg-->
                <!--                                xmlns="http://www.w3.org/2000/svg"-->
                <!--                                width="24"-->
                <!--                                height="24"-->
                <!--                                viewBox="0 0 24 24"-->
                <!--                                fill="none"-->
                <!--                                stroke="currentColor"-->
                <!--                                stroke-width="2"-->
                <!--                                stroke-linecap="round"-->
                <!--                                stroke-linejoin="round"-->
                <!--                                class="feather feather-layers"-->
                <!--                            >-->
                <!--                                <polygon points="12 2 2 7 12 12 22 7 12 2"></polygon>-->
                <!--                                <polyline points="2 17 12 22 22 17"></polyline>-->
                <!--                                <polyline points="2 12 12 17 22 12"></polyline>-->
                <!--                            </svg>-->
                <!--                            <span>{{ $t('datatables') }}</span>-->
                <!--                        </div>-->
                <!--                        <div>-->
                <!--                            <svg-->
                <!--                                xmlns="http://www.w3.org/2000/svg"-->
                <!--                                width="24"-->
                <!--                                height="24"-->
                <!--                                viewBox="0 0 24 24"-->
                <!--                                fill="none"-->
                <!--                                stroke="currentColor"-->
                <!--                                stroke-width="2"-->
                <!--                                stroke-linecap="round"-->
                <!--                                stroke-linejoin="round"-->
                <!--                                class="feather feather-chevron-right"-->
                <!--                            >-->
                <!--                                <polyline points="9 18 15 12 9 6"></polyline>-->
                <!--                            </svg>-->
                <!--                        </div>-->
                <!--                    </a>-->

                <!--                    <ul id="datatables" class="collapse submenu list-unstyled" data-bs-parent="#sidebar">-->
                <!--                        <li>-->
                <!--                            <a class="dropdown-toggle ms-3" href="#vue3-table" data-bs-parent="#apps"-->
                <!--                               data-bs-toggle="collapse" role="button" aria-expanded="false">-->
                <!--                                vue3-datatable-->
                <!--                                <svg-->
                <!--                                    xmlns="http://www.w3.org/2000/svg"-->
                <!--                                    width="24"-->
                <!--                                    height="24"-->
                <!--                                    viewBox="0 0 24 24"-->
                <!--                                    fill="none"-->
                <!--                                    stroke="currentColor"-->
                <!--                                    stroke-width="2"-->
                <!--                                    stroke-linecap="round"-->
                <!--                                    stroke-linejoin="round"-->
                <!--                                    class="feather feather-chevron-right"-->
                <!--                                >-->
                <!--                                    <polyline points="9 18 15 12 9 6"></polyline>-->
                <!--                                </svg>-->
                <!--                            </a>-->

                <!--                            <ul id="vue3-table" class="collapse list-unstyled sub-submenu">-->
                <!--                                <li>-->
                <!--                                    <Link href="/tables/vue3-datatable/basic" @click="toggleMobileMenu">Basic-->
                <!--                                    </Link>-->
                <!--                                </li>-->
                <!--                                <li>-->
                <!--                                    <Link href="/tables/vue3-datatable/advance" @click="toggleMobileMenu">-->
                <!--                                        Advanced-->
                <!--                                    </Link>-->
                <!--                                </li>-->
                <!--                                <li>-->
                <!--                                    <Link href="/tables/vue3-datatable/order-sorting" @click="toggleMobileMenu">-->
                <!--                                        Order Sorting-->
                <!--                                    </Link>-->
                <!--                                </li>-->
                <!--                                <li>-->
                <!--                                    <Link href="/tables/vue3-datatable/alt-pagination" @click="toggleMobileMenu">-->
                <!--                                        Alt. Pagination-->
                <!--                                    </Link>-->
                <!--                                </li>-->
                <!--                                <li>-->
                <!--                                    <Link href="/tables/vue3-datatable/search" @click="toggleMobileMenu">Search-->
                <!--                                    </Link>-->
                <!--                                </li>-->
                <!--                                <li>-->
                <!--                                    <Link href="/tables/vue3-datatable/checkbox" @click="toggleMobileMenu">-->
                <!--                                        Checkbox-->
                <!--                                    </Link>-->
                <!--                                </li>-->
                <!--                                <li>-->
                <!--                                    <Link href="/tables/vue3-datatable/slot" @click="toggleMobileMenu">Slot-->
                <!--                                    </Link>-->
                <!--                                </li>-->
                <!--                                <li>-->
                <!--                                    <Link href="/tables/vue3-datatable/column-filter" @click="toggleMobileMenu">-->
                <!--                                        Column Filter-->
                <!--                                    </Link>-->
                <!--                                </li>-->
                <!--                                <li>-->
                <!--                                    <Link href="/tables/vue3-datatable/actions" @click="toggleMobileMenu">Actions-->
                <!--                                    </Link>-->
                <!--                                </li>-->
                <!--                                <li>-->
                <!--                                    <Link href="/tables/vue3-datatable/sticky-header" @click="toggleMobileMenu">-->
                <!--                                        Sticky Header-->
                <!--                                    </Link>-->
                <!--                                </li>-->
                <!--                                <li>-->
                <!--                                    <Link href="/tables/vue3-datatable/column-chooser" @click="toggleMobileMenu">-->
                <!--                                        Column Chooser-->
                <!--                                    </Link>-->
                <!--                                </li>-->
                <!--                            </ul>-->
                <!--                        </li>-->
                <!--                        <li>-->
                <!--                            <a class="dropdown-toggle ms-3" href="#v3-table" data-bs-parent="#apps"-->
                <!--                               data-bs-toggle="collapse" role="button" aria-expanded="false">-->
                <!--                                v3-table-->
                <!--                                <svg-->
                <!--                                    xmlns="http://www.w3.org/2000/svg"-->
                <!--                                    width="24"-->
                <!--                                    height="24"-->
                <!--                                    viewBox="0 0 24 24"-->
                <!--                                    fill="none"-->
                <!--                                    stroke="currentColor"-->
                <!--                                    stroke-width="2"-->
                <!--                                    stroke-linecap="round"-->
                <!--                                    stroke-linejoin="round"-->
                <!--                                    class="feather feather-chevron-right"-->
                <!--                                >-->
                <!--                                    <polyline points="9 18 15 12 9 6"></polyline>-->
                <!--                                </svg>-->
                <!--                            </a>-->

                <!--                            <ul id="v3-table" class="collapse list-unstyled sub-submenu">-->
                <!--                                <li>-->
                <!--                                    <Link href="/tables/v3-table/basic" @click="toggleMobileMenu">Basic-->
                <!--                                    </Link>-->
                <!--                                </li>-->
                <!--                                <li>-->
                <!--                                    <Link href="/tables/v3-table/striped" @click="toggleMobileMenu">Striped Table-->
                <!--                                    </Link>-->
                <!--                                </li>-->
                <!--                                <li>-->
                <!--                                    <Link href="/tables/v3-table/order-sorting" @click="toggleMobileMenu">Order-->
                <!--                                        Sorting-->
                <!--                                    </Link>-->
                <!--                                </li>-->
                <!--                                <li>-->
                <!--                                    <Link href="/tables/v3-table/multi-column" @click="toggleMobileMenu">Multi-->
                <!--                                        Column-->
                <!--                                    </Link>-->
                <!--                                </li>-->
                <!--                                <li>-->
                <!--                                    <Link href="/tables/v3-table/multiple-tables" @click="toggleMobileMenu">-->
                <!--                                        Multiple Tables-->
                <!--                                    </Link>-->
                <!--                                </li>-->
                <!--                                <li>-->
                <!--                                    <Link href="/tables/v3-table/alt-pagination" @click="toggleMobileMenu">Alt.-->
                <!--                                        Pagination-->
                <!--                                    </Link>-->
                <!--                                </li>-->
                <!--                                <li>-->
                <!--                                    <Link href="/tables/v3-table/custom" @click="toggleMobileMenu">Custom-->
                <!--                                    </Link>-->
                <!--                                </li>-->
                <!--                                <li>-->
                <!--                                    <Link href="/tables/v3-table/range-search" @click="toggleMobileMenu">Range-->
                <!--                                        Search-->
                <!--                                    </Link>-->
                <!--                                </li>-->
                <!--                                <li>-->
                <!--                                    <Link href="/tables/v3-table/export" @click="toggleMobileMenu">Export-->
                <!--                                    </Link>-->
                <!--                                </li>-->
                <!--                                <li>-->
                <!--                                    <Link href="/tables/v3-table/live-dom-ordering" @click="toggleMobileMenu">Live-->
                <!--                                        DOM ordering-->
                <!--                                    </Link>-->
                <!--                                </li>-->
                <!--                                <li>-->
                <!--                                    <Link href="/tables/v3-table/miscellaneous" @click="toggleMobileMenu">-->
                <!--                                        Miscellaneous-->
                <!--                                    </Link>-->
                <!--                                </li>-->
                <!--                            </ul>-->
                <!--                        </li>-->
                <!--                    </ul>-->
                <!--                </li>-->

                <!--                <li class="menu">-->
                <!--                    <a class="dropdown-toggle" data-bs-toggle="collapse" data-bs-target="#forms" aria-controls="forms"-->
                <!--                       aria-expanded="false">-->
                <!--                        <div class="">-->
                <!--                            <svg-->
                <!--                                xmlns="http://www.w3.org/2000/svg"-->
                <!--                                width="24"-->
                <!--                                height="24"-->
                <!--                                viewBox="0 0 24 24"-->
                <!--                                fill="none"-->
                <!--                                stroke="currentColor"-->
                <!--                                stroke-width="2"-->
                <!--                                stroke-linecap="round"-->
                <!--                                stroke-linejoin="round"-->
                <!--                                class="feather feather-clipboard"-->
                <!--                            >-->
                <!--                                <path-->
                <!--                                    d="M16 4h2a2 2 0 0 1 2 2v14a2 2 0 0 1-2 2H6a2 2 0 0 1-2-2V6a2 2 0 0 1 2-2h2"></path>-->
                <!--                                <rect x="8" y="2" width="8" height="4" rx="1" ry="1"></rect>-->
                <!--                            </svg>-->
                <!--                            <span>{{ $t('forms') }}</span>-->
                <!--                        </div>-->
                <!--                        <div>-->
                <!--                            <svg-->
                <!--                                xmlns="http://www.w3.org/2000/svg"-->
                <!--                                width="24"-->
                <!--                                height="24"-->
                <!--                                viewBox="0 0 24 24"-->
                <!--                                fill="none"-->
                <!--                                stroke="currentColor"-->
                <!--                                stroke-width="2"-->
                <!--                                stroke-linecap="round"-->
                <!--                                stroke-linejoin="round"-->
                <!--                                class="feather feather-chevron-right"-->
                <!--                            >-->
                <!--                                <polyline points="9 18 15 12 9 6"></polyline>-->
                <!--                            </svg>-->
                <!--                        </div>-->
                <!--                    </a>-->

                <!--                    <ul id="forms" class="collapse submenu list-unstyled" data-bs-parent="#sidebar">-->
                <!--                        <li>-->
                <!--                            <Link href="/forms/basic" @click="toggleMobileMenu">Basic</Link>-->
                <!--                        </li>-->
                <!--                        <li>-->
                <!--                            <Link href="/forms/input-group" @click="toggleMobileMenu">Input Group</Link>-->
                <!--                        </li>-->
                <!--                        <li>-->
                <!--                            <Link href="/forms/layouts" @click="toggleMobileMenu">Layouts</Link>-->
                <!--                        </li>-->
                <!--                        <li>-->
                <!--                            <Link href="/forms/validation" @click="toggleMobileMenu">Validation</Link>-->
                <!--                        </li>-->
                <!--                        <li>-->
                <!--                            <Link href="/forms/input-mask" @click="toggleMobileMenu">Input Mask</Link>-->
                <!--                        </li>-->
                <!--                        <li>-->
                <!--                            <Link href="/forms/select2" @click="toggleMobileMenu">Select2</Link>-->
                <!--                        </li>-->
                <!--                        <li>-->
                <!--                            <Link href="/forms/touchspin" @click="toggleMobileMenu">TouchSpin</Link>-->
                <!--                        </li>-->
                <!--                        <li>-->
                <!--                            <Link href="/forms/checkbox-radio" @click="toggleMobileMenu">Checkbox &amp; Radio-->
                <!--                            </Link>-->
                <!--                        </li>-->
                <!--                        <li>-->
                <!--                            <Link href="/forms/switches" @click="toggleMobileMenu">Switches</Link>-->
                <!--                        </li>-->
                <!--                        <li>-->
                <!--                            <Link href="/forms/wizards" @click="toggleMobileMenu">Wizards</Link>-->
                <!--                        </li>-->
                <!--                        <li>-->
                <!--                            <Link href="/forms/file-upload" @click="toggleMobileMenu">File Upload</Link>-->
                <!--                        </li>-->
                <!--                        <li>-->
                <!--                            <Link href="/forms/quill-editor" @click="toggleMobileMenu">Quill Editor</Link>-->
                <!--                        </li>-->
                <!--                        <li>-->
                <!--                            <Link href="/forms/markdown-editor" @click="toggleMobileMenu">Markdown Editor-->
                <!--                            </Link>-->
                <!--                        </li>-->
                <!--                        <li>-->
                <!--                            <Link href="/forms/date-picker" @click="toggleMobileMenu">Date &amp; Range Picker-->
                <!--                            </Link>-->
                <!--                        </li>-->
                <!--                        <li>-->
                <!--                            <Link href="/forms/clipboard" @click="toggleMobileMenu">Clipboard</Link>-->
                <!--                        </li>-->
                <!--                    </ul>-->
                <!--                </li>-->

                <!--                <li class="menu">-->
                <!--                    <a class="dropdown-toggle" data-bs-toggle="collapse" data-bs-target="#users" aria-controls="users"-->
                <!--                       aria-expanded="false">-->
                <!--                        <div class="">-->
                <!--                            <svg-->
                <!--                                xmlns="http://www.w3.org/2000/svg"-->
                <!--                                width="24"-->
                <!--                                height="24"-->
                <!--                                viewBox="0 0 24 24"-->
                <!--                                fill="none"-->
                <!--                                stroke="currentColor"-->
                <!--                                stroke-width="2"-->
                <!--                                stroke-linecap="round"-->
                <!--                                stroke-linejoin="round"-->
                <!--                                class="feather feather-users"-->
                <!--                            >-->
                <!--                                <path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path>-->
                <!--                                <circle cx="9" cy="7" r="4"></circle>-->
                <!--                                <path d="M23 21v-2a4 4 0 0 0-3-3.87"></path>-->
                <!--                                <path d="M16 3.13a4 4 0 0 1 0 7.75"></path>-->
                <!--                            </svg>-->
                <!--                            <span>{{ $t('users') }}</span>-->
                <!--                        </div>-->
                <!--                        <div>-->
                <!--                            <svg-->
                <!--                                xmlns="http://www.w3.org/2000/svg"-->
                <!--                                width="24"-->
                <!--                                height="24"-->
                <!--                                viewBox="0 0 24 24"-->
                <!--                                fill="none"-->
                <!--                                stroke="currentColor"-->
                <!--                                stroke-width="2"-->
                <!--                                stroke-linecap="round"-->
                <!--                                stroke-linejoin="round"-->
                <!--                                class="feather feather-chevron-right"-->
                <!--                            >-->
                <!--                                <polyline points="9 18 15 12 9 6"></polyline>-->
                <!--                            </svg>-->
                <!--                        </div>-->
                <!--                    </a>-->

                <!--                    <ul id="users" class="collapse submenu list-unstyled" data-bs-parent="#sidebar">-->
                <!--                        <li>-->
                <!--                            <Link href="/users/profile" @click="toggleMobileMenu">Profile</Link>-->
                <!--                        </li>-->
                <!--                        <li>-->
                <!--                            <Link href="/users/account-setting" @click="toggleMobileMenu">Account Settings-->
                <!--                            </Link>-->
                <!--                        </li>-->
                <!--                    </ul>-->
                <!--                </li>-->

                <!--                <li class="menu">-->
                <!--                    <a class="dropdown-toggle" data-bs-toggle="collapse" data-bs-target="#pages" aria-controls="pages"-->
                <!--                       aria-expanded="false">-->
                <!--                        <div class="">-->
                <!--                            <svg-->
                <!--                                xmlns="http://www.w3.org/2000/svg"-->
                <!--                                width="24"-->
                <!--                                height="24"-->
                <!--                                viewBox="0 0 24 24"-->
                <!--                                fill="none"-->
                <!--                                stroke="currentColor"-->
                <!--                                stroke-width="2"-->
                <!--                                stroke-linecap="round"-->
                <!--                                stroke-linejoin="round"-->
                <!--                                class="feather feather-file"-->
                <!--                            >-->
                <!--                                <path d="M13 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V9z"></path>-->
                <!--                                <polyline points="13 2 13 9 20 9"></polyline>-->
                <!--                            </svg>-->
                <!--                            <span>{{ $t('pages') }}</span>-->
                <!--                        </div>-->
                <!--                        <div>-->
                <!--                            <svg-->
                <!--                                xmlns="http://www.w3.org/2000/svg"-->
                <!--                                width="24"-->
                <!--                                height="24"-->
                <!--                                viewBox="0 0 24 24"-->
                <!--                                fill="none"-->
                <!--                                stroke="currentColor"-->
                <!--                                stroke-width="2"-->
                <!--                                stroke-linecap="round"-->
                <!--                                stroke-linejoin="round"-->
                <!--                                class="feather feather-chevron-right"-->
                <!--                            >-->
                <!--                                <polyline points="9 18 15 12 9 6"></polyline>-->
                <!--                            </svg>-->
                <!--                        </div>-->
                <!--                    </a>-->

                <!--                    <ul id="pages" class="collapse submenu list-unstyled" data-bs-parent="#sidebar">-->
                <!--                        <li>-->
                <!--                            <Link href="/pages/helpdesk" @click="toggleMobileMenu">Helpdesk</Link>-->
                <!--                        </li>-->
                <!--                        <li>-->
                <!--                            <Link href="/pages/contact-us" @click="toggleMobileMenu">Contact Form</Link>-->
                <!--                        </li>-->
                <!--                        <li>-->
                <!--                            <Link href="/pages/faq" @click="toggleMobileMenu">FAQ</Link>-->
                <!--                        </li>-->
                <!--                        <li>-->
                <!--                            <Link href="/pages/faq2" @click="toggleMobileMenu">FAQ 2</Link>-->
                <!--                        </li>-->
                <!--                        <li>-->
                <!--                            <Link href="/pages/privacy-policy" @click="toggleMobileMenu">Privacy Policy-->
                <!--                            </Link>-->
                <!--                        </li>-->
                <!--                        <li @click="toggleMobileMenu"><a target="_blank" href="/pages/coming-soon">Coming Soon</a></li>-->

                <!--                        <li>-->
                <!--                            <a class="dropdown-toggle" href="#pages-error" data-bs-parent="#pages"-->
                <!--                               data-bs-toggle="collapse" role="button" aria-expanded="false">-->
                <!--                                Error-->
                <!--                                <svg-->
                <!--                                    xmlns="http://www.w3.org/2000/svg"-->
                <!--                                    width="24"-->
                <!--                                    height="24"-->
                <!--                                    viewBox="0 0 24 24"-->
                <!--                                    fill="none"-->
                <!--                                    stroke="currentColor"-->
                <!--                                    stroke-width="2"-->
                <!--                                    stroke-linecap="round"-->
                <!--                                    stroke-linejoin="round"-->
                <!--                                    class="feather feather-chevron-right"-->
                <!--                                >-->
                <!--                                    <polyline points="9 18 15 12 9 6"></polyline>-->
                <!--                                </svg>-->
                <!--                            </a>-->

                <!--                            <ul id="pages-error" class="collapse list-unstyled sub-submenu">-->
                <!--                                <li @click="toggleMobileMenu"><a target="_blank" href="/pages/error404">404</a></li>-->
                <!--                                <li @click="toggleMobileMenu"><a target="_blank" href="/pages/error500">500</a></li>-->
                <!--                                <li @click="toggleMobileMenu"><a target="_blank" href="/pages/error503">503</a></li>-->
                <!--                                <li @click="toggleMobileMenu"><a target="_blank"-->
                <!--                                                                 href="/pages/maintenence">Maintanence</a></li>-->
                <!--                            </ul>-->
                <!--                        </li>-->

                <!--                        <li>-->
                <!--                            <Link href="/pages/blank-page" @click="toggleMobileMenu">Blank Page</Link>-->
                <!--                        </li>-->
                <!--                        <li>-->
                <!--                            <Link href="/pages/sample" @click="toggleMobileMenu">Sample Page</Link>-->
                <!--                        </li>-->
                <!--                    </ul>-->
                <!--                </li>-->

                <!--                <li class="menu">-->
                <!--                    <a class="dropdown-toggle" data-bs-toggle="collapse" data-bs-target="#authentication"-->
                <!--                       aria-controls="authentication" aria-expanded="false">-->
                <!--                        <div class="">-->
                <!--                            <svg-->
                <!--                                xmlns="http://www.w3.org/2000/svg"-->
                <!--                                width="24"-->
                <!--                                height="24"-->
                <!--                                viewBox="0 0 24 24"-->
                <!--                                fill="none"-->
                <!--                                stroke="currentColor"-->
                <!--                                stroke-width="2"-->
                <!--                                stroke-linecap="round"-->
                <!--                                stroke-linejoin="round"-->
                <!--                                class="feather feather-lock"-->
                <!--                            >-->
                <!--                                <rect x="3" y="11" width="18" height="11" rx="2" ry="2"></rect>-->
                <!--                                <path d="M7 11V7a5 5 0 0 1 10 0v4"></path>-->
                <!--                            </svg>-->
                <!--                            <span>{{ $t('authentication') }}</span>-->
                <!--                        </div>-->
                <!--                        <div>-->
                <!--                            <svg-->
                <!--                                xmlns="http://www.w3.org/2000/svg"-->
                <!--                                width="24"-->
                <!--                                height="24"-->
                <!--                                viewBox="0 0 24 24"-->
                <!--                                fill="none"-->
                <!--                                stroke="currentColor"-->
                <!--                                stroke-width="2"-->
                <!--                                stroke-linecap="round"-->
                <!--                                stroke-linejoin="round"-->
                <!--                                class="feather feather-chevron-right"-->
                <!--                            >-->
                <!--                                <polyline points="9 18 15 12 9 6"></polyline>-->
                <!--                            </svg>-->
                <!--                        </div>-->
                <!--                    </a>-->

                <!--                    <ul id="authentication" class="collapse submenu list-unstyled" data-bs-parent="#sidebar">-->
                <!--                        <li @click="toggleMobileMenu"><a target="_blank" href="/auth/login-boxed">Login Boxed</a></li>-->
                <!--                        <li @click="toggleMobileMenu"><a target="_blank" href="/auth/register-boxed">Register Boxed</a>-->
                <!--                        </li>-->
                <!--                        <li @click="toggleMobileMenu"><a target="_blank" href="/auth/lockscreen-boxed">Unlock Boxed</a>-->
                <!--                        </li>-->
                <!--                        <li @click="toggleMobileMenu"><a target="_blank" href="/auth/pass-recovery-boxed">Recover ID-->
                <!--                            Boxed</a></li>-->
                <!--                        <li @click="toggleMobileMenu"><a target="_blank" href="/auth/login">Login Cover</a></li>-->
                <!--                        <li @click="toggleMobileMenu"><a target="_blank" href="/auth/register">Register Cover</a></li>-->
                <!--                        <li @click="toggleMobileMenu"><a target="_blank" href="/auth/lockscreen">Unlock Cover</a></li>-->
                <!--                        <li @click="toggleMobileMenu"><a target="_blank" href="/auth/pass-recovery">Recover ID Cover</a>-->
                <!--                        </li>-->
                <!--                    </ul>-->
                <!--                </li>-->

                <!--                <li class="menu">-->
                <!--                    <Link href="/dragndrop" class="dropdown-toggle" @click="toggleMobileMenu">-->
                <!--                        <div class="">-->
                <!--                            <svg-->
                <!--                                xmlns="http://www.w3.org/2000/svg"-->
                <!--                                width="24"-->
                <!--                                height="24"-->
                <!--                                viewBox="0 0 24 24"-->
                <!--                                fill="none"-->
                <!--                                stroke="currentColor"-->
                <!--                                stroke-width="2"-->
                <!--                                stroke-linecap="round"-->
                <!--                                stroke-linejoin="round"-->
                <!--                                class="feather feather-move"-->
                <!--                            >-->
                <!--                                <polyline points="5 9 2 12 5 15"></polyline>-->
                <!--                                <polyline points="9 5 12 2 15 5"></polyline>-->
                <!--                                <polyline points="15 19 12 22 9 19"></polyline>-->
                <!--                                <polyline points="19 9 22 12 19 15"></polyline>-->
                <!--                                <line x1="2" y1="12" x2="22" y2="12"></line>-->
                <!--                                <line x1="12" y1="2" x2="12" y2="22"></line>-->
                <!--                            </svg>-->
                <!--                            <span>{{ $t('drag_and_drop') }}</span>-->
                <!--                        </div>-->
                <!--                    </Link>-->
                <!--                </li>-->

                <!--                <li class="menu">-->
                <!--                    <Link href="/charts/apex-chart" class="dropdown-toggle" @click="toggleMobileMenu">-->
                <!--                        <div class="">-->
                <!--                            <svg-->
                <!--                                xmlns="http://www.w3.org/2000/svg"-->
                <!--                                width="24"-->
                <!--                                height="24"-->
                <!--                                viewBox="0 0 24 24"-->
                <!--                                fill="none"-->
                <!--                                stroke="currentColor"-->
                <!--                                stroke-width="2"-->
                <!--                                stroke-linecap="round"-->
                <!--                                stroke-linejoin="round"-->
                <!--                                class="feather feather-pie-chart"-->
                <!--                            >-->
                <!--                                <path d="M21.21 15.89A10 10 0 1 1 8 2.83"></path>-->
                <!--                                <path d="M22 12A10 10 0 0 0 12 2v10z"></path>-->
                <!--                            </svg>-->
                <!--                            <span>{{ $t('charts') }}</span>-->
                <!--                        </div>-->
                <!--                    </Link>-->
                <!--                </li>-->

                <!--                <li class="menu" @click="toggleMobileMenu">-->
                <!--                    <a target="_blank" href="https://cork-vue.sbthemes.com" aria-expanded="false"-->
                <!--                       class="dropdown-toggle">-->
                <!--                        <div class="">-->
                <!--                            <svg-->
                <!--                                xmlns="http://www.w3.org/2000/svg"-->
                <!--                                width="24"-->
                <!--                                height="24"-->
                <!--                                viewBox="0 0 24 24"-->
                <!--                                fill="none"-->
                <!--                                stroke="currentColor"-->
                <!--                                stroke-width="2"-->
                <!--                                stroke-linecap="round"-->
                <!--                                stroke-linejoin="round"-->
                <!--                                class="feather feather-book"-->
                <!--                            >-->
                <!--                                <path d="M4 19.5A2.5 2.5 0 0 1 6.5 17H20"></path>-->
                <!--                                <path d="M6.5 2H20v20H6.5A2.5 2.5 0 0 1 4 19.5v-15A2.5 2.5 0 0 1 6.5 2z"></path>-->
                <!--                            </svg>-->
                <!--                            <span>{{ $t('documentation') }}</span>-->
                <!--                        </div>-->
                <!--                    </a>-->
                <!--                </li>-->
            </PerfectScrollbar>
        </nav>
    </div>
</template>
