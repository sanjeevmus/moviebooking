 // Your JavaScript code here
 const container = document.querySelector(".container");
 const seats = document.querySelectorAll(".row .seat:not(.occupied)");
 const count = document.getElementById("count");
 const total = document.getElementById("total");
 const movieSelect = document.getElementById("movie");
 const submitButton = document.getElementById("submit-btn");
 let ticketPrice = +movieSelect.value;

 populateUI();

 function saveMovieData(index, price) {
   localStorage.setItem("selectedMovieIndex", index);
   localStorage.setItem("selectedMoviePrice", price);
 }

 function updateSelectedCount() {
   const selectedSeats = document.querySelectorAll(".row .seat.selected");
   const selectedSeatsCount = selectedSeats.length;

   count.innerText = selectedSeatsCount;
   total.innerText = selectedSeatsCount * ticketPrice;

   const selectedSeatsIndexes = Array.from(selectedSeats).map((seat) =>
     [...seats].indexOf(seat)
   );
   localStorage.setItem(
     "selectedSeats",
     JSON.stringify(selectedSeatsIndexes)
   );
 }

 function populateUI() {
   const selectedSeatsIndexes = JSON.parse(
     localStorage.getItem("selectedSeats")
   );

   if (selectedSeatsIndexes !== null && selectedSeatsIndexes.length > 0) {
     seats.forEach((seat, index) => {
       if (selectedSeatsIndexes.includes(index)) {
         seat.classList.add("selected");
       }
     });
   }

   const selectedMovieIndex = localStorage.getItem("selectedMovieIndex");
   const selectedMoviePrice = localStorage.getItem("selectedMoviePrice");

   if (selectedMovieIndex !== null) {
     movieSelect.selectedIndex = selectedMovieIndex;
     ticketPrice = +selectedMoviePrice;
   }

   updateSelectedCount();
 }

 movieSelect.addEventListener("change", (e) => {
   ticketPrice = +e.target.value;
   saveMovieData(e.target.selectedIndex, ticketPrice);
   updateSelectedCount();
 });

 container.addEventListener("click", (e) => {
   if (
     e.target.classList.contains("seat") &&
     !e.target.classList.contains("occupied")
   ) {
     e.target.classList.toggle("selected");
     updateSelectedCount();
   }
 });

 submitButton.addEventListener("click", () => {
   const selectedSeats = document.querySelectorAll(".row .seat.selected");
   const selectedSeatsIndexes = Array.from(selectedSeats).map((seat) =>
     [...seats].indexOf(seat)
   );

   // Example: Submit the selected seat indexes to the server-side for further processing
   // You can use AJAX, fetch, or form submission to send the data

   // Here, we'll log the selected seat indexes to the console
   console.log(selectedSeatsIndexes);
 });