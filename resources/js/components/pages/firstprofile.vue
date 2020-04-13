

<template>
<div class="container "  >

                    <form method="POST" action="">


                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">Profile Link</label>

                            <div class="col-md-6">
                                <input id="email" v-model="link" class="form-control"   required autofocus>

                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right"> Your Stage Name</label>

                            <div class="col-md-6">
                                <input id="password" type="text" class="form-control" v-model="stagename" required>


                            </div>
                        </div>



                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary" v-on:click.prevent="save">
                                    Create
                                </button>


                            </div>
                        </div>
                    </form>

    </div>
</template>

<script>

 //import  { bus } from '../../app';

    export default {
        props:['user'],

        mounted() {


        },
        data(){
           return {
                link:'',
            stagename: ""
           }

        },
        methods:{
            save:function(){
                var data=[];
               if(this.link != ''){
                   data['link']=this.link;

               }
               if(this.stagename !=''){
                   data['stagename']=this.stagename;
               }
               var vue=this;


             axios.post('firstprofilesaver',{stagename:this.stagename,link:this.link}).then(function(res){
                 console.log(res.data)
                 if(res.data == 'data saved'){
                     alert('saved')
                     vue.$emit('filesaved');


                 }

             }).catch(function(err){
                 console.log(err)
             })

            }

        },

    }
</script>
