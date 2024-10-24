## Задание

Сделать сервис лицензирования.
Тонкий клиент и сервер потолще.
 
Клиент знает есть ли лицензия на эту машину от сервиса лицензирования если есть то на какой период.
Если нет - нажимаешь на кнопку, формируется запрос, отправляется на сервер, тот который укажет юзер, с логином и паролем по digest.
Админ зайдет в учетку, посмотрит на имеющиеся запросы. одобрит нужные
После этого, тонкий клиент сможет забрать себе сертификат. с сервера для конкретно этого тонкого клиента.
 
запрос на регистрацию, формируется на основе сгенерированного на клиенте приватного ключа.
все это нужно сделать на базе openssl

## План

- Изучить стандарт x.509 и архитектуру открытых ключей (PKI)
    - Механизм работы цифровой подписи
    - Иерархия центров сертификации
    - Роли сертификатов
    - Типы ключей
- Определение публичной и приватной информации
- Создать модель приложения на bash скриптах
    - Создание корневого центра сертификации
    - Создание доверенных центров сертификации
    - Создание клиента
- Реализовать серверную и клиентскую части приложения на C используя openssl и libcurl (перенос функционала из скриптов)
    - Организация очереди запросов
    - Паралельная обработка запросов