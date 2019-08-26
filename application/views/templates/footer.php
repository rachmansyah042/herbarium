
<script>
    $('#datepicker').datepicker({
        uiLibrary: 'bootstrap4'
    });

    function previewImage() {

    var oFReader = new FileReader();
     oFReader.readAsDataURL(document.getElementById("herbarium_pict").files[0]);

    oFReader.onload = function(oFREvent) {
      document.getElementById("herb_pic").src = oFREvent.target.result;
            
    };
    }

    function realImage() {
        
    var realPict = new FileReader();
     realPict.readAsDataURL(document.getElementById("real_pic").files[0]);

    realPict.onload = function(oFREvent) {
      document.getElementById("r_pic").src = oFREvent.target.result;

    }
    };
</script>

<script type="text/javascript">
     // Start jQuery function after page is loaded
        $(document).ready(function(){
         // Start jQuery click function to view Bootstrap modal when view info button is clicked
            $('.view_data').click(function(){
             // Get the id of selected phone and assign it in a variable called phoneData
                var idHerbarium = $(this).attr('id');
                // Start AJAX function
                $.ajax({
                 // Path for controller function which fetches selected phone data
                    url: "<?= base_url('Herbarium/GetHerbariumById') ?>",
                    // Method of getting data
                    method: "POST",
                    // Data is sent to the server
                    data: {idHerbarium:idHerbarium},
                    // Callback function that is executed after data is successfully sent and recieved
                    success: function(data){
                     // Print the fetched data of the selected phone in the section called #phone_result 
                     // within the Bootstrap modal
                    //  console.log(data);
                        $('#herbResult').html(data);
                        // // Display the Bootstrap modal
                        // Display the Bootstrap modal
                        $('#editHerb').modal('show');
                    }
             });
             // End AJAX function
         });
     });  

    //  view 

    $('.get_data').click(function(){
             // Get the id of selected phone and assign it in a variable called phoneData
                var idHerbarium = $(this).attr('id');
                // Start AJAX function
                $.ajax({
                 // Path for controller function which fetches selected phone data
                    url: "<?= base_url('Herbarium/ViewHerbariumById') ?>",
                    // Method of getting data
                    method: "POST",
                    // Data is sent to the server
                    data: {idHerbarium:idHerbarium},
                    // Callback function that is executed after data is successfully sent and recieved
                    success: function(data){
                     // Print the fetched data of the selected phone in the section called #phone_result 
                     // within the Bootstrap modal
                        $('#viewHerById').html(data);
                        // // Display the Bootstrap modal
                        // Display the Bootstrap modal
                        $('#viewHerb').modal('show');
                    }
                });
                // End AJAX function
            });
</script>



    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    
    <!-- <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script> -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <!-- custom datepicker -->
    <!-- <script src="https://unpkg.com/gijgo@1.9.13/js/gijgo.min.js" type="text/javascript"></script> -->

</body>

</html>