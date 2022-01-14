<template>
    <div class="card">
        <div class="card-header d-flex justify-content-between">
            <h4>Book List</h4>
            <router-link :to="{name:'addBook'}" class="btn btn-success" >
                Add
            </router-link>
        </div>
        <div class="card-body">
            <table class="table table-bordered table-striped">
                <thead>
                <tr>
                    <th >Id</th>
                    <th >Book Name</th>
                    <th> Category Name</th>
                    <th >Actions </th>
                </tr>
                </thead>
                <tbody>
                <tr v-for="item in data">
                    <th>{{ item.id }}</th>
                    <td>{{ item.name }}</td>
                    <td>{{item.category.CategoryName}}</td>
                    <td><router-link :to="{name:'updateBook',params:{id:item.id}}" class="btn btn-info">Update</router-link>
                        <button class="btn btn-danger" @click="deleteBook(item.id)">Delete</button></td>
                </tr>
                </tbody>
            </table>
        </div>
    </div>
</template>

<script>
import Validate from './../api/validate'
export default {
    name: "BookList",
    data(){
        return {
            data:[]
        }
    },
    props:{
        getValidate:Function
    },
    methods:{
        getData(){

            axios.get('/api/books').then((res)=>{
                this.data=res.data;
                console.log(this.data)
            })

        },
        deleteBook(id){
            axios.delete('/api/deletebook/'+id).then((res)=>{
                console.log(res.data);
                this.getData();
            })
        },
    },
    created() {
        this.getValidate();
        this.getData();
    }
}
</script>

<style scoped>

</style>
