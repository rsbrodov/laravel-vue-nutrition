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

        <div class="container mt-4 mb-4" v-if="post && getLoading === false">
            <div class="container days" v-for="(day, index) in post" :key="index">
                <p><b>{{day.day_name}}</b></p>
                <div class="nutritions" v-for="(nutrition, index) in day.nutrition" :key="index">
                    <p><b>{{nutrition.nutrition_name}}</b></p>
                    <table class="table table-bordered">
                        <thead>
                        <tr>
                            <th scope="col" rowspan="2">№ рецептуры</th>
                            <th scope="col" rowspan="2">Название блюда</th>
                            <th scope="col" rowspan="2">Выход</th>
                            <th scope="col" rowspan="2">Белки</th>
                            <th scope="col" rowspan="2">Жиры</th>
                            <th scope="col" rowspan="2">Углеводы</th>
                            <th scope="col" rowspan="2">Эн. ценность</th>
                            <th scope="col" colspan="5">Витамины</th>
                            <th scope="col" colspan="6">Минеральные вещества</th>
                        </tr>
                        <tr>
                            <th scope="col">B1, мг</th>
                            <th scope="col">B2, мг</th>
                            <th scope="col">A, мг</th>
                            <th scope="col">D, мг</th>
                            <th scope="col">C, мг</th>
                            <th scope="col">Na, мг</th>
                            <th scope="col">K, мг</th>
                            <th scope="col">Mg, мг</th>
                            <th scope="col">P, мг</th>
                            <th scope="col">I, мг</th>
                            <th scope="col">Se, мг</th>
                        </tr>
                        </thead>
                        <tbody>
                            <tr v-for="(dish, index) in nutrition.dish" :key="index">
                                <td>{{dish.techmap_number}}</td>
                                <td>{{dish.name}}</td>
                                <td>{{dish.yield}}</td>
                                <td>{{dish.protein}}</td>
                                <td>{{dish.fat}}</td>
                                <td>{{dish.carbohydrates_total}}</td>
                                <td>{{dish.kkal}}</td>
                                <td>{{dish.vitamin_b1}}</td>
                                <td>{{dish.vitamin_b2}}</td>
                                <td>{{dish.vitamin_a}}</td>
                                <td>{{dish.vitamin_d}}</td>
                                <td>{{dish.vitamin_c}}</td>
                                <td>{{dish.na}}</td>
                                <td>{{dish.k}}</td>
                                <td>{{dish.mg}}</td>
                                <td>{{dish.p}}</td>
                                <td>{{dish.i}}</td>
                                <td>{{dish.se}}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div v-else-if="getLoading === true" class="text-center mt-5">
            <Loader/>
        </div>
    </div>
</template>

<script>
    import {mapGetters, mapActions} from 'vuex'
    import Loader from "../helpers/Loader";
    export default {
        components:{Loader},
        data: function () {
            return {
                post: null,
                form: {
                    menu_id: null,
                },
                getLoading: false,
            }
        },
        computed: mapGetters(['allMenus']),
        methods: {
            ...mapActions(['getMenus']),
            getReport() {
                console.log(123);
                this.getLoading = true;
                axios.post('api/menus-dishes/report', this.form)
                    .then(response => {
                        this.post = response.data;
                    })
                    .catch(error => {
                        console.log(error);
                    })
                    .finally(() => {
                        this.getLoading = false;
                });
            },
        },

        async created() {
            this.getMenus();
        },
    }

</script>
