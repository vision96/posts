<!DOCTYPE html>
<html lang="en-US" dir="ltr">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Calender</title>
  <style>

   body{
    font-family: arial, sans-serif;
   }

  .calender{
    margin-top: 100px;
  }
  .weeks{
    width: 550px;
    font-size: 10px;
  }
  table {
  border-collapse: collapse;
  width: 100%;
  table-layout: fixed ;
}
.active_day{
    font-size: 40px;
}
.not_active{
    font-size: 17px;
    color: #a19696;
}
th {
  border: 1px solid #dddddd;
  color:#fff;
}
td{
  border: 1px solid #a59797;
  padding: 14px;
  text-align: center;
  font-weight: 700;
}
.red{
  color:#FF0000;
}
.blue{
  color:#0000FF;
}
.today{
    background-color: #c0c0c0;
}
@media (min-width: 992px) {
   .calender{
    margin-left: 60px;
   } 
}
  </style>
 
</head>

<body>
<div class="calender">
<div class="month">
    <h1><span id="month"></span> <span id="year"></span> </h1>
</div>

<div class="weeks">
<table id="myTable">
  <tr>
  <th style="background-color:#FF0000;">Sunday</th>
  <th style="background-color:#000;">Monday</th>
  <th style="background-color:#000;">Tuesday</th>
  <th style="background-color:#000;">Wednesday</th>
  <th style="background-color:#000;">Thursday</th>
  <th style="background-color:#000;">Friday</th>
  <th style="background-color:#0000FF;">Saturday</th>
  </tr>
  <tr>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
  </tr>
  <tr>
  <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
  </tr>
  <tr>
  <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
  </tr>
  <tr>
  <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
  </tr>
  <tr>
  <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
  </tr>
</table>
</div>

<script>
const date = new Date();
document.getElementById("year").innerHTML = date.getFullYear();

const month = ["January","February","March","April","May","June","July","August","September","October","November","December"];
let name = month[date.getMonth()];
document.getElementById("month").innerHTML = name;

let day = date.getUTCDate();

//compare day with td value

 var table = document.getElementById("myTable");
 var monthh = date.getMonth()+1;
 var year = date.getFullYear();
 var daysInMonth = new Date(year, monthh, 0).getDate();

console.log(daysInMonth);
var n=0;
 for (var i = 1, row; row = table.rows[i]; i++) {
 	//iterate trough columns
   var l=1;
        for (var j = 0, col; col = row.cells[j]; j++) {

          k=l+j+(7*n);

          if (k > daysInMonth) {break;}
             
                 table.rows[i].cells[j].innerHTML = k;
                 table.rows[i].cells[j].classList.add("active_day");
                 table.rows[i].cells[6].classList.add("blue");

          if (i != 1) {
            table.rows[i].cells[0].classList.add("red");
            }

          if(col.textContent == day){
                col.classList.add("today");
              }
          
        }
           n++;
           l++;
   }

</script>

</body>
</html>