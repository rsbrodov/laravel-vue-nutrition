<template>
    <div>
        <div  v-for="(message, index) in messages" :key="index">
            <message-item
            :message="message"
            />
        </div>
    </div>
</template>

<script>
import messageItem from './messageItem'
export default{
    props: ['messages'],
    components:{messageItem},
    data:function(){
        return {
           
        }
    }
    
}
</script>
