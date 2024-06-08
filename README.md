# API Documentation

## Configuration

```bash
composer install
```

-   rename the `.env.example` file to `.env`
-   add mysql database information on `.env`

```bash
composer update
```

```bash
php artisan migrate
```

```bash
php artisan server
```

## Server

```bash
http://127.0.0.1:8000/api/
```

## Routes

### Admin Auth

-   POST <http://localhost:8000/api/admin/register>
-   POST <http://localhost:8000/api/admin/login>
-   POST <http://localhost:8000/api/admin/logout> (need authorization)
-   GET <http://localhost:8000/api/admin> (need authorization) - get detail
-   POST <http://localhost:8000/api/admin> (need authorization) - edit
-   PUT <http://localhost:8000/api/admin/password> (need authorization) - change password

### Manage Semester

### Manage Students

-   POST <http://localhost:8000/api/students> (post data)
-   GET <http://localhost:8000/api/students> (get all data)
-   GET <http://localhost:8000/api/student/{id}> (get data)
-   POST <http://localhost:8000/api/student/{id}> (edit data)
-   DELETE <http://localhost:8000/api/student/{id}> (delete data)

## Documentation

## ADMIN WEBSITE

### Authentication

#### 1. Register

> POST `http://localhost:8000/api/admin/register`

form-data, application/json

```
nama: required
username: required|unique
password: required
```

Example success Responds:

```JSON
{
    "response": 201,
    "success": true,
    "message": "User Created Successfully.",
    "token": "1|Vr6nIsYK2AfEs091tpYfQDLgTDjutuwnZhjLSR1X5b10575d"
}
```

### Bab / Chapter

#### 2. Create Bab

> POST `http://localhost:8000/api/chapters`

form-data, application/json

```
nomor_bab: required
judul_bab: required|string
id_semester: required
```

Example success Responds:

```JSON
{
    "response": 201,
    "success": true,
    "message": "Chapter created successfully.",
    "data": {
        "nomor_bab": "2",
        "judul_bab": "2",
        "id_semester": "1",
        "updated_at": "2024-06-08T05:05:09.000000Z",
        "created_at": "2024-06-08T05:05:09.000000Z",
        "id": 2
    }
}
```

#### 2. Get Bab By ID

> GET `http://localhost:8000/api/chapter/{id}`

Example suceess Responds:

```JSON
{
    "response": 200,
    "status": true,
    "data": {
        "id": 1,
        "nomor_bab": "1",
        "judul_bab": "1",
        "id_semester": 1,
        "created_at": "2024-06-08T05:05:04.000000Z",
        "updated_at": "2024-06-08T05:05:04.000000Z"
    }
}
```

## USER MOBILE

### Bab / Chapter

#### 2. Get Bab By ID

> GET `http://localhost:8000/api/user/chapter/{id}`

Example suceess Responds:

```JSON
{
    "response": 200,
    "status": true,
    "data": {
        "id": 1,
        "nomor_bab": "1",
        "judul_bab": "1",
        "id_semester": 1,
        "created_at": "2024-06-08T05:05:04.000000Z",
        "updated_at": "2024-06-08T05:05:04.000000Z"
    }
}
```

#### 2. Get All Bab

> GET `http://localhost:8000/api/user/chapters`

Example suceess Responds:

```JSON
{
    "response": 200,
    "status": true,
    "message": "All chapters",
    "data": {
        "current_page": 1,
        "data": [
            {
                "id": 1,
                "nomor_bab": "1",
                "judul_bab": "1",
                "id_semester": 1,
                "created_at": "2024-06-08T05:05:04.000000Z",
                "updated_at": "2024-06-08T05:05:04.000000Z"
            },
            {
                "id": 2,
                "nomor_bab": "2",
                "judul_bab": "2",
                "id_semester": 1,
                "created_at": "2024-06-08T05:05:09.000000Z",
                "updated_at": "2024-06-08T05:05:09.000000Z"
            }
        ],
        "first_page_url": "http://127.0.0.1:8000/api/chapters?page=1",
        "from": 1,
        "last_page": 1,
        "last_page_url": "http://127.0.0.1:8000/api/chapters?page=1",
        "links": [
            {
                "url": null,
                "label": "&laquo; Previous",
                "active": false
            },
            {
                "url": "http://127.0.0.1:8000/api/chapters?page=1",
                "label": "1",
                "active": true
            },
            {
                "url": null,
                "label": "Next &raquo;",
                "active": false
            }
        ],
        "next_page_url": null,
        "path": "http://127.0.0.1:8000/api/chapters",
        "per_page": 10,
        "prev_page_url": null,
        "to": 2,
        "total": 2
    }
}
```
