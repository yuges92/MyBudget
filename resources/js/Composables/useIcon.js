import {onBeforeMount, ref} from "vue";

export function useIcon() {
    const icons = ref([])

    const fetchIcons = async () => {
        return axios.get('/api/icons').then(response => {
            icons.value = response.data
            return new Promise(resolve => {
                resolve(response);
            })
        }).catch(err => {
            console.error(err)
        })
    }

    onBeforeMount(() => {
        fetchIcons()
    })

    return {fetchIcons, icons}
}
