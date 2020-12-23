<template>
    <div class="client-app">
        <side-menu/>
<h1>Hello World!</h1>
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

export default {
    components: {
        SideMenu,
        ClientHeader,
        BottomNavBar,
        JetApplicationMark,
        JetDropdown,
        JetDropdownLink,
        JetNavLink,
        JetResponsiveNavLink,
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

    }
}
</script>

<style lang="scss" scoped>

.client-app {
    background: #f4f7fc;
    min-height: 150vh;

    .client-app-main-body {
        min-height: 50vh;
    }
}
</style>
