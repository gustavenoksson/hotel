<?php require "view/header.php"; ?>
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
      <form action="booking.php" class="bookingForm" method="post">
        <!-- Transfercode -->
        <label for="transferCode">Transfer code</label>
        <input type="text" name="transferCode" required="true"/>
        <!-- Dates -->
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
        <!-- Rooms -->
        <label for="room"></label>
        <select name="room" required="true">
          <option value="1">Budget</option>
          <option value="2">Standard</option>
          <option value="3">Luxury</option>
        </select>
        <button type="submit">Confirm Reservation</button>
        <!-- Features -->
        <div class="feature">
          <input type="checkbox" value="1">Dvd Player
        </div>
        <div class="feature">
          <input type="checkbox" value="2">Slippers
        </div>
        <div class="feature">
          <input type="checkbox" value="3">Spa
        </div>
      </form>
      </section>
    </main>
<?php require "view/footer.php";