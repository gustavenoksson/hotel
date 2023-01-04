<?php require __DIR__ . "/view/header.php"; ?>
  <body>
    <header></header>
    <main>

      <!-- Rooms section -->
      <section class="roomsSections">
        <div class="roomOne">
          <img class="roomImg" src="images/budgetHotelRoom.jpeg" alt="">
          <?php
          require __DIR__ . "/calendar.php";
          ?>
        </div>
        <div class="roomTwo">
          <img class="roomImg" src="images/budgetHotelRoom.jpeg" alt="">
          <?php
          require __DIR__ . "/calendar.php";
          ?>
        </div>
        <div class="roomThree">
          <img class="roomImg" src="images/budgetHotelRoom.jpeg" alt="">
          <?php
          require __DIR__ . "/calendar.php";
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
        />
        <label for="departure">Departure</label>
        <input
          type="date"
          name="departure"
          min="2023-01-01"
          max="2023-01-31"
          required="true"
        />
        <!-- Rooms -->
        <label for="room">Rooms</label>
        <select name="room" required="true">
          <option value="1">Budget</option>
          <option value="2">Standard</option>
          <option value="3">Luxury</option>
        </select>
        <button type="submit">Confirm Reservation</button>
        <!-- Features -->
        <div class="feature">
          <input type="checkbox" value="1"
          name="features[]">Dvd Player
        </div>
        <div class="feature">
          <input type="checkbox" value="2" name="features[]">Slippers
        </div>
        <div class="feature">
          <input type="checkbox" value="3" name="features[]">Spa
        </div>
      </form>
      </section>
    </main>
<?php require __DIR__ . "/view/footer.php";