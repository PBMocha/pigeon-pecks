import React, { useState, useEffect } from 'react';
import { Redirect } from 'react-router-dom';
import ApiUrl from '../../config/ApiUrls';
import { UserService } from '../../services/UserService.jsx'; 
import axios from 'axios';

function Login({user}) {

    const [form, setForm] = useState({});

    useEffect(() => {
        
        async function handleLogin() {
            const loginUrl = "/api/user/login";

            const payload = {
                method: 'post',
                url: loginUrl,
                data: form,
                headers: { 'Content-Type': 'application/json'}
            };

            axios.post(payload).then((response) => {
                console.log(response);
                
            }, (error) => console.log(error));
        }

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