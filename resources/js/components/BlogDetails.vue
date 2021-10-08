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
                <hr>
                <form @submit.prevent="addComment()">
                    <div class="row">
                       <div class="col-md-10 my-3">
                           <input type="text" v-model="blog_comment.comment" class="form-control" placeholder="write your comment here" required="1">
                       </div>
                       <div class="col-md-2 my-3">
                           <button class="btn btn-primary">Comment</button>
                       </div>
                   </div>
                </form>

                <hr>

                <div class="row">
                   <div class="border col-md-12 my-3 p-3" v-for="(blogComment, index) in blog.comments">
                    <h5 class="border-bottom border-secondary d-inline">Demo User</h5> <br>
                       <span>{{blogComment.comment}}</span> <br>
                        <div  class="mx-4">
                            <a href="javascript:">Reply</a> <br>

                            <form @submit.prevent="addReply(blogComment.id, index)">
                                <div class="row">
                                    <div class="col-md-10 my-3">
                                        <input class="form-control" type="text" :id="'reply_'+blogComment.id" placeholder="reply this comment">
                                    </div>
                                    <div class="col-md-2 my-3">
                                       <button class="btn btn-primary">Reply</button>
                                    </div>
                                </div>
                            </form>

                            <hr class="m-1">
                            <div class="row">
                               <div class="col-md-10 my-1" v-for="(commentReply, index) in blogComment.replys">
                                   <span>{{commentReply.comment}}</span> <br>
                               </div>
                            </div>
                        </div>
                   </div>
               </div>
               
            </div>   
        </div>
    </div>
</template>
  
<script>
    export default {
        data() {
            return {
                blog: {},
                blog_comment: {},
                reply:{},
            }
        },
        created() {
            this.axios
                .get(`/api/blog-details/${this.$route.params.id}`)
                .then((response) => {
                    this.blog = response.data;
                console.log(this.blog)
                });

                this.blog_comment.blog_id = this.$route.params.id
        },
        methods:{
            addComment(){
                this.axios
                    .post(`/api/comment`, this.blog_comment)
                    .then((response) => {
                        this.blog_comment.comment = null
                        this.blog.comments.push(response.data)
                    })
                     .catch(err => {});
            },

            addReply(comment_id,index){
               let reply_input = $('#reply_'+comment_id)
                this.reply.blog_id = this.$route.params.id
                this.reply.parent_id = comment_id
                this.reply.comment = reply_input.val()

                this.axios
                    .post(`/api/comment/reply`, this.reply)
                    .then((response) => {
                        reply_input.val('')
                    })
                     .catch(err => {});
            }
        }
    }
</script>