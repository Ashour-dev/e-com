<template>
    <div class="d-flex justify-content-center gap-2 flex-wrap mx-auto p-3">
        <Card v-for="(product,index) in products" :key="index" :product="product" />
    </div>
</template>

<script>
import Axios from 'axios';
import Card from '../components/Card'
export default {
    name:'Home',
    components:{
        Card,
    },
    data(){
        return{
            products:[]
        }
    },
    methods:{
        getProducts(){
            Axios.get('/api/products')
                .then(response=>{
                    this.products=response.data;
                    console.log(this.products);
                })
        },
    },
    created(){
        this.getProducts();
    }
}
</script>

<style lang="scss" scoped>

</style>