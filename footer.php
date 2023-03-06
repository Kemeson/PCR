 




<script>
var options = {
onKeyPress: function (cpf, ev, el, op) {
var masks = ['000.000.000-000', '00.000.000/0000-00'];
$('.cpfOuCnpj').mask((cpf.length > 14) ? masks[1] : masks[0], op);
}
}

$('.cpfOuCnpj').length > 11 ? $('.cpfOuCnpj').mask('00.000.000/0000-00', options) : $('.cpfOuCnpj').mask('000.000.000-00#', options);
</script>




  <!-- Vendor JS Files -->
  <script src="<?php echo $url ?>assets/vendor/apexcharts/apexcharts.min.js"></script>
  <script src="<?php echo $url ?>assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="<?php echo $url ?>assets/vendor/chart.js/chart.umd.js"></script>
  <script src="<?php echo $url ?>assets/vendor/echarts/echarts.min.js"></script>
  <script src="<?php echo $url ?>assets/vendor/quill/quill.min.js"></script>
  <script src="<?php echo $url ?>assets/vendor/simple-datatables/simple-datatables.js"></script>
  <script src="<?php echo $url ?>assets/vendor/tinymce/tinymce.min.js"></script>
  <script src="<?php echo $url ?>assets/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="<?php echo $url ?>assets/js/main.js"></script>

</body>
</html>