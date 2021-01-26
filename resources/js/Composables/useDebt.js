import {reactive} from "vue";

export function useDebt() {
    const state = reactive({
        debts: [],
        debt: {},


    });


    const saveDebt = async () => {
        return axios.post(route('debts.store'), state.debt)
    }

    const fetchDebts = async () => {
        return axios.get(route('debts.index')).then(response => {
            state.debts = response.data
            return new Promise(resolve => {
                resolve(true);
            })
        }).catch()
    }

    const fetchADebt = async (debt_id) => {
        return axios.get(route('debts.show', debt_id));
    }

    const deleteDebt = async (debt_id) => {
        return axios.delete(route('debts.destroy', debt_id))
    }

    return {state, fetchDebts, fetchADebt, deleteDebt, saveDebt}
}
