
var el = document.getElementById('resizer');
var resize = new Croppie(el, {
    viewport: { width: 300, height: 300 },
    boundary: { width: 400, height: 400 },
    showZoomer: true,
    enableResize: false,
    enableOrientation: true,
    mouseWheelZoom: 'ctrl'
});
resize.bind({
    url: 'lib/demo-3.jpg',
});
//on button click
resize.result('blob').then(function(blob) {
    // do something with cropped blob
});