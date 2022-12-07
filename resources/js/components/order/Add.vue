<template>
    <v-app class="mt-6">
        <v-container style="max-width: 600px;">
            <v-form>
                <h1 class="mb-6">Orders crud app</h1>
                <v-date-picker v-model="order.picker"></v-date-picker>
                <v-text-field v-model="order.truck_number" label="Truck number"></v-text-field>
                <v-select v-model="order.client_name" :items="items" label="Select a client"></v-select>
                <v-file-input v-model="order.file" show-size counter label="File input"></v-file-input>
                <v-btn @click="create">Create An Order</v-btn>
            </v-form>
        </v-container>
    </v-app>
</template>
<script>
export default {
    name: 'Add',
    data: () => ({
        order: {
            order_no: '',
            last_order: '',
            picker: (new Date(Date.now() - (new Date()).getTimezoneOffset() * 60000)).toISOString().substr(0, 10).toString(),
            truck_number: '',
            client_name: '',
            file: [],
        },
        items: [],
    }),
    methods: {
        async create() {
            console.log('this.order', this.order)

            let formData = {
                order_no: this.order.order_no,
                last_order: this.order.last_order,
                picker: this.order.picker,
                truck_number: this.order.truck_number,
                client_name: this.order.client_name,
                file: this.order.file.name,
            }

            await this.axios.post('/api/order', formData).then(response => {
                this.$router.push({ name: "Orders" })
            }).catch(error => {
                console.log(error)
            })
        },
        async getClients() {
            await this.axios.get('/api/client').then(response => {
                response.data.forEach(element => {
                    this.items.push(element.company_name)
                });
            }).catch(error => {
                console.log(error)
            })
        },
    },
    mounted() {
        this.getClients()
    },
}
</script>

