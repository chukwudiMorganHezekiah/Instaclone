<template>


            <div class="col-md-8">
                <div class="card card-default">


                    <div class="card-body">
        <div v-for="datum in data" v-bind:key="datum.id">

            <div v-for="datumnow in datum" v-bind:key="datumnow.id">
                <posts v-bind:user="datumnow.user_id"></posts>

                </div>

        </div>
    </div>

            </div>
            </div>

</template>

<script>

import posts from '../components/logedin/profilehead/profilecontents';
    export default {
        props:['user'],
        components:{
            'posts':posts

        },
        data(){
            return {
                data:[],

            }
        },
        mounted() {
            var vue=this;
            axios.post('selectusersfollowings/'+this.user).then(function(res){
                vue.data.push(res.data);
                console.log(vue.data)

            }).catch(function(err){

            })
        }
    }
</script>
