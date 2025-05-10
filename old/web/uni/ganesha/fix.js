
if (( navigator.appName.indexOf("Microsoft Internet Explorer") != -1 ) && ( navigator.platform.indexOf("Win") != -1 )){
  // they're using IE on Wincrap :(

  // change fixed stuff to absolute...
  document.writeln("<style type=\"text/css\">");
  document.writeln("body { background-attachment: scroll; }");
  document.writeln("div.nav { position: absolute; }");
  document.writeln("div.side#logo { position: absolute; }");
  document.writeln("div.side#subsections { position: absolute; }");
  document.writeln("</style>");
}
