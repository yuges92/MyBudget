<template>
    <div class="custom-form-field-container">
        <label :for="labelName" class="input-label ">{{ labelName }}</label>
        <input
            :id="labelName"
            v-model="input"
            :class="{'has-error':hasError}"
            :placeholder="labelName"
            :type="inputType"
            class="input-field "
        >
        <span v-if="hasError" class="input-error-message">{{ errorMessage }}</span>
    </div>
</template>

<script>
import {onUpdated, ref, watch} from "vue";

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
        hasError: {
            type: Boolean,
        },
        errorMessage: {
            type: String,


        }


    },
    setup(props, {emit}) {
        const input = ref(props.inputValue)
        watch(input, value => {
            emit("update:inputValue", value);
            emit("update:hasError", false);

        });
        onUpdated(()=>{
            input.value = (props.inputValue)
        })
        return {input};
    }
}
</script>

<style scoped>

</style>
