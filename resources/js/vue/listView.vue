<template>
    <div>
        <div v-for="(item, index) in items" :key="index">
            <listItem
            :item="item"
            v-on:itemchanged= "$emit('reloadList')"
            />
        </div>
        
    </div>
</template>

<script>
import listItem from './listItem.vue'
export default {
    props: ['items'],
    components:{ listItem }
}
</script>
