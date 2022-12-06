<template>
    <v-form>
        <v-container>
            <v-row>
                <v-file-input truncate-length="15"></v-file-input>
            </v-row>
        </v-container>
    </v-form>
</template>

<script>
export default {
    mounted() {
        console.log('Component mounted.')
    }
}
</script