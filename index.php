<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Hotel</title>
    <link rel="stylesheet" href="css/style.css" />
  </head>
  <body>
    <header></header>
    <main>
      <section class="roomsSections">
        <div class="roomOne">
          <img class="roomImg" src="images/budgetHotelRoom.jpeg" alt="">
          <?php
          require "calendar.php";
          ?>
        </div>
        <div class="roomTwo">
          <img class="roomImg" src="images/budgetHotelRoom.jpeg" alt="">
          <?php
          require "calendar.php";
          ?>
        </div>
        <div class="roomThree">
          <img class="roomImg" src="images/budgetHotelRoom.jpeg" alt="">
          <?php
          require "calendar.php";
          ?>
        </div>
      </section>
      <section class="datesSection">
      <form action="payment.php" class="bookingForm">
        <label for="transferCode">Transfer code</label>
        <input type="text" name="transferCode" required="true"/>
        <label for="arrival"></label>
        <input
          type="date"
          name="arrival"
          min="2023-01-01"
          max="2023-01-31"
          required="true"
        />
        <label for="departure"></label>
        <input
          type="date"
          name="departure"
          min="2023-01-01"
          max="2023-01-31"
          required="true"
        />
        <label for="room"></label>
        <select name="room" required="true">
          <option value="1">Budget</option>
          <option value="2">Standard</option>
          <option value="3">Luxury</option>
        </select>
        <button type="submit">Confirm Reservation</button>
      </form>
      </section>
    </main>
    <footer></footer>
  </body>
</html>

<?php