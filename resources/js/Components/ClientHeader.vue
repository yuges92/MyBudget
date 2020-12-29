<template>
    <header class="client-header">
        <div class="client-header-container">
            <button v-if="isBackBtnActive" class="go-back-btn" @click="goBack"><i class="fas fa-chevron-left"></i></button>
            <h2 class="page-title">{{ pageTitle }}</h2>
        </div>
    </header>
</template>

<script>
export default {
    name: "ClientHeader",
    props: {
        pageTitle: {
            type: String,
            default: ""
        },
        isBackBtnActive:{
            type:Boolean,
            default: false
        },
    },
    methods: {
        goBack() {
            window.history.back();
        }
    },
}
</script>

<style lang="scss" scoped>
.client-header {
    position: fixed;
    width: 100%;
    background: #005ab7;
    color: #fff;
    min-height: 4rem;
    text-align: center;
    display: flex;
    justify-content: center;
    align-items: flex-end;

    .client-header-container {
        display: flex;
        width: 100%;
        text-align: center;


        .page-title {
            justify-content: center;
            text-align: center;
            flex: 100%;
            padding-bottom: 0.5rem;
        }

        .go-back-btn {
            border: none;
            background: none;
            font-size: 1.5rem;
            justify-self: flex-start;
            color: #fff;
            width: 2rem;
            text-align: left;
            position: absolute;
        }
    }

}

</style>
