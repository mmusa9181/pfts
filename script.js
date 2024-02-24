
    function prin() {
        childWindow = window.open('','childWindow','location=yes, menubar=yes, toolbar=yes');
        childWindow.document.open();
        childWindow.document.write('<html><head><title>PERSONEL FILE TRACKING SYSTEM</title></head><body>');
        childWindow.document.write(document.getElementById("output").value.replace(/\n/gi,'<br>'));
        childWindow.document.write('</body></html>');
        childWindow.print();
        childWindow.document.close(); 
        childWindow.close();
}
