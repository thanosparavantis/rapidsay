$(document).ready(function() {
    profileForm = $("#profile-form");
    profileDescription = $("#description");
    profileButton = $("#profile-button");

    passwordForm = $("#password-form");
    passwordButton = $("#password-button");

    privacyForm = $("#privacy-form");
    privacyButton = $("#privacy-button");

    languageForm = $("#lang-form");
    languageButton = $("#lang-button");

    announcementForm = $("#announcement-form");
    announcementButton = $("#announcement-button");

    if (profileDescription.length) autosize(profileDescription);

    if (profileForm.length && profileButton.length)
    {
        profileButton.click(function(event) {
            event.preventDefault();
            if (profileForm[0].checkValidity()) profileForm.submit();
        });
    }
    else if (passwordForm.length && passwordButton.length)
    {
        passwordButton.click(function(event) {
            event.preventDefault();
            if (passwordForm[0].checkValidity()) passwordForm.submit();
        });
    }
    else if (privacyForm.length && privacyButton.length)
    {
        privacyButton.click(function(event) {
            event.preventDefault();
            if (privacyForm[0].checkValidity()) privacyForm.submit();
        });
    }
    else if (languageForm.length && languageButton.length)
    {
        languageButton.click(function(event) {
            event.preventDefault();
            if (languageForm[0].checkValidity()) languageForm.submit();
        });
    }
    else if (announcementForm.length && announcementButton.length)
    {
        announcementButton.click(function(event) {
            event.preventDefault();
            if (announcementForm[0].checkValidity()) announcementForm.submit();
        });
    }
});
