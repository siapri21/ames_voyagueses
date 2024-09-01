// public/js/weather.js
document.addEventListener('DOMContentLoaded', () => {
    const container = document.querySelector('.container');
    const searchButton = document.querySelector('.search-box button');
    const weatherBox = document.querySelector('.weather-box');
    const weatherDetails = document.querySelector('.weather-details');
    const error404 = document.querySelector('.not-found');

    searchButton.addEventListener('click', () => {
        const APIKey = 'e1039b3fe7762e9d6738cbdc81e0a6bb';
        const city = document.querySelector('.search-box input').value;

        if (city === '') return;

        fetch(`https://api.openweathermap.org/data/2.5/weather?q=${city}&units=metric&appid=${APIKey}`)
            .then(response => response.json())
            .then(json => {
                if (json.cod === '404') {
                    container.style.height = '400px';
                    weatherBox.classList.add('hidden');
                    weatherDetails.classList.add('hidden');
                    error404.classList.remove('hidden');
                    return;
                }

                error404.classList.add('hidden');
                weatherBox.classList.remove('hidden');
                weatherDetails.classList.remove('hidden');

                const image = weatherBox.querySelector('img');
                const temperature = weatherBox.querySelector('.temperature');
                const description = weatherBox.querySelector('.description');
                const humidity = weatherDetails.querySelector('.humidity span');
                const wind = weatherDetails.querySelector('.wind span');

                switch (json.weather[0].main) {
                    case 'Clear':
                        image.src = '/images/clear.png';
                        break;
                    // ... autres cas ...
                }

                temperature.innerHTML = `${parseInt(json.main.temp)}<span>C</span>`;
                description.textContent = json.weather[0].description;
                humidity.textContent = `${json.main.humidity}%`;
                wind.textContent = `${parseInt(json.wind.speed)}Km/h`;

                container.style.height = '555px';
            });
    });
});