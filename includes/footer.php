  <div id="footer" class="p-3 mb-2 bg-primary text-white fixed-bottom">
    <p class="text-center">Copyright &copy; - IT Conference Attendance  <?php echo date('Y')?></p>
  </div>

</div> <!-- this div ends the container div started in the header -->


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

<script src="https://code.jquery.com/jquery-3.6.0.js"></script>

<script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>

<script>
  $(function() {
    $("#dateOfBirth").datepicker({
      changeMonth: true,
      changeYear: true,
      yearRange: "-100:+0",
      dateFormat: "yy-mm-dd"
    });
  });
</script>

</body>

</html>