<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-8">
                <div class="card">
                    <div class="card-header">
                        <h3>Category Add</h3>
                    </div>
                    <div class="card-body">
                        <form enctype="multipart/form-data" @submit.prevent="store">
                            <div class="row mb-3">
                                <label for="bookName" class="col-md-4 col-form-label text-md-end">Book Name</label>
                                <div class="col-6">
                                    <input type="text" class="form-control" id="bookName" v-model="data.name" name="bookName" required autofocus>
                                </div>

                            </div>
                            <div class="row mb-3">
                                <label for="file" class="col-md-4 col-form-label text-md-end">Image</label>
                                <div class="col-6">
                                    <input type="file" class="form-control" id="file" name="file" @input="data.image= $event.target.files[0]" required autofocus>
                                </div>

                            </div>
                            <div class="row mb-3">
                                <label class="col-md-4 col-form-label text-md-end">Category</label>
                                <div class="col-6">
                                    <select class="form-select" v-model="data.category_id">
                                        <option v-for="item in categories" :value="item.id">{{ item.CategoryName }}</option>
                                    </select>
                                </div>

                            </div>
                            <div class="row mb-3">
                                <label  class="col-md-4 col-form-label text-md-end">Book Description</label>
                                <div class="col-6">
                                    <textarea class="form-control" id="description" v-model="data.description" name="description" required autofocus></textarea>
                                </div>

                            </div>

                            <div class="row mb-0">
                                <div class="col-md-8 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
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
    name: "AddBook",
    data(){
      return {
          data:{
              name:'',
              description:'',
              image:'',
              category_id:'',
          },
          categories:[]
      }
    },
    props:{getValidate:Function},
    methods:{
        getCategory(){
            axios.get('/api/category').then((res)=>{
                this.categories=res.data;
            })
        },
        store(){
            let formData= new FormData();

            formData.append('name',this.data.name);
            formData.append('description',this.data.description);
            formData.append('category_id',this.data.category_id);
            formData.append('image',this.data.image);
            const config={
                headers:{
                    'content-type':'multipart/form-data'
                }
            }

            axios.post('/api/addbook',formData,config).then((res)=>{
                console.log(res.data.msg);
                this.$router.push({name:'bookList'})
            }).catch((error)=>{
                console.log(error)
            })
        },

    },
    created() {
        this.getValidate();
        this.getCategory();
    }
}
</script>

<style scoped>

</style>
