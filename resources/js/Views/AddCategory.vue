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
                                <input type="text" class="form-control" id="categoryName" v-model="categoryName" name="categoryName" required autofocus>
                            </div>

                        </div>
                        <div class="row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button @click.prevent="store()" type="submit" class="btn btn-primary">
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
import Validate from './../api/validate';
export default {
    name: "AddCategory",
    data(){
        return {
            categoryName:null,
            error:null,
        }
    },
    props:{
        getValidate:Function
    },
    methods:{
      store(){
          Validate.getValidate(localStorage.getItem('access_token'));
          if(this.categoryName!=null){
             let data={
                  'name':this.categoryName
              }
                axios.post('/api/categoryadd',data).then((res)=>{
                   this.$router.push({name:'categorylist'});
                })
          }else{
              this.error="Boş Bırakılamaz";
          }
      }
    },
    created() {
        this.getValidate();
    }
}
</script>

<style scoped>

</style>
