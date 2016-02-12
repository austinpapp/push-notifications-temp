function apiAuth() {
  var deferred = $.Deferred();

  if (sessionStorage.session) {
    apiAuth.setupSession(JSON.parse(sessionStorage.session));
    deferred.resolve();
  } else {
    $.ajax({
      type: "POST",
      url: (window.dev ? '/app_dev.php/' : '/') + sessionStorage.userType + '/create-session',
      data: {},
      success: function(data) {
        apiAuth.setupSession(data);
        deferred.resolve();
      },
      error: function() {
        deferred.reject();
      }
    });
  }
  return $.when(deferred);
}

apiAuth.setupSession = function (session) {
  sessionStorage.session = JSON.stringify(session);
  $.ajaxSetup({
    headers: {Authorization: 'Bearer type="' + session.user_type +
      '" token="' + session.token + '"'
    }
  });
};
