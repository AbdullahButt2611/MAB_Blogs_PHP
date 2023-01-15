const navItems = document.querySelector('.nav__items');
const openNavBtn = document.querySelector('#open__nav-btn');
const closeNavBtn = document.querySelector('#close__nav-btn');
const sidebar = document.querySelector("aside");
const showSidebarBtn = document.querySelector("#show__sidebar-btn");
const hideSidebarBtn = document.querySelector("#hide__sidebar-btn");




// Open Nav Dropdown
const openNav = () => {
    navItems.style.display = 'flex';
    openNavBtn.style.display = 'none';
    closeNavBtn.style.display = 'inline-block';
}


// Close Nav Dropdown
const closeNav = () => {
    navItems.style.display = 'none';
    openNavBtn.style.display = 'inline-block';
    closeNavBtn.style.display = 'none';
}





// =========================        Calling Functions   ===============================
openNavBtn.addEventListener("click", openNav);
closeNavBtn.addEventListener("click", closeNav);