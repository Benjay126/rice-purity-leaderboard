function shiftFocus(num, pinType) { document.getElementById(`${pinType}-pin-${num}`).focus(); }
function squarePins(numPins, pinType) {
    for (i = 1; i <= numPins; i++) {
        var p = document.getElementById(`${pinType}-pin-${i}`);
        dimDiff = p.offsetWidth - p.offsetHeight;
        p.style.paddingTop = (dimDiff / 2) + 'px';
        p.style.paddingBottom = (dimDiff / 2) + 'px';
    }
}
function joinPin(numPins, pinType) {
    const pin = [];
    for (i = 1; i <= numPins; i++) { pin.push(document.getElementById(`${pinType}-pin-${i}`).value); }
    var pinStr = pin.join('');
    document.getElementById(`total-${pinType}-pin`).value = pinStr;
    //document.getElementById('form').submit();
}