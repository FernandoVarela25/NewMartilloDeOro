$('#email-form').submit(function(e) {
    e.preventDefault();
    $.ajax({
        type: 'POST',
        url: 'assets/functions/send.php',
        data: $('#email-form').serialize(),
        success: function(data) {
            alert(data);
            document.getElementById('email-form').reset();
        },
        error: function(xhr, status, error) {
            alert(xhr.responseText);
        }
    });
});