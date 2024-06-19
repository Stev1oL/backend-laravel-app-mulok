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

#### 1. Create Bab

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

Example success Responds:

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

### Sub Bab / SubChapter

#### 1. Create Sub Bab

> POST `http://localhost:8000/api/subbab`

form-data, application/json

```
nomor_sub_bab: required
judul_sub_bab: required|string
gambar: image|mimes:jpeg,png,jpg
id_bab: required
```

Example success Responds:

```JSON
{
    "response": 201,
    "success": true,
    "message": "Sub Chapter created successfully",
    "data": {
        "nomor_sub_bab": "1",
        "judul_sub_bab": "1",
        "gambar": "https://res.cloudinary.com/dtjkuzlr2/image/upload/v1717823124/oojmkllmqpchfkmrtxoe.png",
        "id_bab": "1",
        "updated_at": "2024-06-08T05:05:23.000000Z",
        "created_at": "2024-06-08T05:05:23.000000Z",
        "id": 1
    }
}
```

#### 2. Get Sub Bab By ID

> GET `http://127.0.0.1:8000/api/subbab/{id}`

Example success Responds:

```JSON
{
    "response": 200,
    "status": true,
    "data": {
        "id": 1,
        "nomor_sub_bab": "1",
        "judul_sub_bab": "1",
        "gambar": "https://res.cloudinary.com/dtjkuzlr2/image/upload/v1717823124/oojmkllmqpchfkmrtxoe.png",
        "id_bab": 1,
        "created_at": "2024-06-08T05:05:23.000000Z",
        "updated_at": "2024-06-08T05:05:23.000000Z"
    }
}
```

#### 3. Get All Sub Bab

> GET `http://127.0.0.1:8000/api/subbab`

Example success Responds:

```JSON
{
    "response": 200,
    "status": true,
    "message": "All SubBab",
    "data": {
        "current_page": 1,
        "data": [
            {
                "id": 1,
                "nomor_sub_bab": "1",
                "judul_sub_bab": "1",
                "gambar": "https://res.cloudinary.com/dtjkuzlr2/image/upload/v1717823124/oojmkllmqpchfkmrtxoe.png",
                "id_bab": 1,
                "created_at": "2024-06-08T05:05:23.000000Z",
                "updated_at": "2024-06-08T05:05:23.000000Z"
            }
        ],
        "first_page_url": "http://127.0.0.1:8000/api/subbab?page=1",
        "from": 1,
        "last_page": 1,
        "last_page_url": "http://127.0.0.1:8000/api/subbab?page=1",
        "links": [
            {
                "url": null,
                "label": "&laquo; Previous",
                "active": false
            },
            {
                "url": "http://127.0.0.1:8000/api/subbab?page=1",
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
        "path": "http://127.0.0.1:8000/api/subbab",
        "per_page": 10,
        "prev_page_url": null,
        "to": 1,
        "total": 1
    }
}
```

## USER MOBILE

### Bab / Chapter

#### 1. Get Bab By ID

> GET `http://localhost:8000/api/user/chapter/{id}`

Example success Responds:

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

> GET `http://localhost:8000/api/user/chapters`

Example success Responds:

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

Example success Responds:

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

Example success Responds:

```JSON
{
    "status": true,
    "materi": {
        "id": 2,
        "judul_materi": "judul 1",
        "kategori_materi": "kategori 1",
        "id_bab": 2,
        "created_at": "2024-06-19T03:11:12.000000Z",
        "updated_at": "2024-06-19T03:11:12.000000Z",
        "chapter": {
            "id": 2,
            "nomor_bab": "1",
            "judul_bab": "bab 1",
            "id_semester": 1,
            "created_at": "2024-06-19T03:10:38.000000Z",
            "updated_at": "2024-06-19T03:10:38.000000Z"
        },
        "sub_material": [
            {
                "id": 1,
                "nomor_sub_materi": "1",
                "judul_sub_materi": "judul 1",
                "id_materi": 2,
                "created_at": "2024-06-19T03:11:33.000000Z",
                "updated_at": "2024-06-19T03:11:33.000000Z"
            },
            {
                "id": 2,
                "nomor_sub_materi": "1",
                "judul_sub_materi": "judul 1",
                "id_materi": 2,
                "created_at": "2024-06-19T03:26:27.000000Z",
                "updated_at": "2024-06-19T03:26:27.000000Z"
            }
        ]
    }
}
```

#### 2. Get All Materi

> GET `http://127.0.0.1:8000/api/user/materials`

Example success Responds:

```JSON
{
    "status": true,
    "message": "All Materials",
    "materi": {
        "current_page": 1,
        "data": [
            {
                "id": 2,
                "judul_materi": "judul 1",
                "kategori_materi": "kategori 1",
                "id_bab": 2,
                "created_at": "2024-06-19T03:11:12.000000Z",
                "updated_at": "2024-06-19T03:11:12.000000Z",
                "chapter": {
                    "id": 2,
                    "nomor_bab": "1",
                    "judul_bab": "bab 1",
                    "id_semester": 1,
                    "created_at": "2024-06-19T03:10:38.000000Z",
                    "updated_at": "2024-06-19T03:10:38.000000Z"
                },
                "sub_material": [
                    {
                        "id": 1,
                        "nomor_sub_materi": "1",
                        "judul_sub_materi": "judul 1",
                        "id_materi": 2,
                        "created_at": "2024-06-19T03:11:33.000000Z",
                        "updated_at": "2024-06-19T03:11:33.000000Z"
                    },
                    {
                        "id": 2,
                        "nomor_sub_materi": "1",
                        "judul_sub_materi": "judul 1",
                        "id_materi": 2,
                        "created_at": "2024-06-19T03:26:27.000000Z",
                        "updated_at": "2024-06-19T03:26:27.000000Z"
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
        "to": 1,
        "total": 1
    }
}
```

