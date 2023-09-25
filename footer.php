<style>
    /* Style for the footer */
/* Style for the footer */
.footer {
  background-color: black; /* Footer background color */
  color: #fff; /* Text color for the footer */
  font-family: cursive;
  padding-left: 30px;
  padding-right: 30px;

}

/* Style for the contact information and follow us sections */
.container-content {
  display: flex; /* Use flexbox to align elements in a row */
  /* Allow elements to wrap to a new line if needed */
  justify-content:space-between;/* Space out the elements on the same line */
}

.container-content .contents,
.container-content .details {
 /* Allow both sections to take equal space on the same line */
  margin-bottom: 10px; /* Add some space between sections */
}

.container-content .contents h4,
.container-content .details h4.follow {
  font-size: 18px; /* Heading font size */
}

.container-content .contents p,
.container-content .details ul {
  font-size: 14px; /* Paragraph and list font size */
}

/* Style for the social media links */
.container-content .details ul {
  list-style: none; /* Remove bullets from the list */
  padding: 0;
  margin: 0;
  display: flex; /* Use flexbox to align links in a row */
}

.container-content .details li {
  margin-right: 10px; /* Add some space between social media links */
}

.container-content .details li a {
  color: #fff; /* Link color */
  text-decoration: none; /* Remove underline from links */
}

/* Style the links on hover */
.container-content .details li a:hover {
  text-decoration: underline; /* Add underline on hover */
}


</style>
<footer class="footer">
    <div class="container-content">
        <div class="contents">
            <h4 >Contact Information</h4>
            <p >Email: sanjeevsuraz12@gmail.com</p>
            <p >Phone: 9749341363</p>
            <p>Address: Changunarayan-5,Bhaktapur</p>
        </div>
        <div class="details">
            <h4 class="follow">Follow Us</h4>
            <ul class="flex space-x-4">
                <li><a href="https://www.facebook.com/sanjeevmusyakhw/">Facebook</a></li>
                <li><a href="https://instagram.com/sanjeev_musyakhwo?igshid=NGExMmI2YTkyZg==">Instagram</a></li>
                <li><a href="mailto:sanjeevsuraz12@gmail.com">Gmail</a></li>
                <li><a href="https://www.twitter.com/example">Twitter</a></li>
            </ul>
        </div>
    </div>
</footer>