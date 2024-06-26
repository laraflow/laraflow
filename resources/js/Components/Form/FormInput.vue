<script setup>
import {v4 as uuid} from "uuid";
import {computed, onMounted, ref} from "vue";
import FormError from "@/Components/Form/FormError.vue";
import FormLabel from "@/Components/Form/FormLabel.vue";

const props = defineProps({
    type: {
        type: String,
        default: "text",
    },
    label: {
        type: String,
        default: 'Name',
    },
    id: {
        type: String,
        default: `input-${uuid()}`,
    },
    message: {
        type: String,
    },
    required: {
        type: Boolean,
        default: false,
    },
    hint: {
        type: String,
        default: ''
    }
})

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
    <div class="form-group">
        <FormLabel :id="id" :label="label" :required="required"/>
        <input
            :id="id"
            :type="type"
            ref="input"
            v-model="model"
            :class="{'form-control' : true, 'is-invalid' : hasError}"
            v-bind="{...$attrs, class:null}"
        />
        <FormError :message="message"/>
        <small v-show="hint.length>0" class="text-muted">{{ hint }}</small>
    </div>
</template>

<style scoped>

</style>
