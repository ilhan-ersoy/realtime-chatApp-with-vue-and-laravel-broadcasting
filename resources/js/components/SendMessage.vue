<template>
    <div class="composer">
        <textarea v-model="message" @keydown.enter="send" placeholder="Mesajınız.."></textarea>
    </div>
</template>




<script>


export default {

    data(){
        return{
          message:''
        }
    },
    methods:{
        send(){
            if(this.message !== ''){
                this.$emit('sendMessage',this.message)
                this.message  = '';
            }
            else {
                return ;
            }
        }
    }


}

</script>


<style lang="scss" scoped>
    .composer textarea {
    width: 97%;
    margin: 10px;
    resize: none;
    border-radius: 18px;
    border: 1px solid #9b9696;
    padding: 8px;
    }
</style>
