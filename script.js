const main = document.querySelector('main');
const form = document.querySelector('form');

let arrivalDate = document.getElementById('arrival').value;
let departureDate = document.getElementById('departure').value;

const totalAmount = document.createElement('p');
totalAmount.textContent = arrivalDate + departureDate;

totalAmount.textContent = arrivalDate;
