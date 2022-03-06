1. Переносим проект с гит репозитория.
2. composer update (в корне проекта).
3. php artisan serve. (запускаем проект локально).
4. php artisan key:generate (в корне проекта).
5. Вписываем данные от mysql, для подключения к базе данных.(.env файл)
6. php artisan migrate
7. Стучимся по эндпоинту для создания документа POST "localhost:8000/api/v1/document"
8. Стучимся по эндпоинту для получения документа в который требуется передать id GET "localhost:8000/api/v1/document/{id}"
9. Стучимся по эндпоинту для обновления документа в который требуется передать id и payload PATCH "localhost:8000/api/v1/document/{id}"
10. Стучимся по эндпоинту для публикации документа в который требуется передать id POST "localhost:8000/api/v1/document/{id}/publish"
11. Стучимся по эндпоинту для получения документов в pagination в который требуется передать "page=1 курсор какую страницу требуется вывести, perPage=5 количество документов в каждой странице" GET "localhost:8000/api/v1/document/{page?}"

<h2 style="color:blue; text-align:center">Тестовое задание</h2>
<div style="display: flex">
<img style="border-radius: 50%" src="https://avatars.githubusercontent.com/u/57625926?v=4" width="200">
<h1>Руслан Алиев</h1>
</div>