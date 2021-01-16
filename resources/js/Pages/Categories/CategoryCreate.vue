<template>
    <page-layout page-title="Create New Category">
        <template #right-content>
            <go-back-btn/>
        </template>

        <template #page-body>
            <card class="">
                <template #card-body-content>
                    <form action="" class="form " @submit.prevent="save">
                            <button class="btn-icon" type="button" @click="promisedModal.openModal"><img :src="state.category.icon" alt="" class="w-12"></button>
                        <custom-select v-model:inputValue="state.category.type" :error-message="state.errorMessage.type" :options="state.typeOptions" label-name="Type"/>
                        <input-text-field v-model:inputValue="state.category.name" :error-message="state.errorMessage.name" input-type="text"
                                          label-name="Category Name "/>
                        <div class="flex justify-end full-width">
                            <submit-btn :isLoading="isLoading" btn-name="Save" @submit="save"/>
                        </div>
                    </form>

                </template>

            </card>

        </template>

        <template #modals>
            <icon-chooser v-model:icon="state.category.icon" :promisedModal="promisedModal"></icon-chooser>
        </template>
    </page-layout>


</template>

<script>
import Modal from "@/Components/Modal";
import {onBeforeMount, reactive, ref} from "vue";
import InputTextField from "@/Components/InputTextField";
import PageLayout from "@/Components/PageLayout";
import GoBackBtn from "@/Components/GoBackBtn";
import SubmitBtn from "@/Components/SubmitBtn";
import CustomSelect from "@/Components/CustomSelect";
import Card from "@/Components/Card";
import {useIcon} from "@/Composables/useIcon";
import Button from "@/Jetstream/Button";
import {usePromisedModal} from "@/Composables/usePromisedModal";
import IconChooser from "@/Components/IconChooser";

const {useRouter, useRoute} = require("vue-router");


export default {
    name: "CategoryCreate",
    components: {IconChooser, Button, Card, CustomSelect, SubmitBtn, GoBackBtn, PageLayout, InputTextField, Modal},
    setup() {
        const promisedModal = usePromisedModal();
        const vueRouter = useRouter()
        const {fetchIcons, icons} = useIcon()
        const isLoading = ref(false)
        const state = reactive({
            category: {
                type: "Income",
                name: "",
                icon: "/storage/svg-icons/1.svg"
            },
            typeOptions: [{name: "Income"}, {name: "Expense"}],
            errorMessage: [],

        })

        onBeforeMount(() => {
            fetchIcons().then(res => {
                console.log('icons loaded')
            }).catch(err => {
                console.error(err)
            })
        })

        const chooseIcon = (item) => {
            state.category.icon = item
            promisedModal.response(true)
        }

        let save = () => {
            isLoading.value = true
            axios.post(route('categories.store'), state.category).then(res => {
                vueRouter.go(-1)
            }).catch(err => {
                let errors = (err.response.data.errors)
                for (const error in errors) {
                    state.errorMessage[error] = errors[error][0]
                }

            }).finally(() => {
                isLoading.value = false
            })

        }

        return {save, state, isLoading, icons, chooseIcon, promisedModal}
    },

}
</script>

<style lang="scss" scoped>


</style>
