

<template>
    <div class="col-lg-12">
    <div class="row">
<div id="generics">
        <div v-if="empty" class="text-align-center" id="nopost">
             No Posts Yet ..<a href='addnewpost'>Click to add post</a>
        </div>
        <p id="loader" v-rainbow >{{loader}}</p>
</div>

            <div class="col-lg-12 m-3" v-for="datum in data" v-bind:key="datum.id">
                {{datum.postname}}
                <span class="text-muted">{{datum.created_at}}</span>
                <div class="">
                    {{datum.postdescription}}

                </div>
                <div class="description">

                </div>
                <img v-bind:src="'storage/post_images/'+datum.postimage" class="rounded w-100">
                <span>3 likes</span>  <span class="ml-3" >3 Comments</span>
                <div class="form-group">
                    <input type="text" placeholder="comment" class="form-control">

                </div>





            </div>





    </div>
    </div>
</template>

<script>
    export default {
        props:['user'],
        data(){
            return{
                loader:'loading',
                empty:false,
                data:[]

            }
        },
        mounted() {
            var vue = this;
            console.log(this.user)
            axios.get('userposts/'+this.user).then(function(res){

             console.log(res.data);

             if(res.data.length == 0){
                vue.empty=true;
             }else{

                 res.data.data.forEach(datum => {
                     vue.data.push(datum)

                 });
                 console.log(vue.data)

             }

            }).catch(function(err){
                console.log(err)

            }).then(function(){
                vue.loader=''

            })
        }
    }
</script>


<style scoped>
#generics{
      position: relative;
      width:100%;


}
#loader{
    position: absolute;
    left:48%;
}
#nopost{
     position: absolute;
    left:40%;

}


</style>
