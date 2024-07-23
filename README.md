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

### Manage Text Materi

-   POST <{{url-backend}}/api/texts> (post data)
-   GET <{{url-backend}}/api/texts> (get all data)
-   GET <{{url-backend}}/api/text/{id}> (get data)
-   POST <{{url-backend}}/api/text/{id}> (edit data)
-   DELETE <{{url-backend}}/api/text/{id}> (delete data)

### Manage Image Materi

-   POST <{{url-backend}}/api/imagemateri> (post data)
-   GET <{{url-backend}}/api/imagemateri> (get all data)
-   GET <{{url-backend}}/api/imagemateri/{id}> (get data)
-   POST <{{url-backend}}/api/imagemateri/{id}> (edit data)
-   DELETE <{{url-backend}}/api/imagemateri/{id}> (delete data)

## Routes Mobile

### Manage Akun

-   POST <{{url-backend}}/api/user/login> (login)
-   GET <{{url-backend}}/api/user> (get data)
-   POST <{{url-backend}}/api/user> (edit data)
-   PUT <{{url-backend}}/api/user/password> (change password)-STILL NOT WORKING
-   POST <{{url-backend}}/api/user/logout> (logout)

### Manage Bab

-   GET <{{url-backend}}/api/user/chapters> (get all data)
-   GET <{{url-backend}}/api/user/chapter/{id}> (get data)

### Manage Kategori

-   GET <{{url-backend}}/api/user/categories> (get all data)
-   GET <{{url-backend}}/api/user/category/{id}> (get data)

### Manage Materi

-   GET <{{url-backend}}/api/user/materials> (get all data)
-   GET <{{url-backend}}/api/user/material/{id}> (get data)

### Manage Sub Materi

-   GET <{{url-backend}}/api/user/submateri> (get all data)
-   GET <{{url-backend}}/api/user/submateri/{id}> (get data)

### Manage Kamus

-   GET <{{url-backend}}/api/user/dictionaries> (get all data)
-   GET <{{url-backend}}/api/user/dictionary/{id}> (get data)

## Documentation

## ADMIN WEBSITE

### Authentication

#### 1. Register

> POST `{{url-backend}}/api/admin/register`

form-data, application/json

