<html>
	<head>        
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=EmulateIE7"></meta>
		<script src="./jquery-1.js" type="text/javascript"></script>
		<script src="./jquery.js" type="text/javascript"></script>
		<?php
			 $useragent = $_SERVER['HTTP_USER_AGENT'];// CHECANDO O NAVEGADOR UTILIZADO

			if (preg_match('|MSIE ([0-9].[0-9]{1,2})|',$useragent,$matched)) {

			$browser_version=$matched[1];

			 $browser = 'IE';

			} elseif(preg_match('|Firefox/([0-9\.]+)|',$useragent,$matched)) {

			$browser_version=$matched[1];

			 $browser = 'Firefox';
			 
			?>
			  <link rel="stylesheet" href="./relprev.css" type="text/css" media="screen"></link>
			  <?php
			} elseif(substr($useragent, 0, 5) == "Opera") {

			$posicao_inicial = strpos($useragent, "Version") + strlen("Version");
			?>
				<link rel="stylesheet" href="./relprev-2.css" type="text/css" media="screen"></link>
				<?php
			}else{
				?>
				
				<link rel="stylesheet" href="./relprev-2.css" type="text/css" media="screen"></link>
				<?php
			}
			
			?>

		

       <script>
            jQuery(function ($) {
                $("#data").mask("99/99/9999");
                $("#hora").mask("99:99");

                $("#anonimato").click(function () {
                    if ($("#anonimato").is(":checked") == true) {
						
						$("#relator").attr("required", false);
						$("#email").attr("required", false);
					
                        $("#relator").prop("disabled", true);
                        $("#email").prop("disabled", true);
						
						$("#relator").css('background', '#dfdee5');
						$("#email").css('background', '#dfdee5');
						
                    }else{
						
						$("#relator").prop("disabled", false);
						$("#email").prop("disabled", false);
						$("#relator").attr("required", true);
						$("#email").attr("required", true);
						$("#relator").css('background', 'transparent');
						$("#email").css('background', 'transparent');
					}
                });

                if ($("#anonimato").is(":checked") == false) {              
                    $("#relator").prop("disabled", false);
                    $("#email").prop("disabled", false);
                    $("#relator").attr("required", true);
                    $("#email").attr("required", true);
					$("#relator").css('background', 'transparent');
					$("#email").css('background', 'transparent');
                }
				
			
            });
			
			
			
        </script> 
		
    </head>

    <body cz-shortcut-listen="true">
        <div class="topo"></div>
        <div class="texto"></div>		
        <form name="form" method="POST" action="envia.php">
            <div class="relprev">
                <div class="om">
                </div>
                <br><br><br><br><br><br>
                <div class="local">
                    <input name="local" class="input_local" required="" type="text" autofocus="" autocomplete="off">
                </div>
                <div class="data">
                    <input name="data" class="input_time" id="data" required="" type="text" autocomplete="off"> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <input name="hora" class="input_time" id="hora" required="" type="text" autocomplete="off">
                </div>
                <div class="hora">
                </div>
                <div class="pessoal">
                </div>
                <div class="situacao">
                    <textarea name="situacao" class="textarea" required="" autocomplete="off"></textarea>
                </div>
                <div class="anonimo">
                    <input type="checkbox" name="anonimato" id="anonimato"> <b>NÃO QUERO SER IDENTIFICADO (ANÔNIMO)</b>
                </div>
                <div class="relator" style="margin-top: 50px;">
                    <input name="relator" id="relator" class="input_id" type="text" autocomplete="off">
                </div>
                <div class="email" style="margin-top: 50px;">
                    <input name="email" id="email" class="input_id" type="email" autocomplete="off">
                </div>
                <div class="botoes">
                    <input value="Limpar Formulário" class="submit" style="float:left; margin-left:90px;" type="reset">
                    <input value="Enviar Relatório" class="submit" style="float:right; margin-right:10px;" type="submit">
                </div>
                <div class="creditos">
                </div>
            </div>
        </form>
    </body>
</html>