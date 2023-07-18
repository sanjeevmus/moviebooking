<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="style.css">
  <title>Movie Seat Booking</title>
  <style>
    /* Your CSS styles here */
    @import url('https://fonts.googleapis.com/css?family=Lato&display=swap');

    * {
      box-sizing: border-box;
    }

    body {
      background-color: #242333;
      color: #fff;
      display: flex;
      flex-direction: column;
      place-items: center;
      height: 100vh;
      font-family: 'Lato', sans-serif;
      margin: 0;
    }

    .movie-container {
      margin: 20px 0;
    }

    .movie-container select {
      background-color: #fff;
      border: 0;
      border-radius: 5px;
      font-size: 14px;
      margin-left: 10px;
      padding: 5px 15px;
      -moz-appearance: none;
      -webkit-appearance: none;
      appearance: none;
    }

    .container {
      perspective: 1000px;
      margin-bottom: 30px;
      display: grid;
    }

    .row {
      display: flex;
    }

    .seat {
      background-color: #444451;
      height: 15px;
      width: 15px;
      margin: 5px;
      padding: 18px;
      border-top-left-radius: 10px;
      border-top-right-radius: 10px;
      transition: background-color 0.2s ease-in-out;
      display: flex;
    }

    .seat.selected {
      background-color: #6feaf6;
    }

    .seat.occupied {
      background-color: red;
    }

    .seat:not(.occupied):hover {
      cursor: pointer;
      transform: scale(1.2);
    }

    .showcase .seat:not(.occupied):hover {
      cursor: default;
      transform: scale(1);
    }

    .showcase {
      background: rgba(0, 0, 0, 0.1);
      padding: 5px 10px;
      border-radius: 5px;
      color: #777;
      list-style-type: none;
      display: flex;
      justify-content: space-between;
    }

    .showcase li {
      display: flex;
      align-items: center;
      justify-content: center;
      margin: 0 10px;
    }

    .showcase li small {
      margin-left: 2px;
    }

    .screen {
    background-color: #fff;
    height: 150px;
    width: 100%;
    margin: 15px 0;
    /* transform: rotateX(-45deg); */
    /* box-shadow: 0 3px 10px rgba(255, 255, 255, 0.7); */
}

    p.text {
      margin: 5px 0;
    }

    p.text span {
      color: #6feaf6;
    }

    button.submit-btn {
      margin-top: 20px;
      padding: 10px 20px;
      background-color: #6feaf6;
      color: #242333;
      border: none;
      border-radius: 5px;
      font-size: 16px;
      cursor: pointer;
    }
  </style>
</head>

<body>
  <h1>Movie Seat Booking</h1>
  <form action="test.php" method="POST">
  <div class="movie-container">
    <label for="movie">Pick a movie:</label>
    <select id="movie" name="movie">
    <?php
      // Assuming you have a database connection and the necessary query to fetch movie data
      // Replace "your-db-connection", "username", "password", and "your-movies-table" with the appropriate values
      $db = new PDO('mysql:host=localhost;dbname=moviebooking', 'root', '');
      $stmt = $db->query('SELECT * FROM movie');
      $movies = $stmt->fetchAll(PDO::FETCH_ASSOC);

      foreach ($movies as $movie) {
        $id = $movie['id'];
        $name = $movie['name'];
        $price = $movie['price'];
        $duration = $movie['duration'];
        echo "<option value=\"$price\">$name (Rs$price)</option>";
      }
      ?>
    </select>
  </div>
  <ul class="showcase">
    <li>
      <div class="seat"></div>
      <small>Available</small>
    </li>
    <li>
      <div class="seat selected"></div>
      <small>Selected</small>
    </li>
    <li>
      <div class="seat occupied"></div>
      <small>Reserved</small>
    </li>
  </ul>
  <div class="container">
    <div class="screen"></div>
    <div class="row">
       <div class="seat" value="1">1</div>
      <div class="seat" value="2">2</div>
      <div class="seat" value="3">3</div>
      <div class="seat" value="4">4</div>
      <div class="seat" value="5">5</div>
      <div class="seat" value="6">6</div>
      <div class="seat" value="7">7</div>
      <div class="seat" value="8">8</div>
    </div>
    <div class="row">
      <div class="seat" value="9">9</div>
      <div class="seat" value="10">10</div>
      <div class="seat" value="11">11</div>
      <div class="seat" value="12">12</div>
      <div class="seat" value="13">13</div>
      <div class="seat" value="14">14</div>
      <div class="seat" value="15">15</div>
      <div class="seat" value="16">16</div>
    </div>
    <div class="row">
      <div class="seat" value="17">17</div>
      <div class="seat" value="18">18</div>
      <div class="seat" value="19">19</div>
      <div class="seat" value="20">20</div>
      <div class="seat" value="21">21</div>
      <div class="seat" value="22">22</div>
      <div class="seat" value="23">23</div>
      <div class="seat" value="24">24</div>
    </div>
    <div class="row">
    <div class="seat" value="25">25</div>
      <div class="seat" value="26">26</div>
      <div class="seat" value="27">27</div>
      <div class="seat" value="28">28</div>
      <div class="seat" value="29">29</div>
      <div class="seat" value="30">30</div>
      <div class="seat" value="31">31</div>
      <div class="seat" value="32">32</div>
    </div>
    <div class="row">
    <div class="seat" value="33">33</div>
      <div class="seat" value="34">34</div>
      <div class="seat" value="35">35</div>
      <div class="seat" value="36">36</div>
      <div class="seat" value="37">37</div>
      <div class="seat" value="38">38</div>
      <div class="seat" value="39">39</div>
      <div class="seat" value="40">40</div>
    </div>
  </div>
  <p class="text">
    You have selected <span id="count">0</span> seats for a price of Rs<span id="total">0</span>
  </p>

  <button class="submit-btn" name="book_now" id="book_now">Submit</button>
  </form>
  <script src="script.js"></script>
</body>

</html>