import { API_BASE } from '../config/ApiUrls';
import axios from 'axios';

class PostService {

    constructor() {

        this.baseUrl = API_BASE;

    }

    getPostsByUser(user) {
        const getUrl = this.baseUrl + "/api/posts/" + user;
        
        const result = axios.get(getUrl)
        .then(response => {
            console.log(response.data);

            const posts = response.data.post.map(post => {
                return {
                    title: post.title,
                    body: post.body
                };
            });

            return posts;

        }).catch(error => console.log(error)) 

        return result;
    }

    getPosts() {

    }


    createPost(post) {

    }

    deletePost(post) {

    }

}

export default PostService;