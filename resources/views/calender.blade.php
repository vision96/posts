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
//get this year  
const date = new Date();
document.getElementById("year").innerHTML = date.getFullYear();

var monthh = date.getMonth();
var year = date.getFullYear();
// get the first and last date of the month.
var FirstDay = new Date(year, monthh, 1);
var LastDay = new Date(year, monthh + 1, 0);

//get first day of this month
const daysOfWeek = ["Sunday","Monday","Tuesday","Wednesday","Thursday","Friday","Saturday"];
let dayName = daysOfWeek[FirstDay.getDay()];
console.log(dayName);

//get this month name
const month = ["January","February","March","April","May","June","July","August","September","October","November","December"];
let monthName = month[date.getMonth()];
document.getElementById("month").innerHTML = monthName;

let day = date.getUTCDate();

var table = document.getElementById("myTable");

 //get number of the days in this month
var month1 = date.getMonth()+1;
var daysInMonth = new Date(year, month1, 0).getDate();

console.log(daysInMonth);
console.log(daysOfWeek.indexOf(dayName));
dayNameIndex = daysOfWeek.indexOf(dayName);

var perviousMonth = date.getMonth();
var daysInPrevMonth = new Date(year, perviousMonth, 0).getDate();
console.log(daysInPrevMonth);


var n=0;
var start = dayNameIndex;
var a1 = 1;
var minusValue = start -1;
var a2 = daysInPrevMonth-minusValue;
 for (var i = 1, row; row = table.rows[i]; i++) {
 	//iterate trough columns
   var l=1;
        for (var j = 0, col; col = row.cells[j]; j++) {

          k=l+j+(7*n);
          k=k-start;
          if (k <= 0) {
            table.rows[i].cells[j].innerHTML = a2;
            a2++;
            table.rows[i].cells[j].classList.add("not_active");
            continue;
          }
          if (k>daysInMonth) {
            table.rows[i].cells[j].innerHTML = a1;
            a1++;
            table.rows[i].cells[j].classList.add("not_active");
            continue;
            }
                 table.rows[i].cells[j].innerHTML = k;
                 table.rows[i].cells[j].classList.add("active_day");

          if (i != 1) {
            table.rows[i].cells[0].classList.add("red");
            }
          if (i != 5) {
            table.rows[i].cells[6].classList.add("blue");
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