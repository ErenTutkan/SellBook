<template>

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Register</div>

                    <div class="card-body">
                        <form method="POST" action="">


                            <div class="row mb-3">
                                <label for="name" class="col-md-4 col-form-label text-md-end">Name</label>

                                <div class="col-md-6">
                                    <input id="name" type="text" class="form-control " name="name" v-model="form.name" value="" required autocomplete="name" autofocus>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="email" class="col-md-4 col-form-label text-md-end">E-Mail</label>

                                <div class="col-md-6">
                                    <input id="email" type="email" class="form-control " name="email" value="" v-model="form.email" required autocomplete="email">


                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="password" class="col-md-4 col-form-label text-md-end">Password</label>

                                <div class="col-md-6">
                                    <input id="password" type="password" class="form-control" name="password" v-model="form.password" required autocomplete="new-password">
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="password-confirm" class="col-md-4 col-form-label text-md-end">Confirm Password</label>

                                <div class="col-md-6">
                                    <input id="password-confirm" type="password" class="form-control" v-model="form.password_confirmation" name="password_confirmation" required autocomplete="new-password">
                                </div>
                            </div>

                            <div class="row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" @click.prevent="register" class="btn btn-primary">
                                        Register
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
    name: "Register",
    data(){
        return {
            form:{
                name:'',
                email:'',
                password:'',
                password_confirmation:''
            },
            error:[]
        }
    },
    methods:{
        register(){
            axios.post('/api/register',this.form).then((res)=>{
                console.log('saved')
            }).catch((error)=>{
                console.log(error)
                this.error=error.response.data.errors;
            })
        }
    }
}
</script>

<style scoped>

</style>
