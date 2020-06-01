<template>
    <div class="container">
        <form v-on:submit.prevent>
            <div class="form-group"> 
                <label for="exampleInputEmail1">Name</label>
                <input type="text" class="form-control" v-model="form.name" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="" >
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Category</label>
                     <Select v-model="form.category_id"  >
                        <Option v-for="item in category" :value="item.id" :key="item.id">{{ item.name }}</Option>
                    </Select>
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Tags</label>
                      <Select v-model="form.tags" multiple >
                        <Option v-for="item in tags" :value="item.id" :key="item.id">{{ item.name }}</Option>
                    </Select>
            </div>
            <div class="form-group"  v-if="form.tags.length>0">
               <div  v-for="(item,index) in form.tags" :key="index">
                   <p>{{item.name}}</p>
               </div>
                     
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
            form:{
                name:'',
                price:'',
                category_id:'',
                tags:[],
            },
            category:[],
            tags:[],
            temp:'',
        }
    },
    methods:{
        async formSubmit(){
            if(this.form.name == '') return this.i("Product Name is Empty!")
            if(this.form.price == '') return this.i("Product Price is Empty!")
            if(this.form.category_id == '') return this.i("Category is Empty!")
            
            const res = await this.callApi('post','add_product',this.form)
            if(res.status == 201){
                this.s(' Product have been successfully added!')
                this.$router.push('/')
            }
            else{
                this.swr()
            }
        },
        addTag(item){
            console.log("addtag clicked !")
            this.form.tags.push(item)
        }
    },
    async created(){
     

        const [ res1, res2] = await Promise.all([
            this.callApi('get','all_category'),
            this.callApi('get','all_tag'),
        ])
        if(res1.status == 200 && res2.status == 200){
            this.category = res1.data
            this.tags = res2.data
        }
    }
}
</script>