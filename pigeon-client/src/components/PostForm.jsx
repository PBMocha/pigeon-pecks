import React, { useState, useEffect} from 'react';

function PostForm() {

    const [form, setForm] = useState({ name: "", });
    
    function handleNameChange(form) {
        
    }

    return (
    
        <form className="form">

            <div>
                <label></label>
                <input className="" onChange={handleNameChange}></input>
            </div>
            <button type="submit">Submit</button>
        </form>
        
    )
}