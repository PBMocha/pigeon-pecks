import React from 'react';
import logo from './logo.svg';
import './App.css';
import PostList from './components/PostList';

function App() {
  return (
    <div className="container">
    <div className="row justify-content-center mb-4 p-4">
      <header>
        <h1>Welcome to pigeons</h1>
      </header>
    </div>

    <div className="row justify-content-center mt-4">
      <div className="col">
        This is your posts
      </div>
      <div className="col">
        <PostList id={1} />
      </div>
    </div>
    </div>
  );
}

export default App;
