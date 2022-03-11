<template>
    <div>
        <select  v-model="selected" @change="$emit('changeroom', [selected, rrr])">
            <option v-for="(room, index) in rooms" 
            :key="index" 
            :value="room.id"
           >
                {{room.message}}
            </option>
        </select>
    </div>
</template>

<script>


export default {
    props:['rooms'],
    data:function(){
        return {
            selected:'', 
            rrr:123
        }
    },
    
}
</script>
