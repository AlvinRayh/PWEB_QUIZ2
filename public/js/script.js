document.addEventListener("DOMContentLoaded", () => {
    const cartItems = JSON.parse(localStorage.getItem("cartItems")) || [];
    const orderItemsList = document.getElementById("order-items");

    if (cartItems.length > 0) {
        cartItems.forEach((item) => {
            const row = document.createElement("tr");
            row.innerHTML = `
                <td>${item.name}</td>
                <td>${item.quantity}</td>
                <td>${rupiah(item.total)}</td>
            `;
            orderItemsList.appendChild(row);
        });
    } else {
        const row = document.createElement("tr");
        row.innerHTML = '<td colspan="3">No items found in your order.</td>';
        orderItemsList.appendChild(row);
    }
});

const rupiah = (number) => {
    return new Intl.NumberFormat("id-ID", {
        style: "currency",
        currency: "IDR",
        minimumFractionDigits: 0,
    }).format(number);
};
