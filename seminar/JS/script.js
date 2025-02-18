

// JavaScript pro funkci tlačítka
const tlacitko = document.getElementById('schovatTlacitko');
const nadpis = document.getElementById('nadpis');

tlacitko.addEventListener('click', () => {
    if (nadpis.style.display === 'none') {
        nadpis.style.display = 'block'; // Obnoví zobrazení nadpisu
        tlacitko.textContent = 'Schovat nadpis'; // Změní text tlačítka
    } else {
        nadpis.style.display = 'none'; // Skryje nadpis
        tlacitko.textContent = 'Zobrazit nadpis'; // Změní text tlačítka
    }
});
