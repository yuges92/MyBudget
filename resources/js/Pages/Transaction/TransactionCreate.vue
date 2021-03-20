<template>
    <page-layout page-title="Create New Transaction">
        <template #right-content>
            <go-back-btn/>
        </template>
        <template #page-body>
            <card>
                <template #card-body-content>

                    <form action="" class="form" @submit.prevent="save">
                        <custom-select v-model:inputValue="state.income.type" :options="categoryState.types" label-name="Type"/>
                        <custom-select v-model:inputValue="state.income.category" :options="categoryState.categories" label-name="Category"/>
                        <input-text-field v-model:inputValue="state.income.date" input-type="date" label-name="Date"/>
                        <input-text-field v-model:inputValue="state.income.from" input-type="text" label-name="From"/>
                        <input-text-field v-model:inputValue="state.income.amount" input-type="number" label-name="Amount"/>
                        <submit-btn :isLoading="isLoading" btn-name="Save" @submit="save"/>
                    </form>
                </template>

            </card>
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
import {useCategory} from "@/Composables/useCatagory";

export default {
    name: "TransactionCreate",
    components: {Card, CustomSelect, SubmitBtn, GoBackBtn, PageLayout, InputTextField, Modal},
    setup() {
        const isLoading = ref(false)
        const {state: categoryState, fetchCategories} = useCategory()

        const state = reactive({
            income: {
                type: "income",
                category: "",
                date: "",
                from: "",
                amount: ""
            },

        })

        onBeforeMount(() => {
            fetchCategories()
        })

        let save = () => {
            console.log(state.income)
            isLoading.value = true
            console.log(state.income)
            axios.post('/api/transactions', state.income).then(res => {
                console.log(res)
            }).catch(err => {
                console.log(err)
            }).finally(() => {
                isLoading.value = false

            })
        }

        return {save, state, categoryState, isLoading}
    },

}
</script>

<style scoped>

</style>
