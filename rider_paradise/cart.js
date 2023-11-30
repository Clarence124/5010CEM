let listCards = [];

// Define the addToCart function to add items to the shared list
function addToCart(product) {
    // Get selected product details
    const mainImage = product.image;
    const productName = product.name;
    const discountPrice = parseFloat(product.price);
    const quantity = 1; // You can set an initial quantity
    // Color and size can be obtained as needed

    // Create a new item for the cart
    const newItem = {
        image: mainImage,
        name: productName,
        price: discountPrice,
        quantity: quantity,
        // Add color and size properties here
    };

    // Add the item to the shared listCards array
    listCards.push(newItem);

    // Call the reloadCard function to update the cart display
    reloadCard();
}

