
require('dotenv').config();

function ApiUrls() {

    const baseUrl = process.env.API_BASE;

    return "http://127.0.0.1:8000";
}

export const API_BASE=ApiUrls();