<!DOCTYPE HTML>
<html lang="pl">
<head>
	<title>Edycja</title>
	<?php include ("meta5.html"); ?>
    <link  rel="stylesheet" href="../css/backroom-edit.css"> 
    <script src="../upload/jquery.uploadfile.js"></script>
</head>
<body>
	<section id="place-holder">
		<?php include ('backroom-top-menu.php'); ?>
		<div class="back-edit-placeholder">
            <form enctype="multipart/form-data" method="POST">
                    <table class="back-edit-table">
                        <tr>
							<th>ID:</th>
                            <td>
                                
                            </td>
                            <th>Nazwa:</th>
							<td>
                                <input id="" class="back-edit-text" type="text" name="product_name" value="" />
                            </td>
						</tr>
						<tr>
							<th>Cena:</th>
							<td>
                                <input id="" class="back-edit-text" type="text" name="product_price" value="" />
                            </td>
                            <th>Ilość:</th>
							<td>
                                <input id="" class="back-edit-text" type="text" name="product_number" value="" />
                            </td>
						</tr>
						<tr>
							<th>Zapisz:</th>
							<td colspan="3">
                            <input id="" class="back-edit-submit" type="submit" name="update" value="Zapisz" />
                            </td>
						</tr>
						<tr>
							<th>Przypisz do Kategorii<br />Pozycji w górnym Menu:</th>
							<td>
								<select class="back-edit-select" name="product_category_main">
									<option></option>
								</select>
							</td>
                            <th>Przypisz do Podkategorii<br />Pozycji w lewym Menu:</th>
							<td>
								<select class="back-edit-select" name="product_category_sub">
									<option></option>
								</select>
							</td>
						</tr>
						<tr>
							<th>Description:</th>
							<td colspan="3">
                                <textarea id="" class="back-edit-textarea" name="product_description_small" ></textarea>
                            </td>
						</tr>
                        <tr>
							<th>Zapisz:</th>
							<td colspan="3">
                                <input id="" class="back-edit-submit" type="submit" name="update" value="Zapisz" />
                            </td>
						</tr>
						<tr>
							<th>Opis:</th>
							<td  colspan="3">
                                <textarea id="" class="back-edit-textarea" name="product_description_large" ></textarea>
                            </td>
						</tr>
						<tr>
							<th colspan="4">Miniaturka:</th>
						</tr>
						<tr>
							<td colspan="4">
                                <div class="back-edit-div upload_td_div"></div>
                            </td>
						</tr>
						<tr>
							<th colspan="4">Zdjęcia:</th>
						</tr>
						<tr>
							<td colspan="4">
                                <div class="back-edit-div upload_td_div"></div>
                            </td>
						</tr>
						<tr>
							<th>Zapisz:</th>
							<td colspan="3">
                                <input id="" class="back-edit-submit" type="submit" name="update" value="Zapisz" />
                            </td>
						</tr>                        
                        <tr>
							<th>Ustawienia dla SEO</th>
                            <script type="text/javascript">
                                $(document).ready(function(){
                                    $('input[type="radio"]').each(function() { 
                                        $(this).change(function(){
                                            if( $('input[value="title_true"]').is(":checked") ) {
                                                $('input.seo-text').removeAttr("disabled");
                                            } else {
                                                $('input.seo-text').attr("disabled", "disabled");
                                            }
                                        });
                                    });
                                });
                                $(window).load(function() {
                                    $('input[type="radio"]').each(function() { 
                                        if( $('input[value="title_true"]').is(":checked") ) {
                                            $('input.seo-text').removeAttr("disabled");
                                        } else {
                                            $('input.seo-text').attr("disabled", "disabled");
                                        }
                                    }); 
                                });
                            </script>                            
                            <td colspan="3">
                                <label><input id="" class="back-edit-radio seo-radio" type="radio" name="seo_setting" value="title_false" />Użyj globalnych ustawień.</label>
                                <label><input id="" class="back-edit-radio seo-radio" type="radio" name="seo_setting" value="title_true" />Użyj własnych ustawień (zalecane).</label>
                            </td>
						</tr>
						<tr>
							<th>Title</th>
                            <td colspan="3">
                                <input id="" class="back-edit-text seo-text" type="text" name="title" value="" />
                            </td>
						</tr>
						<tr>
							<th>Description</th>
                            <td colspan="3">
                                <input id="" class="back-edit-text seo-text" type="text" name="description" value="" />
                            </td>
						</tr>
                        <tr>
							<th>Keywords</th>
                            <td colspan="3">
                                <input id="" class="back-edit-text seo-text" type="text" name="keywords" value="" />
                            </td>
						</tr>                        
                        <tr>
							<th>Zapisz:</th>
							<td>
                                <input id="" class="back-edit-submit" type="submit" name="update" value="Zapisz" />
                            </td>
                            <th>Usuń Produkt:</th>
							<td>
                                <input id="" class="back-edit-submit" type="submit" name="delete" value="delete" />
                            </td>
						</tr>
					</table>
                    <input type="hidden" name="id_product_edit" value="" />
				</form>
		</div>
	</section>
	<footer>
	<!--<div id="count"></tr><div id="count2"></tr>-->
	</footer>
	<div id="debugger">
		<?php
		echo "post";
		var_dump (@$_POST);
		//echo "session";
		//var_dump ($_SESSION);
		//echo "files";
		//var_dump (@$_FILES);
		// echo "var2";
		 // var_dump ($var2);	
		//echo "cookies";
		//var_dump ($_COOKIE);
		?>
	</div>
</body>
</html>
