let langNotification = document.getElementById('langNotification');

function CloseLangNotification() {
    langNotification.style.display = "none";
    resetScrolling();
}

function langCheck() {
    let UserLanguageCode = navigator.language.toLowerCase();
    let UserLanguage;
    if (UserLanguageCode == "de-de" ||
    UserLanguageCode == "de" ||
    UserLanguageCode == "de-at" ||
    UserLanguageCode == "de-li" ||
    UserLanguageCode == "de-lu" ||
    UserLanguageCode == "de-ch") {
        UserLanguage = "German";
    } else {
        langNotification.style.display = 'block';
        disableScrolling();
        document.getElementById('closeLangNotif').addEventListener("click", CloseLangNotification);
        UserLanguage = "English";
    }
    console.log("User language set to " + UserLanguage);
}

// langCheck();
$('#langNotification').modal();
console.log('exe');
