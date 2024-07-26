import axios from 'axios'

//axios.defaults.headers.common['X-CSRF-TOKEN'] = 'CSRF_TOKEN_AQUI';

const api = axios.create({
  baseURL: "http://127.0.0.1:8000"
})

export default api;