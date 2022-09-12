<?php

/*$filename ="syed.doc";
$word = new COM("word.application") or die("Unable to instantiate Word");
$word->Documents->Open($filename);
$new_filename = substr($filename,0,-4) . ".txt";
// the ‘2’ parameter specifies saving in txt format
$word->Documents[1]->SaveAs($new_filename,2);
$word->Documents[1]->Close(false);
$word->Quit();
//$word->Release();
$word = NULL;
unset($word); */
//echo($contents);
/*function readWord($filename) {
	if(file_exists($filename))
	{
			if(($fh = fopen($filename, 'r')) !== false ) 
			{
				 $headers = fread($fh, 0xA00);

				 // 1 = (ord(n)*1) ; Document has from 0 to 255 characters
				 $n1 = ( ord($headers[0x21C]) - 1 );

				 // 1 = ((ord(n)-8)*256) ; Document has from 256 to 63743 characters
				 $n2 = ( ( ord($headers[0x21D]) - 8 ) * 256 );

				 // 1 = ((ord(n)*256)*256) ; Document has from 63744 to 16775423 characters
				 $n3 = ( ( ord($headers[0x21E]) * 256 ) * 256 );

				 // 1 = (((ord(n)*256)*256)*256) ; Document has from 16775424 to 4294965504 characters
				 $n4 = ( ( ( ord($headers[0x21F]) * 256 ) * 256 ) * 256 );

				 // Total length of text in the document
				 $textLength = ($n1 + $n2 + $n3 + $n4);

				 $extracted_plaintext = fread($fh, $textLength);

				 // if you want to see your paragraphs in a new line, do this
				 // return nl2br($extracted_plaintext);
				 return $extracted_plaintext;
			} else {
				return false;
			}
	} else {
		return false;
	}  
}
echo $contents=readWord("syed.doc");*/
?>
<!doctype html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta name="robots" content="noindex, nofollow">
	<title>Paste from Word</title>
	<script src="https://cdn.ckeditor.com/4.15.1/standard-all/ckeditor.js"></script>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
	<style type="text/css">
		/* Minimal styling to center the editor in this sample */
		.container {
			padding: 30px;
			display: flex;
			align-items: center;
			text-align: center;
		}

		.inner-container {
			margin: 0 auto;
		}
	</style>
</head>

<body>
<div class="container">
 <?php  
	$contents="";



	if(isset($_FILES) && $_FILES){

		$file_type = $_FILES['document']['type']; //returns the mimetype

		$allowed = array(".doc","application/msword");
		if(!in_array($file_type, $allowed)) {
		  $error_message = 'Only jpg, gif, and pdf files are allowed.';
					 echo '<div class="card"><div class="card-body"><a class="btn btn-light" href="index.php">Back</a><p style="color:red;">Allowed only word document (.doc)</p></div></div>';
			}else{
				echo '<form action="generate_doc.php" method="POST">';

					$uploads_dir = 'uploads';		 
					$tmp_name = $_FILES["document"]["tmp_name"];
	        // basename() may prevent filesystem traversal attacks;
	        // further validation/sanitation of the filename may be appropriate
	        $name = basename($_FILES["document"]["name"]);
	        move_uploaded_file($tmp_name, "$uploads_dir/$name");

					$new_filename="$uploads_dir/$name";
					$fh = fopen($new_filename, 'r');
					$contents = fread($fh, filesize($new_filename));

				if(strpos($contents, '[Content_Types].xml') !== false) {
					echo '<div class="card"><div class="card-body"><a class="btn btn-light" href="index.php">Back</a><p style="color:red;">Invalid File Format. Please use existing document.</p></div></div>';
				}else{
					echo '<input type="submit" value="Generate" class="btn btn-success">&nbsp;&nbsp;<a class="btn btn-light" href="index.php">Cancel</a>';
					echo '<textarea name="content" class="editor1" id="editor1"></textarea>';
				}
				echo  '</form>';
				fclose($fh);
			}

		$contents=preg_replace( "/\r|\n/", "", $contents ); 
	}elseif(isset($_GET['editor']) && $_GET['editor']){
		echo '<form action="generate_doc.php" method="POST">	
							<input type="submit" value="Generate" class="btn btn-success">&nbsp;&nbsp;<a class="btn btn-light" href="index.php">Cancel</a>
							<textarea name="content" class="editor1" id="editor1"> 
							</textarea>
						 </form>';

		$new_filename="generated_doc/document.doc";
		$fh = fopen($new_filename, 'r');
		$contents = fread($fh, filesize($new_filename));
		fclose($fh);
		$contents=preg_replace( "/\r|\n/", "", $contents ); 
	}else{
		echo '<div class="card">
  <div class="card-body"><form action="index.php" method="POST" enctype="multipart/form-data">	
							<div class="input-group">
							<input type="file" name="document" class="form-control" required accept=".doc,.docx,application/msword">
							</div>
							<p style="font-size:12px;color:red;">Already edit & downloaded by this plugin document can only upload here</p>
							<br>
							
								<input type="submit" value="Upload" class="btn btn-success">
								<br><br>
								<p>You don\'t have any downloaded file click the following link<p>
								<a class="btn btn-primary" href="index.php?editor=1">Go to Editor</a>
							
				</form></div>
</div>';
	}
