import React, { useState, useEffect, isValidElement } from 'react';
import axios from 'axios';
import { API_BASE } from '../../../config/ApiUrls';


const Register = () => {

    const [data, setData] = useState({}); 
    const [pwdValid, setPwdValid] = useState(true);
    const [IsValid, setIsValid] = useState(true);

    //Send data when registration form is submitted
    useEffect(() => {
        
        const postUrl = API_BASE + '/api/user/register';

        console.log(data);
    }, [data]); 

    //Use this to toggle error messages
    useEffect(() => {

    }, [IsValid]);

    const handleSubmit = (event) => {
        event.preventDefault();
        const formData = event.target;

        const testForm = new FormData(event.target);

        console.log(testForm);

        if (formData.password.value !== formData.c_password.value) {

            setIsValid(false);

            return;
        }

        const data = {
            name: formData.name.value,
            email: formData.email.value,
            password: formData.password.value,
            c_password: formData.c_password.value
        };

    
        console.log(data);

        setData(formData);
    }

    return (
    
        <div className="card">
            <div className="card-body">
                <h4 className="card-title">Register: </h4>
                <form className="form" onSubmit={handleSubmit}>
                    <div className="form-group">
                        <label htmlFor="name">Username</label>
                        <input id="name" className="form-control" type="text" name="name" required />
                    </div>
                    <div className="form-group">
                        <label htmlFor="email">Email address</label>
                        <input id="email" className="form-control" type="email" name="email" required />
                    </div>
                    <div className="form-group">
                        <label htmlFor="password">Password</label>
                        <input id="password" className="form-control" type="password" name="password" required />
                    </div>
                    <div className="form-group">
                        <label htmlFor="c-password">Confirm Password</label>
                        <input id="c-password" className="form-control" type="password" name="c_password"required />
                    </div>
                    <button className="btn btn-primary pr-3 pl-3" type="submit">Register</button>
                </form>
            </div>
        </div>
    );
}

export default Register;