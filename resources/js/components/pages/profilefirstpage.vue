

<template>
<div class="container card p-3" id="profilepage" >
        <div class="row justify-content-center">
            <div class="col-md-8">

            <div class="card">
                <div class="card-header"><div class="text-center" v-title v-rainbow>Profile</div></div>

                <div class="card-body">


              <component v-bind:is="component" v-on:filesaved="changecomponent($event)"></component>

<div class="d-flex justify-content-center text-align-center">
    <span v-on:click="changetofirst" style="text-decoration:underline;color:blue;cursor:pointer">1</span> <span v-on:click="changetosecond"  style="text-decoration:underline;cursor:pointer;color:blue" class="ml-2">2</span>

    </div>
                </div>
            </div>


            </div>
        </div>
    </div>
</template>

<script>
 //import    { bus } from '../../app';

import first from './firstprofile';
import second from './secondprofile';
    export default {
        props:['user'],
        components:{
            'first':first,
            'second':second

        },
        created() {

            alert("Your account created,welcome!");

        },
        data(){
           return {
                link:'',
            stagename: "",
            component:first
           }

        },
        methods:{
            changecomponent:function(update){
                this.component=second
            },
            changetosecond(){
                this.component=second

            },
            changetofirst(){
                this.component=first

            }


        },

    }
</script>
