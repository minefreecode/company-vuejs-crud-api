## О проекте

Это API бекенда для проекта `https://github.com/what-crud/vue-crud`, написанной на Laravel

# Описание проекта



## Требования
- PHP 7.x,
- Composer

## Установка
1. Склонируйте проект
2. Выполните:
    ```
    composer install
    ```
3. Создайте базу данных для проекта
4. Создайте .env файл из .env.example и сконфигурируйте проект,
5. Выполните:
    ```
    php artisan key:generate
    ```
8. Выполните:
    ```
    php artisan migrate
    ```
9. Выполните seeders
10. Для запуска сервера:
    ```
    php artisan serve
    ```
