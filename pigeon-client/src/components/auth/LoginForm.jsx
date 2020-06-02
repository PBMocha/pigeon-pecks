import React, { useState, useEffect, useContext } from 'react';
import { Redirect } from 'react-router-dom';

function LoginForm() {

    return (
        <form className="form">
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
    );
}

export default LoginForm;