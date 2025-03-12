
// Обработчик события для кнопки
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
