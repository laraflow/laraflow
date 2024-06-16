<script setup>
import {useStore} from 'vuex';
import {onMounted, reactive, ref} from "vue";
import {useI18n} from "vue-i18n";

const i18n = reactive(useI18n());

const store = useStore();

const selectedLang = ref(null);
const countryList = ref(store.state.countryList);

const changeLanguage = (item) => {
    selectedLang.value = item;
    i18n.locale = item.code;
    window.$appSetting.toggleLanguage(item);
};

onMounted(() => {
    selectedLang.value = window.$appSetting.toggleLanguage();
});

</script>

<template>
    <div class="dropdown nav-item language-dropdown btn-group">
        <a href="javascript:;" id="ddllang" data-bs-toggle="dropdown" aria-expanded="false"
           class="btn dropdown-toggle btn-icon-only nav-link">
            <img v-if="selectedLang" :src="`/assets/images/flags/${selectedLang.code}.png`"
                 class="flag-width" alt="flag"/>
        </a>
        <ul class="dropdown-menu" aria-labelledby="ddllang">
            <perfect-scrollbar>
                <li v-for="item in countryList" :key="item.code">
                    <a href="javascript:;" class="dropdown-item d-flex align-items-center"
                       :class="{ active: i18n.locale === item.code }"
                       @click.prevent="changeLanguage(item)">
                        <img :src="`/assets/images/flags/${item.code}.png`" class="flag-width" alt=""/>
                        <span>{{ item.name }}</span>
                    </a>
                </li>
            </perfect-scrollbar>
        </ul>
    </div>
</template>

<style scoped>

</style>
