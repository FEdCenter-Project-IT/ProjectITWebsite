// const listOfInterns = [
//     {
//         internNo: 'ARE (2023-33)',
//         name: 'ARNOLD ESTEBAN',
//         project: 'Project IT',
//         status: 'Inactive'
//     },
//     {
//         internNo: 'HAT (2023-42)',
//         name: 'HAZEL TIFFANY TAYLO',
//         project: 'Project IT',
//         status: 'Active'
//     },
//     {
//         internNo: 'ZAM (2023-19)',
//         name: 'ZAIDEE MENDOZA',
//         project: 'Project IT',
//         status: 'Active'
//     },
//     {
//         internNo: 'SAP (2023-41)',
//         name: 'SAMUEL PASTOLERO',
//         project: 'Project IT',
//         status: 'Active'
//     },
//     {
//         internNo: 'ALD (2023-40)',
//         name: 'ALEXANDRA JULIAN DE GUZMAN',
//         project: 'Project IT',
//         status: 'Inactive'
//     }
// ]

function togglePopup(){
    document.getElementById("popup-1").classList.toggle("active");
};

//view the "....."
const cell = document.querySelector('.special-events-cell');
const tooltip = document.querySelector('.tooltip');

cell.addEventListener('mouseover', showTooltip);
cell.addEventListener('mouseout', hideTooltip);

function showTooltip() {
  const fullText = cell.innerText;
  tooltip.textContent = fullText;
  tooltip.style.display = 'block';
  tooltip.style.top = (cell.offsetTop + cell.offsetHeight) + 'px';
  tooltip.style.left = cell.offsetLeft + 'px';
}

function hideTooltip() {
  tooltip.style.display = 'none';
}

  