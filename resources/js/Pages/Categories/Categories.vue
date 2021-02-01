<template>
    <page-layout page-title="Categories">
        <template #right-content>
            <custom-select
                v-model:inputValue="selectedType"
                :options="types"
                class="category-select"
                label-name=""/>
        </template>
        <template #page-body>
            <div class="flex  ">

                <card card-title="All Categories" class="all-categories-container">
                    <template v-slot:card-header-content>
                        <router-link :to="{name:'categories.create'}" class="btn"><i class="fas fa-plus "></i>
                            <span> Add new category</span>
                        </router-link>
                    </template>
                    <template v-slot:card-body-content>
                        <table class="table">
                            <thead>
                            <tr>
                                <th>Icon</th>
                                <th>Type</th>
                                <th>Category Name</th>
                                <th class="w-12">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr v-for="category in categories" v-if="categories" class="text-center">
                                <td><img :src="category.icon" alt="" class="w-12 mx-auto"></td>
                                <td><span :class="getTypeColor(category.type)" class=" px-2 py-1 rounded-3xl text-white">{{ category.type }}</span></td>
                                <td class="text-left">{{ category.name }}</td>
                                <td>
                                    <div class="flex  justify-end">
                                        <router-link :to="{name:'categories.edit', params:{id:category.id}}" class="btn btn-edit">
                                            Edit
                                        </router-link>
                                        <button class="btn btn-delete" @click="deleteConfirmation(category.id)">Delete</button>
                                    </div>

                                </td>
                            </tr>
                            <tr v-else>
                                <td>-</td>
                                <td>-</td>
                                <td>-</td>
                                <td>-</td>
                            </tr>
                            </tbody>
                        </table>
                    </template>
                </card>

            </div>

            <confirm-modal :confirm-modal="promisedModal"></confirm-modal>
        </template>

    </page-layout>

</template>

<script>
import PageLayout from "@/Components/PageLayout";
import Card from "@/Components/Card";
import Modal from "@/Components/Modal";
import {onMounted, reactive, ref, computed} from "vue";
import CategoryEdit from "@/Pages/Categories/CategoryEdit";
import ConfirmModal from "@/Components/ConfirmModal";
import {usePromisedModal} from "@/Composables/usePromisedModal";
import {useCategory} from "@/Composables/useCatagory";
import CustomSelect from "@/Components/CustomSelect";

export default {
    name: "Categories",
    components: {CustomSelect, ConfirmModal, CategoryEdit, Modal, Card, PageLayout},
    setup() {
        const promisedModal = usePromisedModal('You wont get the data back ');
        const {fetchCategories, deleteCategory, state} = useCategory();
        const selectedType = ref("All");
        const types = ref([{name: "All"}, {name: "incomes"}, {name: "expenses"}, {name: "debts"}]);
        onMounted(() => {
            fetchCategories()
        });

        const deleteConfirmation = async (category_id) => {
            let confirmed = await promisedModal.openModal()
            if (confirmed) {
                deleteCategory(category_id).then(res => {
                    fetchCategories()
                }).catch(err => {
                    console.error(err)
                }).finally()
            }
        }

        const categories = computed(() => {
            if (selectedType.value == "incomes") {
                return state.incomeTypes

            } else if (selectedType.value == "expenses") {
                return state.expenseTypes

            } else if (selectedType.value == "debts") {
                return state.debtsTypes
            }
            return state.categories


        })


        return {state, deleteConfirmation, promisedModal, categories, selectedType, types}
    },

    methods: {
        getTypeColor(type) {
            let colorArray = {
                income: "bg-blue-500",
                expense: "bg-orange-400",
                debt: "bg-purple-500",
            }
            return colorArray[type]


        }
    },

}
</script>

<style scoped>
.category-select {
    min-width: 6rem;
    text-align: center;
}
</style>
