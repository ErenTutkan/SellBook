<template>
<div class="card">
    <div class="card-header d-flex justify-content-between">
        <h4>Category List</h4>
        <router-link :to="{name:'addCategory'}" class="btn btn-success" >
            Ekle
        </router-link>
    </div>
    <div class="card-body">
        <table class="table table-bordered table-striped">
            <thead>
            <tr>
                <th >Id</th>
                <th >Category Name</th>
                <th >Actions </th>
            </tr>
            </thead>
            <tbody>
            <tr v-for="item in data">
                <th>{{ item.id }}</th>
                <td>{{ item.CategoryName }}</td>
                <td><router-link :to="{name:'updateCategory',params:{id:item.id}}" class="btn btn-info">Update</router-link>
                    <button class="btn btn-danger" @click="deletecategory(item.id)">Delete</button></td>
            </tr>
            </tbody>
        </table>
    </div>
</div>
</template>

<script>
import Validate from './../api/validate'
export default {

    name: "CategoryList",
    data(){
        return {
            data:[]
        }
    },
    props:{getValidate:Function}
    ,methods:{
        getData(){
            Validate.getValidate(localStorage.getItem('access_token'));
            axios.get('/api/category').then((res)=>{
                this.data=res.data;
            })
        },
        deletecategory(id){
            Validate.getValidate(localStorage.getItem('access_token'));
            axios.delete('/api/deletecategory/'+id).then(()=>{
                this.getData()
            })
        }
    },
    created() {
        this.getValidate();
        this.getData();
    }
}
</script>

<style scoped>

</style>
