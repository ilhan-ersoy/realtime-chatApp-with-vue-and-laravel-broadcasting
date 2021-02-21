<template>
    <div class="chat-app">
        <Conversation :contact="selectedContact" :messages="messages" ></Conversation>
        <ContactsList :contacts="contacts" @selected="setConversation"></ContactsList>
    </div>
</template>


<script>

    import Conversation from "./Conversation";
    import ContactsList from "./ContactsList";

    export default {
        props :{
          user : {
              type:Object,
              required:true
          }
        },
        data(){
            return{
                selectedContact:null,
                messages:[],
                contacts :[]
            }
        },
        mounted(){
            axios.get('/contacts')
            .then((response)=>{
                this.contacts = response.data;
            })
        },
        components : {Conversation, ContactsList},
        methods :{
            setConversation(contact){
                axios.get('conversation/'+contact.id)
                .then((response)=>{
                    this.messages = response.data;
                    this.selectedContact = contact;
                })
            }
        }
    }

</script>

<style lang="scss" scoped>
.chat-app {
    display: flex;
}
</style>
