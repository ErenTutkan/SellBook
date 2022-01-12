import Axios from 'axios';
export default {
    getCsrf(){
        Axios.get('/sanctum/csrf-cookie');
    }
}
