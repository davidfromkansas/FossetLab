// $('.deleteBlob').click(function(){
//   alert($(this).val());
//   var xmlHttp = new XMLHttpRequest();
//   xmlHttp.open("POST", "operations.php", true);
//   xmlHttp.send("name=" + $(this).val());
// });


$('.deleteBlob').click(function(){
$.ajax({
    url: 'operations.php',
    type: 'post',
    data: { "name": $(this).val()},
    success: function(response) { alert("File Deleted"); }
});

// location.reload();

});
