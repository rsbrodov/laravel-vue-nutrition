<template>
    <div style="width:90%; margin: 0 auto;">
        <FlashMessage :position="'right top'"></FlashMessage>
        <h1 class="text-center">Разработка блюд</h1>
        <b-button v-b-modal.modal-1 class="main-button-green mb-4">Создать новое блюдо</b-button>
        <!--Modal window for create new Dish-->
        <b-modal id="modal-1" class="mb-4" size="lg" title="Добавление нового блюда" hide-footer="true">
            <addDish @close-modal="closeModal('dishCreate')"></addDish>
        </b-modal>
        <!--Modal window for adding products to dish-->
        <b-modal id="modal-2" size="lg" hide-footer="true" title="Добавление продуктов в блюдо">
            <AddProductToDish :dishes_id="id" />
        </b-modal>

        <div v-if="getLoading === true" class="text-center mt-5">
            <Loader />
        </div>
        <table v-else class="fl-table">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Название</th>
                    <th scope="col">Категория</th>
                    <th scope="col">Сборник</th>
                    <th scope="col">Выход</th>
                    <th scope="col">Номер техкарты</th>
                    <th scope="col" colspan="4">Управление</th>
                </tr>
            </thead>
            <tbody>
                <Dish v-for="(myDish, index) in myDishes" :key="index" :dish="myDish"
                    @addProductsDish="addProductsDish(myDish.id)" />
            </tbody>
        </table>

    </div>
</template>

<script>
import addDish from './AddDish'
import Dish from './Dish'
import Loader from "../helpers/Loader";
import { mapGetters, mapActions } from 'vuex'
import { VueSuggestion } from 'vue-suggestion'
import 'vue-suggestion/dist/vue-suggestion.css'
import AddProductToDish from "./AddProductToDish";

export default {
    components: { Loader, addDish, Dish, VueSuggestion, AddProductToDish },
    data: function () {
        return {
            id: null,
        }
    },
    computed: mapGetters(['myDishes', 'getLoading']),
    methods: {
        ...mapActions(['getMyDishes']),
        addProductsDish(e) {
            this.id = e;
            this.$bvModal.show('modal-2')
        },
        closeModal(id) {
            this.$bvModal.hide('modal-1')
        }

    },
    async created() {
        this.getMyDishes();
    },
}

</script>