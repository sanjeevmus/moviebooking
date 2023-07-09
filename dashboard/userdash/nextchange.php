<?php include('header.php'); ?>

<style>
    h2{
        text-align: center;
        font-weight: 500;
        font-family: cursive;
    }
.dashboard-container {
  max-width: 800px;
  margin: 0 auto;
}

.horizontal-menu {
  display: flex;
  justify-content: space-between;
  align-items: center;
  margin-bottom: 20px;
}

.horizontal-menu a {
  text-decoration: none;
  color: #333;
  font-weight: bold;
  margin-right: 10px;
}

.search {
  display: flex;
}

#search-input {
  padding: 6px;
  border: 1px solid #ccc;
  border-radius: 4px;
}

#search-button {
  padding: 6px 10px;
  background-color: #4caf50;
  color: white;
  border: none;
  border-radius: 4px;
  cursor: pointer;
  margin-left: 10px;
}

.movies-container {
  display: grid;
  grid-template-columns: repeat(3, 1fr);
  gap: 20px;
}

.movie-card {
  border: 1px solid #ccc;
  padding: 10px;
}

.movie-details {
  margin-top: 10px;
}

.movie-name {
  font-weight: bold;
  margin-bottom: 5px;
  font-family: cursive;
}

.movie-description {
  margin-bottom: 20px;
  font-family: cursive;
}

.movie-price {
  margin-bottom: 20px;
  font-family: cursive;
}
</style>

<div class="dashboard-container">
  <div class="horizontal-menu">
    <a href="dash.php" id="now-showing-link">Now Showing</a>
    <a href="nextchange.php" id="next-change-link">Next Change</a>
    <a href="upcoming.php" id="upcoming-link">Upcoming</a>
    <a href="booking.php" id="booking-link">Bookings</a>
    <div class="search">
      <input type="text" id="search-input" name="search" placeholder="Search Movies">
      <button type="button" id="search-button">Search</button>
    </div>
  </div>
  <h2><u>Next Change<u></h2>
  <div class="movies-container">
    <div class="movie-card">
      <img src="movie1.jpg" alt="Movie Poster">
      <div class="movie-details">
        <h5 class="movie-name">Movie Name</h5>
        <p class="movie-description">Movie Description</p>
        <p class="movie-price">Movie Price</p>
      </div>
    </div>

    <div class="movie-card">
      <img src="movie2.jpg" alt="Movie Poster">
      <div class="movie-details">
        <h5 class="movie-name">Movie Name</h5>
        <p class="movie-description">Movie Description</p>
        <p class="movie-price">Movie Price</p>
      </div>
    </div>

    <div class="movie-card">
      <img src="movie3.jpg" alt="Movie Poster">
      <div class="movie-details">
        <h5 class="movie-name">Movie Name</h5>
        <p class="movie-description">Movie Description</p>
        <p class="movie-price">Movie Price</p>
      </div>
    </div>
    <div class="movie-card">
      <img src="movie3.jpg" alt="Movie Poster">
      <div class="movie-details">
        <h5 class="movie-name">Movie Name</h5>
        <p class="movie-description">Movie Description</p>
        <p class="movie-price">Movie Price</p>
      </div>
    </div>
    <div class="movie-card">
      <img src="movie3.jpg" alt="Movie Poster">
      <div class="movie-details">
        <h5 class="movie-name">Movie Name</h5>
        <p class="movie-description">Movie Description</p>
        <p class="movie-price">Movie Price</p>
      </div>
    </div>

    <!-- Add more movie cards here -->
  </div>
</div>
