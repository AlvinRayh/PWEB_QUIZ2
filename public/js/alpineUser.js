document.addEventListener("alpine:init", () => {
    Alpine.data("products", () => ({
        items: [
            {
                id: 1,
                name: "Espresso",
                img: "espresso.jpg",
                price: 15000,
                category: "Coffee",
            },
            {
                id: 2,
                name: "Cappuccino",
                img: "cappuccino.jpeg",
                price: 10000,
                category: "Coffee",
            },
            {
                id: 3,
                name: "Americano",
                img: "americano.jpg",
                price: 12000,
                category: "Coffee",
            },
            {
                id: 4,
                name: "Cold Brew",
                img: "coldbrew.jpeg",
                price: 14000,
                category: "Coffee",
            },
            {
                id: 5,
                name: "Mochachino",
                img: "mochachino.png",
                price: 15000,
                category: "Coffee",
            },
            {
                id: 6,
                name: "Macchiato",
                img: "macchiato.png",
                price: 11000,
                category: "Coffee",
            },
            {
                id: 7,
                name: "Iced Tea",
                img: "iced_tea.jpeg",
                price: 10000,
                category: "Non-Coffee",
            },
            {
                id: 8,
                name: "Lemon Tea",
                img: "lemon_tea.jpeg",
                price: 12000,
                category: "Non-Coffee",
            },
            {
                id: 9,
                name: "Lychee Tea",
                img: "lychee_tea.jpeg",
                price: 15000,
                category: "Non-Coffee",
            },
            {
                id: 10,
                name: "Jasmine Tea",
                img: "jasmine_tea.jpeg",
                price: 13000,
                category: "Non-Coffee",
            },
            {
                id: 11,
                name: "Mint Tea",
                img: "mint_tea.jpeg",
                price: 14000,
                category: "Non-Coffee",
            },
            {
                id: 12,
                name: "Orange Tea",
                img: "orange_tea.jpeg",
                price: 12000,
                category: "Non-Coffee",
            },
            {
                id: 13,
                name: "Peach Tea",
                img: "peach_tea.jpeg",
                price: 15000,
                category: "Non-Coffee",
            },
            {
                id: 14,
                name: "Kopi Gula Aren",
                img: "kopi_gula_aren.jpeg",
                price: 22000,
                category: "Coffee",
            },
        ],
        coffeeItems() {
            const items = this.items.filter(
                (item) => item.category === "Coffee"
            );
            console.log("Coffee Items:", items);
            return items;
        },

        nonCoffeeItems() {
            const items = this.items.filter(
                (item) => item.category === "Non-Coffee"
            );
            console.log("Non-Coffee Items:", items);
            return items;
        },
    }));

    Alpine.store("cart", {
        items: [],
        total: 0,
        quantity: 0,
        add(newItem) {
            //cek apakah ada barang yang sama
            const cartItem = this.items.find((item) => item.id === newItem.id);

            //jika blom ada
            if (!cartItem) {
                this.items.push({
                    ...newItem,
                    quantity: 1,
                    total: newItem.price,
                });
                this.quantity++;
                this.total += newItem.price;
            } else {
                //jika barang ada, cek barang sama atau tidak
                this.items = this.items.map((item) => {
                    //jika barang berbeda
                    if (item.id !== newItem.id) {
                        return item;
                    } else {
                        //jika barang ada
                        item.quantity++;
                        item.total = item.price * item.quantity;
                        this.quantity++;
                        this.total += item.price;
                        return item;
                    }
                });
            }
        },
        remove(id) {
            const cartItem = this.items.find((item) => item.id === id);

            if (cartItem.quantity > 1) {
                this.items = this.items.map((item) => {
                    if (item.id !== id) {
                        return item;
                    } else {
                        item.quantity--;
                        item.total = item.price * item.quantity;
                        this.quantity--;
                        this.total -= item.price;
                        return item;
                    }
                });
            } else if (cartItem.quantity === 1) {
                this.items = this.items.filter((item) => item.id !== id);
                this.quantity--;
                this.total -= cartItem.price;
            }
        },
    });
});

//form validation
const checkoutButton = document.querySelector(".checkout-button");
checkoutButton.disabled = true;

const form = document.querySelector("#checkoutForm");

form.addEventListener("keyup", function () {
    for (let i = 0; i < form.elements.length; i++) {
        if (form.elements[i].value.length !== 0) {
            checkoutButton.classList.remove("disabled");
            checkoutButton.classList.add("disabled");
        } else {
            return false;
        }
    }
    checkoutButton.disabled = false;
    checkoutButton.classList.remove("disabled");
});

checkoutButton.addEventListener("click", async function (e) {
    e.preventDefault();
    const formData = new FormData(form);
    const data = new URLSearchParams(formData);
    const objData = Object.fromEntries(data);

    try {
        // Simpan items dari store ke Local Storage
        const cartItems = Alpine.store("cart").items;
        localStorage.setItem("cartItems", JSON.stringify(cartItems));

        const response = await fetch("php/placeOrder.php", {
            method: "POST",
            body: data,
        });
        const token = await response.text();
        console.log(token);

        window.snap.pay(token, {
            onSuccess: function (result) {
                console.log(result);
                window.location.href = `/receipt?name=${objData.name}&email=${objData.email}&phone=${objData.phone}&order_id=${result.order_id}&total=${objData.total}`;
            },
            onPending: function (result) {
                console.log(result);
                alert("Payment is pending.");
            },
            onError: function (result) {
                console.log(result);
                alert("Payment failed. Please try again.");
            },
            onClose: function () {
                alert(
                    "You closed the payment popup without completing the transaction."
                );
            },
        });
    } catch (err) {
        console.log(err.message);
    }
});

// //format pesan
// const formatMessage = (obj) => {
//     return `Data Customer
//     Nama  : ${obj.name}
//     Email : ${obj.email}
//     No HP : ${obj.phone}

//     Data Pesanan
//     ${JSON.parse(obj.items).map(
//         (item) => `${item.name} (${item.quantity} x ${rupiah(item.total)})\n`
//     )}
//    TOTAL : ${rupiah(obj.total)}
//    Terima Kasih. `;
// };

//konversi ke rupiah
const rupiah = (number) => {
    return new Intl.NumberFormat("id-ID", {
        style: "currency",
        currency: "IDR",
        minimumFractionDigits: 0,
    }).format(number);
};

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

// //modal box

// const menuDetailModal = document.querySelector("#menu-detail-modal");
// const menuDetailButtons = document.querySelectorAll(".menu-detail-button");

// menuDetailButtons.forEach((btn) => {
//     btn.onclick = (e) => {
//         menuDetailModal.style.display = "flex";
//         e.preventDefault();
//     };
// });

// //tombol close
// document.querySelector(".modal .close-icon").onclick = (e) => {
//     menuDetailModal.style.display = "none";
//     e.preventDefault();
// };

// //klik di luar modal
// window.onclick = (e) => {
//     if (e.target === menuDetailModal) {
//         menuDetailModal.style.display = "none";
//     }
// };
