
//require('dotenv').config();

function ApiUrls() {

    let baseUrl = process.env.REACT_APP_API_BASE;

    return baseUrl;
}

export const API_BASE=ApiUrls();