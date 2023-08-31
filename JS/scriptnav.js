//code for nav bar
const logoutButton = document.getElementById('logoutButton');
	logoutButton.addEventListener('click', () => {
	window.location.href = 'logout.php';
});

//code for column dashboard
const redirectProfile = () => {
	window.location.href = "profilePage.php";
}

//code for column profile
const redirectCart = () => {
	window.location.href = "cartPage.php";
}

//code for column recipe
const redirectRecipe = () => {
	window.location.href = "recipePage.php";
}

//This code for Admin Part
//code for column Edit User
const redirectEditUser = () => {
	window.location.href = "admin_editUser.php";
}

//code for column Sales Transaction
const redirectSales = () => {
	window.location.href = "admin_viewSales.php";
}
//code for column Create Recipe
const redirectCreateRecipe = () => {
	window.location.href = "admin_createRecipe.php";
}

//code for column Inventory Management
const redirectInventory = () => {
	window.location.href = "admin_viewInventory.php";
}

//every back button that exist
const backbtn = document.getElementById('backBtn');
backbtn.addEventListener('click', ()=>{
	window.location.href = 'dashboard.php';
});