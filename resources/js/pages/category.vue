<template>
    <div class="container">
        <div class="row mb-2">
            <div class="col-md-8">
                 <Input v-model="form.name" placeholder="Enter Category..."/>
            </div>
            <div class="col-md-4">
                <Button type="success" @click="add_category">Add</Button>
            </div>
        </div>
        <h1 class="text-center">All Category</h1>
        <table class="table table-dark">
            <thead>
                <tr>
                <th scope="col">ID</th>
                <th scope="col">Name</th>
                <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                <tr v-for="(item,index) in category" :key="index">
                    <td>{{item.id}} </td>
                    <td>
                        <template  v-if="isEdit && index == editIndex">  <Input v-model="edit_form.name" placeholder="Enter Category..."/></template>
                        <template v-else ><h5> {{item.name}} </h5></template>
                       
                    </td>
                    <td>
                            <template   v-if="isEdit && index == editIndex">
                                <button class="btn btn-success" @click="updateCategory" >Save</button>
                                <button class="btn btn-warning" @click="isEdit = false">Cancel</button>
                            </template>
                            <template v-else>
                                <button class="btn btn-primary" @click="isEditOn(item,index)" >Edit</button>
                                <button class="btn btn-danger" @click="category_delete(item.id,index)" >Delete</button>
                            </template>
                            
                    </td>
                </tr>
            </tbody>
            </table>
    </div>
</template>

<script>
export default {
    data(){
        return{
            category:[],
            comment:[],
            form:{
                name:'',
            },
            edit_form:{
                name:'',
                id:'',
            },
            isEdit:false,
            editIndex:-1,
        }
    },
    methods:{
        async all_products(){
            const res = await this.callApi('get','all_category')
            if(res.status == 200){
                this.category = res.data
            }
        },
        async allComment(){
            const res1 = await this.callApi('get','allComment')
            if(res1.status == 200){
                this.comment = res1.data
            }
        },
        async add_category(){
            if(this.form.name == '') return this.i("Category Name is empty!");
            const res = await this.callApi('post','add_category',this.form)
            if(res.status == 201){
                this.category.push(res.data)
                this.s("New Category Added !")
                this.form.name = ''
            }
            else{
                this.swr();
            }
        },
        async updateCategory(){
            if(this.edit_form.name == '') return this.i("Category Name is empty!");
            const res = await this.callApi('post','edit_category',this.edit_form)
            if(res.status == 200){
                this.category[this.editIndex] = _.clone(this.edit_form) 
                this.s("Category Updated  !")
                let ob ={
                    name:'',
                    id:'',
                }
                this.edit_form = ob 
                this.editIndex = -1
                this.isEdit = false
            }
            else{
                this.swr();
            }
        },
        async category_delete(id,index){
            if(!confirm("Are you sure to delete this Category")){
                return;
            }
            let ob = {
                id:id
            }
            const res = await this.callApi('post','delete_category',ob)
            if(res.status == 200){
                this.i(' Category have been successfully Deleted!')
                this.category.splice(index,1)
            }
        },
        isEditOn(item,index){
            this.edit_form = _.clone(item) 
            this.editIndex = index
            this.isEdit = true
        }
    },
    created(){
        this.all_products();
        this.allComment();
    }
}
</script>