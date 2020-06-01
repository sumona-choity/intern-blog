<template>
   <div class="container">
        <Form :model="formItem" :label-width="60">
        
        <FormItem label="Email">
            <Input v-model="formItem.email" placeholder="Enter something..."></Input>
        </FormItem>
        <FormItem label="Password">
            <Input type="password" v-model="formItem.password" placeholder="Enter something..."></Input>
        </FormItem>
       
        
        <FormItem>
            <Button type="primary" @click="login" >Login</Button>
        </FormItem>
    </Form>
   </div>
</template>
<script>
    export default {
        data () {
            return {
                formItem: {
                  email:'',
                  password:'',
                  
                }
            }
        },
        methods:{
            async login(){

                if(this.formItem.email=="" || this.formItem.password==''){
                    this.i("All frields are required!");
                    return;
                }
                const res = await this.callApi('post','login',this.formItem)
                if(res.status===200){
                    
                   
                     this.$store.commit('setAuthuser', (res.data));
                    this.s("login successfull !")
                      // window.location = '/'
                    this.$router.push('/')
                
                }
                else if (res.status===422){
                    this.e(res.data.msg);
                }
                else {
                    this.swr();
                }
            },

        },
        created(){
            console.log(window.authUser)
            
        }
    }
</script>
