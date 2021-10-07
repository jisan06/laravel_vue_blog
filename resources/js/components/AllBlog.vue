<template>
    <div>
        <h3 class="text-center">All Blogs</h3><br/>

        <div class="row">
            <div class="col-md-4" v-for="(blog, index) in blogs">
               <img :src="'storage/'+blog.image" height="200" style="width: 100%">
               <router-link :to="{ name: 'blog_details', params: { id: blog.id } }" class="nav-item nav-link">
                   {{blog.name}}
               </router-link>
               <div v-html="blog.description"></div>
               <router-link :to="{ name: 'blog_details', params: { id: blog.id } }" class="btn btn-primary">
                   Details
               </router-link>
            </div>   
        </div>
    </div>
</template>
  
<script>
    export default {
        data() {
            return {
                blogs: []
            }
        },
        created() {
            this.axios
                .get('api/all-blogs') 
                .then(response => {
                    this.blogs = response.data;
                });
        },
    }
</script>