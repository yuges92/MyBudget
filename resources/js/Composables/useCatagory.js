import {reactive} from "vue";

export function useCategory() {
    const state = reactive({
        categories: [],
        incomeTypes: [],
        expenseTypes: [],
        category: {}
    })


    const fetchCategories = async () => {
      return  axios.get(route('categories.index')).then(response => {
            state.categories = response.data
            state.incomeTypes = response.data.filter(item => item.type == 'income');
            state.expenseTypes = response.data.filter(item => item.type == 'expense');
            return new Promise(resolve => {
                resolve(true);
            })
        }).catch()
    }

    const fetchCategory = async (category_id) => {
        return  axios.get(route('categories.show', category_id));
    }

    const deleteCategory = async (category_id) => {
        return  axios.delete(route('categories.destroy', category_id))
    }

    return {fetchCategories, deleteCategory, fetchCategory, state}
}
