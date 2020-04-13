<template>
    <div>

      <div class="" v-for="datum in recieved" v-bind:key="datum.id">

        <span class="h3 bold" v-rainbow>{{datum[1].username}}</span> <a href="addnewpost" class='btn btn-primary btn-sm ml-2'>Add Post</a><hr />
<div class="mt-2 mb-3"><a href="editprofile">Edit Profile</a></div>
        <div class="">{{datum[0].abouuser}}</div>


        <span>{{datum[0].stagename}}</span>
        <br />
        <div><a href="link" class="mt-5">{{datum[0].profilelink}}</a></div>

        </div>



    </div>
</template>

<script>
    export default {
        props:['user'],
        data(){
            return{
                recieved:[],

            }
        },
        mounted() {
            var vue=this;
            axios.get('/selectotheruserdata/'+this.user).then(function(res){

                vue.recieved.push(res.data);



            }).catch(function(err){
                console.log(err)
            })

        }
    }
</script>
