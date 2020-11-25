import Vue from 'vue'
import VueRouter from 'vue-router'
import ApolloClient from 'apollo-boost'
import VueApollo from 'vue-apollo'

import './bootstrap'

import PostList from './components/PostList.vue'
import Post from './components/Post'

window.vue = Vue

Vue.use(VueApollo)

const apolloClient = new ApolloClient({
    uri: 'http://localhost:8000/graphql'
})

const apolloProvider = new VueApollo({
    defaultClient: apolloClient,
})

const routes = [
    {
        path: '/',
        name: 'index',
        component: PostList
    },
    {
        path: '/post/:id',
        name: 'post',
        component: Post
    }
]

const router = new VueRouter({
    mode: 'history',
    routes
})

Vue.use(VueRouter)


const app = new Vue({
    el: "#app",
    apolloProvider,
    router
})
