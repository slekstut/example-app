<template>
    <v-app class="my-6">
        <v-container style="max-width: 600px;">
            <h1 class="my-6">Add Order</h1>
            <v-form class="d-flex flex-column justify-center" enctype='multipart/form-data'>
                <v-date-picker v-model="order.picker"></v-date-picker>
                <v-text-field v-model="order.truck_number" label="Truck number"></v-text-field>
                <v-select v-model="order.client_name" :items="items" label="Select a client"></v-select>
                <!-- <v-file-input v-model="order.file" show-size counter label="File input"></v-file-input> -->

                <v-flex xs12 class="text-xs-center text-sm-center text-md-center text-lg-center">
                    <!-- Here the image preview -->
                    <img :src="imageUrl" height="150" v-if="imageUrl" />
                    <v-text-field label="Select Image" @click='pickFile' v-model='imageName'
                        prepend-icon="mdi-file-image"></v-text-field>
                    <input type="file" style="display: none" ref="image" accept="image/jpeg, image/jpg, image/png"
                        @change="onFilePicked">
                </v-flex>

                <v-btn @click="create" class="mt-6">Create An Order</v-btn>
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
        imageUrl: '',
        imageFile: null,
        imageName: '',
    }),
    methods: {
        async create() {
            let formData = new FormData()
            formData.append('picker', this.order.picker)
            formData.append('truck_number', this.order.truck_number)
            formData.append('client_name', this.order.client_name)
            formData.append('file', this.imageFile)
            formData.append('_method', 'POST');
            formData.append('headers', {
                'Content-Type': 'multipart/form-data'
            });
            await this.axios.post('/api/order', formData).then(response => {
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
        pickFile() {
            this.$refs.image.click()
        },
        onFilePicked(e) {
            const files = e.target.files
            if (files[0] !== undefined) {
                this.imageName = files[0].name
                if (this.imageName.lastIndexOf('.') <= 0) {
                    return
                }
                const fr = new FileReader()
                fr.readAsDataURL(files[0])
                fr.addEventListener('load', () => {
                    this.imageUrl = fr.result
                    this.imageFile = files[0]
                })
            } else {
                this.imageName = ''
                this.imageFile = ''
                this.imageUrl = ''
            }
        },
    },
    mounted() {
        this.getClients()
    },
}
</script>

