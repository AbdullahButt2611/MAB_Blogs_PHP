const navItems = document.querySelector('.nav__items');
const openNavBtn = document.querySelector('#open__nav-btn');
const closeNavBtn = document.querySelector('#close__nav-btn');
const sidebar = document.querySelector("aside");
const showSidebarBtn = document.querySelector("#show__Sidebar-btn");
const hideSidebarBtn = document.querySelector("#hide__Sidebar-btn");




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


// OPEN side bar on dashboard
const showSidebar = () => {
    sidebar.style.left = '0';
    showSidebarBtn.style.display = "none";
    hideSidebarBtn.style.display = "inline-block";
}



// CLOSE side bar on dashboard
const hideSidebar = () => {
    sidebar.style.left = '-100%';
    showSidebarBtn.style.display = "inline-block";
    hideSidebarBtn.style.display = "none";
}





// =========================        Calling Functions   ===============================
openNavBtn.addEventListener("click", openNav);
closeNavBtn.addEventListener("click", closeNav);
showSidebarBtn.addEventListener("click", showSidebar);
hideSidebarBtn.addEventListener("click", hideSidebar);