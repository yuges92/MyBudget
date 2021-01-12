<template>
    <page-layout page-title="Create New Category">
        <template #right-content>
            <go-back-btn/>
        </template>

        <template #page-body>
            <card class="">
                <template #card-header-content>
                    <button btn-name="btn delete-btn " @click="deleteConfirmation(state.category.id)">Delete</button>
                </template>

                <template #card-body-content>
                    <form action="" class="form " @submit.prevent="update">
                        <button class="icon-btn" type="button" @click="iconModal.openModal()"><img :src="state.category.icon" alt="" class="w-12"></button>
                        <custom-select v-model:inputValue="state.category.type" :error-message="state.errorMessage.type" :options="state.typeOptions"
                                       label-name="Type"/>
                        <input-text-field v-model:inputValue="state.category.name" :error-message="state.errorMessage.name" input-type="text"
                                          label-name="Category Name"/>
                        <div class="flex justify-end full-width">
                            <submit-btn :isLoading="isLoading" btn-name="Update" @submit="update"/>
                        </div>
                    </form>
                </template>
            </card>
        </template>

        <template #modals>
            <confirm-modal :confirmModal="promisedModal"/>
            <icon-chooser v-model:icon="state.category.icon" :promisedModal="iconModal"></icon-chooser>
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
import {useRoute, useRouter} from 'vue-router'
import ConfirmModal from "@/Components/ConfirmModal";
import {usePromisedModal} from "@/Composables/usePromisedModal";
import {useCategory} from "@/Composables/useCatagory";
import IconChooser from "@/Components/IconChooser";

export default {
    name: "CategoryEdit",
    components: {IconChooser, ConfirmModal, Card, CustomSelect, SubmitBtn, GoBackBtn, PageLayout, InputTextField, Modal},
    setup() {
        const isLoading = ref(false)
        const promisedModal = usePromisedModal('You wont get the data back ')
        const iconModal = usePromisedModal()

        const {fetchCategory, deleteCategory} = useCategory()
        const state = reactive({
            category: {
                type: "",
                name: "",
                icon: "/storage/svg-icons/1.svg"
            },
            typeOptions: [{name: "Income"}, {name: "Expense"},],
            errorMessage: [],

        })
        const vueRoute = useRoute()
        const vueRouter = useRouter()
        const category_id = (vueRoute.params.id)

        let update = () => {
            isLoading.value = true
            axios.put(route('categories.update', category_id), state.category).then(res => {
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

        let deleteConfirmation = async (category_id) => {
            const confirmed = await promisedModal.openModal()
            if (confirmed) {
                deleteCategory(category_id).then(res => {
                    vueRouter.go(-1)
                }).catch(err => {
                    console.error(err)
                }).finally()
            }

        }

        onBeforeMount(async () => {
            let response = await fetchCategory(category_id)
            state.category = await response.data

        });

        return {update, state, isLoading, deleteConfirmation, promisedModal, iconModal}
    },

}
</script>

<style scoped>

</style>
