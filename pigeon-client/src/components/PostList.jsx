import React, { useState, useEffect } from 'react';
import PostService from '../services/PostService';
import '../App.css';

// A component to display the list of posts
function PostList(props) {

    const [posts, setPosts] = useState([]);

    useEffect(() => {

        let postService = new PostService();

        postService.getPosts().then(res => {
            setPosts(res);
        });

    }, []); // empty array runs this only once or if props.id changes
    
    return (    
    <div>
    { posts.map((post) => 
        <div className="card p-2 mt-2 mb-2">
            <div className="card-body">
                <h5 className="card-title">
                    { post.title }
                </h5>
                <h6 className="card-subtitle mb-3 text-muted">
                    By { post.author } 
                </h6>
                <p className="card-text">
                    { post.body }
                </p>
            </div>
        </div>
    )}
    </div>
    );
}

export default PostList;


