import AllBlogs from './components/AllBlog.vue';
import BlogDetails from './components/BlogDetails.vue';
  
export const routes = [
    {
        name: 'home',
        path: '/home',
        component: AllBlogs
    },
    {
        name: 'blog_details',
        path: '/api/details/:id',
        component: BlogDetails
    }
];