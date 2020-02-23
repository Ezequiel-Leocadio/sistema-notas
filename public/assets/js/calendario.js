  (function () {
                var head = document.getElementsByTagName('head')[0];
                var dpStyle = document.createElement('LINK');
                dpStyle.rel = 'stylesheet';
                dpStyle.href= '../lib/bootstrap-datepicker-1.6.4-dist/css/bootstrap-datepicker.standalone.css';
                head.appendChild(dpStyle);
        $(document).ready(function () {
        $('#txtCnpj').mask('00.000.000/0000.00');
        $('#txtData').datepicker({ 
            autoclose: true,
            format: 'dd/mm/yyyy',
            language: "pt-BR",
            todayHighlight: true
     });
   });
 }());