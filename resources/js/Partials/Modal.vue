<template>
    <teleport to="#modal-teleport">

        <div :class="{'active':visible}" class="modal-container" @click="close">

                <div transition="modal" v-if="visible" class="modal" @click.stop>
                    <header class="modal-header">
                        <span class="modal-title">{{ modalTitle }}</span>
                        <button class="btn close-btn" @click="close"><i class="fas fa-times"></i></button>
                    </header>

                    <section class="modal-body">
                        <slot name="modal-body"></slot>
                    </section>
                    <footer class="modal-footer">
                        <button v-if="!isLoading" class="btn modal-action-btn" @click="submit">{{
                                modalActionText
                            }}
                        </button>
                        <button v-else class="btn loading-btn" disabled>
                            <spinner></spinner>
                            <span>Loading...</span></button>
                        <button class="btn close-modal-btn" @click="close">Close</button>

                    </footer>
                </div>
        </div>
    </teleport>

</template>

<script>
import Spinner from "@/Partials/Spinner";

export default {
    name: "Modal",
    components: {Spinner},
    emits: ['close', 'submit'],

    props: {
        modalTitle: {
            type: String,
            required: true
        },
        modalActionText: {
            required: true
        },
        visible: {
            type: Boolean,
            required: true,
        },


    },
    data() {
        return {
            isLoading: false
        }
    },
    methods: {
        close() {
            this.isLoading = false
            this.$emit('close')
        },
        submit() {
            this.isLoading = true
            this.$emit('submit')
        }
    },

}
</script>

<style scoped>

</style>
