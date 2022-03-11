import Vue from 'vue';
import Vuex from 'vuex';
//import post from './modules/post';
import dish from './modules/dish';
import user from './modules/user';
import products from './modules/products';

Vue.use(Vuex);
//export const store = new Vuex.Store({ - ,было так и была длительная ошибка так как const store это по сути объект объявленный в апи.пхп и если бы не экспортировали а напрямую там писали, то писали бы этот вариант
export default new Vuex.Store({
    //Вообще часто по логики эти методы оставляют тут но мы вынесем их в модуль, чтоб нам было проще, тк как функций может быть сотни
  /*state: {},getters: {}, mutations: {}, actions: {},*/

  modules:{dish, user, products}
});
