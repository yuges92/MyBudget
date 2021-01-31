<template>
    <page-layout page-title="Edit Debt">
        <template #right-content>
            <go-back-btn/>
        </template>
        <template #page-body>
            <card>
                <template #card-body-content>

                    <form action="" class="form" @submit.prevent="save">
                        <button class="btn-icon" type="button" @click="promisedModal.openModal"><img :src="state.debt.icon" alt="" class="w-12"></button>
                        <input-text-field v-model:inputValue="state.debt.name" :error-message="state.errorMessage.name" input-type="text" label-name="Name"/>
                        <input-text-field v-model:inputValue="state.debt.amount" :error-message="state.errorMessage.amount" input-type="number" label-name="Amount"/>
                        <submit-btn :isLoading="isLoading" btn-name="Save" @submit="save"/>
                    </form>
                </template>

            </card>
        </template>
        <template #modals>
            <icon-chooser v-model:icon="state.debt.icon" :promisedModal="promisedModal"></icon-chooser>
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
import {usePromisedModal} from "@/Composables/usePromisedModal";
import IconChooser from "@/Components/IconChooser";
import {useRouter, useRoute} from "vue-router";
import {useDebt} from "@/Composables/useDebt";

export default {
    name: "DebtEdit",
    components: {IconChooser, Card, CustomSelect, SubmitBtn, GoBackBtn, PageLayout, InputTextField, Modal},
    setup() {
        const promisedModal = usePromisedModal();
        const {fetchADebt} = useDebt()
        const vueRouter = useRouter()
        const isLoading = ref(false)
        const state = reactive({
            debt: {
                name: "",
                amount: "",
                icon: "/storage/svg-icons/1.svg"
            },
            errorMessage: [],
        })
        const vueRoute = useRoute()
        const debt_id = (vueRoute.params.id)
        let save = () => {
            console.log(state.debt)
            isLoading.value = true
            console.log(state.debt)
            axios.put(route('debts.update', debt_id), state.debt).then(res => {
                vueRouter.go(-1)
                console.log(res)
            }).catch(err => {
                let errors = (err.response.data.errors)
                for (const error in errors) {
                    state.errorMessage[error] = errors[error][0]
                }
                console.log(err)
            }).finally(() => {
                isLoading.value = false

            })
        }
        onBeforeMount(async () => {
            let res = await fetchADebt(debt_id)
            console.log(res)
            state.debt = await res.data
        })

        return {save, state, isLoading, promisedModal}
    },

}
</script>

<style scoped>

</style>
