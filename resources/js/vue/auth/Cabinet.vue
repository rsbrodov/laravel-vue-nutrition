<template>
    <div>
       <p>My name: {{user.data.name}}</p>
        <p>My name: {{user.data.email}}</p>
        <p v-for="(role, index) in myRoles" :key="index">{{index}}</p>
        {{myRoles}}
        <button @click.prevent="logout()">Logout</button>
    </div>
</template>

<script>
import {mapGetters, mapActions} from 'vuex'
export default {
    data:function(){
        return{
            user:null,
            roles:null,
        }
    },
    computed: mapGetters(['myRoles', 'myHeader_links']),
    methods:{
        ...mapActions(['getMyRoles', 'getMyHeaderLinks']),
        logout(){
            axios.post('api/logout')
            .then(() => {
                this.getMyHeaderLinks()
                this.$router.push('/login')
            })
            .catch(error =>{
                console.log(error);
            })
        },
    },
    async mounted(){
        axios.get('api/user')
        .then(response =>{
            this.user = response
        })
        .catch(error => {
            this.$router.push({ name: 'login' })
        });
        this.getMyRoles()
    }
}
</script>
<style scoped>
.has-error{
    border-color: red;
    
}
</style>
