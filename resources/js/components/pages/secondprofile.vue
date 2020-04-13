

<template>
<div class="container" >


                  <form action="#" method="post">

                        <div class="form-group row">
                            <label for="profileimage" class="col-md-4 col-form-label text-md-right">About You</label>

                            <div class="col-md-6">

                                <textarea value="Lets Know about You..." style="width:100%" v-model="about"></textarea>


                            </div>
                        </div>


                        <div class="form-group row">
                            <label for="profileimage" class="col-md-4 col-form-label text-md-right"> Your Profile Image</label>

                            <div class="col-md-6">
                                <input id="file" ref="file" type="file" v-on:change="profileimage"  name="profileImage" class="form-control"  required>


                            </div>
                        </div>



                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary" v-on:click.prevent="submitForm">
                                    <span v-if="!creating">Create</span><span v-if="creating">Creating...</span>
                                </button>


                            </div>
                        </div>
                  </form>

                    <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">


                               <div class="text-align-center d-flex">
                                   <p>About U :)</p>
                                   <p class="ml-4">{{about}}</P>
                                   </div>



                            </div>
                        </div>

    </div>
</template>

<script>



    export default {


        mounted() {


        },
        data(){
           return {

           file:'',
           about:'',
           creating:false

           }

        },
        methods:{



            submitForm:function(){
                this.creating=true;
                 axios.post('saveprofileImage',{image:this.file,about:this.about}).then(function(res){
                     console.log(res.data)

                     if(res.data =='saved'){
                         window.location='/dashboard'
                     }

                 }).catch(function(err){
                     console.log(err)
                 })



            },
             profileimage:function (e){

                 if(e.target.files[0]){
                     var filereader= new FileReader();

                 filereader.readAsDataURL(e.target.files[0]);

                 filereader.onload =(e)=>{
                     this.file = e.target.result;
                 }
                 }else{
                     this.file='';
                 }






            },



        },
          directives:{
            title:{
                bind(el,binding,vnode,){
                    el.style.textTransform="uppercase"
                }

            },
            rainbow:{
                bind(el,binding,vnode,){
                    el.style.color="#"+Math.random().toString().slice(2,8);
                }

            }

        }

    }
</script>
