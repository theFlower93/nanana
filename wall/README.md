# Тестовое задание для веб-студии *"Ананас"* на должность *"PHP-программист"*.

При выполнении задания я не пользовался никакими фреймворками, кроме *ORM библиотеки RedBeanPHP*.
Вся вёрстка из полученного архива лежит в корне проекта без изменений - я её использовал как шаблон.
Рабочий проект лежит в каталоге *"core"*. На выполнение следует запускать файл *"index.php"*.
Для изменений настроек доступа к базе данных - изменить файл конфигурации *"includes/config.php"*

## Задание выполнено в соответствии с ТЗ:

**Авторизация:**
* в случае не успешной авторизации пользователю выводится соответствующее сообщение

**Регистрация:**
* Требование к email и паролю только одно: поля не должны быть пустыми.
Реализована проверка на заполненность полей, а также на уже существующих пользователей с такими данными.
* В случае неуспешной регистрации выводится соответствующее сообщение.

**Главное меню (сверху):**
* Пункт "Стена" - показывается всегда.
* Пункты "Авторизация" и "Регистрация" видны только неавторизованным пользователям.
* Блок справа виден только авторизованным пользователям.

**Главная страница:**
* Авторизованным пользователям доступна форма отправки поста, неавторизованным - не доступна.
* Реализована проверка на пустоту заполненных полей.

**Не сделано:**
* Не реализованы вывод автора и даты публикации в сайдбаре.
