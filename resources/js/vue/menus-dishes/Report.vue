<template>
    <div style="width:80%; margin: 0 auto;">
        <h1 class="text-center">Отчет по меню</h1>
        <form @submit.prevent="getReport()">
            <div class="row">
                <div class="col-12">
                    <label for="menu_id"><b>Меню</b></label>
                    <select id="menu_id" class="form-control" v-model="form.menu_id">
                        <option v-for="(menu, index) in allMenus" :key="index" :value="menu.id">
                            {{menu.name}}
                        </option>
                    </select>
                </div>
            </div>
            <div style="width:50%; margin: 0 auto;">
                <button style="width:100%" class="btn btn-success mt-4">Посмотреть</button>
            </div>
        </form>

        <div class="container mt-4 mb-4" v-if="post">
            <div class="container">
                <table class="table table-bordered">
                    <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Название блюда</th>
                        <th scope="col" class="text-center">Масса блюда</th>
                    </tr>
                    </thead>
                    <tbody>
<!--                    <tr v-for="(mDish, index) in menusDishes" :key="index" >-->
<!--                        <td>{{mDish.id}}</td>-->
<!--                        <td>{{mDish.dishes.name}}</td>-->
<!--                        <td>{{mDish.yield}}</td>-->
<!--                    </tr>-->
                    </tbody>
                </table>
            </div>
        </div>
        {{post}}
    </div>
</template>

<script>
    import {mapGetters, mapActions} from 'vuex'

    export default{
        data:function(){
            return {
                post:null,
                form:{
                    menu_id: null,
                }
            }
        },
        computed: mapGetters(['allMenus']),
        methods:{
            ...mapActions(['getMenus']),
            getReport(){
                axios.post('api/menus-dishes/report', this.form)
                    .then(response => {
                        this.post = response.data;
                    })
                    .catch(error => {
                        console.log(error);
                    });
            },
        },

        async created(){
            this.getMenus();
        },
    }

</script>
