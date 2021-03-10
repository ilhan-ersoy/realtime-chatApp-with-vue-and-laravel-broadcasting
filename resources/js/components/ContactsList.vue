<template>

    <div class="contact-list">
        <ul>

            <li v-for="(contact,index) in contacts" :key="contact.id" @click="send(contact,index)" :class="{'selected' : index === selected}">

                <div class="avatar">
                    <img :src="`https://i.pravatar.cc/100?u=`+contact.id" alt="">
                </div>
                <div class="contact">
                    <p class="name">{{contact.name}}</p>
                    <p class="email">{{contact.email}}</p>
                </div>

            </li>
        </ul>
    </div>
</template>


<script>



export default {

    props:{
        contacts:{
            type:Array
        }

    },
    data(){
        return {
            selected :0
        }
    },
    methods:{
        send(contact,index){
            this.$emit('selected',contact);
            this.selected = index;
        },

    }



}

</script>


<style lang="scss" scoped>
.contact-list {
    flex:2;
    max-height: 600px;
    overflow: scroll;
    border-left: solid 2px #c8c8c8;
    ul {
        list-style-type: none;
        padding-left: 0;

        li{

            display: flex;
            padding: 5px;
            border-bottom: solid 2px #9ba6aa;
            height: 80px;
            position: relative;
            cursor: pointer;


            &.selected{
                background: #b5b4b4;
            }

            img{
                width: 70px;
                border-radius: 50%;
                margin: 0 auto;
            }
        }
    }

    .avatar {
        display: flex;
        flex: 1;
        align-items: center;

    }


    .contact {
        flex: 3;
        font-size: 14px;
        overflow: hidden;
        display: flex;
        flex-direction: column;
        justify-content: center;
        margin:15px;

        p{
            margin:0;

            &.name{
                font-weight: bold;
            }
        }
    }

}

</style>


