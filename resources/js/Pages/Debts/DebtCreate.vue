<template>
    <page-layout page-title="Create New Debt">
        <template #right-content>
            <go-back-btn/>
        </template>
        <template #page-body>
            <card>
                <template #card-body-content>

                    <form action="" class="form" @submit.prevent="save">
                        <button class="btn-icon" type="button" @click="promisedModal.openModal"><img :src="state.income.icon" alt="" class="w-12"></button>

                        <input-text-field v-model:inputValue="state.income.name" input-type="text" label-name="Name"/>
                        <input-text-field v-model:inputValue="state.income.date" input-type="date" label-name="Date"/>
                        <input-text-field v-model:inputValue="state.income.from" input-type="text" label-name="From"/>
                        <input-text-field v-model:inputValue="state.income.amount" input-type="number" label-name="Amount"/>
                        <submit-btn :isLoading="isLoading" btn-name="Save" @submit="save"/>
                    </form>
                </template>

            </card>
        </template>
        <template #modals>
            <icon-chooser v-model:icon="state.income.icon" :promisedModal="promisedModal"></icon-chooser>
        </template>
    </page-layout>


</template>

<script>
import Modal from "@/Components/Modal";
import {reactive, ref} from "vue";
import InputTextField from "@/Components/InputTextField";
import PageLayout from "@/Components/PageLayout";
import GoBackBtn from "@/Components/GoBackBtn";
import SubmitBtn from "@/Components/SubmitBtn";
import CustomSelect from "@/Components/CustomSelect";
import Card from "@/Components/Card";
import {usePromisedModal} from "@/Composables/usePromisedModal";
import IconChooser from "@/Components/IconChooser";

export default {
    name: "DebtCreate",
    components: {IconChooser, Card, CustomSelect, SubmitBtn, GoBackBtn, PageLayout, InputTextField, Modal},
    setup() {
        const promisedModal = usePromisedModal();

        const isLoading = ref(false)
        const state = reactive({
            income: {
                name: "",
                date: "",
                amount: "",
                icon: "/storage/svg-icons/1.svg"
            },

        })

        let save = () => {
            console.log(state.income)
            isLoading.value = true
            console.log(state.income)
            axios.post(route('debts.store'), state.income).then(res => {
                console.log(res)
            }).catch(err => {
                console.log(err)
            }).finally(() => {
                isLoading.value = false

            })
        }

        return {save, state, isLoading, promisedModal}
    },

}
</script>

<style scoped>

</style>
