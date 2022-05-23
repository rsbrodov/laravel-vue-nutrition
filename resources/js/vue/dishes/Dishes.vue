<template>
    <div style="width:90%; margin: 0 auto;">
        <FlashMessage :position="'right top'"></FlashMessage>
        <h1 class="text-center">Разработка блюд</h1>
        <b-button v-b-modal.modal-1 variant="success" class="mb-4">Создать новое блюдо</b-button>
        <!--Modal window for create new Dish-->
        <b-modal id="modal-1" class="mb-4" size="lg" title="Добавление нового блюда">
            <addDish @close-modal="closeModal('dishCreate')"></addDish>
        </b-modal>
        <!--Modal window for adding products to dish-->
        <b-modal id="modal-2" size="lg" title="Добавление продуктов в блюдо">
            <AddProductToDish
                :dishes_id="id"
            />
        </b-modal>

        <div v-if="getLoading === true" class="text-center mt-5">
            <Loader/>
        </div>
        <table v-else class="table table-bordered">
            <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Название</th>
                <th scope="col" class="text-center">Категория</th>
                <th scope="col" class="text-center">Сборник</th>
                <th scope="col" class="text-center">Выход</th>
                <th scope="col" class="text-center">Номер техкарты</th>
                <th scope="col" colspan="4" class="text-center">Управление</th>
            </tr>
            </thead>
            <tbody>
            <Dish v-for="(myDish, index) in myDishes" :key="index"
                  :dish="myDish"
                  @addProductsDish="addProductsDish(myDish.id)"/>
            </tbody>
        </table>

    </div>
</template>

<script>
    import addDish from './AddDish'
    import Dish from './Dish'
    import Loader from "../helpers/Loader";
    import {mapGetters, mapActions} from 'vuex'
    import {VueSuggestion} from 'vue-suggestion'
    import 'vue-suggestion/dist/vue-suggestion.css'
    import AddProductToDish from "./AddProductToDish";

    export default {
        components: {Loader, addDish, Dish, VueSuggestion, AddProductToDish},
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
<style scope>
  .vue-suggestion .vs__list {
    width: 100%;
    text-align: left;
    border: none;
    border-top: none;
    max-height: 400px;
    overflow-y: auto;
    border-bottom: 1px solid #023d7b;
    position: relative;
  }
  .vue-suggestion .vs__list .vs__list-item {
    background-color: #fff;
    padding: 10px;
    border-left: 1px solid #023d7b;
    border-right: 1px solid #023d7b;
  }
  .vue-suggestion .vs__list .vs__list-item:last-child {
    border-bottom: none;
  }
  .vue-suggestion .vs__list .vs__list-item:hover {
    background-color: #eee !important;
  }
  .vue-suggestion .vs__list,
  .vue-suggestion .vs__loading {
    position: absolute;
  }
  .vue-suggestion .vs__list .vs__list-item {
    cursor: pointer;
  }
  .vue-suggestion .vs__list .vs__list-item.vs__item-active {
    background-color: #f3f6fa;
  }
</style>
