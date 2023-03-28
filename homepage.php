<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>FIS</title>
</head>
<body onload="initClock()">
<nav>
  <img src="img/FedCenter_Logo-removebg-preview.png" class="logo" >
  <ul>
    <li> <a href="">Task</a> </li>
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
        <span>></span>
      </a>
    </div>
  </div>

</nav>
<!--
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
    </div>
 </li>
 
        <li><a href="">Logout</a> </li>
    </ul>

</nav>
-->
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
                <input type="text" name="" id="search" placeholder="search">
            </div>
        </section>
        <section class="field">
            <table class="Table_User">
                <thead>
                     <tr class="Usern_inf">
                      <th class="Get_info">Checkbox</th>
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
                        <td><input type="checkbox"></td>
                        <td>01</td>
                        <td>March 28,2023</td>
                        <td>8:00AM</td>
                        <td>5:00PM</td>
                        <td>8</td>
                        <td>0</td>
                        <td>Typing Test</td>
           
                    </tr>
                     <tr class="Usern_inf">
                        <td><input type="checkbox"></td>
                        <td>02</td>
                        <td>March 28,2023</td>
                        <td>8:00AM</td>
                        <td>5:00PM</td>
                        <td>8</td>
                        <td>0</td>
                        <td>Typing Test</td>
                        
                    </tr>
                     <tr class="Usern_inf">
                        <td><input type="checkbox"></td>
                        <td>03</td>
                        <td>March 28,2023</td>
                        <td>8:00AM</td>
                        <td>5:00PM</td>
                        <td>8</td>
                        <td>0</td>
                        <td>Typing Test</td>
                        
                    </tr>
                     <tr class="Usern_inf">
                        <td><input type="checkbox"></td>
                        <td>04</td>
                        <td>March 28,2023</td>
                        <td>8:00AM</td>
                        <td>5:00PM</td>
                        <td>8</td>
                        <td>0</td>
                        <td>Typing Test</td>
                        
                    </tr>
                     <tr class="Usern_inf">
                        <td><input type="checkbox"></td>
                        <td>05</td>
                        <td>March 28,2023</td>
                        <td>8:00AM</td>
                        <td>5:00PM</td>
                        <td>8</td>
                        <td>0</td>
                        <td>Typing Test</td>
                        
                    </tr>
                     <tr class="Usern_inf">
                        <td><input type="checkbox"></td>
                        <td>06</td>
                        <td>March 28,2023</td>
                        <td>8:00AM</td>
                        <td>5:00PM</td>
                        <td>8</td>
                        <td>0</td>
                        <td>WWE</td>
                        
                    </tr>
                     <tr class="Usern_inf">
                        <td><input type="checkbox"></td>
                        <td>07</td>
                        <td>March 28,2023</td>
                        <td>8:00AM</td>
                        <td>5:00PM</td>
                        <td>8</td>
                        <td>0</td>
                        <td>Typing Test</td>
                    </tr>
                     <tr class="Usern_inf">
                        <td><input type="checkbox"></td>
                        <td>08</td>
                        <td>March 28,2023</td>
                        <td>8:00AM</td>
                        <td>5:00PM</td>
                        <td>8</td>
                        <td>0</td>
                        <td>Typing Test</td>
                        
                    </tr>
                     <tr class="Usern_inf">
                        <td><input type="checkbox"></td>
                        <td>09</td>
                        <td>March 28,2023</td>
                        <td>8:00AM</td>
                        <td>5:00PM</td>
                        <td>8</td>
                        <td>0</td>
                        <td>Typing Test</td>
                        
                    </tr>
                     <tr class="Usern_inf">
                        <td><input type="checkbox"></td>
                        <td>10</td>
                        <td>March 28,2023</td>
                        <td>8:00AM</td>
                        <td>5:00PM</td>
                        <td>8</td>
                        <td>0</td>
                        <td>Typing Test</td>
                        
                    </tr>
                     <tr class="Usern_inf">
                        <td><input type="checkbox"></td>
                        <td>11</td>
                        <td>March 28,2023</td>
                        <td>8:00AM</td>
                        <td>5:00PM</td>
                        <td>8</td>
                        <td>0</td>
                        <td>Typing Test</td>
                        
                    </tr>
                     <tr class="Usern_inf">
                        <td><input type="checkbox"></td>
                        <td>12</td>
                        <td>March 28,2023</td>
                        <td>8:00AM</td>
                        <td>5:00PM</td>
                        <td>8</td>
                        <td>0</td>
                        <td>Typing Test</td>
                        
                    </tr>
                     <tr class="Usern_inf">
                        <td><input type="checkbox"></td>
                        <td>13</td>
                        <td>March 28,2023</td>
                        <td>8:00AM</td>
                        <td>5:00PM</td>
                        <td>8</td>
                        <td>0</td>
                        <td>Typing Test</td>
                        
                    </tr>
                     <tr class="Usern_inf">
                        <td><input type="checkbox"></td>
                        <td>14</td>
                        <td>March 28,2023</td>
                        <td>8:00AM</td>
                        <td>5:00PM</td>
                        <td>8</td>
                        <td>0</td>
                        <td>Typing Test</td>
                        
                    </tr>
                     <tr class="Usern_inf">
                        <td><input type="checkbox"></td>
                        <td>15</td>
                        <td>March 28,2023</td>
                        <td>8:00AM</td>
                        <td>5:00PM</td>
                        <td>8</td>
                        <td>0</td>
                        <td>Typing Test</td>
                        
                    </tr>
                  </tbody>
            </table>
            <div class="bottom-field">
                <ul class="pagination">
                  <li class="prev"><a href="#" id="prev">&#139;</a></li>
                    <!-- page number here -->
                  <li class="next"><a href="#" id="next">&#155;</a></li>
                </ul>
            </div>
        </section>
    </main>

    <!--Profile Intern-->
    <script>
