<template>
    <div class="contact-list">
        <ul>
            <li v-for="(contact,index) in contacts" :key="contact.id" @click="selectContact(contact)" :class="{'selected': index === selected}">
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
            return{
                selected : 0
            }
        },
        methods:{
            selectContact(contact){
                this.$emit('selected',contact);
            }
        }
    }

</script>

<style lang="scss" scoped>
.contact-list {
    flex: 2;
    ul{
        list-style: none;
        max-height: 600px;
        overflow: auto;
        border-left:solid;
        border-left-color: #27aea1;
        padding-left: 10px;

    }
    li{
        display: flex;
        border-bottom: solid #b7f79a;
        padding: 5px;
        cursor:pointer;
        .avatar {
            display: flex;
            align-items: center;
            img{
                width: 103px;
                border-radius: 39%;
            }
        }
        .contact {
            flex: 3;
            font-size: 15px;
            overflow: hidden;
            flex-direction: column;
            display: flex;
            justify-content: center;

            p{
                &.name{
                    font-weight: bold;
                }
            }
        }


    }

}


.contact{
    margin: 10px;
    text-align: center;
    margin-right: 15px;
    p{
        font-family: -apple-system;
    }
}
</style>