### Materi

#### 1. Get Sub Materi By ID

> GET `http://127.0.0.1:8000/api/user/submateri/{id}`

Example success Responds:

```JSON
{
    "status": true,
    "sub_materi": {
        "id": 1,
        "nomor_sub_materi": "1",
        "judul_sub_materi": "judul 1",
        "id_materi": 2,
        "created_at": "2024-06-19T03:11:33.000000Z",
        "updated_at": "2024-06-19T03:11:33.000000Z",
        "material": {
            "id": 2,
            "judul_materi": "judul 1",
            "kategori_materi": "kategori 1",
            "id_bab": 2,
            "created_at": "2024-06-19T03:11:12.000000Z",
            "updated_at": "2024-06-19T03:11:12.000000Z"
        },
        "text_material": [
            {
                "id": 1,
                "materi": "materi1",
                "terjemahan": "terjemahan1",
                "audio": "https://res.cloudinary.com/dtjkuzlr2/video/upload/v1718766740/xzh2izfalfvflxtuje0m.mp3",
                "id_sub_materi": 1,
                "id_kategori": 1,
                "created_at": "2024-06-19T03:12:20.000000Z",
                "updated_at": "2024-06-19T03:12:20.000000Z"
            }
        ],
        "group_text_material": [
            {
                "id": 1,
                "nomor_sub_bab": "1",
                "judul_sub_bab": "judul1",
                "gambar": "https://res.cloudinary.com/dtjkuzlr2/image/upload/v1718766756/rxdyuawzxce1vmwmeegx.png",
                "id_sub_materi": 1,
                "created_at": "2024-06-19T03:12:36.000000Z",
                "updated_at": "2024-06-19T03:12:36.000000Z"
            }
        ],
        "image_material": [
            {
                "id": 1,
                "materi": "materi 1",
                "id_sub_materi": 1,
                "id_kategori": 1,
                "created_at": "2024-06-19T03:12:05.000000Z",
                "updated_at": "2024-06-19T03:12:05.000000Z"
            }
        ]
    }
}
```

#### 2. Get All Sub Materi

> GET `http://127.0.0.1:8000/api/user/submateri`

Example success Responds:

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
                "id_materi": 2,
                "created_at": "2024-06-19T03:11:33.000000Z",
                "updated_at": "2024-06-19T03:11:33.000000Z",
                "material": {
                    "id": 2,
                    "judul_materi": "judul 1",
                    "kategori_materi": "kategori 1",
                    "id_bab": 2,
                    "created_at": "2024-06-19T03:11:12.000000Z",
                    "updated_at": "2024-06-19T03:11:12.000000Z"
                },
                "text_material": [
                    {
                        "id": 1,
                        "materi": "materi1",
                        "terjemahan": "terjemahan1",
                        "audio": "https://res.cloudinary.com/dtjkuzlr2/video/upload/v1718766740/xzh2izfalfvflxtuje0m.mp3",
                        "id_sub_materi": 1,
                        "id_kategori": 1,
                        "created_at": "2024-06-19T03:12:20.000000Z",
                        "updated_at": "2024-06-19T03:12:20.000000Z"
                    }
                ],
                "group_text_material": [
                    {
                        "id": 1,
                        "nomor_sub_bab": "1",
                        "judul_sub_bab": "judul1",
                        "gambar": "https://res.cloudinary.com/dtjkuzlr2/image/upload/v1718766756/rxdyuawzxce1vmwmeegx.png",
                        "id_sub_materi": 1,
                        "created_at": "2024-06-19T03:12:36.000000Z",
                        "updated_at": "2024-06-19T03:12:36.000000Z"
                    }
                ],
                "image_material": [
                    {
                        "id": 1,
                        "materi": "materi 1",
                        "id_sub_materi": 1,
                        "id_kategori": 1,
                        "created_at": "2024-06-19T03:12:05.000000Z",
                        "updated_at": "2024-06-19T03:12:05.000000Z"
                    }
                ]
            },
            {
                "id": 2,
                "nomor_sub_materi": "1",
                "judul_sub_materi": "judul 1",
                "id_materi": 2,
                "created_at": "2024-06-19T03:26:27.000000Z",
                "updated_at": "2024-06-19T03:26:27.000000Z",
                "material": {
                    "id": 2,
                    "judul_materi": "judul 1",
                    "kategori_materi": "kategori 1",
                    "id_bab": 2,
                    "created_at": "2024-06-19T03:11:12.000000Z",
                    "updated_at": "2024-06-19T03:11:12.000000Z"
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
        "to": 2,
        "total": 2
    }
}
```
