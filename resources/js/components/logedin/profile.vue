<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card card-default">


                    <div class="card-body">
                        

                   <p class="text-align-center" v-rainbow>{{loader}}</p>

                       <div class="row">

                           <!--profileimage-->

                           <div class="col-lg-6" v-if="ok">
                               <div class=""  v-for="datum in recieved" v-bind:key="datum.id">

                                   <img v-bind:src="'storage/profile_images/'+datum[0].profileimage" class="rounded-circle w-100">


                                   </div>

                            </div>

                            <!--ohers -->

                             <div class="col-lg-4" id="details">
                                 <profiledetails v-bind:user="this.user"></profiledetails>


                            </div>



                       </div>
                    </div><hr />




                  <profilecontent v-bind:user="this.user"></profilecontent>



                </div>
            </div>
        </div>
    </div>
</template>

<script>

import profiledetails from './profilehead/profiledetails.vue';
import profilecontent from './profilehead/profilecontents.vue'
    export default {
        props:['user'],
        components:{
            'profiledetails':profiledetails,
            'profilecontent':profilecontent,

        },
        data(){
            return {
                loader:'Loading..',
                ok:false,
                recieved:[],
            }

        },
        mounted() {
            console.log(this.user)
            var vue =this;
            axios.get('/selectuserdata/'+this.user).then(function(res){


                    vue.recieved.push(res.data)

                    vue.ok=true;


            }).catch(function(err){
                console.log(err)
            }).then(function(){
                vue.loader=""

            })


        },

    }
</script>


<style scoped>

div.col-lg-4#details{
    margin-top:30px;
}


</style>
