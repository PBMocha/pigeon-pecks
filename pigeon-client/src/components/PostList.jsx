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
        postService.getPostsByUser(props.id).then(res => {
            console.log(res);

            setPosts(res);
        });

    }, [props.id]); // empty array runs this only once or if props.id changes
    
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


