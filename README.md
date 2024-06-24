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
php artisan serve
```

## Server

```bash
http://127.0.0.1:8000/api/
```

## Routes Web

### Admin Auth

-   POST <{{url-backend}}/api/admin/register>
-   POST <{{url-backend}}/api/admin/login>
-   POST <{{url-backend}}/api/admin/logout> (need authorization)
-   GET <{{url-backend}}/api/admin> (need authorization) - get detail
-   POST <{{url-backend}}/api/admin> (need authorization) - edit
-   PUT <{{url-backend}}/api/admin/password> (need authorization) - change password

### Manage Semester

-   POST <{{url-backend}}/api/semesters> (post data)
-   GET <{{url-backend}}/api/semesters> (get all data)
-   GET <{{url-backend}}/api/semester/{id}> (get data)
-   POST <{{url-backend}}/api/semester/{id}> (edit data)
-   DELETE <{{url-backend}}/api/semester/{id}> (delete data)

### Manage Students

-   POST <{{url-backend}}/api/students> (post data)
-   GET <{{url-backend}}/api/students> (get all data)
-   GET <{{url-backend}}/api/student/{id}> (get data)
-   POST <{{url-backend}}/api/student/{id}> (edit data)
-   DELETE <{{url-backend}}/api/student/{id}> (delete data)

### Manage Bab

-   POST <{{url-backend}}/api/chapters> (post data)
-   GET <{{url-backend}}/api/chapters> (get all data)
-   GET <{{url-backend}}/api/chapter/{id}> (get data)
-   POST <{{url-backend}}/api/chapter/{id}> (edit data)
-   DELETE <{{url-backend}}/api/chapter/{id}> (delete data)

### Manage Materi

-   POST <{{url-backend}}/api/materials> (post data)
-   GET <{{url-backend}}/api/materials> (get all data)
-   GET <{{url-backend}}/api/material/{id}> (get data)
-   POST <{{url-backend}}/api/material/{id}> (edit data)
-   DELETE <{{url-backend}}/api/material/{id}> (delete data)

### Manage Kategori

-   POST <{{url-backend}}/api/categories> (post data)
-   GET <{{url-backend}}/api/categories> (get all data)
-   GET <{{url-backend}}/api/category/{id}> (get data)
-   POST <{{url-backend}}/api/category/{id}> (edit data)
-   DELETE <{{url-backend}}/api/category/{id}> (delete data)

### Manage Sub Materi

-   POST <{{url-backend}}/api/submateri> (post data)
-   GET <{{url-backend}}/api/submateri> (get all data)
-   GET <{{url-backend}}/api/submateri/{id}> (get data)
-   POST <{{url-backend}}/api/submateri/{id}> (edit data)
-   DELETE <{{url-backend}}/api/submateri/{id}> (delete data)

## Routes Mobile

### Manage Akun

-   POST <{{url-backend}}/api/user/login> (login)
-   GET <{{url-backend}}/api/user> (get data)
-   POST <{{url-backend}}/api/user> (edit data)
-   PUT <{{url-backend}}/api/user/password> (change password)-STILL NOT WORKING
-   POST <{{url-backend}}/api/user/logout> (logout)

### Manage Bab

-   GET <{{url-backend}}/api/chapters> (get all data)
-   GET <{{url-backend}}/api/chapter/{id}> (get data)

### Manage Kategori

-   GET <{{url-backend}}/api/categories> (get all data)
-   GET <{{url-backend}}/api/category/{id}> (get data)

### Manage Materi

-   GET <{{url-backend}}/api/materials> (get all data)
-   GET <{{url-backend}}/api/material/{id}> (get data)

### Manage Sub Materi

-   GET <{{url-backend}}/api/submateri> (get all data)
-   GET <{{url-backend}}/api/submateri/{id}> (get data)

### Manage Kamus

-   GET <{{url-backend}}/api/dictionaries> (get all data)
-   GET <{{url-backend}}/api/dictionary/{id}> (get data)

## Documentation

## ADMIN WEBSITE

### Authentication

#### 1. Register

> POST `{{url-backend}}/api/admin/register`

form-data, application/json

```
nama: required
username: required|unique
password: required
```

Example success Response:

```JSON
{
    "response": 201,
    "success": true,
    "message": "User Created Successfully.",
    "token": "1|Vr6nIsYK2AfEs091tpYfQDLgTDjutuwnZhjLSR1X5b10575d"
}
```

### Bab / Chapter

#### 1. Create Bab

> POST `{{url-backend}}/api/chapters`

form-data, application/json

```
nomor_bab: required
judul_bab: required|string
id_semester: required
```

Example success Response:

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

> GET `{{url-backend}}/api/chapter/{id}`

Example success Response:

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

### Akun

#### 1. Login

> POST `{{url-backend}}/api/user/login`

form-data, application/json

```
username: required|unique
password: required
```

Example Request:

```
username: admin12
password: admin12
```

Example success Response:

```JSON
{
    "success": true,
    "message": "User Logged In Successfully",
    "data": {
        "id": 1,
        "nama": "nama1",
        "nisn": "6251515",
        "username": "admin12",
        "id_semester": 1,
        "created_at": "2024-06-18T22:21:19.000000Z",
        "updated_at": "2024-06-18T22:21:19.000000Z"
    },
    "token": "2|SXoKxZlfeichrzTGhwu7xZKJEAwC5ErAGYF59Fn4401c564d"
}
```

#### 2. Get Account Detail

> GET `{{url-backend}}/api/user`

Example Request:

```Bearer-Token Authorization
token: 2|SXoKxZlfeichrzTGhwu7xZKJEAwC5ErAGYF59Fn4401c564d
```

Example success Response:

```JSON
{
    "id": 1,
    "nama": "nama1",
    "username": "admin12",
    "password": "admin12",
    "semester": {
        "id": 1,
        "semester": "1",
        "created_at": "2024-06-08T05:03:58.000000Z",
        "updated_at": "2024-06-08T05:03:58.000000Z"
    }
}
```

#### 3. Logout

> POST `{{url-backend}}/api/user/logout`

Example Request:

```Bearer-Token Authorization
token: 2|SXoKxZlfeichrzTGhwu7xZKJEAwC5ErAGYF59Fn4401c564d
```

Example success Response:

```JSON
{
    "success": true,
    "message": "Successfully logged out",
}
```

### Bab / Chapter

#### 1. Get Bab By ID

> GET `{{url-backend}}/api/user/chapter/{id}`

Example success Response:

```JSON
{
    "status": true,
    "bab": {
        "id": 2,
        "nomor_bab": "1",
        "judul_bab": "bab 1",
        "id_semester": 1,
        "created_at": "2024-06-19T03:10:38.000000Z",
        "updated_at": "2024-06-19T03:10:38.000000Z",
        "semester": {
            "id": 1,
            "semester": "1",
            "created_at": "2024-06-19T01:25:40.000000Z",
            "updated_at": "2024-06-19T01:25:40.000000Z"
        },
        "materials": [
            {
                "id": 2,
                "judul_materi": "judul 1",
                "kategori_materi": "kategori 1",
                "id_bab": 2,
                "created_at": "2024-06-19T03:11:12.000000Z",
                "updated_at": "2024-06-19T03:11:12.000000Z"
            }
        ],
        "dictionary": [
            {
                "id": 2,
                "bahasa_dayak": "ikau",
                "terjemahan": "kamu",
                "audio": "https://res.cloudinary.com/dtjkuzlr2/video/upload/v1718767348/lfc5cczvdenbc3upmram.mp3",
                "id_bab": 2,
                "created_at": "2024-06-19T03:22:28.000000Z",
                "updated_at": "2024-06-19T03:22:28.000000Z"
            }
        ]
    }
}
```

#### 2. Get All Bab

> GET `{{url-backend}}/api/user/chapters`

Example success Response:

```JSON
{
    "status": true,
    "message": "All chapters",
    "bab": {
        "current_page": 1,
        "data": [
            {
                "id": 2,
                "nomor_bab": "1",
                "judul_bab": "bab 1",
                "id_semester": 1,
                "created_at": "2024-06-19T03:10:38.000000Z",
                "updated_at": "2024-06-19T03:10:38.000000Z",
                "semester": {
                    "id": 1,
                    "semester": "1",
                    "created_at": "2024-06-19T01:25:40.000000Z",
                    "updated_at": "2024-06-19T01:25:40.000000Z"
                },
                "materials": [
                    {
                        "id": 2,
                        "judul_materi": "judul 1",
                        "kategori_materi": "kategori 1",
                        "id_bab": 2,
                        "created_at": "2024-06-19T03:11:12.000000Z",
                        "updated_at": "2024-06-19T03:11:12.000000Z"
                    }
                ],
                "dictionary": [
                    {
                        "id": 2,
                        "bahasa_dayak": "ikau",
                        "terjemahan": "kamu",
                        "audio": "https://res.cloudinary.com/dtjkuzlr2/video/upload/v1718767348/lfc5cczvdenbc3upmram.mp3",
                        "id_bab": 2,
                        "created_at": "2024-06-19T03:22:28.000000Z",
                        "updated_at": "2024-06-19T03:22:28.000000Z"
                    }
                ]
            }
        ],
        "first_page_url": "http://127.0.0.1:8000/api/user/chapters?page=1",
        "from": 1,
        "last_page": 1,
        "last_page_url": "http://127.0.0.1:8000/api/user/chapters?page=1",
        "links": [
            {
                "url": null,
                "label": "&laquo; Previous",
                "active": false
            },
            {
                "url": "http://127.0.0.1:8000/api/user/chapters?page=1",
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
        "path": "http://127.0.0.1:8000/api/user/chapters",
        "per_page": 10,
        "prev_page_url": null,
        "to": 1,
        "total": 1
    }
}
```

#### 3. Get Bab By Page

> GET `http://127.0.0.1:8000/api/chapters?page=1`

Example success Response:

```JSON
{
    "status": true,
    "message": "All chapters",
    "bab": {
        "current_page": 1,
        "data": [
            {
                "id": 2,
                "nomor_bab": "1",
                "judul_bab": "bab 1",
                "id_semester": 1,
                "created_at": "2024-06-19T03:10:38.000000Z",
                "updated_at": "2024-06-19T03:10:38.000000Z",
                "semester": {
                    "id": 1,
                    "semester": "1",
                    "created_at": "2024-06-19T01:25:40.000000Z",
                    "updated_at": "2024-06-19T01:25:40.000000Z"
                },
                "materials": [
                    {
                        "id": 2,
                        "judul_materi": "judul 1",
                        "kategori_materi": "kategori 1",
                        "id_bab": 2,
                        "created_at": "2024-06-19T03:11:12.000000Z",
                        "updated_at": "2024-06-19T03:11:12.000000Z"
                    }
                ],
                "dictionary": [
                    {
                        "id": 2,
                        "bahasa_dayak": "ikau",
                        "terjemahan": "kamu",
                        "audio": "https://res.cloudinary.com/dtjkuzlr2/video/upload/v1718767348/lfc5cczvdenbc3upmram.mp3",
                        "id_bab": 2,
                        "created_at": "2024-06-19T03:22:28.000000Z",
                        "updated_at": "2024-06-19T03:22:28.000000Z"
                    }
                ]
            }
        ],
        "first_page_url": "http://127.0.0.1:8000/api/user/chapters?page=1",
        "from": 1,
        "last_page": 1,
        "last_page_url": "http://127.0.0.1:8000/api/user/chapters?page=1",
        "links": [
            {
                "url": null,
                "label": "&laquo; Previous",
                "active": false
            },
            {
                "url": "http://127.0.0.1:8000/api/user/chapters?page=1",
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
        "path": "http://127.0.0.1:8000/api/user/chapters",
        "per_page": 1,
        "prev_page_url": null,
        "to": 1,
        "total": 1
    }
}
```

### Materi

#### 1. Get Materi By ID

> GET `http://127.0.0.1:8000/api/user/material/{id}`

Example success Response:

```JSON
{
    "status": true,
    "materi": {
        "id": 1,
        "judul_materi": "judul 1",
        "id_bab": 1,
        "created_at": "2024-06-19T04:24:06.000000Z",
        "updated_at": "2024-06-19T04:24:06.000000Z",
        "chapter": {
            "id": 1,
            "nomor_bab": "1",
            "judul_bab": "bab 1",
            "id_semester": 1,
            "created_at": "2024-06-19T04:23:59.000000Z",
            "updated_at": "2024-06-19T04:23:59.000000Z"
        },
        "sub_material": [
            {
                "id": 1,
                "nomor_sub_materi": "1",
                "judul_sub_materi": "judul 1",
                "id_materi": 1,
                "id_kategori": 1,
                "created_at": "2024-06-19T04:25:29.000000Z",
                "updated_at": "2024-06-19T04:25:29.000000Z"
            },
            {
                "id": 2,
                "nomor_sub_materi": "1",
                "judul_sub_materi": "judul 1",
                "id_materi": 1,
                "id_kategori": 2,
                "created_at": "2024-06-19T04:25:32.000000Z",
                "updated_at": "2024-06-19T04:25:32.000000Z"
            }
        ]
    }
}
```

#### 2. Get All Materi

> GET `http://127.0.0.1:8000/api/user/materials`

Example success Response:

```JSON
{
    "status": true,
    "message": "All Materials",
    "materi": {
        "current_page": 1,
        "data": [
            {
                "id": 1,
                "judul_materi": "judul 1",
                "id_bab": 1,
                "created_at": "2024-06-19T04:24:06.000000Z",
                "updated_at": "2024-06-19T04:24:06.000000Z",
                "chapter": {
                    "id": 1,
                    "nomor_bab": "1",
                    "judul_bab": "bab 1",
                    "id_semester": 1,
                    "created_at": "2024-06-19T04:23:59.000000Z",
                    "updated_at": "2024-06-19T04:23:59.000000Z"
                },
                "sub_material": [
                    {
                        "id": 1,
                        "nomor_sub_materi": "1",
                        "judul_sub_materi": "judul 1",
                        "id_materi": 1,
                        "id_kategori": 1,
                        "created_at": "2024-06-19T04:25:29.000000Z",
                        "updated_at": "2024-06-19T04:25:29.000000Z"
                    },
                    {
                        "id": 2,
                        "nomor_sub_materi": "1",
                        "judul_sub_materi": "judul 1",
                        "id_materi": 1,
                        "id_kategori": 2,
                        "created_at": "2024-06-19T04:25:32.000000Z",
                        "updated_at": "2024-06-19T04:25:32.000000Z"
                    }
                ]
            },
            {
                "id": 2,
                "judul_materi": "judul 2",
                "id_bab": 1,
                "created_at": "2024-06-19T04:24:24.000000Z",
                "updated_at": "2024-06-19T04:24:24.000000Z",
                "chapter": {
                    "id": 1,
                    "nomor_bab": "1",
                    "judul_bab": "bab 1",
                    "id_semester": 1,
                    "created_at": "2024-06-19T04:23:59.000000Z",
                    "updated_at": "2024-06-19T04:23:59.000000Z"
                },
                "sub_material": [
                    {
                        "id": 3,
                        "nomor_sub_materi": "1",
                        "judul_sub_materi": "judul 1",
                        "id_materi": 2,
                        "id_kategori": 2,
                        "created_at": "2024-06-19T04:25:36.000000Z",
                        "updated_at": "2024-06-19T04:25:36.000000Z"
                    }
                ]
            }
        ],
        "first_page_url": "http://127.0.0.1:8000/api/user/materials?page=1",
        "from": 1,
        "last_page": 1,
        "last_page_url": "http://127.0.0.1:8000/api/user/materials?page=1",
        "links": [
            {
                "url": null,
                "label": "&laquo; Previous",
                "active": false
            },
            {
                "url": "http://127.0.0.1:8000/api/user/materials?page=1",
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
        "path": "http://127.0.0.1:8000/api/user/materials",
        "per_page": 10,
        "prev_page_url": null,
        "to": 2,
        "total": 2
    }
}
```

### Sub Materi

#### 1. Get Sub Materi By ID

> GET `http://127.0.0.1:8000/api/user/submateri/{id}`

Example success Response:

```JSON
{
    "status": true,
    "sub_materi": {
        "id": 1,
        "nomor_sub_materi": "1",
        "judul_sub_materi": "judul 1",
        "id_materi": 1,
        "id_kategori": 1,
        "created_at": "2024-06-19T04:25:29.000000Z",
        "updated_at": "2024-06-19T04:25:29.000000Z",
        "material": {
            "id": 1,
            "judul_materi": "judul 1",
            "id_bab": 1,
            "created_at": "2024-06-19T04:24:06.000000Z",
            "updated_at": "2024-06-19T04:24:06.000000Z"
        },
        "category": {
            "id": 1,
            "nama_kategori": "kategori 1",
            "created_at": "2024-06-19T04:25:20.000000Z",
            "updated_at": "2024-06-19T04:25:20.000000Z"
        },
        "text_material": [
            {
                "id": 1,
                "materi": "materi1",
                "terjemahan": "terjemahan1",
                "audio": "https://res.cloudinary.com/dtjkuzlr2/video/upload/v1718771170/wqyegfj5emkubobxv32s.mp3",
                "id_sub_materi": 1,
                "id_kategori": 1,
                "created_at": "2024-06-19T04:26:10.000000Z",
                "updated_at": "2024-06-19T04:26:10.000000Z"
            },
            {
                "id": 2,
                "materi": "materi1",
                "terjemahan": "terjemahan1",
                "audio": "https://res.cloudinary.com/dtjkuzlr2/video/upload/v1718771179/vnuq0kmmummjfbibzjye.mp3",
                "id_sub_materi": 1,
                "id_kategori": 2,
                "created_at": "2024-06-19T04:26:19.000000Z",
                "updated_at": "2024-06-19T04:26:19.000000Z"
            }
        ],
        "group_text_material": [
            {
                "id": 1,
                "nomor_sub_bab": "1",
                "judul_sub_bab": "judul1",
                "gambar": "https://res.cloudinary.com/dtjkuzlr2/image/upload/v1718771195/pno6fqajihlupndlagaz.png",
                "id_sub_materi": 1,
                "created_at": "2024-06-19T04:26:35.000000Z",
                "updated_at": "2024-06-19T04:26:35.000000Z"
            }
        ],
        "image_material": [
            {
                "id": 1,
                "materi": "materi 1",
                "id_sub_materi": 1,
                "id_kategori": 1,
                "created_at": "2024-06-19T04:26:25.000000Z",
                "updated_at": "2024-06-19T04:26:25.000000Z"
            }
        ]
    }
}
```

#### 2. Get All Sub Materi

> GET `http://127.0.0.1:8000/api/user/submateri`

Example success Response:

```JSON
{
    "status": true,
    "message": "All SubMaterials",
    "sub_materi": {
        "current_page": 1,
        "data": [
            {
                "id": 1,
                "nomor_sub_materi": "1",
                "judul_sub_materi": "judul 1",
                "id_materi": 1,
                "id_kategori": 1,
                "created_at": "2024-06-19T04:25:29.000000Z",
                "updated_at": "2024-06-19T04:25:29.000000Z",
                "material": {
                    "id": 1,
                    "judul_materi": "judul 1",
                    "id_bab": 1,
                    "created_at": "2024-06-19T04:24:06.000000Z",
                    "updated_at": "2024-06-19T04:24:06.000000Z"
                },
                "category": {
                    "id": 1,
                    "nama_kategori": "kategori 1",
                    "created_at": "2024-06-19T04:25:20.000000Z",
                    "updated_at": "2024-06-19T04:25:20.000000Z"
                },
                "text_material": [
                    {
                        "id": 1,
                        "materi": "materi1",
                        "terjemahan": "terjemahan1",
                        "audio": "https://res.cloudinary.com/dtjkuzlr2/video/upload/v1718771170/wqyegfj5emkubobxv32s.mp3",
                        "id_sub_materi": 1,
                        "id_kategori": 1,
                        "created_at": "2024-06-19T04:26:10.000000Z",
                        "updated_at": "2024-06-19T04:26:10.000000Z"
                    },
                    {
                        "id": 2,
                        "materi": "materi1",
                        "terjemahan": "terjemahan1",
                        "audio": "https://res.cloudinary.com/dtjkuzlr2/video/upload/v1718771179/vnuq0kmmummjfbibzjye.mp3",
                        "id_sub_materi": 1,
                        "id_kategori": 2,
                        "created_at": "2024-06-19T04:26:19.000000Z",
                        "updated_at": "2024-06-19T04:26:19.000000Z"
                    }
                ],
                "group_text_material": [
                    {
                        "id": 1,
                        "nomor_sub_bab": "1",
                        "judul_sub_bab": "judul1",
                        "gambar": "https://res.cloudinary.com/dtjkuzlr2/image/upload/v1718771195/pno6fqajihlupndlagaz.png",
                        "id_sub_materi": 1,
                        "created_at": "2024-06-19T04:26:35.000000Z",
                        "updated_at": "2024-06-19T04:26:35.000000Z"
                    }
                ],
                "image_material": [
                    {
                        "id": 1,
                        "materi": "materi 1",
                        "id_sub_materi": 1,
                        "id_kategori": 1,
                        "created_at": "2024-06-19T04:26:25.000000Z",
                        "updated_at": "2024-06-19T04:26:25.000000Z"
                    }
                ]
            },
            {
                "id": 2,
                "nomor_sub_materi": "1",
                "judul_sub_materi": "judul 1",
                "id_materi": 1,
                "id_kategori": 2,
                "created_at": "2024-06-19T04:25:32.000000Z",
                "updated_at": "2024-06-19T04:25:32.000000Z",
                "material": {
                    "id": 1,
                    "judul_materi": "judul 1",
                    "id_bab": 1,
                    "created_at": "2024-06-19T04:24:06.000000Z",
                    "updated_at": "2024-06-19T04:24:06.000000Z"
                },
                "category": {
                    "id": 2,
                    "nama_kategori": "kategori 2",
                    "created_at": "2024-06-19T04:25:23.000000Z",
                    "updated_at": "2024-06-19T04:25:23.000000Z"
                },
                "text_material": [],
                "group_text_material": [],
                "image_material": []
            },
            {
                "id": 3,
                "nomor_sub_materi": "1",
                "judul_sub_materi": "judul 1",
                "id_materi": 2,
                "id_kategori": 2,
                "created_at": "2024-06-19T04:25:36.000000Z",
                "updated_at": "2024-06-19T04:25:36.000000Z",
                "material": {
                    "id": 2,
                    "judul_materi": "judul 2",
                    "id_bab": 1,
                    "created_at": "2024-06-19T04:24:24.000000Z",
                    "updated_at": "2024-06-19T04:24:24.000000Z"
                },
                "category": {
                    "id": 2,
                    "nama_kategori": "kategori 2",
                    "created_at": "2024-06-19T04:25:23.000000Z",
                    "updated_at": "2024-06-19T04:25:23.000000Z"
                },
                "text_material": [],
                "group_text_material": [],
                "image_material": []
            }
        ],
        "first_page_url": "http://127.0.0.1:8000/api/user/submateri?page=1",
        "from": 1,
        "last_page": 1,
        "last_page_url": "http://127.0.0.1:8000/api/user/submateri?page=1",
        "links": [
            {
                "url": null,
                "label": "&laquo; Previous",
                "active": false
            },
            {
                "url": "http://127.0.0.1:8000/api/user/submateri?page=1",
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
        "path": "http://127.0.0.1:8000/api/user/submateri",
        "per_page": 10,
        "prev_page_url": null,
        "to": 3,
        "total": 3
    }
}
```

### Kamus

#### 1. Get Kamus By ID

> GET `http://127.0.0.1:8000/api/user/dictionary/{id}`

Example success Response:

```JSON
{
    "status": true,
    "kamus": {
        "id": 1,
        "bahasa_dayak": "ikau",
        "terjemahan": "kamu",
        "audio": "https://res.cloudinary.com/dtjkuzlr2/video/upload/v1718771155/wcidvtzmf4ceedoigcqv.mp3",
        "id_bab": 1,
        "created_at": "2024-06-19T04:25:55.000000Z",
        "updated_at": "2024-06-19T04:25:55.000000Z",
        "chapter": {
            "id": 1,
            "nomor_bab": "1",
            "judul_bab": "bab 1",
            "id_semester": 1,
            "created_at": "2024-06-19T04:23:59.000000Z",
            "updated_at": "2024-06-19T04:23:59.000000Z"
        }
    }
}
```

#### 2. Get All Kamus

> GET `http://127.0.0.1:8000/api/user/dictionaries`

Example success Response:

```JSON
{
    "status": true,
    "message": "All Dictionaries",
    "kamus": {
        "current_page": 1,
        "data": [
            {
                "id": 1,
                "bahasa_dayak": "ikau",
                "terjemahan": "kamu",
                "audio": "https://res.cloudinary.com/dtjkuzlr2/video/upload/v1718771155/wcidvtzmf4ceedoigcqv.mp3",
                "id_bab": 1,
                "created_at": "2024-06-19T04:25:55.000000Z",
                "updated_at": "2024-06-19T04:25:55.000000Z",
                "chapter": {
                    "id": 1,
                    "nomor_bab": "1",
                    "judul_bab": "bab 1",
                    "id_semester": 1,
                    "created_at": "2024-06-19T04:23:59.000000Z",
                    "updated_at": "2024-06-19T04:23:59.000000Z"
                }
            }
        ],
        "first_page_url": "http://127.0.0.1:8000/api/user/dictionaries?page=1",
        "from": 1,
        "last_page": 1,
        "last_page_url": "http://127.0.0.1:8000/api/user/dictionaries?page=1",
        "links": [
            {
                "url": null,
                "label": "&laquo; Previous",
                "active": false
            },
            {
                "url": "http://127.0.0.1:8000/api/user/dictionaries?page=1",
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
        "path": "http://127.0.0.1:8000/api/user/dictionaries",
        "per_page": 25,
        "prev_page_url": null,
        "to": 1,
        "total": 1
    }
}
```
