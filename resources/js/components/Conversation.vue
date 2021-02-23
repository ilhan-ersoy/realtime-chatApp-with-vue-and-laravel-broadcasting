<template>
    <div class="conversation">
        <h1>{{contact ? contact.name : 'Sohbet Seçiniz.'}}</h1>
        <MessageScreen :contact="contact" :messages="messages"></MessageScreen>
        <SendMessage @send="sendMessage"></SendMessage>

    </div>
</template>




<script>

    import SendMessage from './SendMessage'
    import MessageScreen from './MessageScreen'

export default {

    props:{
        contact:{
            type:Object,
            default:null
        },
        messages:{
            type:Array,
            default: []
        }
    },
    methods:{
        sendMessage(text){
            alert(text);
        }
    },
    components:{MessageScreen,SendMessage}

}

</script>


<style lang="scss" scoped>

.conversation{
    flex: 7;
    display: flex;
    flex-direction: column;
    justify-content: space-between;

    h1 {
        padding: 12px;
        border-bottom: dashed 1px #5a8c85;
        margin: 0;
        font-size: 30px;
    }
}



</style>
