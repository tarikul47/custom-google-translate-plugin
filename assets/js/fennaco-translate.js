console.log("hello");

function googleTranslateElementInit() {
  new google.translate.TranslateElement(
    { pageLanguage: "en" },
    "google_translate_element"
  );
}

jQuery(document).ready(function ($) {
  function waitForGoogleTranslateElement() {
    const googleTranslateElement = document.querySelector(
      "#google_translate_element select"
    );

    if (googleTranslateElement) {
      console.log("Google Translate element found", googleTranslateElement);
      setupLanguageSelector(googleTranslateElement);
    } else {
      console.log("Google Translate element not found, retrying...");
      setTimeout(waitForGoogleTranslateElement, 500); // Retry after 500ms
    }
  }

  function setupLanguageSelector(googleTranslateElement) {
    $("#fennaco_translate_languages_selector").on(
      "click",
      "a.translate-lang",
      function (e) {
        e.preventDefault();
        var lang = $(this).data("lang");

        console.log("lang", lang);
        console.log("googleTranslateElement", googleTranslateElement);

        if (googleTranslateElement) {
          googleTranslateElement.value = lang;
          googleTranslateElement.dispatchEvent(new Event("change"));
        }
      }
    );
  }

  waitForGoogleTranslateElement();
});
