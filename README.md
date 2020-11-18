# magic_laravel_api
Magic API

### <p id='about'>📑 Sobre</p>

Projeto de api rest realizado como teste na Magic.

<br/>

### <p id='tecnology'>🖥 Tecnologias</p>

<ul>
  <li>PHP</li>
  <li>MySql</li>
  <li>Composer</li>
  <li>Laravel</li>
</ul>

### <p id='install'>🔥 Como instalar</p>

#### Baixe ou Clone.

```shell
$ git clone https://github.com/Marcos-SCO/magic_laravel_api.git
```

<br/>

#### Instale as dependências.

```shell
$ composer install
```

<br>

Para rodar o projeto será necessário ter o MySql e Composer instalados.

- Com o MySql crie um banco de dados como o nome: db_api_magic

- No diretório db, pegue a dump salvo e insira no seu banco de dados

- Vá até magic_api/ e copie o arquivo “.env.example”, renomeie para “.env” e insira suas variáveis de desenvolvimento.

- Pegue as collections presentes na api_collections/

- Para fazer o teste dos endpoints utilize um api client como o Postman.


<br/>


### Endpoints da api:

- Exibir informações com um id: 
url: {{BASE}}/api/endpoint/{id}  
Método: GET

<br>

- Atualizar informações: 
url: {{BASE}}/api/endpoints  
Método: PUT

        Exemplo de requisição com JSON:
        {
            "first_name : “first_name”,
            "last_name" : “last_name”,
        }

<br>

- Pegar todos registros:
url: {{BASE}}/api/endpoints  
Método: GET

<br>

- Criar registro: 
url: {{BASE}}/api/endpoints 
Método: POST
         
        Exemplo de requisição com JSON:
        {
            "first_name : “first_name”,
            "last_name" : “last_name”,
        } 

<br>

- Deletar usuário
url: {{BASE}}/api/endpoint  
Método: DELETE

        Exemplo de requisição:
        {
            "email" : ”email” 
        }

<br>
<br>

### <p id='install'>🎞️ <a href='https://www.youtube.com/watch?v=XA7pdpVs1E8&feature=youtu.be' targe='_blank'>Veja também um vídeo de demonstração, onde apresento o projeto</a></p>