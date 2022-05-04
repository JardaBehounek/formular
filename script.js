const price = document.querySelector("#price")
const pieces = document.querySelector("#pcs")
const tax = document.querySelector("#tax")
const totalPrice = document.querySelector("#totalPrice")
const btn = document.querySelector("#btn")

let newPrice = (price.value * pieces.value)+(price.value * pieces.value * tax.value)
    totalPrice.textContent = newPrice

document.querySelector("#price").addEventListener("click", () => {
    let newPrice = (price.value * pieces.value)+(price.value * pieces.value * tax.value)
    totalPrice.textContent = newPrice
})
document.querySelector("#pcs").addEventListener("click", () => {
    let newPrice = (price.value * pieces.value)+(price.value * pieces.value * tax.value)
    totalPrice.textContent = newPrice
})
document.querySelector("#tax").addEventListener("click", () => {
    let newPrice = (price.value * pieces.value)+(price.value * pieces.value * tax.value)
    totalPrice.textContent = newPrice
})


const currency = document.querySelector('#currencySelection')

console.log(currency)

currency.addEventListener('change', function (){
    console.log( currency.value) 
})
const priceInForeignCurrency = foreignCurrency * totalPrice

document.querySelector('#foreignCurrency').textContent = priceInForeignCurrency



