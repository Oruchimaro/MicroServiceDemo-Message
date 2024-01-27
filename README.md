# Message Service

## Setup

### regular setup
```bash
    git clone <Message Repo> message

    cd message && cp .env.example .env

    composer install

    php artisan key:generate

    php artisan migrate --seed

    php artisan serve --port=4000
```

### using docker

Coming soon.


## Usage

- Save message endpoint : `` POST http://localhost:4000/api/messages ``
    - headers
        - Accept: application/json
        - Content-Type: application/json
        - Authorization: Bearer <token>
    - body params :
        - title (string)
        - body (string)

    - response :
        - status : 201
        - body 
            - server_time
            - data: {
                "id"
                "title"
                "body"
            }
            
        - status : 422
        - body :
            - message
            - errors : {}
