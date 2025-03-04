require('./bootstrap');


    document.addEventListener("DOMContentLoaded", function () {
    const today = new Date().toISOString().split('T')[0];

    if (document.getElementById('dateOutput')) {
    document.getElementById('dateOutput').value = today;
}
    if (document.getElementById('dateIncome')) {
    document.getElementById('dateIncome').value = today;
}

    // Výchozí zobrazení formuláře pro výdaje
    document.getElementById('form-output').classList.remove('hidden');
});

    function showTab(tabId) {
    // Skrytí všech záložek obsahu
    document.querySelectorAll('.tab-content').forEach(tab => {
        tab.classList.add('hidden');
    });
    // Zobrazení vybrané záložky
    document.getElementById(tabId).classList.remove('hidden');

    // Skrytí všech formulářů
    document.querySelectorAll('.transaction-form').forEach(form => {
    form.classList.add('hidden');
});

    // Zobrazení odpovídajícího formuláře
    if (tabId === 'transaction-list-output') {
    document.getElementById('form-output').classList.remove('hidden');
} else if (tabId === 'transaction-list-income') {
    document.getElementById('form-income').classList.remove('hidden');
} else if (tabId === 'transaction-list-invest') {
    document.getElementById('form-invest').classList.remove('hidden');
}
}

    function validateForm() {
    let valid = true;
    let amount, date;

    // Určení aktivní záložky a přiřazení správných polí
    if (!document.getElementById('form-output').classList.contains('hidden')) {
    amount = document.getElementById('amountOutput');
    date = document.getElementById('dateOutput');
} else if (!document.getElementById('form-income').classList.contains('hidden')) {
    amount = document.getElementById('amountIncome');
    date = document.getElementById('dateIncome');
}

    // Resetování chybových stavů
    if (amount) amount.classList.remove('border-red-500');
    if (date) date.classList.remove('border-red-500');

    // Kontrola, zda bylo vyplněno pole amount
    if (!amount || !amount.value) {
    amount.classList.add('border-red-500');
    valid = false;
}

    // Kontrola, zda bylo vyplněno pole date
    if (!date || !date.value) {
    date.classList.add('border-red-500');
    valid = false;
}

    return valid;
}
