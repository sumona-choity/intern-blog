<template>
    <div class="container">
        <h1>All Products</h1>
        <table class="table table-dark">
            <thead>
                <tr>
                <th scope="col">#</th>
                <th scope="col">ID</th>
                <th scope="col">Name</th>
                <th scope="col">Category</th>
                <th scope="col">Tags</th>
                <th scope="col">Price</th>
                </tr>
            </thead>
            <tbody>
                <tr v-for="(item,index) in products" :key="index">
                    <th scope="row">{{index+1}}</th>
                    <td>
                        <router-link :to="`/product/${item.id}`"  >{{item.id}} </router-link>
                    </td>
                    <td>
                        <router-link :to="`/product/${item.id}`"  >{{item.name}} </router-link>
                        </td>
                    <td>{{item.category.name}}</td>
                    <td>
                        <div v-if="item.tags.length>0">
                            <div v-for="(i,x) in item.tags" :key="x">
                                <span v-if="x!==0"  >,</span>
                                <span >{{i.tag.name}}  </span> 
                            </div>
                        </div>
                    </td>
                    <td>{{item.price}}</td>
                </tr>
            </tbody>
            </table>
    </div>
</template>

<script>
export default {
    data(){
        return{
            products:[],
            allsupplier:[],
            Country:[],
            post:[],
            tag:[],
            user:[],
            image:[],
        }
    },
    methods:{
        async one_to_one(){
            const res5 = await this.callApi('get','one_to_one')
            if(res5.status == 200){
                this.user = res5.data
            }
        },
        async allimage(){
            const res6 = await this.callApi('get','allimage')
            if(res6.status == 200){
                this.image = res6.data
            }
        },
        async many_to_many(){
            const res = await this.callApi('get','all_product')
            if(res.status == 200){
                this.products = res.data
            }
        },
        async all_supplier(){
            const res1 = await this.callApi('get','allsupplier')
            if(res1.status == 200){
                this.allsupplier = res1.data
            }
        },
        async all_Country(){
            const res2 = await this.callApi('get','allCountry')
            if(res2.status == 200){
                this.Country = res2.data
            }
        },
        async all_post(){
            const res3 = await this.callApi('get','all_post')
            if(res3.status == 200){
                this.post = res3.data
            }
        },
        async all_tag(){
            const res4 = await this.callApi('get','all_tag')
            if(res4.status == 200){
                this.tag = res4.data
            }
        }
    },
    created(){
        this.one_to_one();
        this.many_to_many();
        this.all_supplier();
        this.all_Country();
        this.allimage();
        this.all_post();
        this.all_tag();
        
    }
}
</script>