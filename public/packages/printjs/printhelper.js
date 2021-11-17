function printPosinvoice(id){

    $('<iframe  id="printf" name="printf" >')
        .hide()                               // make it invisible
        .attr("src", '/admin/maintenance-request/'+id+'/all') // point the iframe to the page you want to print
        .appendTo("body");
    var newWin = window.frames["printf"];

    newWin.document.close();

}

