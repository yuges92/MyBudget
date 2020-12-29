<template>
    <div class="client-app">
        <side-menu/>
        <!-- Page Heading -->
        <!--        <client-header :page-title="pageTitle">-->

        <!--        </client-header>-->

        <!-- Page Content -->
        <main class="client-app-main-body">
            <router-view v-slot="{ Component }">
                <transition name="mode-fade" mode="out-in">
                    <component :is="Component"/>
                </transition>
            </router-view>
        </main>


        <!-- Modal Portal -->
        <!--        <portal-target multiple name="modal">-->
        <!--        </portal-target>-->

        <!--        <bottom-nav-bar/>-->
    </div>
</template>

<script>
import BottomNavBar from "@/Components/BottomNavBar";
import ClientHeader from "@/Components/ClientHeader";
import SideMenu from "@/Components/SideMenu";

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


.mode-fade-enter-active, .mode-fade-leave-active {
    transition: transform .5s ease;
}

.mode-fade-leave-active {
    transform: translateX(0%);
}


.mode-fade-enter-from, .mode-fade-leave-to {
    transform: translateX(-100%);
}


</style>
