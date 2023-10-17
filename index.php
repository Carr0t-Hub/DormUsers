<?php include("common/header.php"); ?>

    <!-- <div id="preloader">
        <div data-loader="circle-side"></div>
    </div>/Page Preload -->

    <div class="min-vh-100 d-flex flex-column" id="main">
        
        <div class="container">
            <div id="logo">
                <img src="img/logo.png" alt="" width="200" height="180">
            </div>
        </div>

        <div class="container my-auto main_content">
            <div class="row countdown">
                <div class="col-md-12">
                    <h1>Bureau of Agricultural Research</h1>
                    <h2><strong>Dormitory Reservation System</strong>.</h2>
                </div>
            </div>
            <div id="book">
                <form method="post">
                    <div class="row">
                        <div class="col-md-4 first-nogutter position-relative">
                            <input type="text" class=" form-control" id="dates" name="dates" placeholder="Check in / Check out">
                            <span class="input-icon"><i class="bi bi-calendar2"></i></span>
                        </div>
                        <div class="col-md-3 nogutter position-relative">
                            <input type="text" class=" form-control" id="name" name="name" placeholder="Name">
                            <span class="input-icon"><i class="bi bi-people"></i></span>
                        </div>
                        <div class="col-md-3 nogutter position-relative">
                            <input type="text" class=" form-control" id="email" name="email" placeholder="Email">
                            <span class="input-icon"><i class="bi bi-envelope"></i></span>
                        </div>
                        <div class="col-md-1 nogutter position-relative">
                            <div class="qty-buttons">
                                <input type="button" value="+" class="qtyplus" name="quantity">
                                <input type="text" name="quantity" id="quantity" value="" class="qty form-control required" placeholder="Guest">
                                <input type="button" value="-" class="qtyminus" name="quantity">
                            </div>
                        </div>
                        <div class="col-md-1 ps-0 pe-3">
                            <button class="btn_check" id="submit-check">Submit</button>
                        </div>
                    </div>
                </form>
                <div id="message-booking"></div>
            </div><!-- End book -->
        </div>
        <!-- End main_content -->
        <div class="container-fluid p-0 mt-5">
            <nav class="clearfix">
                <ul class="menu">
                    <li><a href="#" id="modal-offers-open">Offers</a></li>
                    <!-- <li><a href="#" id="modal-notified-open">Get notified</a></li> -->
                    <li><a href="#" id="modal-contacts-open">Contacts</a></li>
                </ul>
                <ul id="contact_follow">
                    <li><a href="https://www.instagram.com/DABAROfficial"><i class="bi bi-instagram"></i></a></li>
                    <li><a href="https://www.youtube.com/DABAROfficial"><i class="bi bi-youtube"></i></a></li>
                    <li><a href="https://www.facebook.com/DABAROfficial"><i class="bi bi-facebook"></i></a></li>
                </ul>
            </nav>
        </div>
    </div>
    <!-- End main -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
      

       

          $("#submit-check").click(function() {
                  
        $name = $("#name").val();
        var dates = $("#dates").val();
        $quantity = $("#quantity").val();
        
        $dateCheckIn = dates.substring(0,8);
        $dateCheckOut = dates.substring(13,23);
        
      
            if($("#dates").val() === "" || $("#name").val() === "" || $("#quantity").val() === ""){
                alert("Please Fill up the blank");
            }
          else{
        $.ajax({
          url: "insert_reserve.php", // Replace with your server-side script URL
          method: "POST",
          data: {quantity: $quantity,
                 name: $name,
                dateCheckIn :$dateCheckIn,
                dateCheckOut: $dateCheckOut
                },

          success: function(response) {
            // Display the server's response in the result div
            $("#result").html(response);
            console.log(response);
          },
          error: function() {
            $("#result").html("An error occurred.");

            console.log(formData);
          }
        });

    }


          });


    </script>
<?php include("common/footer.php"); ?>