<template>

 <div class="conversation">
     <h1>{{contact ? contact.name : 'Kişi Seçiniz  💬'}}</h1>

     <MessageScreen :messages="messages" :contact = "contact"></MessageScreen>

     <SendMessage @send="sendMessage"></SendMessage>
 </div>

</template>


<script>


    import MessageScreen from "./MessageScreen";
    import SendMessage from "./SendMessage";

export default {
    props :{
        messages:{
            type:Array,
            default : null
        },
        contact:{
            type:Object
        }
    },
    methods:{
        sendMessage(text){
            axios.post('/conversation/send', {
                contact_id: this.contact.id,
                message: text
            }).then((response)=>{
                this.$emit('save',response.data);
            });
        }
    },
    components:{MessageScreen,SendMessage}
}

</script>

<style lang="scss" scoped>
.conversation {

    h1 {
        font-size: 40px;
        padding: 10px;
        margin: 0;
        border-bottom: 1px dashed #686666;
    }

    flex:5;
    display: flex;
    flex-direction: column;
    justify-content: space-between;
}
</style>


