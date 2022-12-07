<template>
    <v-app class="purple darken-2 text-center">
        <nav class="d-flex">
            <v-container class="d-flex justify-space-between px-0">
                <router-link to="/" class="d-flex align-center">
                    <v-icon large color="white darken-2">
                        mdi-arrow-up-bold-box-outline
                    </v-icon>
                </router-link>
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
        <Footer />
    </v-app>
</template>

<script>
import Footer from './Footer.vue'
export default {
    components: {
        Footer
    },
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
    color: #1976d2;
}

nav li:last-child a {
    margin-right: 0;
    padding-right: 0;
}
</style>