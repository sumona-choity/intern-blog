<template>
    <div class="container">
        <form v-on:submit.prevent>
            <div class="form-group">
                <label for="exampleInputEmail1">Name</label>
                <input type="text" class="form-control" v-model="form.name" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="" >
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Price</label>
                <input type="number" class="form-control" v-model="form.price" id="exampleInputPassword1" placeholder="" >
            </div>
            
            <button type="submit" class="btn btn-primary" @click="formSubmit">Submit</button>
            </form>
    </div>
</template>
<script>
export default {
    data(){
        return{
            product:{},
             form:{
                name:'',
                price:'',
            }
        }
    },
    methods :{
        async single_products(){
            const res = await this.callApi('get',`product/${this.$route.params.id}`)
            if(res.status == 200){
                this.product = res.data
                this.form = _.clone(this.product)
            }
        },
        async formSubmit(){
            if(this.form.name == '') return this.i("Product Name is Empty!")
            if(this.form.price == '') return this.i("Product Price is Empty!")
            this.form.id = this.product.id
            const res = await this.callApi('post','edit_product',this.form)
            if(res.status == 200){
                this.s(' Product have been successfully Updated!')
                this.$router.push(`/product/${this.product.id}`)
            }
            else{
                this.swr()
            }

        },
    },
    created(){
        //console.log(this.$route)
        this.single_products();
    }
}
</script>