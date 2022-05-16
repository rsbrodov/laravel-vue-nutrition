

## О проекте
Это небольшое web-приложение разработанное для расчета белков, жиров, углеводов, а также химического и витаминного состава меню
Пользователь формирует блюдо, либо использует уже созданное вносит его в своей ежедневный рацион, а после получает отчет о химическом и энергетическом составе.
<br>
Данный проект представляет из себя урезанную версию программы по расчету меню и других показателей, также разработанных мной.
<br>
Ниже представлены скриншоты.
## Скрины
![image](https://user-images.githubusercontent.com/55738777/168636398-e42abbd0-df8b-4c00-a887-9a8f455deb84.png)
<p align="center"><small>Скрин 1</small></p>
На первом скриншоте представлен раздел с перечнем продуктов. Продукт можно удалить, если он не используется в блюде.

![image](https://user-images.githubusercontent.com/55738777/168636735-a311771a-db7b-4f2d-88d0-7ab03e14ef5a.png)
<p class="text-center" style="margin: 0 auto;"><small>Скрин 2</small></p>
Форма создания с валидацией (vuelidate).

![image](https://user-images.githubusercontent.com/55738777/168645938-30ba07d8-cfde-4a64-b8a8-2220cb519dec.png)
<p class="text-center" style="margin: 0 auto;"><small>Скрин 3</small></p>
Раздел с перечнем блюд.

![image](https://user-images.githubusercontent.com/55738777/168645749-bf17b485-e0e7-4460-8511-8f9677a4c261.png)
<p class="text-center" style="margin: 0 auto;"><small>Скрин 4</small></p>
Добавления блюда.

![image](https://user-images.githubusercontent.com/55738777/168646113-d76b7d14-fcd8-4ea3-8a9b-9bbc9d394642.png)
<p class="text-center" style="margin: 0 auto;"><small>Скрин 5</small></p>
Список меню.

![image](https://user-images.githubusercontent.com/55738777/168646504-f3856a73-bebf-4021-828e-16a4cc77d6cd.png)
<p class="text-center" style="margin: 0 auto;"><small>Скрин 6</small></p>
Работа с меню.

![image](https://user-images.githubusercontent.com/55738777/168647363-dc8e988f-f1cb-4831-aa55-3784a79bc064.png)

<p class="text-center" style="margin: 0 auto;"><small>Скрин 7</small></p>
Отчет по меню. По введенным данным формируется отчет.

## Технологии и инструменты
### Backend

- Laravel.
- PHP 7.4.
- MySQL.
- REST API.

### Frontend

- VUE.
- Bootstrap 4.
- JavaScript(Jquery)
- Html/css.

## Для установки
- git clone https://github.com/rsbrodov/laravel-vue-nutrition.git
- composer update
- npm install
- .env файл поправить под себя
- Базу данных рекомендую брать из корня проекта, так как для работы проекта нужно большое количество данных о продуктах. Или можно выполнить php artisan migrate
- php artisan serve
- npm run watch
- Логин: adminlaravel@mail.ru, Пароль: ******
