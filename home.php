<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
  
  
    <title>Intern Interface</title>
    
</head>

<body onload="initClock()">

    
</div>


<div class="mainlogo">
<img src="img/FedCenter_Logo-removebg-preview.png" alt="">
</div>


    
<!-- Digital Clock Start -->
<div class="datetime">
    <div class="date">
        <span id = "dayname"> Day </span>
        <span id = "month"> Month </span>
        <span id = "daynum"> 00 </span>,
        <span id = "year"> Year </span>
    </div>
    <div class="time">
        <span id = "hour"> 00 </span>:
        <span id = "minutes"> 00</span>:
        <span id = "seconds"> 00 </span>
        <span id = "period"><h4>AM</h4>  </span> 
    </div>
</div>

<button type="button" class="timein">Time in</button>
<button type="button" class="timeout">Time out</button>

<!--1st table-->
<table class="userinfo">
<tr>
<th class="info">NAME:</th>
<th class="info">FID:</th>
<th class="info">PROJECTS:</th>
<th class="info">TOTAL HOURS:</th>
<th class="info">REQUIRED HOURS:</th>
<th class="info"> REMAINING TIME:</th>
</tr>
</table>




<section class="tableuser table-bordered">
<table class="table">
<thead>
    <tr>
        <th>NO</th>
        <th>DATE</th>
        <th>IN</th>
        <th>OUT</th>
        <th>HOURS</th>
        <th>MINS</th>
        <th>SPECIAL EVENT</th>
    </tr>
</thead>



<tbody>
    <td>1</td>
    <td>March 22, 2023</td>
    <td>1:00PM</td>
    <td>6:00PM</td>
    <td>5</td>
    <td>0</td>
    <td>Typing</td>
</tbody>
</table>
</section>








<script>$(document).ready(function () {
    $('#example').DataTable();
});</script>
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>




<script type="text/javascript">
    function updateClock() {
        var now = new Date();
        var dname =  now.getDay();
            mo = now.getMonth(),
            dnum= now.getDate(),
            yr = now.getFullYear();
            hou = now.getHours();
            min = now.getMinutes();
            sec = now.getSeconds();
            pe = "AM";

            if(hou == 0){
                hou = 12;
            }

            if(hou > 12){
                hou = hou - 12;
                pe = "PM";

            }
            Number.prototype.pad = function(digits){
                for (var n= this.toString(); n.length < digits; n= 0 + n);

            }

            var months = ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov","Dec"]
            var week =["Sunday", "Monday", "Tuesday", "Wednesday", "Thursday","Friday", "Saturday"]
            var ids = ["dayname", "month","daynum", "year", "hour", "minutes", "seconds", "period"]
            var values = [week[dname], months[mo], dnum, yr, hou, min, sec, pe];
            for (var i = 0; i < ids.length; i++)
            document.getElementById(ids[i]).firstChild.nodeValue = values[i];
     }

     function initClock() {
     updateClock();
     window.setInterval("updateClock()",1);


     }



     </script>



<!-- Comment ni Sam -->

</body>
</html>
