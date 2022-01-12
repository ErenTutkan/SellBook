<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Login</div>

                    <div class="card-body">
                        <form method="POST" action="">
                            <div class="row mb-3">
                                <label for="email" class="col-md-4 col-form-label text-md-end">E-Mail</label>

                                <div class="col-md-6">
                                    <input id="email" type="email" class="form-control" v-model="form.email" name="email" value="" required autocomplete="email" autofocus>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="password" class="col-md-4 col-form-label text-md-end">Password</label>

                                <div class="col-md-6">
                                    <input id="password" type="password" class="form-control" v-model="form.password" name="password" required autocomplete="current-password">


                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="col-md-6 offset-md-4">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="remember" id="remember" >

                                        <label class="form-check-label" for="remember">
                                           Remember Me
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <div class="row mb-0">
                                <div class="col-md-8 offset-md-4">
                                    <button @click.prevent="login(), $emit('click')"   type="submit" class="btn btn-primary">
                                       Login
                                    </button>


                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: "Login",
    data() {
        return {
            form:{
                'email':'',
                'password':''
            },
            error:[]
        }
    },
    props:{
        getLogin:{type:Function}
    },
    methods:{
        async login(){
            await axios.get('/sanctum/csrf-cookie').then((result)=>{

                 axios.post('/api/login',this.form).then((res)=>{
                     let token=res.data.access_token;
                     localStorage.setItem('access_token',token)
                     this.$router.push({name:'home'})
                     this.getLogin();

                }).catch((error)=>{
                    this.error=error.response.data.errors;
                })
            });
        }
    }
}
</script>

<style scoped>

</style>
