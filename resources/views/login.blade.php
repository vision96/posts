<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Form</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.rtl.min.css" integrity="sha384-mUkCBeyHPdg0tqB6JDd+65Gpw5h/l8DKcCTV2D2UpaMMFd7Jo8A+mDAosaWgFBPl" crossorigin="anonymous">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>

<style>
.navbar-light .navbar-brand{
    color:white;
}
.btn-outline-success{
    color:white;
border-color:white;
}
.me-auto {
    margin-left: auto!important;
    margin-right:0!important;
}
.form-control{
    width:300px;
}
body{
background-color:#dcdcdc;
}
.card {
    margin-left: 18%;      
    margin-right: 18%;
    margin-top: 5%;
    width: auto;
    height:auto;
}
h5{
   color:#A9A9A9;
   font-weight: normal;
}
ul.b {
  list-style-position: inside;
  color:black;
}

li a{
    text-decoration:none!important;
}
.me-3 {
    margin-right: 0!important;
    background-color: #b5321d;
}
.me-0{
    background-color:#00008B;
}
#exampleFormControlInput1{
width:100%;
text-align:right;
margin-bottom:5%;
}
#exampleFormControlInput2{
width:100%;
text-align:right;
}

</style>
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">اي فاس لانسر</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
      
        <li class="nav-item">
          <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">عرض المشاريع</a>
        </li>
      </ul>
      <form class="d-flex">
        <input class="form-control me-2" type="search" placeholder="بحث" aria-label="Search">
        <button class="btn btn-outline-success" type="submit">بحث</button>
      </form>
    </div>
  </div>
</nav>

<div class="card">
  <div class="card-body">
  <h5 class="card-title mb-4">تسجيل الدخول</h5>

  <div class="row">
  <div class="col-md-8">
    <a href="#" class="btn btn-primary me-3 p-2" style="width:48%;"> <i class="fab fa-google-plus-g"></i> باستخدام جوجل </a>
    <a href="#" class="btn btn-primary me-0 p-2" style="width:48%; float:left;"><i class="fab fa-windows"></i> باستخدام مايكروسوفت </a>
    <hr class="hr-text" data-content="او">

<form action="">
    <div class="mb-3 mt-3">
  <input type="email" class="form-control" id="exampleFormControlInput1" placeholder="البريد الالكتروني">
</div>
<div class="mb-4">
<input type="text" class="form-control" id="exampleFormControlInput2" placeholder="كلمة المرور">
</div>
<div class="checkbox mb-2">
    <label><input type="checkbox" class="mb-3">  حفظ تسجيل الدخول</label>
  </div>
  <button type="submit" style="width:20%;" class="btn btn-primary">دخول</button>
  <button type="submit" style="float:left; width:50%;" class="btn btn-danger">نسيت كلمة المرور</button>

 </form>
 </div>

 <div class="col-md-4">
 <h5> مركز المساعدة</h5>
 <ul class="b mt-4"> 
 <li><a href="#"> نسيت كلمة المرور </a></li>
 <li><a href="#"> لا امتلك حساب </a></li>
 <li><a href="#"> فقدت رمز التفعيل </a></li>
 <li><a href="#">من نحن </a></li>
 </ul>
 </div>

 </div>

 </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js" integrity="sha384-q2kxQ16AaE6UbzuKqyBE9/u/KzioAlnx2maXQHiDX9d4/zp8Ok3f+M7DPm+Ib6IU" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.min.js" integrity="sha384-pQQkAEnwaBkjpqZ8RU1fF1AKtTcHJwFl3pblpTlHXybJjHpMYo79HY3hIi4NKxyj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
</body>
</html>