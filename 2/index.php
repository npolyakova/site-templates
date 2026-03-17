<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Объявления ЖК «Уютный»</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<header>
    <h1>Жилой комплекс «Уютный»</h1>
    <p>Актуальные объявления для жителей</p>
</header>

<main>
    <!-- Объявления публикуем по просьбам -->
    <section class="announcements">
        <?php
        $ads = [
            [
                'title' => 'Срочно сдается квартира №45',
                'text' => '2-комнатная квартира, 5 этаж, после ремонта. Без посредников.',
                'date' => '15.03.2026'
            ],
            [
                'title' => 'Продам детскую коляску',
                'text' => 'Почти новая, б/у 3 месяца. Цена договорная.',
                'date' => '10.03.2026'
            ],
            [
                'title' => 'Ищу компанию для прогулок с собакой',
                'text' => 'Гуляем по вечерам у дома. Пишите в личные сообщения.',
                'date' => '05.03.2026'
            ]
        ];

        foreach ($ads as $ad) {
            echo '
            <div class="announcement">
                <h2>' . $ad['title'] . '</h2>
                <p>' . $ad['text'] . '</p>
                <small>' . $ad['date'] . '</small>
            </div>';
        }
        ?>
    </section>

    <!-- Пока не работает -->
    <section class="add-form">
        <h2>Добавить объявление</h2>
        <form id="adForm">
            <input type="text" id="title" placeholder="Заголовок" required>
            <textarea id="text" placeholder="Текст объявления" required></textarea>
            <button type="submit">Опубликовать</button>
        </form>
        <div id="message"></div>
    </section>
</main>

<footer>
    <p>© 2026 ЖК «Уютный». Все права защищены.</p>
</footer>

<script src="script.js"></script>
</body>
</html>