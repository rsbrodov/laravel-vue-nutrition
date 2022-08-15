<template>
    <header>
    <nav class="navbar navbar-expand-lg navbar-light navbar-float">
      <div class="container">
        <a href="index.html" class="navbar-brand">MENU<span class="text-primary">MACKER</span></a>
        <button class="navbar-toggler" data-toggle="collapse" data-target="#navbarContent" aria-controls="navbarContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="navbar-collapse collapse" id="navbarContent">
          <ul class="navbar-nav ml-lg-4 pt-3 pt-lg-0">
            <li class="nav-item"><router-link class="nav-link"  :to="{name: 'login'}">Авторизация</router-link></li>
            <li class="nav-item"><router-link class="nav-link"  :to="{name: 'register'}">Регистрация</router-link></li>
          </ul>
          <div class="ml-auto">
            <!-- <a href="#" class="btn btn-outline rounded-pill">Get a Quote</a> -->
          </div>
        </div>
      </div>
    </nav>
  </header>
</template>

<script>
    export default {
        name: "Guest"
    }
</script>

<style scoped>

</style>
