<template>
    <div >
        <button class="btn btn-primary" v-on:click="followtoggleclicked"><span v-if="followstatus">Follow</span><span v-if="!followstatus">Unfollow</span></button>

    </div>
</template>

<script>
    export default {
        props:['postid'],
        mounted() {

        },
        data(){
            return{
                followstatus:true

            }
        },
        methods:{
            followtoggleclicked:function(){
                var vue=this;
                axios.post('/follow/'+this.postid).then(function(res){
                    if(res.data =='followed'){
                        vue.followstatus=true;

                    }else{
                        vue.followstatus=false;

                    }

                }).catch(function(err){
                    console.log(err)
                })
            }
        }
    }
</script>
