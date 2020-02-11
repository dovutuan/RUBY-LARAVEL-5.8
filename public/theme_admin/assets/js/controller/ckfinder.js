var button1 = document.getElementById( 'btnImage1' );
var button2 = document.getElementById( 'btnImage2' );
var button3 = document.getElementById( 'btnImage3' );
var button4 = document.getElementById( 'btnImage4' );
var button5 = document.getElementById( 'btnImage5' );


button1.onclick = function() {
    selectFileWithCKFinder( 'txtImage1' );
};
button2.onclick = function() {
    selectFileWithCKFinder( 'txtImage2' );
};
button3.onclick = function() {
    selectFileWithCKFinder( 'txtImage3' );
};
button4.onclick = function() {
    selectFileWithCKFinder( 'txtImage4' );
};
button5.onclick = function() {
    selectFileWithCKFinder( 'txtImage5' );
};

function selectFileWithCKFinder( elementId ) {
    CKFinder.popup( {
        chooseFiles: true,
        width: 800,
        height: 600,
        onInit: function( finder ) {
            finder.on( 'files:choose', function( evt ) {
                var file = evt.data.files.first();
                var output = document.getElementById( elementId );
                output.value = file.getUrl();
            } );

            finder.on( 'file:choose:resizedImage', function( evt ) {
                var output = document.getElementById( elementId );
                output.value = evt.data.resizedUrl;
            } );
        }
    } );
}
