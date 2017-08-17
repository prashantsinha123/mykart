<!DOCTYPE html>
<html>
<head>
<script src="js/jquery.js"></script>
</head>
<body>


    <script>
      $(function () {

        $('form').on('submit', function (e) {

          e.preventDefault();

          $.ajax({
            type: 'post',
            url: 'new.php',
            data: $('form').serialize(),
            success: function () {
              alert('form was submitted');
            }
          });

        });

      });
    </script>
  </head>
  <body>
    <form>
      <input name="time" value="00:00:00.00"><br>
      <input name="date" value="0000-00-00"><br>
      <input name="submit" type="submit" value="Submit">
    </form>
  </body>
</html>
