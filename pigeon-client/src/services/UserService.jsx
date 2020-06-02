import axios from "axios";

class UserService {

    constructor() {
        this.baseUrl = "/api/user";
    }

    login(data) {

        const loginUrl = this.baseUrl + "/login";

        axios.post({
            method: 'post',
            url: loginUrl,
            data: data,
        });

        
    }

    register() {

    }

    logout() {

    }

}

export default UserService;