document.getElementById('adForm').addEventListener('submit', function(e) {
    e.preventDefault();

    const title = document.getElementById('title').value.trim();
    const text = document.getElementById('text').value.trim();
    const messageEl = document.getElementById('message');

    if (!title || !text) {
        messageEl.textContent = 'Заполните все поля!';
        messageEl.style.color = 'red';
        return;
    }

    // В реальном проекте здесь был бы AJAX-запрос к PHP для сохранения в БД.
    // У нас всё статично, поэтому просто выводим сообщение.

    messageEl.textContent = 'Объявление успешно добавлено!';
    messageEl.style.color = 'green';

    // Очистка формы
    this.reset();
});