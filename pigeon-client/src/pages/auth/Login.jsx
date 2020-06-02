import React, { useState } from 'react';
import { Redirect } from 'react-router-dom';
import LoginForm from '../../components/auth/LoginForm';

function Login() {

    return (
        <div className="card">
            <div className="card-body">
            <h3 className="card-title">Login:</h3>
                <div className="card-body">
                    <LoginForm />
                </div>
            </div>
        </div>
    );
}

export default LoginForm;