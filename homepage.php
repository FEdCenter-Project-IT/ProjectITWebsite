<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
    <title>FIS</title>
</head>
<body onload="initClock()">
<nav>
  
  <ul>
    <li>

   <li>Hello, <b>Raffy</b><br> RAV(2023-32)</li>
  </ul>
  <img src="img/zoomDP.jpg" class="user_pic" onclick="toggleMenu()">

  <div class="sub-menu-wrap" id="subMenu">
    <div class="sub-menu">
      <div class="user-info">
        <img src="img/zoomDP.jpg">
        <h2>Raffy L. Veloria</h2>
      </div>
      <hr>

      <a href="" class="sub-menu-link">
      <i class="fa fa-user"></i>
        <p>Edit Profile</p>
        <span>></span>
      </a>
      <a href="" class="sub-menu-link">
      <i class="fa fa-gear"></i>
        <p>Setting & Privacy</p>
        <span>></span>
      </a>
      <a href="" class="sub-menu-link">
      <i class="fa-solid fa-circle-question"></i>
        <p>Help & Support</p>
        <span>></span>
      </a>
      <a href="" class="sub-menu-link">
      <i class="fa-solid fa-right-from-bracket"></i>
        <p>Logout</p>
        
      </a>
    </div>
  </div>

</nav>
<img src="img/FedCenter_Logo-removebg-preview.png" class="logo" >
<img src="img/FedCenter_Wolf-removebg-preview.png" class="bear">

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

<main>
        <section class="header">
            <div class="items-controller">
                <h5>Show</h5>
                <select name="" id="itemperpage">
                <option value="04">04</option>
                    <option value="08" selected>08</option>
                    <option value="15">15</option>
                </select>
                <h5>Per Page</h5>
            </div>
            <div class="search">
                <h5>Search</h5>
                
                <input type="text" id="search" onkeyup="searchFunction()" placeholder="Search...">
            </div>
        </section>
        <section class="field">
            <table class="Table_User" id="searchTable">
                <thead>
                     <tr class="Usern_inf">
                
                      <th class="Get_info">NO</th>
                      <th class="Get_info">DATE</th>
                      <th class="Get_info">IN</th>
                      <th class="Get_info">OUT</th>
                      <th class="Get_info">HOURS</th>
                      <th class="Get_info">MINUTES</th>
                      <th class="Get_info">SPECIAL EVENT</th>
                      
 
                    </tr>
                  </thead>
                  <!--Sample data-->
                  <tbody>
                     <tr class="Usern_inf">
                      
                        <td> 01</td>
                        <td>March 28,2023</td>
                        <td>8:00AM</td>
                        <td>5:00PM</td>
                        <td>8</td>
                        <td>0</td>
                        <td>Typing Test</td>
           
                    </tr>
                     
                   
                  </tbody>
            </table>
            <div class="Searchbar" id="noResultsMessage" style="display:none; text-align: center; font-size: 30px; font-weight: 600;">
      No search results found.
    </div>
            <ul class="pagination">
  <li class="page-item "><a class="page-link" href="#">Previous</a></li>
  <li class="page-item active"><a class="page-link" href="#">1</a></li>
  <li class="page-item "><a class="page-link" href="#">2</a></li>
  <li class="page-item"><a class="page-link" href="#">3</a></li>
  <li class="page-item"><a class="page-link" href="#">Next</a></li>
</ul>
        </section>
    </main>


    <!--Profile Intern-->
    <script>
let subMenu = document.getElementById("subMenu");

function toggleMenu() {
  subMenu.classList.toggle("open-menu");
}

 </script>

<!--Search-->
<script>
      function searchFunction() {
        // Declare variables
        var input, filter, table, tr, td, i, j, txtValue, noResultsMessage;
        input = document.getElementById('search');
        filter = input.value.toUpperCase();
        table = document.getElementById('searchTable');
        tr = table.getElementsByTagName('tr');
        noResultsMessage = document.getElementById('noResultsMessage');

        // Loop through all table rows, and hide those that don't match the search query
        var found = false;
        for (i = 0; i < tr.length; i++) {
          for (j = 0; j < tr[i].cells.length; j++) {
            td = tr[i].getElementsByTagName('td')[j];
            if (td) {
              txtValue = td.textContent || td.innerText;
              if (txtValue.toUpperCase().indexOf(filter) > -1) {
                tr[i].style.display = '';
                found = true;
                break;
              } else {
                tr[i].style.display = 'none';
              }
            }
          }
        }

        // Show "no results found" message if search query does not match any rows
        if (!found) {
          noResultsMessage.style.display = '';
        } else {
          noResultsMessage.style.display = 'none';
        }
      }
      
    </script>


<!--Intern CLock-->
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


