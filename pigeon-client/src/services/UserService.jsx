import axios from "axios";
import { API_URL } from '../config/ApiUrls';

class UserService {

    constructor() {
        this.baseUrl = API_URL + "/api/user";
    }

    login(data) {

        const loginUrl = this.baseUrl + "/login";

        const results = axios.post({
            method: 'post',
            url: loginUrl,
            data: data,
        });

        return results;
        
    }

    register() {

    }

    logout() {

    }

}

export default UserService;