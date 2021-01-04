import {reactive} from "vue";

export function useCategory() {
    const state = reactive({
        categories: [],
        incomeTypes: [],
        expenseTypes:[],
        category:{

        }
    })


    const fetchCategories = async () => {
        axios.get(route('categories.index')).then(response => {
            state.categories = response.data
            state.incomeTypes = response.data.filter(item => item.type == 'income');
            state.expenseTypes = response.data.filter(item => item.type == 'expense');
        }).catch()
    }

    const fetchCategory = async (category_id) => {
        return await axios.get(route('categories.show', category_id));
    }

    const deleteCategory = async (category_id) => {
        return await axios.delete(route('categories.destroy', category_id))
    }

    return {fetchCategories, deleteCategory,fetchCategory, state}
}
