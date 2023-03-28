<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Dynamic Pagination</title>
    <link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>

<nav>
  <img src="img/FedCenter_Logo-removebg-preview.png" class="logo" >
  <ul>
    <li> <a href="">Home</a> </li>
    <li> <a href="">About</a> </li>
    <li> <a href="">Contact</a> </li>
    <li> <a href="">Blogs</a> </li>
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

<script>
let subMenu = document.getElementById("subMenu");

function toggleMenu() {
  subMenu.classList.toggle("open-menu");
}

</script>





















<!--- table 1

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
/*Table 1*/
.userinfo {
  font-family: Arial, Helvetica, sans-serif;
  box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
  width: 40%;
  
}
.info {

  text-align: justify;
  margin-left: 15px;
  display: block;
  font-size: 20px;  
  letter-spacing: 1px;
  padding: 2px;
  justify-content: right;
}
-->
<!-- Table 2-->

    


<!---
<table class="mytable2" id="mytable">


 <tr class="infoget">

 <th class="infotable2">NO</th>

 <th class="infotable2">DATE</th>

 <th class="infotable2">IN</th>

 <th class="infotable2">OUT</th>

 <th class="infotable2">HOURS </th>

 <th class="infotable2">MINUTES</th>

 <th class="infotable2">SPECIAL EVENT</th>

 </tr>


  <tr class="infoget">

 <td>1</td>

 <td>March 27, 2023</td>

 <td>8:00AM</td>

 <td>5:00PM</td>

 <td>5</td>

 <td>0</td>

 <td>Typing EVent</td>

 </tr>

 <tr class="infoget">

 <td>2</td>

 <td>March 28, 2023</td>

 <td>8:00AM</td>

 <td>5:00PM</td>

 <td>5</td>

 <td>0</td>

 <td>WWE</td>

 </tr>

 <tr class="infoget">

 <td>3</td>

 <td>March 29, 2023</td>

 <td>8:00AM</td>

 <td>5:00PM</td>

 <td>5</td>

 <td>0</td>

 <td>TeamWork</td>

 </tr>

 <tr class="infoget">

 <td>4</td>

 <td>March 27, 2023</td>

 <td>8:00AM</td>

 <td>5:00PM</td>

 <td>5</td>

 <td>0</td>

 <td>FIS</td>

 </tr>
 <tr class="infoget">

<td>5</td>

<td>March 30, 2023</td>

<td>8:00AM</td>

<td>5:00PM</td>

<td>5</td>

<td>0</td>

<td>Sleep</td>

</tr>
<tr class="infoget">

<td>6</td>

<td>March 31, 2023</td>

<td>8:00AM</td>

<td>5:00PM</td>

<td>5</td>

<td>0</td>

<td>Eat</td>

</tr>
<tr class="infoget">

<td>7</td>

<td>March 27, 2023</td>

<td>8:00AM</td>

<td>5:00PM</td>

<td>5</td>

<td>0</td>

<td>Getting info</td>

</tr>
<tr class="infoget">

<td>8</td>

<td>March 27, 2023</td>

<td>8:00AM</td>

<td>5:00PM</td>

<td>5</td>

<td>0</td>

<td>Onboard</td>

</tr>

 </table>

 /*Table 2 css
.mytable2{
  position: absolute;
  left: 17%;
  top: 75%;
  width: 70%;
  border-spacing: 0;
  border-collapse: collapse;
  box-shadow: 0 2px 15px rgba(64,64,64,.7);
  border-radius: 12px 12px 0 0;
  overflow: hidden;
 }

 td , .infotable2{
  padding: 15px 20px;
  text-align: center;
  
 
 }
 .infotable2{
  background: var(--color-primary);
  color: #fafafa;
  font-family: 'Open Sans',Sans-serif;
  font-weight: 200;
  text-transform: uppercase;
  font-weight: 600;
 
 }
 .infoget{
  width: 100%;
  background-color: #fafafa;
  font-family: 'Montserrat', sans-serif;
  transition: all .1 ease-in;
  cursor: pointer;
 }
 .infoget:nth-child(even){
  background-color: #eeeeee;
 }
.infoget:hover {
  background: transparent;
  transform: scale(1.02);
  box-shadow: 0 2px 15px rgba(64,64,64,.7);
}
table.dataTable thead .sorting {
  background-color: orange;
}
*/
/*Table 2 */
-->


</body>
</html>
