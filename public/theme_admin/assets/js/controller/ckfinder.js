var button = document.getElementById('btnImage');
button.onclick = function () {
    selectFileWithCKFinder('txtImage');
};

// function selectFileWithCKFinder(elementId) {
//     CKFinder.popup({
//         chooseFiles: true,
//         width: 800,
//         height: 600,
//         onInit: function (finder) {
//             finder.on('files:choose', function (evt) {
//                 var file = evt.data.files.first();
//                 var output = document.getElementById(elementId);
//                 output.value = file.getUrl();
//             });
//
//             finder.on('file:choose:resizedImage', function (evt) {
//                 var output = document.getElementById(elementId);
//                 output.value = evt.data.resizedUrl;
//             });
//         }
//     });
// }

function selectFileWithCKFinder( elementId ) {
    CKFinder.modal( {
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
