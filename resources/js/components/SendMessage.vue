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
