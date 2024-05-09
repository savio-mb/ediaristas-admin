## Projeto sistema administrativo da plataforma E-Diaristas

### Instalando o projeto

#### Clonar o repositorio

```
git clone https://github.com/savio-mb/ediaristas-admin.git
```

#### Instalar as dependências

```
composer install
```

Ou em ambiente de desenvolvimento:

```
composer update
```

#### Criar arquivo de configurações de ambiente

Copiar o arquivo de exemplo `.env.exemplo` para `.env` na raiz do proejto 
configurar os detalhes da aplicação e conexão com o banco de dados.

#### Criar a estrutura no banco de dados

```
php artisan migrate
```

#### Iniciar o servidor de desenvolvimento

```
php artisan serve
```
