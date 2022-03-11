<template>
    <div>
        <h1 class="text-center">{{title}}</h1>
        <dropdownRooms
        :rooms="messages"
        v-on:changeroom="setRoom($event)"
        
        />
        <hr>
        <messageList
        :messages="messages"
        />
        <hr>
        <addMessage
        v-on:reloadlist="getList()"
        />
        
    </div>
</template>
<script>
import addMessage from './addMessage'
import messageList from './messageList'
import dropdownRooms from './dropdownRooms'

export default{
    components:{addMessage, messageList, dropdownRooms},
    data: function(){
        return {
            messages:[],
            title:'Чат'
        }
    },
    methods:{
        async getList(){
            //синхронный запрос 
            /*axios.get('api/chats')
            .then(response => {
                this.messages = response.data
            })
            .catch(error => {
                console.log(error);
            })*/
            //асинхронный async await
            const messages = await axios.get('api/chats');
            this.messages = messages.data;
        },
        setRoom(roomfromdropdown){
            this.title = 'Чат'+roomfromdropdown[0]
        }
    },
    created(){
        this.getList();
    }
    
}
</script>
