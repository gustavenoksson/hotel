const main = document.querySelector('main');
const form = document.querySelector('form');
const roomSelect = document.getElementById('room');

const calcPrice = () => {
  const arrivalDate = document.getElementById('arrival').value;
  const departureDate = document.getElementById('departure').value;
  const totalDays =
    departureDate.split('-').pop() - arrivalDate.split('-').pop();
  const roomId = roomSelect.options[roomSelect.selectedIndex].value;
  const totalAmountInput = document.getElementById('totalAmount');

  const featureOne = document.getElementById('dvdPlayer');
  const featureTwo = document.getElementById('slippers');
  const featureThree = document.getElementById('spa');

  let roomPrice;
  if (roomId == 1) {
    roomPrice = 1;
  } else if (roomId == 2) {
    roomPrice = 2;
  } else if (roomId == 3) {
    roomPrice = 3;
  }

  if (totalDays < 0) {
    roomPrice = 0;
  }

  const totalAmount = roomPrice * totalDays;
  totalAmountInput.value = totalAmount;
};

form.addEventListener('change', () => {
  calcPrice();
});

/* Buttons to reveal logbook and factbox /AB */
const logbookBtn = document.querySelector('.logbookBtn');
const revenueBtn = document.querySelector('.revenueBtn');

const logbook = document.querySelector('.cards');
const revenue = document.querySelector('.factBox');


logbookBtn.addEventListener('click', function(){
  logbook.classList.toggle('invisible');
  revenue.classList.add('invisible');
})

revenueBtn.addEventListener('click', function(){
  revenue.classList.toggle('invisible');
  logbook.classList.add('invisible');
})
