<!DOCTYPE html>
<html>

<head>
    <title>Product Details</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <style>
        .product-image {
            max-width: 100%;
            height: auto;
        }

        .product-details {
            margin-top: 20px;
        }

        .product-title {
            font-size: 24px;
            font-weight: bold;
        }

        .product-price {
            font-size: 18px;
            font-weight: bold;
            color: #e74c3c;
            margin-top: 10px;
        }

        .product-description {
            margin-top: 20px;
        }

        .product-action {
            margin-top: 20px;
        }
    </style>
</head>

<body>

    <div class="container">
        <div class="row">
            <div class="col-md-6" style="color:aqua;">
                <img src="IMAGES/art (2).jpeg" alt="Product Image" class="product-image">
            </div>
            <div class="col-md-6 product-details" style="vertical-align:middle;">
                <h2 class="product-title">Product Name</h2>
                <h4 class="product-price">$99.99</h4>
                <p class="product-description">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur eu tortor eget tellus sagittis consequat. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Nullam vel nisl mauris. Proin rutrum tortor eu ligula eleifend dictum. </p>
                <div class="product-action">
                    <button type="button" class="btn btn-primary">Add to Cart</button>
                    <button type="button" class="btn btn-default">Wishlist</button>
                </div>
            </div>
        </div>
    </div>

    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.5.1/js/bootstrap.min.js"></script>
</body>

</html>