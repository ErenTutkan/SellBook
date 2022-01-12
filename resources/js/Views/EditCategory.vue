<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-8">
                <div class="card">
                    <div class="card-header">
                        <h3>Category Add</h3>
                    </div>
                    <div class="card-body">
                        <form>
                            <div class="row mb-3">
                                <label for="categoryName" class="col-md-4 col-form-label text-md-end">Category Name</label>
                                <div class="col-6">
                                    <input type="text" class="form-control" id="categoryName" v-model="category.CategoryName" name="categoryName" required autofocus>
                                </div>

                            </div>
                            <div class="row mb-0">
                                <div class="col-md-8 offset-md-4">
                                    <button @click.prevent="update()" type="submit" class="btn btn-primary">
                                        Add
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
import Validate from './../api/validate'
export default {
    name: "EditCategory",
    props:{
        getValidate:Function
    },
    data(){
        return {
            category: {},
        }
    },
    methods:{
        getData(){
            Validate.getValidate(localStorage.getItem('access_token'));
            if(!this.$route.params.id) this.$router.push({name:'categorylist'});

            axios.get('/api/getCategory/'+this.$route.params.id).then((res)=>{
                this.category=res.data
            });

        },
        update(){
            Validate.getValidate(localStorage.getItem('access_token'));
            axios.post('/api/updatecategory/'+this.$route.params.id,this.category).then((res)=>{
                this.$router.push({name:'categorylist'})
            });
        }
    },mounted() {
        this.getValidate();
        this.getData();
    }
}
</script>

<style scoped>

</style>
