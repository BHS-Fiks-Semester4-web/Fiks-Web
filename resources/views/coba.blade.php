<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Popup</title>
    <link rel="stylesheet" href="styles.css">
    <style>
        body {
            font-family: Arial, sans-serif;
        }

        .products {
            display: flex;
            justify-content: space-around;
        }

        .product-card {
            width: 200px;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 10px;
            text-align: center;
            cursor: pointer;
            transition: transform 0.3s;
        }

        .product-card:hover {
            transform: scale(1.05);
        }

        .popup {
            display: none;
            position: fixed;
            z-index: 1;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            overflow: auto;
            background-color: rgba(0,0,0,0.4);
            padding-top: 60px;
        }

        .popup-content {
            background-color: #fefefe;
            margin: 5% auto;
            padding: 20px;
            border: 1px solid #888;
            width: 80%;
            max-width: 1200px;
            border-radius: 10px;
            text-align: center;
        }

        .close {
            color: #aaa;
            float: right;
            font-size: 28px;
            font-weight: bold;
        }

        .close:hover,
        .close:focus {
            color: black;
            text-decoration: none;
            cursor: pointer;
        }

        .product-element {
    border: 1px solid #ccc;
    border-radius: 10px;
    padding: 10px;
    margin: 10px;
    display: flex;
    flex-direction: column;
    align-items: center;
    background-color: #f9f9f9;
    box-shadow: 0 4px 8px rgba(0,0,0,0.1);
    transition: transform 0.3s, box-shadow 0.3s;
    width: 200px;
    max-height: 400px; /* set ketinggian maksimum untuk product-element */
    overflow-y: auto; /* aktifkan scroll vertical jika konten melebihi ketinggian maksimum */
}


        .product-element:hover {
            transform: scale(1.02);
            box-shadow: 0 8px 16px rgba(0,0,0,0.2);
        }

        .product-element img {
            max-width: 100%;
            height: auto;
            border-radius: 10px;
            margin-bottom: 10px;
        }

        .product-element h3, .product-element p, .product-element h4 {
            margin: 5px 0;
        }

        .product-element .detail-button {
            background-color: #f8d7da;
            color: #000;
            padding: 10px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        .product-element .detail-button:hover {
            background-color: #f1c4c7;
        }

        #popup-description {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
        }
    </style>
</head>
<body>

    <section id="product">
        <div class="main">
            <div class="intro" id="kategori-id"><h1>Temukan Produk Kebutuhan Anda</h1></div>
            <div data-aos="fade-up" data-aos-duration="3000" class="products">
                <div class="product-card" id="laptop" onclick="fetchProducts(1)">
                    <div class="icon">🖥️</div>
                    <h2>Laptop</h2>
                    <p>Tersedia Laptop dengan berbagai macam Merek, Tipe dan Spesifikasi yang sesuai dengan kebutuhan anda</p>
                </div>
                <div class="product-card" id="aksesori" onclick="fetchProducts(2)">
                    <div class="icon">💻</div>
                    <h2>Aksesori</h2>
                    <p>Menjual berbagai aksesoris dan komponen seperti keyboard, mouse dan lain-lain</p>
                </div>
                <div class="product-card" id="service" onclick="fetchProducts(3)">
                    <div class="icon">📹</div>
                    <h2>Jasa Service</h2>
                    <p>Menyediakan Jasa Service Laptop dan Komputer dengan cepat dan terpercaya</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Popup Modal -->
    <div id="popup" class="popup">
        <div class="popup-content">
            <span class="close" onclick="closePopup()">&times;</span>
            <h2 id="popup-title">Produk</h2>
            <div id="popup-description"></div>
        </div>
    </div>

    <script>
        async function fetchProducts(id_jenis_barang) {
            try {
                const response = await fetch(`/products/${id_jenis_barang}`);
                if (!response.ok) {
                    throw new Error('Network response was not ok');
                }
                const products = await response.json();
                showPopup(products);
            } catch (error) {
                console.error('Error fetching products:', error);
            }
        }

        function showPopup(products) {
            const popup = document.getElementById('popup');
            const description = document.getElementById('popup-description');

            description.innerHTML = '';
            products.forEach(product => {
                const productElement = document.createElement('div');
                productElement.classList.add('product-element');
                productElement.innerHTML = `
                    <img src="data:image/jpeg;base64,${product.foto_barang}" />
                    <h3>Nama Barang: ${product.nama_barang}</h3>
                    <p>Deskripsi: ${product.deskripsi_barang}</p>
                    <h4>Harga: Rp${product.harga_setelah_diskon_barang}</h4>
                    `;
                description.appendChild(productElement);
            });

            popup.style.display = 'block';
        }

        function closePopup() {
            const popup = document.getElementById('popup');
            popup.style.display = 'none';
        }
    </script>
</body>
</html>
        