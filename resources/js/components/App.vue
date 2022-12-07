<template>
    <v-app class="purple darken-2 text-center">
        <nav class="d-flex">
            <v-container class="d-flex justify-space-between">
                <v-icon large color="orange darken-2">
                    mdi-arrow-up-bold-box-outline
                </v-icon>
                <ul class="d-flex">
                    <li><router-link to="/">Home</router-link></li>
                    <li><router-link to="/orders">Orders</router-link></li>
                    <li><router-link to="/order/add">Add Order</router-link></li>
                </ul>
            </v-container>
        </nav>
        <div>
            <router-view></router-view>
        </div>
    </v-app>
</template>

<script>
export default {
    data: () => ({
    }),
}
</script>

<style scoped>
body {
    margin: 0;
    padding: 0;
    font-family: sans-serif;
}

nav {
    background-color: #333;
}

nav ul {
    list-style: none;
}

nav li a {
    display: block;
    color: #fff;
    text-align: center;
    padding: 28px 32px;
    text-decoration: none;
}

nav li a:hover {
    background-color: #111;
}
</style>