
import axios from 'axios';
export default {
    getValidate(token){
            axios.defaults.headers.common['Authorization'] = `Bearer ${token}`
    }
}
