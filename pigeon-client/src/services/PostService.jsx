import { config } from '../config/ApiUrls';
import axios from 'axios';

class PostService {

    constructor() {

        this.baseUrl = config.apiUrl + "/api";

    }

    //This looks ugly lol 
    postApiGetHandler(url) {
        const getUrl = url;
        
        const result = axios.get(getUrl)
        .then(response => {
            console.log(response.data);

            const json = response.data; // 

            const posts = json.data.map(post => {
                return {
                    title: post.title,
                    body: post.body,
                    author: post.author,
                };
            });

            return posts;

        }).catch(error => console.log(error)) 

        return result;
    }

    getPostsByUser(user) {
        const url = this.baseUrl + "/user/" + user + "/posts";
        
        return this.postApiGetHandler(url);
    }

    getPosts() {
        const url = this.baseUrl + "/posts";
        return this.postApiGetHandler(url);
    }


    createPost(post) {

    }

    deletePost(post) {

    }

}

export default PostService;