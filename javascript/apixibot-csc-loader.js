function load_js() {
  var d = new Date();
  var head = document.getElementsByTagName("head")[0];
  var script = document.createElement("script");
  script.src =
    "https://apixibot.s3.amazonaws.com/mainv3_4.js?v=" +
    d.getTime();
  head.appendChild(script);
}

(function (window) {
  load_js();
})(window);
