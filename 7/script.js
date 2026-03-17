// Примерные URL для API (замените на реальные, когда будет бэкенд)
const CURRENCY_API_URL = '/api/currency';
const WEATHER_API_URL = '/api/weather';

// Функция для получения данных с API
async function fetchData(url) {
    try {
        const response = await fetch(url);
        if (!response.ok) throw new Error('Ошибка сети или сервера');
        return await response.json();
    } catch (error) {
        console.error('Ошибка получения данных:', error);
        return null;
    }
}

// Отображение курсов валют
async function renderCurrencyWidget() {
    const widget = document.getElementById('currency-widget');
    const data = await fetchData(CURRENCY_API_URL);

    if (!data) {
        widget.innerHTML = '<p>Не удалось загрузить курсы валют.</p>';
        return;
    }

    // Пример структуры данных:
    // { USD: { rate: 92.5 }, EUR: { rate: 100.3 } }
    const html = `
        <p>USD: ${data.USD?.rate || '—'} ₽</p>
        <p>EUR: ${data.EUR?.rate || '—'} ₽</p>
    `;
    widget.innerHTML = html;
}

// Отображение погоды
async function renderWeatherWidget() {
    const widget = document.getElementById('weather-widget');
    const data = await fetchData(WEATHER_API_URL);

    if (!data) {
        widget.innerHTML = '<p>Не удалось загрузить погоду.</p>';
        return;
    }

    // Пример структуры данных:
    // { city: 'Москва', temp: 5, condition: 'облачно' }
    const html = `
        <p>Город: ${data.city || '—'}</p>
        <p>Температура: ${data.temp !== undefined ? data.temp + '°C' : '—'}</p>
        <p>Состояние: ${data.condition || '—'}</p>
    `;
    widget.innerHTML = html;
}

// Инициализация виджетов
document.addEventListener('DOMContentLoaded', () => {
    renderCurrencyWidget();
    renderWeatherWidget();
});