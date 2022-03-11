<template>
    <div>
        <input type="text"
        v-model="message"
        >
        <button class="btn btn-success"
        @click="addMessage()"
        >
        Отправить
        </button>
    </div>
</template>

<script>
import {mapActions} from 'vuex'
export default{
    data: function(){
        return {
            message:'',
        }
    },
    methods:{
        ...mapActions(['newMessage']),
        addMessage(){
            this.newMessage({
                message: this.message
            });
            this.message = ''
        }
    }
}
</script>
<style scoped>
    input{
        border: 1px solid black;
    }
    
</style>