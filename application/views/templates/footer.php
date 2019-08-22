
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



    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <!-- custom datepicker -->
    <!-- <script src="https://unpkg.com/gijgo@1.9.13/js/gijgo.min.js" type="text/javascript"></script> -->

</body>

</html>