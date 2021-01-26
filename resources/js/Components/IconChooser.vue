<template>
    <modal :confirm-modal="promisedModal" modal-title="Choose Icon">
        <template #modal-body>
            <div v-if="icons" class="icons-collection-container">

                <div v-for="item in icons" :key="item.id" class="svg-icon-container">
                    <button class="icon-btn" @click="chooseIcon(item)">
                        <svg style="max-width: 3rem; max-height: 3rem">
                            <image :xlink:href="item" alt="" style="width: 100%; height: 100%"/>
                        </svg>
                    </button>

                </div>
            </div>

        </template>
    </modal>

</template>

<script>

import Modal from "@/Components/Modal";
import {useIcon} from "@/Composables/useIcon";
import {computed, onBeforeMount} from "vue";

export default {
    name: "IconChooser",
    components: {Modal},
    props: {
        promisedModal: {
            //usePromisedModal
        },
        icon: {
            type: String
        }
    },
    setup(props, {emit}) {
        const promisedModal = props['promisedModal'];

        const {fetchIcons, icons} = useIcon()

        onBeforeMount(() => {
            fetchIcons().then(res => {
            }).catch(err => {
                console.error(err)
            })
        })

        const chooseIcon = (item) => {
            emit('update:icon', item)
            promisedModal.response(true)
        }

        const showModal = async () => {
            await promisedModal.confirm()
        }
      // let iconList=  computed(()=>icon.forEach(item=>{
      //
      // }))

        return {icons, chooseIcon, promisedModal, showModal}
    },

}
</script>

<style lang="scss" scoped>
.icons-collection-container {
    display: flex;
    flex-direction: row;
    max-width: 20rem;
    max-height: 20rem;
    flex-wrap: wrap;
    overflow-y: scroll;

    .svg-icon-container {
        width: 4rem;
        height: 4rem;
        margin: 0.5rem;

        .icon-btn {
            padding: 0.5rem;
            border-radius: 5px;

            &:hover {
                background: #f3f3ff;
            }
        }

    }


}


</style>
