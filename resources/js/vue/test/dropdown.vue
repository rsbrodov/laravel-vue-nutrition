<!-- Some component.vue -->
<template>
<div>
  <vue-simple-suggest
    v-model="chosen"
    display-attribute="name"
    value-attribute="id"
    :list="getSuggestionList"
  ></vue-simple-suggest>

  <br>

  <button @click="permissionRoles">Выполнитьs</button>
  {{products}}
  </div>
</template>

<script>
  import VueSimpleSuggest from 'vue-simple-suggest'
  import 'vue-simple-suggest/dist/styles.css' // Optional CSS

  export default {
    components: {
      VueSimpleSuggest
    },
    data() {
      return {
        chosen: '',
        products:''
      }
    },
     methods: {
    // returns a promise as a factory for suggestion lists.
    async permissionRoles() {
      this.products = await axios.get('api/products/roles')
    },
  },
  
}
</script>