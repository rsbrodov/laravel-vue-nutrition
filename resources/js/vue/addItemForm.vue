<template>
    <div>
        <div class="text-center">
            <input type="text" v-model="item.name" 
            >
            <font-awesome-icon icon="plus-square"
            :class="(item.name) ? 'active':'inactive' "
            @click="addItem()"
            />
        </div>
        
    </div>
</template>

<style scoped>
    input{
        border: 1px solid black;
    }
    .active{
        color:green;
    }
    .inactive{
        color:red;
    }
</style>

<script>

export default {
    data() {
        return {
            item: {
                name:""
            }
        } 
    },
    methods:{
        addItem(){
            if(this.item.name == ''){
                return
            }
            axios.post('api/item/store',{
                item:this.item
            })
            .then(response =>{
                if(response.status == 201){//если удачное сохранение в базу данных, то
                    this.item.name = '';//удаляем значение переменной из инпута и сам у по себе
                    this.$emit('reloadList');
                }
                
            })
            .catch(error => {
                console.log(error);
            })
        }
    }
}
</script>
