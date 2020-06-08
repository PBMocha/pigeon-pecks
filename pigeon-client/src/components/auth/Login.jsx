import React, { useState, useEffect } from 'react';
import { Redirect } from 'react-router-dom';
import ApiUrl from '../../config/ApiUrls';

function Login() {

    const [form, setForm] = useState({});

    useEffect(() => {

        const loginUrl = "/api/user/login";
        
    }, [form]);

    const handleSubmit = (event) => {

        const data = new FormData(event.target);

        setForm(data);
    }

    return (
        <div className="card">
            <div className="card-body">
                <h3 className="card-title">Login:</h3>
                    
                <form className="form" onSubmit={handleSubmit}>
                    <div className="form-group">
                        <label for="email">Email address</label>
                        <input id="email" className="form-control" type="email" />
                    </div>
                    <div className="form-group">
                        <label className="" for="password">Password</label>
                        <input id="password" className="form-control" type="password" />
                    </div>
                    <button className="btn btn-primary pr-3 pl-3" type="submit">Login</button>
                </form>
                    
            </div>
        </div>
    );
}

export default Login;