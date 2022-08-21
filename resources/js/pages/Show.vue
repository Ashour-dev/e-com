<template>
    <div>
        Show
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