?>
</div>

	<script>
		CKEDITOR.replace('editor1', {
			// Define the toolbar: https://ckeditor.com/docs/ckeditor4/latest/features/toolbar
			// The full preset from CDN which we used as a base provides more features than we need.
			// Also by default it comes with a 3-line toolbar. Here we put all buttons in two rows.
			toolbar: [{
					name: 'clipboard',
					items: ['PasteFromWord', '-', 'Undo', 'Redo']
				},
				{
					name: 'basicstyles',
					items: ['Bold', 'Italic', 'Underline', 'Strike', 'RemoveFormat', 'Subscript', 'Superscript']
				},
				{
					name: 'links',
					items: ['Link', 'Unlink']
				},
				{
					name: 'paragraph',
					items: ['NumberedList', 'BulletedList', '-', 'Outdent', 'Indent', '-', 'Blockquote']
				},
				{
					name: 'insert',
					items: ['Image', 'Table']
				},
				{
					name: 'editing',
					items: ['Scayt']
				},
				'/',

				{
					name: 'styles',
					items: ['Format', 'Font', 'FontSize']
				},
				{
					name: 'colors',
					items: ['TextColor', 'BGColor', 'CopyFormatting']
				},
				{
					name: 'align',
					items: ['JustifyLeft', 'JustifyCenter', 'JustifyRight', 'JustifyBlock']
				},
				{
					name: 'document',
					items: ['Print', 'PageBreak', 'Source']
				}
			],

			// Since we define all configuration options here, let's instruct CKEditor 4 to not load config.js which it does by default.
			// One HTTP request less will result in a faster startup time.
			// For more information check https://ckeditor.com/docs/ckeditor4/latest/api/CKEDITOR_config.html#cfg-customConfig
			customConfig: '',

			// Upload images to a CKFinder connector (note that the response type is set to JSON).
			uploadUrl: '/apps/ckfinder/3.4.5/core/connector/php/connector.php?command=QuickUpload&type=Files&responseType=json',

			// Configure your file manager integration. This example uses CKFinder 3 for PHP.
			filebrowserBrowseUrl: '/apps/ckfinder/3.4.5/ckfinder.html',
			filebrowserImageBrowseUrl: '/apps/ckfinder/3.4.5/ckfinder.html?type=Images',
			filebrowserUploadUrl: '/apps/ckfinder/3.4.5/core/connector/php/connector.php?command=QuickUpload&type=Files',
			filebrowserImageUploadUrl: '/apps/ckfinder/3.4.5/core/connector/php/connector.php?command=QuickUpload&type=Images',

			// Sometimes applications that convert HTML to PDF prefer setting image width through attributes instead of CSS styles.
			// For more information check:
			//  - About Advanced Content Filter: https://ckeditor.com/docs/ckeditor4/latest/guide/dev_advanced_content_filter
			//  - About Disallowed Content: https://ckeditor.com/docs/ckeditor4/latest/guide/dev_disallowed_content
			//  - About Allowed Content: https://ckeditor.com/docs/ckeditor4/latest/guide/dev_allowed_content_rules
			disallowedContent: 'img{width,height,float}',
			extraAllowedContent: 'img[width,height,align]',

			// Enabling extra plugins, available in the full-all preset: https://ckeditor.com/cke4/presets
			extraPlugins: 'colorbutton,font,justify,print,tableresize,uploadimage,uploadfile,pastefromword,liststyle,pagebreak',

			/*********************** File management support ***********************/
			// In order to turn on support for file uploads, CKEditor 4 has to be configured to use some server side
			// solution with file upload/management capabilities, like for example CKFinder.
			// For more information see https://ckeditor.com/docs/ckeditor4/latest/guide/dev_ckfinder_integration

			// Uncomment and correct these lines after you setup your local CKFinder instance.
			// filebrowserBrowseUrl: 'http://example.com/ckfinder/ckfinder.html',
			// filebrowserUploadUrl: 'http://example.com/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files',
			/*********************** File management support ***********************/

			// Make the editing area bigger than default.
			height: 1000,
			width: 940,

			// An array of stylesheets to style the WYSIWYG area.
			// Note: it is recommended to keep your own styles in a separate file in order to make future updates painless.
			contentsCss: [
				'http://cdn.ckeditor.com/4.15.1/full-all/contents.css',
				'https://ckeditor.com/docs/ckeditor4/4.15.1/examples/assets/css/pastefromword.css'
			],

			// This is optional, but will let us define multiple different styles for multiple editors using the same CSS file.
			bodyClass: 'document-editor',

			// Reduce the list of block elements listed in the Format dropdown to the most commonly used.
			format_tags: 'p;h1;h2;h3;pre',

			// Simplify the Image and Link dialog windows. The "Advanced" tab is not needed in most cases.
			removeDialogTabs: 'image:advanced;link:advanced',

			// Define the list of styles which should be available in the Styles dropdown list.
			// If the "class" attribute is used to style an element, make sure to define the style for the class in "mystyles.css"
			// (and on your website so that it rendered in the same way).
			// Note: by default CKEditor looks for styles.js file. Defining stylesSet inline (as below) stops CKEditor 4 from loading
			// that file, which means one HTTP request less (and a faster startup).
			// For more information see https://ckeditor.com/docs/ckeditor4/latest/features/styles
			stylesSet: [
				/* Inline Styles */
				{
					name: 'Marker',
					element: 'span',
					attributes: {
						'class': 'marker'
					}
				},
				{
					name: 'Cited Work',
					element: 'cite'
				},
				{
					name: 'Inline Quotation',
					element: 'q'
				},

				/* Object Styles */
				{
					name: 'Special Container',
					element: 'div',
					styles: {
						padding: '5px 10px',
						background: '#eee',
						border: '1px solid #ccc'
					}
				},
				{
					name: 'Compact table',
					element: 'table',
					attributes: {
						cellpadding: '5',
						cellspacing: '0',
						border: '1',
						bordercolor: '#ccc'
					},
					styles: {
						'border-collapse': 'collapse'
					}
				},
				{
					name: 'Borderless Table',
					element: 'table',
					styles: {
						'border-style': 'hidden',
						'background-color': '#E6E6FA'
					}
				},
				{
					name: 'Square Bulleted List',
					element: 'ul',
					styles: {
						'list-style-type': 'square'
					}
				}
			]
		});
	CKEDITOR.instances.editor1.setData('<?php echo $contents; ?>');
	/*document.getelementbyid('gen_content').val(CKEDITOR.instances.editor1.getData());*/
	</script>
</body>

</html>