<template>
    <div class="list-item">
        <input type="checkbox"
        @change="updateCheck()"
        v-model ="item.completed">
       <span :class="(item.completed) ? 'completed' : 'itemText'">{{item.name}}</span> 
       <button class="trashcan"
       @click="removeItem()"
       >
       <font-awesome-icon icon="trash"/>
       </button>   
    </div>
</template>


<style scoped>
.completed{
    text-decoration:line-through;
    color:rgb(66, 65, 63)
}
.itemText{
    width:100%;
}
.item{
    display:flex;
    justify-content:center
}
.trashcan{
    color:red;
}
</style>

<script>

export default {
    props:['item'],
    data:function(){
        return {

        }
    },
    methods:{
        removeItem(){
            axios.delete('api/item/'+this.item.id, {
                item:this.item
            })
            .then(response =>{
                if(response.status == 200){
                   this.$emit('itemchanged');
                }
            })
            .catch(error => {
                console.log(error);
            })
        },
        updateCheck(){
            axios.put('api/item/' + this.item.id, {
                item:this.item
            })
            .then(response => {
                if(response.status == 200){
                    this.$emit('itemchanged');
                }
            })
            .catch(error => {
                console.log(error);
            })
        }
    }

    
}
</script>


