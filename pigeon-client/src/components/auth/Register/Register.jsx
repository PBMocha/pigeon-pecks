import React, { useState, useEffect } from 'react';

const Register = () => {

    

    return (
        <form className="form">
             <div className="form-group">
                <label for="username">Username</label>
                <input id="username" className="form-control" type="text" />
            </div>
            <div className="form-group">
                <label for="email">Email address</label>
                <input id="email" className="form-control" type="email" />
            </div>
            <div className="form-group">
                <label className="" for="password">Password</label>
                <input id="password" className="form-control" type="password" />
            </div>
            <div className="form-group">
                <label for="email">Confirm Password</label>
                <input id="email" className="form-control" type="email" />
            </div>
            <button className="btn btn-primary pr-3 pl-3" type="submit">Register</button>
        </form>
    );
}

export default Register;