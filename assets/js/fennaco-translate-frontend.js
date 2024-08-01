console.log("hello", fennaco_settings);

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
        console.log("clcikkk", e.target);
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

jQuery(document).ready(function ($) {
  // Create the select element
  var selectElement = $("<select>", {
    id: "language-select",
    class: "custom-select",
  });

  // Create and append options
  $.each(fennaco_settings.languages, function (key, value) {
    var option = $("<option>", {
      value: key,
      text: value,
    });

    // Set the default language as selected
    if (key === fennaco_settings.default_language) {
      option.prop("selected", true);
    }

    selectElement.append(option);
  });

  // Create the div element
  var divElement = $("<div>", {
    id: "wrapper-div",
    class: "wrapper-class",
  });

  // Append the select element to the div
  divElement.append(selectElement);

  // Append the div element to the parent element
  $("#simple-banner").append(divElement);
});

// jQuery(document).ready(function ($) {
//   var $banner = $("#simple-banner");

//   if ($banner.length) {
//     // Create the custom select container
//     var $customSelect = $("<div>")
//       .addClass("custom-select")
//       .css("width", "200px");

//     // Create the select element with the required class
//     var $select = $("<select>").addClass(
//       "fennaco_translate_languages_selector"
//     );

//     // Populate the select element with options
//     $.each(fennaco_settings.languages, function (langCode, langName) {
//       var $option = $("<option>").attr("value", langCode).text(langName);
//       if (langCode === fennaco_settings.default_language) {
//         $option.attr("selected", "selected");
//       }
//       $select.append($option);
//     });

//     // Append the select element to the custom select container
//     $customSelect.append($select);

//     // Append the custom select container to the simple-banner element
//     $banner.append($customSelect);

//     // Initialize the custom select functionality
//     initCustomSelect();
//   }

//   function initCustomSelect() {
//     var x, i, j, l, ll, selElmnt, a, b, c;
//     x = document.getElementsByClassName("custom-select");
//     l = x.length;

//     for (i = 0; i < l; i++) {
//       selElmnt = x[i].getElementsByTagName("select")[0];
//       ll = selElmnt.length;

//       a = document.createElement("DIV");
//       a.setAttribute("class", "select-selected");
//       a.innerHTML = selElmnt.options[selElmnt.selectedIndex].innerHTML;
//       x[i].appendChild(a);

//       b = document.createElement("DIV");
//       b.setAttribute("class", "select-items select-hide");

//       for (j = 0; j < ll; j++) {
//         c = document.createElement("DIV");
//         c.innerHTML = selElmnt.options[j].innerHTML;
//         c.addEventListener("click", function (e) {
//           var y, i, k, s, h, sl, yl;
//           s = this.parentNode.parentNode.getElementsByTagName("select")[0];
//           sl = s.length;
//           h = this.parentNode.previousSibling;
//           for (i = 0; i < sl; i++) {
//             if (s.options[i].innerHTML == this.innerHTML) {
//               s.selectedIndex = i;
//               h.innerHTML = this.innerHTML;
//               y = this.parentNode.getElementsByClassName("same-as-selected");
//               yl = y.length;
//               for (k = 0; k < yl; k++) {
//                 y[k].removeAttribute("class");
//               }
//               this.setAttribute("class", "same-as-selected");
//               break;
//             }
//           }
//           h.click();
//         });
//         b.appendChild(c);
//       }
//       x[i].appendChild(b);
//       a.addEventListener("click", function (e) {
//         e.stopPropagation();
//         closeAllSelect(this);
//         this.nextSibling.classList.toggle("select-hide");
//         this.classList.toggle("select-arrow-active");
//       });
//     }
//   }

//   function closeAllSelect(elmnt) {
//     var x,
//       y,
//       i,
//       xl,
//       yl,
//       arrNo = [];
//     x = document.getElementsByClassName("select-items");
//     y = document.getElementsByClassName("select-selected");
//     xl = x.length;
//     yl = y.length;
//     for (i = 0; i < yl; i++) {
//       if (elmnt == y[i]) {
//         arrNo.push(i);
//       } else {
//         y[i].classList.remove("select-arrow-active");
//       }
//     }
//     for (i = 0; i < xl; i++) {
//       if (arrNo.indexOf(i)) {
//         x[i].classList.add("select-hide");
//       }
//     }
//   }

//   document.addEventListener("click", closeAllSelect);
// });

// jQuery(document).ready(function ($) {
//   var $banner = $("#simple-banner");
//   console.log($banner);
//   var $span = $("<span></span>").html(`
//       <div id="fennaco_translate_languages_selector" class="notranslate">
//           <a href="#" class="translate-lang" data-lang="ar">Arabic</a><br>
//           <a href="#" class="translate-lang" data-lang="hy">Armenian</a><br>
//           <a href="#" class="translate-lang" data-lang="bn">Bengali</a><br>
//           <a href="#" class="translate-lang" data-lang="nl">Dutch</a><br>
//       </div>
//   `);

//   $banner.append($span);
// });
