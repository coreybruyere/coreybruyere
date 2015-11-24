
  /**
   * HasClass function
   */
  function hasClass( elem, className ) {
    return elem.className.split( ' ' ).indexOf( className ) > -1;
  }




  /**
   * Link that is turned into a button toggle if js is enabled
   * Falls back to link if not
   * Button toggles id of element passed in data attr with an is-active class
   */
  function copyTextToClipboard(text) {
    var textArea = document.createElement("textarea");

    //
    // *** This styling is an extra step which is likely not required. ***
    //
    // Why is it here? To ensure:
    // 1. the element is able to have focus and selection.
    // 2. if element was to flash render it has minimal visual impact.
    // 3. less flakyness with selection and copying which **might** occur if
    //    the textarea element is not visible.
    //
    // The likelihood is the element won't even render, not even a flash,
    // so some of these are just precautions. However in IE the element
    // is visible whilst the popup box asking the user for permission for
    // the web page to copy to the clipboard.
    //

    // Place in top-left corner of screen regardless of scroll position.
    textArea.style.position = 'fixed';
    textArea.style.top = 0;
    textArea.style.left = 0;

    // Ensure it has a small width and height. Setting to 1px / 1em
    // doesn't work as this gives a negative w/h on some browsers.
    textArea.style.width = '2em';
    textArea.style.height = '2em';

    // We don't need padding, reducing the size if it does flash render.
    textArea.style.padding = 0;

    // Clean up any borders.
    textArea.style.border = 'none';
    textArea.style.outline = 'none';
    textArea.style.boxShadow = 'none';

    // Avoid flash of white box if rendered for any reason.
    textArea.style.background = 'transparent';


    textArea.value = text;

    document.body.appendChild(textArea);

    textArea.select();

    try {
      var successful = document.execCommand('copy');
      var msg = successful ? 'successful' : 'unsuccessful';
      console.log('Copying text command was ' + msg);
    } catch (err) {
      console.log('Oops, unable to copy');
    }

    document.body.removeChild(textArea);
  }




  /**
   * Link that is turned into a button toggle if js is enabled
   * Falls back to link if not
   * Button adds is-active class to id of element passed in data-toggle attr
   *
   * @to-do: make close click event and tie it to graceful toggle function
   */
  var element = document.querySelectorAll('.js-graceful-toggle');
  var newElement, oldElement, currentElement, currentAttr, oldAttr;

  for (var i = 0; i < element.length; i++) {
    currentElement = element[i];
    newElement = document.createElement('button');
    oldAttr = currentElement.attributes;
    newElement.innerHTML = currentElement.innerHTML;

    for (var j = 0; j < currentElement.attributes.length; j++) {
      currentAttr = currentElement.attributes.item(j);
      newElement.setAttribute(currentAttr.nodeName, currentAttr.nodeValue);
      // console.log(currentElement);
    }

    newElement.removeAttribute('href');
    currentElement.parentNode.replaceChild(newElement, currentElement);
  }

  document.addEventListener('click', function(e) {
    if (hasClass(e.target, 'js-graceful-toggle')) {
      var gracefulTarget = document.getElementById(e.target.dataset.toggle);
      gracefulTarget.classList.toggle('is-active');
    }
  }, false);




  /**
   * Click event binding tooltip and copy functionality together
   * On click checks if tooltip has click trigger
   * If so add is-toggled class to tooltip for set time
   *
   * @to-do: build invisible pop up span for accessibility http://heydonworks.com/practical_aria_examples/#button-controlled-input
   */
  document.addEventListener('click', function(e) {
    if (hasClass(e.target, 'js-tooltip')) {
      var tooltipClickCopy = e.target.dataset.copy;

      e.target.classList.toggle('is-toggled');
      // if copy data is available, do that too
      copyTextToClipboard(tooltipClickCopy);

      setTimeout(function(){
        e.target.classList.remove('is-toggled');
      }, 5000);
    }
  }, false);


  //// DOnt do hover or focus tooltip
  ///add tooltip styling on click  intead
  ///change hover attr to click or something
  ///separate toggle and copy and tooltip functions

// var copyBobBtn = document.querySelector('.js-copy-bob-btn'),
//   copyJaneBtn = document.querySelector('.js-copy-jane-btn');

// copyBobBtn.addEventListener('click', function(event) {
//   copyTextToClipboard('Bob');
// });


// copyJaneBtn.addEventListener('click', function(event) {
//   copyTextToClipboard('Jane');
// });








//   // Click event handler
//   function getEl(e)  {
//     if (e.target.className === 'js-graceful-toggle') {
//       console.log('hi');
//     }
//     console.log(e);
//   }

// element.parent.addEventListener('click', getEl);


// // link el
// var element = document.querySelectorAll('.js-graceful-toggle');
// var currentElement, oldAttributes, newAttributes, child;
// Array.prototype.forEach.call(element, function(el, i){

//   // console.log(el);

//   // button el
//   var newElement = document.createElement('button');

//   currentElement = el[i];

//   oldAttributes = currentElement.attributes;
//   newAttributes = newElement.attributes;
//   child = currentElement.firstChild;



//   newAttributes.setNamedItem(oldAttributes.cloneNode());

//   newElement.removeAttribute('href');

//   do {
//     newElement.appendChild(child);
//   } while ((child = child.nextSibling) !== null);

//   currentElement.parentNode.replaceChild(newElement, currentElement);

//   // console.log(oldAttributes);


// });

