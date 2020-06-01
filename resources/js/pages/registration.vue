<template>
   <div class="container">
        <Form :model="formItem" :label-width="60">
        <FormItem label="Name">
            <Input v-model="formItem.name" placeholder="Enter something..."></Input>
        </FormItem>
        <FormItem label="Email">
            <Input v-model="formItem.email" placeholder="Enter something..."></Input>
        </FormItem>
        <FormItem label="Password">
            <Input type="password" v-model="formItem.password" placeholder="Enter something..."></Input>
        </FormItem>
        <FormItem label="Confirm Password">
            <Input type="password" v-model="formItem.password_confirmation" placeholder="Enter something..."></Input>
        </FormItem>
        
        <FormItem>
            <Button type="primary" @click="registation" >Registration</Button>
        </FormItem>
    </Form>
   </div>
</template>
<script>
    export default {
        data () {
            return {
                formItem: {
                  name:'',
                  email:'',
                  password:'',
                  password_confirmation:'',
                }
            }
        },
        methods:{
            async registation(){
            
                if(this.formItem.name=='' ) return this.i(" Name is required!");
                if(this.formItem.email=='' ) return this.i("Email is required!");
                if(this.formItem.password=='' ) return this.i("Password is required!");
                if(this.formItem.password_confirmation=='' ) return this.i("Password Confirmation is required!");
                if(this.password != this.password_confirmation){
                    this.i("The password confirmation does not match.");
                    return;
                }

                const res = await this.callApi('post',"registration",this.formItem)
                if(res.status===201){
                    this.s("registration Successfull ! Please Login.");
                    this.$router.push('/')
                  

                }
                else if(res.status===422){
                    if(res.data.errors.email){
                        this.errorData.email = res.data.errors.email 
                        for(let e of res.data.errors.email  )
                            this.e(e);
                    }  
                    if(res.data.errors.password)
                    {
                        this.errorData.password = res.data.errors.password 
                        for(let e of res.data.errors.password  )
                            this.e(e);
                    }  
                    
                    if(res.data.errors.firstName)
                    {
                        this.errorData.firstName = res.data.errors.firstName 
                        for(let e of res.data.errors.firstName  )
                            this.e(e);
                    }    
                    if(res.data.errors.lastName)
                    {
                        this.errorData.lastName = res.data.errors.lastName 
                        for(let e of res.data.errors.lastName  )
                            this.e(e);
                    }    
                }
                else{
                    this.swr();
                }
            },
        }
    }
</script>
