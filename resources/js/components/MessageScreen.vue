<template>

    <div class="feed" ref="feed">
        <ul v-if="contact">
                <li v-for="message in messages" :class="`message${message.from !== contact.id ? ' received' : ' sent'}`" :key="message.id">
                    <div class="text">
                        {{message.text}}
                    </div>
                </li>
        </ul>
    </div>

</template>


<script>



export default {
    props:{
        messages:{
            type:Array,
            required:true
        },
        contact:{
            type:Object
        }
    },
    methods:{

        refreshChat(){
             setTimeout(()=>{
                 this.$refs.feed.scrollTop = this.$refs.feed.scrollHeight - this.$refs.feed.clientHeight;
             },50);

        }
    },
    watch:{
        contact(val){
            this.refreshChat();
        },
        messages(val){
            this.refreshChat();
        }
    }
}

</script>
<style lang="scss" scoped>
.feed {
        background: #d1dcdf;
        max-height: 410px;
        overflow: scroll;
        height: 100%;

    ul{
        list-style-type: none;
        padding: 5px;
            li {
                &.message {
                    margin: 5px 0;
                    width: 100%;

                    .text {
                        max-width: 200px;
                        font-size: 14px;
                        border-radius: 5px;
                        padding: 12px;
                        display: inline-block;
                    }

                    &.received {
                        text-align: right;

                        .text {
                            background: #b2b2b2;
                        }
                    }

                    &.sent {
                        text-align: left;

                        .text {
                            background: #a59edb;
                        }
                    }
                }
            }
    }



}
</style>


