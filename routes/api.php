<?php

use App\Http\Controllers\Admin\Auth\AdminDetailController;
use App\Http\Controllers\Admin\Auth\LoginController;
use App\Http\Controllers\Admin\Auth\LogoutController;
use App\Http\Controllers\Admin\Auth\RegisterController;
use App\Http\Controllers\Admin\CategoryMaterialController;
use App\Http\Controllers\Admin\ChapterController;
use App\Http\Controllers\Admin\DictionaryController;
use App\Http\Controllers\Admin\ImageMaterialController;
use App\Http\Controllers\Admin\MaterialController;
use App\Http\Controllers\Admin\SubMaterialController;
use App\Http\Controllers\Admin\SemesterController;
use App\Http\Controllers\Admin\StudentController;
use App\Http\Controllers\Admin\SubChapterController;
use App\Http\Controllers\Admin\GroupTextController;
use App\Http\Controllers\Admin\TextMaterialController;
use App\Http\Controllers\User\Auth\LoginMobileController;
use App\Http\Controllers\User\Auth\LogoutMobileController;
use App\Http\Controllers\User\Auth\UserDetailController;
use App\Http\Controllers\User\ChapterUserController;
use App\Http\Controllers\User\SubChapterUserController;
use App\Http\Controllers\User\CategoryMaterialUserController;
use App\Http\Controllers\User\MaterialUserController;
use App\Http\Controllers\User\SubMaterialUserController;
use App\Http\Controllers\User\DictionaryUserController;
use Illuminate\Support\Facades\Route;

// admin website
// -- auth --
Route::post('/admin/register', [RegisterController::class, 'createUser']);
Route::post('/admin/login', [LoginController::class, 'loginUser']);
Route::post('/admin/logout', [LogoutController::class, 'logoutUser'])->middleware('auth:sanctum');
Route::get('/admin', [AdminDetailController::class, 'getUser'])->middleware('auth:sanctum');
Route::post('/admin', [AdminDetailController::class, 'editUser'])->middleware('auth:sanctum');
Route::put('/admin/password', [AdminDetailController::class, 'changePassword'])->middleware('auth:sanctum');

// -- student --
Route::post('/students', [StudentController::class, 'createStudent']);
Route::get('/students', [StudentController::class, 'getAllStudent']);
Route::get('/student/{id}', [StudentController::class, 'getStudent']);
Route::post('/student/{id}', [StudentController::class, 'editStudent']);
Route::delete('/student/{id}', [StudentController::class, 'deleteStudent']);

// -- semester --
Route::post('/semesters', [SemesterController::class, 'createSemester']);
Route::get('/semesters', [SemesterController::class, 'getAllSemester']);
Route::get('/semester/{id}', [SemesterController::class, 'getSemester']);
Route::post('/semester/{id}', [SemesterController::class, 'editSemester']);
Route::delete('/semester/{id}', [SemesterController::class, 'deleteSemester']);

// -- bab --
Route::post('/chapters', [ChapterController::class, 'createChapter']);
Route::get('/chapters', [ChapterController::class, 'getAllChapter']);
Route::get('/chapter/{id}', [ChapterController::class, 'getChapter']);
Route::post('/chapter/{id}', [ChapterController::class, 'editChapter']);
Route::delete('/chapter/{id}', [ChapterController::class, 'deleteChapter']);

// -- sub bab --
// Route::post('/subbab', [SubChapterController::class, 'createSubChapter']);
// Route::get('/subbab', [SubChapterController::class, 'getAllSubChapter']);
// Route::get('/subbab/{id}', [SubChapterController::class, 'getSubChapter']);
// Route::post('/subbab/{id}', [SubChapterController::class, 'editSubChapter']);
// Route::delete('/subbab/{id}', [SubChapterController::class, 'deleteSubChapter']);

// -- materi --
Route::post('/materials', [MaterialController::class, 'createMaterial']);
Route::get('/materials', [MaterialController::class, 'getAllMaterial']);
Route::get('/material/{id}', [MaterialController::class, 'getMaterial']);
Route::post('/material/{id}', [MaterialController::class, 'editMaterial']);
Route::delete('/material/{id}', [MaterialController::class, 'deleteMaterial']);

