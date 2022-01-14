import HomeComponent from "../components/HomeComponent";
import Deneme from "../components/Deneme";
import Register from "../components/Register";
import Login from "../components/Login";
import CategoryList from "../Views/CategoryList";
import AddCategory from "../Views/AddCategory";
import EditCategory from "../Views/EditCategory";
import BookList from "../Views/BookList";
import AddBook from "../Views/AddBook";
import EditBook from "../Views/EditBook";
import UserList from "../Views/UserList";

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
        path: '/editCategory',
        component: EditCategory,
        name: 'updateCategory'
    },
    {
        path:'/booklist',
        component: BookList,
        name:'bookList',
    },
    {
        path:'/addBook',
        component: AddBook,
        name:'addBook'
    },
    {
        path:'/editBook',
        component: EditBook,
        name:'updateBook'
    },
    {
        path:'/userList',
        component: UserList,
        name:'userList'
    }
]
export default routes;
