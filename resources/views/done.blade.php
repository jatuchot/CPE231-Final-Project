<html>
<head>
<meta charset="UTF-8">
<title>CPE231 - Done Registration</title>
<!-- JAVASCRIPT FOR SWEETALERT -->
<script src="https://code.jquery.com/jquery-3.3.1.js" integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60=" crossorigin="anonymous"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
</head>
<body>

<script type="text/javascript">
      swal({
          title: "Done process",
          text:  "Pless OK to Continue",
          icon: "success",
          closeOnClickOutside: false,
          closeOnEsc: false,

        }).then(resp => {
          window.location.href = "/";
        })
    </script>
</body>
</html>

