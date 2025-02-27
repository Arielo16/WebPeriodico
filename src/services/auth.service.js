import api from './api';

export const authService = {
  async login(credentials) {
    const loginData = {
      email: credentials.email,
      password: credentials.password,
      remember: credentials.remember || false
    };

    const response = await api.post('/users/login', loginData);
    if (response.data.user) {
      localStorage.setItem('user', JSON.stringify(response.data.user));
    }
    return response.data;
  },

  async logout() {
    localStorage.removeItem('user');
  },

  async register(userData) {
    const response = await api.post('/users/register', userData);
    return response.data;
  },

  isAuthenticated() {
    return !!localStorage.getItem('user');
  }
};