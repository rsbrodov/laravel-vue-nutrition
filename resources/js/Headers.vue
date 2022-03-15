<template>
<div>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="#">MENU MACKER</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarText">
    <ul class="navbar-nav mr-auto">
       <li class="nav-item" v-for="(link, index) in myHeader_links" :key="index">
            <router-link class="nav-link" :to="index">{{ link }}</router-link>
        </li>
    </ul>
    <!-- <span class="navbar-text">
      Navbar text with an inline element
    </span> -->
  </div>
</nav>

</div>
</template>

<script>
import {mapGetters, mapActions} from 'vuex'
    export default {
        data() {
            return {

            }
        },
        computed: mapGetters(['myHeader_links']),
        methods:{
        ...mapActions(['getMyHeaderLinks']),
        },
        async created(){
            this.getMyHeaderLinks()

        },
    }
</script>

<style scoped>
</style>
