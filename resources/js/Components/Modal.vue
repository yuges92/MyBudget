<template>
    <teleport to="#modal-teleport">

        <div :class="{'show':confirmModal.modalState.visible}" class=" modal-container" @click="confirmModal.closeModal">
            <div class="modal" transition="modal" @click.stop>
                <header class="modal-header">
                    <span class="modal-title">{{ modalTitle }}</span>
                    <button class="btn close-btn" @click="confirmModal.closeModal"><i class="fas fa-times"></i></button>
                </header>

                <section class="modal-body">
                    <slot name="modal-body"></slot>
                </section>
                <footer class="modal-footer">
                    <slot name="modal-footer"></slot>
                </footer>
            </div>
        </div>
    </teleport>

</template>

<script>
import Spinner from "@/Components/Spinner";
import {ref} from "vue";

export default {
    name: "Modal",
    components: {Spinner},
    props: {
        confirmModal: {
            type: Object,
            required: true,
        },
        modalTitle: {
            type: String,
            required: true
        },

    },


}
</script>

<style scoped>

</style>
