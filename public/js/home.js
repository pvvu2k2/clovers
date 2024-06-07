// chuyển động của các sản phẩm qua lại
document.addEventListener('DOMContentLoaded', () => {
    const productList = document.querySelector('.category-list');
    const products = document.querySelectorAll('.category');
    const prevBtn = document.getElementById('prevBtn');
    const nextBtn = document.getElementById('nextBtn');

    const productWidth = 307; // Width of each product including margin
    const productsToShow = 5;
    const totalProducts = products.length;
    let currentIndex = 0;

    // Clone the first and last set of products
    for (let i = 0; i < productsToShow; i++) {
        const cloneFirst = products[i].cloneNode(true);
        const cloneLast = products[totalProducts - 1 - i].cloneNode(true);
        productList.appendChild(cloneFirst);
        productList.insertBefore(cloneLast, productList.firstChild);
    }

    const allProducts = document.querySelectorAll('.category');
    productList.style.transform = `translateX(-${productsToShow * productWidth}px)`;

    const updateButtons = () => {
        prevBtn.disabled = false;
        nextBtn.disabled = false;
    };

    const showProducts = () => {
        productList.style.transition = 'transform 0.5s ease';
        productList.style.transform = `translateX(-${(currentIndex + productsToShow) * productWidth}px)`;
        updateButtons();
    };

    nextBtn.addEventListener('click', () => {
        if (currentIndex < totalProducts) {
            currentIndex++;
        }
        showProducts();

        if (currentIndex === totalProducts) {
            setTimeout(() => {
                productList.style.transition = 'none';
                productList.style.transform = `translateX(-${productsToShow * productWidth}px)`;
                currentIndex = 0;
            }, 500);
        }
    });

    prevBtn.addEventListener('click', () => {
        if (currentIndex > -productsToShow) {
            currentIndex--;
        }
        showProducts();

        if (currentIndex === -productsToShow) {
            setTimeout(() => {
                productList.style.transition = 'none';
                productList.style.transform = `translateX(-${(totalProducts + productsToShow) * productWidth}px)`;
                currentIndex = totalProducts - 1;
            }, 500);
        }
    });

    // Initialize buttons on load
    updateButtons();
});



