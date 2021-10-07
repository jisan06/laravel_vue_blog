<template>
    <div>
        <h3 class="text-center">Blogs Details</h3><br/>

        <div class="row">
            <div class="col-md-10 m-auto">
               <img :src="'/storage/'+blog.image"  style="width: 100%">
               <strong class="d-block text-center text-primary">
                   {{blog.name}}
               </strong>
               <div v-html="blog.description"></div>
            </div>   
        </div>
    </div>
</template>
  
<script>
    export default {
        data() {
            return {
                blog: {}
            }
        },
        created() {
            this.axios
                .get(`/api/blog-details/${this.$route.params.id}`)
                .then((response) => {
                    this.blog = response.data;
                });
        }
    }
</script>