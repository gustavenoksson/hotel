<?php
require __DIR__ . "/vendor/autoload.php";
require __DIR__ . "/calendar.php";
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Hotel</title>
    <link rel="stylesheet" href="css/style.css" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Barrio&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Acme&display=swap" rel="stylesheet">
  </head>

  <body>
    <header>
        <img class="yellowDuckFront" src="images/yellowDuckFront.webp" alt="A yellow duck pointing forwards.">
        <h1>The Yellow Duck <br> Hotel</h1>
    </header>
    <main>
      <!-- About section -->
      <section class="aboutSection">
        <div class="aboutBox">
          <img src="images/island.jpeg" alt="Image of an island.">
          <div class="aboutTextBox">
            <h2>About us</h2>
            <p>Located somewhere in the ocean is the beautiful island of the yellow ducks. Feel free to book a room and enjoy an exiting adventure!</p>
          </div>
        </div>
      </section>
      <!-- Rooms section -->
      <section class="roomsSections">
        <div class="roomOne">
          <img class="roomImg" src="images/budgetRoom.jpg" alt="">
          <p class="priceShowcase">Budget 1$</p>
          <?php
          echo $budgetCalendar->draw(date('2023-01-01'),"green");
          ?>
        </div>
        <div class="roomTwo">
          <img class="roomImg" src="images/standardRoom.jpg" alt="">
          <p class="priceShowcase showcaseStandard">Standard 2$</p>
          <?php
          echo $standardCalendar->draw(date('2023-01-01'),"green");
          ?>
        </div>
        <div class="roomThree">
          <img class="roomImg" src="images/luxuryRoom.jpg" alt="">
          <p class="priceShowcase">Luxury 3$</p>
          <?php
          echo $luxuryCalendar->draw(date('2023-01-01'), "green");
          ?>
        </div>
      </section>

      <!-- Dates Section -->
      <section class="datesSection">
        <form action="app/posts/booking.php" class="bookingForm" method="POST">
          <!-- Transfercode -->
          <label for="transferCode">Transfer code</label>
          <input type="text" name="transferCode" required="true"/>
          <!-- Dates -->
          <label for="arrival">Arrival</label>
          <input
            type="date"
            name="arrival"
            min="2023-01-01"
            max="2023-01-31"
            required="true"
            id="arrival"
          />
          <label for="departure">Departure</label>
          <input
            type="date"
            name="departure"
            min="2023-01-01"
            max="2023-01-31"
            required="true"
            id="departure"
          />
          <!-- Rooms -->
          <label for="room">Rooms</label>
          <select name="room" required="true" id="room">
            <option value="1">Budget 1$</option>
            <option value="2">Standard 2$</option>
            <option value="3">Luxury 3$</option>
          </select>
          <!-- Total Amount -->
          <label for="totalAmount">Total Amount:</label>
          <input name="totalAmount" type="text" readonly id="totalAmount">
          <button type="submit" class="submitBtn">Confirm Reservation</button>
        </form>
      </section>
    </main>
    <footer>
      <p class="footerInfo">The Yellow Duck Hotel ©</p>
    </footer>
  <script src="script.js"></script>
  </body>
</html>