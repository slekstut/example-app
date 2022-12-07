<template>
    <v-app>
        <v-container>
            <v-form>
                <h1>test app</h1>
                <v-text-field v-model="order.order_no" class="py-4" value="U111111" label="Order No. (Read Only)" disabled></v-text-field>
                <v-text-field v-model="order.last_order" value="U111110" label="Last Order. (Read Only)" disabled></v-text-field>
                <v-date-picker v-model="order.picker"></v-date-picker>
                <v-text-field v-model="order.truck_number" label="Truck number"></v-text-field>
                <v-select v-model="order.client_name" :items="items" label="Select a client"></v-select>
                <v-file-input v-model="order.file" show-size counter label="File input"></v-file-input>
                <v-btn @click="create"></v-btn>
            </v-form>
        </v-container>
    </v-app>
</template>
<script>
export default {
    name: 'Add',
    data: () => ({
        order: {
            order_no: 'U111111' || '',
            last_order: 'U111111' || '',
            picker: (new Date(Date.now() - (new Date()).getTimezoneOffset() * 60000)).toISOString().substr(0, 10).toString(),
            truck_number: '',
            client_name: '',
            file: [],
        },
        items: ['client1', 'client2', 'client3', 'client4'],
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
        }
    }
}
</script>

