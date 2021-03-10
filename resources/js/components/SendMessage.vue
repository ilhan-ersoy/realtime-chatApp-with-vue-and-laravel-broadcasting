<template>

    <div class="sendArea">
        <textarea placeholder="Mesajınız.." @keydown.enter="send" v-model="message" class="textarea"></textarea>
    </div>

</template>


<script>



export default {

    data(){
        return{
            message : ''
        }
    },
    methods:{
        send(e){
            e.preventDefault();

            if(this.message !== ''){
                this.$emit('send',this.message);
                this.message = '';
            }
            else {
                return ;
            }

        }
    }
}

</script>

<style lang="scss" scoped>


       .sendArea{
           textarea{

                   width: 97%;
                   margin: 15px;
                   resize: none;
                   border-radius: 26px;
                   border: 2px solid #686666;
                   padding: 8px;

           }
       }

</style>

