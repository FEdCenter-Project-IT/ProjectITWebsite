const sideMenu = document.querySelector("aside");
const menuBtn = document.querySelector("#menu-btn");
const closeBtn = document.querySelector("#close-btn");
const themeToggler = document.querySelector(".theme-toggler");
// const body = document.body;
// const darkThemeClass = 'dark-theme-variables';
// const isDarkTheme = localStorage.getItem('isDarkTheme') === 'true';


// show sidebar
menuBtn.addEventListener('click', () => {
    sideMenu.style.display = 'block';
})

//close sidebar
closeBtn.addEventListener('click', () => {
    sideMenu.style.display = 'none';
})

// theme
themeToggler.addEventListener('click', () => {
  document.body.classList.toggle('dark-theme-variables')

  themeToggler.querySelector('span:nth-child(1)').classList.toggle('active');
  themeToggler.querySelector('span:nth-child(2)').classList.toggle('active');
})

// Set initial theme based on user preference
// if (isDarkTheme) {
//   body.classList.add(darkThemeClass);
// }

// // Toggle theme on click
// themeToggler.addEventListener('click', () => {
//   body.classList.toggle(darkThemeClass);
//   const isCurrentlyDarkTheme = body.classList.contains(darkThemeClass);
//   localStorage.setItem('isDarkTheme', isCurrentlyDarkTheme);
//   themeToggler.querySelector('span:nth-child(1)').classList.toggle('active');
//   themeToggler.querySelector('span:nth-child(2)').classList.toggle('active');
// });


// inside of List of Interns
listOfInterns.forEach(listofintern => {
    const tr = document.createElement('tr');
    const trContent = `
                        <td>${listofintern.internNo}</td>
                        <td>${listofintern.name}</td>
                        <td>${listofintern.project}</td>
                        <td class="${listofintern.status === 'Inactive' ? 'danger' : listofintern.status === 'Active' ? 'warning' : 'primary'}">${listofintern.status}</td>
                        <td class="primary">View</td>
                        `;
    tr.innerHTML = trContent;
    document.querySelector('table tbody').appendChild(tr);

})