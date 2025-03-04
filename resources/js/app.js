import './bootstrap';

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

window.showTab = function(tabId) {
    document.querySelectorAll('.tab-content').forEach(tab => {
        tab.classList.add('hidden');
    });

    document.getElementById(tabId).classList.remove('hidden');

    document.querySelectorAll('.transaction-form').forEach(form => {
        form.classList.add('hidden');
    });

    if (tabId === 'transaction-list-output') {
        document.getElementById('form-output').classList.remove('hidden');
    } else if (tabId === 'transaction-list-income') {
        document.getElementById('form-income').classList.remove('hidden');
    } else if (tabId === 'transaction-list-invest') {
        document.getElementById('form-invest').classList.remove('hidden');
    }
};

window.validateForm = function() {
    let valid = true;
    let amount, date;

    if (!document.getElementById('form-output').classList.contains('hidden')) {
        amount = document.getElementById('amountOutput');
        date = document.getElementById('dateOutput');
    } else if (!document.getElementById('form-income').classList.contains('hidden')) {
        amount = document.getElementById('amountIncome');
        date = document.getElementById('dateIncome');
    }

    if (amount) amount.classList.remove('border-red-500');
    if (date) date.classList.remove('border-red-500');

    if (!amount || !amount.value) {
        amount.classList.add('border-red-500');
        valid = false;
    }

    if (!date || !date.value) {
        date.classList.add('border-red-500');
        valid = false;
    }

    return valid;
};

console.log('JS funguje!');
