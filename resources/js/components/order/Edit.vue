<template>
    <v-app>
        <v-container>
            <h2 class="my-6">Edit An Order</h2>
            <v-form>
                <v-date-picker v-model="order.picker"></v-date-picker>
                <v-text-field v-model="order.truck_number" label="Truck number"></v-text-field>
                <v-select v-model="order.client_name" :items="items" label="Select a client"></v-select>
                <v-file-input v-model="order.file" show-size counter label="File input"></v-file-input>
                <v-btn @click="edit">Update An Order</v-btn>
            </v-form>
        </v-container>
    </v-app>
</template>

<script>
export default {
    name: 'Edit',
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
        async getOrder() {
            await this.axios.get('/api/order/' + this.$route.params.id).then(response => {
                this.order = response.data
            }).catch(error => {
                console.log(error)
            })
        },
        async edit() {
            let formData = {
                order_no: this.order.order_no,
                last_order: this.order.last_order,
                picker: this.order.picker,
                truck_number: this.order.truck_number,
                client_name: this.order.client_name,
                file: this.order.file.name,
            }

            await this.axios.put('/api/order/' + this.$route.params.id, formData).then(response => {
                this.$router.push({ name: "List" })
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
        this.getOrder()
        this.getClients()
    },
}
</script>