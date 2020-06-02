import React, { useState, useEffect} from 'react';

function PostForm() {

    const [form, setForm] = useState({ name: "", });
    
    function handleNameChange(form) {
        
    }

    return (
    
        <form className="form">

            <input className="" onChange={handleNameChange}></input>
            <button type="submit">Submit</button>
        </form>
        
    )
}