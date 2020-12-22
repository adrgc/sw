
function onSignIn(googleUser) {

    var profile = googleUser.getBasicProfile();
    $.post('GoogleLogin.php', {
        data: profile.getEmail()+'...'+profile.getImageUrl()
        
    }).done(function(response){
        var auth2 = gapi.auth2.getAuthInstance();
                    auth2.signOut().then(function() {
                        auth2.disconnect();
                    });
        location.href = 'Layout.php';
    })
    
  }