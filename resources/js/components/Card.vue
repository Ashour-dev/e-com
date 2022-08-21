<template>
    <div class="card" @click="openProduct(product.id)">
        <img :src="product.photo" class="card-img-top" alt="...">
        <div class="card-body">
            <h5 class="card-title">{{product.brand}} {{product.name}}</h5>
            <p class="card-text">Size: {{product.size}}</p>
            <p class="card-text">price: {{product.price}}£</p>
        </div>
    </div>
</template>

<script>
export default {
    name:'Card',
    props:{product:Array},
    methods:{
        openProduct(id){
            window.open(`/product/${id}`);
        }
    }
}
</script>

<style lang="scss" scoped>
    .card{
        width: 18.7vw !important;
        img{
            height: 30vh;
            object-fit: cover;
        }
    }
</style>