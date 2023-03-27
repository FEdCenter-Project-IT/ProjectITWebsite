<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <title>Document</title>
</head>
<body onload="initClock()">

<nav>
    <input type="checkbox" id="check">
    <label for="check">
    <i class="fas fa-bars" id="btn"></i>
    <i class="fas fa-times" id="cancel"></i>
    </label>
    <img src="img/FedCenter_Logo-removebg-preview.png" alt="">
    <ul>
        <li>
            <div class="select-menu">
        <div class="select-btn">
            <span class="sBtn-text">Select your Project</span>
            <i class="fa-solid fa-caret-down"></i>
        </div>

        <ul class="options">
            <li class="option">
              
                <span class="option-text"> <a href="">Project IT</a> </span>
            </li>
            <li class="option">
                
                <span class="option-text"> <a href="">Project 1</a> </span>
            </li>
            <li class="option">
           
                <span class="option-text"> <a href="">Project 2</a> </span>
            </li>
            <li class="option">
               
                <span class="option-text"> <a href="">Others</a></span>
            </li>
            <li class="option">
                
                <span class="option-text"> <a href="">Feedback</a> </span>
            </li>
        </ul>
    </div> </li>
        <li><a href="">Logout</a> </li>
    </ul>

</nav>

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

<!--Sample data 1-->














<!--Second Table-->

<table class="mytable2">

 

 <tr class="infoget">

 <th class="infotable2">NO</th>

 <th class="infotable2">DATE</th>

 <th class="infotable2">IN</th>

 <th class="infotable2">OUT</th>

 <th class="infotable2">HOURS </th>

 <th class="infotable2">MINUTES</th>

 <th class="infotable2">SPECIAL EVENT</th>

 </tr>

<!--Sample Data Table 2--->
  <tr>

 <td>1</td>

 <td>March 27, 2023</td>

 <td>8:00AM</td>

 <td>5:00PM</td>

 <td>5</td>

 <td>0</td>

 <td>Typing EVent</td>

 </tr>

 <tr>

 <td>2</td>

 <td>March 28, 2023</td>

 <td>8:00AM</td>

 <td>5:00PM</td>

 <td>5</td>

 <td>0</td>

 <td>WWE</td>

 </tr>

 <tr>

 <td>3</td>

 <td>March 29, 2023</td>

 <td>8:00AM</td>

 <td>5:00PM</td>

 <td>5</td>

 <td>0</td>

 <td>TeamWork</td>

 </tr>

 <tr>

 <td>4</td>

 <td>March 27, 2023</td>

 <td>8:00AM</td>

 <td>5:00PM</td>

 <td>5</td>

 <td>0</td>

 <td>FIS</td>

 </tr>
 <tr>

<td>5</td>

<td>March 30, 2023</td>

<td>8:00AM</td>

<td>5:00PM</td>

<td>5</td>

<td>0</td>

<td>Sleep</td>

</tr>
<tr>

<td>6</td>

<td>March 31, 2023</td>

<td>8:00AM</td>

<td>5:00PM</td>

<td>5</td>

<td>0</td>

<td>Eat</td>

</tr>
<tr>

<td>7</td>

<td>March 27, 2023</td>

<td>8:00AM</td>

<td>5:00PM</td>

<td>5</td>

<td>0</td>

<td>Getting info</td>

</tr>
<tr>

<td>8</td>

<td>March 27, 2023</td>

<td>8:00AM</td>

<td>5:00PM</td>

<td>5</td>

<td>0</td>

<td>Onboard</td>

</tr>

 </table>
    


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

<script>
        const optionMenu = document.querySelector(".select-menu"),
       selectBtn = optionMenu.querySelector(".select-btn"),
       options = optionMenu.querySelectorAll(".option"),
       sBtn_text = optionMenu.querySelector(".sBtn-text");

selectBtn.addEventListener("click", () => optionMenu.classList.toggle("active"));       

options.forEach(option =>{
    option.addEventListener("click", ()=>{
        let selectedOption = option.querySelector(".option-text").innerText;
        sBtn_text.innerText = selectedOption;

        optionMenu.classList.remove("active");
    });
});
    </script>

<!-- Comment ni Sam -->
</body>
</html>