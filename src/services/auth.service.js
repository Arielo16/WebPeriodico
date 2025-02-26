import api from './api';

export const authService = {
  async login(credentials) {
    const loginData = {
      email: credentials.email,
      password: credentials.password,
      remember: credentials.remember || false
    };

    const response = await api.post('/post/users/login', loginData);
    if (response.data.token) {
      localStorage.setItem('token', response.data.token);
      if (response.data.user) {
        localStorage.setItem('user', JSON.stringify(response.data.user));
      }
    }
    return response.data;
  },

  async logout() {
    localStorage.removeItem('token');
    localStorage.removeItem('user');
  },

  async register(userData) {
    const response = await api.post('/auth/register', userData);
    if (response.data.token) {
      localStorage.setItem('token', response.data.token);
    }
    return response.data;
  },

  getToken() {
    return localStorage.getItem('token');
  },

  isAuthenticated() {
    return !!this.getToken();
  }
}; 