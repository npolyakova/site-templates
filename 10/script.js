// URL API (эмулируется, замените на реальный эндпоинт)
const API_URL = '/api/talks';

// Ключ в localStorage для хранения уже проголосовавших ID
const VOTED_KEY = 'votedTalks';

// Загрузка списка докладов
async function loadTalks() {
    try {
        const response = await fetch(API_URL);
        const talks = await response.json();
        renderTalks(talks);
    } catch (e) {
        console.error('Ошибка загрузки докладов:', e);
        document.getElementById('talks-list').innerHTML = '<p>Не удалось загрузить список докладов.</p>';
    }
}

// Отрисовка карточек докладов
function renderTalks(talks) {
    const container = document.getElementById('talks-list');
    container.innerHTML = '';

    talks.forEach(talk => {
        const voted = hasVoted(talk.id);

        const card = document.createElement('div');
        card.className = 'talk-card';
        card.innerHTML = `
            <h2>${talk.title}</h2>
            <p><strong>Докладчик:</strong> ${talk.speaker}</p>
            <div class="vote-section">
                <button class="vote-button" data-id="${talk.id}" ${voted ? 'disabled' : ''}>
                    ❤️
                </button>
                <span class="vote-count">${talk.votes || 0}</span>
            </div>
        `;

        const button = card.querySelector('.vote-button');
        if (!voted) {
            button.addEventListener('click', () => handleVote(talk.id, button, card));
        }

        container.appendChild(card);
    });
}

// Проверка, голосовал ли уже пользователь за этот доклад
function hasVoted(id) {
    const voted = JSON.parse(localStorage.getItem(VOTED_KEY) || '[]');
    return voted.includes(id);
}

// Обработка голоса
async function handleVote(id, button, card) {
    button.disabled = true;

    try {
        const response = await fetch(`/api/talks/${id}/vote`, {
            method: 'POST',
            headers: { 'Content-Type': 'application/json' },
            body: JSON.stringify({ talk_id: id })
        });

        if (!response.ok) throw new Error('Ошибка голосования');

        // Увеличиваем счётчик на фронтенде (оптимистично)
        const countEl = card.querySelector('.vote-count');
        countEl.textContent = parseInt(countEl.textContent) + 1;

        // Сохраняем факт голосования в localStorage
        const voted = JSON.parse(localStorage.getItem(VOTED_KEY) || '[]');
        voted.push(id);
        localStorage.setItem(VOTED_KEY, JSON.stringify(voted));

        button.classList.add('active');
        button.textContent = '✅';

    } catch (e) {
        console.error('Ошибка:', e);
        alert('Не удалось отправить голос. Попробуйте позже.');
        button.disabled = false; // Возвращаем возможность нажать, если ошибка
    }
}

// Инициализация при загрузке страницы
document.addEventListener('DOMContentLoaded', loadTalks);