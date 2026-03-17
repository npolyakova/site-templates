<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Свежий хлеб - домашняя пекарня</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            line-height: 1.6;
            color: #333;
            background-color: #f9f5f0;
        }

        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 20px;
        }

        /* Шапка */
        header {
            background-color: #8b4513;
            color: #fff;
            padding: 20px 0;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
        }

        header .container {
            display: flex;
            justify-content: space-between;
            align-items: center;
            flex-wrap: wrap;
        }

        .logo h1 {
            font-size: 2rem;
            margin-bottom: 5px;
        }

        .logo p {
            font-style: italic;
            font-size: 0.9rem;
            opacity: 0.9;
        }

        nav ul {
            display: flex;
            list-style: none;
        }

        nav ul li {
            margin-left: 30px;
        }

        nav ul li a {
            color: #fff;
            text-decoration: none;
            font-weight: 500;
            transition: opacity 0.3s;
        }

        nav ul li a:hover {
            opacity: 0.8;
        }

        /* Главный баннер */
        .hero {
            background: linear-gradient(rgba(0,0,0,0.5), rgba(0,0,0,0.5)), url('https://images.unsplash.com/photo-1509440159596-0249088772ff?ixlib=rb-1.2.1&auto=format&fit=crop&w=1350&q=80') center/cover;
            color: #fff;
            text-align: center;
            padding: 100px 0;
        }

        .hero h2 {
            font-size: 2.5rem;
            margin-bottom: 20px;
        }

        .hero p {
            font-size: 1.2rem;
            max-width: 700px;
            margin: 0 auto 30px;
        }

        .btn {
            display: inline-block;
            background-color: #d2691e;
            color: #fff;
            padding: 12px 30px;
            text-decoration: none;
            border-radius: 50px;
            font-weight: 600;
            transition: background-color 0.3s;
            border: none;
            cursor: pointer;
        }

        .btn:hover {
            background-color: #b85e1a;
        }

        /* Категории */
        .categories {
            padding: 60px 0;
        }

        .section-title {
            text-align: center;
            font-size: 2rem;
            margin-bottom: 50px;
            color: #8b4513;
            position: relative;
        }

        .section-title:after {
            content: '';
            display: block;
            width: 80px;
            height: 3px;
            background-color: #d2691e;
            margin: 15px auto 0;
        }

        .category-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 30px;
        }

        .category-card {
            background-color: #fff;
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 0 5px 15px rgba(0,0,0,0.1);
            transition: transform 0.3s;
            text-align: center;
            padding-bottom: 20px;
        }

        .category-card:hover {
            transform: translateY(-5px);
        }

        .category-card img {
            width: 100%;
            height: 200px;
            object-fit: cover;
        }

        .category-card h3 {
            padding: 15px 0 10px;
            color: #8b4513;
        }

        /* Товары */
        .products {
            padding: 60px 0;
            background-color: #fff;
        }

        .product-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
            gap: 30px;
        }

        .product-card {
            background-color: #f9f5f0;
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 0 5px 15px rgba(0,0,0,0.08);
            transition: transform 0.3s;
            padding: 20px;
            text-align: center;
        }

        .product-card:hover {
            transform: translateY(-5px);
        }

        .product-card img {
            width: 100%;
            height: 200px;
            object-fit: cover;
            border-radius: 8px;
        }

        .product-card h3 {
            margin: 15px 0 10px;
            color: #8b4513;
        }

        .product-card .price {
            font-size: 1.5rem;
            font-weight: 700;
            color: #d2691e;
            margin: 10px 0;
        }

        .product-card .weight {
            color: #777;
            font-size: 0.9rem;
            margin-bottom: 15px;
        }

        .product-card .btn-small {
            background-color: #8b4513;
            color: #fff;
            padding: 8px 20px;
            text-decoration: none;
            border-radius: 50px;
            font-size: 0.9rem;
            display: inline-block;
            transition: background-color 0.3s;
            border: none;
            cursor: pointer;
        }

        .product-card .btn-small:hover {
            background-color: #6a3510;
        }

        /* О нас */
        .about {
            padding: 60px 0;
            background: linear-gradient(135deg, #f9f5f0 0%, #f0e6d8 100%);
        }

        .about-content {
            display: flex;
            align-items: center;
            gap: 50px;
            flex-wrap: wrap;
        }

        .about-text {
            flex: 1;
            min-width: 300px;
        }

        .about-text h3 {
            font-size: 1.8rem;
            color: #8b4513;
            margin-bottom: 20px;
        }

        .about-text p {
            margin-bottom: 15px;
        }

        .about-image {
            flex: 1;
            min-width: 300px;
        }

        .about-image img {
            width: 100%;
            border-radius: 10px;
            box-shadow: 0 5px 15px rgba(0,0,0,0.2);
        }

        /* Контакты */
        .contacts {
            padding: 60px 0;
        }

        .contact-info {
            display: flex;
            justify-content: space-around;
            flex-wrap: wrap;
            gap: 30px;
            text-align: center;
        }

        .contact-item {
            flex: 1;
            min-width: 200px;
        }

        .contact-item h3 {
            color: #8b4513;
            margin-bottom: 15px;
        }

        .contact-item p {
            margin-bottom: 5px;
        }

        /* Подвал */
        footer {
            background-color: #333;
            color: #fff;
            text-align: center;
            padding: 30px 0;
        }

        /* Адаптивность */
        @media (max-width: 768px) {
            header .container {
                flex-direction: column;
                text-align: center;
            }

            nav ul {
                margin-top: 20px;
                flex-wrap: wrap;
                justify-content: center;
            }

            nav ul li {
                margin: 0 10px;
            }

            .hero h2 {
                font-size: 2rem;
            }

            .about-content {
                flex-direction: column;
            }
        }
    </style>
</head>
<body>
    <?php
    $products = [
        [
            'name' => 'Бородинский хлеб',
            'description' => 'Традиционный ржаной хлеб с кориандром',
            'price' => 85,
            'weight' => '400 г',
            'image' => 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRkwh6l0E2vJbdty83e-Yrwf3_JeKSeFk0sGvfDi5mM2PnjcNJCH6fKeRlkWWIhpQ5oWO3Sequm&s=10',
            'category' => 'Ржаной хлеб'
        ],
        [
            'name' => 'Батон нарезной',
            'description' => 'Классический пшеничный батон',
            'price' => 45,
            'weight' => '300 г',
            'image' => 'https://dixy.ru/upload/iblock/6b5/2ajnavfin2un30zfcpnk791mg0msys1f.webp',
            'category' => 'Пшеничный хлеб'
        ],
        [
            'name' => 'Чиабатта',
            'description' => 'Итальянский хлеб с хрустящей корочкой',
            'price' => 120,
            'weight' => '250 г',
            'image' => 'https://hotuy.cooking/wp-content/uploads/2025/09/chiabatta-1200x720.jpg',
            'category' => 'Особые сорта'
        ],
        [
            'name' => 'Круассан с шоколадом',
            'description' => 'Слоеная выпечка с начинкой',
            'price' => 95,
            'weight' => '120 г',
            'image' => 'https://cdn.7days.ru/pic/272/967689/1359494/86.jpg',
            'category' => 'Сладкая выпечка'
        ],
        [
            'name' => 'Зерновой хлеб',
            'description' => 'С подсолнечными семечками и льном',
            'price' => 110,
            'weight' => '350 г',
            'image' => 'https://img.vkusvill.ru/pim/images/site_LargeWebP/67698df3-afee-45b6-93e6-0207526651b5.webp?1711749317.5884',
            'category' => 'Здоровое питание'
        ],
        [
            'name' => 'Пирог с яблоками',
            'description' => 'Домашняя выпечка с корицей',
            'price' => 250,
            'weight' => '600 г',
            'image' => 'https://www.photorecept.ru/wp-content/uploads/2021/05/biskvitnyj-pirog-s-jablokami-1300x867.jpg',
            'category' => 'Пироги'
        ]
    ];

    $categories = [
        [
            'name' => 'Ржаной хлеб',
            'icon' => '🍞',
            'image' => 'https://images.unsplash.com/photo-1585478259715-876b7c3d3f8c?ixlib=rb-1.2.1&auto=format&fit=crop&w=500&q=80'
        ],
        [
            'name' => 'Пшеничный хлеб',
            'icon' => '🥖',
            'image' => 'https://images.unsplash.com/photo-1549931319-a545dcf3bc73?ixlib=rb-1.2.1&auto=format&fit=crop&w=500&q=80'
        ],
        [
            'name' => 'Сладкая выпечка',
            'icon' => '🥐',
            'image' => 'https://images.unsplash.com/photo-1555507036-ab1f4038808a?ixlib=rb-1.2.1&auto=format&fit=crop&w=500&q=80'
        ],
        [
            'name' => 'Пироги',
            'icon' => '🥧',
            'image' => 'https://images.unsplash.com/photo-1568571780765-9276ac8b75a2?ixlib=rb-1.2.1&auto=format&fit=crop&w=500&q=80'
        ]
    ];

    // Текущая дата для приветствия
    $currentHour = date('H');
    if ($currentHour >= 5 && $currentHour < 12) {
        $greeting = 'Доброе утро';
    } elseif ($currentHour >= 12 && $currentHour < 18) {
        $greeting = 'Добрый день';
    } elseif ($currentHour >= 18 && $currentHour < 23) {
        $greeting = 'Добрый вечер';
    } else {
        $greeting = 'Доброй ночи';
    }
    ?>

    <header>
        <div class="container">
            <div class="logo">
                <h1>🥖 Свежий хлеб</h1>
                <p>Пекарня с душой с 2010 года</p>
            </div>
            <nav>
                <ul>
                    <li><a href="#home">Главная</a></li>
                    <li><a href="#products">Наша выпечка</a></li>
                    <li><a href="#about">О нас</a></li>
                    <li><a href="#contacts">Контакты</a></li>
                </ul>
            </nav>
        </div>
    </header>

    <section id="home" class="hero">
        <div class="container">
            <h2><?php echo $greeting; ?>! Свежая выпечка каждый день</h2>
            <p>Только натуральные ингредиенты, ручная работа и традиционные рецепты. Печём с любовью для вас с 5 утра!</p>
            <a href="#products" class="btn">Смотреть ассортимент</a>
        </div>
    </section>

    <section class="categories">
        <div class="container">
            <h2 class="section-title">Наши категории</h2>
            <div class="category-grid">
                <?php foreach ($categories as $category): ?>
                <div class="category-card">
                    <img src="<?php echo $category['image']; ?>" alt="<?php echo $category['name']; ?>">
                    <h3><?php echo $category['icon'] . ' ' . $category['name']; ?></h3>
                </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

    <section id="products" class="products">
        <div class="container">
            <h2 class="section-title">Популярные позиции</h2>
            <div class="product-grid">
                <?php foreach ($products as $product): ?>
                <div class="product-card">
                    <img src="<?php echo $product['image']; ?>" alt="<?php echo $product['name']; ?>">
                    <h3><?php echo $product['name']; ?></h3>
                    <p><?php echo $product['description']; ?></p>
                    <div class="weight"><?php echo $product['weight']; ?></div>
                    <div class="price"><?php echo $product['price']; ?> ₽</div>
                    <button class="btn-small">В корзину</button>
                </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

    <section id="about" class="about">
        <div class="container">
            <div class="about-content">
                <div class="about-text">
                    <h3>Немного о нашей пекарне</h3>
                    <p>Пекарня «Свежий хлеб» открылась в 2010 году и с тех пор радует жителей города вкусной и ароматной выпечкой. Мы используем только натуральные ингредиенты, никаких улучшителей и консервантов.</p>
                    <p>Наши мастера выпекают хлеб по старинным рецептам, некоторые из которых передаются из поколения в поколение. Каждое утро в 5:00 мы начинаем замес теста, чтобы к открытию вас ждал свежий, хрустящий хлеб.</p>
                    <p>Сегодня у нас <?php echo date('d.m.Y'); ?> — приходите за свежим хлебом!</p>
                </div>
                <div class="about-image">
                    <img src="https://images.unsplash.com/photo-1559925393-8be0ec4767c8?ixlib=rb-1.2.1&auto=format&fit=crop&w=500&q=80" alt="Наша пекарня">
                </div>
            </div>
        </div>
    </section>

    <section id="contacts" class="contacts">
        <div class="container">
            <h2 class="section-title">Как нас найти</h2>
            <div class="contact-info">
                <div class="contact-item">
                    <h3>📍 Адрес</h3>
                    <p>г. Москва, ул. Хлебная, д. 15</p>
                    <p>(рядом с метро "Пекарная")</p>
                </div>
                <div class="contact-item">
                    <h3>🕒 Часы работы</h3>
                    <p>Пн-Пт: 7:00 - 21:00</p>
                    <p>Сб-Вс: 8:00 - 20:00</p>
                </div>
                <div class="contact-item">
                    <h3>📞 Телефон</h3>
                    <p>+7 (495) 123-45-67</p>
                    <p>+7 (999) 876-54-32</p>
                </div>
                <div class="contact-item">
                    <h3>✉️ Email</h3>
                    <p>freshbread@bakery.ru</p>
                </div>
            </div>
        </div>
    </section>

    <footer>
        <div class="container">
            <p>&copy; <?php echo date('Y'); ?> Пекарня «Свежий хлеб». Все права защищены.</p>
            <p style="margin-top: 10px; font-size: 0.9rem;">Сайт разработан с ❤️ для любителей свежей выпечки</p>
        </div>
    </footer>
</body>
</html>