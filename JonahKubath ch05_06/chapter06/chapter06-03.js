
  //Select all instances artThumb classes
  var thumb = document.querySelectorAll(".artThumb");

  //Create a thumbnail using the nodes picture path
  function mouseInThumb(thumb1) {

    //Get the source of the image
    var path = thumb1.getAttribute("src");
    //Go to the parent folder for the larger picture
    path = path.replace("thumbs/", "");

    //Create the new element
    var newElem = document.createElement("span");
    var att = document.createAttribute("class");
    att.value = "bigImg";
    newElem.innerHTML = "<img src=\"" + path + "\"/>";
    newElem.setAttributeNode(att);


    //Append to the thumb to the parent node
    thumb1.parentNode.appendChild(newElem);
  }

  function mouseOutThumb(thumb1) {
    //Remove the added picture thumbnail
    thumb1.parentNode.removeChild(thumb1.parentNode.childNodes[1]);

  }

  //Add the event listener to each picture
  for(var i = 0; i < thumb.length; i++){
    thumb[i].addEventListener("mouseenter", function() {mouseInThumb(this);});
    thumb[i].addEventListener("mouseleave", function() {mouseOutThumb(this);});
  }
