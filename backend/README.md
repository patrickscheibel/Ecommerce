## Instalação das tecnologias utilizadas
### PHP
```sh
apt install php php-curl php-xml php-pgsql
```

### Composer

```sh
apt install composer
```

### Docker Compose(Opcional)

```sh
apt install docker-compose
```

## Instalar dependências

```sh
composer install
```
Utilizei as migrations para o banco de dados, mas caso seja necessário o script com o sql está na pasta database.

### Configurar o .env

### Criar e executar o banco pelo docker-compose(Opcional)

```sh
docker-compose up -d
```
### Executar as migrations(Opcional)

```sh
php artisan migrate
```

### Executar o sistema
```sh
php artisan serve
```

## Rotas da API
### Usuário
```sh
GET('api/user_index')

POST('api/user_find_by_id', 
{
  "id": 1
});

POST('api/user_store', 
{  
  "name": "teste",
  "email":"teste@email.com",
  "password": "teste"
})

POST('api/user_update',
{
  "id":1,
  "name": "mateus",
  "email": "mateus@email.com",
  "password": "123456"
})

POST('api/user_login',
{
  "email": "mateus@email.com",
  "password": "123456"
})

DELETE('api/user_delete',
{
  "id": 1
})
```

### Compra Item
```sh
GET('api/buy_item_index')

POST('buy_item_find_by_id',
{
  "id": 1
});

POST('api/buy_item_store',
{
  "user_id": 1,
  "product_id": 1,
  "supplier": "1",
  "product": "{ 'nome': 'Gorgeous Fresh Ball',
                'descricao': 'Carbonite web goalkeeper gloves are ergonomically designed to give easy fit',
                'categoria': 'Rustic',
                'imagem': 'http://placeimg.com/640/480/people',
                'preco': '297.00',
                'material': 'Plastic',
                'departamento': 'Games',
                'id': '17' }",
  "price": "127.00",
  "payment": "Card"
})

POST('api/buy_item_update',
{
  "id": 1,
  "user_id": 2,
  "product_id": 2,
  "supplier": "2",
  "product": "{ 'nome': 'Generic Plastic Pizza',
                'descricao': 'New ABC 13 9370, 13.3, 5th Gen CoreA5-8250U, 8GB RAM.'
                'categoria': 'Practical',
                'imagem': 'http://placeimg.com/640/480/abstract',
                'preco': '888.00',
                'material': 'Rubber',
                'departamento': 'Books',
                'id': '18' }",
  "price":"50.20",
  "payment": "Card"
})

DELETE('api/buy_item_delete',
{
  "id": 1
})
```
### Produtos
```sh
GET('product_index/{supplier}') #brazilian ou european 

POST('product_search_by_id',
{
  "id": 1,
  "supplier": "european"
})
```