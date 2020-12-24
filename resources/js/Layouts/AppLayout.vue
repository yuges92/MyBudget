<template>
    <div class="client-app">
        <side-menu/>
        <!-- Page Heading -->
<!--        <client-header :page-title="pageTitle">-->

<!--        </client-header>-->

        <!-- Page Content -->
        <main class="client-app-main-body">
            <router-view />
        </main>


        <!-- Modal Portal -->
        <!--        <portal-target multiple name="modal">-->
        <!--        </portal-target>-->

<!--        <bottom-nav-bar/>-->
    </div>
</template>

<script>
import JetApplicationMark from '@/Jetstream/ApplicationMark'
import JetDropdown from '@/Jetstream/Dropdown'
import JetDropdownLink from '@/Jetstream/DropdownLink'
import JetNavLink from '@/Jetstream/NavLink'
import JetResponsiveNavLink from '@/Jetstream/ResponsiveNavLink'
import BottomNavBar from "@/Partials/BottomNavBar";
import ClientHeader from "@/Partials/ClientHeader";
import SideMenu from "@/Partials/SideMenu";
import customerRoutes from "@/router/customerRoutes";

export default {

    components: {
        SideMenu,
        ClientHeader,
        BottomNavBar,
    },
    setup(){
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

    methods: {

    },
    created(){
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
</style>
