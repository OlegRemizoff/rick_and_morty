
let csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
const tableBody = document.querySelector('.table.table-hover tbody');
const sField = document.getElementById('search');
const paginate = document.querySelector('.pagination');
const clearBtn = document.querySelector('.custom-btn');

// Поиск
sField.addEventListener('input', (e) => {
    let search = e.target.value.trim();
    if (search.length > 2) {
        fetch("/search", {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': csrfToken  
            },
            body: JSON.stringify({ search: search })
        })
        .then(response => {
            if (!response.ok) throw new Error('Network response was not ok');
            return response.text();
        })
        .then(html => {
            tableBody.innerHTML = html; // Вставляем только строки таблицы
        })
        .catch(error => {
            console.error('Ошибка:', error);
            tableBody.innerHTML = '<tr><td colspan="6">Произошла ошибка при поиске</td></tr>';
        });
    } else {
        tableBody.innerHTML = '';
        paginate.hidden = true;
        clearBtn.hidden = true;
    }
});












// Анимация заполнения Бд
document.getElementById('fillDatabaseButton').addEventListener('click', function() {
    const button = this;
    const spinner = document.getElementById('loadingSpinner');

    // Показываем спиннер и сообщение
    spinner.style.display = 'block';

    // Блокируем кнопку и меняем её текст
    button.disabled = true;
    button.textContent = 'Идёт заполнение...';

    // Симуляция длительной операции (замените на ваш код)
    setTimeout(() => {
        // Скрываем спиннер и разблокируем кнопку после завершения
        spinner.style.display = 'none';
        button.disabled = false;
        button.textContent = 'Заполнить базу данных';

        // Сообщение об успешном завершении
        // alert('База данных успешно заполнена!');
    }, 6000); // Замените 3000 на время выполнения вашей операции
});
