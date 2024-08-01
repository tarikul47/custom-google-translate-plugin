jQuery(document).ready(function ($) {
  function updateDefaultLanguage() {
    var defaultLang = $("#language-select").val().trim().toLowerCase(); // Get the default language code

    console.log("Selected Default Language Code:", defaultLang);

    // Find the checkbox that matches the default language
    $(".fennaco-language-checkbox").each(function () {
      var $checkbox = $(this);
      var checkboxValue = $checkbox.val().trim().toLowerCase(); // Normalize the checkbox value

      // console.log("Checkbox Value:", checkboxValue);

      // Check if the checkbox value matches the default language code
      if (checkboxValue === defaultLang) {
        console.log("Matching Checkbox Found:", $checkbox.attr("name"));
        //   $checkbox.prop("checked", true).prop("disabled", true); // Check and disable it
        $checkbox.prop("checked", true); // Check and disable it
      }
    });
  }

  // Initial update
  updateDefaultLanguage();

  // Update on change
  $("#language-select").on("change", function () {
    updateDefaultLanguage();
  });
});

function FennacoDoWidgetCode(event) {
  var defaultLang = document.getElementById("language-select").value; // Get the default language code or name
  var checkbox = event.target; // Access the checkbox element that triggered the event
  var checkboxValue = checkbox.value;

  console.log("Default Language:", defaultLang);
  console.log("Checkbox Value:", checkboxValue);

  // Check if the checkbox value matches the default language
  if (checkboxValue.trim().toLowerCase() === defaultLang.trim().toLowerCase()) {
    alert(
      "This language is set as the default language and cannot be changed."
    );
    checkbox.checked = true; // Ensure it remains checked
  }
}
