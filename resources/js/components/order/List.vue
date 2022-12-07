<template>
    <v-app>
        <v-container>
            <v-row>
                <div>
                    <div>
                        <h4>Orders list</h4>
                    </div>
                    <div>
                        <div>
                            <table>
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Order ID</th>
                                        <th>Date Of Creation</th>
                                        <th>Date Of Picker Calendar</th>
                                        <th>Truck number</th>
                                        <th>Client Name</th>
                                        <th>File</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody v-if="orders.length > 0">
                                    <tr v-for="(order, key) in orders" :key="key">
                                        <td>{{ order.id }}</td>
                                        <td>{{ order.order_no }}</td>
                                        <td>{{ order.created_at }}</td>
                                        <td>{{ order.picker }}</td>
                                        <td>{{ order.truck_number }}</td>
                                        <td>{{ order.client_name }}</td>
                                        <td>{{ order.file }}</td>
                                        <td class="d-flex flex-row">
                                            <v-btn depressed color="transparent">
                                                <router-link
                                                    :to='{ name: "Edit", params: { id: order.id } }'>Edit</router-link>
                                            </v-btn>

                                            <v-btn type="button" @click="deleteOrder(order.id)" depressed
                                                color="error">
                                                Delete
                                            </v-btn>
                                        </td>
                                    </tr>
                                </tbody>
                                <tbody v-else>
                                    <tr>
                                        <td colspan="4" align="center">No Orders Found.</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </v-row>
        </v-container>
    </v-app>
</template>

<script>
export default {
    name: "Orders",
    data() {
        return {
            orders: []
        }
    },
    mounted() {
        this.getOrders()
    },
    methods: {
        async getOrders() {
            await this.axios.get('/api/order').then(response => {
                this.orders = response.data
                this.orders.forEach(order => {
                    order.created_at = order.created_at.split('T')[0]
                })
            }).catch(error => {
                console.log(error)
                this.orders = []
            })
        },
        deleteOrder(id) {
            if (confirm("Are you sure to delete this order ?")) {
                this.axios.delete(`/api/order/${id}`).then(response => {
                    this.getOrders()
                }).catch(error => {
                    console.log(error)
                })
            }
        }
    },
    mounted() {
        this.getOrders()
    }
}
</script>

<style scoped>
table {
    border-collapse: collapse;
    width: 100%;
}

th,
td {
    text-align: left;
    padding: 16px;
}

tr:nth-child(even) {
    background-color: #f2f2f2
}

th {
    background-color: #4CAF50;
    color: white;
}
</style>