<template>
    <div>
        <nav>
            <ul>
                <li><router-link to="/">Home</router-link></li>
                <li><router-link to="/orders">Orders</router-link></li>
                <li><router-link to="/order/add">Add Order</router-link></li>
            </ul>
        </nav>
        <div>
            <router-view></router-view>
        </div>
        <div class="main-title">
            <h1>Welcome to Orders App!</h1>
        </div>
    </div>
</template>

<script>
export default {
    data: () => ({
    }),
}
</script>

<style>
body {
    margin: 0;
    padding: 0;
    font-family: sans-serif;

}

/* style nav */
nav {
    background-color: #333;
    overflow: hidden;
    display: flex;
}

nav ul {
    display: flex;
    list-style-type: none;
    margin: 0;
    padding: 0;
    overflow: hidden;
    background-color: #333;
}

nav li {
    float: left;
}

nav li a {
    display: block;
    color: white;
    text-align: center;
    padding: 14px 16px;
    text-decoration: none;
}

nav li a:hover {
    background-color: #111;
}

/* style .main-title */
.main-title {
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100vh;
}

.main-title h1 {
    font-size: 5rem;
    color: #333;
}
</style>