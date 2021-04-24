# REST API Sekolah
Merupakan server yang digunakan untuk menjalankan server REST API<br>
Menggunakan Framework Laravel dalam pembuatannya<br><br>

## Installation

1. Change directory menuju project folder setelah melakukan clone. <br>
2. jalankan perintah berikut <br>
`composer install`<br>
3. kemudian jalankan perintah berikut <br>
`composer update`<br>
4. Create database terlebih dahulu di server mysql, sesuaikan penamaan dengan konfigurasi<br>
pada file .env<br>
5. Jalankan perintah berikut untuk membuat tabel di database<br>
`php artisan migrate`<br>
6. Jalankan perintah berikut untuk menjalankan server<br>
`php artisan serve --port [port]`<br>

## Usage
### **Student**
**GET** /students => get all students data as array <br>
```json
students = [{
    "id": 1,
    "name": "name",
    "age": 10
},{
    "id": 2,
    "name": "name",
    "age": 10
}]
```
**GET** /students/{id} => get one student data by id <br>
```json
student = {
    "id": 1,
    "name": "name",
    "age": 10
}
```
**POST** /students => post new student data<br>
```json
Body
"name": required
"age": not required
```
**POST** /students/{id} => update student by id<br>
```json
GET
"id": required
Body
"name": required
"age": not required
```
**DELETE** /students/{id} => delete student by id<id>
```json
GET
"id": required
```
### **Teachers**
**GET** /teachers => get all teachers data as array <br>
```json
GET
teachers = [{
    "id": 1,
    "name": "name",
    "age": 10
},{
    "id": 2,
    "name": "name",
    "age": 10
}]
```
**GET** /teachers/{id} => get one teacher data by id <br>
```json
GET
"id": required
teacher = {
    "id": 1,
    "name": "name",
    "age": 10
}
```
**POST** /teachers => post new teacher data<br>
```json
Body
"name": required
"age": not required
```
**POST** /teachers/{id} => update teacher by id<br>
```json
GET
"id": required
Body
"name": required
"age": not required
```
**DELETE** /teachers/{id} => delete teacher by id<id>
```json
GET
"id": required
```
### **Classrooms**
**GET** /classrooms => get all classrooms data as array <br>
```json
GET
classrooms = [{
    "id": 1,
    "name": "name",
    "description": "Lorem ipsum"
},{
    "id": 2,
    "name": "name",
    "description": "Lorem ipsum"
}]
```
**GET** /classrooms/{id} => get one classroom data by id <br>
```json
GET
"id": required
classroom = {
    "id": 1,
    "name": "name",
    "description": "Lorem ipsum"
}
```
**POST** /classrooms => post new classroom data<br>
```json
Body
"name": required
"description": not required
```
**POST** /classrooms/{id} => update classroom by id<br>
```json
GET
"id": required
Body
"name": required
"description": not required
```
**DELETE** /classrooms/{id} => delete classroom by id<id>
```json
GET
"id": required
```
