<template>
    <form-group label="Caregory : ">
        <select name="category_id">
            <option v-for="category in categories" :selected="value == category.id? true: false" :key="category.id" :value="category.id">{{category.name}}</option>
        </select>
    </form-group>
</template>
<script>
    export default {
        // props : ['token'],
        props : ['value'],
        data() {
            return {
                categories: []
            };
        },
        created() {
            axios.get("/api/v1/category").then(response => {
                this.categories = response.data;
            });
        }
    };
</script>
