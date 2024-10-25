//toggle class active untuk shopping-cart
const userIcon = document.querySelector(".user");
document.querySelector("#user-button").onclick = (e) => {
    userIcon.classList.toggle("active");
    e.preventDefault();
};

const shoppingCart = document.querySelector(".shopping-cart");
document.querySelector("#shopping-cart-button").onclick = (e) => {
    shoppingCart.classList.toggle("active");
    e.preventDefault();
};

//Klik di luar element
const ui = document.querySelector("#user-button");
const sc = document.querySelector("#shopping-cart-button");

document.addEventListener("click", function (e) {
    if (!ui.contains(e.target) && !userIcon.contains(e.target)) {
        userIcon.classList.remove("active");
    }

    if (!sc.contains(e.target) && !shoppingCart.contains(e.target)) {
        shoppingCart.classList.remove("active");
    }
});

//modal box

const menuDetailModal = document.querySelector("#menu-detail-modal");
const menuDetailButtons = document.querySelectorAll(".menu-detail-button");

menuDetailButtons.forEach((btn) => {
    btn.onclick = (e) => {
        menuDetailModal.style.display = "flex";
        e.preventDefault();
    };
});

//tombol close
document.querySelector(".modal .close-icon").onclick = (e) => {
    menuDetailModal.style.display = "none";
    e.preventDefault();
};

//klik di luar modal
window.onclick = (e) => {
    if (e.target === menuDetailModal) {
        menuDetailModal.style.display = "none";
    }
};
