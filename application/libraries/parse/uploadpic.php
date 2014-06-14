<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>

<form id="fileupload" name="fileupload" enctype="multipart/form-data" method="post">
  <fieldset>
    <input type="file" name="fileselect" id="fileselect"></input>
    <input id="uploadbutton" type="button" value="Upload to Parse"/>
  </fieldset>
</form>
<form action="process.php?mod=add" method="POST">
pic
<input type="text" name="pic" id="pic"><br>
Firstname
<input type="text" name="user_firstname" id="user_firstname"><br>
<input type="submit">
</form>
<script type="text/javascript">
  $(function() {
    var file;

    // Set an event listener on the Choose File field.
    $('#fileselect').bind("change", function(e) {
      var files = e.target.files || e.dataTransfer.files;
      // Our file var now holds the selected file
      file = files[0];
    });

    // This function is called when the user clicks on Upload to Parse. It will create the REST API request to upload this image to Parse.
    $('#uploadbutton').click(function() {
      var serverUrl = 'https://api.parse.com/1/files/' + file.name; 
	
      $.ajax({
        type: "POST",
        beforeSend: function(request) {
          request.setRequestHeader("X-Parse-Application-Id", '5OZPunpgNbKfWoI1jNLc8WGLjtdIyhGLHMHBasS8');
          request.setRequestHeader("X-Parse-REST-API-Key", 'LyvPgHupYyUHZMsksfeUcaDfqvJajiodoCv0O1N9');
          request.setRequestHeader("Content-Type", file.type);
        },
        url: serverUrl,
        data: file,
        processData: false,
        contentType: false,
        success: function(data) {
          alert("File available at: " + data.url);
		  document.getElementById('pic').value=data.url;
        },
        error: function(data) {
          var obj = jQuery.parseJSON(data);
          alert(obj.error);
        }
      });
    });


  });
</script>