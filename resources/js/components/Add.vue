<template>
    <v-app>
        <v-container>
            <v-form>
                <h1>test app</h1>
                <v-text-field class="py-4" value="U111111" label="Order No. (Read Only)" disabled></v-text-field>
                <v-text-field value="U111110" label="Last Order. (Read Only)" disabled></v-text-field>
                <v-date-picker v-model="picker"></v-date-picker>
                <v-text-field label="Truck number"></v-text-field>
                <v-select :items="items" label="Select a client"></v-select>
                <v-file-input show-size counter multiple label="File input"></v-file-input>
                <v-btn elevation="2" @click="create"></v-btn>
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
            date: '',
            truck_number: '',
            client_name: '',
            file: '',
        },
        items: ['client1', 'client2', 'client3', 'client4'],
        picker: (new Date(Date.now() - (new Date()).getTimezoneOffset() * 60000)).toISOString().substr(0, 10),
    }),
    methods: {
        async create() {
            await this.axios.post('/api/order', this.order).then(response => {
                this.$router.push({ name: "Orders" })
            }).catch(error => {
                console.log(error)
            })
        }
    }
}
</script>

  