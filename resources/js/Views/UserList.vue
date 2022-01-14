<template>
    <div class="card">
        <div class="card-header d-flex justify-content-between">
            <h4>User List</h4>

        </div>
        <div class="card-body">
            <table class="table table-bordered table-striped">
                <thead>
                <tr>
                    <th>Id</th>
                    <th>User Name</th>
                    <th>User Email</th>
                    <th>Role</th>
                    <th >Actions </th>
                </tr>
                </thead>
                <tbody>
                <tr v-for="item in users">
                    <th>{{ item.id }}</th>
                    <td>{{ item.name }}</td>
                    <td>{{item.email}}</td>
                    <td><select class="form-select" @change="updateRole(item.id)" v-model="role_id=item.role_id">
                        <option v-for="role in roles" :value="role.id" :selected="role.id==item.role_id">{{role.name}}</option>
                    </select></td>
                    <td><router-link :to="{name:'updateUser',params:{id:item.id}}" class="btn btn-info">Update</router-link>
                        <router-link :to="{name:'updatePassword',params:{id:item.id}}" class="btn btn-info">Update Password</router-link>
                        <button class="btn btn-danger" @click="deleteUser(item.id)">Delete</button></td>
                </tr>
                </tbody>
            </table>
        </div>
    </div>
</template>

<script>
export default {
    name: "UserList",
    props:{
        getValidate:Function
    },
    data(){
        return {
            users:[],
            roles:[],
            role_id:'',
        }
    },
    methods:{
       async getData(){
          await  axios.get('/api/user/list').then((res)=>{
              this.users=res.data
            })
        },
        deleteUser(id){

        },
       async getRole(){
          await  axios.get('/api/role/list').then((res)=>{
                this.roles=res.data;
            })
        },
        updateRole(id){
            axios.post('/api/user/updateRole/'+id,this.role_id).then((res)=>{
                console.log(res);

            }).catch((error)=>{
                console.log(error);
            })
        }
    },
    created() {
        this.getValidate();
        this.getData();
        this.getRole();
    }
}
</script>

<style scoped>

</style>
