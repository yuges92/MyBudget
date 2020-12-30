<template>
    <teleport to="#modal-teleport">

        <div :class="{'show':visibility}" class=" modal-container" @click="close">
            <div  class="modal" transition="modal" @click.stop>
                <header class="modal-header">
                    <span class="modal-title">{{ modalTitle }}</span>
                    <!--                    <button class="btn close-btn" @click="close"><i class="fas fa-times"></i></button>-->
                </header>

                <section class="modal-body">
                    <slot name="modal-body"></slot>
                </section>
                <footer class="modal-footer">
                    <button v-if="!isLoading" class="btn modal-action-btn" @click="submit">
                        {{ modalActionText }}
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
import Spinner from "@/Components/Spinner";
import {ref} from "vue";

export default {
    name: "Modal",
    components: {Spinner},
    emits: ['submit', 'update:visible'],
    setup(props, {emit}) {
        const visibility = ref(props.visible);
        const close = () => {
            visibility.value = false
            emit("update:visible", false)
        }

        return {close, visibility}
    },
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
            default: false
        },


    },
    data() {
        return {
            isLoading: false
        }
    },
    watch: {
        visible(newValue, oldValue) {
            this.isLoading = false
            this.visibility = newValue
        }
    },
    methods: {

        submit() {
            this.isLoading = true
            this.$emit('submit')
        }
    },

}
</script>

<style scoped>

</style>
