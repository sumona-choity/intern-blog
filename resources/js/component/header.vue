<template>
    <div class="container-fluid"  >
        <nav class="navbar navbar-expand-lg navbar-light bg-light row">
                <div class="collapse navbar-collapse col-md-6" id="navbarNav">
                    <ul class="navbar-nav">
                        <li class="nav-item active">
                            <router-link to="/" class="nav-link"   >
                                Home <span class="sr-only">(current)</span>
                            </router-link>
                        </li>
                        <li class="nav-item active">
                            <router-link to="/add_product" class="nav-link"   >
                                Add Product <span class="sr-only">(current)</span>
                            </router-link>
                        </li>
                        <li class="nav-item active">
                            <router-link to="/category" class="nav-link"   >
                                All Category <span class="sr-only">(current)</span>
                            </router-link>
                        </li>
                        <li class="nav-item">
                             <router-link to="/users" class="nav-link"   >
                                Users 
                            </router-link>
                        </li>
                        <li class="nav-item">
                             <router-link to="/phones" class="nav-link"   >
                                Phones 
                            </router-link>
                        </li>
                    </ul>
                </div>

                <div class="col-md-6">
                    <ul class="navbar-nav menu_right">
                        <template v-if="isLoggedIn">
                             <li class="nav-item">
                                <a href="/logout"  class="nav-link" >Logout</a>
                            </li>
                        </template>
                        <template v-else>
                             <li class="nav-item">
                                <router-link to="/login" class="nav-link"   >
                                    Login 
                                </router-link>
                            </li>
                            <li class="nav-item">
                                <router-link to="/registration" class="nav-link"   >
                                    Registration 
                                </router-link>
                            </li>
                        </template>
                    </ul>
            </div>
        </nav>
    </div>
</template>

<script>


export default {
  
  created(){
     
  },

}
</script>

<style>
    .menu_right{
        width: 100%;
         
         justify-content: flex-end;
    }
</style>