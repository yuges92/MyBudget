<template>
    <nav class="sm-nav">
        <ul class="sm-nav-container">
            <li class="sm-nav-list">
                <router-link :to="{name:'overview'}"
                              class="sm-nav-list-link "><i class="fas fa-home"></i> <span
                    class="sm-nav-list-link-name">Overview</span></router-link>
            </li>
            <li>
                <router-link :to="{name:'incomes'}"
                              class="sm-nav-list-link"><i class="fas fa-hand-holding-usd"></i> <span
                    class="sm-nav-list-link-name">Incomes</span></router-link>
            </li>
            <li>
                <router-link :to="{name:'overview'}"
                              class="sm-nav-list-link"><i class="fas fa-chart-line"></i> <span
                    class="sm-nav-list-link-name">Transactions</span></router-link>
            </li>
            <li>
                <router-link :to="{name:'overview'}"
                              class="sm-nav-list-link"><i class="fas fa-credit-card"></i> <span
                    class="sm-nav-list-link-name">Debts</span></router-link>
            </li>
            <li>
                <a class="sm-nav-list-link" href=""><i class="fas fa-ellipsis-h"></i> <span
                    class="sm-nav-list-link-name">More</span></a>
            </li>
        </ul>
    </nav>
</template>

<script>
export default {
    name: "BottomNavBar"
}

</script>

<style lang="scss" scoped>
.sm-nav {
    display: flex;
    width: 100%;
    position: fixed;
    bottom: 0;
    left: 0;
    border-top: 1px solid #a9a9a97d;
    box-shadow: 0px -2px 20px -1px #a9a9a97d;
    background: #fff;
    justify-content: center;

    .sm-nav-container {
        list-style: none;

        display: flex;
        justify-content: space-evenly;
        width: 100%;
        display: flex;


        .sm-nav-list-link {
            color: #5b5b5b;
            font-size: 1.5rem;
            padding: 0.5rem 1rem;
            text-decoration: none;
            text-align: center;
            display: flex;
            flex-direction: column;

            .sm-nav-list-link-name {
                font-size: 0.8rem;
                //display: none;
                &.active {
                    //display: block ;
                }

            }

            &.active {
                color: #005ab7;

            }
        }
    }
}


</style>
