<template>
    <router-view v-slot="{ Component }">
        <transition name="mode-fade" mode="out-in">
            <component :is="Component"/>
        </transition>
    </router-view>
</template>

<script>
import BottomNavBar from "@/Components/BottomNavBar";
import ClientHeader from "@/Components/ClientHeader";
import SideMenu from "@/Components/SideMenu";

export default {

    components: {

    },
    setup() {
    },


}
</script>

<style lang="scss" scoped>


</style>
