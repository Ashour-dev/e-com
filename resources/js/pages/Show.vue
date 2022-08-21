<template>
    <div class="w-50 mx-auto text-center">
        <img class="w-100 mb-4" :src="(product['photo'].startsWith('https://')) ? product.photo : '../../storage/'+ apartment.photo" :alt="product['name']">
        <h1>{{product['brand']}} {{product['name']}}</h1>
        <p class="w-50 mx-auto">{{product['description']}}</p>
        <h3>Size Available: {{product['size']}}</h3>
        <h3>price: {{product['price']}}</h3>
    </div>
</template>

<script>
import Axios from 'axios'
export default {
    name:'Show',
    data(){
        return{
            id:this.$route.params.id,
            product:[],
        }
    },
    methods:{
        getProduct(){
            Axios.get(`/api/products/${this.id}`)
                .then(response=>{
                    this.product=response.data;
                    console.log(this.product)
                })
        }
    },
    created(){
        this.getProduct();
    }
}
</script>

<style>

</style>