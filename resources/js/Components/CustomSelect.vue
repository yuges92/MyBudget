<template>
    <div class="custom-form-field-container">
        <label :for="labelName" class="input-label ">{{ labelName }}</label>

        <button :id="labelName" :placeholder="labelName" class="input-select-btn" type="button" @click="toggleDropDown">
            {{ input }}
        </button>
        <div class="drop-down-selection-container" >
            <ul  class="drop-down-selection" :class="{'show':showDropdownList}">
                <li :tabindex="0" v-for="option in options" class="drop-down-selection-list" @click="updateValue(option)">
                    {{ option.name }}
                </li>
            </ul>
        </div>

    </div>
</template>

<script>
import {onUpdated, ref, watch} from "vue";

export default {
    name: "CustomSelect",
    props: {
        labelName: {
            required: true,
            type: String
        },
        inputValue: {
            type: String,
            required: true,

        },
        options: {
            type: Array,
            required: true,

        },

    },
    setup(props, {emit}) {
        const input = ref(props.inputValue)
        const showDropdownList = ref(false)
        watch(input, value => {
            emit("update:inputValue", value);
        });

        const updateValue = (newVal) => {
            input.value = newVal.name
            toggleDropDown()
        }
        const toggleDropDown = () => {
            showDropdownList.value = !showDropdownList.value
        }
      onUpdated(()=>{
        input.value = (props.inputValue)
      })
        return {input, updateValue, toggleDropDown,showDropdownList};
    },

    methods: {},
}
</script>

<style scoped>

</style>
