<template>
    <v-app class="mt-6">
        <v-container>
            <v-row>
                <h1 class="my-6">Orders CRUD App</h1>
                <table>
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Order ID</th>
                            <th>Date Of Creation</th>
                            <th>Date Of Picker Calendar</th>
                            <th>Truck number</th>
                            <th>Client Name</th>
                            <th>Attachments</th>
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
                            <td>
                                <!-- {{ order.file }} -->
                                <v-btn type="button" @click="downloadFile(order.id)" depressed color="warning">
                                    Download
                                </v-btn>
                            </td>
                            <td class="d-flex flex-row">
                                <v-btn depressed color="transparent">
                                    <router-link :to='{ name: "Edit", params: { id: order.id } }'>Edit</router-link>
                                </v-btn>

                                <v-btn type="button" @click="deleteOrder(order.id)" depressed color="error">
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
        },
        // implement download file
        downloadFile(id) {
            this.axios.get(`/api/order/${id}/download`, { responseType: 'blob' }).then(response => {
                let fileUrl = window.URL.createObjectURL(response.data);
                let fileLink = document.createElement('a');
                fileLink.href = fileUrl;
                fileLink.setAttribute('download', response.headers['content-disposition'].split('filename=')[1]);
                document.body.appendChild(fileLink)
                fileLink.click();
                console.log('id', id)
                console.log(response)
            }).catch(error => {
                console.log(error)
            })
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
    background-color: #1976d2;
    color: white;
}
</style>