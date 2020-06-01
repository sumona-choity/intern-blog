import Vue from 'vue'
import Router from 'vue-router'

Vue.use(Router)


import home from '../pages/home.vue'
import users from '../pages/users.vue'
import phones from '../pages/phones.vue'
import product from '../pages/product.vue'
import add_product from '../pages/add_product.vue'
import edit_product from '../pages/edit_product.vue'
import category from '../pages/category.vue'
import tags from '../pages/tags.vue'
import login from '../pages/login.vue'
import registration from '../pages/registration.vue'

let Admin = ['Admin'];


export default new Router({
  mode: 'history',
  routes: [
    {
      path: '/',
      name: 'home',
      component: home,
      meta: {
         // guest: true,
         // allowedUserType: ['All'],
          title: 'Home',
      }

    },
    {
      path: '/add_product',
      name: 'add_product',
      component: add_product,
      meta: {
         // guest: true,
         // allowedUserType: ['All'],
          title: 'add_product',
      }

    },
    {
      path: '/login',
      name: 'login',
      component: login,
      meta: {
         // guest: true,
         // allowedUserType: ['All'],
          title: 'login',
      }

    },
    {
      path: '/tags',
      name: 'tags',
      component: tags,
      meta: {
         // guest: true,
         // allowedUserType: ['All'],
          title: 'tags',
      }

    },
    {
      path: '/registration',
      name: 'registration',
      component: registration,
      meta: {
         // guest: true,
         // allowedUserType: ['All'],
          title: 'registration',
      }

    },
    {
      path: '/category',
      name: 'category',
      component: category,
      meta: {
         // guest: true,
         // allowedUserType: ['All'],
          title: 'category',
      }

    },
    {
      path: '/product/:id',
      name: 'product',
      component: product,
      meta: {
         // guest: true,
         // allowedUserType: ['All'],
          title: 'product',
      }

    },
    {
      path: '/edit_product/:id',
      name: 'edit_product',
      component: edit_product,
      meta: {
         // guest: true,
         // allowedUserType: ['All'],
          title: 'edit_product',
      }

    },
    {
      path: '/users',
      name: 'users',
      component: users,
      meta: {
         // guest: true,
         // allowedUserType: ['All'],
          title: 'Users',
      }

    },
    {
      path: '/phones',
      name: 'phones',
      component: phones,
      meta: {
         // guest: true,
         // allowedUserType: ['All'],
          title: 'phones',
      }

    },
  ],

});
