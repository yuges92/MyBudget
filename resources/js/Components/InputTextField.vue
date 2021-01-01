<template>
    <div class="custom-form-field-container">
        <label :for="labelName" class="input-label ">{{ labelName }}</label>
        <input
            :id="labelName"
            v-model="input"
            :type="inputType"
            class="input-field"
            :placeholder="labelName"
        >
    </div>
</template>

<script>
import {ref, watch} from "vue";

export default {
    name: "InputTextField",
    props: {
        labelName: {
            required: true,
            type: String
        },
        inputValue: {
            type: String,
            required: true,

        },
        inputType: {
            type: String,
            required: true,

        },

    },
    setup(props, {emit}) {
        const input = ref(props.inputValue)
        watch(input, value => {
            emit("update:inputValue", value);
        });
        return {input};
    }
}
</script>

<style scoped>

</style>