```
nama: required|string
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

### Semester

#### 1. Create Semester

> POST `{{url-backend}}/api/semesters`

form-data, application/json

```
semester: required|integer
```

Example success Response:

```JSON
{
    "success": true,
    "message": "Semester created successfully",
    "semester": {
        "semester": "3",
        "updated_at": "2024-07-01T13:09:30.000000Z",
        "created_at": "2024-07-01T13:09:30.000000Z",
        "id": 3
    }
}
```

#### 2. Get Semester By ID

> GET `{{url-backend}}/api/semester/{id}`

Example success Response:

```JSON
{
    "status": true,
    "semester": {
        "id": 1,
        "semester": "1",
        "created_at": "2024-06-24T16:15:57.000000Z",
        "updated_at": "2024-06-24T16:15:57.000000Z"
    }
}
```

#### 3. Get All Semester

> GET `{{url-backend}}/api/semesters`

Example success Response:

```JSON
{
    "status": true,
    "message": "All semesters",
    "semester": [
        {
            "id": 1,
            "semester": "1",
            "created_at": "2024-06-24T16:15:57.000000Z",
            "updated_at": "2024-06-24T16:15:57.000000Z"
        },
        {
            "id": 2,
            "semester": "2",
            "created_at": "2024-06-24T16:16:07.000000Z",
            "updated_at": "2024-06-24T16:16:07.000000Z"
        },
        {
            "id": 3,
            "semester": "3",
            "created_at": "2024-07-01T13:09:30.000000Z",
            "updated_at": "2024-07-01T13:09:30.000000Z"
        }
    ]
}
```

#### 4. Edit Semester By ID

> POST `{{url-backend}}/api/semester/{id}`

form-data, application/json

```
semester
```

Example success Response:

```JSON
{
    "success": true,
    "message": "Semester updated successfully",
    "semester": {
        "id": 3,
        "semester": "4",
        "created_at": "2024-07-01T13:09:30.000000Z",
        "updated_at": "2024-07-01T13:10:38.000000Z"
    }
}
```

#### 5. Delete Semester By ID

> DELETE `{{url-backend}}/api/semester/{id}`

Example success Response:

```JSON
{
    "status": true,
    "message": "Semester deleted successfully"
}
```

### Bab / Chapter

#### 1. Create Bab

> POST `{{url-backend}}/api/chapters`

form-data, application/json

```
nomor_bab: required|integer
judul_bab: required|string
gambar: required|file
id_semester: required|id_semester
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
        "gambar": "https://res.cloudinary.com/dtjkuzlr2/image/upload/v1719246742/zckex4oj8rvrruge8okc.png",
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
    "status": true,
    "bab": {
        "id": 1,
        "nomor_bab": "1",
        "judul_bab": "Kajadian",
        "gambar": "https://res.cloudinary.com/dtjkuzlr2/image/upload/v1719246742/zckex4oj8rvrruge8okc.png",
        "id_semester": 1,
        "created_at": "2024-06-24T16:32:22.000000Z",
        "updated_at": "2024-06-24T16:32:22.000000Z",
        "semester": {
            "id": 1,
            "semester": "1",
            "created_at": "2024-06-24T16:15:57.000000Z",
            "updated_at": "2024-06-24T16:15:57.000000Z"
        }
    }
}
```

#### 3. Get All Bab

> GET `{{url-backend}}/api/chapters`

Example success Response:

```JSON
{
    "response": 200,
    "status": true,
    "message": "All chapters",
    "bab": [
        {
            "id": 1,
            "nomor_bab": "1",
            "judul_bab": "1",
            "gambar": "https://res.cloudinary.com/dtjkuzlr2/image/upload/v1719246742/zckex4oj8rvrruge8okc.png",
            "id_semester": 1,
            "created_at": "2024-06-08T05:05:04.000000Z",
            "updated_at": "2024-06-08T05:05:04.000000Z",
            "semester": {
                "id": 1,
                "semester": "1",
                "created_at": "2024-06-24T23:15:57.000000Z",
                "updated_at": "2024-06-24T23:15:57.000000Z"
            }
            "id": 2,
            "nomor_bab": "2",
            "judul_bab": "2",
            "gambar": "https://res.cloudinary.com/dtjkuzlr2/image/upload/v1719246742/zckex4oj8rvrruge8okc.png",
            "id_semester": 1,
            "created_at": "2024-06-08T05:05:04.000000Z",
            "updated_at": "2024-06-08T05:05:04.000000Z",
            "semester": {
                "id": 1,
                "semester": "1",
                "created_at": "2024-06-24T23:15:57.000000Z",
                "updated_at": "2024-06-24T23:15:57.000000Z"
            }
        }
    ]
}
```

#### 4. Edit Bab By ID

> POST `{{url-backend}}/api/chapter/{id}`

form-data, application/json

```
nomor_bab
judul_bab
gambar
id_semester
```

Example success Response:

```JSON
{
    "response": 200,
    "success": true,
    "message": "Chapter updated successfully.",
    "data": {
        "nomor_bab": "2",
        "judul_bab": "2",
        "gambar": "https://res.cloudinary.com/dtjkuzlr2/image/upload/v1719246742/zckex4oj8rvrruge8okc.png",
        "id_semester": "1",
        "updated_at": "2024-06-08T05:05:09.000000Z",
        "created_at": "2024-06-08T05:05:09.000000Z",
        "id": 2
    }
}
```

#### 5. Delete Bab By ID

> DELETE `{{url-backend}}/api/chapter/{id}`

Example success Response:

```JSON
{
    "response": 200,
    "success": true,
    "message": "Chapter deleted successfully.",
}
```

### Materi / Material

#### 1. Create Materi

> POST `{{url-backend}}/api/materials`

form-data, application/json

```
judul_materi: required|string
id_bab: required|id_bab
```

Example success Response:

```JSON
{
    "success": true,
    "message": "Material created successfully",
    "materi": {
        "judul_materi": "Kamus Kurik",
        "id_bab": "5",
        "updated_at": "2024-07-01T08:14:19.000000Z",
        "created_at": "2024-07-01T08:14:19.000000Z",
        "id": 17
    }
}
```

#### 2. Get Materi By ID

> GET `{{url-backend}}/api/material/{id}`

Example success Response:

```JSON
{
    "status": true,
    "materi": {
        "id": 1,
        "judul_materi": "Mambasa Capat",
        "id_bab": 1,
        "created_at": "2024-06-24T16:38:02.000000Z",
        "updated_at": "2024-06-24T16:38:02.000000Z",
        "chapter": {
            "id": 1,
            "nomor_bab": "1",
            "judul_bab": "Kajadian",
            "gambar": "https://res.cloudinary.com/dtjkuzlr2/image/upload/v1719246742/zckex4oj8rvrruge8okc.png",
            "id_semester": 1,
            "created_at": "2024-06-24T16:32:22.000000Z",
            "updated_at": "2024-06-24T16:32:22.000000Z"
        }
    }
}
```

#### 3. Get All Materi

> GET `{{url-backend}}/api/materials`

Example success Response:

```JSON
{
    "status": true,
    "message": "All Materials",
    "materi": [
        {
            "id": 1,
            "judul_materi": "Mambasa Capat",
            "id_bab": 1,
            "created_at": "2024-06-24T23:38:02.000000Z",
            "updated_at": "2024-06-24T23:38:02.000000Z",
            "chapter": {
                "id": 1,
                "nomor_bab": "1",
                "judul_bab": "Kajadian",
                "gambar": "https://res.cloudinary.com/dtjkuzlr2/image/upload/v1719246742/zckex4oj8rvrruge8okc.png",
                "id_semester": 1,
                "created_at": "2024-06-24T23:32:22.000000Z",
                "updated_at": "2024-06-24T23:32:22.000000Z"
            }
        },
        {
            "id": 2,
            "judul_materi": "Mangguna Tanda Titik (.) Hong Singkatan Aran Oloh",
            "id_bab": 1,
            "created_at": "2024-06-24T23:38:46.000000Z",
            "updated_at": "2024-06-24T23:38:46.000000Z",
            "chapter": {
                "id": 1,
                "nomor_bab": "1",
                "judul_bab": "Kajadian",
                "gambar": "https://res.cloudinary.com/dtjkuzlr2/image/upload/v1719246742/zckex4oj8rvrruge8okc.png",
                "id_semester": 1,
                "created_at": "2024-06-24T23:32:22.000000Z",
                "updated_at": "2024-06-24T23:32:22.000000Z"
            }
        }
    ]
}
```

#### 4. Edit Materi By ID

> POST `{{url-backend}}/api/material/{id}`

form-data, application/json

```
judul_materi
id_bab
```

Example success Response:

```JSON
{
    "success": true,
    "message": "Material updated successfully",
    "materi": {
        "judul_materi": "Kamus Kurik",
        "id_bab": "5",
        "updated_at": "2024-07-01T08:14:19.000000Z",
        "created_at": "2024-07-01T08:14:19.000000Z",
        "id": 17
    }
}
```

#### 5. Delete Materi By ID

> DELETE `{{url-backend}}/api/material/{id}`

Example success Response:

```JSON
{
    "response": 200,
    "success": true,
    "message": "Material deleted successfully.",
}
```

### Sub Materi

#### 1. Create Sub Materi

> POST `{{url-backend}}/api/submateri`

form-data, application/json

```
nomor_sub_materi: required|integer
judul_sub_materi: required|string
terjemahan_judul: required|string
id_materi: required|id_materi
id_kategori: required|id_kategori
```

Example success Response:

```JSON
{
    "success": true,
    "message": "SubMaterial created successfully",
    "sub_materi": {
        "nomor_sub_materi": "1",
        "judul_sub_materi": "Kamus Kurik",
        "terjemahan_judul": "Kamus Kecil",
        "id_materi": "17",
        "id_kategori": "18",
        "updated_at": "2024-07-01T08:20:29.000000Z",
        "created_at": "2024-07-01T08:20:29.000000Z",
        "id": 55
    }
}
```

#### 2. Get Sub Materi By ID

> GET `{{url-backend}}/api/submateri/{id}`

Example success Response:

```JSON
{
    "status": true,
    "sub_materi": {
        "id": 1,
        "nomor_sub_materi": "1",
        "judul_sub_materi": "Pasar Kahayan Lepah Bakeho",
        "terjemahan_judul": "Pasar Kahayan Habis Terbakar",
        "id_materi": 1,
        "id_kategori": 1,
        "created_at": "2024-06-24T16:44:39.000000Z",
        "updated_at": "2024-06-26T13:41:03.000000Z",
        "material": {
            "id": 1,
            "judul_materi": "Mambasa Capat",
            "id_bab": 1,
            "created_at": "2024-06-24T16:38:02.000000Z",
            "updated_at": "2024-06-24T16:38:02.000000Z"
        },
        "category": {
            "id": 1,
            "nama_kategori": "Teks",
            "created_at": "2024-06-24T16:42:35.000000Z",
            "updated_at": "2024-06-24T16:42:35.000000Z"
        }
    }
}
```

#### 3. Get All Sub Materi

> GET `{{url-backend}}/api/submateri`

Example success Response:

```JSON
{
    "status": true,
    "message": "All SubMaterials",
    "sub_materi": [
        {
            "id": 1,
            "nomor_sub_materi": "1",
            "judul_sub_materi": "Pasar Kahayan Lepah Bakeho",
            "terjemahan_judul": "Pasar Kahayan Habis Terbakar",
            "id_materi": 1,
            "id_kategori": 1,
            "created_at": "2024-06-24T16:44:39.000000Z",
            "updated_at": "2024-06-26T13:41:03.000000Z",
            "material": {
                "id": 1,
                "judul_materi": "Mambasa Capat",
                "id_bab": 1,
                "created_at": "2024-06-24T16:38:02.000000Z",
                "updated_at": "2024-06-24T16:38:02.000000Z"
            },
            "category": {
                "id": 1,
                "nama_kategori": "Teks",
                "created_at": "2024-06-24T16:42:35.000000Z",
                "updated_at": "2024-06-24T16:42:35.000000Z"
            }
        },
        {
            "id": 2,
            "nomor_sub_materi": "2",
            "judul_sub_materi": "Pasar Kahayan Lepah Bakeho",
            "terjemahan_judul": "Pasar Kahayan Habis Terbakar",
            "id_materi": 1,
            "id_kategori": 1,
            "created_at": "2024-06-24T16:44:48.000000Z",
            "updated_at": "2024-06-24T16:55:06.000000Z",
            "material": {
                "id": 1,
                "judul_materi": "Mambasa Capat",
                "id_bab": 1,
                "created_at": "2024-06-24T16:38:02.000000Z",
                "updated_at": "2024-06-24T16:38:02.000000Z"
            },
            "category": {
                "id": 1,
                "nama_kategori": "Teks",
                "created_at": "2024-06-24T16:42:35.000000Z",
                "updated_at": "2024-06-24T16:42:35.000000Z"
            }
        }
    ]
}
```

#### 4. Edit Sub Materi By ID

> POST `{{url-backend}}/api/submateri/{id}`

form-data, application/json

```
nomor_sub_materi
judul_sub_materi
terjemahan_judul
id_materi
id_kategori
```

Example success Response:

```JSON
{
    "success": true,
    "message": "SubMateri updated successfully",
    "sub_materi": {
        "nomor_sub_materi": "1",
        "judul_sub_materi": "Kamus Kurik",
        "terjemahan_judul": "Kamus Kecil",
        "id_materi": "17",
        "id_kategori": "18",
        "updated_at": "2024-07-01T08:20:29.000000Z",
        "created_at": "2024-07-01T08:20:29.000000Z",
        "id": 55
    }
}
```

#### 5. Delete Sub Materi By ID

> DELETE `{{url-backend}}/api/submateri/{id}`

Example success Response:

```JSON
{
    "response": 200,
    "success": true,
    "message": "SubMateri deleted successfully.",
}
```

### Kategori

#### 1. Create Kategori

> POST `{{url-backend}}/api/categories`

form-data, application/json

```
nama_kategori: required|string
```

Example success Response:

```JSON
{
    "success": true,
    "message": "Category created successfully",
    "kategori": {
        "nama_kategori": "Gambar",
        "updated_at": "2024-07-01T08:20:29.000000Z",
        "created_at": "2024-07-01T08:20:29.000000Z",
        "id": 1
    }
}
```

#### 2. Get Kategori By ID

> GET `{{url-backend}}/api/category/{id}`

Example success Response:

```JSON
{
    "status": true,
    "kategori": {
        "id": 1,
        "nama_kategori": "Teks",
        "created_at": "2024-06-24T16:42:35.000000Z",
        "updated_at": "2024-06-24T16:42:35.000000Z"
    }
}
```

#### 3. Get All Kategori

> GET `{{url-backend}}/api/categories`

Example success Response:

```JSON
{
    "status": true,
    "message": "All Categories",
    "kategori": [
        {
            "id": 1,
            "nama_kategori": "Teks",
            "created_at": "2024-06-24T16:42:35.000000Z",
            "updated_at": "2024-06-24T16:42:35.000000Z"
        },
        {
            "id": 2,
            "nama_kategori": "Kamus",
            "created_at": "2024-06-24T16:42:41.000000Z",
            "updated_at": "2024-06-26T13:43:15.000000Z"
        },
    ]
}
```

#### 4. Edit Kategori By ID

> POST `{{url-backend}}/api/category/{id}`

form-data, application/json

```
nama_kategori
```

Example success Response:

```JSON
{
    "success": true,
    "message": "Category updated successfully",
    "kategori": {
        "nama_kategori": "Gambar Berdialog",
        "updated_at": "2024-07-01T08:20:29.000000Z",
        "created_at": "2024-07-01T08:20:29.000000Z",
        "id": 1
    }
}
```

#### 5. Delete Kategori By ID

> DELETE `{{url-backend}}/api/category/{id}`

Example success Response:

```JSON
{
    "response": 200,
    "success": true,
    "message": "Category deleted successfully.",
}
```

### Text Materi

#### 1. Create Text Materi

> POST `{{url-backend}}/api/texts`

form-data, application/json

```
materi: required|string
terjemahan: required|string
audio: required|file
id_sub_materi: required|id_sub_materi
id_kategori: required|id_kategori
```

Example success Response:

```JSON
{
    "success": true,
    "message": "Text Material created successfully",
    "teks_materi": {
        "materi": "\"Mengerjakan suatu pekerjaan yang sukar sekali\"",
        "terjemahan": "\"Mengerjakan suatu pekerjaan yang sukar sekali\"",
        "audio": "https://res.cloudinary.com/dtjkuzlr2/video/upload/v1719824494/r5mnreftkcd2kmd4nach.mp3",
        "id_sub_materi": "54",
        "id_kategori": "17",
        "updated_at": "2024-07-01T09:01:35.000000Z",
        "created_at": "2024-07-01T09:01:35.000000Z",
        "id": 334
  }
}
```

#### 2. Get Text Materi By ID

> GET `{{url-backend}}/api/text/{id}`

Example success Response:

```JSON
{
    "status": true,
    "teks_materi": {
        "id": 17,
        "materi": "Bu Guru",
        "terjemahan": "Bu Guru",
        "audio": "https://res.cloudinary.com/dtjkuzlr2/video/upload/v1719725304/tqwj1ptrkdqodgkkmnvf.mp3",
        "id_sub_materi": 6,
        "id_kategori": 5,
        "created_at": "2024-06-30T05:28:25.000000Z",
        "updated_at": "2024-06-30T05:28:25.000000Z",
        "category": {
            "id": 5,
            "nama_kategori": "Aktor",
            "created_at": "2024-06-30T05:07:58.000000Z",
            "updated_at": "2024-06-30T05:07:58.000000Z"
        },
        "sub_material": {
            "id": 6,
            "nomor_sub_materi": "1",
            "judul_sub_materi": "Mangguna Tanda Titik (.) Hong Singkatan Aran Oloh",
            "id_materi": 2,
            "id_kategori": 4,
            "created_at": "2024-06-30T03:07:22.000000Z",
            "updated_at": "2024-06-30T03:50:26.000000Z"
        }
    }
}
```

#### 3. Get All Text Materi

> GET `{{url-backend}}/api/texts`

Example success Response:

```JSON
{
    "status": true,
    "message": "All Text Materials",
    "teks_materi": [
        {
            "id": 1,
            "materi": "Pasar Kahayan je ingansene kilau pasar je pangkahai kadue hong Palangkaraya lepah bakeho. Paling dia 200 blok toko into pasar Jalan Tjilik Riwut km 1,5 te lepah bakeho, sakitar pukul 03.15 WIB, Salasa tampalawei 26 Juli 2005 male.\n  Aloh pire-pire mobil pambelep kakeho bara Pemda, Pemko, Bandara Tjilik Riwut tuntang Brimob uras impadumah, tapi apoi olih imbelep sakitar 3 jam katahie. Saratusan toko je imangun bara kayu jari lepah bakeho.",
            "terjemahan": "Pasar Kahayan yang dikenal seperti pasar terbesar kedua di Palangkaraya habis terbakar. Sebanyak 200 blok toko di pasar Jalan Tjilik Riwut km 1,5 itu habis terbakar, sekitar pukul 03.15 WIB, Selasa dini hari 26 Juli 2005 kemarin.\n  Walaupun   beberapa   mobil   pemadam kebakaran dari Pemda, Pemko, Bandara Tjilik Riwut dan Brimob semuanya didatangkan, tetapi api bisa dipadamkan sekitar 3 jam lamanya. Ratusan toko yang dibangun dari kayu sudah habis terbakar.",
            "audio": "https://res.cloudinary.com/dtjkuzlr2/video/upload/v1719389131/dl0mld4s7tm8al1ov3lb.mp3",
            "id_sub_materi": 1,
            "id_kategori": 1,
            "created_at": "2024-06-24T16:52:01.000000Z",
            "updated_at": "2024-06-26T08:05:32.000000Z",
            "category": {
                "id": 1,
                "nama_kategori": "Teks",
                "created_at": "2024-06-24T16:42:35.000000Z",
                "updated_at": "2024-06-24T16:42:35.000000Z"
            },
            "sub_material": {
                "id": 1,
                "nomor_sub_materi": "1",
                "judul_sub_materi": "Pasar Kahayan Lepah Bakeho",
                "id_materi": 1,
                "id_kategori": 1,
                "created_at": "2024-06-24T16:44:39.000000Z",
                "updated_at": "2024-06-26T13:41:03.000000Z"
            }
        },
        {
            "id": 2,
            "materi": "Kabar ja bahasil ingumpul Kalteng Pos,  kambuar asep impahayak tapitik barah apoi nampara bara ije ruko je melai bentok pasar. Mite kalote, ije biti oloh je metoh mahalau mansanan akan oloh je hasondau dengae.\n   Mandino laporan te oloh je melai hong pasar, capat manuju eka te. Ternyata, toto haliai apoi je solake kurik manjari hai tuntang palus miar mangeho hong Pasar Kahayan.    \n     Mite ampin keadaan te, oloh are capat malapor akan pihak bawajib tuntang pambelep kakeho. Pire-pire katika limbah te, patugas kapolisian bara Polresta tuntang Polsekta muhon ka lapangan uka manjaga warga je panik.",
            "terjemahan": "Kabar yang berhasil dikumpulkan Kalteng Pos, kepulan asap diikuti percikan bara api dimulai dari satu ruko yang tinggal di tengah pasar. Melihat hal itu, seseorang yang lewat memberitahukan untuk orang yang bertemu dengannya.\n  Mendapatkan laporan tersebut orang yang tinggal di pasar, cepat menuju ke tempat tersebut. Ternyata, memang benar api yang semula kecil menjadi besar dan menjalar membakar di Pasar Kahayan.\n    Melihat keadaan tersebut, orang banyak cepat melapor untuk pihak berwajib dan pemadam kebakaran. Beberapa saat setelah itu, petugas kepolisian dari Polresta dan Polsekta turun ke lapangan untuk menjaga warga yang panik.",
            "audio": "https://res.cloudinary.com/dtjkuzlr2/video/upload/v1719389225/unhjr6vsj5ctkd5vtovs.mp3",
            "id_sub_materi": 2,
            "id_kategori": 1,
            "created_at": "2024-06-24T16:57:13.000000Z",
            "updated_at": "2024-06-26T08:07:06.000000Z",
            "category": {
                "id": 1,
                "nama_kategori": "Teks",
                "created_at": "2024-06-24T16:42:35.000000Z",
                "updated_at": "2024-06-24T16:42:35.000000Z"
            },
            "sub_material": {
                "id": 2,
                "nomor_sub_materi": "2",
                "judul_sub_materi": "Pasar Kahayan Lepah Bakeho",
                "id_materi": 1,
                "id_kategori": 1,
                "created_at": "2024-06-24T16:44:48.000000Z",
                "updated_at": "2024-06-24T16:55:06.000000Z"
            }
        },
    ]
}
```

#### 4. Edit Text Materi By ID

> POST `{{url-backend}}/api/text/{id}`

form-data, application/json

```
materi
terjemahan
audio
id_sub_materi
id_kategori
```

Example success Response:

```JSON
{
    "success": true,
    "message": "Text Material updated successfully",
    "teks_materi": {
        "id": 17,
        "materi": "Bu Guru",
        "terjemahan": "Bu Guru",
        "audio": "https://res.cloudinary.com/dtjkuzlr2/video/upload/v1719725304/tqwj1ptrkdqodgkkmnvf.mp3",
        "id_sub_materi": 6,
        "id_kategori": 5,
        "created_at": "2024-06-30T05:28:25.000000Z",
        "updated_at": "2024-06-30T05:28:25.000000Z",
    }
}
```

#### 5. Delete Text Materi By ID

> DELETE `{{url-backend}}/api/text/{id}`

Example success Response:

```JSON
{
    "response": 200,
    "success": true,
    "message": "Text Material deleted successfully.",
}
```

### Image Materi

#### 1. Create Image Materi

> POST `{{url-backend}}/api/imagemateri`

form-data, application/json

```
gambar: required|file
id_sub_materi: required|id_sub_materi
id_kategori: required|id_kategori
```

Example success Response:

```JSON
{
    "success": true,
    "message": "ImageMaterial created successfully",
    "gambar": {
        "gambar": "https://res.cloudinary.com/dtjkuzlr2/image/upload/v1719834636/mrn9cmhw81kd3syf8tsx.png",
        "id_sub_materi": "30",
        "id_kategori": "11",
        "updated_at": "2024-07-01T11:50:37.000000Z",
        "created_at": "2024-07-01T11:50:37.000000Z",
        "id": 6
  }
}
```

#### 2. Get Image Materi By ID

> GET `{{url-backend}}/api/imagemateri/{id}`

Example success Response:

```JSON
{
    "status": true,
    "gambar": {
        "id": 6,
        "gambar": "https://res.cloudinary.com/dtjkuzlr2/image/upload/v1719834672/obp0nnq87uvykvlscjor.png",
        "id_sub_materi": 30,
        "id_kategori": 11,
        "created_at": "2024-07-01T11:50:37.000000Z",
        "updated_at": "2024-07-01T11:51:13.000000Z",
        "category": {
            "id": 11,
            "nama_kategori": "Terjemahan Dialog Bergambar",
            "created_at": "2024-06-30T12:26:11.000000Z",
            "updated_at": "2024-06-30T12:26:11.000000Z"
        },
        "sub_material": {
            "id": 30,
            "nomor_sub_materi": "2",
            "judul_sub_materi": "Manyampai Peteh Mahalau Telepon",
            "id_materi": 7,
            "id_kategori": 7,
            "created_at": "2024-06-30T11:26:40.000000Z",
            "updated_at": "2024-06-30T11:26:40.000000Z"
        }
    }
}
```

#### 3. Get All Image Materi

> GET `{{url-backend}}/api/imagemateri`

Example success Response:

```JSON
{
    "status": true,
    "message": "All ImageMaterials",
    "gambar": [
        {
            "id": 1,
            "gambar": "https://res.cloudinary.com/dtjkuzlr2/image/upload/v1719247576/bduwtdxbpkn2dba2n9jt.png",
            "id_sub_materi": 1,
            "id_kategori": 2,
            "created_at": "2024-06-24T16:45:28.000000Z",
            "updated_at": "2024-06-24T16:46:17.000000Z",
            "category": {
                "id": 2,
                "nama_kategori": "Kamus",
                "created_at": "2024-06-24T16:42:41.000000Z",
                "updated_at": "2024-06-26T13:43:15.000000Z"
            },
            "sub_material": {
                "id": 1,
                "nomor_sub_materi": "1",
                "judul_sub_materi": "Pasar Kahayan Lepah Bakeho",
                "id_materi": 1,
                "id_kategori": 1,
                "created_at": "2024-06-24T16:44:39.000000Z",
                "updated_at": "2024-06-26T13:41:03.000000Z"
            }
        },
        {
            "id": 2,
            "gambar": "https://res.cloudinary.com/dtjkuzlr2/image/upload/v1719750386/st4cxnvzy94kh6ez9cpx.png",
            "id_sub_materi": 29,
            "id_kategori": 7,
            "created_at": "2024-06-30T12:26:28.000000Z",
            "updated_at": "2024-06-30T12:26:28.000000Z",
            "category": {
                "id": 7,
                "nama_kategori": "Dialog Bergambar",
                "created_at": "2024-06-30T06:51:20.000000Z",
                "updated_at": "2024-06-30T06:51:20.000000Z"
            },
            "sub_material": {
                "id": 29,
                "nomor_sub_materi": "1",
                "judul_sub_materi": "Manyampai Peteh Mahalau Telepon",
                "id_materi": 7,
                "id_kategori": 7,
                "created_at": "2024-06-30T11:26:36.000000Z",
                "updated_at": "2024-06-30T11:26:36.000000Z"
            }
        }
    ]
}
```

#### 4. Edit Image Materi By ID

> POST `{{url-backend}}/api/imagemateri/{id}`

form-data, application/json

```
gambar
id_sub_materi
id_kategori
```

Example success Response:

```JSON
{
    "success": true,
    "message": "ImageMaterial updated successfully",
    "gambar": {
        "id": 6,
        "gambar": "https://res.cloudinary.com/dtjkuzlr2/image/upload/v1719834672/obp0nnq87uvykvlscjor.png",
        "id_sub_materi": "30",
        "id_kategori": "11",
        "created_at": "2024-07-01T11:50:37.000000Z",
        "updated_at": "2024-07-01T11:51:13.000000Z"
  }
}
```

#### 5. Delete Image Materi By ID

> DELETE `{{url-backend}}/api/imagemateri/{id}`

Example success Response:

```JSON
{
    "response": 200,
    "status": true,
    "message": "ImageMaterial deleted successfully"
}
```

### Student

#### 1. Create Student

> POST `{{url-backend}}/api/students`

form-data, application/json

```
nama: required|string
nisn: required|unique|string
username: required|unique
password: required
id_semester: required|id_semester
```

Example success Response:

```JSON
{
    "success": true,
    "message": "Student created successfully",
    "data": {
        "nama": "admin2",
        "nisn": "654321",
        "username": "admin21",
        "id_semester": "2",
        "updated_at": "2024-06-30T23:19:15.000000Z",
        "created_at": "2024-06-30T23:19:15.000000Z",
        "id": 2
    }
}
```

#### 2. Get Student By ID

> GET `{{url-backend}}/api/student/{id}`

Example success Response:

```JSON
{
    "status": true,
    "data": {
        "id": 2,
        "nama": "admin2",
        "nisn": "654321",
        "username": "admin21",
        "id_semester": 2,
        "created_at": "2024-06-30T23:19:15.000000Z",
        "updated_at": "2024-06-30T23:19:15.000000Z",
        "semester": {
            "id": 2,
            "semester": "2",
            "created_at": "2024-06-24T16:16:07.000000Z",
            "updated_at": "2024-06-24T16:16:07.000000Z"
        }
    }
}
```

#### 3. Get All Student

> GET `{{url-backend}}/api/students`

Example success Response:

```JSON
{
    "status": true,
    "message": "All students",
    "data": [
        {
            "id": 1,
            "nama": "admin",
            "nisn": "123456",
            "username": "admin12",
            "id_semester": 1,
            "created_at": "2024-06-24T16:16:57.000000Z",
            "updated_at": "2024-06-24T16:16:57.000000Z",
            "semester": {
                "id": 1,
                "semester": "1",
                "created_at": "2024-06-24T16:15:57.000000Z",
                "updated_at": "2024-06-24T16:15:57.000000Z"
            }
        },
        {
            "id": 2,
            "nama": "admin2",
            "nisn": "654321",
            "username": "admin21",
            "id_semester": 2,
            "created_at": "2024-06-30T23:19:15.000000Z",
            "updated_at": "2024-06-30T23:19:15.000000Z",
            "semester": {
                "id": 2,
                "semester": "2",
                "created_at": "2024-06-24T16:16:07.000000Z",
                "updated_at": "2024-06-24T16:16:07.000000Z"
            }
        }
    ]
}
```

#### 4. Edit Student By ID

> POST `{{url-backend}}/api/student/{id}`

form-data, application/json

```
nama
nisn
username
password
id_semester
```

Example success Response:

```JSON
{
    "success": true,
    "message": "Student updated successfully",
    "data": {
        "nama": "admin2",
        "nisn": "654321",
        "username": "admin21",
        "id_semester": "2",
        "updated_at": "2024-06-30T23:19:15.000000Z",
        "created_at": "2024-06-30T23:19:15.000000Z",
        "id": 2
    }
}
```

#### 5. Delete Student By ID

> DELETE `{{url-backend}}/api/student/{id}`

Example success Response:

```JSON
{
    "response": 200,
    "status": true,
    "message": "Student deleted successfully"
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
