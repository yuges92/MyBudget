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

                        <custom-select v-model:hasError="state.errors.type" v-model:inputValue="state.category.type" :error-message="state.errorMessage.type" :options="state.typeOptions"
                                       label-name="Type"/>
                        <input-text-field v-model:hasError="state.errors.name" v-model:inputValue="state.category.name" :error-message="state.errorMessage.name" input-type="text"
                                          label-name="Category Name"/>
                        <div class="flex justify-end full-width">
                            <submit-btn :isLoading="isLoading" btn-name="Update" @submit="update"/>
                        </div>
                    </form>
                </template>
            </card>
            <confirm-modal :confirmModal="promisedModal"/>
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
import faList from "@/faList";
import {useRoute, useRouter} from 'vue-router'
import ConfirmModal from "@/Components/ConfirmModal";
import {usePromisedModal} from "@/Composables/usePromisedModal";
import {useCategory} from "@/Composables/useCatagory";

export default {
    name: "CategoryEdit",
    components: {ConfirmModal, Card, CustomSelect, SubmitBtn, GoBackBtn, PageLayout, InputTextField, Modal},
    setup() {
        const isLoading = ref(false)
        const promisedModal = usePromisedModal('You wont get the data back ')
        const {fetchCategory, deleteCategory} = useCategory()
        const confirmModalState = reactive({
            visible: false,
            message: "",
            title: "",
            action: () => {
            }
        })
        const state = reactive({
            category: {
                type: "",
                name: "",
                icon: ""
            },
            typeOptions: [{name: "Income"}, {name: "Expense"},],
            errors: {
                type: false,
                name: false,
                icon: false,
            },
            errorMessage: [],
            classList: faList

        })
        const vueRoute = useRoute()
        const vueRouter = useRouter()
        const category_id = (vueRoute.params.id)
        console.log('category_id', category_id)
        let update = () => {
            isLoading.value = true
            console.log(route('categories.store'))
            axios.put(route('categories.update', category_id), state.category).then(res => {
                console.log(res)
                vueRouter.go(-1)

            }).catch(err => {
                console.error(state)
                let errors = (err.response.data.errors)
                for (const error in errors) {
                    state.errorMessage[error] = errors[error][0]
                    state.errors[error] = true
                }

            }).finally(() => {
                isLoading.value = false

            })
        }


        let deleteConfirmation = async (category_id) => {
            const confirmed = await promisedModal.confirm()
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


        return {update, state, isLoading, deleteConfirmation, promisedModal}
    },

}
</script>

<style scoped>

</style>
