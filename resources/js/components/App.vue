<template>
    <div>
        <nav>
            <ul>
                <li>
                    <router-link to="/">Home</router-link>
                    <router-link to="/list">Orders</router-link>
                    <router-link to="/order/add">Add Order</router-link>
                </li>
            </ul>
        </nav>
        <div>
            <router-view></router-view>
        </div>
    </div>
</template>

<script>
export default {
    data: () => ({
    }),
}
</script>

<style scoped>
.container {
    max-width: 500px;
}
</style>