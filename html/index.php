
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<link rel="stylesheet" href="<?php echo plugin_dir_url( __FILE__ );?>assets/css/style.css">
<script type="text/JavaScript">
        function remveAcentos(nome) {
            // pre: insira uma string
            //post: retorna a string sem acentos
            nome = nome.replace("Á", "A");
            nome = nome.replace("É", "E");
            nome = nome.replace("Í", "I");
            nome = nome.replace("Ó", "O");
            nome = nome.replace("Ú", "U");
            nome = nome.replace("Ü", "U");
            nome = nome.replace("á", "A");
            nome = nome.replace("é", "E");
            nome = nome.replace("í", "I");
            nome = nome.replace("ó", "O");
            nome = nome.replace("ú", "U");
            nome = nome.replace("ä", "A");
            nome = nome.replace("Ä", "A");
            nome = nome.replace("ë", "E");
            nome = nome.replace("Ë", "E");
            nome = nome.replace("ï", "I");
            nome = nome.replace("Ï", "I");
            nome = nome.replace("ö", "O");
            nome = nome.replace("Ö", "O");
            nome = nome.replace("ü", "U");
            nome = nome.replace("Ü", "U");
            nome = nome.replace("Ç", "C");
            nome = nome.replace("à", "A");
            nome = nome.replace("À", "A");
            nome = nome.replace("è", "E");
            nome = nome.replace("È", "E");
            nome = nome.replace("ì", "I");
            nome = nome.replace("Ì", "I");
            nome = nome.replace("ò", "O");
            nome = nome.replace("Ò", "O");
            nome = nome.replace("ù", "U");
            nome = nome.replace("Ù", "U");
            nome = nome.replace("â", "A");
            nome = nome.replace("Â", "A");
            nome = nome.replace("ê", "E");
            nome = nome.replace("Ê", "E");
            nome = nome.replace("î", "I");
            nome = nome.replace("Î", "I");
            nome = nome.replace("ô", "O");
            nome = nome.replace("Ô", "O");
            nome = nome.replace("û", "U");
            nome = nome.replace("Û", "U");
            nome = nome.replace("ñ", "NZ");
            return nome;
        }
        var table;

        $(document).ready(function () {
            $(".numero").hide();

            $.ajax({
                url: "<?php echo plugin_dir_url( __FILE__ );?>cutter.txt",
                success: function (result) {
                    table = result;
                }
            });

            $("form").submit(function () {
                submitCut();
                return false;
            });
        });

        function submitCut() {
            cutter = cutterFunc();
            $("#numero_tit").show();
            $("#numero_cut").text(cutter).show();
            $("#numero_cut_copy").text(cutter).show();
        }

        function cutterFunc() {
            var inputtxt = $('input[name="nomeAutor"]').val();
            var original = inputtxt;
            tblc = table.split("\n");
            cutter = ''; //retorna o valor da tabela de corte que corresponde à entrada

            inputtxt = remveAcentos(inputtxt);
            inputtxt = inputtxt.replace(" ", "");
            inputtxt = inputtxt.trim();
            inputtxt = inputtxt.toLowerCase();
            for (j = 0; j < (tblc.length - 1); j++) {
                if (inputtxt >= tblc[j].slice(4) && inputtxt < tblc[j + 1].slice(4)) {
                    if (inputtxt[0] == 'a' || inputtxt[0] == 'e' || inputtxt[0] == 'i' || inputtxt[0] == 'o' || inputtxt[0] == 'u') {
                        cutter = inputtxt.slice(0, 1).toUpperCase() + tblc[j].slice(0, 3);
                    } else if (inputtxt[0] == 's' && inputtxt[1] != 'c') {
                        cutter = inputtxt.slice(0, 1).toUpperCase() + tblc[j].slice(0, 3);
                    } else if (inputtxt[0] == 's' && inputtxt[1] == 'c') {
                        cutter = inputtxt.slice(0, 3).toUpperCase() + tblc[j].slice(0, 3);
                    } else {
                        cutter = inputtxt[0].toUpperCase() + tblc[j].slice(0, 3);
                    }
                    cutter = cutter.replace("0", "");
                    cutter = cutter.replace("0", "");
                    break;
                }
            }
            return cutter;
        }
    </script>



    <h2>Cutter-Sanborn</h2>


    <label><small><?php _e( 'Digite o nome que deseja encontrar.', 'cutter-sanborn' );?></small></label>

    <div class="cutter-form">
    <form>
        
            <input type="text" class="form-control cutter-nome" type="text" name="nomeAutor"/>
            <button class="btn btn-primary cutter-gera" type="submit"  onclick="submitCut()"><?php _e( 'Gerar código', 'cutter-sanborn' );?></button>
        
    </form>      
    

    
        <span class="numero" id="numero_tit">
            <button class="btn btn-success cutter-copia" onclick="copiaCutter('#numero_cut')"><?php _e( 'Copiar', 'cutter-sanborn' );?>
                <span  style="font-weight: bold;" id="numero_cut"></span>
            </button>         
        </span>
    </div>
    <div class="cutter-footer">
        <a href="<?php echo plugin_dir_url( __FILE__ );?>about.html" target="_blank" class="card-link"><?php _e( 'Como usar o cutter', 'cutter-sanborn' );?></a> | 
        <a href="<?php echo plugin_dir_url( __FILE__ );?>tabela.html" target="_blank" class="card-link"><?php _e( 'Ver tabela completa', 'cutter-sanborn' );?></a>
    </div>



<script type="text/javascript">
    function copiaCutter(element) {

  var $temp = $("<input>");
  $("body").append($temp);
  $temp.val($(element).text()).select();
  document.execCommand("copy");

  $temp.remove();
     alert("Copiado " + $(element).text());
}


</script>