import HomeComponent from "../components/HomeComponent";
import Deneme from "../components/Deneme";
import Register from "../components/Register";
import Login from "../components/Login";
import CategoryList from "../Views/CategoryList";
import AddCategory from "../Views/AddCategory";
import EditCategory from "../Views/EditCategory";

const routes=[
    {
        path:'/',
        component:HomeComponent,
        name:'home'
    },
    {
        path:'/deneme',
        component: Deneme,
        name:'deneme'
    },
    {
        path:'/register',
        component: Register,
        name:'register'
    },{
    path:'/login',
        component:Login,
        name:'login'
    },
    {
        path:'/categorylist',
        component: CategoryList,
        name:'categorylist'
    },
    {
        path:'/categoryadd',
        component: AddCategory,
        name:'addCategory'
    },
    {
        path:'/categoryupdate',
        component: EditCategory,
        name:'updateCategory'
    }
]
export default routes;
