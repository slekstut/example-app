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
        </v-form>
        </v-container>
    </v-app>

</template>

<script>
export default {
    data: () => ({
        items: ['client1', 'client2', 'client3', 'client4'],
        picker: (new Date(Date.now() - (new Date()).getTimezoneOffset() * 60000)).toISOString().substr(0, 10),
    }),
}
</script>

<style scoped>
.container {
    max-width: 500px;
}
</style>