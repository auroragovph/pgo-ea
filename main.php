 <script src="file://///10.149.45.1/htdocs/logic/assets/bootstrap.min.js"></script>
<script type="text/javascript" src="file://///10.149.45.1/htdocs/logic/assets/jquery.min.js"></script>
<script language="javascript" type="text/javascript">
  document.oncontextmenu=RightMouseDown;
  document.onmousedown = mouseDown;
  function mouseDown(e) {
      if (e.which==3) {//righClick
      alert("Disabled - do not use mouse right click..");
   }
}
function RightMouseDown() { return false;}
</script>
<script>
    window.location.hash="no-back-button";
    window.location.hash="Again-No-back-button";//again because google chrome don't insert first hash into history
    window.onhashchange=function(){window.location.hash="M.I.S";}
    function preventBack(){window.history.forward();}
    setTimeout("preventBack()", 0);
    window.onunload=function(){null};
</script>