// -- sub materi --
Route::post('/submateri', [SubMaterialController::class, 'createSubMaterial']);
Route::get('/submateri', [SubMaterialController::class, 'getAllSubMaterial']);
Route::get('/submateri/{id}', [SubMaterialController::class, 'getSubMaterial']);
Route::post('/submateri/{id}', [SubMaterialController::class, 'editSubMaterial']);
Route::delete('/submateri/{id}', [SubMaterialController::class, 'deleteSubMaterial']);

// -- kategori --
Route::post('/categories', [CategoryMaterialController::class, 'createCategory']);
Route::get('/categories', [CategoryMaterialController::class, 'getAllCategory']);
Route::get('/category/{id}', [CategoryMaterialController::class, 'getCategory']);
Route::post('/category/{id}', [CategoryMaterialController::class, 'editCategory']);
Route::delete('/category/{id}', [CategoryMaterialController::class, 'deleteCategory']);

// -- gambar materi --
Route::post('/imagemateri', [ImageMaterialController::class, 'createImageMaterial']);
Route::get('/imagemateri', [ImageMaterialController::class, 'getAllImageMaterial']);
Route::get('/imagemateri/{id}', [ImageMaterialController::class, 'getImageMaterial']);
Route::post('/imagemateri/{id}', [ImageMaterialController::class, 'editImageMaterial']);
Route::delete('/imagemateri/{id}', [ImageMaterialController::class, 'deleteImageMaterial']);

// -- grup teks materi --
Route::post('/grouptexts', [GroupTextController::class, 'createGroupText']);
Route::get('/grouptexts', [GroupTextController::class, 'getAllGroupText']);
Route::get('/grouptext/{id}', [GroupTextController::class, 'getGroupText']);
Route::post('/grouptext/{id}', [GroupTextController::class, 'editGroupText']);
Route::delete('/grouptext/{id}', [GroupTextController::class, 'deleteGroupText']);

// -- teks materi --
Route::post('/texts', [TextMaterialController::class, 'createTextMaterial']);
Route::get('/texts', [TextMaterialController::class, 'getAllTextMaterial']);
Route::get('/text/{id}', [TextMaterialController::class, 'getTextMaterial']);
Route::post('/text/{id}', [TextMaterialController::class, 'editTextMaterial']);
Route::delete('/text/{id}', [TextMaterialController::class, 'deleteTextMaterial']);

// -- kamus --
Route::post('/dictionaries', [DictionaryController::class, 'createDictionary']);
Route::get('/dictionaries', [DictionaryController::class, 'getAllDictionary']);
Route::get('/dictionary/{id}', [DictionaryController::class, 'getDictionary']);
Route::post('/dictionary/{id}', [DictionaryController::class, 'editDictionary']);
Route::delete('/dictionary/{id}', [DictionaryController::class, 'deleteDictionary']);



// user mobile
// -- auth --
Route::post('/user/login', [LoginMobileController::class, 'loginMobile']);
Route::get('/user', [UserDetailController::class, 'getUserMobile'])->middleware('auth:sanctum');
Route::post('/user', [UserDetailController::class, 'editUserMobile'])->middleware('auth:sanctum');
Route::put('/user/password', [UserDetailController::class, 'changePassword'])->middleware('auth:sanctum');
Route::post('/user/logout', [LogoutMobileController::class, 'logoutUserMobile'])->middleware('auth:sanctum');

// -- bab --
Route::get('/user/chapters', [ChapterUserController::class, 'getAllChapter']);
Route::get('/user/chapter/{id}', [ChapterUserController::class, 'getChapter']);

// -- kategori --
Route::get('/user/categories', [CategoryMaterialUserController::class, 'getAllCategory']);
Route::get('/user/category/{id}', [CategoryMaterialUserController::class, 'getCategory']);

// -- sub bab --
// Route::get('/user/subbab', [SubChapterUserController::class, 'getAllSubChapter']);
// Route::get('/user/subbab/{id}', [SubChapterUserController::class, 'getSubChapter']);

// -- materi --
Route::get('/user/materials', [MaterialUserController::class, 'getAllMaterial']);
Route::get('/user/material/{id}', [MaterialUserController::class, 'getMaterial']);

// -- sub materi --
Route::get('/user/submateri', [SubMaterialUserController::class, 'getAllSubMaterial']);
Route::get('/user/submateri/{id}', [SubMaterialUserController::class, 'getSubMaterial']);

// -- kamus --
Route::get('/user/dictionaries', [DictionaryUserController::class, 'getAllDictionary']);
Route::get('/user/dictionary/{id}', [DictionaryUserController::class, 'getDictionary']);
