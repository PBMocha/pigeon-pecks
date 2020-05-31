import React, { useState, useEffect } from 'react';
import PostService from '../services/PostService';
import '../App.css';

// A component to display the list of posts
function PostList(props) {
    
    const [posts, setPosts] = useState([{
        title: "A title",
        body: "another body"
    },
    {
        title: "Testing agin",
        body: "asdaild adjsas d asdj as"
    },
    {
        title: " asjd aodasd a",
        body: " aiosdj aodsas d"
    },]);

    useEffect(() => {

        let postService = new PostService();
        let posts = postService.getPostByUser(props.user.id);
        

    });
    

    return (    
    <div>
    {posts.map((post) => 
        <div className="card p-2 mt-2 mb-2">
            <div className="card-body">
                <div className="card-title">
                    { post.title }
                </div>
                <div className="card-title">
                    { post.body }
                </div>
            </div>
        </div>
    )}
    </div>
    );
}

export default PostList;


