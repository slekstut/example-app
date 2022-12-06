<template>
    <div>
        <div>
            <router-link :to='{name:"orderAdd"}'>Create</router-link>
        </div>
            <div class="card">
                <div class="card-header">
                    <h4>Order</h4>
                </div>
                <div class="card-body">
                    <div>
                        <table>
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Date</th>
                                    <th>Truck number</th>
                                    <th>Client Name</th>
                                    <th>File</th>
                                </tr>
                            </thead>
                            <tbody v-if="orders.length > 0">
                                <tr v-for="(order,key) in orders" :key="key">
                                    <td>{{ order.id }}</td>
                                    <td>{{ order.date }}</td>
                                    <td>{{ order.truck_number }}</td>
                                    <td>{{ order.client_name }}</td>
                                    <td>{{ order.file }}</td>
                                    <td>
                                        <router-link :to='{name:"orderEdit",params:{id:order.id}}' >Edit</router-link>
                                        <button type="button" @click="deleteOrder(category.id)" >Delete</button>
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
    </div>
</template>

<script>
export default {
    name:"Orders",
    data(){
        return {
            orders:[]
        }
    },
    mounted(){
        this.getOrders()
    },
    methods:{
        async getOrders(){
            await this.axios.get('/api/order').then(response=>{
                this.orders = response.data
            }).catch(error=>{
                console.log(error)
                this.orders = []
            })
        },
        deleteOrder(id){
            if(confirm("Are you sure to delete this order ?")){
                this.axios.delete(`/api/order/${id}`).then(response=>{
                    this.getOrders()
                }).catch(error=>{
                    console.log(error)
                })
            }
        }
    }
}
</script>