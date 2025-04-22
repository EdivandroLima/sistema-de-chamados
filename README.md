##

## Servidor
- PHP v8.1
- MySQL

## Tecnologias
- Laravel v10
- Jetstream
- Livewire
- Tailwind CSS

## Pacotes Utilizados
#### Laravel Jetstream com Livewire
```
https://jetstream.laravel.com/installation.html
```
```
php artisan livewire:publish --assets
php artisan livewire:publish --config
```

#### Laravel PT-BR
```
https://github.com/lucascudo/laravel-pt-BR-localization
```

#### Laravel Permission - Spatie
```
https://spatie.be/docs/laravel-permission/v6/installation-laravel
```

## Instalação
### Requisitos
- PHP v8.1
- Node/NPM 
- Composer v2.8^

### Instalando as dependências
```
composer install
```
### Copiando o .env.example para .env
```
cp .env.example .env
```
### Gerando a key do Laravel
```
php artisan key:generate
```

### Configure o banco de dados no arquivo .env
```
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=
DB_USERNAME=root
DB_PASSWORD=
```

### Executando os migrations
```
php artisan migrate
```

#### Executando os seeders para criar o admin, permissões e dados fakes para popular o banco.
```
php artisan db:seed
```

### Instalação dos pacotes NPM
```
npm install
```

### Compilando o projeto
```
npm run build
```

### Iniciando o servidor em localhost
```
php artisan serve
```

### Login
```
http://127.0.0.1:8000/login

// Admin
email: adm@email.com
senha: password

// Cliente
email: user@email.com
senha: password

```