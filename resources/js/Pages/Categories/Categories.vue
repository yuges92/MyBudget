<template>
    <page-layout page-title="Categories">
        <template #right-content>
            <router-link :to="{name:'categories.create'}" class="btn"><i class="fas fa-plus"></i>
                <span>Add Transaction</span>
            </router-link>
        </template>
        <template #page-body>
            <div class="flex ">
                <card :class="{'w-1/3':showForm}" card-title="All Categories" class="all-categories">
                    <template v-slot:card-header-content>
                        <!--                        <button class="btn" @click="toggleModal"></button>-->

                    </template>
                    <template v-slot:card-body-content>
                        <ul class="list">
                            <li v-for="index in 5" class="list-item">

                                <button class="btn" @click="showEditForm(index)">
                                    <i class="fas fa-sitemap"></i>
                                    <span>Categories {{ index }}</span>
                                </button>


                            </li>
                        </ul>
                    </template>
                </card>


                <transition name="page">
                    <card  card-title="Edit Category">

                        <template #card-header-content>
                            <button class="btn" @click="closeForm">Cancel</button>
                        </template>
                        <template #card-body-content>
                            {{ currentCategory }}
                        </template>

                    </card>
                </transition>
            </div>


        </template>

    </page-layout>

</template>

<script>
import PageLayout from "@/Components/PageLayout";
import Card from "@/Components/Card";
import Modal from "@/Components/Modal";

export default {
    name: "Categories",
    components: {Modal, Card, PageLayout},
    data() {
        return {
            showForm: false,
            currentCategory: null
        }
    },
    methods: {
        showEditForm(id) {
            this.showForm = true
            this.currentCategory = id
        },
        closeForm() {
            this.showForm = false
            this.currentCategory = null
        }
    },
}
</script>

<style scoped>

</style>
