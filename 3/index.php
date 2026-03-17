<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Библиотека колледжа | Учебники и пособия</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            line-height: 1.6;
            color: #2c3e50;
            background-color: #f5f7fa;
        }

        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 20px;
        }

        /* Шапка */
        header {
            background-color: #2c3e50;
            color: #fff;
            padding: 20px 0;
            box-shadow: 0 2px 10px rgba(0,0,0,0.2);
            position: sticky;
            top: 0;
            z-index: 100;
        }

        header .container {
            display: flex;
            justify-content: space-between;
            align-items: center;
            flex-wrap: wrap;
        }

        .logo h1 {
            font-size: 1.8rem;
            margin-bottom: 5px;
        }

        .logo p {
            font-size: 0.9rem;
            opacity: 0.9;
        }

        nav ul {
            display: flex;
            list-style: none;
            gap: 30px;
        }

        nav ul li a {
            color: #fff;
            text-decoration: none;
            font-weight: 500;
            transition: color 0.3s;
            padding: 5px 0;
            border-bottom: 2px solid transparent;
        }

        nav ul li a:hover {
            border-bottom-color: #e67e22;
        }

        /* Главный баннер */
        .hero {
            background: linear-gradient(135deg, #3498db, #2c3e50);
            color: #fff;
            text-align: center;
            padding: 60px 0;
        }

        .hero h2 {
            font-size: 2.2rem;
            margin-bottom: 20px;
        }

        .hero p {
            font-size: 1.2rem;
            max-width: 700px;
            margin: 0 auto 30px;
            opacity: 0.95;
        }

        .stats {
            display: flex;
            justify-content: center;
            gap: 50px;
            margin-top: 40px;
            flex-wrap: wrap;
        }

        .stat-item {
            text-align: center;
        }

        .stat-number {
            font-size: 2rem;
            font-weight: 700;
            display: block;
        }

        .stat-label {
            font-size: 0.9rem;
            opacity: 0.9;
        }

        /* Кнопки */
        .btn {
            display: inline-block;
            background-color: #e67e22;
            color: #fff;
            padding: 12px 30px;
            text-decoration: none;
            border-radius: 5px;
            font-weight: 600;
            transition: background-color 0.3s;
            border: none;
            cursor: pointer;
        }

        .btn:hover {
            background-color: #d35400;
        }

        .btn-outline {
            background-color: transparent;
            border: 2px solid #fff;
        }

        .btn-outline:hover {
            background-color: #fff;
            color: #2c3e50;
        }

        /* Секции */
        .section {
            padding: 60px 0;
        }

        .section-title {
            text-align: center;
            font-size: 2rem;
            margin-bottom: 50px;
            color: #2c3e50;
            position: relative;
        }

        .section-title:after {
            content: '';
            display: block;
            width: 60px;
            height: 3px;
            background-color: #e67e22;
            margin: 15px auto 0;
        }

        /* Категории */
        .categories {
            background-color: #fff;
        }

        .category-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 25px;
        }

        .category-card {
            background-color: #f8f9fa;
            padding: 25px 20px;
            text-align: center;
            border-radius: 8px;
            transition: transform 0.3s, box-shadow 0.3s;
            border: 1px solid #e9ecef;
        }

        .category-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 20px rgba(0,0,0,0.1);
        }

        .category-icon {
            font-size: 2.5rem;
            margin-bottom: 15px;
            display: block;
        }

        .category-card h3 {
            color: #2c3e50;
            margin-bottom: 10px;
        }

        .category-card p {
            color: #7f8c8d;
            font-size: 0.9rem;
        }

        /* Список книг */
        .books-section {
            background-color: #f8f9fa;
        }

        .filter-bar {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 30px;
            flex-wrap: wrap;
            gap: 15px;
        }

        .search-box {
            display: flex;
            gap: 10px;
            flex: 1;
            max-width: 400px;
        }

        .search-box input {
            flex: 1;
            padding: 10px 15px;
            border: 1px solid #ddd;
            border-radius: 5px;
            font-size: 1rem;
        }

        .search-box button {
            padding: 10px 20px;
            background-color: #e67e22;
            color: #fff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        .search-box button:hover {
            background-color: #d35400;
        }

        .category-filter select {
            padding: 10px 15px;
            border: 1px solid #ddd;
            border-radius: 5px;
            font-size: 1rem;
            min-width: 200px;
        }

        .books-table {
            background-color: #fff;
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 0 5px 15px rgba(0,0,0,0.08);
        }

        .book-item {
            display: grid;
            grid-template-columns: 80px 1fr 200px 150px 120px;
            padding: 20px;
            border-bottom: 1px solid #e9ecef;
            transition: background-color 0.3s;
        }

        .book-item:last-child {
            border-bottom: none;
        }

        .book-item:hover {
            background-color: #f8f9fa;
        }

        .book-header {
            background-color: #2c3e50;
            color: #fff;
            font-weight: 600;
            border-bottom: none;
        }

        .book-header:hover {
            background-color: #2c3e50;
        }

        .book-number {
            color: #7f8c8d;
            font-weight: 600;
        }

        .book-title {
            font-weight: 600;
            color: #2c3e50;
        }

        .book-author {
            color: #555;
        }

        .book-category {
            background-color: #e9ecef;
            padding: 4px 10px;
            border-radius: 20px;
            font-size: 0.85rem;
            display: inline-block;
            color: #2c3e50;
        }

        .book-year {
            color: #7f8c8d;
            font-size: 0.95rem;
        }

        .book-status {
            font-weight: 600;
        }

        .status-available {
            color: #27ae60;
        }

        .status-busy {
            color: #e67e22;
        }

        .status-repair {
            color: #e74c3c;
        }

        /* Информационные блоки */
        .info-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 30px;
        }

        .info-card {
            background-color: #fff;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 5px 15px rgba(0,0,0,0.05);
        }

        .info-card h3 {
            color: #2c3e50;
            margin-bottom: 20px;
            font-size: 1.3rem;
        }

        .info-card ul {
            list-style: none;
        }

        .info-card li {
            margin-bottom: 15px;
            padding-left: 25px;
            position: relative;
        }

        .info-card li:before {
            content: "✓";
            color: #27ae60;
            position: absolute;
            left: 0;
        }

        .schedule-item {
            display: flex;
            justify-content: space-between;
            padding: 10px 0;
            border-bottom: 1px solid #e9ecef;
        }

        .schedule-item:last-child {
            border-bottom: none;
        }

        .schedule-day {
            font-weight: 600;
        }

        /* Контакты */
        .contacts {
            background-color: #fff;
        }

        .contact-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 30px;
            text-align: center;
        }

        .contact-item {
            padding: 20px;
        }

        .contact-icon {
            font-size: 2.5rem;
            margin-bottom: 15px;
            display: block;
        }

        .contact-item h3 {
            color: #2c3e50;
            margin-bottom: 10px;
        }

        /* Подвал */
        footer {
            background-color: #2c3e50;
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
                gap: 15px;
            }

            .hero h2 {
                font-size: 1.8rem;
            }

            .stats {
                gap: 25px;
            }

            .book-item {
                grid-template-columns: 1fr;
                gap: 10px;
                padding: 15px;
            }

            .book-header {
                display: none;
            }

            .filter-bar {
                flex-direction: column;
            }

            .search-box {
                max-width: 100%;
            }

            .category-filter select {
                width: 100%;
            }
        }
    </style>
