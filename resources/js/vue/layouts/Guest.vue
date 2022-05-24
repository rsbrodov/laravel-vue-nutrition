<template>
    <div>
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <a class="navbar-brand" href="#">MENU MACKER</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarText">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item"><router-link class="nav-link"  :to="{name: 'login'}">Авторизация</router-link></li>
                </ul>
            </div>
        </nav>
    </div>
</template>

<script>
    export default {
        name: "Guest"
    }
</script>

<style scoped>

</style>
