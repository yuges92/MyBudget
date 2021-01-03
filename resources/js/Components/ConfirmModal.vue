<template>
    <teleport to="#modal-teleport">
        <div :class="{'show':confirmModal.modalState.visible}" class=" modal-container " @click="confirmModal.closeModal">
            <div class="confirmation-modal" transition="modal" @click.stop>
                <header class="modal-header">
                    <span class="modal-title">Are you sure? </span>
                </header>
                <section v-if="confirmModal.modalState.message" class="modal-body">
                    {{ confirmModal.modalState.message }}
                </section>
                <footer class="modal-footer">
                    <button v-if="!isLoading" class="btn modal-action-btn" @click="confirmModal.response(true)">
                        Confirm
                    </button>
                    <button v-else class="btn loading-btn" disabled>
                        <spinner></spinner>
                        <span>Loading...</span></button>
                    <button class="btn close-modal-btn" @click="confirmModal.closeModal">Cancel</button>
                </footer>
            </div>
        </div>
    </teleport>

</template>

<script>
import Spinner from "@/Components/Spinner";
import {ref} from "vue";

//using usePromisedModal
export default {
    name: "ConfirmModal",
    components: {Spinner},
    props: {
        confirmModal: {
            type: Object,
            required: true,
        },

    },
    data() {
        return {
            isLoading: false
        }
    },
    watch: {},
    methods: {},

}
</script>

<style scoped>

</style>
