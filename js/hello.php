<!DOCTYPE html>
<html>
<head>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>

<div class="container">
  <h2>Dropdown Example</h2>
  <div class="dropdown">
    <button class="btn btn-primary dropdown-toggle" id="menu1" type="button" data-toggle="dropdown">Dropdown Example
    <span class="caret"></span></button>
    <ul class="dropdown-menu" role="menu" aria-labelledby="menu1">
     <li><?php include('register.php'); ?></li>
    </ul>
  </div><br>
  <p><strong>Note:</strong> The data-toggle="dropdown" attribute is required regardless of whether you call the dropdown() method.</p>
</div>

<script>
$(document).ready(function(){
    $(".dropdown-toggle").dropdown();
});
</script>

</body>
</html>