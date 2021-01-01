<template>
    <button v-if="!isLoading" class="btn submit-btn" type="button" @click="action">{{ btnName }}</button>
    <button v-else class="btn  loading-btn" disabled type="button">
        <spinner></spinner>
        <span>Saving</span>
    </button>
</template>

<script>
import Spinner from "@/Components/Spinner";

export default {
    name: "SubmitBtn",
    components: {Spinner},
    emits: ['submit'],
    props: {
        btnName: {
            required: true,
            type: String
        },
        isLoading: {
            required: true,
            type: Boolean
        }

    },
    methods: {
        action() {
            this.$emit('submit')
        }
    },
}
</script>

<style scoped>

</style>
