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
    <td class="not_active"></td>
    <td class="not_active"></td>
    <td class="active_day"></td>
    <td class="active_day"></td>
    <td class="active_day"></td>
    <td class="active_day"></td>
    <td class="active_day blue"></td>
  </tr>
  <tr>
    <td class="active_day red"></td>
    <td class="active_day"></td>
    <td class="active_day"></td>
    <td class="active_day"></td>
    <td class="active_day"></td>
    <td class="active_day"></td>
    <td class="active_day blue"></td>
  </tr>
  <tr>
    <td class="active_day red"></td>
    <td class="active_day"></td>
    <td class="active_day"></td>
    <td class="active_day"></td>
    <td class="active_day"></td>
    <td class="active_day"></td>
    <td class="active_day blue"></td>
  </tr>
  <tr>
    <td class="active_day red"></td>
    <td class="active_day"></td>
    <td class="active_day"></td>
    <td class="active_day"></td>
    <td class="active_day"></td>
    <td class="active_day"></td>
    <td class="active_day blue"></td>
  </tr>
  <tr>
    <td class="active_day red"></td>
    <td class="active_day"></td>
    <td class="active_day"></td>
    <td class="active_day"></td>
    <td class="active_day"></td>
    <td class="not_active"></td>
    <td class="not_active"></td>
  </tr>
  <!-- <tr>
    <td class="not_active">27</td>
    <td class="not_active">28</td>
    <td class="active_day">1</td>
    <td class="active_day">2</td>
    <td class="active_day">3</td>
    <td class="active_day">4</td>
    <td class="active_day blue">5</td>
  </tr>
  <tr>
    <td class="active_day red">6</td>
    <td class="active_day">7</td>
    <td class="active_day">8</td>
    <td class="active_day">9</td>
    <td class="active_day">10</td>
    <td class="active_day">11</td>
    <td class="active_day blue">12</td>
  </tr>
  <tr>
    <td class="active_day red">13</td>
    <td class="active_day">14</td>
    <td class="active_day">15</td>
    <td class="active_day">16</td>
    <td class="active_day">17</td>
    <td class="active_day">18</td>
    <td class="active_day blue">19</td>
  </tr>
  <tr>
    <td class="active_day red">20</td>
    <td class="active_day">21</td>
    <td class="active_day">22</td>
    <td class="active_day">23</td>
    <td class="active_day">24</td>
    <td class="active_day">25</td>
    <td class="active_day blue">26</td>
  </tr>
  <tr>
    <td class="active_day red">27</td>
    <td class="active_day">28</td>
    <td class="active_day">29</td>
    <td class="active_day">30</td>
    <td class="active_day">31</td>
    <td class="not_active">1</td>
    <td class="not_active">2</td>
  </tr> -->
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
//let tdContent = document.getElementsByTagName("td")[0].textContent; //first element //27

var table = document.getElementById("myTable");
 	//iterate trough rows
    for (var i = 1, row; row = table.rows[i]; i++) {
 	//iterate trough columns
        for (var j = 0, col; col = row.cells[j]; j++) {
            if(col.textContent == day){
                col.classList.add("today");
              }
           }
        }
   
 var monthh = date.getMonth()+1;
 var year = date.getFullYear();
 var daysInMonth = new Date(year, monthh, 0).getDate();

console.log(daysInMonth);

 for (var i = 1, row; row = table.rows[i]; i++) {
 	//iterate trough columns
        for (var j = 0, col; col = row.cells[j]; j++) {
            for (let k = 1; k <= daysInMonth; k++) {
                console.log(k);
                 //col.innerHTML = k;
                 table.rows[i].cells[j].innerHTML = k++;
              }
           }
        }


</script>

</body>
</html>