import React, { Fragment } from 'react';
import { Link, BrowserRouter as Router, Route, Switch } from 'react-router-dom';

import './App.css';
import PostList from './components/PostList';
import LoginForm from './pages/auth/Login';

function App() {
  return (
    <Router>
    <div className="container">
      <nav className="navbar navbar-expand-lg d-flex justify-content-end navbar-dark bg-dark p-2">
        <div className="navbar-nav">

          <a className="nav-item nav-link" href="/">Home</a>
          <a className="nav-item nav-link" href="/login">Login</a>
          <a className="nav-item nav-link" href="/register">Register</a>
        </div>
      </nav>
      <div className="row justify-content-center mb-4 p-4">
        <header>
          <h1>Welcome to pigeons</h1>
        </header>
      </div>

      <div className="row justify-content-center mt-4">
        <div className="col">
          This is your posts
        </div>
        { /* Content placeholder */ }
        <div className="col">
        <Switch>

          <Route exact path="/"><PostList id={1} /></Route>
          <Route path="/login"><LoginForm /></Route>

        </Switch>
        </div>
      </div>
    </div>
    </Router>
  );
}

export default App;
