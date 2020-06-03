import React, { useState } from 'react';
import { Redirect } from 'react-router-dom';
import LoginForm from './LoginForm';

function Login() {

    return (
        <div className="card">
            <div className="card-body">
            <h3 className="card-title">Login:</h3>
                
                <LoginForm />
                
            </div>
        </div>
    );
}

export default Login;