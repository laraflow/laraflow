<script setup>
import {v4 as uuid} from "uuid";
import {computed, onMounted, ref} from "vue";

const props = defineProps({
    label: {
        type: String,
        default: 'Boolean',
    },
    id: {
        type: String,
        default: `boolean-input-${uuid()}`,
    },
    name: {
        type: String,
        default: 'password',
    },
    message: {
        type: String,
    }
});

const hasError = computed(() => {
    return props.message && props.message.length > 0;
});

const model = defineModel({
    type: String,
    required: true,
});

const input = ref(null);

onMounted(() => {
    if (input.value.hasAttribute('autofocus')) {
        input.value.focus();
    }
});

defineExpose({focus: () => input.value.focus()});

defineOptions({
    inheritAttrs: false
});

</script>

<template>
    <div class="field-wrapper input">
        <div class="checkbox-outline-primary custom-control custom-checkbox">
            <input
                type="checkbox"
                :name="name"
                v-model="model"
                ref="input"
                v-bind="{...$attrs, class:null}"
                :class="{'custom-control-input' : true, 'is-invalid' : hasError}"
                :id="id"/>
            <label :class="{'custom-control-label' : true, 'text-danger' : hasError}" :for="id">
                {{ label.length > 0 ? label : null }}
                <slot/>
            </label>
        </div>
        <div class="invalid-feedback d-block text-danger" v-show="hasError">
            {{ message }}
        </div>
    </div>
</template>

<style scoped>

</style>
