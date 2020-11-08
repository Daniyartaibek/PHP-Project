<script>
      //--ajax--
      function jsAJAXa()
    {
      var xhttp = new XMLHttpRequest();
      xhttp.onreadystatechange = function() {
          if (this.readyState == 4 && this.status == 200){
          document.getElementById("clientRes").innerHTML = this.responseText;
          
           }
      };
            xhttp.open("GET", "table1.php", true);
            xhttp.send();
    }
</script>