<template>
    <div>
        <div class="heading">
            <h1 class="text-center">Todo Add form</h1>
            <addItemForm
             v-on:reloadList="getList()"
            />
        </div>
        <div class="list-view">
            <list-view 
            :items="items"
            v-on:reloadList="getList()"
            />
        </div>
    </div>
</template>

<script>
import addItemForm from './addItemForm'
import listView from './listView'

export default{
    components:{addItemForm, listView},
    data:function(){
        return {
            items:[]//изначально массив моих новостей пуст
        }
    },
    methods:{
        getList(){
            axios.get('api/items')
            .then(response => {
                this.items = response.data// написали функцию и наполнили его
            })
            .catch(error => {
                console.log(error);
            })
        }
    },
    created(){//после того как страница загрузится сформируется этот список и передаем его наверх
        this.getList();
    }
    
}
</script>
