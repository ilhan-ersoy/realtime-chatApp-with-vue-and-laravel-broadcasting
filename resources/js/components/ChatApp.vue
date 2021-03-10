<template>
    <div class="chat-app">

    <Conversation :contact = "selectedContact" :messages="messages" @save="saveMessage"></Conversation>
    <ContactsList :contacts="contacts" @selected="startConversation"></ContactsList>

    </div>
</template>


<script>

    import Conversation from "./Conversation";

    import ContactsList from "./ContactsList";

    export default {
        props:{
            user :{
                type : Object,
                required:true
            }
        },
        data(){
            return{
                selectedContact : null,
                contacts : [],
                messages :[]
            }
        },
        mounted() {

            Echo.private(`messages.${this.user.id}`)
            .listen('NewMessage',(e)=>{
                this.handleIncoming(e.message);
            });


            axios.get('/contacts')
            .then((response)=>{
                 this.contacts = response.data;
            });

        },
        methods:{
            startConversation(contact){
                axios.get('/conversation/'+contact.id)
                    .then((response)=>{
                        this.messages = response.data;
                        this.selectedContact = contact;
                    });
            },
            saveMessage(resMessageObject){
                this.messages.push(resMessageObject);
            },
            handleIncoming(message) {
                    this.saveMessage(message);
            }
        },
        components : {Conversation,ContactsList}
    }

</script>


<style lang="scss" scoped>
.chat-app {
    display: flex;
}
</style>


