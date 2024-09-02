// src/__test__/weather.test.js

import { describe, it, expect, beforeEach, vi } from 'vitest';

// HTML de base pour les tests
document.body.innerHTML = `
    <div class="container">
        <div class="weather-box hidden">
            <img />
            <div class="temperature"></div>
            <div class="description"></div>
        </div>
        <div class="weather-details hidden">
            <div class="humidity"><span></span></div>
            <div class="wind"><span></span></div>
        </div>
        <div class="not-found hidden"></div>
        <div class="search-box">
            <input value="Paris" />
            <button>Search</button>
        </div>
    </div>
`;

// Mock de la fonction fetch
global.fetch = vi.fn(() =>
    Promise.resolve({
        json: () => {
            console.log('Fetch called'); // Debug
            return Promise.resolve({
                cod: '200',
                weather: [{ main: 'Clear', description: 'clear sky' }],
                main: { temp: 25, humidity: 60 },
                wind: { speed: 10 }
            });
        }
    })
);

const script = document.createElement('script');
script.src = '/public/js/weather.js';
document.head.appendChild(script);

describe('Weather JS', () => {
    beforeEach(async () => {
        await new Promise(resolve => script.onload = resolve);
        console.log('Script loaded');
        document.querySelector('.search-box button').click();
    });

    it('should display weather data correctly', async () => {
        await new Promise(resolve => setTimeout(resolve, 200)); // Attendre l'exécution du script

        // Vérifiez les classes
        console.log('Weather Box Classes:', document.querySelector('.weather-box').classList);
        console.log('Weather Details Classes:', document.querySelector('.weather-details').classList);

        // Vérifiez les éléments
        const temperatureElement = document.querySelector('.weather-box .temperature');
        console.log('Temperature Element HTML:', temperatureElement.innerHTML); // Debug
        const temperature = temperatureElement.innerHTML;

        const description = document.querySelector('.weather-box .description').textContent;
        const humidity = document.querySelector('.weather-details .humidity span').textContent;
        const wind = document.querySelector('.weather-details .wind span').textContent;
        const notFound = document.querySelector('.not-found');

        expect(temperature).toBe('25<span>C</span>');
        expect(description).toBe('clear sky');
        expect(humidity).toBe('60%');
        expect(wind).toBe('10Km/h');
        expect(notFound.classList.contains('hidden')).toBe(true);

        const weatherBox = document.querySelector('.weather-box');
        const weatherDetails = document.querySelector('.weather-details');
        expect(weatherBox.classList.contains('hidden')).toBe(false);
        expect(weatherDetails.classList.contains('hidden')).toBe(false);
    }); // Augmenter le délai d'attente pour ce test
});
