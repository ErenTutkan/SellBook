<template>
    <div>
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <router-link to="/" exact class="navbar-brand">
                    Laravel
                </router-link>

                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle Animation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav me-auto">
                        <li>
                            <router-link to="/" exact class="nav-link">Home</router-link>
                        </li>

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto">
                        <!-- Authentication Links -->

                        <li class="nav-item" v-if="!isLogging">
                            <router-link to="/login" class="nav-link" @click="ClickMethod" exact>Login</router-link>

                        </li>


                        <li class="nav-item" v-if="!isLogging">
                            <router-link to="/register"   class="nav-link" exact>Register</router-link>

                        </li>
                        <li class="nav-item" v-if="isLogging">
                            <a class="nav-link" href="#" @click="logout">Logout</a>
                        </li>


                    </ul>
                </div>
            </div>
        </nav>
        <div class="container mt-3">
            <div class="row">
                <div class="col-12">

                    <router-view :getLogin="getLoginStatus" :getValidate="getValidate"></router-view>
                </div>
            </div>

        </div>
    </div>

</template>

<script>
import Validate from './api/validate';
export default {
    name: "App",
    data(){
        return {
            clicking:false,
            isLogging:false,
            token:null,
        }
    },
    mounted(){
        this.token=localStorage.getItem('access_token');
        this.getLoginStatus();
       this.getData();
    },
    methods:{
        getData(){
                this.token=localStorage.getItem('access_token');
                if(this.token!=null){
                    Validate.getValidate(this.token)
                    axios.get('/api/user').then(res=>{
                       console.log('deneme')
                    }).catch((res)=>{
                        this.token=null;
                        localStorage.removeItem('access_token');
                        this.getLoginStatus();
                    })
                }
                else{

                }
            }
        ,
        logout(){
            Validate.getValidate(this.token)
            axios.post('/api/logout').then((res)=>{
                localStorage.removeItem('access_token');
                this.token=null;
                this.getLoginStatus();
            });
            this.ClickMethod()
        },
        getLoginStatus(){
            this.token=localStorage.getItem('access_token');

            if(this.token!=null){
                this.isLogging=true;
            }else{
                this.isLogging=false;
            }
        },
        ClickMethod(){
            this.getLoginStatus()
        },
        getValidate(){

           this.token=localStorage.getItem('access_token');
            Validate.getValidate(this.token)
            if(this.token!=null){
                axios.get('/api/user').then((res)=>{

                }).catch((err)=>{
                    console.log(err)
                    this.$router.push({name: 'home'})
                })
            }else{
                this.$router.push({name: 'home'})
            }
        }
    },

}
</script>

<style scoped>

</style>
