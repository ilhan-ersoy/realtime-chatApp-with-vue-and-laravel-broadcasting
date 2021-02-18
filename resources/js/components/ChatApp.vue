<template>
    <div class="chat-app">
        <Conversation :contact="selectedContact" :messages="messages"/>
        <ContactsList :contacts="contacts" />
    </div>
</template>

<script>

    import Conversation from './Conversation';
    import ContactsList from './ContactsList';

    export default {
        props : {
          user : {
              type : Object,
              required :true
          }
        },
        data(){
            return {
                selectedContact : null,
                messages :[],
                contacts : []
            }
        },
        mounted() {
            console.log(this.user);
            axios.get('/contacts')
                .then((response)=>{
                    this.contacts = response.data;
                });
        },
        components : {Conversation,ContactsList}
    }
</script>
