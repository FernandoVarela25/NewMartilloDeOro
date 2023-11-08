setTimeout(function() { 
    document.getElementById('alert_FailureLogin').remove();
    var urlWithoutParam = location.href.replace('?error=failure_login', '');
    window.location.href = urlWithoutParam;
}, 3000);

setTimeout(function() { 
    document.getElementById('alert_UserNotFound').remove();
    var urlWithoutParam = location.href.replace('?ruta=forgot_password&error=user_not_found', '?ruta=forgot_password');
    window.location.href = urlWithoutParam;
}, 2000);

setTimeout(function() { 
    document.getElementById('alert_SuccessEmail').remove();
    var urlWithoutParam = location.href.replace('?ruta=forgot_password&error=success_email', '');
    window.location.href = urlWithoutParam;
}, 3000);

setTimeout(function() { 
    document.getElementById('alert_SuccessRecoveryPassword').remove();
    var urlWithoutParam = location.href.replace('?ruta=reset_password&error=success_recovery_password', '');
    window.location.href = urlWithoutParam;
}, 3000);

setTimeout(function() { 
    document.getElementById('alert_FailureRecoveryPassword').remove();
    var urlWithoutParam = location.href.replace('?ruta=reset_password&error=failure_recovery_password', '?ruta=reset_password');
    window.location.href = urlWithoutParam;
}, 3000);

setTimeout(function() { 
    document.getElementById('alert_FailureData').remove();
    var urlWithoutParam = location.href.replace('?ruta=reset_password&error=failure_data', '?ruta=reset_password');
    window.location.href = urlWithoutParam;
}, 3000);

setTimeout(function() { 
    document.getElementById('alert_SuccessRegister').remove();
    var urlWithoutParam = location.href.replace('?ruta=register&error=success_register', '');
    window.location.href = urlWithoutParam;
}, 3000);