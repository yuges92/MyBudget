import {reactive} from "vue";

export function usePromisedModal(message = null) {
    let resolveFn = (value) => {
    };
    const modalState = reactive({
        visible: false,
        message: message,
        isLoading:false
    })


    const response = (value) => {
        modalState.visible = false;
        resolveFn(true);
    }

    const openModal = () => {
        modalState.visible = true
        return new Promise((resolve => {
            resolveFn = resolve
        }))
    }

    const closeModal = () => {
        modalState.visible = false
        resolveFn(false);

    }


    return {modalState, openModal, response, closeModal}

}
