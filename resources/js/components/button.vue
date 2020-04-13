

<template>
    <div class="container">
       <button class="button" v-on:click="clicked" v-text="text">Button</button>
    </div>
</template>

<script>
    export default {
        mounted() {
            console.log('Component mounted.')
        },
         data(){
            return {
               text:null

            }
        },
        methods:{
            clicked:function (){
                var vue=this;
                axios.post('/api/button',{}).then(function(res){
                    console.log(res.lenght)
                    vue.text=res.data.name

                })

            }
        }
    }
</script>

<style lang="scss" scoped>
button{
    padding:10px 30px;
    background:#333;
    color:#fff;
    font-weight: bold;
}
</style>
