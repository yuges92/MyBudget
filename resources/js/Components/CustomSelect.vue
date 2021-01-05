<template>
  <div class="custom-form-field-container">
    <label :for="labelName" class="input-label">{{ labelName }}</label>

    <button :id="labelName" :class="{'has-error':errorMessage}" :placeholder="labelName" class="input-select-btn" type="button" @click="toggleDropDown">
      {{ input }}
    </button>
    <span v-if="errorMessage" class="input-error-message">{{ errorMessage }}</span>

    <div class="drop-down-selection-container">
      <ul :class="{'show':showDropdownList}" class="drop-down-selection">
        <li v-for="option in options" :tabindex="0" class="drop-down-selection-list" @click="updateValue(option)">
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
    errorMessage: {
      type: String,


    }

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
    onUpdated(() => {
      input.value = (props.inputValue)
    })
    return {input, updateValue, toggleDropDown, showDropdownList};
  },

  methods: {},
}
</script>

<style scoped>

</style>
