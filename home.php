<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <link rel="stylesheet" type="text/css" href="css/style.css">
    <title>Document</title>
</head>
<body>

<div class="select-menu">
        <div class="select-btn">
            <span class="sBtn-text">Select your Task</span>
            <i class="fa-solid fa-caret-down"></i>
        </div>

        <ul class="options">
            <li class="option">
              
                <span class="option-text">Github</span>
            </li>
            <li class="option">
                
                <span class="option-text">Instagram</span>
            </li>
            <li class="option">
           
                <span class="option-text">Linkedin</span>
            </li>
            <li class="option">
               
                <span class="option-text">Facebook</span>
            </li>
            <li class="option">
                
                <span class="option-text">Twitter</span>
            </li>
        </ul>
    </div>
    
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
</body>
</html>
