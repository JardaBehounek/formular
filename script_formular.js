const kurz = document.querySelector('#currencySelection')
const cena = document.querySelector('#celkova').textContent

document.querySelector('#foreignCurrency').textContent = cena/kurz.value

kurz.addEventListener('click', function() {
document.querySelector('#foreignCurrency').textContent = cena/kurz.value
})