let subMenu = document.getElementById("subMenu");

function toggleMenu() {
  subMenu.classList.toggle("open-menu");
}

</script>
   



<!--For Paganation -->
<script>
  	var tbody = document.querySelector("tbody");
		var pageUl = document.querySelector(".pagination");
		var itemShow = document.querySelector("#itemperpage");
		var tr = tbody.querySelectorAll("tr");
		var emptyBox = [];
		var index = 1;
		var itemPerPage = 8;

		for(let i=0; i<tr.length; i++){ emptyBox.push(tr[i]);}

		itemShow.onchange = giveTrPerPage;
		function giveTrPerPage(){
			itemPerPage = Number(this.value);
			// console.log(itemPerPage);
			displayPage(itemPerPage);
			pageGenerator(itemPerPage);
			getpagElement(itemPerPage);
		}

		function displayPage(limit){
			tbody.innerHTML = '';
			for(let i=0; i<limit; i++){
				tbody.appendChild(emptyBox[i]);
			}
			const  pageNum = pageUl.querySelectorAll('.list');
			pageNum.forEach(n => n.remove());
		}
		displayPage(itemPerPage);

		function pageGenerator(getem){
			const num_of_tr = emptyBox.length;
			if(num_of_tr <= getem){
				pageUl.style.display = 'none';
			}else{
				pageUl.style.display = 'flex';
				const num_Of_Page = Math.ceil(num_of_tr/getem);
				for(i=1; i<=num_Of_Page; i++){
					const li = document.createElement('li'); li.className = 'list';
					const a =document.createElement('a'); a.href = '#'; a.innerText = i;
					a.setAttribute('data-page', i);
					li.appendChild(a);
					pageUl.insertBefore(li,pageUl.querySelector('.next'));
				}
			}
		}
		pageGenerator(itemPerPage);
		let pageLink = pageUl.querySelectorAll("a");
		let lastPage =  pageLink.length - 2;
		
		function pageRunner(page, items, lastPage, active){
			for(button of page){
				button.onclick = e=>{
					const page_num = e.target.getAttribute('data-page');
					const page_mover = e.target.getAttribute('id');
					if(page_num != null){
						index = page_num;

					}else{
						if(page_mover === "next"){
							index++;
							if(index >= lastPage){
								index = lastPage;
							}
						}else{
							index--;
							if(index <= 1){
								index = 1;
							}
						}
					}
					pageMaker(index, items, active);
				}
			}

		}
		var pageLi = pageUl.querySelectorAll('.list'); pageLi[0].classList.add("active");
		pageRunner(pageLink, itemPerPage, lastPage, pageLi);

		function getpagElement(val){
			let pagelink = pageUl.querySelectorAll("a");
			let lastpage =  pagelink.length - 2;
			let pageli = pageUl.querySelectorAll('.list');
			pageli[0].classList.add("active");
			pageRunner(pagelink, val, lastpage, pageli);
			
		}
	
		
		
		function pageMaker(index, item_per_page, activePage){
			const start = item_per_page * index;
			const end  = start + item_per_page;
			const current_page =  emptyBox.slice((start - item_per_page), (end-item_per_page));
			tbody.innerHTML = "";
			for(let j=0; j<current_page.length; j++){
				let item = current_page[j];					
				tbody.appendChild(item);
			}
			Array.from(activePage).forEach((e)=>{e.classList.remove("active");});
     		activePage[index-1].classList.add("active");
		}

		// search content 
		var search = document.getElementById("search");
		search.onkeyup = e=>{
			const text = e.target.value;
			for(let i=0; i<tr.length; i++){
				const matchText = tr[i].querySelectorAll("td")[0,1,2,3,4,5,6,7].innerText;
				if(matchText.toLowerCase().indexOf(text.toLowerCase()) > -1){
					tr[i].style.visibility = "visible";
				}else{
					tr[i].style.visibility= "collapse";
				}
			}
		}
</script>



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


