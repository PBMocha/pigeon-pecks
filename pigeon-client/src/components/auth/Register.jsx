import React, { useState, useEffect, isValidElement } from 'react';
import axios from 'axios';
import { config } from '../../config/ApiUrls';


const Register = () => {

    const [data, setData] = useState(null); 
    const [IsValid, setIsValid] = useState(true);
    const [error, setError] = useState(false);

    //Send data when registration form is submitted
    useEffect(() => {
        
        //TODO: transfer post request to UserService class

        async function handleRegistration() {
            const postUrl = config.apiUrl + '/api/user/register';
            
            const payload = {
                method: 'post',
                url: postUrl,
                data: data,
                headers: { 'Content-Type': 'application/json'}
            };

            axios(payload).then((response) => {
                console.log(response.data.token);
                localStorage.setItem("Bearer", response.data.token);
            }, (error) => {
                console.log(error);
                //TODO: mutate valid state to output validation errors to DOM
                setError(true);
            });
        }

        if (data !== null) {
            handleRegistration();
        }

    }, [data]); 

    //Use this to toggle error messages

    function handleSubmit(event) {
        event.preventDefault();
        const formData = event.target;

        const data = new FormData(event.target);

        if (formData.password.value !== formData.c_password.value) {
            setIsValid(false);
            return;
        }

        setData(data);
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
                        { !IsValid && <div className="alert alert-danger mt-4">Passwords are not the same!</div> }
                    </div>
                    <button className="btn btn-primary pr-3 pl-3" type="submit">Register</button>
                </form>
            </div>
        </div>
    );
}

export default Register;