</head>
<body>
    <?php
    // Массив с категориями книг
    $categories = [
        ['name' => 'Математика', 'icon' => '📐', 'count' => 5],
        ['name' => 'Физика', 'icon' => '⚡', 'count' => 3],
        ['name' => 'Программирование', 'icon' => '💻', 'count' => 4],
        ['name' => 'Иностранные языки', 'icon' => '🌍', 'count' => 3],
        ['name' => 'История', 'icon' => '📜', 'count' => 2],
        ['name' => 'Экономика', 'icon' => '📊', 'count' => 3]
    ];

    // Массив с книгами (20 учебников)
    $books = [
        [
            'title' => 'Высшая математика для технических специальностей',
            'author' => 'Д.Т. Письменный',
            'category' => 'Математика',
            'year' => 2023,
            'status' => 'available',
            'status_text' => 'В наличии'
        ],
        [
            'title' => 'Курс общей физики (в 3 томах)',
            'author' => 'И.В. Савельев',
            'category' => 'Физика',
            'year' => 2022,
            'status' => 'available',
            'status_text' => 'В наличии'
        ],
        [
            'title' => 'Изучаем Python',
            'author' => 'Марк Лутц',
            'category' => 'Программирование',
            'year' => 2023,
            'status' => 'busy',
            'status_text' => 'Выдана'
        ],
        [
            'title' => 'Английский для IT-специалистов',
            'author' => 'Е.В. Карлова',
            'category' => 'Иностранные языки',
            'year' => 2022,
            'status' => 'available',
            'status_text' => 'В наличии'
        ],
        [
            'title' => 'История России с древнейших времен',
            'author' => 'С.М. Соловьев',
            'category' => 'История',
            'year' => 2021,
            'status' => 'repair',
            'status_text' => 'На реставрации'
        ],
        [
            'title' => 'Экономическая теория',
            'author' => 'В.Д. Камаев',
            'category' => 'Экономика',
            'year' => 2023,
            'status' => 'available',
            'status_text' => 'В наличии'
        ],
        [
            'title' => 'Алгебра и начала анализа',
            'author' => 'А.Г. Мордкович',
            'category' => 'Математика',
            'year' => 2022,
            'status' => 'available',
            'status_text' => 'В наличии'
        ],
        [
            'title' => 'Сборник задач по физике',
            'author' => 'А.П. Рымкевич',
            'category' => 'Физика',
            'year' => 2023,
            'status' => 'busy',
            'status_text' => 'Выдана'
        ],
        [
            'title' => 'Java. Полное руководство',
            'author' => 'Герберт Шилдт',
            'category' => 'Программирование',
            'year' => 2023,
            'status' => 'available',
            'status_text' => 'В наличии'
        ],
        [
            'title' => 'Немецкий язык для начинающих',
            'author' => 'С.Л. Яцковская',
            'category' => 'Иностранные языки',
            'year' => 2022,
            'status' => 'available',
            'status_text' => 'В наличии'
        ],
        [
            'title' => 'Геометрия. 10-11 классы',
            'author' => 'Л.С. Атанасян',
            'category' => 'Математика',
            'year' => 2023,
            'status' => 'available',
            'status_text' => 'В наличии'
        ],
        [
            'title' => 'Основы программирования на C++',
            'author' => 'С. Прата',
            'category' => 'Программирование',
            'year' => 2022,
            'status' => 'busy',
            'status_text' => 'Выдана'
        ],
        [
            'title' => 'Французский язык. Грамматика',
            'author' => 'И.Н. Попова',
            'category' => 'Иностранные языки',
            'year' => 2021,
            'status' => 'available',
            'status_text' => 'В наличии'
        ],
        [
            'title' => 'История Средних веков',
            'author' => 'М.Л. Абрамсон',
            'category' => 'История',
            'year' => 2022,
            'status' => 'available',
            'status_text' => 'В наличии'
        ],
        [
            'title' => 'Микроэкономика',
            'author' => 'Р.С. Пиндайк',
            'category' => 'Экономика',
            'year' => 2023,
            'status' => 'available',
            'status_text' => 'В наличии'
        ],
        [
            'title' => 'Дифференциальные уравнения',
            'author' => 'В.В. Степанов',
            'category' => 'Математика',
            'year' => 2021,
            'status' => 'busy',
            'status_text' => 'Выдана'
        ],
        [
            'title' => 'Теоретическая физика',
            'author' => 'Л.Д. Ландау',
            'category' => 'Физика',
            'year' => 2022,
            'status' => 'repair',
            'status_text' => 'На реставрации'
        ],
        [
            'title' => 'Web-программирование для начинающих',
            'author' => 'Д.В. Котеров',
            'category' => 'Программирование',
            'year' => 2023,
            'status' => 'available',
            'status_text' => 'В наличии'
        ],
        [
            'title' => 'Макроэкономика',
            'author' => 'Н.Г. Мэнкью',
            'category' => 'Экономика',
            'year' => 2023,
            'status' => 'available',
            'status_text' => 'В наличии'
        ],
        [
            'title' => 'Линейная алгебра',
            'author' => 'В.А. Ильин',
            'category' => 'Математика',
            'year' => 2022,
            'status' => 'available',
            'status_text' => 'В наличии'
        ]
    ];

    // Подсчет статистики
    $totalBooks = count($books);
    $availableBooks = count(array_filter($books, function($book) {
        return $book['status'] === 'available';
    }));
    $busyBooks = count(array_filter($books, function($book) {
        return $book['status'] === 'busy';
    }));

    // Текущая дата и время
    $currentDate = date('d.m.Y');
    $currentTime = date('H:i');
    $currentYear = date('Y');
    ?>

    <!-- Шапка сайта -->
    <header>
        <div class="container">
            <div class="logo">
                <h1>📚 Библиотека колледжа</h1>
                <p>Учебная литература для студентов</p>
            </div>
            <nav>
                <ul>
                    <li><a href="#home">Главная</a></li>
                    <li><a href="#books">Книги</a></li>
                    <li><a href="#info">Информация</a></li>
                    <li><a href="#contacts">Контакты</a></li>
                </ul>
            </nav>
        </div>
    </header>

    <!-- Главный баннер -->
    <section id="home" class="hero">
        <div class="container">
            <h2>Добро пожаловать в библиотеку колледжа!</h2>
            <p>У нас вы найдете всю необходимую учебную литературу. Фонд постоянно обновляется новыми изданиями.</p>
            <a href="#books" class="btn">Список учебников</a>

            <div class="stats">
                <div class="stat-item">
                    <span class="stat-number"><?php echo $totalBooks; ?></span>
                    <span class="stat-label">Всего книг</span>
                </div>
                <div class="stat-item">
                    <span class="stat-number"><?php echo $availableBooks; ?></span>
                    <span class="stat-label">Доступно</span>
                </div>
                <div class="stat-item">
                    <span class="stat-number"><?php echo $busyBooks; ?></span>
                    <span class="stat-label">Выдано</span>
                </div>
                <div class="stat-item">
                    <span class="stat-number">6</span>
                    <span class="stat-label">Категорий</span>
                </div>
            </div>
        </div>
    </section>

    <!-- Категории -->
    <section class="section categories">
        <div class="container">
            <h2 class="section-title">Категории учебной литературы</h2>
            <div class="category-grid">
                <?php foreach ($categories as $category): ?>
                <div class="category-card">
                    <span class="category-icon"><?php echo $category['icon']; ?></span>
                    <h3><?php echo $category['name']; ?></h3>
                    <p><?php echo $category['count']; ?> учебников</p>
                </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

    <!-- Список книг -->
    <section id="books" class="section books-section">
        <div class="container">
            <h2 class="section-title">Учебники и пособия</h2>

            <div class="filter-bar">
                <div class="search-box">
                    <input type="text" placeholder="Поиск по названию или автору...">
                    <button>Найти</button>
                </div>
                <div class="category-filter">
                    <select>
                        <option value="all">Все категории</option>
                        <option value="math">Математика</option>
                        <option value="physics">Физика</option>
                        <option value="programming">Программирование</option>
                        <option value="languages">Иностранные языки</option>
                        <option value="history">История</option>
                        <option value="economics">Экономика</option>
                    </select>
                </div>
            </div>

            <div class="books-table">
                <div class="book-item book-header">
                    <div>№</div>
                    <div>Название</div>
                    <div>Автор</div>
                    <div>Категория</div>
                    <div>Год</div>
                    <div>Статус</div>
                </div>

                <?php foreach ($books as $index => $book):
                    $statusClass = '';
                    switch($book['status']) {
                        case 'available':
                            $statusClass = 'status-available';
                            break;
                        case 'busy':
                            $statusClass = 'status-busy';
                            break;
                        case 'repair':
                            $statusClass = 'status-repair';
                            break;
                    }
                ?>
                <div class="book-item">
                    <div class="book-number"><?php echo str_pad($index + 1, 2, '0', STR_PAD_LEFT); ?></div>
                    <div class="book-title"><?php echo $book['title']; ?></div>
                    <div class="book-author"><?php echo $book['author']; ?></div>
                    <div><span class="book-category"><?php echo $book['category']; ?></span></div>
                    <div class="book-year"><?php echo $book['year']; ?></div>
                    <div class="book-status <?php echo $statusClass; ?>"><?php echo $book['status_text']; ?></div>
                </div>
                <?php endforeach; ?>
            </div>

            <div style="text-align: center; margin-top: 30px;">
                <p>Всего книг в базе: <strong><?php echo $totalBooks; ?></strong></p>
            </div>
        </div>
    </section>

    <!-- Информация -->
    <section id="info" class="section">
        <div class="container">
            <h2 class="section-title">Полезная информация</h2>
            <div class="info-grid">
                <div class="info-card">
                    <h3>📋 Правила пользования</h3>
                    <ul>
                        <li>Студенческий билет обязателен</li>
                        <li>Срок выдачи учебников - 1 семестр</li>
                        <li>Художественная литература - 30 дней</li>
                        <li>Продление возможно при отсутствии задолженностей</li>
                        <li>За утерю книги предусмотрена замена</li>
                    </ul>
                </div>
                <div class="info-card">
                    <h3>🕒 Режим работы</h3>
                    <div class="schedule-item">
                        <span class="schedule-day">Понедельник - Пятница</span>
                        <span>9:00 - 19:00</span>
                    </div>
                    <div class="schedule-item">
                        <span class="schedule-day">Суббота</span>
                        <span>10:00 - 17:00</span>
                    </div>
                    <div class="schedule-item">
                        <span class="schedule-day">Воскресенье</span>
                        <span>Выходной</span>
                    </div>
                    <div class="schedule-item">
                        <span class="schedule-day">Последний день месяца</span>
                        <span>Санитарный день</span>
                    </div>
                </div>
                <div class="info-card">
                    <h3>📢 Объявления</h3>
                    <ul>
                        <li>Новые поступления учебников по программированию</li>
                        <li>С 1 сентября изменен режим работы</li>
                        <li>Сдача учебников за прошлый семестр до 15 июля</li>
                        <li>Начата запись в электронную библиотеку</li>
                    </ul>
                </div>
            </div>
        </div>
    </section>

    <!-- Контакты -->
    <section id="contacts" class="section contacts">
        <div class="container">
            <h2 class="section-title">Контакты</h2>
            <div class="contact-grid">
                <div class="contact-item">
                    <span class="contact-icon">📍</span>
                    <h3>Адрес</h3>
                    <p>ул. Студенческая, д. 15</p>
                    <p>3 этаж, крыло Б</p>
                </div>
                <div class="contact-item">
                    <span class="contact-icon">📞</span>
                    <h3>Телефон</h3>
                    <p>+7 (495) 123-45-67</p>
                    <p>(доб. 123 - библиотека)</p>
                </div>
                <div class="contact-item">
                    <span class="contact-icon">✉️</span>
                    <h3>Email</h3>
                    <p>library@college.ru</p>
                    <p>book@college.ru</p>
                </div>
                <div class="contact-item">
                    <span class="contact-icon">👩‍🏫</span>
                    <h3>Заведующая</h3>
                    <p>Петрова Анна Ивановна</p>
                    <p>каб. 312</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Подвал -->
    <footer>
        <div class="container">
            <p>&copy; <?php echo $currentYear; ?> Библиотека колледжа. Все права защищены.</p>
            <p style="margin-top: 10px; font-size: 0.9rem;">Сегодня <?php echo $currentDate; ?>, текущее время <?php echo $currentTime; ?></p>
        </div>
    </footer>
</body>
</html>