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

export default{
    data: function(){
        return {
            message:'',
        }
    },
    methods:{
        addMessage(){
            axios.post('api/chat/store', {
                message: this.message
            })
            .then(response => {
                if(response.status == 201){
                    this.message = '';
                    this.$emit('reloadlist');
                }
            })
            .catch(error => {
                console.log(error);
            })
        }
    }
}
</script>
<style scoped>
    input{
        border: 1px solid black;
    }
    
</style>