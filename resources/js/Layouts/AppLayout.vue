<template>
    <div class="client-app">
        <side-menu/>
        <!-- Page Heading -->
        <!--        <client-header :page-title="pageTitle">-->

        <!--        </client-header>-->

        <!-- Page Content -->
        <main class="client-app-main-body">
            <router-view>
            </router-view>
        </main>


        <!-- Modal Portal -->
        <!--        <portal-target multiple name="modal">-->
        <!--        </portal-target>-->

        <!--        <bottom-nav-bar/>-->
    </div>
</template>

<script>
import BottomNavBar from "@/Partials/BottomNavBar";
import ClientHeader from "@/Partials/ClientHeader";
import SideMenu from "@/Partials/SideMenu";

export default {

    components: {
        SideMenu,
        ClientHeader,
        BottomNavBar,
    },
    setup() {
        console.log('setup')
    },
    props: {
        pageTitle: {
            type: String,
            default: ""
        },
    },

    data() {
        return {
            showingNavigationDropdown: false,
        }
    },

    methods: {},
    created() {
    }

}
</script>

<style lang="scss" scoped>

.client-app {
    background: #f4f7fc;
    min-height: 100vh;
    display: flex;

    .client-app-main-body {
        min-height: 50vh;
        width: 100%;
    }
}

.page-enter-active, .page-leave-active {
    transition: opacity 1s, transform 1s;
}
.page-enter, .page-leave-to {
    opacity: 0;
    transform: translateX(-30%);

}

</style>
